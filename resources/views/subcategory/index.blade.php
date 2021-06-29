@extends("master")
@section("title","subcategory Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('subcategory.create') }}"> Create New category
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Size Table</h4>
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
                                        category
                                    </th>
                                    <th>
                                        subcategory
                                    </th>
                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($subcategory as $s)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$s->category->category_name}}</td>
                                            <td>{{$s->subcategory_name}}</td>
                                            <td>
                                                <form action="{{route('subcategory.destroy',$s->id)}}" method="POST">
                                                    <button class="btn btn-primary">
                                                        <a href="{{route('subcategory.edit',$s->id)}}" class="text-white" title="show">
                                                            Edit</a>
                                                    </button>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>

                                                    {{--                                                <a class="btn btn-primary" href="{{routes('size.edit',$s->id)}}">Edit</a>--}}

                                                    {{--                                                <a class="btn btn-primary" href="{{routes('size.destroy',$s->id)}}">Delete</a>--}}
                                                </form>
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
