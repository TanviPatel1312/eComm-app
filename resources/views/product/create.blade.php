@extends("master")
@section("title","Product Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="pull-center">
                            <a class="btn btn-primary pull-center text-light"  href="{{ route('product.index') }}"> back
                            </a><br><br>
                        </div>
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create product</h4>
                            <p class="card-category">Complete new Product</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <select class="form-control" id="category" name="category">
                                                <option value="">-- Select Category --</option>
                                                @foreach ($category as $c)
                                                    <option value="{{$c->id}}">{{($c->category_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Name</label>
                                            <input type="text" name="product_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description</label>
                                            <input type="text" name="description" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">slug	</label>
                                            <input type="slug" name="slug" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <strong>Upload cover Image:</strong>
                                <input type="file" name="cover" class="form-control">

                                <strong> Product Images:</strong>
                                <input type="file" name="product_image[]" class="form-control" multiple>


                                <button type="submit" class="btn btn-primary pull-right">Create Product</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
