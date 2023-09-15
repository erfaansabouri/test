<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\LotteryParticipant;
use App\Services\DateServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryController extends Controller {
    public function index ( Request $request ) {
        $lotteries = Lottery::query()
                            ->when($request->search , function ( $query ) use ( $request ) {
                                $query->where(function ( $query ) use ( $request ) {
                                    $query->where('id' , $request->search)
                                          ->orwhere('title' , 'like' , '%' . $request->search . '%')
                                          ->orwhere('description' , 'like' , '%' . $request->search . '%');
                                });
                            })
                            ->orderByDesc('created_at')
                            ->paginate(50);

        return view('admin.lotteries.index' , compact('lotteries'));
    }

    public function create () {
        return view('admin.lotteries.form');
    }

    public function store ( Request $request ) {
        $request->validate([
                               'title' => [ 'required' ] ,
                               'description' => [ 'required' ] ,
                               'capacity' => [ 'required' ] ,
                               'points' => [ 'required' ] ,
                               'started_at' => [ 'required' ] ,
                               'ended_at' => [ 'required' ] ,
                               'store_id' => [ 'required' ] ,
                           ]);
        $lottery = new Lottery();
        $this->updateOrCreate($lottery , $request);

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function edit ( $id ) {
        $lottery = Lottery::where('id' , $id)
                          ->firstOrFail();
        if ( $lottery->winners_announced_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل ویرایش نیست' ,
                             ]);
        }

        return view('admin.lotteries.form' , compact('lottery'));
    }

    public function update ( Request $request , $id ) {
        $request->validate([
                               'title' => [ 'required' ] ,
                               'description' => [ 'required' ] ,
                               'capacity' => [ 'required' ] ,
                               'max_winners_count' => [ 'required' ] ,
                               'points' => [ 'required' ] ,
                               'started_at' => [ 'required' ] ,
                               'ended_at' => [ 'required' ] ,
                               'store_id' => [ 'required' ] ,
                           ]);
        $lottery = Lottery::where('id' , $id)
                          ->firstOrFail();
        if ( $lottery->winners_announced_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل ویرایش نیست' ,
                             ]);
        }
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
        $lottery->started_at = $started_at;
        $lottery->ended_at = $ended_at;
        $lottery->store_id = $request->store_id;
        $lottery->save();

        return $lottery;
    }

    public function destroy ( $id ) {
        $lottery = Lottery::where('id' , $id)
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
        $lottery = Lottery::where('id' , $id)
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

        return view('admin.lotteries.winners' , compact('lottery' , 'lottery_participants'));
    }
}
