
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | List Mail Type</title>

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
    <h3 class="my-3">List Jenis Surat</h3>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    <i class="ti-plus"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ url('mail_type/store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-form-label">Jenis Surat</label>
                <input type="text" class="form-control" name="type" required autofocus>
                @if($errors->has('type'))
                <div class="text-danger">
                    Jenis Surat sudah ada sebelumnya
                </div>
            @endif
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="ti-close"></i></button>
          <button type="submit" class="btn btn-primary"><i class="ti-save"></i></button>
        </div>
      </div>
    </div>
  </div>
            </form>
  <!-- End Modal -->

    <h5>Cari Jenis Surat :</h5>
	    <form action="{{ url('/mail_type/search') }}" method="GET">
		<input type="text" class="form-control" name="cari" value="{{ old('cari') }}">
	    </form>
        <div class="table-responsive-lg">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Surat</th>                          
                        <th style="text-align: center" width="1%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach($mail_type as $index =>$m)    
                                  
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $m->type }}</td>                                             
                        <td><a class="btn btn-danger" href="{{ url('/mail_type/delete') }}/{{ $m->id }}" title="Hapus Data ?"><i class="ti-trash"></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $mail_type->links("pagination::bootstrap-4") }}
            
@endsection
