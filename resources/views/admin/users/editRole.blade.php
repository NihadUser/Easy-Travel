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
                    <h1>
                        {{$user->name}}
                    </h1>
                    <h4 class="mt-5">Change Role</h4>
                    <div class="formContainer formContainer-2">
                        <form method="POST" class="mt-5" action="{{ route('admin.users.update', $user->id ) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="role">Change role</label>
                                <select name="role" class="form-control" id="productRating">
                                    <option @if($user->role=='admin') selected @endif value="admin">admin</option>
                                    <option @if($user->role=='host') selected @endif value="host">host</option>
                                    <option @if($user->role=='guide') selected @endif value="guide">guide</option>
                                    <option @if($user->role=='user') selected @endif value="user">user</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Change</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{asset('/admin/js/myJs.js')}}"></script>
@include('admin.adminParts.footer')
