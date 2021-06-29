@extends("welcome")

@section("content")
    <div class="px-4 lg:px-0 py-4 xl:py-16">
        <div>
            <router-view ></router-view>
        </div>
    </div>
@endsection

