<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a class="has-arrow" href="{{ route('home') }}" aria-expanded="false">
                    <i class="la la-home"></i>
                    <span class="nav-text"><a href="{{ route('home') }}">Dashboard</a></span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Administrateurs</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('alladmin') }}">Tous les administrateurs</a></li>
                    <li><a href="{{ route('createadmin') }}">Ajouter des administrateurs</a></li>
                </ul>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Professors</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('allprof') }}">All Professor</a></li>
                    <li><a href="{{ route('createprof') }}">Add Professor</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Students</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('allstudent') }}">All Students</a></li>
                    <li><a href="{{ route('createstudent') }}">Add Students</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-user"></i>
                    <span class="nav-text">Parents</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('allfamily') }}">All Parent</a></li>
                    <li><a href="{{ route('createfamily') }}">Add Parent</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Surveillant General</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('allSG') }}">All Surveillant General</a></li>
                    <li><a href="{{ route('createSG') }}">Add Surveillant General</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-building"></i>
                    <span class="nav-text">Niveaux</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all_Niveau') }}">ALL Niveau</a></li>
                </ul>
            </li>
            <li><a class="ai-icon" href="{{ route('emploi') }}" aria-expanded="false">
                    <i class="la la-calendar"></i>
                    emploi
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-pencil"></i>
                    <span class="nav-text">Salles</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('allsalles')}}">All Salles</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-graduation-cap"></i>
                    <span class="nav-text">Courses</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('alldocument') }}">All Courses</a></li>
                    <li><a href="{{ route('createdocument') }}">Add Courses</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="{{ route('matiere') }}" aria-expanded="false">
                    <i class="la la-book"></i>
                    <span class="nav-text">Matiére</span>
                </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dollar"></i>
                    <span class="nav-text">Divers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('Divers')}}">Divers</a></li>
                </ul>
            </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Inscriptions</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('allinscription') }}">All Inscriptions</a></li>
            </ul>
        </li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Events</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('allevent') }}">All Events</a></li>
            </ul>
        </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-gift"></i>
                    <span class="nav-text">Holiday</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="all-holiday.html">All Holiday</a></li>
                    <li><a href="add-holiday.html">Add Holiday</a></li>
                    <li><a href="edit-holiday.html">Edit Holiday</a></li>
                    <li><a href="holiday-calendar.html">Holiday Calendar</a></li>
                </ul>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dollar"></i>
                    <span class="nav-text">Fees</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="fees-collection.html">Fees Collection</a></li>
                    <li><a href="add-fees.html">Add Fees</a></li>
                    <li><a href="fees-receipt.html">Fees Receipt</a></li>
                </ul>
            </li>
            <li class="nav-label">Apps</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-users"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="app-profile.html">Profile</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="email-compose.html">Compose</a></li>
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="ecom-product-list.html">Product List</a></li>
                            <li><a href="ecom-product-detail.html">Product Details</a></li>
                            <li><a href="ecom-product-order.html">Order</a></li>
                            <li><a href="ecom-checkout.html">Checkout</a></li>
                            <li><a href="ecom-invoice.html">Invoice</a></li>
                            <li><a href="ecom-customers.html">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="la la-signal"></i>
                    <span class="nav-text">Charts</span>
                </a>
            </li>
        </ul>
    </div>
</div>
