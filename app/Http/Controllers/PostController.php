<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('realtime.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('realtime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        $input = $request->all();
        $input['username'] = auth()->user()->name;
        $input['userid'] = auth()->user()->id;
        $input['userjob'] = auth()->user()->job;
        $input['report'] = "NULL";


        Post::create($input);

        return redirect()->route('store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$post = Post::find($id);
        return view('realtime.show', compact('post'));
    }

    public function report($id)
    {
      $post= Post::find($id);
      return view('report_post', compact('post'));
    }

    public function report_post(Request $request, $id)
    {
      $this->validate($request, [
        'report'=>'required',

      ]);
      $post= Post::find($id);
      $post->report=$request->get('report');
      $post->save();
      return redirect()->route('index')->withSuccess('The post has been reported to us');

    }
    public function delete($id)
    {
      $posts= Post::find($id);
      $posts->delete();
      return redirect()->route('index')->with('posts', $posts)->withSuccess('Your Post has been deleted successfully');

    }
}
