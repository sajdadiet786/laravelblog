@extends('layouts.app')
@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>search categories</h4>
                    <div class="underline">

                    </div>
                </div>
                <div class="col md-8">

                    @forelse ($search as $all_cateitem)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{ route('tutorial.category_slug', [$all_cateitem->slug]) }}"
                                class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{ $all_cateitem->name }}</h5>
                            </a>
                            <h6>
                                Posted On:{{ $all_cateitem->created_at->format('d-m-Y') }}
                            </h6>
                        </div>
                    @empty
                        <div class=" mt-4">
                            <div class="card card-body bg-gray shadow mb-3">
                                <h2 class="post-heading">No Categories Available</h2>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="col md-4">
                    <div class="border text-center p-3">
                        <h3>Advertise here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Search posts</h4>
                    <div class="underline">

                    </div>
                </div>
                <div class="col md-8">

                    @forelse ($postsearch as $latest_post_item)
                        <div class="card card-body bg-gray shadow mb-3">
                            <a href="{{ route('post.detail', [$latest_post_item->slug]) }}" class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{ $latest_post_item->name }}</h5>
                            </a>
                            <h6>
                                Posted On:{{ $latest_post_item->created_at->format('d-m-Y') }}
                            </h6>
                        </div>
                    @empty
                        <div class="mt-4">
                            <div class="card card-body bg-gray shadow mb-3">
                                <h2 class="post-heading">No Posts Available</h2>
                            </div>
                        </div>
                    @endforelse

                </div>
                <div class="col md-4">
                    <div class="border text-center p-3">
                        <h3>Advertise here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
