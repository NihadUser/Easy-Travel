@include('admin.adminParts.header')
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
    @include('admin.adminParts.menu')
    @include('admin.adminParts.aside')
    <main class="bmd-layout-content">
        <div class="container-fluid ">

            <!-- content -->
            <!-- breadcrumb -->

            <div class="row  m-1 pb-4 mb-3 ">
                <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                    <div class="page-header breadcrumb-header ">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">Dashboard</h3>
                                        <span class="lite-text text-gray">Report and analytics</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-1 mb-2">
                <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                    <div class="box-card mini animate__animated animate__flipInY   "><i
                            class="fab far fa-chart-bar b-first" aria-hidden="true"></i>
                        <span class="c-first">Bounce Rate</span>
                        <span>30%</span>
                        <p class="mt-3 mb-1 text-center"><i class="far fas fa-wallet mr-1 c-first"></i>Your main
                            list is
                            growing</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                    <div class="box-card mini animate__animated animate__flipInY    "><i
                            class="fab far fa-clock b-second" aria-hidden="true"></i>
                        <span class="c-second">Total Users</span>
                        <span>{{ $users_count }}</span>
                        <p class="mt-3 mb-1 text-center"><i class="far fas fa-wifi mr-1 c-second"></i>Your main list
                            is
                            growing</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                    <div class="box-card mini animate__animated animate__flipInY   "><i
                            class="fab far fa-comments b-third" aria-hidden="true"></i>
                        <span class="c-third">Requests</span>
                        <span>{{ $requests_count }}</span>
                        <p class="mt-3 mb-1 text-center"><i class="fab fa-whatsapp mr-1 c-third"></i>Your main list
                            is
                            growing</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                    <div class="box-card mini animate__animated animate__flipInY   "><i
                            class="fab far fa-gem b-forth" aria-hidden="true"></i>
                        <span class="c-forth">Active Tours</span>
                        <span>{{ $tours_count }}</span>
                        <p class="mt-3 mb-1 text-center"><i class="fab fa-bluetooth mr-1 c-forth"></i>Your main list
                            is
                            growing</p>
                    </div>
                </div>
            </div>

{{--            <div class="row m-2 mb-1">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">--}}
{{--                    <div class="alert  alert-third alert-shade alert-dismissible fade show" role="alert">--}}
{{--                        <strong>alert-third!</strong> You should check in on some of those fields below.--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                            <span aria-hidden="true">×</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="row m-1">--}}
{{--                <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">--}}
{{--                    <div class="card shade h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Mixed Bar/line Chart</h5>--}}

{{--                            <hr>--}}
{{--                            <canvas id="myChart5"></canvas>--}}
{{--                            <hr class="hr-dashed">--}}
{{--                            <p class="text-center c-danger">Example of bar chart</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4 p-2">--}}
{{--                    <div class="card flat f-first h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Weather Widget</h5>--}}

{{--                            <hr>--}}
{{--                            <a class="weatherwidget-io" href="https://forecast7.com/en/37d5545d08/urmia/"--}}
{{--                                data-label_1="URMIA" data-label_2="WEATHER" data-icons="Climacons Animated"--}}
{{--                                data-days="5" data-textcolor="#fafafaad"></a>--}}


{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mb-2 m-2">--}}
{{--                <div class="col-xl-8 col-md-6 col-sm-6 p-2">--}}
{{--                    <div class="box-dash h-100 pastel animate__animated animate__flipInY b-second   "><i--}}
{{--                            class="fab far fa-clock" aria-hidden="true"></i>--}}

{{--                        <span>27</span>--}}
{{--                        <hr class="m-0 ">--}}
{{--                        <span>Week Visitors</span>--}}
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6 col-sm-6 p-2">--}}
{{--                    <div class="box-card h-100 flat f-main animate__animated animate__flipInY   ">--}}

{{--                        <iframe--}}
{{--                            src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FTehran"--}}
{{--                            width="100%" height="115" frameborder="0" seamless></iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}



{{--            </div>--}}
{{--            <div class="row m-1">--}}
{{--                <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4 p-2">--}}
{{--                    <div class="card shade h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">Doughnut Chart</h5>--}}

{{--                            <hr>--}}
{{--                            <canvas id="myChart4" width="10" height="11"></canvas>--}}
{{--                            <hr class="hr-dashed">--}}
{{--                            <p class="text-center c-danger">Example of Doughnut chart</p>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
                {{-- <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">
                    <div class="card shade h-100">
                        <div class="card-body">
                            <h5 class="card-title">Table Item</h5>

                            <hr>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> --}}

            </div>

{{--
            <div class="row m-1">
                <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">
                    <div class="alert col-12  alert-success alert-shade-white bd-side alert-dismissible fade show"
                        role="alert">
                        <strong>alert-success!</strong> You should check in on some of those fields below.

                    </div>
                    <div id="accordion " class="accordion card shade outlined o-forth w-100">
                        <div class="">
                            <div class="card-header mr-3 ml-3 pr-0 pl-0" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link c-grey w-100 m-0 text-left" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Collapsible Group Item #1
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                    wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                    vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth nesciunt you probably haven't heard of them accusamus labore
                                    sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="card-header mr-3 ml-3 pr-0 pl-0" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link c-grey collapsed w-100 m-0 text-left"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Collapsible Group Item #2
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                    wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                    vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth nesciunt you probably haven't heard of them accusamus labore
                                    sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="card-header mr-3 ml-3 pr-0 pl-0" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link c-grey collapsed w-100 m-0 text-left"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Collapsible Group Item #3
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                    dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                                    tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                    assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                    wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
                                    vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic
                                    synth nesciunt you probably haven't heard of them accusamus labore
                                    sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 p-2">
                    <div class="card shade h-100">
                        <div class="card-body">
                            <h5 class="card-title">Polar Chart</h5>

                            <hr>
                            <canvas id="myChart2" width="10" height="13"></canvas>

                        </div>

                    </div>
                </div> --}}

            </div>
        </div>
    </main>
</div>
@include('admin.adminParts.footer')
