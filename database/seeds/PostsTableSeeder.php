<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset posts table
        DB::table('posts')->truncate();

        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2019,4,9,9);

        for($i=0;$i<10;$i++){
            $image = "Post_image_".rand(1,5).".jpg";
            $date->addDays(1);
            $publishDate = clone($date);

            $posts[] = [
                'author_id'=>rand(1,3),
                'title'=>$faker->sentence(rand(8,12)),
                'excerpt'=>$faker->text(rand(250,300)),
                'body'=>$faker->paragraphs(rand(10,15),true),
                'slug'=>$faker->slug(),
                'image'=>rand(0,1)==1?$image:NULL,
                'created_at'=>clone($date),
                'updated_at'=>clone($date),
                'published_at'=>$i<5 ? $publishDate:(rand(0,1)==0?NULL:$publishDate->addDays(4)),
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
