@extends('tuxedo::master')

@section('content')
    <!-- Email Body -->
    <tr>
        <td class="email-body" width="100%">
            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="font-family email-body_cell">
                        <!-- Greeting -->
                        <h1 class="header-1">
                            @if (! empty($greeting))
                                {{ $greeting }}
                            @else
                                Hello!
                            @endif
                        </h1>

                        <!-- Intro -->
                        @foreach ($lines as $line)
                            <p class="paragraph">
                                {{ $line }}
                            </p>
                        @endforeach

                    <!-- Salutation -->
                        <p class="paragraph">
                            Regards,<br>{{ config('app.name') }}
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
@endsection