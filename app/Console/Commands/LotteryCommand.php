<?php

namespace App\Console\Commands;

use App\Models\Lottery;
use App\Models\LotteryParticipant;
use Illuminate\Console\Command;

class LotteryCommand extends Command {
    protected $signature   = 'lottery';
    protected $description = 'Command description';

    public function handle () {
        $lotteries = Lottery::query()
                            ->whereNull('winners_announced_at')
                            ->where('ended_at' , '<' , now())
                            ->get();
        foreach ( $lotteries as $lottery ) {
            $this->handleLottery($lottery);
            $lottery->winners_announced_at = now();
            $lottery->save();
        }

        return Command::SUCCESS;
    }

    public function handleLottery ( Lottery $lottery ) {
        $lottery->participants()
                ->update([
                             'is_winner' => false ,
                             'winner_code' => null ,
                         ]);
        $winners_count = $lottery->max_winners_count;
        $winners = $lottery->participants()
                           ->inRandomOrder()
                           ->take($winners_count)
                           ->get();
        foreach ( $winners as $winner ) {
            $winner->is_winner = true;
            $winner->winner_code = LotteryParticipant::generateCode();
            $winner->save();
        }
    }
}
