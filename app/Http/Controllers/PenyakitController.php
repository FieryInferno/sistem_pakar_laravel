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
    $request->validate([
      'penyakit'  => 'required',
      'solusi'    => 'required',
    ], [
      'penyakit.required' => 'Penyakit harus diisi.',
      'solusi.required'   => 'Solusi harus diisi.',
    ]);

    if($this->penyakit->where('penyakit', $request->penyakit)->first()){
      return redirect()->back()->with('status', 'Penyakit sudah ada.');
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
    $request->validate([
      'penyakit'  => 'required',
      'solusi'    => 'required',
    ], [
      'penyakit.required' => 'Penyakit harus diisi.',
      'solusi.required'   => 'Solusi harus diisi.',
    ]);
    
    if($this->penyakit->where('penyakit', $request->penyakit)){
      return redirect()->back()->with('status', 'Penyakit sudah ada.');
    }else{

      $penyakit_baru = $this->penyakit->find($id);
  
      $penyakit_baru->penyakit  = $request->penyakit;
      $penyakit_baru->solusi    = $request->solusi;
  
      $penyakit_baru->save();
  
      return redirect('/admin/penyakit')->with('status', 'Berhasil edit penyakit.');
    }
  }
  
  public function destroy($id)
  {
    $penyakit = $this->penyakit->find($id);

    $penyakit->delete();
    
    return redirect('/admin/penyakit')->with('status', 'Berhasil hapus penyakit.');
  }
}
