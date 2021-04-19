@extends('layouts.app')

@section('content')
<div class="container m-3">
    <div class="row my-1">
        <div class="col-8">
            <h3>Account Setting</h3>
            <p>Configure Account Setting</p>
        </div>
    </div>
    <div class="row my-1">
        <div class="col-8">
            <form action="/password" method="post">
            @csrf
                <div class="card">
                    <div class="card-header">
                        Change Password
                    </div>
                    <div class="card-body">
                        <div class="row my-1">
                            <div class="col-4">Current Password</div>
                            <div class="col-8"><input type="password" value="" name="oldpass" id="oldpass" class="form-control"></div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4">New Password</div>
                            <div class="col-8"><input type="password" value="" name="password" id="password" class="form-control"></div>
                        </div>
                        <div class="row my-1">
                            <div class="col-4"></div>
                            <div class="col-8"><input type="password" value="" name="confirmpass" id="confirmpass" class="form-control"></div>
                        </div>
                        <div class="row mt-3">
                        <div class="col-4">
                        @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <small @if ($error=="Password Berhasil Dirubah") style="color:#7bc043" @else style="color:#fe4a49" @endif class="form-text"><strong>{{$error}}</strong></small>
                        @endforeach
                        @endif
                        </div>
                            <div class="col-8" align="right">
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