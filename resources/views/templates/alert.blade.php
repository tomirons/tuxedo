@extends('tuxedo::master')

@section('alert')
    <!-- Alert -->
    <tr>
        <td style="{{ $fontFamily }} {{ $style['alert'] . $style['alert--'.$type] }}">
            {{ $text }}
        </td>
    </tr>
@endsection