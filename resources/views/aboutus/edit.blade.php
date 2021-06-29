@extends("master")
@section("title","Aboutus Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-center">
                            <a class="btn btn-primary pull-center text-light"  href="{{ route('aboutus.index') }}"> back
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Aboutus form</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('aboutus.update',$aboutus->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <strong>Upload Image:</strong>
                                <input type="file" name="img" class="form-control">
                                <div class="row">
                                    <div class="col-xs-8 col-sm-8 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <input type="text" name="description" class="form-control" value="{{$aboutus->description}}">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary pull-center">Add Detail</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

