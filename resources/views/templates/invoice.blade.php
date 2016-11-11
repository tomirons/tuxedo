@extends('tuxedo::master')

@section('content')
    <table style="{{ $style['invoice'] }}" class="invoice">
        <tr>
            <td style="{{ $style['invoice--padding'] }}">Lee Munroe<br>Invoice #12345<br>June 01 2014</td>
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
                    <tr style="{{ $style['invoice-items-total'] }}">
                        <td style="{{ $style['text-right'] }}" width="80%">Total</td>
                        <td style="{{ $style['text-right'] }}">$ 33.98</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection