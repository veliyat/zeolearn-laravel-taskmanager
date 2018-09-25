@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>
                        <a href="{{ url('tasks') }}" class="btn btn-primary">
                            Add Tasks
                        </a>

                        @if(Auth::user()->type === 'admin')
                        <a href="{{ url('admin') }}" class="btn btn-success">
                            Watch Users
                        </a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
