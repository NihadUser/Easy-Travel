<div class="modalContainer">
    <div class="mainModal">
        <span class="modalCloser">X</span>
        <div class="formContainer">
            <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('admin.properties.insert')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Property Name</label>
                    <input name="name" type="text" class="form-control" id="productName" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="description">Property Description</label>
                    <textarea name="description" class="form-control" id="productDescription" rows="3" placeholder="Enter property description"></textarea>
                </div>
                <div class="form-group">
                    <label for="location">Property Location</label>
                    <select  name="location" class="MainWebsiteSearch form-control" id="productRating" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Place Price</label>
                    <input name="price" type="number" min="1"  class="form-control" id="productPrice" placeholder="Enter property price">
                </div>
                <div class="form-group">
                    <label for="bed_count">Bed count</label>
                    <input name="bed_count" type="number" min="1" max="100" class="form-control" id="productPrice" placeholder="Enter property bed count">
                </div>
                <div class="form-group">
                    <label for="sqft_count">Sqft count</label>
                    <input name="sqft_count" type="number" min="1" max="100" class="form-control" id="productPrice" placeholder="Enter property sqft count">
                </div>
                <div class="form-group">
                    <label for="bath_count">Bath count</label>
                    <input name="bath_count" type="number" min="1" max="100" class="form-control" id="productPrice" placeholder="Enter bath count">
                </div>
                <div class="form-group">
                    <label for="fun">Property Star</label>
                    <select name="stars" class="form-control" id="productRating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="inputChechContainer">
                    <div >
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="wifi">
                            <label class="form-check-label" for="wifi">WiFi</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="tv">
                            <label class="form-check-label" for="tv">TV</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="free_parking">
                            <label class="form-check-label" for="free_parking">Free Parking</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="air_conditioner">
                            <label class="form-check-label" for="air_conditioner">Air Conditioner</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="pool">
                            <label class="form-check-label" for="pool">Pool</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="gym">
                            <label class="form-check-label" for="gym">Gym</label>
                          </div>
                    </div>
                      <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="kitchen">
                            <label class="form-check-label" for="kitchen">Kitchen</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="long_term">
                            <label class="form-check-label" for="long_term">Long Term Stay</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="elevator">
                            <label class="form-check-label" for="elevator">Elevator</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="refrigerator">
                            <label class="form-check-label" for="refrigerator">Refrigerator</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="pet_allowed">
                            <label class="form-check-label" for="pet_allowed">Pet Allowed</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="true" name="washing_machine">
                            <label class="form-check-label" for="washing_machine">Washing Machine</label>
                          </div>
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="image">Product Image</label>
                        <input class="form-control" type="file" name="image"  id="formFile">
                    </div>
                <button type="submit" class="btn btn-primary">Add Property</button>
            </form>
        </div>
    </div>                       
</div>
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
                                        <h3 class="lite-text ">Properties</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Properties</li>
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
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Location</th>
                                <th scope="col">Bath Count</th>
                                <th scope="col">Sqft Count</th>
                                <th scope="col">Bed Count</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($place as $item)
                           <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->bath_count}}</td>
                                <td>{{$item->sqft_count}}</td>
                                <td>{{$item->bed_count}}</td>
                                <td><img class="dataImage" src="{{asset("/images/imgs/$item->image")}}" alt=""></td>
                                <td>
                                    <a class="deleteItem" href="{{route('admin.properties.delete',['id'=>$item->id])}}">Delete</a>
                                    <a class="editItem" href="{{route("admin.properties.edit",['id'=>$item->id])}}">Edit</a>
                                    <a href="{{route('admin.properties.images.image',['id'=>$item->id])}}" class="allImages">View all images</a>
                                </td>
                            </tr>
                           @endforeach
                           
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <ul class="pagination">
                            @if ($place->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $place->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif
                    
                            
                            @for ($i = 1; $i <= $place->lastPage(); $i++)
                            @if ($i == $place->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $place->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor
                    
                            @if ($place->hasMorePages())
                                <li><a href="{{ $place->nextPageUrl() }}" rel="next">&raquo;</a></li>
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