<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Status;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function user()
    {

        $posts = DB::table('tickets')->paginate(3);

        return view('user', [

            'posts' => $posts,


        ]);
    }

    public function listedit()
    {
        $posts = DB::table('tickets')->paginate(3);

        $id = DB::table('statuses')->pluck('status_id');
        $state = DB::table('statuses')->get();

        $status = DB::table('statuses')->where('id', $id)->pluck('state', 'status_id');

        $user = DB::table('statuses')->find($id);
        return view('list', [
            'id' => $id,
            'state' => $state,
            'posts' => $posts,
            'status' => $status,
            'user' => $user
        ]);
    }

    public function ticket()
    {

        return view('ticket');
    }

    public function edit()
    {
        return view('form.edit');
    }
}
