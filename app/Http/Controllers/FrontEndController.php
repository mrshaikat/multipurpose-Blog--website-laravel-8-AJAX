<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function homePage(){
        return view('frontend.home');
    }


    public function blogPage(){
            $all_post = Post::latest() -> paginate(5);
            $all_category = Category::latest() -> take(7) -> get();
            $all_tags = Tag::latest() -> take(5) -> get();
            $latest_post = Post::latest() -> take(5) -> get();
        return view('frontend.blog', compact('all_post', 'all_category', 'all_tags', 'latest_post'));
    }

    public function singlePost($slug){

        $single_post = Post::where('slug', $slug) -> first();
        $all_category = Category::latest() -> take(7) -> get();
            $all_tags = Tag::latest() -> take(5) -> get();
            $latest_post = Post::latest() -> take(5) -> get();
        return view('frontend.blog-single', compact('single_post', 'all_category','all_tags','latest_post'));
    }
}
