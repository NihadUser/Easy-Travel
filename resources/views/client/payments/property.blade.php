@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main guideMain">
    <form action="{{route('payment.propertyBook',['id'=>$property->id])}}" method="POST">
        @csrf
        <div class="BookingMainContainer">
            <div class="bookingContainer-1">
                <div class="hotelContent">
                    <h1>
                        {{$property->name}}
                    </h1>
                    <div class="mainLocation mainLocation-2">
                        <img src="{{asset('/images/recoloc.svg')}}" alt="">
                        {{$property->location}}
                    </div>
                    <div class="bookPlaceStar">
                        <span class="rate"><img src="{{asset('/images/homeStar.svg')}}" alt=""> 5.0</span>
                        <span>({{$count}} rewiews)</span>
                    </div>
                    <div>
                        <span class="bookingDollar">$</span><span class="bookingPlacePrice">{{$property->price}}</span><span class="bookingDollar">/</span>night
                    </div>
                </div>
                <div class="hotelContent-2">
                    <h2>Select Date</h2>
                    <div class="bookingDatesContainer">
                        <div>
                            <label for="">
                                Check in
                            </label>
                            <input name="startDate" type="date" id="bir">
                        </div>
                        <div>
                            <img src="{{asset('/images/bookingArrow.svg')}}" alt="">
                        </div>
                        <div>
                            <label for="">
                                Check out
                            </label>
                            <input name="endDate" type="date" id="iki">

                        </div>
                    </div>
                </div>
                <div class="hotelContent-3">
                    <h2>
                        Select Rooms
                    </h2>
                    <input type="number" min="0" max="{{$room}}" name="rooms" id="rooms" placeholder="Rooms">
                    <p>Note:two people can stay one room and this hotel has {{$room}} room</p>
                </div>
            </div>
        </div>
        <div class="paymentContainer">
            <div class="payment-1">
                <h2>Payment</h2>
                <div class="payCard">
                    <div>
                        <label for="cardType">Select method</label>
                        <select class="payCardSelect" name="cardType" id="">
                            <option value="debit_card">Debit card</option>
                            <option value="credit_card">Credit card</option>
                            <option value="pay_pal">Pay Pal</option>
                        </select>
                    </div>
                    <div>
                        <label for="cardNumber">Card number</label>
                        <input type="text" name="cardNumber" maxlength="16" placeholder="XXXX XXXX XXXX XXXX" id="">
                    </div>
                    <div class="payCardDiv">
                        <div>
                            <label for="expiration">Expiration</label>
                            <input type="text" name="expiration" maxlength="4" placeholder="MM/YY">
                        </div>
                        <div>
                            <label for="cvv">CVV</label>
                            <input type="text" name="cvv" maxlength="3" placeholder="123">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="pay">
            <button id="paymentBtn" class="paymentButton" type="submit">Confrim pay</button>
        </div>
    </form>
</div>
<script src="{{asset('/client/js/booking.js')}}"></script>
@include('client.clientParts.footer')