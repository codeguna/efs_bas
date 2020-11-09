<?php

namespace App\Http\Controllers;


use App\Outbox;
use File;
use Illuminate\Http\Request;

class OutboxController extends Controller
{
    public function index(){
        $outbox = Outbox::get();
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
 
		return redirect()->back();
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
    }
}
