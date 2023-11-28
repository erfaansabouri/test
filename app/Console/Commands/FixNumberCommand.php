<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class FixNumberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix-number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach (Customer::all() as $customer){
            $customer->phone_number = str_replace('009', '09', $customer->phone_number);
            $customer->save();
        }
        return Command::SUCCESS;
    }
}
