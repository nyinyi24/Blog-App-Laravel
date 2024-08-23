<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){


        request()->validate([
            'body' => 'required'
        ]);

         $comment = $blog->comments()->create([
            'user_id' => auth()->id(),
            'blog_id' => $blog->id,
            'body' => request('body')
        ]);

        // $comment = new comment();
        // $comment->user_id = auth()->id();
        // $comment->blog_id = $blog->id;
        // $comment->body = request('body');
        // $comment->save();

        $subscribers = $blog->users->filter(function($user){
            return $user->id !== auth()->id();
        });

        foreach($subscribers as $subscriber){
            //blocking code
            Mail::to($subscriber->email)->queue(new SubscriberMail($subscriber , $comment));
        }

        return back();
    }

    public function destory(Comment $comment)
    {
        if(!auth()->user()->can('delete' , $comment))
        {
            abort(403);
        }

        $comment->delete();

        return back();
    }
}
