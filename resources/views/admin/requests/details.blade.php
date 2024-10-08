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
                                        <h3 class="lite-text ">Requests</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Requests</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <table class=" table table-hover ">
                        <tbody>
                            <thead>
                            <th>Name</th>
                                <th>
                                    Start Location
                                </th>
                                <th>Price . "AZN"</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>People Count</th>
                                <th>Places</th>
                                <th>Gudies</th>
                                <th>Transports</th>
                                <th>
                                    Actions
                                </th>
                            </thead>
                            <tbody>
                            <td>
                                {{$tour->name}}
                            </td>
                                <td>
                                    {{$tour->start_location}}
                                </td>
                                <td>
                                    {{$tour->price}}
                                </td>
                                <td>
                                    {{$tour->end_time}}
                                </td>
                                <td>
                                    {{$tour->start_time}}
                                </td>
                                <td>
                                    {{$tour->people}}
                                </td>
                                    <td>
                                        <ul>
                                            @foreach ($tour->hotels as $item)
                                                <li>{{ $item->hotel->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($tour->guides as $item)
                                                <ul>{{ $item->guide->name }}</ul>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @foreach ($tour->transports as $item)
                                            {{ $item->name . "," }}
                                        @endforeach
                                    </td>

                                    <td>
                                        <a href="{{route('admin.requests.tourApprove', $tour->id)}}" class="editItem">Approve</a>
                                        <a href="{{route('admin.requests.tourDelete', $tour->id) }}" class="deleteItem">Decline</a>
                                    </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('/admin/js/myJs.js')}}"></script>
@include('admin.adminParts.footer')
