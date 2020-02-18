<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Ticket;
use Illuminate\Support\Arr;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([

            'comment' => 'required|string'

        ]);

        $tickets = Ticket::find($id);

        $comment = new Comments;
        $comment->comment = request('comment');
        $comment->ticket_id = $tickets->id;

        $comment->save();

        return redirect()->back();
    }



    public function destroy($id)
    {
        $comments = Comments::find($id);
        $comments->delete();

        return redirect()->back();
    }

    public function show(Comments $comments)
    {
        $comments = Comments::find($comments);

        return view('comments.show', compact('comments'));
    }
}
