<?php

use Illuminate\Database\Seeder;
use DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'body' => Str::random(10).'@gmail.com',
            'user_id' => 1,
            'cover_image' => 'noimage.jpg'
        ]);
    }
}
