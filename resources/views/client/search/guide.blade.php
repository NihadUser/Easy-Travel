@include('client.clientParts.header')
@include('client.clientParts.nav2')

<div class="main guideMain">
    <div class="searchMainContetn">
        <div class="searchPageIssues">
            <h1>
                Search result for “Guide”.
            </h1>
            <span>{{count($guide)}} Results Found</span>

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
    <div class="placesContainer searchGuideContainer">
        @if(@count($guide) !=0)
        @foreach ($guide as $item)
        <div class="silde" style="background-image: url({{asset("/images/userImgs/$item->image")}});">
            <div class="lovelyPlace lovelyPlace-v2">
                @guest
                <a href="{{route('login')}}">
                    <img src="{{asset("images/heart.svg")}}" alt="">
                </a>
                @else
                @if($item->selections==null)
                <a class="dilVuranRazil" href="{{route('selection.guide',['id'=>$item->id])}}">
                    <img src="{{asset('/images/heart.svg')}}" alt="">
                </a>
                @elseif($item->selections != null && $item->selections->user_id==auth()->id())
                <a href="{{route('selection.guideDelete',['id'=>$item->id])}}">
                    <img src="{{asset('/images/redHeart.svg')}}" alt="">
                </a>
                @endif
                @endguest
            </div>
            <div class="guideContent">
                <div class="guideName">
                    <h2>
                        <a style="color: black" href="{{route("home.guide",['id'=>$item->id])}}">{{$item->name}}</a>
                    </h2>
                    <div class="mainLocation">
                        <img src="{{asset('/images/location.svg')}}" alt=""> <span
                            class="location">{{$item->location}}</span>
                    </div>
                    <span class="guideStar">
                        <img src="{{asset('/images/homeStar.svg')}}" alt=""> <span class="rengli">5.0</span>
                        <span class="rewiews">({{@count($item->comments)}}   rewiews)</span>
                    </span>

                </div>
                <div>
                    <span>
                        <span class="propertyPrice">
                            {{$item->guides->price}}$\
                        </span>day
                    </span>
                    <a href="{{route("home.guide",['id'=>$item->id])}}" class="guideDetails">View details</a>
                </div>
            </div>
        </div>
                
        @endforeach
        @else
        <div class="color-changing-text">
            <span>S</span><span>o</span><span>r</span><span>r</span><span>y</span>
            <span>w</span><span>e</span><span> </span><span>d</span><span>o</span><span>n</span><span>'</span>
            <span>t</span><span> </span><span>h</span><span>a</span><span>v</span><span>e</span>
            <span> </span><span>g</span><span>u</span><span>i</span><span>d</span><span>e</span>
            <span> </span><span>a</span><span>s</span><span> </span><span>y</span><span>o</span><span>u</span>
            <span> </span><span>w</span><span>a</span><span>n</span><span>t</span>
        </div> 
        @endif

    </div>
    <div class="pagination-container">
        <ul class="pagination">
            @if ($guide->onFirstPage())
                <li class="disabled"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $guide->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif
    
            
            @for ($i = 1; $i <= $guide->lastPage(); $i++)
            @if ($i == $guide->currentPage())
                <li class="active"><span>{{ $i }}</span></li>
            @else
                <li><a href="{{ $guide->url($i) }}">{{ $i }}</a></li>
            @endif
        @endfor
    
            @if ($guide->hasMorePages())
                <li><a href="{{ $guide->nextPageUrl() }}" rel="next">&raquo;</a></li>
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
