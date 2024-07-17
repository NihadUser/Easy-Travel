
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
                                        <h3 class="lite-text ">Blog / Edit</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Blog / Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="formContainer formContainer-2">
                        <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{ route('admin.blogs.update', $blog->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="name">Blog Name</label>
                                <input name="name" value="{{$blog->name}}" type="text" class="form-control" id="productName" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label for="short_description">Short description</label>
                                <textarea name="short_description"  class="form-control" id="productDescription" rows="3" placeholder="Enter product description">{{$blog->short_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Blog Image</label>
                                <input class="form-control" type="file" name="image"  id="formFile">
                                <img src="{{ asset("/images/blogImgs/$blog->image") }}" class="etitableImage" alt="">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" value="{{$blog->description}}"  class="form-control" id="productDescription" rows="3" placeholder="Enter product description">{{$blog->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control" id="productRating">
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}" @if($item->name==$blog->category->name) selected @endif> {{$item->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Place</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('/admin/js/myJs.js')}}"></script>
@include('admin.adminParts.footer')
