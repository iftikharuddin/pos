<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.addcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$category = new Category;
			$category->name = Input::get('name');
			$category->code = Input::get('code');

		
			$image = Input::file('image');
			if($image != NULL){
				$filename  = time() . '.'.$image->getClientOriginalExtension();
				$path = public_path('img/' . $filename);
				Image::make($image->getRealPath())->resize(468, 249)->save($path);
				$category->image = 'public/img/'.$filename;
				$category->save();
				return Redirect::to('/category');
			}
			return Redirect::to('/category/create');
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
		$cat = Category::find($id);
        return view('category.update')->with('catToUpdate', $cat);
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
        $category = Category::find($id);
		$category->name = Input::get('name');
		$category->code = Input::get('code');
		$image = Input::file('image');
		
		$filename  = time() . '.'.$image->getClientOriginalExtension();
		$path = public_path('img/' . $filename);
		Image::make($image->getRealPath())->resize(468, 249)->save($path);
		$category->image = 'public/img/'.$filename;
		$category->save();		
		return Redirect::to('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find(Input::get('id'));
		if($category){
			File::delete($category->image);
			$category->delete();
			return Redirect::to('/category');
		}
    }
}
