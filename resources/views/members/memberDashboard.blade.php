@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-6 col-xs-12">
        <p>{{ $totalRentRecord }}</p>
        <div>
            <p>日期：</p>
        </div>
        <div class="input-group date">
            <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">
        <div>
            <p>第幾節：</p>
        </div>
        <div class="form-group">
            <select class="form-control" id="sel1">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">租借紀錄</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-responsive table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>日期</th>
                        <th>第幾節/時間</th>
                        <th>編輯</th>
                        <th>刪除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-primary" type="submit">更新</button></td>
                        <td><button class="btn btn-danger" type="submit">刪除</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><button class="btn btn-primary" type="submit">更新</button></td>
                        <td><button class="btn btn-danger" type="submit">刪除</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $('.input-group.date').datepicker({
        });
    </script>
@endsection