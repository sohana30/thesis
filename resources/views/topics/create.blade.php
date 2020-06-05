@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Post</h1>
        <hr>
        <form action="{{route('topics.store')}}" method="POST">
        @csrf
        <div class="form-group">
            
            <input type="text" 
            class="form-control @error('title')is-invalid @enderror" 
            name="title" id="title" placeholder="Type title here....">
            @error('title')
            <div class="invalid-feedback">{{ $errors->first('title')}}</div>
            @enderror
        </div>
        <div class="form-group">
            
            <textarea name="content" id="content" 
            class="form-control @error('content')is-invalid @enderror" 
            rows="6" placeholder="Type content here...."></textarea>
            @error('content')
            <div class="invalid-feedback">
            {{$errors->first('content')}}
            </div>
            @enderror 
        </div>
        <button type="submit" 
        class="addFriendBtn">Create Post</button>
        </form>
    </div>
@endsection