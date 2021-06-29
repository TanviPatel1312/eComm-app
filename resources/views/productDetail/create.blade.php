@extends("master")
@section("title","ProductDetail Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="pull-center">
                            <a class="btn btn-primary pull-center text-light"  href="{{ route('productDetail.index') }}"> back
                            </a><br><br>
                        </div>
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create product</h4>
                            <p class="card-category">Complete new Product</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('productDetail.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product</label>
                                            <select class="form-control" id="product" name="product">
                                                <option value="">-- Select Product --</option>
                                                @foreach($product as $p)
                                                    <option value="{{$p->id}}">{{($p->product_name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">SubCategory</label>
                                            <select class="form-control" id="subcategory" name="subcategory">
                                                <option value="">-- Select Subcategory --</option>
                                                @foreach($subCategory as $s)
                                                    <option value="{{$s->id}}">{{($s->subcategory_name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Size</label>
                                            <select class="form-control" id="size" name="size">
                                                <option value="">-- Select Size --</option>
                                                @foreach($size as $s)
                                                    <option value="{{$s->id}}">{{($s->size)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Color</label>
                                            <select class="form-control" id="color" name="color">
                                                <option value="">-- Select Color --</option>
                                                @foreach($color as $c)
                                                    <option value="{{$c->id}}">{{($c->color)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price</label>
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Stock</label>
                                            <input type="number" name="stock" class="form-control">
                                        </div>
                                    </div>



                                <button type="submit" class="btn btn-primary pull-right">Create Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
