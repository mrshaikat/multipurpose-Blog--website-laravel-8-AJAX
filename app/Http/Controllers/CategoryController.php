<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $all_data = Category::all();
        return view('admin.post.category.index', compact('all_data'));
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

            'name'  => 'required',

        ]);

        if( !empty($request -> status)){

            $default = $request -> status;
        }else{

            $default = 'Published';
        }

        Category::create([

            'name'  => $request -> name,
            'slug'  => Str::slug($request -> name),
            'status'  => $default,
        ]);

        return redirect() -> route('post-category.index') -> with('success', 'Category Added Successfull');
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
        $data  = Category::find($id);

        return [
            'name'  => $data -> name,
            'id'  => $data -> id,
        ];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id = $request -> id;

       $data = Category::find($id );

       $data -> name = $request -> name;
       $data -> slug = Str::slug($request -> name);

       $data -> update();

       return redirect() -> route('post-category.index') -> with('success', 'Category Update Successfull');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data -> delete();

        return redirect() -> route('post-category.index') -> with('success', 'Category Delete Successfull');
    }

    public function unpublishedCategory($id){
        $data = Category::find($id);
        $data -> status = 'Unpublished';
        $data -> update();

        return redirect() -> route('post-category.index') -> with('success', 'Category Unpublished Successfull');
    }


    public function publishedCategory($id){
        $data = Category::find($id);
        $data -> status = 'Published';
        $data -> update();

        return redirect() -> route('post-category.index') -> with('success', 'Category Published Successfull');
    }

}
