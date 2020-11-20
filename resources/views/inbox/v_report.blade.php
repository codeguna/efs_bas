
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
    <h3 class="my-5">List Surat Masuk</h4> 
        <form action="{{ url('/inbox/printReport') }}"  method="GET">
            <input type="hidden" value="{{ $startDate }}" name="startDate">
            <input type="hidden" value="{{ $endDate }}" name="endDate">
            <input type="submit" value="Print" class="btn btn-warning">
        </form> 
        <div class="table-responsive-lg">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Surat Dari</th>
                          <th>Perihal</th>
                          <th>Jenis Surat</th>
                          <th>File</th>
                          <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($inbox as $i)                                  
                    <tr>                        
                        <td>{{ $i->letter_number }}</td>
                          <td>{{ $i->date }}</td>
                          <td>{{ $i->from }}</td>
                          <td>{{ $i->title }}</td>
                          <td>{{ $i->type }}</td>
                        <td><a href="{{ url('/data_file/inbox/'.$i->file) }}" target="_blank"><img width="150px" src="{{ url('/data_file/inbox/'.$i->file) }}"></a></td>  
                        <td>{{ $i->created_by }}</td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $inbox->links("pagination::bootstrap-4") }}
            
@endsection
