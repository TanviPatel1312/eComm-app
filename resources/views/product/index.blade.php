@extends("master")
@section("title","product Profile")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{route('product.create')}}"> Create New Product
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">User Detail</h4>
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
                                        Category
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                       Slug
                                    </th>
                                    <th>
                                        cover
                                    </th>

                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($product as $p)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$p->category->category_name}}</td>
                                            <td>{{$p->product_name}}</td>
                                            <td>{{$p->description}}</td>
                                            <td>{{$p->slug}}</td>
{{--                                            <td><img src="{{$p->cover}}" class="img-responsive" style="max-height: 100px; max-width: 100px " alt=""></td>--}}
                                            <td><img src="{{('/cover/'.$p->cover)}}" class="rounded-circle" height="100px" width="80px"></td>

                                            <td>
                                                <form action="{{route('product.destroy',$p->id)}}" method="POST">




                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button class="btn btn-primary">
                                                    <a href="{{route('product.edit',$p->id)}}" class="text-white" title="show">
                                                        Edit</a>
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

