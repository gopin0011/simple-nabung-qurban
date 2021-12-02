@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="card border-white">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <p class="card-text"><a href="{{ route("admin.home") }}?pages=@md5("admin.plans")">Plans</a></p>
                    <p class="card-text">a href</p>
                </div>
            </div>
        </div>

        @include($pages)
    </div>
</diV>
@endsection
