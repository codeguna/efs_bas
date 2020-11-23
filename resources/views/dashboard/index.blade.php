
@extends('layouts.app') 
@section('title') 
<title>EFS BAS | Dashboard</title> 
@section('content')
<script>
  window.onload = function () {
  
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
      text: "Akumulasi Surat BAS di Tahun {{ date("Y") }}",
      horizontalAlign: "center"
    },
    data: [{
      type: "doughnut",
      startAngle: 60,
      indexLabelFontSize: 17,
      indexLabel: "{label} - #percent%",
      toolTipContent: "<b>{label}:</b> {y} (#percent%)",
      dataPoints: [
        { y: {{ $inbox->total() }}, label: "Surat Masuk" },
        { y: {{ $outbox->total() }}, label: "Surat Keluar" },
        { y: {{ $outboxTrash->total() }}, label: "Sampah Surat Keluar" },
        { y: {{ $inboxTrash->total() }}, label: "Sampah Surat Masuk" }
      ]
    }]
  });
  chart.render();
  
  }
  </script>
        <div class="col-12 mt-5">          
          <div class="card" style="background-color: transparent">            
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
            <div class="card">
                <div class="card-body">
                  <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
                  <script src="{{ asset('/js/canvasjs.min.js') }}"></script>
                 </div>                 
            </div>
             
@endsection
