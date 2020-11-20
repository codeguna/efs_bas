<?php

namespace App\Http\Controllers;


use App\Outbox;
use App\Mail_type;
use File;
use DataTables;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OutboxController extends Controller
{
    public function index(){
        
        $outbox = DB::table('outbox')
                    ->orderByDesc('created_at')
                    ->where('trash', null)
                    ->paginate(10);
        return view('outbox.index',['outbox' => $outbox]);
    }

    public function create(){

        $type_mail = Mail_type::all();
        return view('outbox.create')->with(compact('type_mail'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'date' => 'required|date_format:Y-m-d',
            'letter_number' => 'required|unique:outbox,letter_number',
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
            'title' => 'required',
            'type' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $files
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat file upload
        $tujuan_upload = 'data_file/outbox';
		$file->move($tujuan_upload,$nama_file);
 
		Outbox::create([
            'file' => $nama_file,
            'letter_number' => $request->letter_number,
            'date' => $request->date,
            'from' => $request->from,
            'title' => $request->title,
            'type' => $request->type,
            'created_by' => $request->created_by,
		]);
 
		return redirect('/outbox/list');
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $outbox = DB::table('outbox')
                    ->where('title', 'like',"%".$cari."%")
                    ->orWhere('from', 'like',"%".$cari."%")
                    ->orWhere('letter_number', 'like',"%".$cari."%")
                    ->orWhere('date', 'like',"%".$cari."%")
                    ->orWhere('type', 'like',"%".$cari."%")
                    ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('outbox.index',['outbox' => $outbox]);
    }
    
    public function delete($id){
        /* $outbox = Outbox::where('id',$id)->first();
        //File::delete('data_file/'.$outbox->file);

        Outbox::where('id',$id)->delete();

        return redirect()->back(); */
        $outbox = Outbox::find($id);
    	$outbox->delete();
 
    	return redirect('/outbox/list');
    }

    public function trash()
    {
        $outbox = DB::table('outbox')
                    ->where('trash', 'TRUE')
                    ->paginate(10);
        return view('outbox.trash',['outbox' => $outbox]);
    }

    public function restore($id)
    {
        $outbox = Outbox::find($id);
            $outbox->trash = (null);
            $outbox->save();	
        return redirect('/outbox/trash');	
    }

    public function delete_permanent($id)
    {            
        $outbox = Outbox::where('id',$id)->first();
	    File::delete('data_file/outbox/'.$outbox->file);
 
	    // hapus data
	    Outbox::where('id',$id)->delete();   
        
        return redirect('/outbox/trash');
    }

    public function updateTrash($id)
    {       
        $outbox = Outbox::find($id);
            $outbox->trash = ('TRUE');
            $outbox->save();	
        return redirect('/outbox/list');	
    }

    public function edit($id){
        $type_mail = Mail_type::all();
        $outbox = Outbox::find($id);
        return view('outbox.edit')->with(compact('outbox','type_mail'));
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
        $tujuan_upload = 'data_file/outbox';
		$file->move($tujuan_upload,$nama_file);
 
        $outbox = Outbox::find($id);
            $outbox->letter_number = $request->letter_number;
            $outbox->date = $request->date;
            $outbox->from = $request->from;
            $outbox->title = $request->title;
            $outbox->type = $request->type;
            $outbox->file = $nama_file;
            $outbox->save();		
		return redirect('/outbox/list');
    }

    public function json(){
        return Datatables::of(Outbox::all())->make(true);
    }

    public function jsonIndex(){
        return view('outbox.indexJson');
    }

    public function report(){
        return view('outbox.report');
    }

    public function proceedReport(Request $request)
    {
        $endDate = $request->endDate;
        $startDate = $request->startDate;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $outbox = DB::table('outbox')
                    ->orderBy('date')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->paginate(10);
 
    		// mengirim data pegawai ke view index
        //return view('outbox.v_report',['outbox' => $outbox]);
        return view('outbox.v_report')->with(compact('outbox','startDate','endDate'));
    }

    public function printReport(Request $request)
    {
        $endDate = $request->endDate;
        $startDate = $request->startDate;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $outbox = DB::table('outbox')
                    ->orderBy('date')
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();
                   // $outbox = DB::table('outbox')->where('date', '=', '2020-11-11')->get();
            // mengirim data pegawai ke view index           
            $pdf = PDF::loadview('outbox.printReport',['outbox' => $outbox]);
		    return $pdf->stream();
    }

    /* public function outboxTrashSearch(Request $request)
    {
        $cari = $request->cari; 
        $outbox = DB::table('outbox')
                    ->where('title', 'like',"%".$cari."%")
                    ->orWhere('trash','TRUE')
                    ->paginate(10);        

		return view('outbox.trash',['outbox' => $outbox]);
    } */
}
