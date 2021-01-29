<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\description;
use App\executive;
use App\User;
use App\Post;
use App\userEventReg;
use App\Slider;
use App\latestEvent;
use App\latestEventImage;
use App\UpcomingEvent;
use App\About;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminindex()
    {
        return view('adminhome');
    }

    public function editindex()
    {
      $uservar = User::all();
      return view('editdata', compact('uservar'));
    }
    public function edituserjobdata($id)
    {
      $user=User::find($id);
      return view('edituserdesignation', compact('user', 'id'));

    }

    public function update_user(Request $request, $id)
    {
      $this->validate($request, [
        'Designation'=>'required',
        'request'=>'required',
      ]);
      $user= User::find($id);
      $user->job= $request->get('Designation');
      $user->request= $request->get('request');
      $user->save();
      return redirect()->route('editdata')->withSuccess('Designation of selected person has been successfully Updated.');

    }

    public function delete_user($id)
    {
      $user= User::find($id);
      $user->delete();
      return redirect()->route('editdata')->withSuccess('Selected person has been Banned.');

    }



    public function show_reg_record()
    {
      $latest_event=UpcomingEvent::all();
      return view('edit_user_event_one')->with(compact('latest_event'));
    }

    public function view_user_event_registrations($id)
    {
      $latest_event = userEventReg::where('eventid', $id)->get();
    	return view('edit_user_event_two')->with('latest_event', $latest_event);
    }


    public function update_user_registrations(Request $request, $reg_id)
    {
      $this->validate($request, [
        'payment'=>'required',
      ]);
      $change=userEventReg::find($reg_id);
      $change->payment= $request->get('payment');
      $change->save();
      return redirect()->route('edit_records_one')->withSuccess('Payment of selected person has been successfully Updated.');
    }




    public function editevent()
    {

      return view('dashboard');
    }




//Latest_event_code_start!!...............................................................
    public function latest_event_create(){


    	return view('latestEvent');

}



    public function latest_event_store(Request $request){
        $this->validate($request,[
            'title' =>'required',
            'description' =>'required',
            'image' => 'image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

        ],[ 'title.required' => 'The :attribute field can not be blank value.',
        	'description.required' => 'The :attribute field can not be blank value.',
        	'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
    ]);

        $event = new latestEvent();


        $event->title = $request->input('title');
        $event->description = $request->input('description');



        $event->save();


        if($request->hasfile('images'))
         {

            foreach($request->file('images') as $image)
            {
            	$event_img = new latestEventImage();
            	$event_img->latest_events_id = $event->id;
                $filename=$image->getClientOriginalName();

                if (DB::table('latest_event_image')->where('image', '=', $filename)->exists()) {

                	    $extension = $image->getClientOriginalExtension();
            			$filename = time() . '.' . $extension;

            			$image->move('public/uploads/latest_event/', $filename);

                }else{
                	$image->move('public/uploads/latest_event/', $filename);
                }


                $event_img->image = $filename;

                $event_img->save();
            }
         }

        return redirect()->route('latest_event')->withSuccess('Files has been successfully uploaded.');
}




    public function latest_event_edit($id){
        $events = latestEvent::find($id);
        $images= DB::table('latest_event_image')->select('id','image')->where('latest_events_id', '=', $events->id)->get();
        return view('update_event')->with(compact('events','images'));
}

	public function update_latest_event(Request $request, $id){
		$events = latestEvent::find($id);

		$this->validate($request,[
            'image' => 'image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',
        ],[  'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
    ]);

		$events->title = $request->input('title');
        $events->description = $request->input('description');

        $events->save();

        if($request->hasfile('images'))
         {

            foreach($request->file('images') as $image)
            {
            	$event_img = new latestEventImage();
            	$event_img->latest_events_id = $events->id;
                $filename=$image->getClientOriginalName();

                if (DB::table('latest_event_image')->where('image', '=', $filename)->exists()) {

                	    $extension = $image->getClientOriginalExtension();
            			$filename = time() . '.' . $extension;

            			$image->move('public/uploads/latest_event/', $filename);

                }else{
                	$image->move('public/uploads/latest_event/', $filename);
                }


                $event_img->image = $filename;

                $event_img->save();
            }
         }
         return redirect()->route('all_event')->withSuccess('Event has been successfully updated.');

}
public function latest_delete($id)
{
    $latest_events = latestEvent::find($id);
    $latest_events->delete();
    $image_path = "public/uploads/latest_event/".$latest_events->image;

     if (file_exists($image_path)){
           @unlink($image_path);
       }

    return redirect('/latest_event')->with('latest_events',$latest_events);
}

    public function latest_event_delete_image($e_id,$i_id){
    	$events = latestEvent::find($e_id);
        $img = latestEventImage::find($i_id);
        $img->delete();
        $image_path = "public/uploads/latest_event/".$img->image;

         if (file_exists($image_path)){
               @unlink($image_path);
           }

        return redirect()->route('edit_event',[$e_id])->withSuccess('Image has been deleting successfully.');
}

