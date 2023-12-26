@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="hotelAddModal">
    <div class="popUp">
        <div class="popUpHeader">
            <h2>Search Hotel</h2>
            {{-- <input type="text" placeholder="Search..."> --}}
        </div>
        <div class="hotelAddSearchedList">
            <ul>
                @if(count($addedPlaces)==0)
                @foreach ($places as $item)
                <li>
                    <h3 class="hotelAddSearchedListName">{{$item->name}}</h3>
                    <form method="POST" action="{{route('tourPlan.tourPlacesAdd',['id'=>request()->get('id')])}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit">Add</button>
                    </form>
                </li>
                @endforeach
                @else
                @foreach ($arr as $item)
                        <li>
                            <h3 class="hotelAddSearchedListName">{{$item->name}}</h3>
                            <form method="POST" action="{{route('tourPlan.tourPlacesAdd',['id'=>request()->get('id')])}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit">Add</button>
                            </form>
                        </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="hotelAddModal hotelAddModal2">
    <div class="popUp popUp2">
        <div class="popUpHeader">
            <h2>Search Hotel</h2>
            {{-- <input type="text" placeholder="Search..."> --}}
        </div>
        <div class="hotelAddSearchedList">
            <ul>
                @if(count($addedGuides)==0)
                @foreach ($guides as $item)
                <li>
                    <h3 class="hotelAddSearchedListName">{{$item->name}}</h3>
                    <form method="POST" action="{{route('tourPlan.tourGuideAdd',['id'=>request()->get('id')])}}">
                        @csrf
                        <input type="hidden" name="userId" value="{{$item->id}}">
                        <button type="submit">Add</button>
                    </form>
                </li>
                @endforeach
                @else
                @foreach ($guideArr as $item)
                        <li>
                            <h3 class="hotelAddSearchedListName">{{$item->name}}</h3>
                            <form method="POST" action="{{route('tourPlan.tourGuideAdd',['id'=>request()->get('id')])}}">
                                @csrf
                                <input type="hidden" name="userId" value="{{$item->id}}">
                                <button type="submit">Add</button>
                            </form>
                        </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
    <div class="main guideMain addMain">
        <div class="tourPlan-1">
            <h1>
                Add Hotel and Guide.
            </h1>
            <div class="progressBarContainer">
                <div class="progeressBar">
                    <div class="bar-1 bar-1-2">
                        <div class="bar1Inner bar1Inner-2">
                        </div>
                    </div>
                    <div class="bar-2 bar-2-2">
                        <div class="bar2Inner bar2Inner-3">
                            <img src="{{asset('/images/whiteTour.svg')}}" alt="">
                        </div>
                        <div class="bar4Inner bar3Inner-2">
                            <img src="{{asset('/images/tour.svg')}}" alt="">
                        </div>
                    </div>

                </div>
            </div>
            <div class="tourAddFormContainer">
                <form class="hotelAddForm" action="">
                    <h2>Add Hotel</h2>
                    <span class="addSearchBtn "> <img src="{{asset("/images/lupa.svg")}}" alt=""> Search Hotel</span>
                    <h4 class="addedItemsToTour">{{$count}} Places added</h4>
                    @foreach ($addedPlaces as $item)
                    <div class="searchedHotelAdd">
                        <a href="{{route('tourPlan.tourPlaceDelete',['id'=>$item->id])}}" class="tourPlaceRemover">X</a>
                        <img src="{{asset('/images/imgs/'.$item->places->image)}}" class="searchedHotelAddImg" alt="">
                        <div class="searchedHotelAddContent">
                            <h2>{{$item->places->name}} </h2>
                            <div class="mainLocation "><img src="{{asset('/images/recoloc.svg')}}" alt=""> {{$item->places->location}}</div>
                            <span class="tourPeople">{{$tour->people}} rooms booked</span>
                            <span class="tourPerPrice">{{$item->places->price}}*{{$tour->people}}</span>
                        </div>
                    </div>
                    @endforeach
                </form>
                <form action="" class="guideAddForm">
                    <h2 >Add Guide</h2>
                    <span class="guideAddModal"> <img src="{{asset("/images/lupa.svg")}}" alt=""> Search Guide</span>
                    <h4 class="addedItemsToTour">{{$guideCount}} Guides added</h4>
                    @foreach ($addedGuides as $item)
                    <div class="searchedHotelAdd">
                        <a href="{{route('tourPlan.tourPlaceDelete',['id'=>$item->id])}}" class="tourPlaceRemover">X</a>
                        <img src="{{asset("images/userImgs/".$item->guides->image)}}" class="searchedHotelAddImg" alt="">
                        <div class="searchedHotelAddContent">
                            <h2>{{$item->guides->name}}</h2>
                            <div class="mainLocation "><img src="{{asset('/images/recoloc.svg')}}" alt=""> {{$item->guides->location}}</div>
                            <span class="tourPeople">{{$tour->start_time}} - {{$tour->end_time}}</span>
                            <span class="tourPerPrice">{{$item->guides->guides->price}} $</span>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
            @if(count($addedPlaces)>0 && count($addedGuides))
            <div class="lastTourStep">
                @if($request==null)
                <form method="GET" action="{{route("tourPlan.tourReqeust",['id'=>request()->get('id')])}}">
                    <button type="submit">Submit </button>
                </form>
                @elseif($request!=null && $request->type=='tour')
                <h1>Tour saved your profile we turn back soon</h1>
                @elseif($request->type=='approveTour')
                
                <a href="{{route('tourPlan.tourApprove',['id'=>request()->get('id')])}}" class="paymentLink">Pay and publish (${{$value}})</a>
                @endif
            </div>
            @endif
        </div>
    </div>
<script src="{{asset('/client/js/tourPlace.js')}}"></script>
@include('client.clientParts.footer')
