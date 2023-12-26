<div class="comments">
    @foreach ($comments as $item)
    <div class="oneComment">
        <div class="commentUserImage">
            <img src="{{asset("/images/userImgs/".$item->users->image)}}" alt="">
        </div>
        <div class="placeCommentsContent">
            <h3>{{$item->users->name}}</h3>
            <p>{{$item->body}}</p>
        </div>
    </div>
    @endforeach
