<?php

namespace App\Http\Controllers;

use App\Inbox;
use File;
use DataTables;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{
    public function create()
    {
        return view('inbox.create');
    }

    public function index()
    {
        $inbox = Inbox::paginate(10);
        return view('inbox.index',['inbox' => $inbox]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $files
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat file upload
        $tujuan_upload = 'data_file/inbox';
		$file->move($tujuan_upload,$nama_file);
 
		Inbox::create([
            'file' => $nama_file,
            'letter_number' => $request->letter_number,
            'date' => $request->date,
            'from' => $request->from,
            'title' => $request->title,
            'created_by' => $request->created_by,
		]);
 
		return redirect('/inbox/list');
    }

    public function edit($id){
        $inbox = Inbox::find($id);
        return view('inbox.edit',['inbox'=>$inbox]);
    }

    public function delete($id){
        $inbox = Inbox::where('id',$id)->first();
        //File::delete('data_file/'.$outbox->file);

        Inbox::where('id',$id)->delete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $inbox = Inbox::onlyTrashed()->where('id',$id);
        $inbox->restore();
        return redirect('/inbox/trash');
    }

    public function trash()
    {
        $inbox = Inbox::onlyTrashed()->get();
        return view('inbox.trash',['inbox' => $inbox]);
    }

    public function delete_permanent($id)
    {        
        $inbox = Inbox::onlyTrashed()->where('id',$id);
        $inbox->forceDelete();        
        
        return redirect('/inbox/trash');
        $inbox = Inbox::where('id',$id)->first();
        File::delete('data_file/inbox/'.$inbox->file);
    }
}
