@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain">
    <div class="tourPlan-1">
        <h1>
            Let's make Tour Plan.
        </h1>
        <div class="progressBarContainer">
            <div class="progeressBar">
                <div class="bar-1">
                    <div class="bar1Inner">

                    </div>
                </div>
                <div class="bar-2">
                    <div class="bar2Inner">
                        <img src="{{asset('/images/tour.svg')}}" alt="">
                    </div>
                    <div class="bar4Inner">
                        <img src="{{asset('/images/tour.svg')}}" alt="">
                    </div>
                </div>

            </div>
        </div>
        <div class="tourFormContainer">
            <div>
                <form class="mainTourForm" enctype="multipart/form-data" method="POST" action="{{route('tourPlan.data')}}">
                    @csrf
                    <div>
                        <label for="tourName">Enter tour name</label>
                        <input type="text" name="tourName">
                    </div>
                    <div>
                        <label for="startLocation">Where from travel start?</label>
                        <input name="startLocation" type="text">
                    </div>
                    <div>
                        <label for="price">Tour price</label>
                        <input name="price" type="text">
                    </div>
                    <div>
                        <label for="transport[]">Enter tour transport</label>
                        <select name="transport[]" multiple id="">
                           @foreach ($arr2 as $item)
                               <option value="{{$item['name']}}">{{$item['name']}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Enter places you are going to travel </label>
                        <select name="places[]" multiple id="">
                           @foreach ($arr as $item)
                               <option value="{{$item['name']}}">{{$item['name']}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="image">Enter tour image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="tourDateContainer">
                        <div>
                            <label for="">Enter start date</label>
                            <input name="startDate" type="date">
                        </div>
                        <div>
                            <label for="">Enter end date</label>
                            <input name="endDate" type="date">
                        </div>
                    </div>
                    <div>
                        <label for="">How many people can join tour?</label>
                        <input name="people" type="number" min="0">
                    </div>
                    <div>
                        <label for="">Enter desctiption about tour</label>
                        <textarea name="about" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                    @if(Session::get('id')==null)
                    <button type="submit">Save </button>
                    @endif
                    @if(Session::get('id'))
                    <a href="{{route('tourPlan.plan2',['id'=>Session::get('id')])}}" class="nextTourLink">Next</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@include('client.clientParts.footer')
