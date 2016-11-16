@extends('tuxedo::master')

@section('body_header')
    <h2 style="{{ $style['text-center'] . $style['no-top-margin'] }}">Thank you for your order!</h2>
@endsection

@section('content')
    <!-- Invoice -->
    <table style="{{ $style['invoice'] }}">
        <tr>
            <td style="{{ $style['invoice--padding'] . $style['text-center'] . $style['invoice-date'] }}">
                {{ $date }}
            </td>
        </tr>
        <tr>
            <td>
                <table style="{{ $style['invoice-items'] }}" cellpadding="0" cellspacing="0">
                    @foreach ($items as $item)
                        <tr style="{{ $style['invoice-item'] }}">
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] }}">{{ $item['name'] }}</td>
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] . $style['text-right'] . $style['invoice-items--price'] }}">$ {{ $item['price'] }}</td>
                        </tr>
                    @endforeach

                    <tr style="{{ $style['invoice-subtotal'] }}">
                        <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] }}">Subtotal</td>
                        <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] . $style['text-right'] . $style['invoice-items--price'] }}">$ {{ $subtotal }}</td>
                    </tr>

                    @if ($tax > 0)
                        <tr style="{{ $style['invoice-subtotal'] }}">
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] }}">Tax</td>
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] . $style['text-right'] . $style['invoice-items--price'] }}">$ {{ number_format($tax, 2, '.', ',') }}</td>
                        </tr>
                    @endif

                    @if ($shipping)
                        <tr style="{{ $style['invoice-subtotal'] }}">
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] }}">Shipping</td>
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] . $style['text-right'] . $style['invoice-items--price'] }}">$ {{ number_format($shipping, 2, '.', ',') }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td style="{{ $style['invoice--padding'] . $style['invoice-items-total'] }}" width="80%">Total</td>
                        <td style="{{ $style['text-right'] . $style['invoice--padding'] . $style['invoice-items-total'] }}">$ {{ number_format($total, 2, '.', ',') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection