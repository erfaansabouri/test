<?php

namespace App\Console\Commands;

use App\Models\OfficialCalendar;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Verta;

class OfficialCalendarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'official-calendar';

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
        for ($i = 0; $i < 10; $i++) {
            $last_day = Carbon::now();
            if ($last_official = OfficialCalendar::orderByDesc('date')->first()){
                $last_day = Carbon::parse($last_official->date);
            }
            $carbon_ymd = $last_day->addDays($i)->format('Y/m/d');
            $ymd = Verta::instance($carbon_ymd)->format('Y/m/d');
            $calendar = json_decode(Http::get("https://holidayapi.ir/jalali/$ymd")->body());
            $official_calendar = OfficialCalendar::firstOrCreate([
                'date' => $carbon_ymd
            ]);
            $events = '';
            foreach ($calendar->events as $event) {
                $events .= $event->description . PHP_EOL;
            }
            $official_calendar->events = $events;
            $official_calendar->save();

        }
        return Command::SUCCESS;
    }
}
