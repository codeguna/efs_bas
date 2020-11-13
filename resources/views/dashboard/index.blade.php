
@extends('layouts.app') 
@section('title') 
<title>BAS | Dashboard</title> 
@section('content')
        <div class="col-12 mt-5">          
          <div class="card">            
            <a href="{{ url('/inbox/list') }}">
            <div class="seo-fact sbg2">
              <div class="p-4 d-flex justify-content-between align-items-center">
                  <div class="seofct-icon"><i class="ti-arrow-down"></i>Surat Masuk</div>
                  <h2>{{ $inbox->total() }} </h2>
              </div>
            </a>
            </div>
            <div class="card-body"></div>
            <a href="{{ url('/outbox/list') }}">
            <div class="seo-fact sbg1">
              <div class="p-4 d-flex justify-content-between align-items-center">
                  <div class="seofct-icon"><i class="ti-arrow-up"></i>Surat Keluar</div>
                  <h2>{{ $outbox->total() }} </h2>
              </div>
            </a>
            </div> 
          </div>
        </div>       
@endsection
