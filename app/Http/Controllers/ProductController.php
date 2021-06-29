<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Size;
use Faker\Core\File;
use Faker\Provider\Image;
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
        $products = Product::all();
        return response()->json(['data'=>$products]);
        return Product::all();

//        $product= Product::latest()->paginate(5);
//        return view('product.index',compact('product'))
//            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category =  Category::all();
        return view('product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'product_name' => 'required',
//            'description' => 'required',
//            'slug' => 'required|unique:products,slug,' . $request->post('id'),
//        ]);
//
//        // Movie::create($request->all());
//
//        $product=new Product();
//        $product->category_id=$request->get('category');
//        $product->product_name=$request->get('product_name');
//        $product->description=$request->get('description');
//        $product->slug=$request->get('slug');
//
//        $product->save();
//        $product->categories()->sync($request->category);
//        return redirect()->routes('product.index')
//            ->with('success', 'product created successfully.');
        if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imagesName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imagesName);
            $product= new Product([
                "category_id"=>$request->category,
                "product_name"=>$request->product_name,
                "description"=>$request->description,
                "slug"=>$request->slug,
                "cover"=>$imagesName,
            ]);
            $product->save();
            $product->categories()->sync($request->category);

        }
        if($request->hasFile("product_image")){
            $files=$request->file("product_image");
            foreach ($files as $file){
                $imagesName=time().'_'.$file->getClientOriginalName();
                $request['product_id']=$product->id;
                $request['product_img']=$imagesName;
                $file->move(\public_path("/images"),$imagesName);
                ProductImages::create($request->all());
            }
        }
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
            $product = Product::with('categories')->where('id',$product->id)->first();
            $category = Category::all();
            //$product=Product::findOrFail($product);
            return view('product.edit', compact('category','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        $request->validate([
//
//            'category_id'=>'required',
//            'product_name' => 'required',
//            'description' => 'required',
//            'slug'=>'required'
//
//
//        ]);
//
//        // $movie->update($request->all());
//        $product=Product::find($product);
//        $product->category_id=$request->get('category');
//        $product->product_name=$request->get('product_name');
//        $product->description=$request->get('description');
//        $product->slug=$request->get('slug');
//        $product->categories()->sync($request->category);
//        $product->save();

        $product=Product::findOrFail($id);
        if($request->hasFile("cover")){
            if(File::exists("cover/".$product->cover)){
                File::delete("cover/".$product->cover);
            }
            $file=$request->file("cover");
            $product->cover=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$product->cover);
            $request['cover']=$product->cover;
        }
        $product->update([
            "category_id"=>$request->category,
            "product_name"=>$request->product_name,
            "description"=>$request->description,
            "slug"=>$request->slug,
            "cover"=>$product->cover,
        ]);
        if($request->hasFile("product_image")){
            $files=$request->file("product_image");
            foreach ($files as $file){
                $imagesName=time().'_'.$file->getClientOriginalName();
                $request['product_id']=$id;
                $request['product_img']=$imagesName;
                $file->move(\public_path("images"),$imagesName);
                ProductImages::create($request->all());
            }
        }
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
//        $product->delete();
//        return redirect()->route('product.index')
//            ->with('success', 'product deleted successfully');
        $products=Product::findOrFail($product);
        if(File::exitsts("cover/".$products->cover)){
            File::delete("cover/".$products->cover);
        }
        $images=Image::where("product_id",$products->id)->get();
        foreach ($images as $image){
            if(File::exitsts("images/".$image->image)){
                File::delete("images/".$image->image);
            }
    }
        $products->delete();
        return back();
    }
    public function getProduct()
    {
        $data = Product::get();

        return response()->json($data);
    }

}
