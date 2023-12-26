@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div style="background: none" class="root">
    <div style="background-image: url({{asset('/images/fav.jpg')}});" class="favoritesContainer">
        <h1>Favorites/Places</h1>
    </div>
    <div class="favoriteTable">
        @if($products != null)
        <table>
            <thead>
               <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
                <th></th>
               </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                <tr>
                    <td>
                        <a href="">
                            <img class="favProdImage" src="{{asset('/images/imgs/'.$item->image)}}" alt="">
                        </a>
                    </td>
                    <td>
                        <a class="favProdTitle" href="{{route('home.place',['id'=>$item->id])}}">{{$item->name}}</a>
                    </td>
                    <td>
                        <span class="favProdPrice">
                            {{$item->price}}
                        </span>
                    </td>
                    <td><a class="placeDetailsLink placeDetailsLink-2" href="{{route('home.place',['id'=>$item->id])}}">View Details</a></td>
                    <td>
                        <a href="{{route('selection.deletePlace',['id'=>$item->id])}}">
                            <i class="fa-solid fa-delete-left"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1>You don't have favorite Place</h1>
        @endif
    </div>
</div>
@include('client.clientParts.footer')