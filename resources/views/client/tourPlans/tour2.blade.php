@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="hotelAddModal">
    <div class="popUp">
        <div class="popUpHeader">
            <h2>Search Hotel</h2>
             <input type="text" id="HotelSearchInput" placeholder="Search...">
        </div>
        <div class="hotelAddSearchedList">
            <ul>
                @php
                $i = 1;
                @endphp
                @foreach ($hotels ?? [] as $item)
                <li>
                    <h3 class="hotelAddSearchedListName">{{ $item->name }}</h3>
                    <form method="POST" action="{{route('tourPlan.tourPlacesAdd', $id)}}">
                        @csrf
                        <input id="hotel{{ $i }}" type="hidden" name="id" value="{{$item->id}}">
                        <button class="hotelAddButtons" type="submit" id="hotelAddBtn{{ $i++ }}">Add</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="hotelAddModal hotelAddModal2">
    <div class="popUp popUp2">
        <div class="popUpHeader">
            <h2>Search Hotel</h2>
             <input type="text" placeholder="Search...">
        </div>
        <div class="hotelAddSearchedList">
            <ul>
                @foreach ($guides ?? [] as $item)
                <li>
                    <h3 class="hotelAddSearchedListName">{{$item->name}}</h3>
                    <form method="POST" action="{{route('tourPlan.tourGuideAdd', $id)}}">
                        @csrf
                        <input type="hidden" name="userId" value="{{$item->id}}">
                        <button type="submit">Add</button>
                    </form>
                </li>
                @endforeach
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
                <form class="hotelAddForm" id="hotelAddForm" action="">
                    <h2>Add Hotel</h2>
                    <span class="addSearchBtn "> <img src="{{asset("/images/lupa.svg")}}" alt=""> Search Hotel</span>
                    <h4 class="addedItemsToTour">{{ $count ?? 0}} Hotels added</h4>
                </form>
                <form action="" id="AddGuideFrom" class="guideAddForm">
                    <input type="hidden" id="tourID" value="{{ $id }}">
                    <h2 >Add Guide</h2>
                    <span class="guideAddModal"> <img src="{{asset("/images/lupa.svg")}}" alt=""> Search Guide</span>
                    <h4 class="addedItemsToTour">{{ $guideCount ?? 0}} Guides added</h4>
{{--                    @foreach ($addedGuides ?? [] as $item)--}}
{{--                    <div class="searchedHotelAdd">--}}
{{--                        <a href="{{route('tourPlan.tourPlaceDelete', $item->tour_guide->id )}}" class="tourPlaceRemover">X</a>--}}
{{--                        <img src="{{asset("images/userImgs/".$item->image)}}" class="searchedHotelAddImg" alt="">--}}
{{--                        <div class="searchedHotelAddContent">--}}
{{--                            <h2>{{$item->name}}</h2>--}}
{{--                            <div class="mainLocation "><img src="{{asset('/images/recoloc.svg')}}" alt=""> {{$item->location}}</div>--}}
{{--                            <span class="tourPeople">{{$tourPlan->start_time}} - {{$tourPlan->end_time}}</span>--}}
{{--                            <span class="tourPerPrice">{{$item->guides->price}} $</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
                </form>
            </div>
            @if(count($addedHotels) > 0 && count($addedGuides) > 0)
            <div class="lastTourStep">
                    @php
                        $placePrice = 0;
                        $guidePrice = 0;
                            foreach ($addedHotels as $item) {
                                $placePrice += $item->price * $tourPlan->people;
                            }
                            foreach ($addedGuides as $item) {
                                $guidePrice += $item->guides->price;
                            }
                            $value = $guidePrice + $placePrice;

                    @endphp
                @if( $tourPlan->status == 0 )
                <form method="POST" action="{{ route('tourPlan.store') . "?tour_id=$id&step=2&price=$value" }}">
                    @csrf
                    <button type="submit">Submit </button>
                </form>
                @elseif($tourPlan->status == 2)
                    <h1>Tour saved your profile we turn back soon</h1>
                @elseif($tourPlan->status == 1)
                    <a class="paymentLink" href="{{ route('tourPlan.create', ['step' => 3, 'tour_id' => $tourPlan->id, 'price' => $value]) }}">Pay and publish ($ {{ $value }})</a>
                @endif
            </div>
            @endif
        </div>
    </div>

<script>
    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const id = params.get('id');
    let link = "http://127.0.0.1:8000/api/tour-hotels/" + id;
    const hotelAddForm = document.querySelector('#hotelAddForm');

    fetch(link)
        .then(res => res.json())
        .then(items => {
            items.data.forEach(item => {
                let deleteUrl = '{{ route('tourPlan.tourPlaceDelete', ':id') }}';
                deleteUrl = deleteUrl.replace(':id', item.id);
                let htmlContent = `
                    <div class="searchedHotelAdd">
                        <a href="${deleteUrl}" class="tourPlaceRemover">X</a>
                        <img src="{{asset('/images/imgs')}}/${item.hotel.image.image}" class="searchedHotelAddImg" alt="">
                        <div class="searchedHotelAddContent">
                            <h2>${item.hotel.name}</h2>
                            <div class="mainLocation"><img src="{{asset('/images/recoloc.svg')}}" alt=""> ${item.hotel.location}</div>
                            <span class="tourPerPrice">${item.hotel.price} * {{$tourPlan->people}}</span>
                        </div>
                    </div>
                `;
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = htmlContent;
                hotelAddForm.append(tempDiv);
            });
        });
</script>

<script>
    let guideLink = "http://127.0.0.1:8000/api/tour-guides/" + id;
    const AddGuideFrom = document.getElementById('AddGuideFrom');

    fetch(guideLink)
        .then(res => res.json())
        .then(items =>
            items.data.map(item => {
            let deleteUrl = "{{ route("tourPlan.tourPlaceDelete", ":id") }}"
            deleteUrl = deleteUrl.replace(':id', item.id);
            let htmlContent = `
                    <a href="${deleteUrl}" class="tourPlaceRemover">X</a>
                    <img src="{{asset("images/userImgs")}}/${item.guide.image}" class="searchedHotelAddImg" alt="">
                    <div class="searchedHotelAddContent">
                        <h2>${item.guide.name}</h2>
                        <div class="mainLocation "><img src="{{asset('/images/recoloc.svg')}}" alt=""> ${item.guide.location} </div>
                        <span class="tourPeople">{{$tourPlan->start_time}} - {{$tourPlan->end_time}}</span>
                        <span class="tourPerPrice">${item.guide.guides.price} $</span>
                    </div>
            `;

            const searchedHotelAdd = document.createElement('div');
            searchedHotelAdd.classList.add('searchedHotelAdd');
            searchedHotelAdd.innerHTML = htmlContent;
            AddGuideFrom.append(searchedHotelAdd);
        }))
</script>
<script>
    document.addEventListener("DOMContentLoaded",   () => {
        const searchInput = document.getElementById('HotelSearchInput');
        const hotelList = document.querySelector('.hotelAddSearchedList ul');

        searchInput.addEventListener('input', async () => {
            let searchTerm = searchInput.value.toLowerCase();

            searchTerm == '' ? searchTerm = 'null' : searchTerm;
            hotelList.innerHTML = '';

            let searchLink = 'http://127.0.0.1:8000/api/tour/place-search/' + searchTerm;
            const response = await fetch(searchLink);
            const data = await response.json();
            let i = 1;
            data.data.map(item =>{
                let itemLink = '{{route('tourPlan.tourPlacesAdd', ":id")}}';
                itemLink = itemLink.replace(":id", item.id);
                let string = `
                    <h3 class="hotelAddSearchedListName">${item.name}</h3>
                    <form method="POST" action="${itemLink}">
                        @csrf
                        <input id="hotel${i}" type="hidden" name="id" value="${item.id}">
                        <button class="hotelAddButtons" type="submit" id="hotelAddBtn${i++}">Add</button>
                    </form>
                `;
                let li = document.createElement('li');
                li.innerHTML = string;
                console.log(li)
                hotelList.append(li);

            })

        });
    });

</script>

<script src="{{asset('/client/js/tourPlace.js')}}"></script>
@include('client.clientParts.footer')
