
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
                                        <h3 class="lite-text ">Places / Edit</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Places / Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="formContainer formContainer-2">
                        <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('admin.places.editedPlace',['id'=>$place->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Place Name</label>
                                <input name="name" value="{{$place->name}}" type="text" class="form-control" id="productName" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label for="about">Place About</label>
                                <textarea name="about"  class="form-control" id="productDescription" rows="3" placeholder="Enter product description">{{$place->about}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Place Price</label>
                                <input name="price" value="{{$place->price}}" type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                            </div>
                            <div class="form-group">
                                <label for="location">Place Location</label>
                                <input name="location" value="{{$place->location}}" type="text" class="form-control" id="productPrice" placeholder="Enter product location">
                            </div>
                            <div class="form-group">
                                <label for="safety">Place safety</label>
                                <select name="safety" class="form-control" id="productRating">
                                    <option @if($safety=='Bad') selected @endif value="bad">Bad</option>
                                    <option @if($safety=='Not Bad') selected @endif value="not_bad">Not Bad</option>
                                    <option @if($safety=='Normal') selected @endif value="normal">Normal</option>
                                    <option @if($safety=='Good') selected @endif value="good">Good</option>
                                    <option @if($safety=='Great') selected @endif value="great">Great</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fun">Place fun</label>
                                <select name="fun" class="form-control" id="productRating">
                                    <option @if($fun=='Bad') selected @endif  value="bad">Bad</option>
                                    <option @if($fun=='Not Bad') selected @endif value="notbad">Not Bad</option>
                                    <option @if($fun=='Normal') selected @endif value="normal">Normal</option>
                                    <option @if($fun=='Good') selected @endif  value="good">Good</option>
                                    <option @if($fun=='Great') selected @endif  value="great">Great</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label for="internet">Place Internet</label>
                                <input value="{{$place->internet}}" name="internet" type="number" min="1" max="100" class="form-control" id="productPrice" placeholder="Enter product internet">
                            </div>
                           
                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input class="form-control" type="file" name="image"  id="formFile">
                                <img style="height: 350px;height:350px;" src="{{asset("/images/imgs/$place->image")}}" class="img-fluid" alt="">
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