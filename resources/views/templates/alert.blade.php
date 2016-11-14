@extends('tuxedo::master')

@section('before')
    <!-- Alert -->
    <tr>
        <td style="{{ $fontFamily }} {{ $style['alert'] . $style['alert--'.$alertType] }}">
            {{ $alertText }}
        </td>
    </tr>
@endsection