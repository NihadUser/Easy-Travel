@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main ">
    <table style="margin-top:50px;" class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">
                    #
                </th>
                <th class="px-4 py-2">
                    Tour Name
                </th>
                <th>
                    Tour image
                </th>
                <th class="px-4 py-2">
                    Tour Description
                </th>
                <th class="px-4 py-2">
                    Tour Price
                </th>
                <th class="px-4 py-2">
                    Start Place
                </th>
                <th class="px-4 py-2">
                    Places
                </th>
                <th class="px-4 py-2">
                    Transport
                </th>
                <th class="px-4 py-2">
                    Start-End Date
                </th>
                <th class="px-4 py-2">
                    Is Active
                </th>
                <th class="px-4 py-2">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
    @foreach($tour as $item)
    
            <tr class="border-t">
                <td class="px-4 py-2">
                    {{$loop->iteration}}
                </td>
                <td class="px-4 py-2">
                    {{$item->name}}
                </td>
                <td>
                    <img style="height: 100px;width:100px;" class="userBlogTableImage" src="{{asset("/images/tourImgs/$item->image")}}" alt="">
                </td>
                <td style="font-size: 12px;width:25%;" class="px-4 py-2">
                    {{$item->about}}
                </td>
                <td class="px-4 py-2">
                    {{$item->price}}
                </td>
                <td class="px-4 py-2">
                    {{$item->start_location}}
                </td>
                <td class="px-4 py-2">
                    <ul>
                        @foreach(json_decode($item->travel_places) as $item2)
                            <li>
                                {{$item2}}
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td class="px-4 py-2">
                    @foreach(json_decode($item->transport) as $item2)
                        <li>
                            {{$item2}}
                        </li>
                    @endforeach
                </td>
                <td class="px-4 py-2">
                    {{$item->start_time}} , {{$item->end_time}}
                </td>
                <td>
                    @if($item->is_active==0)
                        Passive
                    @else
                    Active
                    @endif
                </td>
                <td class="px-4 py-2">
                    @if($item->is_active==0)
                    <span> </span>
                    @else
                    <a href="{{route('user.editTour',['id'=>$item->id])}}" class="userBlogEdit">Edit</a>
                    <a href="{{route('user.deleteTour',['id'=>$item->id])}}" class="userBlogDelete">Delete</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        {{-- </div> --}}
</div>
<script>
const blogCard = document.getElementById('blogCard');
const blogForm = document.querySelector('.blog-form');
const descriptionTextarea = document.querySelector('.description');
const blogAuthorInput = document.querySelector('.blog-author');
const editButton = document.querySelector('.edit-button');

let isEditMode = false;

editButton.addEventListener('click', () => {
    if (!isEditMode) {
        // Enable editing
        descriptionTextarea.removeAttribute('readonly');
        blogAuthorInput.removeAttribute('readonly');
        descriptionTextarea.focus();
    } else {
        // Disable editing
        descriptionTextarea.setAttribute('readonly', 'true');
        blogAuthorInput.setAttribute('readonly', 'true');
    }

    isEditMode = !isEditMode;
});
</script>
@include('client.clientParts.footer')
