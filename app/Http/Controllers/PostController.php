<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_data  = Post::latest() -> get();
        $all_category  = Category::all();

        return view('admin.post.index', compact('all_data', 'all_category'));
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
        $this-> validate($request, [
            'title'  => 'required',
            'content'  => 'required',

        ]);

        if($request-> hasFile('fimg')){
            $img = $request -> file('fimg');
            $file_name = md5(rand().time()).'.'. $img -> getClientOriginalExtension();
            $img -> move(public_path('admin/media/post'), $file_name);

        }else{

            $file_name = '';

        }

        $post_user = Post::create([
            'title'  => $request -> title,
            'slug'  => Str::slug($request -> title),
            'author_id'  => Auth::user() -> id,
            'post_content'  => $request -> content,
            'featured_img'  => $file_name,

        ]);

        $post_user -> categories() -> attach( $request -> category);

        return redirect() -> route('post.index') -> with('success', 'Post added Successfull');
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
