<div class="modalContainer">
    <div class="mainModal">
        <span class="modalCloser">X</span>
        <div class="formContainer">
            <form method="POST" class="mt-5" enctype="multipart/form-data" action="{{route('admin.roles.store')}}">
                @csrf
                @foreach($permissions as $item)
                    <div class="form-group">
                        <input name="permissions[]" value="{{ $item->id }}" id="{{ $item->id }}" type="checkbox" class="">
                        <label for="{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                @endforeach
                <div class="form-group">
                    <label for="name">Enter Role Name:</label>
                    <input name="name" type="text" class="form-control" id="productName" placeholder="Enter role name">
                </div>
                <button type="submit" class="btn btn-primary">Add Role</button>
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
                                        <h3 class="lite-text ">Roles</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Roles</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <a class="newItemAdder">Add New</a>

                    <table style="width: 40%" class="table table-hover ">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.roles.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border: none;border-radius: 5px;" class="deleteItem btn btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.roles.edit', $item->id) }}" class="btn btn-sm btn-success">Edit</a>
{{--                                    <form action="{{ route('admin.blog-categories.destroy', $item->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('PUT')--}}
{{--                                        <button type="submit" style="border: none;border-radius: 5px;" class="editItem btn btn-sm">Edit</button>--}}
{{--                                    </form>--}}
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
