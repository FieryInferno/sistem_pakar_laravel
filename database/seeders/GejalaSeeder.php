<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GejalaSeeder extends Seeder
{
  public function run()
  {
    DB::table('gejala')->insert(['gejala' => 'gejala 1']);
  }
}
