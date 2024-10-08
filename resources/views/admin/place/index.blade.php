<div class="modalContainer">
    <div class="mainModal">
        <span class="modalCloser">X</span>
        <div class="formContainer">
            <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('admin.places.store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Place Name</label>
                    <input name="name" type="text" class="form-control" id="productName" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="about">Place Description</label>
                    <textarea name="about" class="form-control" id="productDescription" rows="3" placeholder="Enter product description"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Place Price</label>
                    <input name="price" type="number" class="form-control" id="productPrice" placeholder="Enter product price">
                </div>
                <div class="form-group">
                    <label for="location">Place Location</label>
                    <select  name="location" class="MainWebsiteSearch form-control" id="productRating" >
                    </select>
                </div>
                <div class="form-group">
                    <label for="safety">Place safety</label>
                    <div class="progress-container">
                        <div class="progress-bar" id="progressBar">0%</div>
                      </div>
                      <div class="range-container">
                        <input type="range" id="rangeInput" min="0" max="100" value="0" step="1" style="width: 100%;">
                        <input type="hidden" name="safety" class="range-value" id="rangeValue" value="">
                      </div>
                </div>

                <div class="form-group">
                    <label for="fun">Place fun</label>
                    <div class="progress-container">
                        <div class="progress-bar" id="progressBarForFun">0%</div>
                    </div>
                    <div class="range-container">
                        <input type="range" id="rangeInputForFun" min="0" max="100" value="0" step="1" style="width: 100%;">
                        <input type="hidden" name="fun" class="range-value" id="rangeValueForFun" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="internet">Place Internet</label>
                    <input name="internet" type="number" min="1" max="100" class="form-control" id="productPrice" placeholder="Enter product internet">
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input class="form-control" type="file" name="image"  id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">Add Place</button>
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
                                        <h3 class="lite-text ">Places</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Places</li>
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
                                <th scope="col">Price</th>
                                <th scope="col">Location</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($place as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}$</td>
                                <td>{{$item->location}}</td>
{{--                                <td>--}}
{{--                                    @if($item->fun>=0 && $item->fun<=20 )--}}
{{--                                    <span>Bad</span>--}}
{{--                                    @elseif($item->fun>=21 && $item->fun<=40)--}}
{{--                                    <span>Not bad</span>--}}
{{--                                    @elseif($item->fun>=41 && $item->fun<=60)--}}
{{--                                    <span>Normal</span>--}}
{{--                                    @elseif($item->fun>=61 && $item->fun<=80)--}}
{{--                                    <span>Good</span>--}}
{{--                                    @else--}}
{{--                                    <span>Great</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    @if($item->safety>=0 && $item->safety<=20 )--}}
{{--                                    <span>Bad</span>--}}
{{--                                    @elseif($item->safety>=21 && $item->safety<=40)--}}
{{--                                    <span>Not bad</span>--}}
{{--                                    @elseif($item->safety>=41 && $item->safety<=60)--}}
{{--                                    <span>Normal</span>--}}
{{--                                    @elseif($item->safety>=61 && $item->safety<=80)--}}
{{--                                    <span>Good</span>--}}
{{--                                    @else--}}
{{--                                    <span>Great</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td><img class="dataImage" src="{{asset("/images/imgs/$item->image")}}" alt=""></td>
                                <td>
                                    <form action="{{ route('admin.places.destroy', $item->pId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="deleteItem">Delete</button>
                                    </form>
                                    {{-- <a class="deleteItem" href="{{route('admin.places.destroy', $item->id)}}">Delete</a> --}}
                                    <a class="editItem" href="{{route('admin.places.edit', $item->pId)}}">Edit</a>
                                    <a href="{{route("admin.places-images.index") . "?place_id=$item->pId"}}" class="allImages">View all images</a>
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

<script>
    function progressBarRange(rangeInput, progressBar, rangeValue){
        const rangeInputAdd = document.getElementById(rangeInput);
        const progressBarAdd = document.getElementById(progressBar);
        const rangeValueAdd = document.getElementById(rangeValue);

        return rangeInputAdd.addEventListener('input', function () {
          const value = rangeInputAdd.value;
          progressBarAdd.style.width = value + '%';
          progressBarAdd.textContent = value + '%';
          rangeValueAdd.value = value;
        });
    }

    progressBarRange('rangeInput', 'progressBar', 'rangeValue')
    progressBarRange('rangeInputForFun', 'progressBarForFun', 'rangeValueForFun')
  </script>

@include('admin.adminParts.footer')
