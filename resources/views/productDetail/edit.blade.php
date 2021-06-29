@extends("master")
@section("title","Product Page")
@section("content")
    <script src="{{ asset('/js/jquery.js') }}" type="text/javascript"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
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
                            <h4 class="card-title">Update product</h4>
                            <p class="card-category">Complete Update Product</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('productDetail.update',$productDetail->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product</label>
                                            <select class="form-control" id="product" name="product">
                                                <option value="">-- Select Product --</option>
                                                @foreach ($product as $p)
                                                    <option value="{{$p->id}}" selected>{{($p->product_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Subcategory</label>
                                            <select class="form-control" id="subcategory" name="subcategory">
                                                <option value="">-- Select Subcategory --</option>
                                                @foreach ($subcategory as $s)
                                                    <option value="{{$s->id}}" selected>{{($s->subcategory_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Size</label>
                                            <select class="form-control" id="size" name="size">
                                                <option value="">-- Select Size --</option>
                                                @foreach ($size as $s)
                                                    <option value="{{$s->id}}" selected>{{($s->size) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Color</label>
                                            <select class="form-control" id="color" name="color">
                                                <option value="">-- Select Color --</option>
                                                @foreach ($color as $c)
                                                    <option value="{{$c->id}}" selected>{{($c->color) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">price</label>
                                            <input type="text" name="price" class="form-control" value="{{$productDetail->price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Stock</label>
                                        <input type="text" name="stock" class="form-control" value="{{$productDetail->stock}}">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary pull-right">Upadte ProductDetail</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
