@extends('tuxedo::master')

@section('before')
    <!-- Header -->
    <h1 style="{{ $style['email-header'] . $style['no-top-margin'] }}">
        @if (! empty($header))
            {{ $header }}
        @endif
    </h1>
@endsection