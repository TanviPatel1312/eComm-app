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
                            <a class="btn btn-primary pull-center text-light"  href="{{ route('subcategory.index') }}"> back
                            </a><br><br>
                        </div>
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Update product</h4>
                            <p class="card-category">Complete Update Product</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <select class="form-control" id="category" name="category">
                                                <option value="">-- Select Category --</option>
                                                @foreach ($category as $c)
                                                    <option value="{{$c->id}}" {{ $c->id == $c->category_id ? 'selected' : '' }}selected>{{($c->category_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
{{--                                                                        <div class="form-group">--}}
{{--                                                                            <label>Category</label>--}}
{{--                                                                            <select name="category" class=" form-control select2 select2-hidden-accessible"--}}
{{--                                                                                    data-placeholder="Select a category" style="width: 100%;" tabindex="-1" aria-hidden="true">--}}
{{--                                                                                @foreach($category as $c)--}}
{{--                                                                                    <option value="{{$c->id}}"--}}
{{--                                                                                            @foreach($product->$category as $procat)--}}
{{--                                                                                            @if($procat->id == $c->id)--}}
{{--                                                                                            selected--}}
{{--                                                                                        @endif--}}
{{--                                                                                        @endforeach--}}

{{--                                                                                    >{{$c->category_name}}</option>--}}
{{--                                                                                @endforeach--}}
{{--                                                                            </select>--}}
{{--                                                                        </div>--}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Name</label>
                                            <input type="text" name="subcategory_name" class="form-control" value="{{$subcategory->subcategory_name}}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Upadte Subcategory</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
