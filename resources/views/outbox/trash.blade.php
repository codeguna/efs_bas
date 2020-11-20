
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Outbox Trash</title> 
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
            <h4 class="my-5">List Sampah Surat Keluar</h4>
            {{-- <h5>Cari Data Surat :</h5>
	        <form action="{{ url('/outbox/outboxTrashSearch') }}" method="GET">
		        <input type="text" class="form-control" name="cari" placeholder=". . ." value="{{ old('cari') }}">
	        </form> --}}
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Surat Untuk</th>
                          <th>Perihal</th>
                          <th>Jenis Surat</th>
                          <th>File</th>
                          <th>Created By</th>                          
                        <th style="text-align: center" colspan="2" width="1%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outbox as $index =>$o)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $o->letter_number }}</td>
                          <td>{{ $o->date }}</td>
                          <td>{{ $o->from }}</td>
                          <td>{{ $o->title }}</td>
                          <td>{{ $o->type }}</td>
                        <td><img width="100px" src="{{ url('/data_file/outbox/'.$o->file) }}"></td>   
                        <td>{{ $o->created_by }}</td>                   
                        <td><a href="{{ url('/outbox/restore') }}/{{ $o->id }}" class="btn btn-success btn-sm" title="Restore Data"><i class="ti-import"></i></a></td>
                            <td><a href="{{ url('/outbox/delete_permanent') }}/{{ $o->id }}" class="btn btn-danger btn-sm" title="Hapus Data Permanen"><i class="ti-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
  </div>
</div>

@endsection
