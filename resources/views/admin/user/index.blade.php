@extends('layouts.admin')
@section('title')
Users
@endsection
@section('content')
    <div class="card" style="margin: 20px 20px; border-radius:20px; width:65%;">
        <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;" >
            <h4>Users</h4>
        </div>
        <div class="card-body">
        <table style="text-align: center;">
        <thead class="col-md-12">
            <tr style="font-weight: bold;">
                <td class="col-md-2">Name</td>
                <td class="col-md-3">Email</td>
                <td class="col-md-3" >Address</td>
                <td class="col-md-2" >Phone Number</td>
                <td class="col-md-3"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr style="padding-left:20px;">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ url('user/user-detail/'.$user->id) }}" class="btn btn-primary" style="border-radius: 30px;">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
@endsection