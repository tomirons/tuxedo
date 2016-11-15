@extends('tuxedo::master')

@section('header')
    <h2 style="{{ $style['text-center'] . $style['no-top-margin'] }}">Thank you for your order!</h2>
@endsection

@section('content')
    <!-- Invoice -->
    <table style="{{ $style['invoice'] }}">
        <tr>
            <td style="{{ $style['invoice--padding'] }}">
                {{ $name }}<br>
                Invoice No. {{ $number }}<br>
                {{ $date }}
            </td>
        </tr>
        <tr>
            <td>
                <table style="{{ $style['invoice-items'] }}" cellpadding="0" cellspacing="0">
                    @foreach ($items as $item)
                        <tr>
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] }}">{{ $item['name'] }}</td>
                            <td style="{{ $style['invoice-items--border'] . $style['invoice--padding'] . $style['text-right'] }}">$ {{ $item['price'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td style="{{ $style['text-right'] . $style['invoice--padding'] . $style['invoice-items-total'] }}" width="80%">Total</td>
                        <td style="{{ $style['text-right'] . $style['invoice--padding'] . $style['invoice-items-total'] }}">$ {{ number_format($total, 2, '.', ',') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection