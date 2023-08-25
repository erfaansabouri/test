<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\LotteryParticipant;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryController extends Controller {
    public function index ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $lotteries = Lottery::query()
                            ->where('store_id' , $store_manager->store_id)
                            ->when($request->search , function ( $query ) use ( $request ) {
                                $query->where(function ( $query ) use ( $request ) {
                                    $query->where('id' , $request->search)
                                          ->orwhere('title' , 'like' , '%' . $request->search . '%')
                                          ->orwhere('description' , 'like' , '%' . $request->search . '%');
                                });
                            })
                            ->orderByDesc('created_at')
                            ->paginate(50);

        return view('store-manager.lotteries.index' , compact('lotteries'));
    }

    public function create () {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $store_levels = $store_manager->store->storeLevels;

        return view('store-manager.lotteries.form' , compact('store_manager' , 'store_levels'));
    }

    public function store ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $request->validate([
                               'title' => [ 'required' ] ,
                               'description' => [ 'required' ] ,
                               'capacity' => [ 'required' ] ,
                               'points' => [ 'required' ] ,
                               'store_level_id' => [ 'required' ] ,
                               'started_at' => [ 'required' ] ,
                               'ended_at' => [ 'required' ] ,
                           ]);
        $lottery = new Lottery();
        $lottery->store_id = $store_manager->store_id;
        $this->updateOrCreate($lottery , $request);

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function edit ( $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $store_levels = $store_manager->store->storeLevels;
        $lottery = Lottery::where('store_id' , $store_manager->store_id)
                          ->where('id' , $id)
                          ->firstOrFail();
        if ( $lottery->winners_announced_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل ویرایش نیست' ,
                             ]);
        }

        return view('store-manager.lotteries.form' , compact('store_manager' , 'store_levels' , 'lottery'));
    }

    public function update ( Request $request , $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $request->validate([
                               'title' => [ 'required' ] ,
                               'description' => [ 'required' ] ,
                               'capacity' => [ 'required' ] ,
                               'max_winners_count' => [ 'required' ] ,
                               'points' => [ 'required' ] ,
                               'store_level_id' => [ 'required' ] ,
                               'started_at' => [ 'required' ] ,
                               'ended_at' => [ 'required' ] ,
                           ]);
        $lottery = Lottery::where('store_id' , $store_manager->store_id)
                          ->where('id' , $id)
                          ->firstOrFail();
        if ( $lottery->winners_announced_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل ویرایش نیست' ,
                             ]);
        }
        $lottery->store_id = $store_manager->store_id;
        $this->updateOrCreate($lottery , $request);

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function updateOrCreate ( Lottery $lottery , Request $request ) {
        $started_at = DateServices::jalaliToCarbon($request->started_at)
                                  ->startOfDay();
        $ended_at = DateServices::jalaliToCarbon($request->ended_at)
                                ->endOfDay();
        $lottery->title = $request->title;
        $lottery->description = $request->description;
        $lottery->capacity = $request->capacity;
        $lottery->max_winners_count = $request->max_winners_count;
        $lottery->points = $request->points;
        $lottery->store_level_id = $request->store_level_id;
        $lottery->started_at = $started_at;
        $lottery->ended_at = $ended_at;
        $lottery->save();

        return $lottery;
    }

    public function destroy ( $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $lottery = Lottery::where('store_id' , $store_manager->store_id)
                          ->where('id' , $id)
                          ->firstOrFail();
        if ( $lottery->winners_announced_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل حذف نیست' ,
                             ]);
        }
        $lottery->delete();

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function winners ( Request $request , $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $lottery = Lottery::where('store_id' , $store_manager->store_id)
                          ->where('id' , $id)
                          ->firstOrFail();
        if ( !$lottery->winners_announced_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'قرعه کشی انجام نشده است' ,
                             ]);
        }
        $lottery_participants = LotteryParticipant::query()
                                                  ->with([ 'customer' ])
                                                  ->where('lottery_id' , $lottery->id)
                                                  ->orderByDesc('is_winner')
                                                  ->paginate(100);

        return view('store-manager.lotteries.winners' , compact('lottery' , 'lottery_participants'));
    }
}
