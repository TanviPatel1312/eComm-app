<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory= SubCategory::latest()->paginate(5);
        return view('subcategory.index',compact('subcategory'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category =  Category::all();
        return view('subcategory.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subcategory= new SubCategory([
            "category_id"=>$request->category,
            "subcategory_name"=>$request->subcategory_name,
        ]);
        $subcategory->save();

       $subcategory->categories()->sync($request->category);
       //SubCategory::create($request->all());

        return redirect()->route('subcategory.index')
            ->with('success', 'subcategory created successfully.');
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
    public function edit(SubCategory $subcategory)
    {
        //$subcategory = SubCategory::with('categories')->where('id',$subcategory)->first();
      $category = Category::all();
//        $subcategory=SubCategory::findOrFail($subcategory);
        return view('subcategory.edit',compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {

        $subCategory->update([
            "category_id"=>$request->categories,
            "subcategory_name"=>$request->subcategory_name,


        ]);
        $subCategory->save();


        return redirect()->route('subcategory.index')
            ->with('success', 'Subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategory.index')
            ->with('success', 'subcategory deleted successfully');
    }
}
