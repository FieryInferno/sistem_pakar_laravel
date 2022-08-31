<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gejala;
use App\Models\Relasi;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LoginController;
use Session;

class LoginController extends Controller
{
  private $gejala;
  private $relasi;

  public function __construct()
  {
    $this->gejala   = new Gejala;
    $this->relasi   = new Relasi;
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
    ], [
      'username.required' => 'Username harus diisi.',
      'password.required' => 'Password harus diisi.',
    ]);

    $username = User::where('username', $request->username)->first();

    if (!$username) {
        return redirect()->back()->withErrors(['pesan' => 'Username yang anda masukan salah']);
    }

    $password = Hash::check($request->password, $username->password);
    
    if (!$password) {
      return redirect()->back()->withErrors(['pesan' => 'Password yang anda masukan salah']);
  }

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect('admin')->with('status', 'Admin berhasil login');
    }

    // return redirect('login')->with('status', 'username atau password salah');

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
    return view('welcome', ['gejala'  => $this->gejala->all()]);
  }

  public function cekPenyakit(Request $request)
  {
    $request->validate([
      'gejala'  => 'required',
    ], [
      'gejala.required' => 'Gejala harus diisi.',
    ]);
    $data['hasil']  = $this->relasi->where('gejala', '=', json_encode($request->gejala))->first();
    // DB::table('komentars')->insert([
    //   'nama' => $request->nama,
    //   'komentar' => $request->komentar
    // ]); 
    // return view('hasil', $data);
    session(['hasilCek' => $data]);
    return redirect('hasil');
  }

  public function hasil()
  {
    return view('hasil', Session::get('hasilCek'));
  }

  public function Komentar(Request $request)
  {
    // $data['hasil']  = $this->relasi->where('gejala', '=', json_encode($request->gejala))->first();
    DB::table('komentars')->insert([
      'nama' => $request->nama,
      'komentar' => $request->komentar
    ]); 
    return view('hasil');
  }
}
