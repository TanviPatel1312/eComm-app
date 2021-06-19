@extends("master")
@section("title","product Profile")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('product.create') }}"> Create New Product
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
                                        ProductImg
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                       Price
                                    </th>

                                    <th>
                                        Qty
                                    </th>
                                    <th>
                                        size
                                    </th>
                                    <th>
                                        color
                                    </th>

                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($product as $p)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$p->product_img}}</td>
                                            <td>{{$p->product_name}}</td>
                                            <td>{{$p->description}}</td>
                                            <td>{{$p->price}}</td>
                                            <td>{{$p->qty}}</td>
                                            <td>{{$p->size_id}}</td>
                                            <td>{{$p->color_id}}</td>

                                            <td>
                                                <form action="{{route('product.destroy',$p->id)}}" method="POST">


                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
                                                </form>
                                                <button class="btn btn-success">
                                                    <a href="{{route('product.edit',$p->id)}}" title="show">
                                                        Edit</a>
                                                </button>
                                                {{--                                                <a class="btn btn-primary" href="{{route('user.edit',$u->id)}}">Edit</a>--}}
                                                {{--                                                <a class="btn btn-danger" href="{{route('user.destroy',$u->id)}}">Delete</a>--}}
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

