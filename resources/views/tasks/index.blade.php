@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('tasks.form')
            <hr>
            @include('tasks.list')
        </div>
    </div>
</div>
@endsection
