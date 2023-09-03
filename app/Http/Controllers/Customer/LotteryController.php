<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\LotteryParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryController extends Controller {
    public function index ( Request $request ) {
        $customer = Auth::guard('customer')
                        ->user();
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

        return view('customer.lotteries.index' , compact('lotteries'));
    }

    public function participate ( $id ) {
        $customer = Auth::guard('customer')
                        ->user();
        $lottery = Lottery::findOrFail($id);
        $c_1 = $lottery->ended_at > now();
        $c_2 = true || $customer->getLevel($lottery->store)->id == $lottery->storeLevel->id;
        $c_3 = $lottery->participants->count() < $lottery->capacity;
        $c_4 = $lottery->points <= $customer->balance;
        $c_5 = !$lottery->participants()->where('customer_id', $customer->id)->first();
        if ( $c_1 && $c_2 && $c_3 && $c_4 && $c_5) {
            $customer->consume($lottery->store_id, $lottery->points, 'lottery');
            LotteryParticipant::query()
                              ->firstOrCreate([
                                                  'lottery_id' => $lottery->id ,
                                                  'customer_id' => $customer->id ,
                                              ]);

            return redirect()
                ->back()
                ->with([
                           'success' => 'با موفقیت وارد قرعه کشی شدید.' ,
                       ]);
        }

        return redirect()
            ->back()
            ->withErrors([
                             'error' => 'شما نمیتوانید در این قرعه کشی شرکت کنید' ,
                         ]);
    }

    public function winners ( Request $request , $id ) {
        $customer = Auth::guard('customer')
                             ->user();
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

        return view('customer.lotteries.winners' , compact('lottery' , 'lottery_participants'));
    }
}
