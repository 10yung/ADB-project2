@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="col-sm-offset-4 col-sm-4 col-xs-12">
            @include('partials._flashMessages')
            <div class="panel panel-primary">
                <div class="panel-heading">登入</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">員工編號：</label>
                            <input type="text" name="account" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">密碼：</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group text-center">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                忘記密碼
                            </a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include ('partials._javascirpt-var-footer')
@endsection