@extends('layouts.master')
@section('title','Edit post')
    

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Post
                <a href="{{url('admin/post')}}" class="btn btn-danger  btn-sm float-end">Back</a>
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
            <form action="{{url('admin/update-post/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                {!! Form::model($post, ['route' => ['post.edit', $post->id]])!!}
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
        new MultiSelectTag('category_id') 
    </script>
    @endsection