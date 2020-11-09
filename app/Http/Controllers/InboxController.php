<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inbox;
use File;

class InboxController extends Controller
{
    public function create()
    {
        return view('inbox.create');
    }

    public function index()
    {
        $inbox = Inbox::get();
        return view('inbox.index',['inbox' => $inbox]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'letter_number' => 'required',
            'date' => 'required',
            'from' => 'required',
            'title' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:10024',
        ]);

        $file = $request->file('file');
        $file_name = time()."_".$file->getClientOriginalName();
        $upload_to = 'data_file';
        $file->move($upload_to,$file_name);

        Inbox::create([
            'letter_number' => $request->letter_number,
            'date' => $request->date,
            'from' => $request->from,
            'title' => $request->title,
            'file' => $file_name,
        ]);

        return redirect()->back();
    }
}
