<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{

    protected $komentar;
    
  public function __construct()
  {
    $this->komentar = new Komentar;
  }
  
  public function store(Request $request)
  {
    $request->validate([
      'nama'      => 'required',
      'komentar'  => 'required',
    ], [
      'nama.required'     => 'Nama harus diisi.',
      'komentar.required' => 'Komentar harus diisi.',
    ]);

    $this->komentar->nama     = $request->nama;
    $this->komentar->komentar = $request->komentar;

    $this->komentar->save();
    return redirect('/welcome')->with('status', 'Komentar sudah terkirim');
  }

  public function index()
  {
    return view('admin/komentar/index', [
      'komentar'  => $this->komentar->all(),
      'active'  => 'komentar',
    ]);
  }
  
  public function destroy($id)
  {
    $komentar = $this->komentar->find($id);

    $komentar->delete();
    
    return redirect('/admin/komentar')->with('status', 'Berhasil hapus komentar.');
  }
}
