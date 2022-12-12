<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($x = 1; $x <= 5; $x++) {
            $data[] = ['title'=>'Todo '.$x, 'description'=> 'Todo '.$x.' Description','created_at'=>now()];
        }
        Todo::insert($data);
    }
}
