<?php

use Illuminate\Database\Seeder;
use App\Posts;

class PostsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://jsonplaceholder.typicode.com/posts');



        $posts = json_decode($json);

        // print_r($posts);

        foreach ($posts as $post) {
            Posts::create(
              [
              'userId' => $post->userId,
              'title' => $post->title,
              'body' => $post->body,
              'status' => 1,
              'created_at' => date('Y-m-d h:i:s'),
              'updated_at' => date('Y-m-d h:i:s'),
            ]
          );
        }//end foreach
    }
}
