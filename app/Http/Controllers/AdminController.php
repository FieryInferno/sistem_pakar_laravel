<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    $penyakit = DB::table('penyakit')->count();
    $gejala = DB::table('gejala')->count();
    return view('admin/index', ['active' => 'dashboard','penyakit'=>$penyakit,'gejala'=>$gejala]);
  }
}
