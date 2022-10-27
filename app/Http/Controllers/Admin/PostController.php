<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendPostCreatedMail;
use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name','asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'title'=> 'required|max:255|min:5',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $params['slug'] = str_replace(' ','-',$params['title']);
        
        
        if(array_key_exists('image',$params)) {
            $img_path = Storage::disk('public')->put('post_covers',$params['image']);
            $params['cover'] = $img_path;
        }

        $post = Post::create($params);

        if(array_key_exists('tags',$params)) {
            $tags = $params['tags'];
            $post->tags()->sync($tags);
        }

        Mail::to('aloa@gmail.com')->send(new SendPostCreatedMail());

        return redirect()->route('admin.posts.show',$post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        return view('admin.posts.edit',compact('categories','post','tags'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $params = $request->validate([
            'title'=> 'required|max:255|min:5',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id',
            'image' => 'nullable|image|max:2048'
        ]);

        $params['slug'] = str_replace(' ','-',$params['title']);

        if(array_key_exists('image',$params)) {
            $img_path = Storage::disk('public')->put('post_covers',$params['image']);
            $params['cover'] = $img_path;
        }

        $post->update($params);

        if(array_key_exists('tags',$params)) {
            $post->tags()->sync($params['tags']);
        }else {
            $post->tags()->detach();
        }


        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $coverPath = $post->cover;
        $post->delete();

        if ($coverPath && Storage::disk('public')->exists($coverPath)) {
            Storage::disk('public')->delete($coverPath);
        }

        return redirect()->route('admin.posts.index');
    }
}
