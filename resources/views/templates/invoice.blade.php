@component('mail::message')

# Hi Name!

Thanks for using [Product Name]. This is an invoice for your recent purchase.

@component('mail::invoice.attributes', ['total' => $total, 'dueDate' => $dueDate])
Amout Due: ${{ $total }}
Due By: {{ $dueDate }}
@endcomponent

@component('mail::button', ['url' => 'http://laravel.com', 'color' => 'green'])
Pay this invoice
@endcomponent


@endcomponent