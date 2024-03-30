<div class="flex  items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4  ">
    <div x-data="{ openMenu: false }">
        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" @click="openMenu = ! openMenu"
            class="inline-flex items-center text-gray-500 border border-gray-300  focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
            <span class="sr-only">Action button</span>
            صنف حسب: 
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

     
        <!-- Dropdown menu -->
        <div x-show="openMenu" id="dropdownAction"
            class="z-10 absolute bg-white divide-y divide-gray-100 rounded-lg shadow w-44  ">
            <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownActionButton">
                @foreach ($filterFiled as $item)
                <li>
                    <a  href="{{ url()->current() }}?filed={{$item['name']}}&orderType={{$item['orderType']}}&value={{$item['value']}}" 
                        class="block px-4 py-2 hover:bg-gray-100  ">
                        {{$item['lable']}}
                    </a>
                </li>
                @endforeach
            </ul>
       
        </div>
    </div>
    <label for="table-search" class="sr-only">بحث</label>
    <form method="GET" action="{{ url()->current() }}"  class="relative ">
        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="text" 
        name="search"
        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " 
        placeholder="بحث">
        <div class="absolute !left-0 inset-y-0   flex items-center ps-3 ">

        <button class="  inline-flex items-center text-gray-500 border border-gray-300  focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-l-lg text-sm px-3 py-2" >بحث</button>
        </div>
    </form>
</div>