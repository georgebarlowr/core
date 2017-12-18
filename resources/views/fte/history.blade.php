@extends ('layout')

@section('content')

    <div class="col-md-12">
        <div class="panel panel-ukblue">
            <div class="panel-heading"><i class="glyphicon glyphicon-time"></i> &thinsp; History</div>
            <div class="panel-body">
                All of your completed Flight Training Exercises are listed below.<br><br>
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Date</th>
                        <th>Flight ID</th>
                        <th>Flight Name</th>
                        <th>Landing Rate</th>
                        <th>Duration</th>
                        <th>Details</th>
                    </tr>
                    @foreach($pireps as $pirep)
                        <tr>
                            <td>{{ $pirep->created_at }}</td>
                            <td>{{ $pirep->bid->flight->id }}</td>
                            <td>{{ $pirep->bid->flight->name }}</td>
                            <td>{{ $pirep->landing_rate }}</td>
                            <td>{{ $pirep->flight_time }}</td>
                            <td><a href="{{ route('fte.history', $pirep) }}">View</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@stop
