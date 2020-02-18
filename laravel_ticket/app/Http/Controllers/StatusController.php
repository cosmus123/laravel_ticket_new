<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Status;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function open($id, Request $request)
    {

        //$posts = Ticket::find($id);
        $posts = DB::table('tickets')->paginate(3);
        //$id = DB::table('statuses')->pluck('status_id');

        $open = 'Opened';
        $open_update = DB::table('statuses')
            ->where('id', $id)
            ->update(['state' => $open]);

        //$status = DB::table('statuses')->where('id', $id)->pluck('state', 'status_id');
        $state = DB::table('statuses')->get();

        //$state = DB::table('statuses')->pluck('state');

        $request->session()->flash('open', 'Your ticket is now Opened!');

        return view('list', [
            'posts' => $posts,
            'state' => $state,
            'open_update' => $open_update
        ]);
        // return redirect()->back();
    }

    public function close($id, Request $request)
    {
        // $id = DB::table('tickets')->pluck('id');
        //$posts = Ticket::find($id);
        $posts = DB::table('tickets')->paginate(3);

        //$id = DB::table('statuses')->pluck('status_id');

        $close = 'Closed';

        $close_update = DB::table('statuses')
            ->where('id', $id)
            ->update(['state' => $close]);
        //$status = DB::table('statuses')->where('id', $id)->pluck('state', 'status_id');
        $state = DB::table('statuses')->get();

        // $state = DB::table('statuses')->get('id', 'state');

        $request->session()->flash('close', 'Your ticket is now Closed!');

        return view('list', [
            'posts' => $posts,
            'state' => $state,
            'close_update' => $close_update
        ]);

        //return redirect()->back();
    }
}
