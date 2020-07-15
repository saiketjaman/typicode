<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DB;
use Carbon\Carbon;
use App\Posts;
use App\Comments;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')
          ->leftjoin('comments', 'posts.id', '=', 'comments.postId')
          ->select(
              'posts.id',
              'posts.title',
              'posts.body',
              DB::raw("count(posts.id) AS total_number_of_comments")
          )
          ->groupBy('posts.id')
          ->groupBy('posts.title')
          ->groupBy('posts.body')
          ->orderBy('total_number_of_comments', 'DESC')
          ->where('posts.status', 1)
          ->orderby('posts.id', 'desc')
          ->paginate(10);

        return $posts;
    }


    /**
     * Display a search listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $input = $request->input('search');
        $comments = Comments::where('postId', 'LIKE', '%' . $input . '%')
          ->orWhere('name', 'LIKE', '%' . $input . '%')
            ->orWhere('email', 'LIKE', '%' . $input . '%')
            ->orWhere('body', 'LIKE', '%' . $input . '%')
              ->orderby('id', 'desc')
          ->paginate(10);
        return $comments;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
