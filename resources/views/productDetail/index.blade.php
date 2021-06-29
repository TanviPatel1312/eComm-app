@extends("master")
@section("title","productDetail Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('productDetail.create') }}"> Create New Product
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Product Detail</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Product
                                    </th>
                                    <th>
                                        SubCategory
                                    </th>
                                    <th>
                                        Size
                                    </th>
                                    <th>
                                        Color
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Stock
                                    </th>

                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($productDetail as $p)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$p->product->product_name}}</td>
                                            <td>{{$p->subcategory->subcategory_name}}</td>
                                            <td>{{$p->size->size}}</td>
                                            <td>{{$p->color->color}}</td>
                                            <td>{{$p->price}}</td>
                                            <td>{{$p->stock}}</td>

                                            {{--                                            <td><img src="{{$p->cover}}" class="img-responsive" style="max-height: 100px; max-width: 100px " alt=""></td>--}}

                                            <td>
                                                <form action="{{route('productDetail.destroy',$p->id)}}" method="POST">


                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
                                                </form>
                                                <button class="btn btn-primary">
                                                    <a href="{{route('productDetail.edit',$p->id)}}" class="text-white" title="show">edit
                                                        </a>
                                                </button>
                                                {{--                                                <a class="btn btn-primary" href="{{routes('user.edit',$u->id)}}">Edit</a>--}}
                                                {{--                                                <a class="btn btn-danger" href="{{routes('user.destroy',$u->id)}}">Delete</a>--}}
                                            </td>

                                        </tr>

                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

