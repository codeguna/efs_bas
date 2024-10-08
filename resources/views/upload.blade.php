<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="row">        
        <div class="col-lg-8 mx-auto my-5">
            <h2 class="text-center my-5">Upload File</h2>
            @if(count($errors) >0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }} <br/>
                @endforeach
            </div>
            @endif

            <form action="{{ url('/upload/proses') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <b>File Gambar</b><br/>
                    <input type="file" name="file">
                </div>

                <div class="form-group">
                    <b>Keterangan</b><br/>
                    <textarea class="form-control" name="keterangan"></textarea>
                </div>

                <input type="submit" value="Upload" class="btn btn-primary">
            </form>

            <h4 class="my-5">Data</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1%">File</th>
                        <th>Keterangan</th>
                        <th width="1%">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gambar as $g)
                    <tr>
                        <td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
                        <td>{{ $g->keterangan }}</td>
                        <td><a class="btn btn-danger" href="/atk/upload/hapus/{{ $g->id }}">HAPUS</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>