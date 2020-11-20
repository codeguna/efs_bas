<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = date('Y');
        $outbox = DB::table('outbox')
                    ->where('trash', null)
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->paginate(10);
        $inbox = DB::table('inbox')
                    ->where('trash', null)
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->paginate(10);
        $outboxTrash = DB::table('outbox')
                    ->where('trash', 'TRUE')
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->paginate(10);
        $inboxTrash = DB::table('inbox')
                    ->where('trash', 'TRUE')
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->paginate(10);
        return view('dashboard.index')->with(compact('outbox','inbox','inboxTrash','outboxTrash'));

    }
}
