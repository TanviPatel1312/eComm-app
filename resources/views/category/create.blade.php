@extends("master")
@section("title","Category Page")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="pull-left">
                            <a class="btn btn-primary pull-left text-light"  href="{{ route('category.index') }}"> back
                            </a>
                        </div>
                        <br>

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Category form</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <strong>category name:</strong>
                                    <input type="text" class="form-control" style="height:50px" name="category_name"
                                           placeholder="category name">
                                </div>
                                <button type="submit" class="btn btn-primary pull-center">Add Category</button>

                            </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

