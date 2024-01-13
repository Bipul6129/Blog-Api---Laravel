<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class blogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blog=[
            [
                'title'=>'writing first head',
                'description'=>'it is your first time writing ',
                'category_id'=>4
            ]
        ];
        foreach($blog as $key=>$value){
            Blog::create($value);
        }
    }
}
