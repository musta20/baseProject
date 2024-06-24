<nav class="flex justify-between max-h-16 bg-slate-200 rounded-md py-3 border-t border-gray-400 px-3 m-2">
    <div class="flex gap-2">
        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = ! open" type="button"
                class="inline-flex items-center w-full justify-center gap-x-1.5 rounded-md text-sm font-semibold text-gray-900"
                id="menu-button" aria-expanded="true" aria-haspopup="true">

                <span class="py-1 ">
                    @if (auth()->user()->img)
                    <img src="{{ url('storage/' . auth()->user()->img) }}" alt="user-image" class="rounded-circle">
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>


                    @endif

                </span>
                <span>
                    <span class="account-user-name"> {{ auth()->user()->name }}</span>
                    <span class="account-position">{{ __(auth()->user()->getRoleNames()[0]) }}</span>
                </span>


                <svg :class="{ 'rotate-90': open }" class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <div x-cloak x-show="open" x-transition
                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="{{ route('admin.Users.edit', auth()->user()->id) }}" class="text-gray-700
                    hover:bg-slate-100
                    block px-4 py-2 text-sm

                    flex gap-2" role="menuitem" tabindex="-1" id="menu-item-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span class="py-1"> الصفحة الشخصية
                        </span>
                    </a>
                    <hr>
                    <a href="{{ url('/logout') }}" class="text-gray-700
                    hover:bg-slate-100
                    block px-4 py-2 text-sm

                    flex gap-2" role="menuitem" tabindex="-1" id="menu-item-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                        </svg>


                        <span class="py-1">
                            تسجيل خروج
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div x-data="{ open: false }" class="relative inline-block text-left">
            <button @click="open = ! open" class="py-1 px-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-400 hover:text-gray-800 h-6 w-6"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
                @if (getNotif()['all'] > 0)
                <div class="absolute inline-flex items-center justify-center  w-4 h-4 p-1 text-xs
                text-white bg-red-500 rounded-full -top-0 end-4 dark:border-gray-900">{{ getNotif()['all'] }}</div>

                @endif

            </button>
            <div x-cloak x-show="open" x-transition
                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">

                <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="text-gray-500    block px-4 py-2 text-xs  flex gap-2"
                        role="menuitem" tabindex="-1" id="menu-item-0">
                        <span class="py-1">
                            التنبيهات {{ getNotif()['all'] }}
                        </span>
                    </a>
                    <hr>
                    <h5 class="text-gray-600   block px-4 py-2 text-md  flex gap-2">المهام</h5>
                    @if (getNotif()['task']->isEmpty())
                    <span class="text-sm block px-4 py-2 text-md  flex gap-2 "> لا يوجد</span>
                    @endif
                    @foreach (getNotif()['task'] as $item)
                    <a href="{{ route('admin.admin.MainTask') }}"
                        class="text-gray-800   hover:bg-slate-100  block px-4 py-2 text-sm  flex gap-2">
                        <div class="flex justify-between gap-1 w-full">
                            <h5 class="">
                                {{ $item->title }}
                            </h5>
                            <small class="noti-item-subtitle text-muted">{{ $item->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </a>
                    @endforeach

                    <hr>
                    <h5 class="text-gray-600   block px-4 py-2 text-md  flex gap-2">الرسائل</h5>
                    @if (getNotif()['msg']->isEmpty())
                    <span class="text-sm block px-4 py-2 text-md  flex gap-2 "> لا يوجد</span>
                    @endif
                    @foreach (getNotif()['msg'] as $item)
                    <a href="{{ url('/admin/inbox/2') }}"
                        class="text-gray-800   hover:bg-slate-100  block px-4 py-2 text-sm  flex gap-2">
                        <div class="flex justify-between gap-1 w-full">
                            <h5 class="">
                                {{ $item->title }}
                            </h5>
                            <small class="noti-item-subtitle text-muted">{{ $item->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="py-1 px-1 hidden" dir="ltr">
            <label for="two">
                <input id="two" type="checkbox" checked />
            </label>
        </div>
    </div>
    <form
    method="POST"
    action="{{ route('admin.search') }}"
    class="relative hidden bg-gray-50 border-1 rounded-sm border-sate-400 text-gray-500 flex">
        @csrf
        <input type="search"
            class="relative m-0 block flex-auto rounded border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary"
            placeholder="Search" aria-label="Search" id="exampleFormControlInput2" aria-describedby="button-addon2" />
            <input type="text" name="type" value="1" class="hidden">
        <button
            class="flex items-center whitespace-nowrap px-3 py-[0.25rem] text-surface dark:border-neutral-400 dark:text-white [&>svg]:h-5 [&>svg]:w-5"
            id="button-addon2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-gray-500"
                stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
    </form>
</nav>