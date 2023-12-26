@include('admin.adminParts.header')
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
    <div class="userModalContainer">
        <div class="userModal">

        </div>
    </div>
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
                                        <h3 class="lite-text ">Tour/Edit</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Tour/Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="formContainer formContainer-2">
                        <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('admin.tours.edit',['id'=>$tour->id])}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tour Name</label>
                                <input name="name" value="{{$tour->name}}" type="text" class="form-control" id="productName">
                            </div>
                            <div class="form-group">
                                <label for="about">Tour About</label>
                                <textarea name="about"  class="form-control" id="productDescription" rows="3" >{{$tour->about}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Tour Price</label>
                                <input name="price" value="{{$tour->price}}" type="number" class="form-control" id="productPrice">
                            </div>
                            <div class="form-group">
                                <label for="location">Tour Start Location</label>
                                <input name="location" value="{{$tour->start_location}}" type="text" class="form-control" id="productPrice">
                            </div>
                            <div class="form-group">
                                <label for="startDate">Tour Start Date</label>
                                <input name="startDate" value="{{$tour->start_time}}" type="date" class="form-control" id="productPrice">
                            </div>
                            <div class="form-group">
                                <label for="endDate">Tour End Date</label>
                                <input name="endDate" value="{{$tour->end_time}}" type="date" class="form-control" id="productPrice">
                            </div>
                            <div class="form-group">
                                <label for="people">People count</label>
                                <input name="people" value="{{$tour->people}}" type="text" class="form-control" id="productPrice">
                            </div>
                            <div class="form-group">
                                <label for="places">Travel Places</label>
                                <select multiple name="places[]" class="form-control" id="productRating">
                                    @foreach($arr as $item)
                                        <option @foreach($places as $item2) @if($item2==$item['name']) selected @endif @endforeach value="{{$item['name']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="transport">Transport</label>
                                <select multiple name="transport[]" class="form-control" id="productRating">
                                    @foreach ($arr2 as $item)
                                        <option @foreach($transport as $item2) @if($item['name']==$item2) selected @endif @endforeach value="{{$item['name']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image </label>
                                <input class="form-control" type="file" name="image" id="formFile">
                                <img src="{{asset("/images/tourImgs/$tour->image")}}"  class="imageeee" alt="">
                            </div> 
                            <button type="submit" class="btn btn-primary">Edit Tour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@include('admin.adminParts.footer')