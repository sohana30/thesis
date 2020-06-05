@extends('layouts.app')
@section('content')
    <div class="container">
      
       <div class="card">
       
        <div class="card-body">
       
            <h5 class="card-title">
            
            {{ $topic->title}}
            @if( $topic->user->hasRole('moderator'))  
           
            <i class="fas fa-star" style="color: #35B2C9;"></i>
            @endif
            </h5>
            <p>
            {{$topic->content}}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <p style="font-size: smaller;"><i class="fa fa-clock-o info"></i>
                    {{date('D - F, j, Y', strtotime($topic->created_at))}} at
                    {{date('(h:i a)', strtotime($topic->created_at))}} by
                    <span class="badge badge-primary">{{$topic->user->name}}</span>
                </p>
                
             
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
           
             @can('update',$topic)
             <a href="{{route('topics.edit', $topic)}}"><button class="addFriendBtn"  ><i class="fas fa-edit"></i>Edit</button></a>
             @endcan
            
           
             
             @can('delete',$topic)
             <form action="{{route('topics.destroy', $topic )}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="stylishBtn"><i class="fas fa-trash-alt"></i>Delete</button>
            </form>
            
            @endcan
           
            </div>
        </div>  
    </div>
    
    
    <form action="{{route('comments.store',$topic)}}" method="POST" class="mt-4" >
        @csrf
        <div class="form-group">
            
            
                <textarea class="form-control @error('content')is-invalid @enderror" 
                name="content" id="content" cols="150" rows="4" placeholder="Type your comment here..."></textarea><button type="submit" class="stylish">
            Comment
            </button>
            
        </div>
        @error('content')
            <div class="invalid-feedback">{{$errors->first('content')}}</div>
        @enderror
        
    </form>
    @forelse ($topic->comments as $comment)
        <div class="card">
            <div class="card-body">
             
                {{$comment->content}}
                @if($comment->user->hasRole('moderator'))  
                <i class="fas fa-star" style="color: #35B2C9;"></i>
                @endif</h4> 
                <div class="d-flex justify-content-between align-items-center">
                <p style="font-size: smaller;"><i class="fa fa-clock-o info"></i>
                {{date('D - F, j, Y', strtotime($comment->created_at))}} at
                {{date('(h:i a)', strtotime($comment->created_at))}} by
                    <span class="badge badge-primary">{{$comment->user->name}}</span>
                </p>
                
            </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No comment for this Post</div>
    @endforelse
    
@endsection