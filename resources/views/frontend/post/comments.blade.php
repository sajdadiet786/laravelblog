@extends('layouts.master')
@section('title', 'Category')


@section('content')
    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">


            </div>
        </div>
    </div>
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">

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
                                <th>user name</th>
                                <th>comments</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->comment_body }}</td>
                                    <td>{{ $comment->status }}</td>
                                    {{-- <td>{{$item->status=='1' ? 'Hidden': 'Visible'}}</td> --}}
                                    <td>

                                        <button type="button" value="{{ $comment->id }}"
                                            class="deleteComment btn btn-danger btn-sm me-2">Delete</button>
                                        @if ($comment->status ==='pending')
                                            <form action="{{ route('comment.approve', [$comment->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm me-2">Approve</button>
                                            </form>
                                        @endif
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '.deleteComment', function() {
                if (confirm('Are you sure you want to delete this comment?')) {
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();
                    $.ajax({
                        type: "post",
                        url: "{{ route('delete.comment') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            'comment_id': comment_id
                        },

                        success: function(res) {
                            if (res.status == 200) {
                                thisClicked.closest('comment-container').remove();
                                alert(res.message);

                            } else {
                                alert(res.message);
                            }

                        }
                    });
                }
            });
        });
    </script>
@endsection
