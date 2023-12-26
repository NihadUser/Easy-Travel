@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div style="background: none" class="main blogMain">
    <div style="background-image: url({{asset('/images/fav.jpg')}});" class="favoritesContainer">
        <h1>Favorites/Guides</h1>
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
                        <a href="{{route("home.guide",['id'=>$item->id])}}">
                            <img class="favProdImage" src="{{asset('/images/userImgs/'.$item->image)}}" alt="">
                        </a>
                    </td>
                    <td>
                        <a class="favProdTitle" href="{{route("home.guide",['id'=>$item->id])}}">{{$item->name}}</a>
                    </td>
                    <td>
                        <span class="favProdPrice">
                            {{$item->guides->price}} $
                        </span>
                    </td>
                    <td><a class="placeDetailsLink placeDetailsLink-2" href="{{route("home.guide",['id'=>$item->id])}}">View Details</a></td>
                    <td>
                        <a href="{{route('selection.guideDelete',['id'=>$item->id])}}">
                            <i class="fa-solid fa-delete-left"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1>You don't have favorite Guide</h1>
        @endif
    </div>
</div>
@include('client.clientParts.footer')