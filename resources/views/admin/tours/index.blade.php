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
                                        <h3 class="lite-text ">Tours</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Tours</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Start Place</th>
                                <th scope="col">Location</th>
                                <th scope="col">Transport</th>
                                <th scope="col">Start-End Time</th>
                                <th scope="col">Host</th>
                                <th scope="col">Is Active</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tours as $item)
                               <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}$</td>
                                <td>{{$item->start_location}}</td>
                                <td>
                                    <ul class="">
                                        @foreach (json_decode($item->travel_places) as $item2)
                                        <li class="">{{$item2}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-group">
                                        @foreach (json_decode($item->transport) as $item2)
                                        <li class="">{{$item2}}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    {{$item->start_time}},
                                    {{$item->end_time}}
                                </td>
                                <td>
                                    {{$item->host->name}}
                                </td>
                                <td>
                                    @if($item->is_active==0)
                                        Passive
                                    @else
                                    Active
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-success""><i class="fa fa-eye"></i></a>
                                    <a href="" class="deleteItem">Delete</a>
                                    <a href="{{route('admin.tours.editPage',['id'=>$item->id])}}" class="editItem">Edit</a>
                                </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <ul class="pagination">
                            @if ($tours->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $tours->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif


                            @for ($i = 1; $i <= $tours->lastPage(); $i++)
                            @if ($i == $tours->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $tours->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor

                            @if ($tours->hasMorePages())
                                <li><a href="{{ $tours->nextPageUrl() }}" rel="next">&raquo;</a></li>
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
