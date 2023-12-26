@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain">
    <div class="searchMainContetn">
        <div class="searchPageIssues">
            <h1>
                Search result for “Properties”.
            </h1>
            <span>{{@count($property)}} Results Found</span>

        </div>
        <div class="searchConsole">
            <h2>Filter</h2>
            <form class="filterProducts" action="">
                <div>
                    <label for="">Name</label>
                    <input name="name" type="text">
                </div>
                <div>
                    <label for="">Min price</label>
                    <input name="minPrice" min="0" type="text">
                </div>
                <div>
                    <label for="">Max price</label>
                    <input name="maxPrice" min="0" type="text">
                </div>
                <div>
                    <label for="">Location</label>
                    <select class="MainWebsiteSearch" name="location" id="">
                        <option value="{{null}}">Select,location</option>
                    </select>
                </div>
                <button type="submit">Apply Filter</button>
            </form>
        </div>
    </div>
    <div class="placesContainer">
        @if(@count($property) !=0)
        @foreach ($property as $item)
        <div class="properties">
            <a href="{{route("home.property",['id'=>$item->id])}}"><img class="hotelMainImg" src="{{asset("/images/imgs/$item->image")}}" alt=""></a>
            <div class="propertiesContent">
                <div class="placeRow">
                    <h2>
                        <a style="color: black" href="{{route("home.property",['id'=>$item->id])}}" >{{$item->name}}</a>
                    </h2>
                    <div class="lovelyPlace">
                        @guest
                        <a href="{{route('login')}}">
                            <img src="{{asset("images/heart.svg")}}" alt="">
                        </a>
                        @else
                        @if($item->selections==null)
                        <a href="{{route('selection.property',['id'=>$item->id])}}">
                            <img src="{{asset("/images/heart.svg")}}" alt="">
                        </a>
                        @elseif($item->selections!=null && $item->selections->user_id==auth()->id())
                        <a href="{{route('selection.deleteProperty',['id'=>$item->id])}}">
                        <img src="{{asset("/images/redHeart.svg")}}" alt="">
                        </a>
                        @endif
                        @endguest
                    </div>
                </div>
                <p style="padding-bottom: 10px; display: flex; align-items: center;">
                    <img src="{{asset("/images/location.svg")}}" alt=""> <span class="location">{{$item->location}}</span>
                </p>
                <span>
                    <span class="propertyPrice">
                        {{$item->price}}$/
                    </span>night
                </span>
                <div class="propertyRow">
                    <div class="bed">
                        <img src="{{asset("/images/bed.svg")}}" alt=""> {{$item->bed_count}} bed
                    </div>
                    <div class="bed">
                        <img src="{{asset("/images/bath.svg")}}" alt=""> {{$item->bath_count}} Bath
                    </div>
                    <div class="bed">
                        <img src="{{asset("/images/sqft.svg")}}" alt=""> {{$item->sqft_count}} sqft
                    </div>
                </div>
                <div class="hotelText">
                    <div class="addition">
                        <img src="{{asset("/images/homeStar.svg")}}" alt=""><span class="value">5.0</span><span
                            class="rewiews">( {{@count($item->comments)}}rewiews)</span>
                    </div>
                    <a class="propertyLink" href="{{route("home.property",['id'=>$item->id])}}">View details</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="color-changing-text">
            <span>S</span><span>o</span><span>r</span><span>r</span><span>y</span>
            <span>w</span><span>e</span><span> </span><span>d</span><span>o</span><span>n</span><span>'</span>
            <span>t</span><span> </span><span>h</span><span>a</span><span>v</span><span>e</span>
            <span> </span><span>p</span><span>r</span><span>o</span><span>p</span><span>e</span><span>r</span><span>t</span><span>y</span>
            <span> </span><span>a</span><span>s</span><span> </span><span>y</span><span>o</span><span>u</span>
            <span> </span><span>w</span><span>a</span><span>n</span><span>t</span>
        </div> 
        @endif
        
    </div>
    <div class="pagination-container">
        <ul class="pagination">
            @if ($property->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $property->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif
    
            
            @for ($i = 1; $i <= $property->lastPage(); $i++)
            @if ($i == $property->currentPage())
                <li class="active"><span>{{ $i }}</span></li>
            @else
                <li><a href="{{ $property->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor
    
            @if ($property->hasMorePages())
                <li><a href="{{ $property->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled"><span>&raquo;</span></li>
            @endif
        </ul>
    </div>  
</div>
<script src="{{asset('/client/js/location.js')}}"></script>
<script src="{{asset('/client/js/location.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/date-fns@2.25.0/esm/index.js"></script>
@include('client.clientParts.footer')
