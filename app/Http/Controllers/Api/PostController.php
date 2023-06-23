<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);
    }

    public function store(PostStoreRequest $request)
    {
        // $post = Post::create([
        //     'title' => $request->title,
        //     'text'  => $request->text,
        //     'author'=> $request->author
        // ]);

        // Simple Query Store "Recommended"
        $post = Post::create($request->all());

        return new PostResource($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        // $post->update([
        //     'title' => $request->title,
        //     'slug' => $request->slug,
        //     'text' => $request->text,
        //     'author' => $request->author,
        // ]);

        // Simple Query Update "Recommended"
        $post->update($request->all());


        return new PostResource($post);
    }


    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
}
