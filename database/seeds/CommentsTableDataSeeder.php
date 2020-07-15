<?php

use Illuminate\Database\Seeder;
use App\Comments;

class CommentsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://jsonplaceholder.typicode.com/comments');
        $comments = json_decode($json);
        foreach ($comments as $comment) {
            Comments::insert(
                [
              'postId' => $comment->postId,
              'name' => $comment->name,
              'email' => $comment->email,
              'body' => $comment->body,
              'status' => 1,
              'created_at' => date('Y-m-d h:i:s'),
              'updated_at' => date('Y-m-d h:i:s'),
            ]
            );
        }//end foreach
    }
}
