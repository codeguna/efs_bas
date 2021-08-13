<?php

namespace App\Http\Controllers;

use App\Inbox;
use File;
use App\Mail_type;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{
    public function create()
    {
        $type_mail = Mail_type::all();
        return view('inbox.create')->with(compact('type_mail'));    }

    public function index()
    {

        $inbox = DB::table('inbox')
                    ->orderByDesc('created_at')
                    ->where('trash', 'FALSE')
                    ->paginate(10);
        return view('inbox.index',['inbox' => $inbox]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'date' => 'required|date_format:Y-m-d',
            'letter_number' => 'required|unique:inbox,letter_number',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
            'title' => 'required',
            'type' => 'required',

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
            'type' => $request->type,
            'created_by' => $request->created_by,
		]);
 
		return redirect('/inbox/list');
    }

    public function edit($id){
        $type_mail = Mail_type::all();
        $inbox = Inbox::find($id);
        return view('inbox.edit')->with(compact('inbox','type_mail'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date_format:Y-m-d',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
            'title' => 'required',
            'type' => 'required',

        ]);

        // menyimpan data file yang diupload ke variabel $files
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat file upload
        $tujuan_upload = 'data_file/inbox';
		$file->move($tujuan_upload,$nama_file);
 
        $inbox = Inbox::find($id);
            $inbox->letter_number = $request->letter_number;
            $inbox->date = $request->date;
            $inbox->from = $request->from;
            $inbox->title = $request->title;
            $inbox->type = $request->type;
            $inbox->file = $nama_file;
            $inbox->save();		
		return redirect('/inbox/list');
    }

    public function updateTrash($id)
    {       
        $inbox = Inbox::find($id);
            $inbox->trash = ('TRUE');
            $inbox->save();	
        return redirect('/inbox/list');	
    }

    public function delete($id){
        $inbox = Inbox::where('id',$id)->first();
        //File::delete('data_file/'.$outbox->file);

        Inbox::where('id',$id)->delete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $inbox = Inbox::find($id);
            $inbox->trash = (null);
            $inbox->save();	
        return redirect('/inbox/trash');	
    }

    public function trash()
    {
        $inbox = DB::table('inbox')
                    ->where('trash', 'TRUE')
                    ->paginate(10);
        return view('inbox.trash',['inbox' => $inbox]);
    }

    public function delete_permanent($id)
    {        
        $inbox = Inbox::where('id',$id)->first();
	    File::delete('data_file/inbox/'.$inbox->file);
 
	    // hapus data
	    Inbox::where('id',$id)->delete();     
        
        return redirect('/inbox/trash');
    }

    public function report(){
        return view('inbox.report');
    }

    public function proceedReport(Request $request)
    {
        $endDate = $request->endDate;
        $startDate = $request->startDate;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $inbox = DB::table('inbox')        
                    ->orderBy('date')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->paginate(10);
 
    		// mengirim data pegawai ke view index
        //return view('outbox.v_report',['outbox' => $outbox]);
        return view('inbox.v_report')->with(compact('inbox','startDate','endDate'));
    }

    public function printReport(Request $request)
    {
        $endDate = $request->endDate;
        $startDate = $request->startDate;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $inbox = DB::table('inbox')
                    ->orderBy('date')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();
                   // $outbox = DB::table('outbox')->where('date', '=', '2020-11-11')->get();
            // mengirim data pegawai ke view index           
            $pdf = PDF::loadview('inbox.printReport',['inbox' => $inbox]);
		    return $pdf->stream();
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $inbox = DB::table('inbox')
                    ->orderByDesc('created_at')
                    ->where('title', 'like',"%".$cari."%")
                    ->orWhere('from', 'like',"%".$cari."%")
                    ->orWhere('letter_number', 'like',"%".$cari."%")
                    ->orWhere('date', 'like',"%".$cari."%")
                    ->orWhere('type', 'like',"%".$cari."%")
                    ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('inbox.index',['inbox' => $inbox]);
    }

    /* public function inboxTrashSearch(Request $request)
    {
        $cari = $request->cari;
        $inbox = DB::table('inbox')
                    ->where('title', 'like',"%".$cari."%")
                    ->orWhere('trash','TRUE')
                    ->paginate(10);   

		return view('inbox.trash',['inbox' => $inbox]);
    } */
}
