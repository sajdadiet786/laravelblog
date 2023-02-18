@extends('layouts.app')
@section('content')
 {{-- <h4>hello guys welcome to the home page</h4>    --}}
    <div class="bg-gray py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($all_categories as $all_cate_item)
                            
                        <div class="item">
                            <a href="{{route('tutorial.category_slug',[$all_cate_item->slug])}}" class="text-decoration-none">
                            <div class="card">
                                <img src=" {{asset($all_cate_item->image)}}" alt="Image"  width="250px" height="250px">
                                <div class="card-body text-center">
                                    <h4 class="text-dark">{{$all_cate_item->name}}</h4>
                                    </div>
                                    </div>
                                </a>
                                    </div>
                                    @endforeach
                </div>
            </div>
            </div>
        </div>

    </div>
    {{-- <div class="py-1 bg-gray">
        <div class="container">
            <div class="border text-center p-3">
                <h3>Advertise here</h3>
            </div>
        </div>
    </div> --}}


    {{-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h4>hello everyone</h4>
                    <div class="underline"></div>
                        <p >
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                        </p>
                      
                    
                </div> --}}
            {{-- </div>
        </div>
    </div> --}} 

    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All category lists</h4>
                    <div class="underline">
                       
                    </div></div>
                    @foreach ($all_categories as $all_cateitem)
                    <div class="col-md-3">

                        <div class="card card-body mb-3">
                            <a href="{{route('tutorial.category_slug',[$all_cateitem->slug])}}" class="text-decoration-none">
                            <h5 class="text-dark mb-0">{{$all_cateitem->name}}</h5></a>
                        </div>
                    </div>
                        
                    @endforeach
                </div>
            </div>
        </div>



    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest posts</h4>
                    <div class="underline">
                       
                    </div></div>
                    <div class="col md-8">

                        @foreach ($latest_posts as $latest_post_item)
                       
    {{-- //.'/'.$latest_post_item->category --}}
                            <div class="card card-body bg-gray shadow mb-3">
                                <a href="{{route('post.detail',[$latest_post_item->slug])}}" class="text-decoration-none">
                                <h5 class="text-dark mb-0">{{$latest_post_item->name}}</h5></a>
                                <h6>
                                    Posted On:{{$latest_post_item->created_at->format('d-m-Y')}}
                                </h6>
                            </div>
                        
                        @endforeach
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