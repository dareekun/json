@extends('layouts.app')

@section('content')
<div class="container m-3">
    <div class="row my-1">
        <div class="col-12">
            <h3>Record Collection</h3>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-12">
            <a class="btn btn-outline-primary" href="/download">Download Data</a>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-12">
            <table id="example" class="display table" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Nama</th>
                        <th>Nik</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                    @foreach ($record as $rc)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$rc->nama}}</td>
                        <td>{{$rc->nik}}</td>
                        <td>{{date('H:i:s', strtotime($rc->waktu))}}</td>
                        <td>{{date('d-m-Y', strtotime($rc->waktu))}}</td>
                    </tr>
                        @endforeach
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
    });
});
</script>
@endsection