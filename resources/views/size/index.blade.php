@extends("master")
@section("title","Size Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('size.create') }}"> Create New category
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
                                        size
                                    </th>
                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($size as $s)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$s->size}}</td>
                                            <td>
                                                <form action="{{route('size.destroy',$s->id)}}" method="POST">
                                                    <button class="btn btn-success">
                                                        <a href="{{route('size.edit',$s->id)}}" title="show">
                                                            Edit</a>
                                                    </button>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>

{{--                                                <a class="btn btn-primary" href="{{route('size.edit',$s->id)}}">Edit</a>--}}

{{--                                                <a class="btn btn-primary" href="{{route('size.destroy',$s->id)}}">Delete</a>--}}
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
