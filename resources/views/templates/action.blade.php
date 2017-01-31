@component('mail::message')

# {{ $header }}

@foreach($introLines as $line)
{{ $line }}
@endforeach

@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent

@foreach($outroLines as $line)
{{ $line }}
@endforeach

@component('mail::subcopy')
If you’re having trouble with the button above, copy and paste the URL below into your web browser.

{{ $actionUrl }}
@endcomponent

@endcomponent