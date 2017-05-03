@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-12 col-xs-12">
        <form class="form-inline">
            <div class="form-group col-sm-3">
                <label for="exampleInputName2">教室編號：</label>
                <select class="form-control" id="sel1"> 
                    <option>I1-111</option> 
                    <option>I2-212</option> 
                    <option>I3-313</option>
                    <option>I1-414</option> 
                </select> 
            </div>

            <div class="form-group col-sm-4">
                <label for="exampleInputName2">日期：</label>
                <div class="input-group date">
                    <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
            </div>

            <div class="form-group col-sm-3">
                <label for="exampleInputName2">第幾節：</label>
                <select class="form-control" id="sel1"> 
                    <option>A</option> 
                    <option>B</option> 
                    <option>C</option>
                    <option>D</option> 
                    <option>E</option> 
                </select> 
            </div>

            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>

    <p>{{ $totalRentRecord }}</p>
    <div class="col-xs-12 col-sm-12">
        <div class="panel panel-primary" style="margin-top: 30px;">
            <div class="panel-heading">租借紀錄</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-responsive table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>日期</th>
                        <th>第幾節/時間</th>
                        <th>教室編號</th>
                        <th>刪除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>1234</td>
                        <td><button class="btn btn-danger" type="submit">刪除</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>1234</td>
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