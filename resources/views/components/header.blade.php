<div class="bg-slate-800 h-12 text-sm text-slate-200 flex justify-between items-center px-10">
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
<header class="bg-slate-100 py-3 flex h-20 ">
    <div class="flex justify-center items-center w-2/6 ">
        <div class="flex items-center  text-gray-900 gap-2">

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
                    type="button" id="search-button" data-twe-ripple-init data-twe-ripple-color="light">
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

    <div class="flex justify-center items-center w-2/6 ">
        <a class="w-1/6  " href="/"><img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" ></a>
    </div>
    <ul class="flex justify-center items-center w-2/6">
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


</header>