
@extends('adminlte::page')

@section('title', 'ROUTER')

@section('content_header')
    <h1>Router Dashboard</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Unapproved BodaBoda Riders</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>National Id</th>
                    <th>Telephone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_bodas as $i)
                    <tr>
                        <td>{{$i['userName']}}</td>
                        <td><img src="{{$i['NationalIDPic']}}" style="height:50px"></td>
                        <td>{{$i['phone']}}</td>
                        <td>{{$i['accountStatus']}}</td>
                        <td><form action="/updating" method="POST">
                                @csrf
                                {{ method_field('POST') }}
                                <input type="hidden"  name="id" value="{{$i['accountStatus']}}"/>
                                <input type="submit" value="Approve"></form></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop
