@extends('layouts.master')
@section('title','Edit Users')
    

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Users
                <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm float-end ">Back</a>
            </h4>
        </div>
        <div class="card-body">
           
                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p class="form-control">{{$user->name}}</p>
                </div>
                <div class="mb-3">
                    <label for="">Email Id</label>
                    <p class="form-control">{{$user->email}}</p>
                </div>
                <div class="mb-3">
                    <label for="">Created_at</label>
                    <p class="form-control">{{$user->created_at->format('d/m/Y')}}</p>
                </div>
                {{-- <div class="mb-3">
                    <label for="">Full Name</label>
                    <p>{{$user->name}}</p>
                </div> --}}
                <form action="{{url('admin/update-user/'.$user->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="">Role as</label>
                       <select name="role_as" class="form-control" id="">
                        <option value="1" {{ $user->role_as=='1' ? 'selected':''}}>Admin</option>
                        <option value="0" {{ $user->role_as=='0' ? 'selected':''}}>User</option>
                        <option value="2" {{ $user->role_as=='2' ? 'selected':''}}>Blogger</option>
                       </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success btn-sm ">Update Users Role</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection