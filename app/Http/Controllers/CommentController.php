<?php

namespace App\Http\Controllers;
use App\Topic;
use App\Comment;
use Illuminate\Http\Request;
use App\Notifications\NewComment;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Topic $topic)
    {
            request()->validate([
                'content' => 'required|min:4'
            ]);
            $comment =new Comment();
            $comment->content =request('content');
            $comment->user_id = auth()->user()->id;

            $topic->comments()->save($comment);
            
            $topic->user->notify(new NewComment($topic, auth()->user()));

            return redirect()->route('topics.show', $topic);

    }
    
}
