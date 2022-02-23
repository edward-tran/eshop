@extends('layouts.admin')
@section('title')
Users Detail
@endsection
@section('content')
    <div class="card" style="margin: 20px 20px; border-radius:20px; width:75%;">
        <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;" >
            <h4>Users Detail</h4>
        </div>
        <div class="card-body">
        <table style="text-align: center;">
        <thead class="col-md-12">
            <tr style="font-weight: bold;">
                <td class="col-md-1">Name</td>
                <td class="col-md-">Email</td>
                <td class="col-md-2" >Address</td>
                <td class="col-md-2" >Phone Number</td>
                <td class="col-md-1">Role</td>
                <td class="col-md-2">Created Date</td>
                <td class="col-md-2">Updated Date</td>
            </tr>
        </thead>
        <tbody>
            <tr style="padding-left:20px;">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role_as == '1' ? 'admin' : 'user'}}</td>
                <td>{{ date('d-m-Y', strtotime( $user->created_at )) }}</td>
                <td>{{ date('d-m-Y', strtotime( $user->updated_at )) }}</td>
            </tr>
        </tbody>
    </table>
        </div>
    </div>
@endsection