@extends('layouts.master')
@section('title','Category')
    

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Category</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
                    
                @endforeach
                </div>                
            @endif
<form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
    {{-- {!! Form::open([url(''),'method'=>'post','enctype'=>"multipart/form-data"]) !!} --}}
@csrf
@method('POST')
{!! Form::model($category, ['route' => ['category.edit', $category->id]])!!}
<div class="mb-3">
    {!! Form::label('', 'Category Name')!!}
    {!!Form::text('name',null,[
        'class'=>"form-control", 'id'=>"name"
    ])!!}
</div>
<div class="mb-3">
    {!!Form::label('', 'Description')!!}
    {!!Form::textarea('description',null,[
        'class'=>"form-control",'id'=>"mySummernote", 'rows'=>"5"
        ])!!}
</div>
<div class="mb-3">
    {!!Form::label('', 'Image')!!}
    {!!Form::file('image',null,[
        'class'=>"form-control", 'id'=>"image"
    ])!!}
        {{-- <input type="file" name="image" required class="form-control">  --}}
</div>
<div class="mb-3">
    {!!Form::label('', 'Title')!!}
    {!!Form::text('title',null,[
        'class'=>"form-control",'id'=>"title"
        ])!!}
</div>
<h6>Show in navbar </h6>
<div class="row">
    <div class="col-md-3 mb-3">
       {{-- {{ <label for="">Yes</label>}} --}}
       {!!Form::label('', 'Yes')!!}
       {!!Form::checkbox('navbar_status',null,[
              ])!!}
        {{-- <input type="checkbox" name="navbar_status" value="{{$category->navbar_status}}"></div> --}}
    </div>
</div>
 <h6>Publised </h6>
<div class="row">

        <div class="col-md-3 mb-3">
            {!!Form::label('', 'Yes')!!}
       {!!Form::checkbox('status',null,[
              ])!!}
              </div></div>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary">Update Category</button>
</div>

</div>
</form>
        </div>
    </div>
</div>
@endsection