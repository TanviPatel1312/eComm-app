@extends("master")
@section("title","Color Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('color.create') }}"> Create New color
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Color Table</h4>
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
                                        color
                                    </th>
                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($color as $c)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$c->color}}</td>
                                            <td>
                                                <form action="{{route('color.destroy',$c->id)}}" method="POST">
                                                    <button class="btn btn-primary">
                                                        <a href="{{route('color.edit',$c->id)}}" class="text-white" title="show">
                                                            Edit</a>
                                                    </button>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
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
