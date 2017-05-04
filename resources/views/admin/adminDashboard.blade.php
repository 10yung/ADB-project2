@extends('layouts.dashboard')

@section('content')
    @include('partials._flashMessages')

    <div class="col-xs-12 col-sm-12 text-center">
        <form class="form-inline" method="POST" action="{{ url('/admindashboard/updaterentrecord') }}" >
            {{ csrf_field() }}
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-success">修改所有過期教室的狀態</button>
            </div>
        </form>
    </div>

    <div class="col-xs-12 col-sm-12" style="margin-top: 30px;">
        <div class="panel panel-primary">
            <div class="panel-heading">所有租借記錄</div>
            <div class="panel-body">
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

                    @foreach($totalRentRecord as $key => $totalRentRecord)
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