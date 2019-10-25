<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index(){
    return view('pages.index');
  }
  public function about(){
    return view('pages.about');
  }
}
