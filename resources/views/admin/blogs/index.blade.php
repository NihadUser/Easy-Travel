@include('admin.adminParts.header')
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
    @include('admin.adminParts.menu')
    @include('admin.adminParts.aside')
    <main class="bmd-layout-content">
        <div class="container-fluid ">


            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="page-header breadcrumb-header ">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">Blogs</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Blogs</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <a class="newItemAdder">Add New</a>

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($blogs as $item)
                              <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->short_description}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->author->name}}</td>
                                <td><img class="dataImage" src="{{asset("/images/blogImgs/$item->image")}}" alt=""></td>
                                <td>
                                    <form action="{{ route('admin.blogs.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none;border-radius: 5px;" class="deleteItem">Delete</button>
                                    </form>
                                 <a class="editItem" href="{{route('admin.blogs.edit', $item->id)}}">Edit</a>
                                 <a href="{{route("admin.blog-comments.index") . "?blog_id=$item->id"}}" class="allImages">Comments</a>
                             </td>
                              </tr>
                           @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <ul class="pagination">
                            @if ($blogs->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif


                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                            @if ($i == $blogs->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor

                            @if ($blogs->hasMorePages())
                                <li><a href="{{ $blogs->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('/admin/js/myJs.js')}}"></script>
@include('admin.adminParts.footer')
