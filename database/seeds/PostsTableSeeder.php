<?php

use Illuminate\Database\Seeder;

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
            'title' => 'This is a Base Announcement',
            'body' => 'Please feel free to delete this announcement and create a new one afterwards.',
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'user_id' => 1,
            'category_id' => 1,
            'cover_image' => 'noimage.jpg'
        ]);
    }
}
