            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Logo Light -->
                <a href="{{ url('admin/') }}"class="logo logo-light">
                    <span class="logo-lg ">
                        <img 
                        src="{{ asset('storage/' . $setting->logo) }}" 
                        alt="logo" 
                        height="55">
                    </span>
                    <span class="logo-sm ">
                        <img 
                        src="{{ asset('storage/' . $setting->logo) }}" 
                        alt="small logo" 
                        height="22">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="{{ url('admin/') }}" class="logo logo-dark">
                    <span class="logo-lg ">
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="dark logo" height="55">
                    </span>
                    <span class="logo-sm ">
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="small logo" height="22">
                    </span>
                </a>

                <!-- Sidebar Hover Menu Toggle Button -->
                <button type="button" class="btn button-sm-hover p-0" data-bs-toggle="tooltip"
                    data-bs-placement="right" aria-label="Show Full Sidebar">
                    <i class="ri-checkbox-blank-circle-line align-middle"></i>
                </button>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="left: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <!-- Leftbar User -->
                                        <div class="leftbar-user">
                                            <a href="{{ url('admin/') }}">
                                                <span class="account-user-avatar">
                                                    @if (auth()->user()->img)
                                                        <img src="{{ url('storage/' . auth()->user()->img) }}"
                                                            alt="user-image" height="42"
                                                            class="rounded-circle shadow-sm">
                                                    @else
                                                        <i class="mdi mdi-account-circle me-1 fa-2x"></i>
                                                    @endif

                                                </span>

                                                <span class="leftbar-user-name">{{ auth()->user()->name }} </span>
                                            </a>
                                        </div>

                                        <!--- Sidemenu -->
                                        <ul class="side-nav">

                                            <li class="side-nav-title side-nav-item"></li>

                                            {{--                         <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end">5</span>
                                <span> لوحة التحكم </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/dashboard-analytics.html">Analytics</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/index.html">Ecommerce</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/dashboard-projects.html">Projects</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/dashboard-crm.html">CRM</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/dashboard-wallet.html">E-Wallet</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
 --}}
                                            <li class="side-nav-title side-nav-item">الادارة اليومية</li>

                                            {{--                    <li class="side-nav-item">
                            <a href="https://coderthemes.com/hyper_2/saas/apps-calendar.html" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> التقويم </span>
                            </a>
                        </li> --}}

                        <li class="side-nav-item">

                            <a href="{{ url('admin/') }}" class="side-nav-link">
                                <i class="mdi mdi-home home-icon"></i>
                                <span> الرئيسية </span>

                            </a>
                        </li>
                        
                        @can('Search')

                                            <li class="side-nav-item">

                                                <a href="{{ url('admin/Search') }}" class="side-nav-link">
                                                    <i class="mdi mdi-magnify search-icon"></i>
                                                    <span> البحث </span>

                                                </a>
                                            </li>
                                            @endcan

                                            @can('Task')
                                                <li class="side-nav-item">

                                                    <a data-bs-toggle="collapse" href="#SidebarMyTask" aria-expanded="false"
                                                        aria-controls="sidebarCrm" class="side-nav-link">
                                                        <i class="uil uil-tachometer-fast"></i>
                                                        <span> المهام </span>
                                                        <span class="menu-arrow"></span>

                                                    </a>







                                                    {{--                <a href="{{ url('/admin/MainTask') }}" class="side-nav-link">
                                                        <i class="uil uil-tachometer-fast"></i>
                                                        <span> المهام </span>
                                                    </a> --}}


                                                    <div class="collapse" id="SidebarMyTask">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.admin.MainTask') }}">المهام الداخلية </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.showMyNotifyTask',1) }}">
                                                                    تنبيهات</a>
                                                            </li>
                                               

                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan

                                            @can('Massages')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false"
                                                        aria-controls="sidebarCrm" class="side-nav-link">
                                                        <i class="uil-envelope"></i>

                                                        <span> الرسائل </span>
                                                        <span class="menu-arrow"></span>

                                                    </a>
                                                    <div class="collapse" id="sidebarCrm">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ url('/admin/inbox/2') }}">صندوق الوارد</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/admin/inbox/1') }}">الرسائل المرسلة</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.Messages.create') }}">انشاء
                                                                    رسالة</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan


                                            @can('TaskMangment')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false"
                                                        aria-controls="sidebarEmail" class="side-nav-link">
                                                        <i class="uil-comments-alt"></i>
                                                        <span> ادارة المهام </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarEmail">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.Task.index') }}">مهام داخلية</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('admin.TasksNotify.index') }}">التنبيهات</a>
                                                            </li>
                                                            <li>
                                                               
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan


                                            @can('Category/Services')
                                                <li class="side-nav-title side-nav-item">ادارة العملاء</li>
                                            @endcan

                                            @can('Order')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#sidebarEcommerce"
                                                        aria-expanded="false" aria-controls="sidebarEcommerce"
                                                        class="side-nav-link">
                                                        <i class="uil-store"></i>
                                                        <span> إدارة الطلبات </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarEcommerce">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{route('admin.showOrderList',0)}}" >
                                                                    جديدة</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.showOrderList',1)}}" >
                                                                    مستلمة</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.showOrderList',2)}}" >
                                                                    طلبات
                                                                    مكتملة</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.showOrderList',3)}}" >
                                                                    طلبات
                                                                    مسلمة</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.showOrderList',4)}}" >
                                                                    طلبات

                                                                    ملغية</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.Payment.index') }}">ادارة طرق الدفع</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.Delivery.index') }}">ادارة طرق
                                                                    التوصيل</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan

                                            @can('Reviews')
                                                <li class="side-nav-item">
                                                    <a href="{{ url('/admin/Clients') }}" class="side-nav-link">
                                                        <i class="uil-folder-plus"></i>
                                                        <span> اراء العملاء </span>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can('Category/Services')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#sidebarProjects"
                                                        aria-expanded="false" aria-controls="sidebarProjects"
                                                        class="side-nav-link">
                                                        <i class="uil-briefcase"></i>
                                                        <span> الخدمات و التصنيفات </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarProjects">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.Services.index') }}">الخدمات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.Category.index') }}">التصنيفات</a>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan

                                            @can('Logs')
                                                <li class="side-nav-item">
                                                    <a href="{{ url('/admin/Logs') }}" class="side-nav-link">
                                                        <i class="uil-rss"></i>
                                                        <span> التتبع </span>
                                                    </a>
                                                </li>
                                            @endcan

                                            @can('Report')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#ReportMangment"
                                                        aria-expanded="false" aria-controls="sidebarTasks"
                                                        class="side-nav-link">
                                                        <i class="uil-chart"></i>
                                                        <span> ادارة التقارير </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="ReportMangment">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.Report.index') }}">تقارير
                                                                    العمليات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.cashReport') }}">تقارير
                                                                    الحسابات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.billReportView') }}">الفواتير</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.createBill') }}">انشاء فاتورة
                                                                    عميل</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan

                                            @can('jobs')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#JobMangemnt"
                                                        aria-expanded="false" aria-controls="sidebarTasks"
                                                        class="side-nav-link">
                                                        <i class="uil-package"></i>
                                                        <span> ادارة التوظيف </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="JobMangemnt">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.Jobs.index') }}">جميع الوظائف</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.JobApp.index') }}">طلبات التوظيف</a>
                                                            </li>
                                                       
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan

                                            @can('Users')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#userMangement"
                                                        aria-expanded="false" aria-controls="sidebarTasks"
                                                        class="side-nav-link">
                                                        <i class="uil-clipboard-alt"></i>
                                                        <span> ادارة المستخدمين </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="userMangement">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.perm') }}">ادارة الصلاحيات</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.UsersList') }}">جميع الموظفين</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('admin.Users.create') }}">اضافة موظف
                                                                    جديد</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan

                                            @can('Setting')
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="#SettingSideBar"
                                                        aria-expanded="false" aria-controls="sidebarTasks"
                                                        class="side-nav-link">
                                                        <i class="ri-settings-3-line noti-icon"></i>
                                                        <span> اعداد الموقع </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="SettingSideBar">
                                                        <ul class="side-nav-second-level">
                                                            <li>
                                                                <a href="{{ route('admin.basic') }}">اعداد الموقع
                                                                    الاساسبة</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/admin/CustmerSlide') }}">العملاء</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ url('/admin/Slide') }}">السلايدات</a>
                                                            </li>

                                                            <li>
                                                                <a href="{{ url('/admin/Number') }}">عرض الاحصائات</a>
                                                            </li>


                                                            <li>
                                                                <a href="{{ url('/admin/Social') }}">وسائل التواصل</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endcan


                                            {{--                   
                                                <li class="side-nav-title side-nav-item">Custom</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="uil-copy-alt"></i>
                                <span> Pages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-profile.html">Profile</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-profile-2.html">Profile 2</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-pricing.html">Pricing</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-maintenance.html">Maintenance</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                            <span> Authentication </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesAuth">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-login.html">Login</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-login-2.html">Login 2</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-register.html">Register</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-register-2.html">Register 2</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-logout.html">Logout</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-logout-2.html">Logout 2</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-recoverpw.html">Recover Password</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-recoverpw-2.html">Recover Password 2</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-lock-screen.html">Lock Screen</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-lock-screen-2.html">Lock Screen 2</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-confirm-mail.html">Confirm Mail</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-confirm-mail-2.html">Confirm Mail 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError">
                                            <span> Error </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarPagesError">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-404.html">Error 404</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-404-alt.html">Error 404-alt</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/pages-500.html">Error 500</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-starter.html">Starter Page</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-preloader.html">With Preloader</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/pages-timeline.html">Timeline</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="https://coderthemes.com/hyper_2/saas/landing.html" target="_blank" class="side-nav-link">
                                <i class="uil-globe"></i>
                                <span class="badge bg-secondary text-light float-end">New</span>
                                <span> Landing </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Layouts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/layouts-horizontal.html" target="_blank">Horizontal</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/layouts-detached.html" target="_blank">Detached</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/layouts-full.html" target="_blank">Full View</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/layouts-hover.html" target="_blank">Hover Menu</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/layouts-compact.html" target="_blank">Compact</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/layouts-icon-view.html" target="_blank">Icon View</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-title side-nav-item mt-1">Components</li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                                <i class="uil-box"></i>
                                <span> Base UI </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-accordions.html">Accordions &amp; Collapse</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-alerts.html">Alerts</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-avatars.html">Avatars</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-badges.html">Badges</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-breadcrumb.html">Breadcrumb</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-cards.html">Cards</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-carousel.html">Carousel</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-dropdowns.html">Dropdowns</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-embed-video.html">Embed Video</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-grid.html">Grid</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-list-group.html">List Group</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-modals.html">Modals</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-notifications.html">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-offcanvas.html">Offcanvas</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-placeholders.html">Placeholders</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-pagination.html">Pagination</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-popovers.html">Popovers</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-progress.html">Progress</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-ribbons.html">Ribbons</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-spinners.html">Spinners</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-tabs.html">Tabs</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-tooltips.html">Tooltips</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/ui-utilities.html">Utilities</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                                <i class="uil-package"></i>
                                <span> Extended UI </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExtendedUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/extended-dragula.html">Dragula</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/extended-range-slider.html">Range Slider</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/extended-ratings.html">Ratings</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/extended-scrollbar.html">Scrollbar</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/extended-scrollspy.html">Scrollspy</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/extended-treeview.html">Treeview</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a href="https://coderthemes.com/hyper_2/saas/widgets.html" class="side-nav-link">
                                <i class="uil-layer-group"></i>
                                <span> Widgets </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                                <i class="uil-streering"></i>
                                <span> Icons </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarIcons">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/icons-remixicons.html">Remix Icons</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/icons-mdi.html">Material Design</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/icons-unicons.html">Unicons</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                                <i class="uil-chart"></i>
                                <span> Charts </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCharts">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarApexCharts" aria-expanded="false" aria-controls="sidebarApexCharts">
                                            <span> Apex Charts </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarApexCharts">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-area.html">Area</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-bar.html">Bar</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-bubble.html">Bubble</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-candlestick.html">Candlestick</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-column.html">Column</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-heatmap.html">Heatmap</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-line.html">Line</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-mixed.html">Mixed</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-timeline.html">Timeline</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-boxplot.html">Boxplot</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-treemap.html">Treemap</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-pie.html">Pie</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-radar.html">Radar</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-radialbar.html">RadialBar</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-scatter.html">Scatter</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-polar-area.html">Polar Area</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-apex-sparklines.html">Sparklines</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarChartJSCharts" aria-expanded="false" aria-controls="sidebarChartJSCharts">
                                            <span> ChartJS </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarChartJSCharts">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-chartjs-area.html">Area</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-chartjs-bar.html">Bar</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-chartjs-line.html">Line</a>
                                                </li>
                                                <li>
                                                    <a href="https://coderthemes.com/hyper_2/saas/charts-chartjs-other.html">Other</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/charts-brite.html">Britecharts</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/charts-sparkline.html">Sparklines</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                                <i class="uil-document-layout-center"></i>
                                <span> Forms </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarForms">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/form-elements.html">Basic Elements</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/form-advanced.html">Form Advanced</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/form-validation.html">Validation</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/form-wizard.html">Wizard</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/form-fileuploads.html">File Uploads</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/form-editors.html">Editors</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                                <i class="uil-table"></i>
                                <span> Tables </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTables">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/tables-basic.html">Basic Tables</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/tables-datatable.html">Data Tables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                                <i class="uil-location-point"></i>
                                <span> Maps </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMaps">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/maps-google.html">Google Maps</a>
                                    </li>
                                    <li>
                                        <a href="https://coderthemes.com/hyper_2/saas/maps-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                                <i class="uil-folder-plus"></i>
                                <span> Multi Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarMultiLevel">
                                <ul class="side-nav-second-level">
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                                            <span> Second Level </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarSecondLevel">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                            <span> Third Level </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarThirdLevel">
                                            <ul class="side-nav-third-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 1</a>
                                                </li>
                                                <li class="side-nav-item">
                                                    <a data-bs-toggle="collapse" href="https://coderthemes.com/hyper_2/saas/index-rtl.html#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">
                                                        <span> Item 2 </span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="collapse" id="sidebarFourthLevel">
                                                        <ul class="side-nav-forth-level">
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2.1</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript: void(0);">Item 2.2</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                                        </ul>
                                        <!--- End Sidemenu -->

                                        <!-- Help Box -->
                                        {{--                  <div class="help-box text-white text-center">
                        <a href="javascript: void(0);" class="float-end close-btn text-white">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <img src="{{asset('Dashboard/help-icon.svg')}}" height="90" alt="Helper Icon Image">
                        <h5 class="mt-3">Unlimited Access</h5>
                        <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                        <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Upgrade</a>
                    </div> --}}
                                        <!-- end Help Box -->

                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 1518px;"></div>

                    </div>

                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar simplebar-visible" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar "
                            style="height: 134px; transform: translate3d(0px, 300px, 0px); display: block;"></div>
                    </div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->
            <style>
                a:has(> i.mdi-pencil) {
                    /* styles to apply to the li tag */
                    font-size: 20px !important;

                    color: #26a338;
                    margin-right: 0.75rem !important;
                }

                a:has(> i.mdi-delete) {
                    /* styles to apply to the li tag */
                    font-size: 20px !important;

                    color: #c42727;
                    margin-right: 0.75rem !important;
                }


                * {
                    transition: .4s all ease-in !important;
                }

                /* html[data-sidenav-color=light] .logo.logo-light {
    display: block !important;
} */
            </style>
