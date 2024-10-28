@include('client.clientParts.header')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
@include('client.clientParts.nav2')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Payment Page</h2>
    <form method="POST" action="{{ route('tourPlan.payment.store', request()->id) }}">
        @csrf
        <div class="mb-4">
            <label for="cardNumber" class="block text-gray-700 text-sm font-bold mb-2">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your card number">
        </div>
        <div class="mb-4">
            <label for="cardNumber" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
            <input type="text" id="cardNumber" name="price" value="{{ session()->get('price') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="{{ $price . "AZN" }}">
        </div>
        <div class="mb-4 flex space-x-4">
            <div class="flex-1">
                <label for="cardExpiry" class="block text-gray-700 text-sm font-bold mb-2">Expiry Date</label>
                <input type="text" id="cardExpiry" name="expirationDate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="MM/YY">
            </div>
            <div class="flex-1">
                <label for="cardCVC" class="block text-gray-700 text-sm font-bold mb-2">CVC</label>
                <input type="text" name="cvc" id="cardCVC" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="CVC">
            </div>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-blue-700">Pay Now</button>
    </form>
</div>
@include('client.clientParts.footer')
