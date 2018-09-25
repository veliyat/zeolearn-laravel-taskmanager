@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ url('admin/download') }}" class="btn btn-lg btn-success float-right">
                    <i class="fas fa-download"></i> Download Excel
                </a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">                
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>  
                            <th>Username</th> 
                            <th>Actions</th>   
                            <th>Backdoor</th>                      
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name}}</td>                                
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->username}}</td>
                                <td>
                                    @if($user->type !== config('constants.userType.admin'))
                                        <form action="{{ url('/activation/'.$user->id) }}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PATCH')}}
                                            
                                            @if($user->active)
                                                <button class="btn btn-danger btn-sm">Deactivate</button>
                                            @else
                                                <button class="btn btn-success btn-sm">Activate</button>
                                            @endif
                                        </form>                                       
                                    @endif                                    
                                </td>

                                <td>
                                    @if($user->type !== config('constants.userType.admin'))
                                        <form action="{{ url('/backdoor/'.$user->id) }}" method="post">
                                            {{csrf_field()}}
                                            <button class="btn btn-primary btn-sm">Backdoor</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection