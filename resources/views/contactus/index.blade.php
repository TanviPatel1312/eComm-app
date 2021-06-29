@extends("master")
@section("title","ContactUs Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">

                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">ContactUs Details</h4>
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
                                        Name
                                    </th>
                                    <th>
                                        E-mail
                                    </th>
                                    <th>
                                        ContactNo
                                    </th>
                                    <th>
                                        Message
                                    </th>
                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($contactus as $c)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->email}}</td>
                                            <td>{{$c->contactNo}}</td>
                                            <td>{{$c->message}}</td>

                                            <td>
                                                <form action="{{route('conatctus.destroy',$c->id)}}" method="POST">


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
