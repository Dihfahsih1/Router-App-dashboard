
@extends('adminlte::page')
@section('title', 'ROUTER')
@section('content_header')
    <h1>Router Dashboard</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Customer's Wallet</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Reference Number</th>
                    <th>Telephone</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $Customer as $i)
                    <tr>
                        <td>{{$i['customer']}}</td>
                        <td>{{$i['Phone']}}</td>
                        <td>{{$i['Amount']}}</td>
                        <td>{{$i['transaction_status']}}</td>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop