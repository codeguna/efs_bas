<?php

namespace App\Http\Controllers;


use App\Outbox;
use File;
use DataTables;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutboxController extends Controller
{
    public function index(){
        $outbox = DB::table('outbox')->paginate(10);
        return view('outbox.index',['outbox' => $outbox]);
    }

    public function create(){
        return view('outbox.create');
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
        $tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Outbox::create([
            'file' => $nama_file,
            'letter_number' => $request->letter_number,
            'date' => $request->date,
            'from' => $request->from,
            'title' => $request->title,
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
                    ->paginate();
 
    		// mengirim data pegawai ke view index
		return view('outbox.index',['outbox' => $outbox]);
    }
    
    public function delete($id){
        $outbox = Outbox::where('id',$id)->first();
        //File::delete('data_file/'.$outbox->file);

        Outbox::where('id',$id)->delete();

        return redirect()->back();
    }

    public function trash()
    {
        $outbox = Outbox::onlyTrashed()->get();
        return view('outbox.trash',['outbox' => $outbox]);
    }

    public function restore($id)
    {
        $outbox = Outbox::onlyTrashed()->where('id',$id);
        $outbox->restore();
        return redirect('/outbox/trash');
    }

    public function delete_permanent($id)
    {        
        $outbox = Outbox::onlyTrashed()->where('id',$id);
        $outbox->forceDelete();        
        
        return redirect('/outbox/trash');
        $outbox = Outbox::where('id',$id)->first();
        File::delete('data_file/'.$outbox->file);
    }

    public function edit($id){
        $outbox = Outbox::find($id);
        return view('outbox.edit',['outbox'=>$outbox]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $files
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
            
            // isi dengan nama folder tempat file upload
        $tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
        $outbox = Outbox::find($id);
            $outbox->letter_number = $request->letter_number;
            $outbox->date = $request->date;
            $outbox->from = $request->from;
            $outbox->title = $request->title;
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
                    ->whereBetween('date', [$startDate, $endDate])
                    ->get();
                   // $outbox = DB::table('outbox')->where('date', '=', '2020-11-11')->get();
            // mengirim data pegawai ke view index           
            $pdf = PDF::loadview('outbox.printReport',['outbox' => $outbox]);
		    return $pdf->stream();
    }
}
