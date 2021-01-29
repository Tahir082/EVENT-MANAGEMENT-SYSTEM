<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Slider;
use App\latestEvent;
use App\latestEventImage;
use App\UpcomingEvent;
use App\description;
use App\executive;

class EventController extends Controller
{
    public function index(){
    	$Sliders = Slider::all();
    	$latest_event = latestEvent::all();
    	$upcoming_event = UpcomingEvent::all();
        return view('welcome')->with(compact('Sliders','latest_event','upcoming_event'));
    }

    public function dashboard(){
    	return view('dashboard');
    }

    public function view_l($id){
    	$l_event = latestEvent::find($id);
        $image[]= new latestEventImage();
        $up_event= NULL;

    	$image= DB::table('latest_event_image')->select('image')->where('latest_events_id', '=', $l_event->id)->get();


    	return view('ViewEvent')->with(compact('l_event','image','up_event'));
    }

    public function view_up($id){
    	$up_event = UpcomingEvent::find($id);
    	$l_event= NULL;
    	$image= NULL;

    	return view('ViewEvent')->with(compact('l_event','image','up_event'));
    }
    public function about()
    {
      $description = description::all();
      $executives = executive::all();
      return view('about')->with(compact('description','executives'));
    }


}
