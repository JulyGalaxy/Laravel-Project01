<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
       $cleanData = request()->validate([
        'body'=>'required'
       ]);

       $cleanData['user_id'] = auth()->id();
       $comment = $blog->comments()->create($cleanData);

       $blog->subscribedUsers->filter(function($user){
        return $user->id != auth()->id();
       })->each(function($user) use ($comment){

           Mail::to($user->email)->queue(new NotifyUser($comment,$user));
       });

       return back();
    }

    public function edit(Comment $comment)
    {
        $this->authorize('edit',$comment);
        return view('comments.edit',compact('comment'));
    }

    public function update(Comment $comment)
    {   
        $this->authorize('update',$comment);
        $comment -> update(request()->validate([
            'body' => 'required',
        ]));

        return redirect('/blogs/'.$comment->blog->slug);
    }

    public function delete(Comment $comment)
    {
        $comment -> delete();
        return back();
    }
}
