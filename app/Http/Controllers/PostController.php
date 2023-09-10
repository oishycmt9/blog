<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create(){

        return view('post.post');

    }

    public function store(Request $request){

        $post = new Post();
        $post->user_id = $request->user_id;
        $post->status = false;
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->file('image')!=null)
        {
            //for image upload
            $logoImg = $request->file('image');
            $logoExt = $logoImg->getClientOriginalExtension();
            $time = time();
            $logoUrl = $time.'_'.$request->title.'.'.$logoExt;
            $directory = 'admin/Post/';
            $post->image = $directory.$logoUrl;
            $logoImg->move($directory,$logoUrl);
        }
        $post->category = $request->category;
        $post->save();
        return redirect('/posts');
    }

    public function show(){

        $role = auth()->user()->role_name;
        switch ($role) {
            case 'admin':
                $posts = Post::all();
                return view('post.post-show',['posts'=>$posts]);

            default:
                $user = auth()->user()->id;
                $posts = Post::where('status', 1)
                ->where('user_id', $user)
                ->get();
                return view('post.post-show',['posts'=>$posts]);
        }
    }

    public function edit($id){
        $post = Post::find($id);
        if(!$this->authorize('edit', $post)){
            abort(403);
        }
        $posts = Post::all();
        return view('post.edit-post',['post'=>$post,'posts'=>$posts]);
    }

    public function update(Request $request){

        $post = Post::find($request->id);
        if(!$this->authorize('update', $post)){
            abort(403);
        }
        $post->status = $request->status;
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->file('image')!=null)
        {
            //for image upload
            $logoImg = $request->file('image');
            $logoExt = $logoImg->getClientOriginalExtension();
            $time = time();
            $logoUrl = $time.'_'.$request->title.'.'.$logoExt;
            $directory = 'admin/Post/';
            $post->image = $directory.$logoUrl;
            $logoImg->move($directory,$logoUrl);
        }
        $post->category = $request->category;
        $post->update();
        return redirect('/posts/view');
    }

    public function delete ($id){
        $post = Post::find($id);
        if(!$this->authorize('delete', $post)){
            abort(403);
        }
        $post->delete();
        return redirect('/posts/view');
    }

}
