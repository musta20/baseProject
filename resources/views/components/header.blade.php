<div class="bg-slate-800 h-12 text-sm text-slate-200  justify-between items-center hidden lg:flex px-10">
    <div class="flex items-center gap-2 ">
        <a href="mailto:nnan@nodf.com" class="flex items-center gap-2 hover:text-sky-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
            </svg>

           {{ $setting->email }}
        </a>
        <a href="#" class="flex items-center gap-2 hover:text-sky-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            {{ $setting->adress }}
        </a>
    </div>


    <a href="#" class="btn">حجز موعد</a>
</div>
<header class="bg-slate-100  py-3 flex h-20 ">

    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
          <div class="flex items-center mb-8">

            <button class="navbar-close">
              <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>

          </div>
          <div>
            <ul class="flex flex-col place-items-center gap-4 text-primary-light font-Ibm text-md">
              <li class="hover:text-primary hover:border-b-4 my-auto p-3.5">
                <a href="#">الصفحة الرئيسية</a>
              </li>
              <li class="hover:text-primary hover:border-b-4 my-auto p-3.5">
                <a href="#">من نحن</a>
              </li>
              <li class="hover:text-primary hover:border-b-4 my-auto p-3.5">
                <a href="#">تواصل</a>
              </li>
              <li class="hover:text-primary hover:border-b-4 my-auto p-3.5">
                <a href="#">المدونة</a>
              </li>
              <li class="hover:text-primary hover:border-b-4 my-auto p-3.5">
                <a href="#">خدماتنا</a>
              </li>
              <li class="hover:text-primary hover:border-b-4 my-auto p-3.5">
                <a href="#">التوظيف</a>
              </li>
            </ul>
          </div>
          <div class="mt-auto">
            <div class="pt-6">
              <a class="block px-4 py-3 mb-3  text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="#">تسجيل الدخول</a>
              <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center bg-primary-light text-white  rounded-xl" href="#">انشاء حساب</a>
            </div>
            <p class="my-4 text-xs text-center text-gray-400">

              <span>جميع الحقوق محفوظ © 2021</span>
            </p>
          </div>
        </nav>
      </div>
    <div class="flex justify-center items-center w-5/6 md:w-2/6 ">
        <div class="flex items-center w-full text-gray-900 gap-2">
            <div class="relative flex border-x  border-b border-slate-20 rounded-sm" data-twe-input-wrapper-init
                data-twe-input-group-ref>
                <input type="search"
                    class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-slate-900 dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                    placeholder="Search" aria-label="Search" id="search-input" aria-describedby="search-button" />
                <label for="search-input"
                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">بحث
                </label>
                <button
                    class="relative z-[2] -ms-0.5 flex items-center rounded-e bg-primary px-5  text-xs font-medium uppercase leading-normal text-slate-800 shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                    type="button" id="search-button" title="search">
                    <span class="[&>svg]:h-5 [&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" fill="#000" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>
                </button>
            </div>

        </div>

    </div>

    <div class="flex justify-center items-center md:w-2/6  ">
        <a class="w-1/6    " href="/"><img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" ></a>
    </div>

    <div class="lg:w-2/6  ">


    <ul class="lg:flex hidden justify-center items-center ">
        <li class=" py-2">
            <a class="px-2 hover:text-slate-300" href="{{ route('checkStatus') }}">الإستعلام</a>
        </li>
        <li class=" py-2">
            <a class="px-2 hover:text-slate-300"  href="{{ route('category') }}">الخدمات</a>
        </li>
        <li class=" py-2">
            <a class="px-2 hover:text-slate-300" href="{{ route('contact') }}">تواصل معنا</a>
        </li>
        <li class=" py-2">
            <a class="px-2 hover:text-slate-300" href="{{ route('term') }}">الشروط و الاحكام </a>
        </li>
        <li class="py-2 ">
            <a class="px-2 hover:text-slate-300" href="{{ route('jobs') }}">الوظائف</a>
        </li>

    </ul>
    <div class="lg:hidden  place-items-start ">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
          <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>

      </div>
    </div>

    <script>
        // Burger menus
        document.addEventListener('DOMContentLoaded', function() {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }
        });
        </script>
</header>