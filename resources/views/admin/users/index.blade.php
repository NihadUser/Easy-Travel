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
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Location</th>
                                <th scope="col">Role</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($users as $item)
                               <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->location}}</td>
                                <td>{{$item->role}}</td>
                                <td style="display: flex;gap:5px;flex-direction:column; ">
                                    @if($item->role=="guide")
                                        <a class="allImagesUser" href="{{route('admin.users.guideInfo',['id'=>$item->id])}}">Guide Info</a>
                                    @endif
                                    <a  href="{{route('admin.users.editRole',['id'=>$item->id])}}" class="editItem">Change Role</a>
                                    <a href="{{route('admin.users.block',['id'=>$item->id])}}" class="deleteItem">Block</a>
                                </td>
                               </tr>
                           @endforeach
                           
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <ul class="pagination">
                            @if ($users->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif
                    
                            
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                            @if ($i == $users->currentPage())
                                <li class="active"><span>{{ $i }}</span></li>
                            @else
                                <li><a href="{{ $users->url($i) }}">{{ $i }}</a></li>
                            @endif
                        @endfor
                    
                            @if ($users->hasMorePages())
                                <li><a href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a></li>
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