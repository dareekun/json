@extends('layouts.app')

@section('content')
<div class="container m-3">
    <div class="row my-1">
        <div class="col-8">
            <h3>Option</h3>
            <p>Configure Export Schedule and Capture Time</p>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-8">
            <form action="/export" method="post">
            @csrf
                <div class="card">
                    <div class="card-header">
                        Export Schedule
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">Export Time</div>
                            <div class="col-8"><input type="time" value="{{$time}}" name="time" id="time" class="form-control"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-outline-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-8">
            <form action="/schedule" method="post">
            @csrf
                <div class="card">
                    <div class="card-header">
                        Capture Time Range
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">Start</div>
                            <div class="col-8"><input type="time" value="{{$start}}" name="start" id="time" class="form-control"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">Stop</div>
                            <div class="col-8"><input type="time" value="{{$stop}}" name="stop" id="time" class="form-control"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12" align="right">
                                <button type="submit" class="btn btn-outline-success">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection