<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\Outbox;
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
        $outboxCount = Outbox::where('trash', 'FALSE')        
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->count();
        $inbox = Inbox::where('trash', 'FALSE')        
                ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                ->count();
        $outboxTrash = Outbox::where('trash', 'TRUE')        
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->count();
        $inboxTrash = Inbox::where('trash', 'TRUE')        
                    ->whereBetween('created_at', [$year.'-01-01', $year.'-12-31'])
                    ->count();
        return view('dashboard.index')->with(compact('inbox','inboxTrash','outboxTrash','outboxCount'));

    }
}
