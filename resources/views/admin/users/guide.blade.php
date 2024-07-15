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
        @php
            $languages = json_decode($guide->guides->languages);
            $places = json_decode($guide->guides->aviable_for);
        @endphp
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="page-header breadcrumb-header ">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">Users</h3>
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
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Price</th>
                                <th scope="col">About</th>
                                <th scope="col">Aviable Places</th>
                                <th scope="col">Languages can speak</th>
                            </tr>
                        </thead>
                        <tbody>
                               <tr>
                                <td>{{$guide->guides->price}} $</td>
                                <td>{{$guide->guides->about}}</td>
                                <td>
                                    @foreach ($places as $item)
                                        {{$item}}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($languages as $item)
                                        {{$item}}
                                    @endforeach
                                </td>
                               </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
</div>

<script src="{{asset('/admin/js/myJs.js')}}"></script>
@include('admin.adminParts.footer')
