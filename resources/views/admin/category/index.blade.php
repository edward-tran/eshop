@extends('layouts.admin')
@section('title')
Categories
@endsection
@section('content')
    @if (\Session::has('message'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
        </div>
    @endif
    <div class="card" style="margin: 20px 20px; border-radius:20px;">
        <div class="card-header" style="border-top-left-radius:20px; border-top-right-radius: 20px;">
            <h3>Category List</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;" class="w-25">Name</th>
                    <th style="text-align:center;" class="w-25">Description</th>
                    <th style="text-align:center;">Image</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td style="text-align:center;">{{$category->id}}</td>
                            <td style="text-align:center;">{{$category->name}}</td>
                            <td style="text-align:center;">{{$category->description}}</td>
                            <td style="text-align:center;">
                                <img src="{{ asset('assets/uploads/categories/'.$category->image ) }}" class="h-25 w-25">
                            </td>
                            <td class="w-25 h-25" style="text-align: center;">
                                <a class="btn btn-primary" href="{{ url('edit-category', $category->id) }}">Edit</a>
                                <a class="btn btn-danger" href="{{ url('delete-category', $category->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection