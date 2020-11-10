
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Outbox</title>

<link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
<style>
    body{
        padding-top: 40px;
    }
</style>
@section('content')

<div class="col-12 mt-5">
  <div class="card">
      <div class="card-body">
          <div class="table-responsive-lg">
            <h4 class="my-5">List Surat Keluar</h4>
            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th>Surat Dari</th>
                        <th>Judul</th>
                        <th>File</th>
                        <th>Dibuat Oleh</th>
                    </tr>
                </thead>
            </table>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
            <script>
                $(function() {
                    $('#users-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ url('/outbox/json') }}',
                        columns: [
                            { data: 'letter_number', name: 'letter_number' },
                            { data: 'date', name: 'date' },
                            { data: 'from', name: 'from' },
                            { data: 'title', name: 'title' },
                            { data: 'created_by', name: 'created_by' }
                        ]
                    });
                });
                </script>
@endsection
