
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Inbox</title> 
 <!-- Start datatable css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('/public/theme/css/jquery.dataTables.css') }}">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@section('content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-lg">
                <table class="table">
                  <thead>
                      <tr>
                          <th>Nomor Surat</th>
                          <th>Tanggal Surat</th>
                          <th>Surat Dari</th>
                          <th>Judul</th>
                          <th>File</th>
                          <th>AKSI</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($inbox as $i)                    
                      <tr>
                          <td>{{ $i->letter_number }}</td>
                          <td>{{ $i->date }}</td>
                          <td>{{ $i->from }}</td>
                          <td>{{ $i->title }}</td>
                          <td>{{ $i->file }}</td>
                          <td><i class="ti-pencil-alt"></i></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
@endsection
