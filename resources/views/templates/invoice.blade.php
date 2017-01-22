@component('mail::message')

# Hi {{ $name }}!

Thanks for using {{ config('app.name') }}. This is an invoice for your recent purchase.

@component('mail::invoice.attributes', ['total' => $tableData['total'], 'dueDate' => $dueDate])

@endcomponent

@if ($url)
    @component('mail::button', ['url' => $url, 'color' => 'green'])
    Pay this invoice
    @endcomponent
@endif

@component('mail::invoice.table', ['data' => $tableData])

@endcomponent

Regards, <br>
{{ config('app.name') }}

@endcomponent