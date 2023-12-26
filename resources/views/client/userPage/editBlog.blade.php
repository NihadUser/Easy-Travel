@include('client.clientParts.header')
@include('client.clientParts.nav2')
<div class="main ">
        <table style="width:100%;" class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">
                        #
                    </th>
                    <th class="px-4 py-2">
                        Blog Name
                    </th>
                    <th>
                        Blog image
                    </th>
                    <th class="px-4 py-2">
                        Blog Description
                    </th>
                    <th class="px-4 py-2">
                        Short Description
                    </th>
                    <th class="px-4 py-2">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
    @foreach($blogs as $item)

                <tr class="border-t">
                    <td class="px-4 py-2">
                        {{$loop->iteration}}
                    </td>
                    <td class="px-4 py-2">
                        {{$item->name}}
                    </td>
                    <td>
                        <img class="userBlogTableImage" src="{{asset("/images/blogImgs/$item->image")}}" alt="">
                    </td>
                    <td class="px-4 py-2">
                        {{$item->description}}
                    </td>
                    <td class="px-4 py-2">
                        {{$item->short_description}}
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{route('user.editPage',['id'=>$item->id])}}" class="userBlogEdit">Edit</a>
                        <a href="{{route('user.deleteBlog',['id'=>$item->id])}}" class="userBlogDelete">Delete</a>
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
