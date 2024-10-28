@include('client.clientParts.header')
@include('client.clientParts.nav2')
<style>
    .tour-container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .tour-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .tour-header h1 {
        margin: 0;
        font-size: 2em;
        color: #333;
    }
    .tour-info {
        margin-bottom: 20px;
    }
    .tour-info img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }
    .tour-info h2 {
        font-size: 1.5em;
        margin-bottom: 10px;
        color: #333;
    }
    .tour-info p {
        margin: 0;
        color: #666;
    }
    .tour-section-title {
        font-size: 1.3em;
        color: #333;
        margin: 20px 0 10px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 5px;
    }
    .tour-list {
        list-style: none;
        padding: 0;
    }
    .tour-list-item {
        background-color: #f9f9f9;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .tour-list-item span {
        color: #555;
    }
</style>

<div class="main">

    <div class="tour-container">
        <div class="tour-header">
            <h1>Tour: Madeson Summers</h1>
        </div>

        <div class="tour-info">
            <img src="{{ asset('images/tourImgs'). "/" . $tour->image }}" alt="Tour Image">
            <h2>Tour Information</h2>
            <p><strong>Price:</strong> ${{ $tour->price }} </p>
            <p><strong>Start Date:</strong> {{ date('d-m-Y', strtotime($tour->start_date)) }} </p>
            <p><strong>End Date:</strong> {{ date('d-m-Y', strtotime($tour->end_date)) }}</p>
            <p><strong>About:</strong> {{ $tour->about }}</p>
            <p><strong>People:</strong> {{ $tour->people }}</p>
            <p><strong>Status:</strong> {{ $tour->status }}</p>
        </div>

        <div class="tour-hotels">
            <h3 class="tour-section-title">Hotels</h3>
            <ul class="tour-list">
                @foreach($tour->hotels as $hotel)
                    <li class="tour-list-item">
                        <span> <a href="{{ route('home.property', $hotel->hotel->id) }}">{{ $hotel->hotel->name }}</a> </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tour-guides">
            <h3 class="tour-section-title">Guides</h3>
            <ul class="tour-list">
                @foreach($tour->guides as $guide)
                    <li class="tour-list-item">
                        <span> <a href="{{ route('home.guide', $guide->guide->id) }}">{{ $guide->guide->name }}</a> </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tour-transports">
            <h3 class="tour-section-title">Transports</h3>
            <ul class="tour-list">
                @foreach($tour->transports as $item)
                    <li class="tour-list-item">
                        <span> {{ $item->name }} </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tour-places">
            <h3 class="tour-section-title">Places</h3>
            <ul class="tour-list">
                @foreach($tour->places as $item)
                    <li class="tour-list-item"><a href="{{ route('home.place', $item->p_id) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>

@include('client.clientParts.footer')
