<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relasi;
use App\Models\Penyakit;
use App\Models\Gejala;

class RelasiController extends Controller
{
  private $relasi;
  private $penyakit;
  private $gejala;

  public function __construct()
  {
    $this->relasi   = new Relasi;
    $this->penyakit = new Penyakit;
    $this->gejala = new Gejala;
  }

  public function index()
  {
    $relasi = $this->relasi->all();

    for ($i=0; $i < count($relasi); $i++) {
      $gejalaa  = json_decode($relasi[$i]->gejala);
      $gejala   = [];

      for ($j=0; $j < count($gejalaa); $j++) {
        $gejala[$j] = $this->gejala->find($gejalaa[$j]);
      }

      $relasi[$i]->gejala  = $gejala;
    }

    return view('admin/relasi/index', [
      'relasi'  => $relasi,
      'active'  => 'relasi',
    ]);
  }
  
  public function create()
  {
    return view('admin/relasi/form', [
      'mode'      => 'add',
      'active'    => 'relasi',
      'penyakit'  => $this->penyakit->all(),
      'gejalaa'   => $this->gejala->all(),
    ]);
  }
  
  public function store(Request $request)
  {
    $request->validate([
      'penyakit_id' => 'required',
      'gejala'      => 'required',
    ], [
      'penyakit_id.required'  => 'Penyakit harus diisi.',
      'gejala.required'       => 'Gejala harus diisi.',
    ]);

    if($this->relasi->where('penyakit_id', $request->penyakit_id)){
      return redirect()->back()->with('status', 'Penyakit sudah ada.');
    } else {
      $this->relasi->penyakit_id  = $request->penyakit_id;
      $this->relasi->gejala       = json_encode($request->gejala);
  
      $this->relasi->save();
  
      return redirect('/admin/relasi')->with('status', 'Berhasil tambah diagnosis.');
    }
  }
  
  public function edit($id)
  {
    $relasi             = $this->relasi->find($id);
    $relasi['mode']     = 'edit';
    $relasi['active']   = 'relasi';
    $relasi['gejalaa']  = $this->gejala->all();
    $relasi['penyakit'] = $this->penyakit->all();

    return view('admin/relasi/form', $relasi);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'penyakit_id' => 'required',
      'gejala'      => 'required',
    ], [
      'penyakit_id.required'  => 'Penyakit harus diisi.',
      'gejala.required'       => 'Gejala harus diisi.',
    ]);

    if($this->relasi->where('penyakit_id', $request->penyakit_id)){
      return redirect()->back()->with('status', 'Penyakit sudah ada.');
    } else {
      $relasi_baru = $this->relasi->find($id);
  
      $relasi_baru->penyakit_id  = $request->penyakit_id;
      $relasi_baru->gejala       = json_encode($request->gejala);
  
      $relasi_baru->save();
  
      return redirect('/admin/relasi')->with('status', 'Berhasil edit diagnosis.');
    }
  }
  
  public function destroy($id)
  {
    $relasi = $this->relasi->find($id);

    $relasi->delete();
    
    return redirect('/admin/relasi')->with('status', 'Berhasil hapus diagnosis.');
  }
}
