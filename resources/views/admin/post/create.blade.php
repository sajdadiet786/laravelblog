@extends('layouts.master')
@section('title','Add post')
@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Post
                <a href="{{url('admin/add-post')}}" class="btn btn-primary  btn-sm float-end">Add post</a>
            </h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                    
                @endforeach
                </div>                
            @endif
            <form action="{{url('admin/add-post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    
                    <label for="">Category</label>
                    <select name="categories[]" class="form-control categories" multiple="multiple">
                       
                         @foreach ($categories as $catitem)
                             
                        
                          <option value="{{ $catitem->id }}">{{ $catitem->name }}
                        </option>
                        @endforeach
                    </select> 
                </div>
                <div class="mb-3">
                
                    {!!Form::label('', 'Post Name')!!} 
                    {!!Form::text('name',null,[
                        'class'=>"form-control",'id'=>"name"
                        ])!!}
                  
                </div>
                <div class="mb-3">
                
                </div>
                <div class="mb-3">
                    {!!Form::label('', 'Description')!!}
                    {!!Form::textarea('description',null,[
                        'class'=>"form-control",'id'=>"mySummernote", 'rows'=>"5"
                        ])!!}
                </div>
                <h4>Post Status</h4>
                <div class="row">
                    <div class="col-md-4">
                <div class="mb-3">
                    <label for="">Yes</label>
                    <input type="checkbox" name="status">
                </div>
            </div>
       
                <div class="col-md-6">
                    <div class="mb-3">
                    <button type="submit" name="save_multiple"
                    class="btn btn-primary float-end">Save Post</button>
                </div>
            </div>
        </div>
                
                
                </form>
        </div>

    </div>
    <script>

// new MultiSelectTag('category_id') 
// $(document).ready(function() {
//     $('#category_id').select2();
// });



    </script>
    @endsection