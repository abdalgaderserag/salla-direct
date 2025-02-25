<section class="container px-4" style="width: 97%;margin:24px 0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Banned customers</h2>

                <span
                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $clients->count() }}
                    customers</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These are all the customers that are aligable to send campaigns to.</p>
        </div>

        <div class="flex items-center mt-4 gap-x-3">
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

            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600 dark:hover:bg-red-500 dark:bg-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>ban customer</span>
            </button>
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



