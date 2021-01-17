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

    public function postByCategory($slug){

        $cats = Category::where('slug', $slug) ->  first();
        return view('frontend.category-search', compact('cats'));

    }

    public function postByTag($slug){

        $tags = Tag::where('slug', $slug) ->  get();
        return view('frontend.tag-search', compact('tags'));

    }

    public function postByLatest($slug){

        $all_pp = Post::where('slug', $slug) ->  get();
        return view('frontend.latest-search', compact('all_pp'));

    }


    public function postBySearch(Request $request){

        $search_title = $request -> search;

        $posts = Post::where('title','like', '%'.$search_title.'%') -> get();

        return view('frontend.search', compact('posts'));
    }
}
