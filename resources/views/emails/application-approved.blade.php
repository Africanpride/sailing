<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {{-- {!! OpenGraph::generate() !!} --}}
    {!! Twitter::generate() !!}

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <div class="font-sans text-sm text-gray-900 dark:text-gray-100 antialiased dark:bg-blue-900 overflow-x-hidden ">
        <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
            <header class="border-b pb-10 mb-10 dark:border-gray-700">

                <x-branding />


            </header>
            <main class="mt-8 space-y-3 leading-snug text-gray-600 dark:text-gray-300">
                <h2 class="text-gray-700 dark:text-gray-200">{{ 'Dear ' . $applicant->full_name }},</h2>

                <p>
                    We are delighted to inform you that your request to be part of <span
                        class="font-bold">{{ $edition->institute->name }}</span><span
                        class="uppercase font-bold">({{ $edition->acronym }})</span> for <span
                        class="font-bold">{{ now()->format('Y') }}</span> has been approved.
                </p>


                @if ($edition->price > 0)
                    <p> {{ __('To secure your spot in the upcoming edition, a fee of ') }} <span
                            class="font-bold">${{ number_format($edition->price, 2) }} is applicable </span>.


                    </p>
                @endif
                <p>
                    {{ __('We kindly request you to visit your dashboard at your earliest convenience to complete the payment process and confirm your acceptance of this offer. ') }}
                </p>

                <x-link-button href="https://www.costrad.org/dashboard"
                    class="cursor-pointer w-auto px-6 py-2 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Access Dashboard
                </x-link-button>

                <p>
                    {{ __(' Should you have any questions or concerns, our team is here to assist you. Feel free to reach out to us at') }}
                    <span class="text-blue-600"><a href="email:info@costrad.org">info@costrad.org</a></span>,
                    {{ __('and we\'ll be happy to provide any assistance you may need.') }}.
                </p>
                <p class="mt-8 text-gray-600 dark:text-gray-300">
                    Sincerely,<br>
                    COSTrAD Secretariat
                </p>
            </main>


            <footer class="mt-8">

                <p class="mt-3 text-gray-500 dark:text-gray-400">© {{ now()->format('Y') }} <span
                        class="font-bold">College of Sustainable Transformation & Development (COSTrAD)</span>. All
                    Rights
                    Reserved.</p>
                <br>
                <p class="text-xs text-justify">
                    This message (including any attachments) may contain confidential, proprietary, privileged and/or
                    private information. The information is intended to be for the use of the individual or entity
                    designated above. If you are not the intended recipient of this message, please notify the sender
                    immediately, and delete the message and any attachments. Any disclosure, reproduction, distribution
                    or other use of this message or any attachments by an individual or entity other than the intended
                    recipient is prohibited.
                </p>
            </footer>
        </section>

    </div>

</body>

</html>

{{-- @component('mail::message')
    # Congratulations, {{ $applicant->full_name }}!

    We are thrilled to inform you that your application for the **{{ $edition->title }}** edition has been approved!

    @if ($edition->overview)
        <p class="mt-4 text-gray-600">
            {{ $edition->overview }}
        </p>
    @endif

    @if ($edition->price > 0)
        <p class="mt-4 text-gray-600">
            The fee for this edition is ${{ number_format($edition->price, 2) }}. Please visit your dashboard to complete the payment and secure your spot.
        </p>
    @endif

    @component('mail::button', ['url' => url('/dashboard')])
        Visit Dashboard
    @endcomponent

    Thank you for your interest in our program. We look forward to seeing you there!

    Sincerely,<br>
    The {{ config('app.name') }} Secretariat.

@endcomponent --}}
