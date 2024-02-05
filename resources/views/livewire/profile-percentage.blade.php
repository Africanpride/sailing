<div>
    @if ($this->calculateProfileCompletionPercentage() < 95)
    <!-- Announcement Banner -->
    <div x-data="{ showBanner: true }" x-show="showBanner"
        class="bg-gray-200/50 hover:bg-gray-200 p-4 text-center transition-all duration-300 dark:bg-white/[.05] dark:hover:bg-white/[.095] w-full">
        <div
            class="w-full md:max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto md:flex justify-center items-center gap-6 space-y-4 md:space-y-0">
            <div class="inline-block text-sm text-gray-800 dark:text-gray-200">
                <div>
                   Profile Details Incomplete.
                    <span
                        class="decoration-2 inline-flex justify-center items-center gap-x-4 font-semibold text-red-600 text-sm dark:text-red-500">
                        <a class="flex justify-start items-center gap-1 hover:text-red-400" href="{{ route('profile.show') }}">{{ __('Complete Profile') }}<x-lucide-arrow-right class="w-4 h-4" /></a>
                    </span>
                </div>
            </div>

            <div class="flex md:w-1/4 w-full h-1.5 bg-red-200 rounded-full overflow-hidden dark:bg-red-200/30">
                <div class="flex flex-col justify-center overflow-hidden bg-red-500" role="progressbar"
                    style="width: {{ number_format($this->calculateProfileCompletionPercentage(Auth::user()?->profile->id), 2) }}%" aria-valuenow="{{ number_format($this->calculateProfileCompletionPercentage(Auth::user()?->profile->id), 2) }}" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <div class="font-bold text-xs dark:text-white">
                {{ number_format($this->calculateProfileCompletionPercentage(Auth::user()?->profile->id), 2) }}%
            </div>
        </div>
    </div>
    <!-- End Announcement Banner -->
@endif

</div>
