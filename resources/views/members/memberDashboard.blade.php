@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-6 col-xs-12">
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


    <script>
        $('.input-group.date').datepicker({
        });
    </script>
@endsection