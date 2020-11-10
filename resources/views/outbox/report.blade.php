
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | Outbox Report</title>

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
            <h4 class="header-title">Report Surat Keluar</h4>
            <form action="{{ url('/outbox/proceedReport') }}" method="GET">
                               
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input class="date form-control" type="text" name="startDate" required>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                           format: 'yyyy-mm-dd'
                         });  
                    </script> 
                    @if($errors->has('startDate'))
                        <div class="text-danger">
                            Form tanggal masih belum terisi
                        </div>
                    @endif

                </div> 
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input class="date form-control" type="text" name="endDate" required>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                           format: 'yyyy-mm-dd'
                         });  
                    </script> 
                    @if($errors->has('endDate'))
                        <div class="text-danger">
                            Form tanggal masih belum terisi
                        </div>
                    @endif
                    <br/>
                    <input type="submit" value="Cari" class="btn btn-success">
                    <a href="{{ url('/outbox/print') }}" class="btn btn-warning">Print</a>
                </div>
            </form>           
      </div>
  </div>
@endsection
