
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
                                        <h3 class="lite-text ">Property / Edit</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Property / Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="formContainer formContainer-2">
                        <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('admin.properties.update', $item->id)}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="name">Property Name</label>
                                <input name="name" value="{{$item->name}}" type="text" class="form-control" id="productName" placeholder="Enter product name">
                            </div>
                            <div class="form-group">
                                <label for="description">Property description</label>
                                <textarea name="description"  class="form-control" id="productDescription" rows="3" placeholder="Enter product description">{{$item->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Property Price</label>
                                <input name="price" value="{{$item->price}}" type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                            </div>
                            <div class="form-group">
                                <label for="location">Property Location</label>
                                <input name="location" value="{{$item->location}}" type="text" class="form-control" id="productPrice" placeholder="Enter product location">
                            </div>
                            <div class="form-group">
                                <label for="stars">Property star</label>
                                <select name="stars" class="form-control" id="productRating">
                                    <option @if($item->star==5) selected @endif value="5">5</option>
                                    <option @if($item->star==4) selected @endif value="4"> 4</option>
                                    <option @if($item->star==3) selected @endif value="3">3</option>
                                    <option @if($item->star==2) selected @endif value="2">2</option>
                                    <option @if($item->star==1) selected @endif value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bed_count">Place Bed Count</label>
                                <input value="{{$item->bed_count}}" name="bed_count" type="number" class="form-control" id="productPrice" placeholder="Enter product internet">
                            </div>
                            <div class="form-group">
                                <label for="sqft_count">Sqft Bed Count</label>
                                <input value="{{$item->sqft_count}}" name="sqft_count" type="number" class="form-control" id="productPrice" placeholder="Enter product internet">
                            </div>
                            <div class="form-group">
                                <label for="bath_count">Place Bath Count</label>
                                <input value="{{$item->bath_count}}" name="bath_count" type="number" class="form-control" id="productPrice" placeholder="Enter product internet">
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input class="form-control" type="file" name="image"  id="formFile">
                                <img src="{{asset("/images/imgs/$item->image")}}" class="etitableImage" alt="">
                            </div>
                            <div class="inputChechContainer">
                                <div >
                                    @php
                                    $supplyIds = $item->supplies->pluck('supply_id')->toArray();
                                    @endphp

                                    @foreach($supplies as $supply)
                                        <div class="form-check">
                                            <input class="form-check-input" @if(in_array($supply->id, $supplyIds)) checked @endif id="{{ $supply->id }}" type="checkbox" value="{{ $supply->id }}" name="supplies[]">
                                            <label class="form-check-label" for="{{ $supply->id }}">{{ $supply->name }}</label>
                                        </div>
                                    @endforeach
                                  </div>
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
