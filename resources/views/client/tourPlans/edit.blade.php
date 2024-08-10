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
{{--                @foreach ($hotels ?? [] as $item)--}}
{{--                    <li>--}}
{{--                        <h3 class="hotelAddSearchedListName">{{ $item->name }}</h3>--}}
{{--                        <form method="POST" action="{{route('tourPlan.tourPlacesAdd', $id)}}">--}}
{{--                            @csrf--}}
{{--                            <input id="hotel{{ $i }}" type="hidden" name="id" value="{{$item->id}}">--}}
{{--                            <button class="hotelAddButtons" type="submit" id="hotelAddBtn{{ $i++ }}">Add</button>--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
            </ul>
        </div>
    </div>
</div>
<div class="hotelAddModal hotelAddModal2">
    <div class="popUp popUp2">
        <div class="popUpHeader">
            <h2>Search Guide</h2>
            <input type="text" placeholder="Search...">
        </div>
        <div class="hotelAddSearchedList" id="guideAddSearchedList">
            <ul>
{{--                @foreach ($guides ?? [] as $item)--}}
{{--                    <li>--}}
{{--                        <h3 class="hotelAddSearchedListName">{{$item->name}}</h3>--}}
{{--                        <form method="POST" action="{{route('tourPlan.tourGuideAdd', $id)}}">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="userId" value="{{$item->id}}">--}}
{{--                            <button type="submit">Add</button>--}}
{{--                        </form>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
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
                <span class="addSearchBtn" id="hotelAddSearchBtn"> <img src="{{asset("/images/lupa.svg")}}" alt=""> Search Hotel</span>
                <h4 class="addedItemsToTour">{{ $count ?? 0}} Hotels added</h4>
                    @foreach ($addedHotels as $item)
                        <div class="searchedHotelAdd">
                            <a href="{{ route('tourPlan.tourPlaceDelete', $item->item_id) }}" class="tourPlaceRemover">X</a>
                            <img src="{{ asset('/images/imgs/' . $item->image) }}" class="searchedHotelAddImg" alt="">
                            <div class="searchedHotelAddContent">
                                <h2>{{ $item->name }} </h2>
                                <div class="mainLocation "><img src="{{ asset('/images/recoloc.svg') }}" alt=""> {{ $item->location }}</div>
                                <span class="tourPeople">{{ $tourPlan->people }} rooms booked</span>
                                <span class="tourPerPrice">{{ $item->price }} * {{$tourPlan->people}}</span>
                            </div>
                        </div>
                @endforeach
            </form>
            <form action="" id="AddGuideFrom" class="guideAddForm">
                <h2 >Add Guide</h2>
                <span class="guideAddModal" id="guideAddBtn"> <img src="{{asset("/images/lupa.svg")}}" alt=""> Search Guide</span>
                <h4 class="addedItemsToTour">{{ $guideCount ?? 0}} Guides added</h4>
                @foreach ($addedGuides ?? [] as $item)
                    <div class="searchedHotelAdd">
                        <a href="{{ route('tourPlan.tourPlaceDelete', $item->item_id )}}" class="tourPlaceRemover">X</a>
                        <img src="{{ asset("images/userImgs/" . $item->image) }}" class="searchedHotelAddImg" alt="">
                        <div class="searchedHotelAddContent">
                            <h2>{{ $item->name }}</h2>
                            <div class="mainLocation "><img src="{{asset('/images/recoloc.svg')}}" alt=""> {{ $item->location }}</div>
                            <span class="tourPeople">{{ $tourPlan->start_time }} - {{ $tourPlan->end_time }}</span>
                            <span class="tourPerPrice">{{ $item->price }} $</span>
                        </div>
                    </div>
                @endforeach
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
                            $guidePrice += $item->price;
                        }
                        $value = $guidePrice + $placePrice;

                @endphp
                @if( $tourPlan->status == 0 )
                    <form method="POST" action="{{ route('tourPlan.update', $tourPlan->id) }}">
                        @method('PUT')
                        @csrf
                        <button type="submit">Submit</button>
                    </form>
                @elseif($tourPlan->status == 2)
                    <h1>Tour saved your profile we turn back soon</h1>
                @elseif($tourPlan->status == 1)
                    <form method="POST" action="{{ route('tourPlan.tourPaymentPage', $tourPlan->id) }}">
                        @csrf
                        <input name="price" value="{{ $value }}" type="hidden">
                        <button class="paymentLink">Pay and publish ($ {{ $value }})</button>
                    </form>
                @endif
            </div>
        @endif
    </div>
</div>


<script>
    const id = "{{ $tourPlan->id }}";
</script>

<script>
    document.addEventListener("DOMContentLoaded",   () => {
        const searchInput = document.getElementById('HotelSearchInput');

        const hotelList = document.querySelector('.hotelAddSearchedList ul');
        searchInput.addEventListener('input', async () => {
            let searchTerm = searchInput.value.toLowerCase();
            hotelList.innerHTML = '';

            searchTerm == '' ? searchTerm = 'null' : searchTerm;

            let searchLink = 'http://127.0.0.1:8000/api/tour/place-search/' + searchTerm;
            const response = await fetch(searchLink);
            const data = await response.json();
            let i = 1;
            data.data.map(item =>{
                let itemLink = '{{route('tourPlan.tourPlacesAdd', ":id")}}';
                itemLink = itemLink.replace(":id", id);
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
                hotelList.append(li);
            })

        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const hotelAddSearchBtn = document.querySelector("#hotelAddSearchBtn");
        hotelList = document.querySelector('.hotelAddSearchedList ul');

        hotelAddSearchBtn.addEventListener('click', async () => {
            let hotelLink = 'http://127.0.0.1:8000/api/tour-hotels/' + id ;
            console.log(hotelLink);
            const response = await fetch(hotelLink);
            const data = await response.json();
            let i = 1;

            const items = Object.values(data.data);
            items.map(item => {
                let itemLink = '{{ route('tourPlan.tourPlacesAdd', ":id") }}';
                itemLink = itemLink.replace(":id", id);
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
                hotelList.append(li);
            });
        });
    });
</script>

<script>
    const guideAddBtn = document.querySelector('#guideAddBtn');
    const guideAddSearchedList = document.querySelector('#guideAddSearchedList ul');

    guideAddBtn.addEventListener('click', async () => {
       let link = 'http://127.0.0.1:8000/api/tour-guides/' + id;
        let i = 0;
       const response = await fetch(link);
       const data = await response.json();
       data.data.map(item =>{
           let itemLink = '{{ route('tourPlan.tourGuideAdd', ":id") }}';
           itemLink = itemLink.replace(":id", id);
           let string = `
                <h3 class="hotelAddSearchedListName">${item.name}</h3>
                <form method="POST" action="${itemLink}">
                    @csrf
                <input id="hotel${i}" type="hidden" name="userId" value="${item.user_id}">
                    <button class="hotelAddButtons" type="submit" id="hotelAddBtn${i++}">Add</button>
                </form>
            `;
           let li = document.createElement('li');
           li.innerHTML = string;
           guideAddSearchedList.append(li);
       })
    });
</script>

<script src="{{asset('/client/js/tourPlace.js')}}"></script>
@include('client.clientParts.footer')
