
    @component('mail::message')
    # Congratulations, {{ $applicant->full_name }}!

    We are thrilled to inform you that your application for the **{{ $edition->title }}** edition has been approved!

    @if ($edition->overview)
        <p class="mt-4 text-gray-600">
            {!! $edition->overview !!}
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

@endcomponent

