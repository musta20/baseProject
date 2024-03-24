            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom topnav-navbar">
                <div class="container-fluid detached-nav">

                    <!-- Topbar Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('admin/') }}" class="logo-light">
                            <span class="logo-lg">

                                @if ($setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" height="22">
                                @else
                                    <i class="mdi mdi-account-circle me-1 fa-2x"></i>
                                @endif
                            </span>
                            <span class="logo-sm">

                                @if ($setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" height="22">
                                @else
                                    <i class="mdi mdi-account-circle me-1 fa-2x"></i>
                                @endif
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="{{ url('admin/') }}" class="logo-dark">
                            <span class="logo-lg">
                                @if ($setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" height="22">
                                @else
                                    <i class="mdi mdi-account-circle me-1 fa-2x"></i>
                                @endif
                            </span>
                            <span class="logo-sm">
                                @if ($setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" height="22">
                                @else
                                    <i class="mdi mdi-account-circle me-1 fa-2x"></i>
                                @endif
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>

                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                href="https://coderthemes.com/hyper_2/saas/index-rtl.html#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient&#39;s username">
                                </form>
                            </div>
                        </li>
                        {{-- 
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('Dashboard/us.jpg')}}" alt="user-image" class="me-0 me-sm-1" height="12"> 
                                <span class="align-middle d-none d-lg-inline-block">English</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('Dashboard/germany.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="{{asset('Dashboard/italy.jpg')}}" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                </a>

                            </div>
                        </li>
 --}}



                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown"
                                href="https://coderthemes.com/hyper_2/saas/index-rtl.html#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-notification-3-line noti-icon"></i>
                                @if (getNotif()['all'] != 0)
                                    <span class="noti-icon-badge"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                                <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 font-16 fw-semibold"> التنبيهات {{ getNotif()['all'] }}</h6>
                                        </div>
                                        <div class="col-auto">
                                            {{--      <a href="{{url('admin/clearAllNotif')}}" class="text-dark text-decoration-underline">
                                                <small>حذف الكل</small>
                                            </a> --}}
                                        </div>
                                        <div class="simplebar-content" style="padding: 0px 24px;">

                                            <h5 class="text-muted font-13 fw-normal mt-2">المهام</h5>
                                            @if (getNotif()['task']->isEmpty())
                                                لا يوجد
                                            @endif
                                            @foreach (getNotif()['task'] as $item)
                                                <a href="{{ route('admin.admin.MainTask') }}"
                                                    class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                                    <div class="card-body">
                                                        {{--                                                     <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>   
 --}}
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="notify-icon bg-primary">
                                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 text-truncate ms-2">
                                                                <h5 class="noti-item-title fw-semibold font-14">
                                                                    {{ $item->title }} </h5>
                                                                <small
                                                                    class="noti-item-subtitle text-muted">{{ $item->created_at }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach

                                                <hr>
                                            <h5 class="text-muted font-13 fw-normal mt-2">الرسائل</h5>
                                            @if (getNotif()['msg']->isEmpty())
                                                لا يوجد
                                            @endif
                                            @foreach (getNotif()['msg'] as $item)
                                                <a href="{{ url('/admin/inbox/2') }}"
                                                    class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                                    <div class="card-body">
                                                        {{--                                                     <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>   
 --}} <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="notify-icon bg-primary">
                                                                    <i class="mdi mdi-comment-account-outline"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 text-truncate ms-2">
                                                                <h5 class="noti-item-title fw-semibold font-14">
                                                                    {{ $item->title }} </h5>
                                                                <small
                                                                    class="noti-item-subtitle text-muted">{{ $item->created_at }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach

                                        </div>




                                    </div>
                                </div>

                                <div class="px-3" style="max-height: 300px;" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px -24px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="left: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px 24px;">

                                                        <h5 class="text-muted font-13 fw-normal mt-2">Today</h5>
                                                        <!-- item-->

                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                                                            <div class="card-body">
                                                                <span class="float-end noti-close-btn text-muted"><i
                                                                        class="mdi mdi-close"></i></span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <div class="notify-icon bg-primary">
                                                                            <i
                                                                                class="mdi mdi-comment-account-outline"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 text-truncate ms-2">
                                                                        <h5
                                                                            class="noti-item-title fw-semibold font-14">
                                                                            Datacorp <small
                                                                                class="fw-normal text-muted ms-1">1 min
                                                                                ago</small></h5>
                                                                        <small
                                                                            class="noti-item-subtitle text-muted">Caleb
                                                                            Flakelar commented on Admin</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                                            <div class="card-body">
                                                                <span class="float-end noti-close-btn text-muted"><i
                                                                        class="mdi mdi-close"></i></span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <div class="notify-icon bg-info">
                                                                            <i class="mdi mdi-account-plus"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 text-truncate ms-2">
                                                                        <h5
                                                                            class="noti-item-title fw-semibold font-14">
                                                                            Admin <small
                                                                                class="fw-normal text-muted ms-1">1
                                                                                hours ago</small></h5>
                                                                        <small
                                                                            class="noti-item-subtitle text-muted">New
                                                                            user registered</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                                            <div class="card-body">
                                                                <span class="float-end noti-close-btn text-muted"><i
                                                                        class="mdi mdi-close"></i></span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <div class="notify-icon">
                                                                            <img src="{{ asset('Dashboard/avatar-2.jpg') }}"
                                                                                class="img-fluid rounded-circle"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 text-truncate ms-2">
                                                                        <h5
                                                                            class="noti-item-title fw-semibold font-14">
                                                                            Cristina Pride <small
                                                                                class="fw-normal text-muted ms-1">1 day
                                                                                ago</small></h5>
                                                                        <small
                                                                            class="noti-item-subtitle text-muted">Hi,
                                                                            How are you? What about our next
                                                                            meeting</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                                            <div class="card-body">
                                                                <span class="float-end noti-close-btn text-muted"><i
                                                                        class="mdi mdi-close"></i></span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <div class="notify-icon bg-primary">
                                                                            <i
                                                                                class="mdi mdi-comment-account-outline"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 text-truncate ms-2">
                                                                        <h5
                                                                            class="noti-item-title fw-semibold font-14">
                                                                            Datacorp</h5>
                                                                        <small
                                                                            class="noti-item-subtitle text-muted">Caleb
                                                                            Flakelar commented on Admin</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                                                            <div class="card-body">
                                                                <span class="float-end noti-close-btn text-muted"><i
                                                                        class="mdi mdi-close"></i></span>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0">
                                                                        <div class="notify-icon">
                                                                            <img src="{{ asset('Dashboard/avatar-4.jpg') }}"
                                                                                class="img-fluid rounded-circle"
                                                                                alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 text-truncate ms-2">
                                                                        <h5
                                                                            class="noti-item-title fw-semibold font-14">
                                                                            Karen Robinson</h5>
                                                                        <small
                                                                            class="noti-item-subtitle text-muted">Wow !
                                                                            this admin looks good and awesome
                                                                            design</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <div class="text-center">
                                                            <i
                                                                class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                    </div>
                                </div>

                                <!-- All-->
                                {{--      <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                                    عرض الجميع
                                </a> --}}

                            </div>
                        </li>

                        {{--                         <li class="dropdown notification-list d-none d-sm-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ri-apps-2-line noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                <div class="p-2">
                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#">
                                                <img src="{{asset('Dashboard/slack.png')}}" alt="slack">
                                                <span>Slack</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#">
                                                <img src="{{asset('Dashboard/github.png')}}" alt="Github">
                                                <span>GitHub</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#">
                                                <img src="{{asset('Dashboard/dribbble.png')}}" alt="dribbble">
                                                <span>Dribbble</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row g-0">
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#">
                                                <img src="{{asset('Dashboard/bitbucket.png')}}" alt="bitbucket">
                                                <span>Bitbucket</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#">
                                                <img src="{{asset('Dashboard/dropbox.png')}}" alt="dropbox">
                                                <span>Dropbox</span>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="dropdown-icon-item" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#">
                                                <img src="{{asset('Dashboard/g-suite.png')}}" alt="G Suite">
                                                <span>G Suite</span>
                                            </a>
                                        </div>
                                    </div> <!-- end row-->
                                </div>

                            </div>
                        </li>
 --}}
                        {{--                         <li class="notification-list d-none d-sm-inline-block">
                            <a class="nav-link" data-bs-toggle="offcanvas" 
                            href="https://coderthemes.com/hyper_2/saas/index-rtl.html#theme-settings-offcanvas">
                                <i class="ri-settings-3-line noti-icon"></i>
                            </a>
                        </li> --}}

                        <li class="notification-list d-none d-sm-inline-block">
                            <a class="nav-link" href="javascript:void(0)" id="light-dark-mode">
                                <i class="ri-moon-line noti-icon"></i>
                            </a>
                        </li>

                        <li class="notification-list d-none d-md-inline-block">
                            <a class="nav-link" href="https://coderthemes.com/hyper_2/saas/index-rtl.html"
                                data-toggle="fullscreen">
                                <i class="ri-fullscreen-line noti-icon"></i>
                            </a>
                        </li>
                        @auth




                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                    href="https://coderthemes.com/hyper_2/saas/index-rtl.html#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        @if (auth()->user()->img)
                                            <img src="{{ url('storage/' . auth()->user()->img) }}" alt="user-image"
                                                class="rounded-circle">
                                        @else
                                            <i class="mdi mdi-account-circle me-1 fa-2x"></i>
                                        @endif

                                    </span>
                                    <span>
                                        <span class="account-user-name"> {{ auth()->user()->name }}</span>
                                        <span class="account-position">{{ __(auth()->user()->getRoleNames()[0]) }}</span>
                                    </span>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0"> هلا بك !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{{ route('admin.Users.edit',  auth()->user()->id ) }}"
                                        class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>حسابي </span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{ route('admin.basic') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit me-1"></i>
                                        <span>إعداد الموقع</span>
                                    </a>

                                    <!-- item-->
                                    <a data-bs-toggle="offcanvas"
                                        href="https://coderthemes.com/hyper_2/saas/index-rtl.html#theme-settings-offcanvas"
                                        class="dropdown-item notify-item">
                                        <i class="mdi mdi-lifebuoy me-1"></i>
                                        <span>اعداد الثيم </span>
                                    </a>

                                    <!-- item-->
                                    {{--                               <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-lock-outline me-1"></i>
                                    <span>Lock Screen</span>
                                </a> --}}

                                    <!-- item-->
                                    <a href="{{ url('/logout') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>تسجيل الخروج</span>
                                    </a>
                                </div>
                            </li>


                        </ul>
                    @else
                    @endauth
                    <!-- Topbar Search Form -->
                    <div class="app-search dropdown">
                                     {{-- <form>
                            <div class="input-group">
                                <input type="search" class="form-control dropdown-toggle"
                                 placeholder="Search..." id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn btn-primary" type="submit">بحث</button>
                            </div>
                        </form> --}}
{{-- 
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle"
                                            src="{{ asset('Dashboard/avatar-2.jpg') }}"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle"
                                            src="{{ asset('Dashboard/avatar-5.jpg') }}"
                                            alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->
