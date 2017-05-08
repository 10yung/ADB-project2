@extends('layouts.dashboard')

@section('content')
    <div class="col-sm-12 col-xs-12" style="margin-top: 30px">

        @include('partials._flashMessages')

        <form class="form-inline" method="POST" action="{{ url('/memdashboard/create') }}" >
            {{ csrf_field() }}
            <div class="form-group col-sm-3">
                <label for="exampleInputName2">教室編號：</label>
                <select class="form-control" id="sel1" name="rentRoomID"> 
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
                <button type="submit" class="btn btn-success" onclick="console.log(createQueryLog);">Submit</button>
            </div>

        </form>
    </div>


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
                        <th>狀態</th>
                        <th>取消預約</th>
                    </tr>
                    </thead>
                    <tbody>



                    @if(isset($totalRentRecords))
                        @foreach($totalRentRecords as $key => $totalRentRecord)
                            <tr>
                                <td scope="row">{{ ++$key }}</td>

                                <td>{{ $totalRentRecord->Date }}</td>
                                <td>{{ $totalRentRecord->name }}</td>
                                <td>{{ $totalRentRecord->startTime }}</td>
                                <td>{{ $totalRentRecord->endTime }}</td>
                                <td>{{ $totalRentRecord->status }}</td>
                                <td>
                                @if($totalRentRecord->status == '預約中')
                                <form method="POST" action="{{ url('/memdashboard/cancel') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="rentDate" value="{{ $totalRentRecord->Date }}">
                                    <input type="hidden" name="rentRoomID" value="{{ $totalRentRecord->roomID }}">
                                    <input type="hidden" name="rentPeriodID" value="{{ $totalRentRecord->periodID }}">
                                    <button class="btn btn-danger" type="submit">取消預約</button>
                                </form>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif


                    </tbody>
                </table>
                {{ $totalRentRecords->links() }}
            </div>
        </div>
    </div>
    @include ('partials._javascirpt-var-footer')
    <script>
        $('.input-group.date').datepicker({
        });

        console.log('ControllerShow-querylog:');
        console.log(showQueryLog);

    </script>
@endsection