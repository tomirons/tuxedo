@extends('tuxedo::master')

@section('header')
    <!-- Header -->
    <h1 style="{{ $style['email-header'] . $style['no-top-margin'] }}">
        @if (! empty($header))
            {{ $header }}
        @endif
    </h1>
@endsection

@section('content')
    <!-- Action Button -->
    @if (isset($actionText))
        <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center">
                    <?php
                    switch ($level) {
                        case 'success':
                            $actionColor = 'button--green';
                            break;
                        case 'error':
                            $actionColor = 'button--red';
                            break;
                        default:
                            $actionColor = 'button--blue';
                    }
                    ?>

                    <a href="{{ $actionUrl }}"
                       style="{{ $fontFamily }} {{ $style['button'] }} {{ $style[$actionColor] }}"
                       class="button"
                       target="_blank">
                        {{ $actionText }}
                    </a>
                </td>
            </tr>
        </table>
    @endif
@endsection