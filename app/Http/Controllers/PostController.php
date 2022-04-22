<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->validated());
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('images');
        }
        if ($request->hasFile('download')) {
            $post->addMediaFromRequest('download')->withResponsiveImages()->toMediaCollection('downloads');
        }
        return to_route('posts.index');
    }
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostCreateRequest $request, Post $post)
    {
        $post->update($request->validated());
        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')->withResponsiveImages()->toMediaCollection('images');
        }
        if ($request->hasFile('download')) {
            $post->addMediaFromRequest('download')->withResponsiveImages()->toMediaCollection('downloads');
        }

        return to_route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return to_route('posts.index');
    }

    public function download($id)
    {
        $post = Post::findOrFail($id);
        $media = $post->getFirstMedia('downloads');

        return $media;
    }

    public function downloads()
    {
        // $media = Media::where('collection_name', 'downloads')->get();

        return MediaStream::create('downloads.zip')->addMedia(Media::all());
    }

    public function resImage($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
