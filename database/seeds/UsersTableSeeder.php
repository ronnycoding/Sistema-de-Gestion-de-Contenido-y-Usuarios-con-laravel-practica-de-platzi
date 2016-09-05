<?php

use Illuminate\Database\Seeder;

use laravelapplication\User;

use laravelapplication\Post;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//truncate limpia las bases de datos
    	User::truncate();
    	
    	Post::truncate();
    	
        factory(User::class, 30)->create()->each(function ($user)
        {
        	$post = factory(Post::class)->make();
        	$user->posts()->save($post);
        });
    }
}
