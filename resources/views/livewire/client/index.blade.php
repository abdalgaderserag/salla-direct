<section class="container px-4" style="width: 97%;margin:24px 0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Customers</h2>

                <span
                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ count(Session::get('selected_clients', [])) }}
                    customer selected</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">These are all the customers that are aligable to
                send campaigns to.</p>
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


            <button wire:click="showCampForm"
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>Create Campaign</span>
            </button>

            <button
                class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span wire:click="addClient">Add Customer</span>
            </button>
        </div>
    </div>
    @if ($showClientWindow)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
            wire:click="removeClient">

            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800" @click.stop>
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>

                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="first_name">First Name</label>
                            <input id="first_name" type="text" wire:model="requestData.first_name"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="last_name">Last Name</label>
                            <input id="last_name" type="text" wire:model="requestData.last_name"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Email Address</label>
                            <input id="emailAddress" type="email" wire:model="requestData.email"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label for="Birthday"
                                class="block text-sm text-gray-500 dark:text-gray-300">Birthday</label>
                            <input type="date" wire:model="requestData.birthday"
                                class="block mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
                        </div>

                        <div>
                            <label for="gender" class="block text-sm text-gray-500 dark:text-gray-300">Gender</label>
                            <select id="gender" wire:model="requestData.gender"
                                class="block mt-2 w-full rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div><br>

                        <div>
                            <label for="code" class="block text-sm text-gray-500 dark:text-gray-300">Code</label>
                            <select id="code" wire:model="requestData.code"
                                class="block mt-2 w-full rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">
                                <option value="">Select Counter Code</option>
                                <option value="+249">+249</option>
                                <option value="+80">+80</option>
                                <option value="+1">+1</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="phone">Phone Number</label>
                            <input id="phone" type="tel" wire:model="requestData.phone"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </section>





        </div>
    @endif





    @if ($campForm)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
            wire:click="hideCampForm">

            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800" @click.stop>
                <span class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create Campaign</span>
                <span
                    class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{ count(Session::get('selected_clients', [])) }}
                    customer selected</span>

                <form wire:submit.prevent="saveCamp">
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="name">Campaign Name</label>
                            <input id="name" type="text" wire:model="campData.name"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="first_name">time between
                                messages</label>
                            <input id="first_name" type="range" min="40" max="120"
                                wire:model="campData.time"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                    </div>

                    <div class="flex justify-end mt-6">
                        <button
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </section>





        </div>
    @endif


    <div class="mt-6 md:flex md:items-center md:justify-between">
        {{-- <div
            class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <button
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                Customers
            </button>
            <button
                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                Groups
            </button>

        </div> --}}
        <div class="inline-flex overflow-hidden">
            <select wire:model.live='group' id="groups"
                class="block mt-2 pr-8 w-full rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">
                <option value="">All Customers</option>
                @forelse ($groups as $g)
                    <option value="{{ $g->group }}">{{ $g->name }}</option>
                @empty
                @endforelse
            </select>
        </div>


        <div class="relative flex items-center mt-4 md:mt-0">
            <span class="absolute">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>

            <input type="text" wire:model.live.debounce.250ms="search" placeholder="Search"
                class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
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
                                            <span>Name</span>
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
                                            <span>Groups</span>
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
                                            <span>Infos</span>
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
                                            <span>City</span>
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
                                            <span>Register At</span>
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
                                                {{ in_array($client->id, $selectedClientIds) ? 'checked' : '' }}
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
                <h1 class="mt-3 text-lg text-gray-800 dark:text-white">No Customer found</h1>

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
                        <p class="mt-2 text-gray-500 dark:text-gray-400">there is no customers at the moment. Please
                            try again later or create a new customer.</p>
                        <div class="flex items-center mt-4 sm:mx-auto gap-x-3">
                @endif

                <button
                    class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <span wire:click="addClient">Add Customer</span>
                </button>
            </div>
        </div>
        </div>

    </section>
    @endif
</section>
