@extends('tuxedo::master')

@section('before')
    <!-- Alert -->
    <tr>
        <td style="{{ $fontFamily }} {{ $style['alert'] . $style['alert--'.$type] }}">
            {{ $text }}
        </td>
    </tr>
@endsection