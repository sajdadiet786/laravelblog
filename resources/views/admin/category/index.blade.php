@extends('layouts.master')
@section('title','Category')
    

@section('content')
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="{{url('admin/delete-category')}}" method="post">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete category with its posts</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="category_delete_id" id="category_id">
        <h5>Are you sure you want to delete this category with all its posts.?</h5>
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-danger ">Yes Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4> Category List<a href="{{url('admin/add-category')}}" class="btn btn-primary btn-sm float-end">Add Category</a></h4>
        </div>
        <div class="card-body">

            @if(session ('message'))
             <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="table-responsive">
            <table  id="myDataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </tr>

                </thead>
<tbody>
    @foreach ($category as $item)
        
  
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>
        <img src="{{$item->image}}" width="200px" height="200px" alt="Img"></td>
        <td>{{$item->status=='1' ? 'Hidden': 'Visible'}}</td>
        <td>
            <a href="{{route('category.edit',['category_id'=>$item->id])}}" class="btn btn-success">Edit</a>
            {{-- <a href="{{route('category.delete',['category_id'=>$item->id])}}" class="btn btn-danger">Delete</a> --}}
            <button  type="button" class="btn btn-danger deleteCategoryBtn" value="{{$item->id}}">Delete</button>
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
@endsection
@section('scripts')
<script>
 $(document).ready(function () {
    $('.deleteCategoryBtn').click(function (e) {
        // $(document).on(click,'.deleteCategoryBtn', function (e) {
            
   
        e.preventDefault();
        
        var category_id=$(this).val();
        $('#category_id').val(category_id);
        $('#deleteModel').modal('show');

    });
 });

</script>
@endsection