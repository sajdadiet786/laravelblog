
<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3  d-sm-none d-none d-md-inline">
                <img src="{{asset('assets/images/logo.png')}}" style="width:20px; height:100px" class="w-100" alt="logo">

            </div>

            <div class="col-md-9 my-auto">
              <div class="border text-center p-2">
                <h5>Advertize here</h5></div>
            </div>
        </div>
    </div>

    <div class="sticky-top">

 
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
          <a href="" class="navbar-brand d-sm-inline d-inline d-md-none"> <img src="{{asset('assets/images/logo.png')}}" style="width:140px; alt="logo"></a>
          {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <ul class="navbar-nav ml-auto"> --}}
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>

                    @php
                     $categories= App\Models\Category::where('navbar_status','1')->where('status','0')->get();
                        
                    @endphp
                    @foreach ($categories as $catitem)
    

              <li class="nav-item">
                <a class="nav-link" href="{{url('tutorial/'.$catitem->slug)}}">{{$catitem->name}}</a>
              </li>
              @endforeach
              @if (Auth::check())
              <li><a class="nav-link btn-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                Logout
            </a>

            <form  id="logout-form" action="{{route('logout')}}" method="post" class="d-none">
            @csrf 
            </form>

        </li>
        @endif
       <li>
              @if (Route::has('login'))
                  <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                      @auth
                        <li>  <a href="{{ url('/home') }}" class="nav-link">Dashboard</a></li> 
                      @else
                      <li>  <a href="{{ route('login') }}" class="nav-link btn-success">Log in</a></li> 
  
                          @if (Route::has('register'))
                          <li>     <a href="{{ route('register') }}" class="nav-link btn-info">Register</a></li> 
                          @endif
                      @endauth
                  </div>
              @endif
              <form role="search" action="{{route('search')}}" method="GET" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
              
                <div class="input-group">
                 
                    <input class="form-control" type="search" placeholder="Search for..." value="{{Request::get('search')}}" name="search"/>
                    <button class="btn btn-primary" id="btnNavbarSearch" >Search</button>
                    {{-- <a href="{{url('/')}}">
                    <button type="button" class="btn btn-primary"> Reset</button>
                  </a> --}}
                </div>
            </form>
            </ul>
          </li>
        
          </div>
        </div>
    </nav>
  </div>
