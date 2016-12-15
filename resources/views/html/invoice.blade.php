@component('mail::message')

# Hi Name!

Thanks for using [Product Name]. This is an invoice for your recent purchase.

@include('tuxedo::html.attributes', ['total' => $total, 'due' => date('m-d-Y')])

@endcomponent