<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/public/theme/css/bootstrap.min.css') }}">

    <title>EFS BAS | Report Outbox</title>
</head>
<body>
    <div class="container">
        <h1>BAS LPKIA - Report Outbox</h1>
        <div class="table-responsive-lg">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Surat Untuk</th>
                        <th>Judul</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach($outbox as $o)                                  
                    <tr>  
                        <td>{{ $i++ }}</td>                      
                        <td>{{ $o->letter_number }}</td>
                        <td>{{ $o->date }}</td>
                        <td>{{ $o->from }}</td>
                        <td>{{ $o->title }}</td> 
                        <td>{{ $o->created_by }}</td>                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>