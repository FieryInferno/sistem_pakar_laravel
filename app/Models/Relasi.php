<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relasi extends Model
{
  use HasFactory;
  protected $table = 'relasi';

  public function penyakit()
  {
    return $this->hasOne(Penyakit::class, 'id', 'penyakit_id');
  }
}
