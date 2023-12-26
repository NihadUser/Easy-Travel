@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main userBlogMain">
    <div class="max-w-md mx-auto mt-4 p-6 bg-white rounded-lg shadow-lg">
        <form action="{{route('user.tourEdit',['id'=>$blog->id])}}" enctype="multipart/form-data" method="POST" class="space-y-4">
           @csrf
            <div>
                <label for="blogName" class="block text-sm font-medium text-gray-700">Blog Name </label>
                <input type="text" value="{{$blog->name}}" id="blogName" name="tourName" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="blogName" class="block text-sm font-medium text-gray-700">Blog Price $</label>
                <input type="text" value="{{$blog->price}}" id="blogName" name="tourPrice" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="blogName" class="block text-sm font-medium text-gray-700">People count </label>
                <input type="text" value="{{$blog->people}}" id="blogName" name="people" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="blogName" class="block text-sm font-medium text-gray-700">Start Location </label>
                <input type="text" value="{{$blog->start_location}}" id="blogName" name="location" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="blogName" class="block text-sm font-medium text-gray-700">Start time </label>
                <input type="date" value="{{$blog->start_time}}" id="blogName" name="startTime" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="blogName" class="block text-sm font-medium text-gray-700">End time </label>
                <input type="date" value="{{$blog->end_time}}" id="blogName" name="endTime" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="about" class="mt-1 p-2 w-full border rounded-md">{{$blog->about}}</textarea>
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Blog Image</label>
                <input  type="file" id="blogImage" name="image" accept="image/*" class="imageUpload mt-1 p-2 w-full border rounded-md">
                <img class="userBlogEditImage" src="{{asset("/images/tourImgs/$blog->image")}}" alt="">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Save</button>
            </div>
        </form> 
    </div>
</div>
@include('client.clientParts.footer')
