@extends("master")
@section("title","Product Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Profile</h4>
                            <p class="card-category">Complete new Product</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <strong>Upload Movie Image:</strong>
                                    <input type="file" name="movie_img" class="form-control">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" name="description" class="form-control" value="{{$product->description}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Price	</label>
                                            <input type="number" name="price" class="form-control" value="{{$product->price}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Qty</label>
                                            <input type="number" name="qty" class="form-control" value="{{$product->qty}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Size</label>
                                            <select name="state" class="form-control" id="state">
                                                <option value="">-- Select Size --</option>
                                                @foreach ($size as $s)
                                                    <option value="{{$s->id}}">{{($s->size) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Color</label>
                                            <select name="state" class="form-control" id="state">
                                                <option value="">-- Select Color --</option>
                                                @foreach ($color as $c)
                                                    <option value="{{$c->id}}">{{($c->color) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Create Product</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

