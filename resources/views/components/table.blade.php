@props(['showPagination'])

<div class="mt-6 border dark:border-0 overflow-hidden ">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <table class="bg-white min-w-full border-secondary-300 rounded-md dark:border-secondary-900 dark:bg-black">
                <thead>
                    {{ $tableHead }}
                </thead>
                <tbody
                    class=" divide-y divide-secondary-100 dark:divide-secondary-900 dark:bg-slate-950 dark:divide-firefly-900
                    x-max="1">
                    {{ $tableBody ?? '' }}
                </tbody>
            </table>
        </div>

        @if ($showPagination)
            <div
                class="bg-white border-secondary-200  dark:bg-gray-950 border-t dark:bg-secondary-800 dark:border-gray-900 items-center justify-between px-4 py-3 rounded-b-md sm:px-6">

                <div class="text-sm leading-5 text-secondary-900 dark:text-secondary-400">

                    {{ $pagination ?? ' ' }}

                </div>
            </div>
        @endif


    </div>
</div>
