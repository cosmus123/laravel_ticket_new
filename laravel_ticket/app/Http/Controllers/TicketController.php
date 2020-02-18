<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Status;
use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;


class TicketController extends Controller
{
    public function view($id)
    {
        $posts = Ticket::find($id);

        $comments = $posts->comments;

        $status = DB::table('statuses')->where('id', $id)->pluck('state');

        return view('form.view', [
            'posts' => $posts,
            'comments' => $comments,
            'status' => $status
        ]);
    }

    public function edit($id)
    {
        $posts = Ticket::find($id);

        return view('form.edit', [

            'posts' => $posts
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'department' => 'required|string|max:10',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required|string'

        ]);


        $ticket = Ticket::find($id);
        $ticket->department = $request->get('department');
        $ticket->email = $request->get('email');
        $ticket->subject = $request->get('subject');
        $ticket->message = $request->get('message');

        $ticket->save();

        return redirect()->action('HomeController@listedit')->with('success', 'Contact updated!');
    }

    public function store(Request $request)
    {

        //Validate the fields

        $request->validate([

            'department' => 'required|string|max:10',
            'created_at' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required|string'

        ]);

        $two_nb = mt_rand(10, 99);
        $three_nb = mt_rand(100, 999);
        $reference =  $two_nb . "-" . $three_nb;


        $ticket = new Ticket;
        $ticket->number = $reference;
        $ticket->department = request('department');
        $ticket->created_at = request('created_at');
        $ticket->email = request('email');
        $ticket->subject = request('subject');
        $ticket->message = request('message');

        $ticket->save();

        $status = new Status;
        $open = 'Opened';
        $status->state = $open;
        $status->status_id = $ticket->id;

        $status->save();

        $request->session()->flash('success', 'The Ticket info has been submitted !');

        return redirect()->action('HomeController@user', [
            'open' => $open
        ]);
    }



    public function ref()
    {

        $two_nb = mt_rand(10, 99);
        $three_nb = mt_rand(100, 999);
        $reference =  $two_nb . "-" . $three_nb;
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        $state = Status::find($id);
        $state->delete();

        return redirect('/list')->with('success', 'Ticket deleted!');;
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Ticket::where('number', 'LIKE', '%' . $search . '%')->orWhere('department', 'LIKE', '%' . $search . '%')->paginate(3);

        if ($posts) {
            $request->session()->flash('successticket', 'Ticket(s) found !');
        } else {
            $request->session()->flash('errorticket', 'Ticket(s) not found !');
        }

        $status = Status::all();

        return view('list', [

            'posts' => $posts,
            'status' => $status
        ]);
    }

    public function search_ticket(Request $request)
    {
        $search = $request->input('search_ticket');
        $posts = Ticket::where('number', 'LIKE', '%' . $search . '%')->orWhere('department', 'LIKE', '%' . $search . '%')->paginate(3);

        $status = Status::all();

        return view('list', [

            'posts' => $posts,
            'status' => $status
        ]);
    }
}
