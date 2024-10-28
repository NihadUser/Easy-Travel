@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main">
    <table style="margin-top:50px;width: 100%;" class="table-auto">
        <thead>
        <tr class="border-t">
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
                Tour Price
            </th>
            <th class="px-4 py-2">
                Start Place
            </th>
            <th class="px-4 py-2">
                Start-End Date
            </th>
            <th class="px-4 py-2">
                Status
            </th>
            <th class="px-4 py-2">
                Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($tours as $item)
            <tr class="border-t">
                <td class="px-4 py-2">
                    {{$loop->iteration}}
                </td>
                <td class="px-4 py-2">
                    <a href="{{ route('tourPlan.edit', $item->id) }}">{{ $item->name }}</a>
                </td>
                <td>
                    <img style="height: 100px;width:100px;" class="userBlogTableImage" src="{{asset("/images/tourImgs/$item->image")}}" alt="">
                </td>

                <td class="px-4 py-2">
                    {{$item->price}}
                </td>
                <td class="px-4 py-2">
                    {{$item->start_location}}
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
{{--                    @if($item->status == 1)--}}
{{--                        <span> </span>--}}
{{--                    @else--}}
                        <a href="{{ route('tourPlan.show', $item->id) }}" class="userBlogEdit"> <i class="fa fa-eye"></i> </a>
                        <form action="{{ route('tourPlan.destroy', $item->id) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="userBlogDelete">DELETE</button>
                        </form>
{{--                        <a href="" >Delete</a>--}}
                        <a href="{{route('user.editTour',['id'=>$item->id])}}" class="userBlogEdit">Edit</a>
{{--                    @endif--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
