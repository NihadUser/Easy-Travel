<nav>
    <div class="toogle-btn">
        <i class="fa-solid fa-bars"></i>
    </div>
    <div class="mobileImage">
        <img src="{{asset('/images/homeLogo.svg')}}" alt="">
    </div>
    <div class="navDemo">
        <a href="{{route("home")}}">
            <img src="{{asset('/images/homeLogo.svg')}}" alt="">
        </a>
    </div>
    <ul>
        <li @if(Route::current()->uri=="/") class="colorNav"  @endif><a  href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('about.aboutPage')}}">About us</a></li>
        <li @if(Route::current()->uri=="/blogs") class="colorNav"  @endif ><a href="{{route('blogs.blogs')}}">Blog</a></li>
        <li class="selections" ><a href="">Selections <i class="fa-solid fa-chevron-down"></i></a>
            <ul class="dropdownThree">
                <li><a href="{{route("selection.placeFav")}}">Place</a></li>
                <li><a href="{{route('selection.propertyFav')}}">Property</a></li>
                <li><a href="{{route('selection.guideFav')}}">Guide</a></li>
            </ul>
        </li>
    </ul>
    @guest
    <div class="navBarItem">
        @if (Route::has('login'))
        <li  class="nav-item">
            <a class="nav-link loginUserLink" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @endif
    
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link registerUserLink" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
    </div>
    @else
    <div class="navUser">
        <img class="userImage" src="{{asset("/images/userImgs/".Auth::user()->image)}}" alt="">
    <li class="nav-item dropdown">
        @if(Auth::user()->role=='user' || Auth::user()->role=='guide' || Auth::user()->role=='host') 
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('user.page',['id'=>auth()->id()])}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        @elseif(Auth::user()->role=='admin')
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('admin.dashboard')}}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ "Admin side" }}
        </a>
        @endif
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    </div>
    @endguest
    </ul>
</nav>