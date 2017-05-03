@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px;">
        <div class="col-sm-offset-4 col-sm-4 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">登入</div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">員工編號：</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">密碼：</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-default">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection