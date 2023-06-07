<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
            {{-- <h1>{{Auth::user()->role->role_nom}}</h1> --}}
        <div class="row">
            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Total d'étudiants</h4>
                                <h3>3280</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-primary" style="width: 80%"></div>
                                </div>
                                <small>80% Augmentation en 20 jours</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Nouveaux étudiants</h4>
                                <h3>245</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-warning" style="width: 50%"></div>
                                </div>
                                <small>50% Augmentation en 25 jours</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Total Course</h4>
                                <h3>28</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-red" style="width: 76%"></div>
                                </div>
                                <small>76% Augmentation en 20 jours</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body">
                                <h4 class="card-title">Total Professeurs</h4>
                                <h3>25160</h3>
                                <div class="progress mb-2">
                                    <div class="progress-bar progress-animated bg-success" style="width: 30%"></div>
                                </div>
                                {{-- <small>30% Augmentation en 30 jours</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Rapport de revenus/dépenses</h3>
                    </div>
                    <div class="card-body">
                         <div id="morris_bar_2" class="morris_chart_height"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des professeurs</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($profs as $prof)
                            <div class="media mb-3 align-items-center border-bottom pb-3">
                                <div class="media-body">
                                    <img src="" alt="">
                                    <h5 class="mb-0 text-pale-sky">{{$prof->user->nom}} {{$prof->user->prenom}} <small class="text-muted">({{$prof->matiere->nom}})</small></h5>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center pt-3">
                            <a href="{{route('allprof')}}" class="btn btn-primary btn-rounded btn px-5 btn-lg">View All</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-xxl-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Liste des étudiants</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive recentOrderTable">
                            <table class="table verticle-middle table-responsive-md">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom Complet</th>
                                        <th scope="col">Classe</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{$student->user->prenom}}  {{$student->user->nom}}</td>
                                            <td>{{$student->classe->nom}}</td>
                                            <td>
                                                <div class="dropdown custom-dropdown mb-0">
                                                    <div data-toggle="dropdown">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{route('profilestudent',['id' => $student->user->id])}}">Details</a>
                                                        <a class="dropdown-item" href="{{route('editstudent',['id' => $student->user->id])}}">Edit</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gold medal</h4>
                        <small class="text-success"><i class="fa fa-caret-up"></i> 20% High then last mont</small>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="font-weight-normal">Overall Growth</h6>
                                <strong>82.24%</strong>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-normal">Montly</h6>
                                <strong>12.24 %</strong>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-normal">Day</h6>
                                <strong>42.24%</strong>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                       <span class="peity-line" data-width="100%">6,5,8,4,3,8,4,3,6,5,9,5,8,3,4,8,9,8,5,7</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Silver medal</h4>
                        <small class="text-success"><i class="fa fa-caret-up"></i> 20% High then last mont</small>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="font-weight-normal">Overall Growth</h6>
                                <strong>82.24%</strong>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-normal">Montly</h6>
                                <strong>12.24 %</strong>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-normal">Day</h6>
                                <strong>42.24%</strong>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                        <span class="peity-line-2" data-width="100%">9,3,7,8,6,7,3,3,7,4,6,8,3,4,7,3,4,7,8,5</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-xxl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Bronze medal</h4>
                        <small class="text-success"><i class="fa fa-caret-up"></i> 20% High then last mont</small>
                    </div>
                    <div class="card-body pb-0">
                        <div class="row mt-2">
                            <div class="col">
                                <h6 class="font-weight-normal">Overall Growth</h6>
                                <strong>82.24%</strong>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-normal">Montly</h6>
                                <strong>12.24 %</strong>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-normal">Day</h6>
                                <strong>42.24%</strong>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper">
                       <span class="peity-line-3" data-width="100%">3,8,3,7,8,6,3,4,7,3,7,9,6,3,7,6,7,3,4,2</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                <div class="card profile-tab">
                    <div class="card-header">
                        <h4 class="card-title">Salary Status</h4>
                    </div>
                    <div class="card-body custom-tab-1">
                        <ul class="nav nav-tabs mb-3">
                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link pb-2 active show">Professors</a></li>
                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link pb-2">Librarian</a></li>
                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link pb-2">Other</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="my-posts" class="tab-pane fade active show">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Ammount</th>
                                                <th scope="col">Transaction ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="{{asset('admin/images/profile/education/pic1.jpg')}}" class="rounded-circle" width="35" alt=""></td>
                                                <td>test</td>
                                                <td><span class="badge badge-rounded badge-success">Paid</span></td>
                                                <td>12 August 2020</td>
                                                <td>100</td>
                                                <td>#42317</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{asset('admin/images/profile/education/pic2.jpg')}}" class="rounded-circle" width="35" alt=""></td>
                                                <td>ali</td>
                                                <td><span class="badge badge-rounded badge-danger">Unpaid</span></td>
                                                <td>11 July 2020</td>
                                                <td>200</td>
                                                <td>#54682</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{asset('admin/images/profile/education/pic3.jpg')}}" class="rounded-circle" width="35" alt=""></td>
                                                <td>ana</td>
                                                <td><span class="badge badge-rounded badge-warning">Pending</span></td>
                                                <td>10 May 2020</td>
                                                <td>400</td>
                                                <td>#57894</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{asset('admin/images/profile/education/pic4.jpg')}}" class="rounded-circle" width="35" alt=""></td>
                                                <td>asma</td>
                                                <td><span class="badge badge-rounded badge-danger">Unpaid</span></td>
                                                <td>09 April 2020</td>
                                                <td>300</td>
                                                <td>#57864</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{asset('admin/images/profile/education/pic5.jpg')}}" class="rounded-circle" width="35" alt=""></td>
                                                <td>Rhona</td>
                                                <td><span class="badge badge-rounded badge-warning">Pending</span></td>
                                                <td>08 March 2020</td>
                                                <td>500</td>
                                                <td>#56387</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="about-me" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Ammount</th>
                                                <th scope="col">Transaction ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="images/profile/education/pic6.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>test test</td>
                                                <td><span class="badge badge-rounded badge-success">Paid</span></td>
                                                <td>12 August 2020</td>
                                                <td>100</td>
                                                <td>#42317</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic7.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>karim</td>
                                                <td><span class="badge badge-rounded badge-danger">Unpaid</span></td>
                                                <td>11 July 2020</td>
                                                <td>200</td>
                                                <td>#54682</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic8.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>Cedric Kelly</td>
                                                <td><span class="badge badge-rounded badge-warning">Pending</span></td>
                                                <td>10 May 2020</td>
                                                <td>400</td>
                                                <td>#57894</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic10.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>khalid</td>
                                                <td><span class="badge badge-rounded badge-danger">Unpaid</span></td>
                                                <td>09 April 2020</td>
                                                <td>300</td>
                                                <td>#57864</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic9.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>Rhona</td>
                                                <td><span class="badge badge-rounded badge-warning">Pending</span></td>
                                                <td>08 March 2020</td>
                                                <td>500</td>
                                                <td>#56387</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="profile-settings" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Ammount</th>
                                                <th scope="col">Transaction ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="images/profile/education/pic5.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>Ramos</td>
                                                <td><span class="badge badge-rounded badge-success">Paid</span></td>
                                                <td>12 August 2020</td>
                                                <td>100</td>
                                                <td>#42317</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic8.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>test</td>
                                                <td><span class="badge badge-rounded badge-danger">Unpaid</span></td>
                                                <td>11 July 2020</td>
                                                <td>200</td>
                                                <td>#54682</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic6.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>Kelly</td>
                                                <td><span class="badge badge-rounded badge-warning">Pending</span></td>
                                                <td>10 May 2020</td>
                                                <td>400</td>
                                                <td>#57894</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic2.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>Vance</td>
                                                <td><span class="badge badge-rounded badge-danger">Unpaid</span></td>
                                                <td>09 April 2020</td>
                                                <td>300</td>
                                                <td>#57864</td>
                                            </tr>
                                            <tr>
                                                <td><img src="images/profile/education/pic7.jpg" class="rounded-circle" width="35" alt=""></td>
                                                <td>Rhona Davidson</td>
                                                <td><span class="badge badge-rounded badge-warning">Pending</span></td>
                                                <td>08 March 2020</td>
                                                <td>500</td>
                                                <td>#56387</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
