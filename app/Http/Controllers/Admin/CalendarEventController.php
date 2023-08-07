<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Verta;

class CalendarEventController extends Controller
{
    public function index(){
        $days = [];
        for ($i = 0; $i<3; $i++){
            $ymd = Carbon::now()->addDays($i)->format('Y/m/d');
            $ymd = Verta::instance($ymd)->format('Y/m/d');
            $days[] = [
                'day' => $ymd,
                'calendar' => json_decode(Http::get("https://holidayapi.ir/jalali/$ymd")->body())
            ];
            sleep(2);
        }
        return view('admin.calendar-events.index', compact('days'));
    }
}
