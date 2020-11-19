
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Inbox</title>

<link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>

@section('content')

<style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<div class="col-12 mt-5">
  <div class="card">
      <div class="card-body">
{{--           <img height="50px" width="150px" src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/illustrations/Collaboration_re_vyau.svg" class="center">          
 --}}        
    <h3 class="my-5">List Surat Masuk<br/><a title="Input Baru" href="{{ url('/inbox/create') }}" class="btn btn-success"><i class="ti-plus"></i></a></h4>
        
    <h5>Cari Data Surat :</h5>
	    <form action="{{ url('/inbox/search') }}" method="GET">
		<input type="text" class="form-control" name="cari" value="{{ old('cari') }}">
	    </form>
        <div class="table-responsive-lg">
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
                        <th style="text-align: center" colspan="3" width="1%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach($inbox as $in)    
                                  
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $in->letter_number }}</td>
                          <td>{{ $in->date }}</td>
                          <td>{{ $in->from }}</td>
                          <td>{{ $in->title }}</td>
                          <td>{{ $in->type }}</td>
                        <td><a href="{{ url('/data_file/inbox/'.$in->file) }}" target="_blank"><img width="150px" src="{{ url('/data_file/inbox/'.$in->file) }}"></a></td>  
                        <td>{{ $in->created_by }}</td>                    
                        <td><a class="btn btn-warning" href="{{ url('/inbox/edit') }}/{{ $in->id }}" title="Update Data ?"><i class="ti-pencil-alt"></i></a></td>
                        <td><a class="btn btn-danger" href="{{ url('/inbox/updateTrash') }}/{{ $in->id }}" title="Hapus Data ?"><i class="ti-trash"></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $inbox->links("pagination::bootstrap-4") }}
            
@endsection
