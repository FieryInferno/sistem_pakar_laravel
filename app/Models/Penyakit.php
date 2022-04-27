<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Penyakit extends Model
{
  use HasFactory;
  protected $table = 'penyakit';

  public function getpenyakitlaby($value){
    $filterData = DB::table('penyakit')->where('penyakit','LIKE','%'.$value.'%');
    return $filterData;
  }
}
