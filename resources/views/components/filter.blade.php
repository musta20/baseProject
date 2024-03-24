<div dir="ltr" class="py-4 px-3 pb-0">
    <div class="md:flex items-center">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <script src="https://cdn.tailwindcss.com"></script>

        <div class="flex-1">
            <div class="relative text-left mb-4">
                <label class="block">

                </label>
                <input
                    class="appearance-none w-full bg-white border-gray-300 hover:border-gray-500 px-3 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:border-2 border"
                    type="text" name="" placeholder="Search" autocomplete="off" wire:model="search">
                <div class="absolute right-0 top-0 mt-2 mr-4 text-purple-lighter">
                    <a wire:click.prevent="clearSearch" href="#" class="text-gray-400 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search w-4">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        

        <div class="flex space-x-1 flex-1 justify-end items-center mb-4">
            <span class="animate-spin mb-0" wire:loading="wire:loading">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-loader  text-gray-500">
                    <line x1="12" y1="2" x2="12" y2="6"></line>
                    <line x1="12" y1="18" x2="12" y2="22"></line>
                    <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                    <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                    <line x1="2" y1="12" x2="6" y2="12"></line>
                    <line x1="18" y1="12" x2="22" y2="12"></line>
                    <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                    <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                </svg>
            </span>

            <div>
                <div class="flex space-x-1">

                </div>
            </div>




            <div>
                <div class="relative" x-data="{ open: false }">
                    <span @click="open = true" class="cursor-pointer">
                        <button
                            class="border border-transparent hover:border-gray-300 focus:border-gray-300 focus:outline-none flex items-center gap-1 text-xs px-3 py-2 rounded hover:shadow-sm font-medium">
                            Filters
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down w-4 h-4">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </span>

                    <div class="bg-white shadow-lg rounded absolute top-8 right-0 border text-left z-10  w-64"
                        x-show.transition="open" @click.away="open = false" style="display: none;">
                        <div
                            class="border-b border-t border-gray-200 bg-gray-100 text-xs font-semibold uppercase text-left px-4 py-2">
                            Users Active Filter
                        </div>
                        <div class="px-4 mt-4">

                            <div class="text-left mb-4">
                                <div class="inline-block relative w-full">
                                    <select
                                        class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none"
                                        wire:model="filters.users-active-filter" name="filters[users-active-filter]">
                                        <option value="">
                                            --
                                        </option>
                                        <option value="1">
                                            Yes
                                        </option>
                                        <option value="0">
                                            No
                                        </option>
                                    </select>


                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-down w-4 h-4">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="border-b border-t border-gray-200 bg-gray-100 text-xs font-semibold uppercase text-left px-4 py-2">
                            Users Type Filter
                        </div>
                        <div class="px-4 mt-4">

                            <div class="text-left mb-4">
                                <label for="checkbox-users-type-filter-admin" class="block">
                                    <input wire:model="filters.users-type-filter.admin"
                                        id="checkbox-users-type-filter-admin" type="checkbox"
                                        name="filters[users-type-filter][admin]" class="mr-2">
                                    Admin
                                </label>
                                <label for="checkbox-users-type-filter-writer" class="block">
                                    <input wire:model="filters.users-type-filter.writer"
                                        id="checkbox-users-type-filter-writer" type="checkbox"
                                        name="filters[users-type-filter][writer]" class="mr-2">
                                    Writer
                                </label>
                                <label for="checkbox-users-type-filter-viewer" class="block">
                                    <input wire:model="filters.users-type-filter.viewer"
                                        id="checkbox-users-type-filter-viewer" type="checkbox"
                                        name="filters[users-type-filter][viewer]" class="mr-2">
                                    Viewer
                                </label>
                            </div>
                        </div>

                        <div
                            class="border-b border-t border-gray-200 bg-gray-100 text-xs font-semibold uppercase text-left px-4 py-2">
                            Users Created At Filter
                        </div>
                        <div class="px-4 mt-4">

                            <div class="text-left mb-4">

                                <input value="" id="users-created-at-filter"
                                    wire:model="filters.users-created-at-filter" x-data="{ picker: null }"
                                    x-ref="users-created-at-filter"
                                    x-init="picker = new Pikaday({ field: $refs['users-created-at-filter'], format: 'YYYY-MM-DD', onSelect: () => $dispatch('input', picker.toString('YYYY-MM-DD')) })"
                                    class="block appearance-none w-full bg-white border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-600 focus:border-2 border"
                                    type="text" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>