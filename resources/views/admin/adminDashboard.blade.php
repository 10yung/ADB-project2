@extends('layouts.dashboard')

@section('content')
    @include('partials._flashMessages')
    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">新增使用者</div>
            <div class="panel-body">
                <form method="POST" action="{{ url('/admindashboard/createmember') }}" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>使用者名稱</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>密碼：</label>
                        <input type="password" class="form-control password" name="password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="showHide" type="checkbox">顯示密碼
                        </label>
                    </div>

                    <div class="form-group col-sm-3">
                        <button type="submit" class="btn btn-success" >新增</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="panel panel-danger">
            <div class="panel-heading">刪除使用者</div>
            <div class="panel-body">
                <form class="form-inline" method="POST" action="{{ url('/admindashboard/deletemember') }}" >
                    {{ csrf_field() }}
                    <div class="form-group col-sm-9">
                        <select class="form-control" id="userID" name="memberUserID"> 
                            @foreach($members as $member)
                                <option value="{{ $member->userID }}">{{ $member->name }}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group col-sm-3">
                        <button type="submit" class="btn btn-danger" >刪除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 text-center">
        <form class="form-inline" method="POST" action="{{ url('/admindashboard/updaterentrecord') }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <button type="submit" class="btn btn-success">修改所有過期教室的狀態</button>
            </div>
        </form>
    </div>

    <div class="col-xs-12 col-sm-12" style="margin-top: 30px;">
        <div class="panel panel-primary">
            <div class="panel-heading">所有租借記錄</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th>租借人</th>
                            <th>日期</th>
                            <th>教室編號</th>
                            <th>起始時間</th>
                            <th>結束時間</th>
                            <th>狀態</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($totalRentRecords as $key => $totalRentRecord)
                            <tr>
                                <td scope="row">{{ $key+1 }}</td>
                                @foreach ($totalRentRecord as $value)
                                    <td>{{ $value }}</td>
                                @endforeach
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{ $totalRentRecords->links() }}
            </div>
        </div>
    </div>

    @include ('partials._javascirpt-var-footer')

    <script>
        $('.input-group.date').datepicker({
        });


        $(document).ready(function() {
            $("#showHide").click(function() {
                if ($(".password").attr("type") == "password") {
                    $(".password").attr("type", "text");

                } else {
                    $(".password").attr("type", "password");
                }
            });
        });

    </script>
@endsection