@component('mail::message')
    # Отчет:

    @foreach($report as $item)
        {{ $item }}
    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
