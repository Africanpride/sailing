<div style="background-image: url('{{  asset('/images/main/profile_banner.svg') }}');background-repeat: repeat-y;background-position-x: right;background-size: auto;background-position-y: center;/* background-origin: content-box; */;

"
    {{ $attributes->merge([
        'class' => 'overflow-hidden relative  dark:text-firefly-50
        flex items-center justify-between my-5 bg-[#0E2A47]
        p-10 md:p-14 shadow rounded-lg bg-repeat-y bg-cover bg-repeat',
    ]) }}>

    <div class="flex  items-center z-10 tracking-wider	 ">
        <div class="text-firefly-100 font-extrabold leading-5 text-md md:text-xl  w-3/5  ">{!! $description ?? ' ' !!} </div>
        <div class="h-7 border border-l  border-firefly-200  mx-4 hidden"></div>
        <div class=" flex-nowrap hidden  ">
            <div class="h-12 w-12 ">
                <img class="object-cover w-full h-full rounded-full "
                    src="https://ui-avatars.com/api/?name={{ Auth::user()->full_name ?? 'AP' }}">
            </div>
        </div>
    </div>

    @if (isset($action))
        <h2
            class="text-xl font-bold md:text-[15px]
inline-flex items-center gap-1.5 py-3 px-6  rounded-full  sm:text-sm bg-gray-200/50
 text-gray-800 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-800 dark:text-gray-200 mx-2">
            {{ $action ?? ' ' }}
        </h2>
    @else
        {{ $action ?? ' ' }}
    @endif

    <div class=" flex justify-between items-center">
        <span
            class="flex items-center gap-2 py-1.5 px-4 rounded-full text-xs font-medium
         bg-firefly-200 text-gray-800 dark:bg-black dark:text-white uppercase  tracking-wider ">
            {{ $slot ?? ' ' }}
            {{ $modelName ?? ' ' }}
        </span>
    </div>

</div>
