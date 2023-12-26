<div id="dw-s1" class="bmd-layout-drawer bg-faded">

    <div class="container-fluid side-bar-container">
       
        <p class="side-comment">Tour</p>
        
        <ul class="side a-collapse ">
            <a class="ul-text"><i class="fas fa-tachometer-alt mr-1"></i> Pages
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li  class=" side-item" ><a href="{{route('admin.dashboard')}}"><i class="fas fa-angle-right mr-2"></i>Dashboard</a>
                </li>
                <li  class="  side-item"><a href="{{route('admin.places.adminPlace')}}"><i class="fas fa-angle-right mr-2"></i>Places</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.properties.property')}}"><i class="fas fa-angle-right mr-2"></i>Properties</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.blogs.category.category')}}"><i class="fas fa-angle-right mr-2"></i>Blogs' Categories</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.blogs.blogs')}}"><i class="fas fa-angle-right mr-2"></i>Blogs</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.users.index')}}"><i class="fas fa-angle-right mr-2"></i>Users</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.tours.index')}}"><i class="fas fa-angle-right mr-2"></i>Tours</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.bookings.bookings')}}"><i class="fas fa-angle-right mr-2"></i>Bookings</a>
                </li>
                <li  class=" side-item "><a href="{{route('admin.requests.request')}}"><i class="fas fa-angle-right mr-2"></i>Requests @if(Route::current()->uri=='admin/requests') (<span>{{$count}}</span>) @endif</a>
                </li>
            </div>
        </ul>
    </div>

</div>