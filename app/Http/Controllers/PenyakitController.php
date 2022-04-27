<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
  private $penyakit;

  public function __construct()
  {
    $this->penyakit = new Penyakit;
  }

  public function index()
  {
    return view('admin/penyakit/index', [
      'penyakit'  => $this->penyakit->all(),
      'active'  => 'penyakit',
    ]);
  }
  
  public function create()
  {
    return view('admin/penyakit/form', [
      'mode'    => 'add',
      'active'  => 'penyakit'
    ]);
  }
  
  public function store(Request $request)
  {
    if(!$request->penyakit){
      return redirect('/admin/penyakit/tambah')->with('status', 'data harus diisi.');
    }else{
      $this->penyakit->penyakit = $request->penyakit;
    $this->penyakit->solusi = $request->solusi;

    $this->penyakit->save();

    return redirect('/admin/penyakit')->with('status', 'Berhasil tambah penyakit.');
    }

  }
  
 public function edit($id)
  {
    $penyakit           = $this->penyakit->find($id);
    $penyakit['mode']   = 'edit';
    $penyakit['active'] = 'penyakit';
    return view('admin/penyakit/form', $penyakit);
  }

  public function update(Request $request, $id)
  {
    $penyakit_baru = $this->penyakit->find($id);

    $penyakit_baru->penyakit  = $request->penyakit;
    $penyakit_baru->solusi    = $request->solusi;

    $penyakit_baru->save();

    return redirect('/admin/penyakit')->with('status', 'Berhasil edit penyakit.');
  }
  
  public function destroy($id)
  {
    $penyakit = $this->penyakit->find($id);

    $penyakit->delete();
    
    return redirect('/admin/penyakit')->with('status', 'Berhasil hapus penyakit.');
  }
}
