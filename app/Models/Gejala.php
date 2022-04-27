<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Gejala extends Model
{
  use HasFactory;
  protected $table = 'gejala';

  public function getgejalaby($value){
    $filterData = DB::table('gejala')->where('gejala','LIKE','%'.$value.'%');
    return $filterData;
  }
}
