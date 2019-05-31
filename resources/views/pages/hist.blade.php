
@extends('adminlte::page')

@section('title', 'ROUTER')

@section('content_header')
    <h1>Router Dashboard</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Taxi Drivers' History</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Driver</th>
                    <th>Customer</th>
                    <th>Pickup</th>
                    <th>Destination</th>
                    <th>Rating</th>
                    <th>Total Cost</th>
                </tr>
                </thead>
                <tbody>
                @foreach($allHistory as $i)
                    <tr>
                        <td><?php echo gmdate('m/d/Y H:i:s');?>{{$i['timestamp']}} </td>
                        <td>{{$i['driver']}}</td>
                        <td>{{$i['customer']}}</td>
                        <td>{{$i['PickUp']}}</td>
                        <td>{{$i['destination']}}</td>
                        <td>{{$i['rating']}}</td>
                        <td>{{$i['TotalCost']}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

