@extends("master")
@section("title","AboutUs Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('aboutus.create') }}"> Add details
                            </a>
                        </div>
                        <br>
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">AboutUs page Detail</h4>
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
                                        images
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($aboutus as $a)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td><img src="{{('/aboutuimg/'.$a->img)}}" class="rounded-circle" height="100px" width="80px"></td>
                                            <td>{{$a->description}}</td>

                                            <td>
                                                <form action="{{route('aboutus.destroy',$a->id)}}" method="POST">
                                                    <button class="btn btn-primary">
                                                        <a href="{{route('aboutus.edit',$a->id)}}" class="text-white" title="show">
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
