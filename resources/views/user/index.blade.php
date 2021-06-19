@extends("master")
@section("title","User Profile")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-right">
                            <a class="btn btn-primary pull-right text-light"  href="{{ route('user.create') }}"> Create New User
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
                                        Username
                                    </th>
                                    <th>
                                        Email address
                                    </th>
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        Postal Code
                                    </th>
                                    <th width="280px">Action</th>
                                    </thead>
                                    @foreach($user as $u)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->email}}</td>
                                            <td>{{$u->first_name}}</td>
                                            <td>{{$u->last_name}}</td>
                                            <td>{{$u->address}}</td>
                                            <td>{{$u->city}}</td>
                                            <td>{{$u->country}}</td>
                                            <td>{{$u->postal_code}}</td>
                                            <td>
                                                <form action="{{route('user.destroy',$u->id)}}" method="POST">
                                                    <button class="btn btn-success">
                                                        <a href="{{route('user.edit',$u->id)}}" title="show">
                                                            Edit</a>
                                                    </button>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
                                                </form>
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

