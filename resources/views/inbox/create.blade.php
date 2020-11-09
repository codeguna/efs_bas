
@extends('layouts.app') 
@section('title') 
<link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>   
<title>EFS BAS | Create Inbox</title> 
@section('content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/inbox/store') }}" method="POST" >
                {{ csrf_field() }}
                
                <h4 class="header-title">Create Surat Masuk</h4>
                    <div class="form-group">
                        <label for="letter_number" class="col-form-label">Nomor Surat</label>
                        <input class="form-control" name="letter_number" type="text" id="letter_number">
                        @if($errors->has('letter_number'))
                            <div class="text-danger">
                                Form Nomor Surat masih belum terisi
                            </div>
                        @endif
                    </div>
                     <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input class="date form-control" type="text" name="date">
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
                        <label for="from" class="col-form-label">Surat Dari ?</label>
                        <input class="form-control" name="from" type="text" id="from">
                        @if($errors->has('from'))
                            <div class="text-danger">
                                Form surat darimana masih belum terisi
                            </div>
                        @endif
                    </div>    
                    <div class="form-group">
                        <label for="title" class="col-form-label">Judul Surat ?</label>
                        <input class="form-control" name="title" type="text" id="title">
                        @if($errors->has('title'))
                            <div class="text-danger">
                                Form Judul Surat darimana masih belum terisi
                            </div>
                        @endif
                    </div>  
                    <div class="form-group">
                        <label for="file" class="col-form-label">Upload Scan Surat</label>
                        <input class="form-control" name="file" type="file" id="file">
                        <div class="text-danger">Maksimal Ukuran File 10MB
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success" value="Simpan">
            </form>            
        </div>
    </div>
</div>
@endsection
