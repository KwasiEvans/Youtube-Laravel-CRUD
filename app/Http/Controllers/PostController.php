<?php

namespace App\Http\Controllers;

use App\Models\PostData;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $posts = PostData::latest()->get();
        return view('welcome', compact(['posts']));
    }
    public function post(Request $request){
     try {
        $post = new PostData();
        $post->text_post = $request->post_text;
        if($request->hasFile('post_image')){
            $uploadImage = $request->file('post_image');
            if($uploadImage){
                $path = $uploadImage->store('posts', 'public');
                $post->image_post = $path;
            }
        }
        $post->save();
        return back()->with('success', "Successfully posted");
     } catch (\Exception $e) {
        return $e->getMessage();
     }
    }

    public function delete(Request $request, $id){
     try {
        $deletePost = PostData::findOrFail($id);
        $deletePost->delete();
        return back()->with('success', 'completed');
     } catch (\Exception $e) {
        return $e->getMessage();
     }
    }

    public function view_edit(Request $request, $id){
        $posts = PostData::findOrFail($id);
        return view('edit', compact(['posts']));
    }

    public function edit(Request $request, $id){
        try{
           $post = PostData::find($id);
           if($post){
            $post->text_post = $request->post_text;
            if($request->hasFile('post_image')){
                $uploadImage = $request->file('post_image');
                if($uploadImage){
                    $path = $uploadImage->store('posts', 'public');
                    $post->image_post = $path;
                }
            }
            $post->save();
            return redirect()->route('home');
           }
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
