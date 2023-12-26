@include('client.clientParts.header')
@if(auth()->user()->role=='user')
<div class="modalContainer">
   <div class="modal">
    <div class="modalColser">
        <span>X</span>
    </div>
    <div class="editAuth">
        <div class="auth">
            <form method="POST" enctype="multipart/form-data" action="{{ route('user.editProfile',['id'=>$user->id]) }}">
                @csrf
                
                <div class="auth-1">
                    <label for="name"  class="col-md-4 col-form-label text-md-end">{{ __('Change user name') }}</label>
                    <div class="emailContainer">
                        <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="countryInput">
                        <label for="location">Change Locaiton</label>
                        <div class="selectCountry">
                            <select name="location" id="country2">
                                <option value="{{$user->location}}" selected>{{$user->location}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="auth-2">
                    <label for="email" class="">{{ __('Change Email Address') }}</label>
                    <div class="emailContainer">
                        <input name="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror"  required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="auth-2">
                    <label for="image" class="">{{ __('Change Profile Photo') }}</label>
                    <div class="emailContainer">
                        <input class="imageUpload" value="{{$user->image}}" type="file" name="image">
                    </div>
                </div>
                <div class="auth-3">
                    <button type="submit" class="loginLink">
                        {{ __('Edit') }}
                    </button>
                </div>
            </form>
            </div>
    </div>
</div>
</div>
   @endif
   @if(auth()->user()->role=='host')
<div class="modalContainer">
   <div class="modal">
    <div class="modalColser">
        <span>X</span>
    </div>
    <div class="editAuth">
        <div class="auth">
            <form method="POST" enctype="multipart/form-data" action="{{ route('user.editProfile',['id'=>$user->id]) }}">
                @csrf
                
                <div class="auth-1">
                    <label for="name"  class="col-md-4 col-form-label text-md-end">{{ __('Change user name') }}</label>
                    <div class="emailContainer">
                        <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="countryInput">
                        <label for="location">Change Locaiton</label>
                        <div class="selectCountry">
                            <select name="location" id="country2">
                                <option value="{{$user->location}}" selected>{{$user->location}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="auth-2">
                    <label for="email" class="">{{ __('Change Email Address') }}</label>
                    <div class="emailContainer">
                        <input name="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror"  required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="auth-2">
                    <label for="image" class="">{{ __('Change Profile Photo') }}</label>
                    <div class="emailContainer">
                        <input class="imageUpload" value="{{$user->image}}" type="file" name="image">
                    </div>
                </div>
                <div class="auth-3">
                    <button type="submit" class="loginLink">
                        {{ __('Edit') }}
                    </button>
                </div>
            </form>
            </div>
    </div>
</div>
</div>
   @endif
   @if(auth()->user()->role=='guide')
<div class="modalContainer">
   <div class="modal">
    <div class="modalColser">
        <span>X</span>
    </div>
    <div class="editAuth">
        <div class="auth guideAuth">
            <form method="POST" enctype="multipart/form-data" autofocus="off" action="{{ route('user.editGuide',['id'=>$user->id]) }}">
                @csrf
                
                <div class="auth-1">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Change user name') }}</label>
                    <div class="emailContainer">
                        <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="countryInput">
                        <label for="location">Change Locaiton</label>
                        <div class="selectCountry">
                            <select name="location" id="country">
                                <option value="{{$user->location}}" selected>{{$user->location}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="auth-2">
                    <label for="email" class="">{{ __('Change Email Address') }}</label>
                    <div class="emailContainer">
                        <input name="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror"  required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="auth-2">
                    <label for="image" class="">{{ __('Change Profile Photo') }}</label>
                    <div class="emailContainer">
                        <input class="imageUpload" type="file" name="image">
                    </div>
                </div>
                <div>
                    <label for="price">Change your price:</label>
                <input class="guidePrice" value="{{$user->guides->price}}" type="number" name="price">
                </div>
                <div>
                    <label for="language">Change what languages you know</label>
                <select name="language[]" multiple id="language" class="styled-select">
                    @foreach($aviable_for as $item)
                    <option value="{{$item}}" selected>{{$item}}</option>
                    @endforeach
                </select>
                </div>
                <div>
                    <label for="aviable">Change where you can aviable</label>
                <select name="aviable[]" multiple id="aviable" class="styled-select">
                    @foreach($languages as $item)
                    <option value="{{$item}}" selected>{{$item}}</option>
                    @endforeach
                </select>                        
                </div>
                <div>
                    <label for="about">Change a information about you:</label>
                <textarea name="about" id="" cols="30" rows="10">{{$user->guides->about}}</textarea>
                </div>
                <div class="auth-3">
                    <button type="submit" class="loginLink">
                        {{ __('Edit') }}
                    </button>
                </div>
            </form>
            </div>
    </div>
</div>
</div>
   @endif
   @if($request !=null && $request->type=='guide')
<div class="modalContainer2">
    <div class="modal2">
        <div class="modalColser2">
            <h3>Enter nesseccary informations to be guide</h3>
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="editAuth">
                <form method="POST" enctype="multipart/form-data" action="{{ route('user.guide') }}">
                    <div class="guideForm">
                        @csrf
                        <div>
                            <label for="price">Enter your price:</label>
                        <input class="guidePrice" type="number" name="price">
                        </div>
                        <div>
                            <label for="language">Enter what languages you know</label>
                        <select name="language[]" multiple id="language" class="styled-select">
                        </select>
                        </div>
                        <div>
                            <label for="aviable">Enter where you can aviable</label>
                        <select name="aviable[]" multiple id="aviable" class="styled-select">
                        </select>                        
                        </div>
                        <div>
                            <label for="about">Enter a information about you:</label>
                        <textarea name="about" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div>
                        <button class="userInfo" type="submit">Send</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endif
@if(auth()->user()->role=='host' || auth()->user()->role=='guide')
<div class="modalContainer3">
    <div class="modal3">
        <div class="modalColser3">
            <h3 class="text-2xl font-semibold mb-6">Create a New Blog</h3>
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="editAuth">
                <form method="POST" enctype="multipart/form-data" action="{{route('blogs.create')}}">
                    <div class="guideForm">
                        @csrf
                        <div class="max-w-md bg-white p-8 rounded-lg shadow-lg">
                    
                            <div class="mb-6">
                                <label for="blogName" class="block text-sm font-medium text-gray-700 mb-2">Blog Name</label>
                                <input type="text" id="blogName" name="blogName"
                                    class="block w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                            </div>
                    
                            <div class="mb-6">
                                <label for="shortDescription" class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                                <textarea id="shortDescription" name="shortDescription" rows="4"
                                    class="block w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"></textarea>
                            </div>
                    
                            <div class="mb-6">
                                <label for="blogDescription" class="block text-sm font-medium text-gray-700 mb-2">Blog Description</label>
                                <textarea id="blogDescription" name="blogDescription" rows="8"
                                    class="block w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"></textarea>
                            </div>
                    
                            <div class="mb-6">
                                <label for="blogImage" class="block text-sm font-medium text-gray-700 mb-2">Blog Image</label>
                                <input type="file" id="blogImage" name="blogImage"
                                    class="block imageUpload w-full p-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                            </div>
                    
                            <button type="submit"
                                class="bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-500">
                                Create Blog
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endif
@include('client.clientParts.nav2')
<div class="main">
    @if($request !=null && $request->type=='guide')
    <script>
         toastr.options={
        'progressBar':true
    }
    toastr.success("We need a little information about you for to make guide!")
    </script>
    @endif
<div class="userPageContent">
    <div class="user-1">
        <div class="userInformation">
            <div class="userContent">
                <img class="UserMainProfile" src="{{asset("/images/userImgs/$user->image")}}" alt="">
                <h2>{{$user->name}}</h2>
                <p class="mainLocation mainLocation-2" >
                    <img src="{{asset('/images/location.svg')}}" alt=""> <span class="location">{{$user->location}}</span>
                </p>
                <p class="userEmail">Email : {{$user->email}}</p>
            </div>
            <div class="userActions">
                <button>Edit Profile</button>
                @if(auth()->user()->role=='user' && $request==null)
                <a class="requestLink" href="{{route('user.request',['id'=>$user->id])}}">Switch To Guide</a>
                @elseif($request !=null && $request->type=='user')
                <a class="requestLink" ><div class="loader"></div></a>
                @elseif($request !=null && $request->type=='guide')
                <div>
                <button class="guideInformations">Enter some informations</button>
                </div>
                @elseif(auth()->user()->role=='guide' && $request==null)
                <a href="{{route("user.host",['id'=>$user->id])}}" class="requestLink">Switch to Host</a>
                @elseif(auth()->user()->role=='guide' && $request !=null && $request->type=='host')
                <a class="requestLink" ><div class="loader"></div></a>
                @elseif(auth()->user()->role=='host')
                <a href="{{route('tourPlan.plan1')}}" class="requestLink">Prepare tour</a>
                @endif
                @if(auth()->user()->role=='host' || auth()->user()->role=='guide')
                <button class="blogWriterBtn">Write Blog</button>
                @endif
                @if(auth()->user()->role=='host' || auth()->user()->role=='guide')
                <a href="{{route('user.userBlogEdit',['id'=>$user->id])}}" class="requestLink">Blogs</a>
                @endif
                <a ></a>
                @if( $user->role=="host")
                    <a  class="requestLink" href="{{route('user.userTour',['id'=>$user->id])}}">Tours</a>
                @endif
            </div>
        </div>
    </div>
    <div class="userBookings">
        <div class="userBookingContent">
            <h2>Bookings</h2>
            <div class="selecetBarContainer">
                <select class="selecetBarContainerSelect" name="" id="changeSelectBar">
                    <option value="">Property</option>
                    <option value="">Guide</option>
                </select>
                <div class="ActiveBox">
                    <span id="activeTour" class="bookActive">Active</span>
                    <span id="pastTour">Past</span>
                </div>
            </div>
            <div class="bookedUserContainer">
                <div id="bookedItem1">
                       @foreach ($activeHotels as $item)
                       <div  class="bookedProperty">
                        <img class="bookedPropertyImage" src="{{asset('/images/imgs/'.$item->hotel->image)}}" alt="">
                        <div class="bookedPropertyContent">
                            <h3>
                                {{$item->hotel->name}}
                            </h3>
                            <div class="mainLocation mainLocation-2">
                                <img src="{{asset('/images/recoloc.svg')}}" alt="">
                                <span>
                                    {{$item->hotel->location}}
                                </span>
                            </div>
                            <div class="bookedRated">
                                <img src="{{asset("/images/homeStar.svg")}}" alt=""><span class="value">5.0</span>
                            </div>
                            <span>
                                <span class="propertyPrice">
                                    {{$item->hotel->price}}$/
                                </span>night
                            </span>
                        </div>
                    </div>
                       @endforeach
                </div>
                    <div  id="bookedItem2" class="nonActive">
                        @foreach ($pastHotels as $item)
                        <div class="bookedProperty ">
                            <img class="bookedPropertyImage" src="{{asset('/images/imgs/'.$item->hotel->image)}}" alt="">
                            <div class="bookedPropertyContent">
                                <h3>
                                    {{$item->hotel->name}}
                                </h3>
                                <div class="mainLocation mainLocation-2">
                                    <img src="{{asset('/images/recoloc.svg')}}" alt="">
                                    <span>
                                        {{$item->hotel->location}}
                                    </span>
                                </div>
                                <div class="bookedRated">
                                    <img src="{{asset("/images/homeStar.svg")}}" alt=""><span class="value">5.0</span>
                                </div>
                                <span>
                                    <span class="propertyPrice">
                                        {{$item->hotel->price}}$/
                                    </span>night
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
            <div class="bookedGuideContainer nonActive">
                <div id="bookedItem3">
                    @foreach ($activeGuides as $guide)
                    <div class="oneGuideContainer">
                        <div class="recGuideImage">
                            <img src="{{asset("/images/userImgs/".$guide->guide->image)}}"
                                alt="">
                        </div>
                        <div class="recGuideContent">
                            <h3>
                                <a href="{{route('home.guide',['id'=>$guide->guide->id])}}">{{$guide->guide->name}}</a>
                            </h3>
                            <div class="mainLocation mainLocation-2">
                                <img src="{{asset("/images/recoloc.svg")}}" alt=""> {{$guide->guide->location}}
                            </div>
                            <div>
                                <span class="guidePriceBlue">{{$guide->guide->guides->price}}$/</span>day
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="bookedItem4" class="nonActive">
                    @foreach ($pastGuides as $guide)
                    <div class="oneGuideContainer">
                        <div class="recGuideImage">
                            <img src="{{asset("/images/userImgs/".$guide->guide->image)}}"
                                alt="">
                        </div>
                        <div class="recGuideContent">
                            <h3>
                                <a href="{{route('home.guide',['id'=>$guide->guide->id])}}">{{$guide->guide->name}}</a>
                            </h3>
                            <div class="mainLocation mainLocation-2">
                                <img src="{{asset("/images/recoloc.svg")}}" alt=""> {{$guide->guide->location}}
                            </div>
                            <div>
                                <span class="guidePriceBlue">{{$guide->guide->guides->price}}$/</span>day
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="userPlans">
        <div class="userTourContainer">
            <h2>
                Tours
            </h2>
            <div class="tourActivePast">
                <span style="cursor: pointer" id="tourActivator" class="bookActive">
                    Active
                </span>
                <span style="cursor: pointer" id="tourDeactivator">
                    Past
                </span>
            </div>
            <div id="UserTourContainer">
                @foreach ($activeTour as $item)
                    <div  class="bookedProperty">
                        <img class="bookedPropertyImage" src="{{asset('/images/tourImgs/'.$item->active->image)}}" alt="">
                        <div class="bookedPropertyContent">
                            <h3>
                               <a href="{{route('home.tourDetails',['id'=>$item->id])}}"> {{$item->active->name}}</a>
                            </h3>
                            <div class="mainLocation mainLocation-2">
                                <img src="{{asset('/images/plane.svg')}}" alt="">
                                <span>
                                    {{$item->active->start_location}}
                                </span>
                            </div>
                            <div class="bookedRated">
                                <img src="{{asset("/images/homeStar.svg")}}" alt=""><span class="value">5.0</span>
                            </div>
                            <span>
                                <span class="propertyPrice">
                                    {{$item->active->price}}$/
                                </span>night
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="pastUserTourContainer" class="nonActive">
                @foreach ($pastTour as $item)
                <div  class="bookedProperty">
                    <img class="bookedPropertyImage" src="{{asset('/images/tourImgs/'.$item->active->image)}}" alt="">
                    <div class="bookedPropertyContent">
                        <h3>
                            <a href="{{route('home.tourDetails',['id'=>$item->id])}}"> {{$item->active->name}}</a>
                         </h3>
                        <div class="mainLocation mainLocation-2">
                            <img src="{{asset('/images/plane.svg')}}" alt="">
                            <span>
                                {{$item->active->start_location}}
                            </span>
                        </div>
                        <div class="bookedRated">
                            <img src="{{asset("/images/homeStar.svg")}}" alt=""><span class="value">5.0</span>
                        </div>
                        <span>
                            <span class="propertyPrice">
                                {{$item->active->price}}$/
                            </span>night
                        </span>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

</div>
<script src="{{asset('/client/js/activePast.js')}}">
</script>
<script>
    const country = document.getElementById("country");
    fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
        let option = document.createElement("option");
        option.textContent = item.name;
        option.setAttribute("value", item.name);
        country.append(option);
        });
    })
  
</script>

@if(auth()->user()->role=='user')
<script>
      const country2 = document.getElementById("country2");
    fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
        let option = document.createElement("option");
        option.textContent = item.name;
        option.setAttribute("value", item.name);
        country2.append(option);
        });
    })
</script>
@endif
<script>
    const language = document.getElementById("language");
    fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
        let option = document.createElement("option");
        option.textContent = item.name;
        option.setAttribute("value", item.name);
        language.append(option);
        });
    })
    const aviable = document.getElementById("aviable");
    fetch("https://restcountries.com/v2/all")
    .then((res) => res.json())
    .then((data) => {
        data.map((item) => {
        let option = document.createElement("option");
        option.textContent = item.name;
        option.setAttribute("value", item.name);
        aviable.append(option);
        });
    })
</script>
<script src="{{asset('/client/js/modal2.js')}}"></script>
<script src="{{asset('/client/js/modal3.js')}}"></script>
<script src="{{asset('/client/js/modal.js')}}"></script>
@include('client.clientParts.footer')
