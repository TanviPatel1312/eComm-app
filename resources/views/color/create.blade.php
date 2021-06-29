@extends("master")
@section("title","Color Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-center">
                            <a class="btn btn-primary pull-center text-light"  href="{{ route('color.index') }}"> back
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Color form</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('color.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <strong>Color:</strong>
                                    <input type="text" class="form-control" style="height:50px" name="color"
                                           placeholder="color">
                                </div>
                                <button type="submit" class="btn btn-primary pull-center">Add Color</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

