<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\latestEvent;
use App\latestEventImage;


class UpcomingEventController extends Controller
{


	public function all(){
    	$events = UpcomingEvent::Paginate(1);

    	foreach ($events as $event) {
    		$img[$event->id]= DB::table('upcoming_events')->select('image')->where('id', '=', $event->id)->get();
    	}

    	return view('event')->with(compact('events','img'));

}


}
