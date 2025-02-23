<section class="container px-4" style="width: 97%;margin:24px 0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Customers</h2>

                <span
                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $clients->count() }}
                    clients</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These companies have purchased in the last 12
                months.</p>
        </div>

        <div class="flex items-center mt-4 gap-x-3">
            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_3098_154395)">
                        <path
                            d="M13.3333 13.3332L9.99997 9.9999M9.99997 9.9999L6.66663 13.3332M9.99997 9.9999V17.4999M16.9916 15.3249C17.8044 14.8818 18.4465 14.1806 18.8165 13.3321C19.1866 12.4835 19.2635 11.5359 19.0351 10.6388C18.8068 9.7417 18.2862 8.94616 17.5555 8.37778C16.8248 7.80939 15.9257 7.50052 15 7.4999H13.95C13.6977 6.52427 13.2276 5.61852 12.5749 4.85073C11.9222 4.08295 11.104 3.47311 10.1817 3.06708C9.25943 2.66104 8.25709 2.46937 7.25006 2.50647C6.24304 2.54358 5.25752 2.80849 4.36761 3.28129C3.47771 3.7541 2.70656 4.42249 2.11215 5.23622C1.51774 6.04996 1.11554 6.98785 0.935783 7.9794C0.756025 8.97095 0.803388 9.99035 1.07431 10.961C1.34523 11.9316 1.83267 12.8281 2.49997 13.5832"
                            stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_3098_154395">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>

                <span>Export</span>
            </button>

            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>Add customer</span>
            </button>
        </div>
    </div>

    <div class="mt-6 md:flex md:items-center md:justify-between">
        <div
            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                customers
            </button>

            <button
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Banned
            </button>

            <button
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                All
            </button>

        </div>

        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" placeholder="Search"
                class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
        </div>
    </div>



    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-2 w-10 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <input type="checkbox"
                                        class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                </th>
                                <th scope="col"
                                    class="py-3.5 px-4 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Name</span>
                                    </button>
                                </th>
                                <th scope="col"
                                    class="px-12 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Groups</th>
                                <th scope="col"
                                    class="px-4 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Info</th>
                                <th scope="col"
                                    class="px-4 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    City</th>
                                <th scope="col"
                                    class="px-4 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Register at</th>
                                <th scope="col" class="relative py-3.5 px-4 w-1/6"><span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @forelse ($clients as $client)
                                <tr>
                                    <td class="px-2 py-4 text-sm font-medium whitespace-nowrap">
                                        <input type="checkbox"
                                            class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    </td>
                                    <td
                                        class="px-4 py-4 text-sm font-medium whitespace-nowrap overflow-hidden text-ellipsis">
                                        <h2 class="font-medium text-gray-800 dark:text-white">{{ $client->username }}
                                        </h2>
                                    </td>
                                    <td
                                        class="px-12 py-4 text-sm font-medium whitespace-nowrap overflow-hidden text-ellipsis">
                                        {{-- <span class="px-3 py-1 text-xs text-yellow-600 bg-yellow-100 rounded-full dark:bg-gray-800 dark:text-blue-400">long-term</span> --}}
                                        {{-- <span class="px-3 py-1 text-xs text-red-600 bg-red-100 rounded-full dark:bg-gray-800 dark:text-blue-400">Prepaid</span> --}}
                                        {{-- @forelse ($client->groups as $g)
                                            <span
                                                class="px-3 py-1 text-xs text-red-600 bg-red-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $g }}</span>
                                        @empty
                                        @endforelse
                                        <span class="px-1 py-1 text-xs dark:bg-gray-800 dark:text-blue-400">+2</span> --}}
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                        <h4 class="text-gray-800 font-medium dark:text-gray-200">{{ $client->email }}
                                        </h4>
                                        <p class="text-sm font-normal text-gray-600 dark:text-gray-400">
                                            {{ $client->phone }}</p>
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                        <h4 class="text-gray-700 dark:text-gray-200">{{ $client->city }}</h4>
                                    </td>
                                    <td class="px-4 py-4 text-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                            {{ $client->created_at }}</p>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
        <div class="text-sm text-gray-500 dark:text-gray-400">
            Page <span class="font-medium text-gray-700 dark:text-gray-100">1 of 10</span>
        </div>

        <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
            <a href="#"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                </svg>

                <span>
                    previous
                </span>
            </a>

            <a href="#"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                <span>
                    Next
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
