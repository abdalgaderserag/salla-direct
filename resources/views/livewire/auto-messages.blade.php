<section class="container px-4" style="width: 97%;margin:24px 0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Auto Messages</h2>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Customize messages to send when event triggers.</p>
        </div>


    </div>

    <div class="mt-6">
        <?php $tests = [1,2,3,4,5]?>
        @foreach ($tests as $test)
        <div class="w-full px-8 py-4 bg-white border mb-1 rounded-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <span
                        class="text-xl cursor-pointer font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline"
                        tabindex="0" role="link">Accessibility tools for designers and developers</span>
                    <span
                        class=" cursor-pointer px-3 py-1 mx-4 text-xs text-green-600 bg-green-100 rounded-full dark:bg-gray-800 dark:text-green-400">Active</span>
                </div>
                <div class="flex">
                    <div wire:click="active"
                        class="relative w-10 h-5 transition duration-200 ease-linear rounded-full cursor-pointer bg-gray-300 dark:bg-gray-700">
                        <label for="active"
                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer dark:bg-gray-100 translate-x-0 border-gray-300 dark:border-gray-700"></label><input
                            type="checkbox" name=""
                            class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none">
                    </div>
                    {{-- <div
                        class="relative w-10 h-5 transition duration-200 ease-linear rounded-full cursor-pointer bg-blue-500">
                        <label for="rtl"
                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer dark:bg-gray-100 translate-x-full border-blue-500 dark:border-blue-500"></label><input
                            type="checkbox" name="rtl"
                            class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none">
                    </div> --}}
                </div>
            </div>
            <div class="mt-2">
                <p class="mt-2 text-gray-600 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing
                    elit. Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                    reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
