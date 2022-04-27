<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gejala;
use App\Models\Relasi;

class LoginController extends Controller
{
  private $gejala;
  private $relasi;

  public function __construct()
  {
    $this->gejala = new Gejala;
    $this->relasi = new Relasi;
  }

  public function login()
  {
    return view('login');
  }

  public function store(Request $request)
  {
    $credentials = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect('admin')->with('status', 'Admin berhasil login');
    }

    return redirect('login')->with('status', 'username atau password salah');

  }

  public function logout(Request $request)
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }

  public function welcome()
  {
    return view('welcome', ['gejala' => $this->gejala->all()]);
  }

  public function cekPenyakit(Request $request)
  {
    $data['hasil']  = $this->relasi->where('gejala', '=', json_encode($request->gejala))->first();

    // dd($data['hasil']);
    
    return view('hasil', $data);
  }
}
