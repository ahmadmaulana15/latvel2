@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">MENU</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Jika Ingin Masuk ke tabel Hobi Silahkan Klick =>
                    <button><a href="{{route('hobi.index')}}">HOBI</a></button><br>
                    Jika Ingin Masuk ke tabel Dosen Silahkan Klick =>
                    <button><a href="{{route('dosen.index')}}">DOSEN</a></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
