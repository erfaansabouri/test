<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\OfficialCalendar;
use App\Models\StoreCalendar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $store_manager = Auth::guard('store-manager')->user();
        $days = collect([]);
        for ($i = 0; $i < 30; $i++) {
            $current_day = Carbon::now()->addDays($i);
            $official_calendar = OfficialCalendar::query()
                ->whereDate('date', $current_day)
                ->first();
            $store_calendar = StoreCalendar::query()
                ->where('store_id', $store_manager->store_id)
                ->whereDate('date', $current_day)
                ->first();
            $days->push([
                'date' => $current_day,
                'official_calendar' => $official_calendar,
                'store_calendar' => $store_calendar,
            ]);
        }
        return view('store-manager.calendar.index', compact('days'));
    }

    public function createEvent(Request $request){
        $store_manager = Auth::guard('store-manager')->user();

        $store_calendar = StoreCalendar::query()
            ->firstOrCreate([
                'date' => $request->date,
                'store_id' => $store_manager->store_id
            ]);
        return view('store-manager.calendar.create-event', compact('store_calendar'));
    }

    public function saveEvent(Request $request){
        $request->validate([
            'date' => ['required'],
            'events' => ['nullable']
        ]);
        $store_manager = Auth::guard('store-manager')->user();

        $store_calendar = StoreCalendar::query()
            ->firstOrCreate([
                'date' => $request->date,
                'store_id' => $store_manager->store_id
            ]);
        $store_calendar->events = $request->events;
        $store_calendar->save();
        return redirect()->route('store-manager.calendar.index');
    }
}
