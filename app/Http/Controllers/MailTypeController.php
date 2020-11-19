<?php

namespace App\Http\Controllers;

use App\Mail_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailTypeController extends Controller
{
    public function index(){
        
        $mail_type = DB::table('mail_type')
                    ->orderByDesc('created_at')
                    ->paginate(10);
        return view('mail_type.index',['mail_type' => $mail_type]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'type' => 'required|unique:mail_type,type',
        ]);
 
		Mail_type::create([
            'type' => $request->type,
		]);
 
		return redirect('/mail_type/list');
    }

    public function search(Request $request)
    {
        $cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		/* $outbox = DB::table('outbox')
		->where('title','like',"%".$cari."%")
        ->paginate(); */
        
        $mail_type = DB::table('mail_type')
                    ->where('type', 'like',"%".$cari."%")
                    ->paginate(10);
 
    		// mengirim data pegawai ke view index
		return view('mail_type.index',['mail_type' => $mail_type]);
    }
    
    public function delete($id){
        /* $outbox = Outbox::where('id',$id)->first();
        //File::delete('data_file/'.$outbox->file);

        Outbox::where('id',$id)->delete();

        return redirect()->back(); */
        $mail_type = Mail_type::find($id);
    	$mail_type->delete();
 
    	return redirect('/mail_type/list');
    }
}
