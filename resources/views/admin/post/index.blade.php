@extends('layouts.master')
@section('title', 'View Post')


@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Post List
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary  btn-sm float-end">Add post</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    {{-- @foreach ($categories as $catitem)
    <td> {{$catitem->name}} </td>
    @endforeach --}}

                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', ['post_id' => $item->id]) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ route('post.delete', ['post_id' => $item->id]) }}"
                                            class="btn btn-danger">Delete</a>
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
