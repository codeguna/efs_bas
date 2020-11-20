
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Inbox Trash</title> 
<link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<style>
    hr.style5 {
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
}
</style>
@section('content')
<div class="col-12 mt-5">
  <div class="card">
      <div class="card-body">
          <div class="table-responsive-lg">
            @if(count($errors) >0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif
            <h4 class="my-5">List Sampah Surat Masuk</h4>
            {{-- <h5>Cari Data Surat :</h5>
	        <form action="{{ url('/inbox/inboxTrashSearch') }}" method="GET">
		        <input type="text" class="form-control" name="cari" placeholder=". . ." value="{{ old('cari') }}">
	        </form> --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Surat Dari</th>
                          <th>Perihal</th>
                          <th>Jenis Surat</th>
                          <th>File</th>
                          <th>Created By</th>                          
                        <th style="text-align: center" colspan="2" width="1%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inbox as $index =>$i)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $i->letter_number }}</td>
                          <td>{{ $i->date }}</td>
                          <td>{{ $i->from }}</td>
                          <td>{{ $i->title }}</td>
                          <td>{{ $i->type }}</td>
                        <td><img width="100px" src="{{ url('/data_file/inbox/'.$i->file) }}"></td>   
                        <td>{{ $i->created_by }}</td>                   
                        <td><a href="{{ url('/inbox/restore') }}/{{ $i->id }}" class="btn btn-success btn-sm" title="Restore Data"><i class="ti-import"></i></a></td>
                            <td><a href="{{ url('/inbox/delete_permanent') }}/{{ $i->id }}" class="btn btn-danger btn-sm" title="Hapus Data Permanen"><i class="ti-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>
  </div>
</div>

@endsection
