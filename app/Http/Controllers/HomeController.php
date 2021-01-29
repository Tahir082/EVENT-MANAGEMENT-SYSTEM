<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\latestEvent;
use App\latestEventImage;
use App\userEventReg;
use App\UpcomingEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function userreqruitment($id)
    {
      $user=User::find($id);
      return view('reqruitment', compact('user', 'id'));
    }

    public function reqruitment(Request $request, $id)
    {
      $this->validate($request, [
        'speciality'=>'required',
        'request'=>'required',
      ]);
      $user= User::find($id);
      $user->speciality= $request->get('speciality');
      $user->contact=$request->get('contact');
      $user->request= $request->get('request');
      $user->save();
      return redirect()->route('homelogin')->withSuccess('Your Request has been Sent.');
    }


    public function user_event_registration($id)
    {
      $user=User::find($id);
      $upcoming_event = UpcomingEvent::all();
      $check = userEventReg::where('userid', $id)->get();
      return view('event_registration', compact('user','upcoming_event'))->with('check', $check);
    }
    public function event_registration($id, $id2)
    {
      $up_event = UpcomingEvent::find($id2);
      $user=User::find($id);
      $image= DB::table('upcoming_events')->select('image')->where('id', $id2)->get();
      return view('user_view_event', compact('up_event', 'image', 'user'));

    }
    public function register_for_event(Request $request, $id)
    {
      $this->validate($request, [
        'registration_id'=>'required',
        'event_name'=>'required',
        'user_name'=>'required',
        'user_email'=>'required',
        'payment'=>'required',
        'contact'=>'required',
        'university'=>'required',
        'user_id'=>'required',
        'competing_event'=>'required',
      ]);
      $user= User::find($id);
      $user->contact=$request->get('contact');
      $user->competing_event=$request->get('competing_event');
      $user->save();
      $user_reg= new userEventReg;
      $user_reg->eventid= $request->get('event_id');
      $user_reg->event_name= $request->get('event_name');
      $user_reg->userid= $request->get('user_id');
      $user_reg->user_name= $request->get('user_name');
      $user_reg->university= $request->get('university');
      $user_reg->user_email= $request->get('user_email');
      $user_reg->user_contact= $request->get('contact');
      $user_reg->participate= $request->get('participating');
      $user_reg->payment= $request->get('payment');
      $user_reg->save();
      return redirect()->route('homelogin')->withSuccess('Your information have been successfully saved');
    }



}
