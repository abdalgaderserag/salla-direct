<section class="container px-4" style="width: 97%;margin:24px 0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Banned customers</h2>

                <span
                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $this->clients->count() }}
                    customers</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These are all the customers that will not receive
                your messages.</p>
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

                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search"
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
@if ($this->clients->count() > 0)

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 px-4 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button wire:click="sortBy('username')"
                                        class="flex items-center gap-x-3 focus:outline-none">
                                        <span>{{ __('views.list.table.head.name') }}</span>
                                        @if ($sort !== 'username')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif ($sortDir === 'ASC')
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        @endif

                                    </button>
                                </th>
                                <th scope="col"
                                    class="px-12 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 cursor-pointer">
                                    <button wire:click="sortBy('groups')"
                                        class="flex items-center gap-x-3 focus:outline-none">
                                        <span>{{ __('views.list.table.head.groups') }}</span>
                                        @if ($sort !== 'groups')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif ($sortDir === 'ASC')
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        @endif
                                    </button>
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 cursor-pointer">
                                    <button wire:click="sortBy('email')"
                                        class="flex items-center gap-x-3 focus:outline-none">
                                        <span>{{ __('views.list.table.head.info') }}</span>
                                        @if ($sort !== 'email')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif ($sortDir === 'ASC')
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        @endif
                                    </button>
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 cursor-pointer">
                                    <button wire:click="sortBy('city')"
                                        class="flex items-center gap-x-3 focus:outline-none">
                                        <span>{{ __('views.list.table.head.city') }}</span>
                                        @if ($sort !== 'city')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif ($sortDir === 'ASC')
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        @endif
                                    </button>
                                </th>
                                <th scope="col"
                                    class="px-4 py-3.5 w-1/6 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400 cursor-pointer">
                                    <button wire:click="sortBy('register_date')"
                                        class="flex items-center gap-x-3 focus:outline-none">
                                        <span>{{ __('views.list.table.head.register') }}</span>
                                        @if ($sort !== 'register_date')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        @elseif ($sortDir === 'ASC')
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        @endif
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            @forelse ($this->clients as $client)
                                <tr>

                                    <td
                                        class="px-4 py-4 text-sm font-medium whitespace-nowrap overflow-hidden text-ellipsis">
                                        <input wire:click="toggleClient({{ $client->id }})" type="checkbox"
                                            id="{{ $client->id }}"
                                            {{ in_array($client->id, $selectedBanClientIds) ? 'checked' : '' }}
                                            class="form-checkbox mx-2 h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                                        <label for="{{ $client->id }}"
                                            class="font-medium text-gray-800 dark:text-white cursor-pointer">{{ $client->username }}
                                        </label>
                                    </td>
                                    <td
                                        class="px-12 py-4 text-sm font-medium whitespace-nowrap overflow-hidden text-ellipsis">
                                    @empty($client->groups)
                                        <span class="px-1 py-1 text-xs dark:text-gray-100">not in group</span>
                                    @else
                                        @foreach ($client->groups as $g)
                                            <span
                                                class="px-3 py-1 text-xs text-red-600 bg-red-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ $g }}</span>
                                        @endforeach
                            @endif
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
                                    {{ \Carbon\Carbon::parse($client->created_at)->diffForHumans() }}</p>
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

    <div class="mt-6">
        {{ $this->clients->links() }}
    </div>
@else
<section class="container px-4 mx-auto">
    <div class="flex items-center mt-6 text-center border rounded-lg h-96 dark:border-gray-700">
        <div class="flex flex-col w-full max-w-sm px-4 mx-auto">
            <div class="p-3 mx-auto text-blue-500 bg-blue-100 rounded-full dark:bg-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
            <h1 class="mt-3 text-lg text-gray-800 dark:text-white">No Banned Customer</h1>

            @if ($search !== '')
                <p class="mt-2 text-gray-500 dark:text-gray-400">Your search “{{ $search }}” did not match
                    any customers. Please
                    try again or create add a new customer.</p>
                <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
                    <button wire:click="clearSearch"
                        class="w-1/2 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
                        Clear Search
                    </button>
                @else
                    <p class="mt-2 text-gray-500 dark:text-gray-400">looks like there is no banned customer added yet.</p>
                    <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
            @endif

            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600 dark:hover:bg-red-500 dark:bg-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span wire:click="addClient">Ban Customer</span>
            </button>
        </div>
    </div>
    </div>

</section>
@endif

</section>
