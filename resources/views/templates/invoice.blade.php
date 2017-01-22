@component('mail::message')

# Hi {{ $name }}!

Thanks for using {{ config('app.name') }}. This is an invoice for your recent purchase.

@component('mail::invoice.attributes', ['total' => $total, 'dueDate' => $dueDate])

@endcomponent

@component('mail::button', ['url' => 'http://laravel.com', 'color' => 'green'])
Pay this invoice
@endcomponent

@component('mail::invoice.table', ['data' => $tableData])

@endcomponent

@endcomponent