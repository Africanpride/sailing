<div>
    @if (empty(Auth::user()->email_verified_at) )
    <!-- Announcement Banner -->
    <div x-data="{ showBanner: true }" x-show="showBanner"
        class="bg-gray-300/50 hover:bg-gray-200 p-4 text-center transition-all duration-300 dark:bg-white/[.05] dark:hover:bg-white/[.095] w-full">
        <div
            class="w-full md:max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto md:flex justify-center items-center gap-6 space-y-4 md:space-y-0">
            <div class="inline-block text-sm text-gray-800 dark:text-gray-200">
                <div>
                    Your Email Address is Not Verified.
                    <span
                        class="decoration-2 inline-flex justify-center items-center gap-x-4 font-semibold text-red-600 text-sm dark:text-red-500">
                        <a class="flex justify-start items-center gap-1 cursor-pointer " wire:click.prevent="sendEmailVerification">{{ __('Verify Email Address') }}<x-lucide-mail class="w-4 h-4" /></a>
                    </span>
                </div>
            </div>


        </div>
    </div>
    <!-- End Announcement Banner -->
@endif

</div>

