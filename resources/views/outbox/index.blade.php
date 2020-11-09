
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Outbox</title>

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
            <h4 class="my-5">List Surat Keluar</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Surat Dari</th>
                          <th>Judul</th>
                          <th>File</th>
                          <th>Created By</th>
                        <th width="1%">OPSI</th>
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
                        <td><a href="{{ url('/data_file/'.$o->file) }}" target="_blank"><img width="150px" src="{{ url('/data_file/'.$o->file) }}"></a></td>  
                        <td>{{ $o->created_by }}</td>                    
                        <td><a class="btn btn-danger" href="{{ url('/outbox/delete') }}/{{ $o->id }}" title="Hapus Data ?">HAPUS</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
      </div>
  </div>
@endsection
