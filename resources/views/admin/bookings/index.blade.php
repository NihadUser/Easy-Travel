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
                                        <h3 class="lite-text ">Bookings</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <h2>Properties</h2>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Rooms booked</th>
                                <th scope="col">Person</th>
                                <th scope="col">Hotel Name</th>
                                <th scope="col">Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($property as $item)
                               <tr>
                                <td>
                                    {{$loop->iteration}}                                    
                                </td>
                                <td>{{$item->start_time}}</td>
                                <td>{{$item->end_time}}</td>
                                <td>{{$item->room_count}}</td>
                                <td>
                                    {{$item->person->name}}
                                </td>
                                <td>
                                    {{$item->hotel->name}}
                                </td>
                                <td>
                                    @if($item->is_active==0)
                                        Passive
                                    @else
                                    Pending
                                    @endif
                                </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div class="pagination-container">
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
                    </div> --}}
                </div>
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <h2>Guides</h2>
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Guide Name</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Price</th>
                                <th scope="col">City</th>
                                <th scope="col">Street</th>
                                <th scope="col">Suit</th>
                                <th scope="col">State</th>
                                <th scope="col">Country</th>
                                <th scope="col">Person</th>
                                <th scope="col">Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guide as $item)
                               <tr>
                                <td>
                                    {{$loop->iteration}}                                    
                                </td>
                                <td>{{$item->guide->name}}</td>
                                <td>{{$item->start_date}}</td>
                                <td>{{$item->end_date}}</td>
                                <td>{{$item->total_price}}</td>
                                <td>
                                    {{$item->city}}
                                </td>
                                <td>
                                    {{$item->street}}
                                </td>
                                <td>
                                    {{$item->suit}}
                                </td>
                                <td>
                                    {{$item->state}}
                                </td>
                                <td>
                                    {{$item->country}}
                                </td>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    @if($item->is_active==0)
                                        Passive
                                    @else
                                    Pending
                                    @endif
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