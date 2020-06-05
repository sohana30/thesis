@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <h1 >
                List of Users</h1>
                
                    @foreach($users as $user)                           
                    <div class="card mb-2">
                                <div class="card-body ">
                                    
                                    <h4 class="card-title">Name:{{$user->name}}</h4>
                                    <p class="card-text">Email:{{$user->email}}</p>
                                    <form action="{{route('admin.dashboard.destroy', $user )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="stylishBtn"><i class="fas fa-trash-alt"></i>Delete</button>
                                    </form>
                                </div>
                            </div>
                    
                    @endforeach                           
                
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $users->links()}}
        </div>
    </div>
</div>
@endsection
