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
                    
                    <table class="requestTable table table-hover ">
                        <tbody>
                            @foreach ($usersArr as $item)
                            <tr>
                               
                                <td>{{$item->users->name}} wants to be @if($item->type=='user') guide  @else {{$item->type}} @endif</td>
                               <td>
                                <a @if($item->type=='user') href="{{route('admin.requests.approve2',['id'=>$item->id])}}" @elseif($item->type=='host') href='{{route("admin.requests.approve",['id'=>$item->users->id])}}' @endif class="editItem"><i class="fa-solid fa-check"></i></a>
                                <a href="{{route('admin.requests.delete',['id'=>$item->id])}}" class="deleteItem">X</a>
                               </td>
                            </tr>
                            @endforeach
                           @foreach($tour as $item)
                           <tr>
                            @if($item->type=='tour')
                            <td>
                                {{$item->user->name}} wants to create tour
                            </td>
                            <td>
                                <a href="{{route('admin.requests.tourDetails',['id'=>$item->tours_id])}}" class="allImages">View details</a>
                            </td>
                            @endif
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