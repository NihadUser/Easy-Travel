<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{asset('/client/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset("/images/headerIcon.svg")}}">
     @if(Route::current()->uri=="home/place-details/{id}" || Route::current()->uri=="home/property-{id}-details" || Route::current()->uri=="user/tour_edit/{id}")
    <link rel="stylesheet" href="{{asset('/client/css/swiper.css')}}">
     @endif
     @if(Route::current()->uri=="user/{id}" || Route::current()->uri=="user/editBlog/{id}" || Route::current()->uri=="user/edit-page/{id}" || Route::current()->uri=="user/tour_edit/{id}")
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @endif
    @if(Route::current()->uri=="/")
    <link rel="stylesheet" href="{{asset('/client/css/responsive.css')}}">
    @else
    <link rel="stylesheet" href="{{asset('/client/css/responsiveBlog.css')}}">

    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

</head>

<body>
<main>
    <div class="Navigation">
        <div class="menuContainer">
            <div class="topMenu">
                <i class="fa-solid fa-bars"></i>
                <span class="noName">Menu</span>
            </div>
            <ul class="phoneMenuContainer">
                <li>
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('about.aboutPage')}}">About Us</a>
                </li>
                <li>
                    <a href="{{route('blogs.blogs')}}">Blogs</a>
                </li>
                <li class="drpDwnContainer">
                        Selections
                    <ul class="drpDwn">
                        <li>
                            <a href="{{route("selection.placeFav")}}">Place</a>
                        </li>
                        <li>
                            <a href="{{route('selection.propertyFav')}}">Property</a>
                        </li>
                        <li>
                            <a href="{{route('selection.guideFav')}}`">Guide</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <button class="mobileCloseBtn">Close</button>
        </div>
    </div>