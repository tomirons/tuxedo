@component('mail::message')

# {{ $greeting }}

@foreach($introLines as $line)
    {{ $line }}
@endforeach

@component('mail::invoice.attributes', ['total' => $tableData['total'], 'dueDate' => $dueDate])
# Amount Due: {{ $tableData['total'] }} <br>
# Due By: {{ $dueDate }}
@endcomponent

@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent

@component('mail::invoice.table', ['data' => $tableData])
| Description | Amount |
| ----------- | ------ |
@foreach($tableData['items'] as $item)
| {{ $item[$tableData['keys']['name']] }} | {{ $item[$tableData['keys']['price']] }} |
@endforeach
@if ($tableData['shipping'] > 0)
| Shipping | {{ $tableData['shipping'] }} |
@endif
@if ($tableData['tax'] > 0)
| Tax | {{ $tableData['tax'] }} |
@endif
| Total | {{ $tableData['total'] }} |
@endcomponent

@foreach($outroLines as $line)
    {{ $line }}
@endforeach

@if($salutation)
{{ $salutation }}
@else
Regards,<br>{{ config('app.name') }}
@endif

@component('mail::subcopy')
If you’re having trouble with the button above, copy and paste the URL below into your web browser.

{{ $actionUrl }}
@endcomponent

@endcomponent