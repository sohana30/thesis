@extends('layouts.app')
@section('content')
<a href="{{route('topics.create')}}"><button class="addFriendBtn"  ><i class="fas fa-pen"></i>Create Post</button></a>
            
    <div class="container">
    
        <div class="list-group">
        
            @foreach($topics as $topic)
            <div class="list-group-item mb-4" >
                <h4>                
                {{$topic->title}}
                @if($topic->user->hasRole('moderator'))                  
                <i class="fas fa-star" style="color: #35B2C9;"></i>
                @endif</h4>                
                <p>{{$topic->content}}</p>
                <div class="d-flex justify-content-between align-items-center"> 
                <a href="{{route('topics.show', $topic)}}">Comments</a> 
                                       
                <p style="font-size: smaller;"><i class="fa fa-clock-o info"></i>
                    {{date('D - F, j, Y', strtotime($topic->created_at))}} at
                    {{date('h:i a', strtotime($topic->created_at))}} by
                    <span class="badge badge-primary">{{$topic->user->name}}</span>                           
                </p>      
                </div>                       
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $topics->links()}}
        </div>
    </div>
@endsection