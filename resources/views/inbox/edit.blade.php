
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | Edit Inbox</title>

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
            <h4 class="header-title">Create Surat Keluar</h4>
            <form action="/efs_bas/inbox/update/{{ $inbox->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="input-container">
                    <label class="col-form-label">Nomor Surat Keluar</label>
                    <input type="text" class="form-control" name="letter_number" value="{{ $inbox->letter_number }}" required>
                </div><br/>
                @if($errors->has('letter_number'))
                        <div class="text-danger">
                            Form Nomor Surat masih belum terisi
                        </div>
                    @endif
                <div class="form-group">
                    <label>Tanggal Surat Keluar</label>
                    <input class="date form-control" type="text" name="date" value="{{ $inbox->date }}" required>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                           format: 'yyyy-mm-dd'
                         });  
                    </script> 
                    @if($errors->has('date'))
                        <div class="text-danger">
                            Form tanggal masih belum terisi
                        </div>
                    @endif

                </div> 
                <div class="form-group">
                    <label class="col-form-label" required>Surat Keluar Dari ?</label>
                    <input type="text" class="form-control" name="from" value="{{ $inbox->from }}" required>
                </div>
                    @if($errors->has('from'))
                        <div class="text-danger">
                            Form Surat Darimana masih belum terisi
                        </div>
                    @endif
                <div class="form-group">
                    <label class="col-form-label">Judul Surat Keluar</label>
                    <input type="text" class="form-control" name="title" value="{{ $inbox->title }}" required>
                </div>
                    @if($errors->has('title'))
                        <div class="text-danger">
                            Form Judul Surat masih belum terisi
                        </div>
                    @endif
                <div class="form-group">
                    <label class="col-form-label">Upload Scan Surat</label>
                    <input class="form-control" name="file" type="file" value="{{ url('/data_file/inbox/'.$inbox->file) }}" required>
                    <div class="text-danger">{{ $inbox->file }}
                        <br/><img width="100px" src="{{ url('/data_file/inbox/'.$inbox->file) }}">
                    </div>
                </div> 
                    @if($errors->has('file'))
                        <div class="text-danger">
                            Silahkan Upload File                            
                        </div>
                    @endif
                <input type="hidden" value="{{ Auth::user()->name }}" name="created_by"> 
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form>
          </div>
      </div>
  </div>
@endsection
