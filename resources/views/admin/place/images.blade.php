<div class="modalContainer">
    <div class="mainModal">
        <span class="modalCloser">X</span>
        <div class="formContainer">
            <form class="mt-5" multiple enctype="multipart/form-data" method="POST" action="{{route('admin.places-images.store',['id'=>$place_id])}}">
                @csrf
                <div class="form-group">
                    <label for="file[]">Product Image</label>
                    <input class="form-control" type="file" name="file[]" multiple id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">Add Images</button>
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
                    <h1>
                        {{ $name }}
                    </h1>
                    <table style="width: 50%" class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Images</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td >
                                    <img class="img-fluid listedImages" src="{{asset("/images/imgs/$item->image")}}" alt="">
                                </td>
                                <td>
                                    <form action="{{ route('admin.places-images.destroy',$item->id) }}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="deleteItem">Delete</button>
                                    </form>
                                    <a class="editItem" href="">Edit</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('/admin/js/myJs.js')}}"></script>
@include('admin.adminParts.footer')
