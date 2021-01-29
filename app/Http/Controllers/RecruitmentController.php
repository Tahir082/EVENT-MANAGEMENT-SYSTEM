<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RecruitmentController extends Controller
{
  public function index()
  {
    $uservariable = User::all();
    return view('recruitmenthome', compact('uservariable'));
  }
}
