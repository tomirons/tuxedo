@extends('tuxedo::master')

@section('alert')
    <!-- Alert -->
    <tr>
        <td style="{{ $fontFamily }} {{ $style['alert'] . $style['alert--'.$type] }}">
            {{ $text }}
        </td>
    </tr>
@endsection

@section('body_footer')
    <!-- Sub Copy -->
    @if (isset($actionText))
        <table style="{{ $style['body_sub'] }}">
            <tr>
                <td style="{{ $fontFamily }}">
                    <p style="{{ $style['paragraph-sub'] }}">
                        If you’re having trouble clicking the "{{ $actionText }}" button,
                        copy and paste the URL below into your web browser:
                    </p>

                    <p style="{{ $style['paragraph-sub'] }}">
                        <a style="{{ $style['anchor'] }}" href="{{ $actionUrl }}" target="_blank">
                            {{ $actionUrl }}
                        </a>
                    </p>
                </td>
            </tr>
        </table>
    @endif
@endsection