<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenyakitSeeder extends Seeder
{
  public function run()
  {
    DB::table('penyakit')->insert([
      'penyakit'  => 'penyakit 1',
      'solusi'    => 'solusi 1',
    ]);
  }
}
