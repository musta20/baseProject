<!DOCTYPE html>
<html
  lang="{{ str_replace('_', '-', app()->getLocale()) }}"
 dir="{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}"
 >
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ __('Login') }} | {{ $title ?? "store" }}</title>
</head>
<x-auth-session-status class="mb-4" :status="session('status')" />
@vite(['resources/js/index.js','resources/js/helper.js'])

<body
    x-data="{ page: 'signin', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
          darkMode = JSON.parse(localStorage.getItem('darkMode'));
          $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
    <!-- ===== Preloader Start ===== -->
    <x-admin.partials.preloader />
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    <!-- Breadcrumb Start -->
                    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div class="md:items-center p-2">
                            @if (tenant())
                            <a href="/">
                                <img src="{{ tenant_asset('media/'.$logo) }}" alt="noon">
                            </a>
                            @endif
                        </div>
                        <nav>
                            <ol class="flex items-center gap-2">
                                <li>
                                    <a class="font-medium" href="/">{{ __('messages.Home') }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Breadcrumb End -->

                    <!-- ====== Forms Section Start -->
                    <div
                        class="rounded-sm border w-full md:w-1/2 m-auto border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">

                            {{ $slot }}


                    </div>
                    <!-- ====== Forms Section End -->
                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
</body>

</html>

