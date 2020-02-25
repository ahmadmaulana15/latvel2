<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eloquement</title>
</head>
<body>
       @extends('layouts.template')
       @section('konten')
       @foreach($mahasiswa as $data)
       <h3> Nama Mahasiswa : {{$data->nama}}</h3>
       <h5>Hobi nya :
           @foreach($data->hobi as $val)
               <small>{{$val->hobi}}, </small>
           @endforeach
       </h5>
       <h4>
           <li>
           Nama Wali : <strong>{{$data->wali->nama}}</strong>
           </li>
           <li>
               Dosen  : <strong> {{$data->dosen->nama}}</strong>
           </li>
           <li>
               NIPD (Dosen) : <strong>{{$data->dosen->nipd}}</strong>
           </li>
       </h4>
       <hr>
   @endforeach
@endsection


</body>
</html>
