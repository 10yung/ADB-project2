@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-12 col-xs-12">

        @include('partials._flashMessages')

        <form class="form-inline" method="POST" action="{{ url('/memdashboard/create') }}" >
            {{ csrf_field() }}
            <div class="form-group col-sm-3">
                <label for="exampleInputName2">教室編號：</label>
                <select class="form-control" id="sel1" name="rentClassroomID"> 
                    @foreach($classroomList as $classroom)
                        <option value="{{ $classroom->roomID }}">{{ $classroom->name }}</option>
                    @endforeach
                </select> 
            </div>

            <div class="form-group col-sm-5">
                <label for="exampleInputName2">日期：</label>
                <div class="input-group date">
                    <input type="text" class="form-control" name="rentDate"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
            </div>

            <div class="form-group col-sm-2">
                <label for="exampleInputName2">節：</label>
                <select class="form-control" id="sel1" name="rentPeriodID"> 
                    @foreach($periodList as $period)
                        <option value="{{ $period->periodID }}">{{ $period->startTime }} ~ {{ $period->endTime }}</option>
                    @endforeach
                </select> 
            </div>

            <div class="form-group col-sm-2">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="col-xs-12 col-sm-12">
        <div class="panel panel-primary" style="margin-top: 30px;">
            <div class="panel-heading">租借紀錄</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-responsive table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>日期</th>
                        <th>教室編號</th>
                        <th>起始時間</th>
                        <th>結束時間</th>
                        <th>刪除</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($totalRentRecord as $key => $totalRentRecord)
                        <tr>
                            <td scope="row">{{ $key+1 }}</td>
                            @foreach ($totalRentRecord as $value)
                                <td>{{ $value }}</td>
                            @endforeach
                            
                            <td><button class="btn btn-danger" type="submit">刪除</button></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $('.input-group.date').datepicker({
        });
        $('#datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    </script>
@endsection