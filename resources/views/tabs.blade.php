<x-app-layout>


    <x-backend-page-header modelName="Documentation" description="Application Documentation" add-button="false"
        class="mx-4">
        <x-heroicon-o-question-mark-circle class="w-6 h-6 text-current" />
    </x-backend-page-header>

    <div class="p-8">

        <div class="text-center w-auto py-5">
            <x-button type="button" class="" data-hs-overlay="#hs-subscription-with-image">
                <span class="capitalize"> {{ __('Enroll for ') }}</span><span
                    class="uppercase">{{ $institute->acronym }}</span>
            </x-button>

        </div>
        <div id="hs-subscription-with-image"
            class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
            <div
                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="relative flex flex-col bg-white shadow-lg rounded-xl dark:bg-gray-950">
                    <div class="absolute bg-gray-900/50 right-2 rounded-full top-2 z-[10]">
                        <button type="button"
                            class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 rounded-md  text-white hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-white transition-all text-sm dark:focus:ring-gray-700 dark:focus:ring-offset-gray-800"
                            data-hs-overlay="#hs-subscription-with-image">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                    fill="currentColor" />
                            </svg>
                        </button>
                    </div>

                    <div class="aspect-w-16 aspect-h-8 relative">
                        <div class="absolute bottom-0 left-0 right-0 top-0 grid place-items-center">
                            <img class="inline-block h-[6.975rem] w-[6.975rem] rounded-full ring-2 ring-white dark:ring-gray-800"
                                src="{{ $institute->institute_logo }}" alt="{{ $institute->name }}">
                        </div>
                        <img class="w-full object-cover rounded-t-xl h-52" src="{{ $institute->featured_image }}"
                            alt="{{ $institute->name }}">
                    </div>

                    <form method="POST" action="#" accept-charset="UTF-8" class="form-horizontal d-none"
                        role="form">
                        <input type="hidden" name="institute" value="{{ $institute->acronym }}">
                        <input type="hidden" name="institute_id" value="{{ $institute->id }}">
                        @csrf

                        <div class="p-4 sm:p-8 text-center overflow-y-auto space-y-4">
                            <h3 class="mb-2 text-2xl font-bold text-gray-800 dark:text-gray-200 uppercase">
                                <span class="px-2">{{ $institute->acronym }} {{ now()->format('Y') }}</span> 🎉
                            </h3>
                            <div>
                                <fieldset class="grid grid-cols-2 gap-4">

                                    <div>
                                        <input type="radio" name="paymentoption" value="fullPayment" id="fullPayment"
                                            class="peer hidden [&:checked_+_label_svg]:block" checked />

                                        <label for="fullPayment"
                                            class="block cursor-pointer rounded-lg border border-gray-200 dark:border-gray-700/50 bg-white dark:bg-gray-950 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                                            <div class="flex items-center justify-between">
                                                <p class="text-gray-700 dark:text-white text-lg">Full Payment</p>

                                                <svg class="hidden h-5 w-5 text-blue-600"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <p class="mt-1 text-left text-firefly-500">{{ '$' . $institute->price }}
                                            </p>
                                        </label>
                                    </div>

                                    <div>
                                        <input type="radio" name="paymentoption" value="partPayment" id="partPayment"
                                            class="peer hidden [&:checked_+_label_svg]:block" />

                                        <label for="partPayment"
                                            class="block cursor-pointer rounded-lg border border-gray-200 dark:border-gray-700/50 bg-white dark:bg-gray-950 p-4 text-sm font-medium shadow-sm hover:border-gray-200 peer-checked:border-blue-500 peer-checked:ring-1 peer-checked:ring-blue-500">
                                            <div class="flex items-center justify-between">
                                                <p class="text-gray-700 dark:text-white text-lg">Part Payment</p>

                                                <svg class="hidden h-5 w-5 text-blue-600"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <p class="mt-1 text-firefly-500 text-left">
                                                {{ __('Pay in 3 Installments.') }}
                                            </p>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                            <p class="text-gray-500 text-sm text-left">
                                {!! __(
                                    'By clicking enroll, you agree to abide by our <a href="/terms" class="capitalize text-firefly-500 font-bold" target="_blank">terms and conditions</a>. An invoice would be made available to you in <span class=" text-yellow-600 font-bold">Ghana Cedis</span> equivalent. Thank you.',
                                ) !!}
                            </p>


                            <div class="mt-6 grid grid-cols-1 gap-3">
                                <x-button type="submit" class="w-full">
                                    Proceed To Payment
                                </x-button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
