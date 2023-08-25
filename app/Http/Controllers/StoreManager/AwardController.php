<?php

namespace App\Http\Controllers\StoreManager;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AwardController extends Controller {
    public function index ( Request $request ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $awards = Award::query()
                       ->with([ 'customer' ])
                       ->where('store_id' , $store_manager->store_id)
                       ->when($request->search , function ( $query ) use ( $request ) {
                           $query->where(function ( $query ) use ( $request ) {
                               $query->where('id' , $request->search)
                                     ->orwhere('code' , 'like' , '%' . $request->search . '%')
                                     ->orwhere('title' , 'like' , '%' . $request->search . '%')
                                     ->orwhere('description' , 'like' , '%' . $request->search . '%')
                                     ->orwhere('points' , 'like' , '%' . $request->search . '%');
                           });
                       })
                       ->orderByDesc('created_at')
                       ->paginate(50);

        return view('store-manager.awards.index' , compact('awards'));
    }

    public function create () {
        $store_manager = Auth::guard('store-manager')
                             ->user();

        return view('store-manager.awards.form' , compact('store_manager'));
    }

    public function store ( Request $request ) {
        $request->validate([
                               'type' => [ 'required' ] ,
                               'title' => [ 'required' ] ,
                               'description' => [ 'required' ] ,
                               'points' => [
                                   'required' ,
                                   'numeric' ,
                               ] ,
                           ]);
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $award = new Award();
        $award->store_id = $store_manager->store_id;
        $this->updateOrCreate($award , $request);

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function edit ( $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $award = Award::where('store_id' , $store_manager->store_id)
                      ->where('id' , $id)
                      ->firstOrFail();
        if ( $award->purchased_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل ویرایش نیست' ,
                             ]);
        }

        return view('store-manager.awards.form' , compact('store_manager' , 'award'));
    }

    public function update ( Request $request , $id ) {
        $request->validate([
                               'type' => [ 'required' ] ,
                               'title' => [ 'required' ] ,
                               'description' => [ 'required' ] ,
                               'points' => [
                                   'required' ,
                                   'numeric' ,
                               ] ,
                           ]);
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $award = Award::where('store_id' , $store_manager->store_id)
                      ->where('id' , $id)
                      ->firstOrFail();
        if ( $award->purchased_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل ویرایش نیست' ,
                             ]);
        }
        $this->updateOrCreate($award , $request);

        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }

    public function updateOrCreate ( Award $award , Request $request ) {
        $award->type = $request->type;
        $award->title = $request->title;
        $award->description = $request->description;
        $award->points = $request->points;
        $award->save();

        return $award;
    }

    public function destroy ( $id ) {
        $store_manager = Auth::guard('store-manager')
                             ->user();
        $award = Award::where('store_id' , $store_manager->store_id)
                      ->where('id' , $id)
                      ->firstOrFail();
        if ( $award->purchased_at ) {
            return redirect()
                ->back()
                ->withErrors([
                                 'error' => 'رکورد قابل حذف نیست' ,
                             ]);
        }

        $award->delete();
        return redirect()
            ->back()
            ->with([ 'success' => 'عملیات با موفقیت انجام شد.' ]);
    }
}
