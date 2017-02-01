@component('mail::message')

# Hi {{ $name }}!

Thanks for using {{ config('app.name') }}. This is an invoice for your recent purchase.

@component('mail::invoice.attributes', ['total' => $tableData['total'], 'dueDate' => $dueDate])
# Amount Due: {{ $tableData['total'] }} <br>
# Due By: {{ $dueDate }}
@endcomponent

@component('mail::button', ['url' => $url, 'color' => 'green'])
Pay this invoice
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

Regards, <br>
{{ config('app.name') }}

@component('mail::subcopy')
If you’re having trouble with the button above, copy and paste the URL below into your web browser.

{{ $url }}
@endcomponent

@endcomponent