//Latest_event_code_end!!!...............................................................


//slider Code start

public function slider_create(){
    $sliders = Slider::Paginate(5);
  return view('slider')->with('Sliders',$sliders);

}



public function slider_store(Request $request){
    $this->validate($request,[
        'title' =>'required',
        'image' => 'required|image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.required' => 'The :attribute field can not be blank value.',
        'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);

    $slider = new Slider();


    $slider->title = $request->input('title');

    if($request->hasfile('image')){
        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('sliders')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/slider/',$filename);

        }else{
                $file->move('public/uploads/slider/',$filename);
            }

        $slider->image = $filename;
    }else{
        return redirect()->route('slider');
        $slider->image = '';
    }

    $slider->save();

    return redirect()->route('slider')->withSuccess('Files has been successfully uploaded.');
}



public function slider_edit($id){
    $sliders = SLider::find($id);
    return view('update_slider')->with('sliders',$sliders);
}



public function update_slider(Request $request, $id){

    $sliders = Slider::find($id);

    $image_path = "public/uploads/slider/".$sliders->image;



    $this->validate($request,[
        'image' => 'image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);


    $sliders->title = $request->input('title');

    if($request->hasfile('image')){


        if(file_exists($image_path)) {
            @unlink($image_path);
        }

        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('sliders')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/slider/',$filename);

        }else{
                $file->move('public/uploads/slider/',$filename);
            }

        $sliders->image = $filename;
    }

    $sliders->save();

    return redirect('/slider')->with('sliders',$sliders)->withSuccess('Files has been successfully updated.');
}



public function slider_delete($id){
    $sliders = SLider::find($id);
    $sliders->delete();
    $image_path = "public/uploads/slider/".$sliders->image;

     if (file_exists($image_path)){
           @unlink($image_path);
       }

    return redirect('/slider')->with('sliders',$sliders);
}

// slider code end!!...................................................................


//Upcoming Event Code Start..............................................................

public function upcoming_create(){
    $upcoming_events = UpcomingEvent::Paginate(1);
  return view('UpcomingEvent')->with('upcoming_events',$upcoming_events);

}



public function upcoming_store(Request $request){
    $this->validate($request,[
        'title' =>'required',
        'description' =>'required',
        'image' => 'required|image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.required' => 'The :attribute field can not be blank value.',
        'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);

    $upcoming_event = new UpcomingEvent();


    $upcoming_event->title = $request->input('title');
    $upcoming_event->description = $request->input('description');

    if($request->hasfile('image')){
        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('upcoming_events')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/upcoming_event/',$filename);

        }else{
                $file->move('public/uploads/upcoming_event/',$filename);
            }

        $upcoming_event->image = $filename;
    }else{
        return redirect()->route('upcoming_event');
        $upcoming_event->image = '';
    }

    $upcoming_event->save();

    return redirect()->route('upcoming_event')->withSuccess('Event has been successfully uploaded.');
}



public function upcoming_edit($id){
    $upcoming_events = UpcomingEvent::find($id);
    return view('update_up_event')->with('upcoming_events',$upcoming_events);
}



public function update_upcoming_event(Request $request, $id){

    $upcoming_events = UpcomingEvent::find($id);

    $image_path = "public/uploads/upcoming_event/".$upcoming_events->image;



    $this->validate($request,[
        'image' => 'image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);


    $upcoming_events->title = $request->input('title');
    $upcoming_events->description = $request->input('description');

    if($request->hasfile('image')){


        if(file_exists($image_path)) {
            @unlink($image_path);
        }

        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('upcoming_events')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/upcoming_event/',$filename);

        }else{
                $file->move('public/uploads/upcoming_event/',$filename);
            }

        $upcoming_events->image = $filename;
    }

    $upcoming_events->save();

    return redirect('/upcoming_event')->with('upcoming_events',$upcoming_events)->withSuccess('Upcoming Event has been successfully updated.');
}



public function upcoming_delete($id)
{
    $upcoming_events = UpcomingEvent::find($id);
    $check = userEventReg::where('eventid', $id)->get();
    $upcoming_events->delete();
    $check->each->delete();
    $image_path = "public/uploads/upcoming_event/".$upcoming_events->image;

     if (file_exists($image_path))
     {
           @unlink($image_path);
       }

    return redirect('/upcoming_event')->with('upcoming_events', 'check', $check, $upcoming_events)->withSuccess('Event Deleted successfully');
}

// Upcoming Event Code End

//post edit code start.........................................
public function editpost()
{
  $posts = Post::all();

  return view('edit_posts', compact('posts'));
}
public function delete_post($id)
{
  $posts= Post::find($id);
  $posts->delete();
  return redirect('edit_posts')->with('posts', $posts)->withSuccess('Selected Post has been deleted successfully');

}

// description code Start.....................................
public function create_description(){
  $description = description::find(1);
  return view('description')->with('description',$description);
}

public function store_description(Request $request, $id){

    $description = description::find($id);

    $image_path = "public/uploads/description/".$description->image;



    $this->validate($request,[
        'image' => 'image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);


    $description->title = $request->input('title');
    $description->description = $request->input('description');

    if($request->hasfile('image')){


        if(file_exists($image_path)) {
            @unlink($image_path);
        }

        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('descriptions')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/description/',$filename);

        }else{
                $file->move('public/uploads/description/',$filename);
            }

        $description->image = $filename;
    }

    $description->save();

    return redirect('/description')->with('description',$description)->withSuccess('Files has been successfully updated.');
}
//description code end.................................................


//Executive panel code Start
public function create_exec(){
    $executive = executive::Paginate(5);
  return view('executive')->with('executive',$executive);

}

public function store_exec(Request $request){
    $this->validate($request,[
        'name' =>'required',
        'title' =>'required',
        'std_id' =>'required',
        'contact' =>'required',
        'image' => 'required|image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.required' => 'The :attribute field can not be blank value.',
        'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);

    $executive = new executive();


    $executive->name = $request->input('name');
    $executive->title = $request->input('title');
    $executive->std_id = $request->input('std_id');
    $executive->contact = $request->input('contact');
    $executive->email = $request->input('email');


    if($request->hasfile('image')){
        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('executives')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/executive/',$filename);

        }else{
                $file->move('public/uploads/executive/',$filename);
            }

        $executive->image = $filename;
    }else{
        return redirect()->route('executive');
        $executive->image = '';
    }

    $executive->save();

    return redirect()->route('executive')->withSuccess('Files has been successfully uploaded.');
}



public function edit_exec($id){
    $executive = executive::find($id);
    return view('update_executive')->with('executive',$executive);
}



public function update_slider_exec(Request $request, $id){

    $executive = executive::find($id);

    $image_path = "public/uploads/executive/".$executive->image;



    $this->validate($request,[
        'image' => 'image|mimes:jpeg,JPEG,png,PNG,jpg,JPG|max:80000',

    ],[ 'image.uploaded' => 'The :attribute can be only JPG or JPEG or PNG.',
]);

    $executive->name = $request->input('name');
    $executive->title = $request->input('title');
    $executive->std_id = $request->input('std_id');
    $executive->contact = $request->input('contact');
    $executive->email = $request->input('email');

    if($request->hasfile('image')){


        if(file_exists($image_path)) {
            @unlink($image_path);
        }

        $file = $request->file('image');
        $filename=$file->getClientOriginalName();


        if (DB::table('executives')->where('image', '=', $filename)->exists()) {

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $file->move('public/uploads/executive/',$filename);

        }else{
                $file->move('public/uploads/executive/',$filename);
            }

        $executive->image = $filename;
    }

    $executive->save();

    return redirect('/executive')->with('executive',$executive)->withSuccess('Files has been successfully updated.');
}



public function delete_exec($id){
    $executive = executive::find($id);
    $executive->delete();
    $image_path = "public/uploads/executive/".$executive->image;

     if (file_exists($image_path)){
           @unlink($image_path);
       }

    return redirect('/executive')->with('executive',$executive);
}

// executive panel code end......................................

}
