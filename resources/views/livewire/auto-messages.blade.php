<section class="container px-4" style="width: 97%;margin:24px 0">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Auto Messages</h2>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Customize messages to send when event triggers.</p>
        </div>


    </div>


    @if ($showEvent)
        <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
            wire:click="removeEventWindow">

            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800" @click.stop>
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">{{ $activeEvent['title'] }}</h2>

                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="context">message</label>
                            <input id="context" type="text" wire:model="requestData.context"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="attachment">attachments</label>
                            <input id="attachment" type="file" wire:model="requestData.attachment"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </section>





        </div>
    @endif

    <div class="mt-6">
        <?php $events = config('salla.events')?>
        @for ($i = 0;$i<count($events);$i++)
        <?php $event = $events[$i];?>
        <div class="w-full px-8 py-4 bg-white border mb-1 rounded-lg dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <span
                        class="text-xl cursor-pointer font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200"
                        wire:click="showEventWindow({{ $i }})">{{ $event['title'] }}</span>
                    <span
                        class="px-3 py-1 mx-4 text-xs text-green-600 bg-green-100 rounded-full dark:bg-gray-800 dark:text-green-400">Active</span>
                </div>
                <div class="flex">
                    <div wire:click="active({{ $i }})"
                        class="relative w-10 h-5 transition duration-200 ease-linear rounded-full cursor-pointer bg-gray-300 dark:bg-gray-700">
                        <label for="active"
                            class="absolute left-0 w-5 h-5 mb-2 transition duration-100 ease-linear transform bg-white border-2 rounded-full cursor-pointer dark:bg-gray-100 translate-x-0 border-gray-300 dark:border-gray-700"></label><input
                            type="checkbox" name=""
                            class="hidden w-full h-full rounded-full appearance-none active:outline-none focus:outline-none">
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $event['description'] }}</p>
            </div>
        </div>
        @endfor
    </div>
</section>
