<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category=[
            [
                'name'=>'war',
                'description'=>'this is war where it is very bad'
            ],
            [
                'name'=>'science',
                'description'=>'this is science where it is very hard'
            ]
        ];
        foreach($category as $key=>$value){
            BlogCategory::create($value);
        }
    }
}
