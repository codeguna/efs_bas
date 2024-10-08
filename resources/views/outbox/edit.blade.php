
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | Edit Outbox</title>

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
            <form action="/efs_bas/outbox/update/{{ $outbox->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label class="col-form-label">Nomor Surat Keluar</label>
                    <input type="text" class="form-control" name="letter_number" value="{{ $outbox->letter_number }}" required>
                    @if($errors->has('letter_number'))
                    <div class="text-danger">
                        Form Nomor Surat masih belum terisi
                    </div>
                @endif
                </div>
                
                <div class="form-group">
                    <label>Tanggal Surat Keluar</label>
                    <input class="date form-control" type="text" name="date" value="{{ $outbox->date }}" maxlength="10" required>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                           format: 'yyyy-mm-dd'
                         });  
                    </script> 
                    @if($errors->has('date'))
                        <div class="text-danger">
                            Form tanggal masih belum terisi atau tanggal salah
                        </div>
                    @endif

                </div> 
                <div class="form-group">
                    <label class="col-form-label" required>Surat Untuk ?</label>
                    <input type="text" class="form-control" name="from" value="{{ $outbox->from }}" required>
                    @if($errors->has('from'))
                    <div class="text-danger">
                        Form Surat Darimana masih belum terisi
                    </div>
                @endif
                </div>
                    
                <div class="form-group">
                    <label class="col-form-label">Perihal</label>
                    <input type="text" class="form-control" name="title" value="{{ $outbox->title }}" required>
                    @if($errors->has('title'))
                    <div class="text-danger">
                        Form Judul Surat masih belum terisi
                    </div>
                @endif
                </div>

                <div class="form-group">
                    <label class="col-form-label">Jenis Surat</label>
                    <select name="type" class="form-control">
                        <option value="{{ $outbox->type }}" selected>{{ $outbox->type }}</option>
                            @foreach($type_mail as $t)
                        <option value="{{ $t->type }}">{{ $t->type }}</option>
                             @endforeach
                    </select>                    
                    @if($errors->has('type'))
                        <div class="text-danger">
                            Jenis Surat masih belum terisi
                        </div>
                    @endif
                </div>
                   
                <div class="form-group">
                    <label class="col-form-label">Upload Scan Surat</label>
                    <input class="form-control" name="file" type="file" value="{{ url('/data_file/outbox/'.$outbox->file) }}" required>
                    <div class="text-danger">{{ $outbox->file }}
                        <br/><img width="100px" src="{{ url('/data_file/outbox/'.$outbox->file) }}">
                    </div>
                    @if($errors->has('file'))
                    <div class="text-danger">
                        Silahkan Upload File                            
                    </div>
                @endif
                </div> 
                   
                <input type="hidden" value="{{ Auth::user()->name }}" name="created_by"> 
                <a class="btn btn-warning" href="{{ url('/outbox/list') }}"><i class="ti-arrow-left"> Kembali</i></a>
                <button type="submit" class="btn btn-primary"><i class="ti-save"> Simpan</i></button>
            </form>
          </div>
      </div>
  </div>
@endsection
