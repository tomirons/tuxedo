@component('mail::message')

@component('mail::alert.box', ['type' => $type])
{{ $text }}
@endcomponent

# {{ $greeting }}

@foreach($outroLines as $line)
{{ $line }}
@endforeach

Regards, <br>
{{ config('app.name') }}

@endcomponent