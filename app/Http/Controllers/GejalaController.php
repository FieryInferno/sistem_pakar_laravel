<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
  private $gejala;

  public function __construct()
  {
    $this->gejala = new Gejala;
  }

  public function index()
  {
    return view('admin/gejala/index', [
      'gejala'  => $this->gejala->all(),
      'active'  => 'gejala',
    ]);
  }
  
  public function create()
  {
    return view('admin/gejala/form', [
      'mode'    => 'add',
      'active'  => 'gejala'
    ]);
  }
  
  public function store(Request $request)
  {
    error_reporting(0);

    $data = $request->gejala;
    $gejala = $this->gejala->getgejalaby($data)->get();

    if ($request->gejala == null){
      return redirect('/admin/gejala/tambah')->with('status', 'data tidak boleh kosong');

    }else if($request->gejala == $gejala[0]->gejala) {

      return redirect('/admin/gejala/tambah')->with('status', 'data "' . $request->gejala . '" sudah ada' );

    }else{
    $this->gejala->gejala = $request->gejala;

    $this->gejala->save();

    return redirect('/admin/gejala')->with('status', 'Berhasil tambah gejala.');
    }
  }
  
  public function edit($id)
  {
    $gejala           = $this->gejala->find($id);
    $gejala['mode']   = 'edit';
    $gejala['active'] = 'gejala';
    return view('admin/gejala/form', $gejala);
  }

  public function update(Request $request, $id)
  {
    error_reporting(0);
    // dd($request);
    $gejala_baru = $this->gejala->find($id);
    $data = $request->gejala;
    $gejala = $this->gejala->getgejalaby($data)->get();
  
    if ($request->gejala == null){
      return redirect('/admin/gejala/edit/1')->with('status', 'data tidak boleh kosong');
    }else if($request->gejala == $gejala[0]->gejala) {
      return redirect('/admin/gejala/edit/1')->with('status', 'data "' . $request->gejala . '" sudah ada' );

    }else{
    $gejala_baru->gejala  = $request->gejala;

    $gejala_baru->save();

    return redirect('/admin/gejala')->with('status', 'Berhasil edit gejala.');
  }

}
  
  public function destroy($id)
  {
    $gejala = $this->gejala->find($id);

    $gejala->delete();
    
    return redirect('/admin/gejala')->with('status', 'Berhasil hapus gejala.');
  }
}
