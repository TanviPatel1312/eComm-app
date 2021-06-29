@extends("master")
@section("title","Category Page")
@section("content")
    <script src="{{ asset('/js/jquery.js') }}" type="text/javascript"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-left">
                            <a class="btn btn-primary pull-left text-light"  href="{{ route('size.index') }}"> back
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Size form</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('size.update',$size->id)}}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <strong>size:</strong>
                                    <input type="text" class="form-control" style="height:50px" name="size"
                                           value="{{$size->size}}"  placeholder="enter size">
                                </div>
                                <button type="submit" class="btn btn-primary pull-center">Update Size</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

