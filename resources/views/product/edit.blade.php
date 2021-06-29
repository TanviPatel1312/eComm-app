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
                            <a class="btn btn-primary pull-center text-light"  href="{{ route('product.index') }}"> back
                            </a><br><br>
                        </div>
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update product</h4>
                            <p class="card-category">Complete Update Product</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <select class="form-control" id="category" name="category">
                                                <option value="">-- Select Category --</option>
                                                @foreach ($category as $c)
                                                    <option value="{{$c->id}}" {{ ( $c == $category) ? 'selected' : '' }} selected>{{($c->category_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <label>Category</label>--}}
{{--                                        <select name="category" class=" form-control select2 select2-hidden-accessible"--}}
{{--                                                data-placeholder="Select a category" style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
{{--                                            @foreach($category as $c)--}}
{{--                                                <option value="{{$c->id}}"--}}
{{--                                                        @foreach($product->$category as $procat)--}}
{{--                                                        @if($procat->id == $c->id)--}}
{{--                                                        selected--}}
{{--                                                    @endif--}}
{{--                                                    @endforeach--}}

{{--                                                >{{$c->category_name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
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
                                            <label class="bmd-label-floating">slug	</label>
                                            <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
                                        </div>
                                    </div>
                                </div>
                                <strong>Upload cover Image:</strong>
                                <input type="file" name="cover" class="form-control">
                                <img src="/cover/{{$product->cover}}" class="rounded-circle" height="100px" width="80px">
                                <strong> Product Images:</strong>
                                <input type="file" name="product_image[]" class="form-control" multiple>
                                @foreach($product->images as $img)
                                <img src="/images/{{$img->product_img}}" class="rounded-circle" height="100px" width="80px">
                                @endforeach

                                <button type="submit" class="btn btn-primary pull-right">Create Product</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
