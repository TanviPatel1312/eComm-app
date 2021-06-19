<?php

namespace App\Http\Controllers;


use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= Product::latest()->paginate(5);
        return view('product.index',compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = Size::all();
        $color = Color::all();

        return view('product.create',compact('size','color'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'product_img' => 'required',
            'qty' => 'required',
            'size_id'=> 'required',
            'color_id'=> 'required'
        ]);

        // Movie::create($request->all());
        $file=$request->file('product_img');
        if($file->isvalid())
        {
            $destinationpath='productimg/';
            $image=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$image);
        }
        $product=new Product();
        $product->product_name=$request->get('product_name');
        $product->description=$request->get('description');
        $product->price=$request->get('price');
        $product->qty=$request->get('qty');
        $product->size_id=$request->get('size_id');
        $product->color_id=$request->get('color_id');
        $product->product_img=$image;
        $product->save();
        Product::create($request->all());

        return redirect()->route('product.index')
            ->with('success', 'product created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'product_img' => 'required',
            'qty' => 'required',
            'size_id'=> 'required',
            'color_id'=> 'required'
        ]);
        // $movie->update($request->all());
        $product=Product::find($product);
        $file=$request->file('movie_img');
        if($file->isvalid())
        {
            $destinationpath='movieimg/';
            $image=date('ymdHis').'.'.$file->getClientOriginalExtension();
            $file->move($destinationpath,$image);
        }
        $product->product_name=$request->get('product_name');
        $product->description=$request->get('description');
        $product->price=$request->get('price');
        $product->qty=$request->get('qty');
        $product->size_id=$request->get('size_id');
        $product->color_id=$request->get('color_id');
        $product->product_img=$image;
        $product->save();
        return redirect()->route('product.index')
            ->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
            ->with('success', 'product deleted successfully');
    }

}
