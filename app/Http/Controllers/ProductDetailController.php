<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productDetail= ProductDetail::latest()->paginate(5);

        return view('productDetail.index',compact('productDetail'))
            ->with('i', (request()->input('productDetail', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategory =  SubCategory::all();
        $product =  Product::all();
        $size =  Size::all();
        $color = Color::all();

        return view('productDetail.create',compact('subCategory','product','size','color'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ProductDetail $productDetail)
    {

            $productDetail= new ProductDetail([
            "product_id"=>$request->product,
            "subcategory_id"=>$request->subcategory,
            "size_id"=>$request->size,
            "color_id"=>$request->color,
            "price"=>$request->price,
            "stock"=>$request->stock,


        ]);
//        $productDetail->product()->sync($request->product);
//        $productDetail->subcategory()->sync($request->subcategory);
//        $productDetail->size()->sync($request->size);
//        $productDetail->color()->sync($request->color);
        $productDetail->save();
        //SubCategory::create($request->all());

        return redirect()->route('productDetail.index')
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
    public function edit(ProductDetail $productDetail)
    {
            $productDetail = ProductDetail::with('product','subcategory','color','size')->where('id',$productDetail->id)->first();
            $product = Product::all();
            $subcategory = SubCategory::all();
            $color = Color::all();
            $size = Size::all();
            //$product=Product::findOrFail($product);
        return view('productDetail.edit', compact('productDetail','product','color','subcategory','size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        $productDetail->update([
            "product_id"=>$request->product,
            "subcategory_id"=>$request->subcategory,
            "size_id"=>$request->size,
            "color_id"=>$request->color,
            "price"=>$request->price,
            "stock"=>$request->stock,

        ]);
        $productDetail->save();

//        $productDetail->product()->sync($request->product);
//        $productDetail->subcategory()->sync($request->subcategory);
//        $productDetail->size()->sync($request->size);
//        $productDetail->color()->sync($request->color);

        //SubCategory::create($request->all());

        return redirect()->route('productDetail.index')
            ->with('success', 'subcategory created successfully.');

//                $request->validate([
//
//            'product_id'=>'required',
//                    'subcategory_id'=>'required',
//            'size_id' => 'required',
//            'color_id' => 'required',
//            'price'=>'required',
//                    'stock'=>'required'
//
//                ]);
//
//        // $movie->update($request->all());
//        $productDetail=ProductDetail::find($id);
//        $productDetail->product_id=$request->get('product');
//        $productDetail->subcategory_id=$request->get('subcategory');
//        $productDetail->size_id=$request->get('size');
//        $productDetail->color_id=$request->get('color');
//        $productDetail->price=$request->get('price');
//        $productDetail->stock=$request->get('stock');
//
//        $productDetail->product()->sync($request->product);
//        $productDetail->subcategory()->sync($request->subcategory);
//        $productDetail->size()->sync($request->size);
//        $productDetail->color()->sync($request->color);
//        $productDetail->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetail $productDetail)
    {
        $productDetail->delete();
        return redirect()->route('productDetail.index')
            ->with('success', 'productDetail deleted successfully');
    }

}
