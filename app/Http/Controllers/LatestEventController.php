<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\latestEvent;
use App\latestEventImage;


class LatestEventController extends Controller
{


	public function all(){
    	$events = latestEvent::Paginate(1);
        $img[]= new latestEventImage();

    	foreach ($events as $event) {
    		$img[$event->id]= DB::table('latest_event_image')->select('image')->where('latest_events_id', '=', $event->id)->get();
    	}

    	return view('event')->with(compact('events','img'));

}


}
