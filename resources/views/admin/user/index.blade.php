   
   
@extends('layouts.master')
@section('title','View Users')
    

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Users List
            </h4>
        </div>
        <div class="card-body">
            @if(session ('message'))
            <div class="alert alert-success">{{session('message')}}</div>
           @endif
           <div class="table-responsive">
           <table id="myDataTable"  class="table table-bordered" id="myDataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Users Name</th>
                    <th>Email</th>
                    <th>Role </th>
                    <th>Operation</th>
                </tr>

            </thead>
<tbody>
@foreach ($users as $item)
    

<tr>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->email}}</td>
    <td>{{$item->role_as =='1' ? 'Admin': 'User'}}</td>
    <td>
        {{-- <a href="{{url('admin/user/'.$item->id)}}" class="btn btn-success">Edit</a> --}}
        <a href="{{route('user.edit',['user_id'=>$item->id])}}" class="btn btn-success">Edit</a>
        {{-- <a href="{{route('user.delete',['user_id'=>$item->id])}}" class="btn btn-danger">Delete</a> --}}
    </td>
   
</tr>
@endforeach 
</tbody>
        </table>
    </div>
    </div>
</div>
{{-- <h1 class="mt-4">Category</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Category</li>
</ol> --}}
{{-- <div class="row">
</div> --}}
</div>
        </div>
    </div>
    @endsection