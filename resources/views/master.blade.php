<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

        /* Font ------------------------------ */
        .font-family {
            font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
        }

        /* Layout ------------------------------ */

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #F2F4F6;
        }
        .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
            background-color: #F2F4F6;
        }

        /* Masthead ------------------------------ */

        .email-masthead {
            padding: 25px 0;
            text-align: center;
        }
        .email-masthead_name {
            font-size: 16px;
            font-weight: bold;
            color: #2F3133;
            text-decoration: none;
            text-shadow: 0 1px 0 white;
        }

        .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
            border-top: 1px solid #EDEFF2;
            border-bottom: 1px solid #EDEFF2;
            background-color: #FFF;
        }
        .email-body_inner {
            width: auto;
            max-width: 570px;
            margin: 0 auto;
            padding: 0;
        }
        .email-body_cell {
            padding: 35px;
        }

        .email-footer {
            width: auto;
            max-width: 570px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
        }
        .email-footer_cell {
            color: #AEAEAE;
            padding: 35px;
            text-align: center;
        }

        /* Body ------------------------------ */

        .body_action {
            width: 100%;
            margin: 30px auto;
            padding: 0;
            text-align: center;
        }
        .body_sub {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #EDEFF2;
        }

        /* Type ------------------------------ */

        .anchor {
            color: #3869D4;
        }
        .header-1 {
            margin-top: 0;
            color: #2F3133;
            font-size: 19px;
            font-weight: bold;
            text-align: left;
        }
        .paragraph {
            margin-top: 0;
            color: #74787E;
            font-size: 16px;
            line-height: 1.5em;
        }
        .paragraph-sub {
            margin-top: 0;
            color: #74787E;
            font-size: 12px;
            line-height: 1.5em;
        }
        .paragraph-center {
            text-align: center;
        }

        /* Buttons ------------------------------ */

        .button {
            display: inline-block;
            width: 200px;
            min-height: 20px;
            padding: 10px;
            background-color: #3869D4;
            border-radius: 3px;
            color: #ffffff;
            font-size: 15px;
            line-height: 25px;
            text-align: center;
            text-decoration: none;
            -webkit-text-size-adjust: none;
        }
        .button--green {
            background-color: #22BC66;
        }
        .button--red {
            background-color: #dc4d2f;
        }
        .button--blue {
            background-color: #3869D4;
        }
    </style>
</head>

<body class="body">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="email-wrapper" align="center">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <!-- Logo -->
                    <tr>
                        <td class="email-masthead">
                            <a class="font-family email-masthead_name" href="{{ url('/') }}" target="_blank">
                                {{ config('app.name') }}
                            </a>
                        </td>
                    </tr>

                    @yield('content')

                    <!-- Footer -->
                    <tr>
                        <td>
                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="font-family email-footer_cell">
                                        <p class="paragraph-sub">
                                            &copy; {{ date('Y') }}
                                            <a class="anchor" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                            All rights reserved.
                                            {{--<a href="https://google.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABpFBMVEUAAAAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyD///97omXNAAAAinRSTlMAAAEJctX///s8AwCf/f/++TwDAkP9/v7+/vsDhP7///HoOAMDlv38xTw0Ow0BAAAJlvl/BgOQ/vkABH15yf78v3SAiR4BAAn2/wAI7/n7///79vU1A+8oAgWWldT+/cyPnZAYAQOU/fkDlP2ABgADlPmABgAAA5QDkvr1fgYDnf35ASRAPj1EHwHbtGtnAAAAAWJLR0SL8m9H4AAAAAd0SU1FB+ALCgwSAcQU2XYAAAECSURBVCjPxY9VVwIBFIR3bMVWFMXuXBUl7O4WTAQbA8HEbkFlfrV19uyy8u73ON+Zc+8Iwi8RiIyKZkxsHOORIMhogEQmMTkllWlIV4gMZGqzsqnLyVU19MhjfkEhi4pZglKFKEM5KypZVV1TW4d6KRXR0Igm6gxsRosQihEmmi1q0Yq29o5OdnWzp7evfwCDkhjC8AhH+UPIjjGMT0xOcXqGs3NW2jAfpmHmwiKW5NnLK/ZVOpxcW9/Y3MK24v4OXNzdU38FYB8HdBt4CI9XBGQhHuGY7hOe4uzcJ4svLnD53fi7/F/FFa55c8s73KvEAx759Bym8YJXf+Dt/QNBKfkE4DBUDUSJlcUAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTYtMTEtMTBUMTI6MTg6MDEtMDU6MDBVUaaAAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE2LTExLTEwVDEyOjE4OjAxLTA1OjAwJAwePAAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAASUVORK5CYII="></a>--}}
                                            {{--<a href="https://google.com"><img src="data:image/png;base64,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"></a>--}}
                                            {{--<a href="https://google.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABwlBMVEUiHx8AAAAiHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx8iHx/////9QRhWAAAAlHRSTlMAAAEELEhSWlpaXF4BGpjx/hrH/M2XgX96cnN6f4Ga0f7HmOZSAAEAAAACSuiYLvRWAgABAgIAAwNljhVQR8wFAAACAQMIAjjnjdBSlwABFWrC7WwPHcb6ZJuBAQMqyf/KJho2gQISyOh0NejJEn8Cauk2AelsAwPCdAIDB+01AwABlwAAAS70VQKY5lIBAQDH/M2XN2XudQAAAAFiS0dElQhgeoMAAAAHdElNRQfgCwoMEgHEFNl2AAABkElEQVQoz32SZ1OUYQxFj7R3i8Au4DYUUQQRERRYsAHSFF3pKogUK11pKr333u4P9nFkdWBmzbckM0nuuYEoomNi4yyb3eF0Ouw2Ky42JtoUuUh8QqJc+hsuJSbEmzLuJCWnXPJ4ff5AwJ96+Ura1XRdcwPXlXEjM+tm9oU/cSuH27m6A3n5usu9gsKiYDEUl9znwcNHj5WfR6nKyp9UUFlFdU1N9VOe1eo5L1RKSC+hrp6Gxqbm5qaWV6/ftLbxViEstfOug84uubq7XXr/4eMn+CwLm7x8oadXff0DA/2DGvpKkG+yYZePYUY0Osb4OGPf9YOfpMqOQ36YmNQU0zMz00xpcgL8cuBUAGbnNM/C4uIC85qbhYCckRsRR51bPqoRk/rM8rPn9qm3x6Rec64lD0v/BHZ10rGExwgMaRlWwkgaG6hfgWWD5DfE1bUwRKoqWVstLzMQ1ze0yVYYe7CosGCLTW2sw7Z2dvf2D06Nyj7Y39vd0bZx0H2oo+OTU2t9Xs/J8ZEO3f97hgjv8wsbQJRGrRMmZgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNi0xMS0xMFQxMjoxODowMS0wNTowMFVRpoAAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTYtMTEtMTBUMTI6MTg6MDEtMDU6MDAkDB48AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAABJRU5ErkJggg=="></a>--}}
                                            {{--<a href="https://google.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAAB3RJTUUH4AsKDBIDKhq4WgAAAp5JREFUSMed1T+oVFcQBvDfvbvGpwZ5PCFYCLuw2kgwIYqQQCzUQgTbRCvtTGETQiDYpE5IEYUgSWGwsTAgKCio+A8JmCIEC4UQFnYLIxZqsIi8uG/X4s7Zd97N7suLA4fLuWfmm5nvzMwpOq22unT7vSX7CToFGrV/w1jpHEZlzWgaYB18hEG33xt0+70BBgE+Bsao2+8pamANLNQzyXSaAfYuPkcrQB/iO9wOvU14G9eKTqs9g69wCVfrTiZE/hF+xNrY59mfwjwO4yh+Kjqt9mb8HCkejCgSdaNYCXwzfsOboZ87KDPdGziHKyXeiMONkcVnoZQAmlgdQJ9m4GVk26gF9BK78D4elfHjn1CYwTcRwT6sC84TZdsyoGkFsArf4xjmG3Ozs0+xFe8FWIE2PsYebMFcRH0oMl1SdTUHL7AXf6NoRnoXcABvRXSJgg9iDfEX1gdQabqke4BRE+/gW4uNU2QKCwHejCysAPheVNI4kj/xHBuColwawSmLXbqcA/gjuzMlHqvqOu0nXWAqw+UkBXA9p7EM45M4jicmX95/SSrnZ/gl/ez2e2MHcDMOX76Gg0TtWfwe1A47rfYSSlapaj/Nm9EKwYdh+0g1KuS2eXvfUXXqIJz8X/ka91P0iaLG3OxsabHt7+JX1fiYUZVmXtd13hfC7gy+yKNPk7jZ7ffG5ddptUtcVo2O01MiTcBFZHoOn8RZGopjKTqt9oeq0fscO1UTdUcY55M0n6ylahScwJeqwhiD5y9iM8COqAZZnY6i9i1VXXoeP+CWxc6fWBTpRVuD7diP3arXKF1WI6K9G+siHgSN/3qc6u950Wm160qNuOQ67/NZlKkwBtOAc4rShaU0F/AiN8je5MT/cCXgOUWvJcsBJ3kFKznLR7UTZZoAAAAldEVYdGRhdGU6Y3JlYXRlADIwMTYtMTEtMTBUMTI6MTg6MDMtMDU6MDDCzrepAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE2LTExLTEwVDEyOjE4OjAzLTA1OjAws5MPFQAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAASUVORK5CYII="></a>--}}
                                            {{--<a href="https://google.com"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAMAAADXqc3KAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABZVBMVEUAAAAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyAjHyD///9qruXxAAAAdXRSTlMAAAECAwMDAgIACio8PDw8GK30////lP37+/v7+/n6+/2W5v39///9/v797v///un2/v/+///+lkDf/Pz//ZURjPP7//6VBDrA/v/9lAQEAQFz//6UBgQ+wf7//5UAFpT3/v/+kmDf/f7//7Ki/vz+/f/9/f8lCSaaAAAAAWJLR0R2MWPJQQAAAAd0SU1FB+ALCgwSBLR+LfkAAAEpSURBVCjPdZLlc8JAEMVvkeIUCxIqSJIWqSFVqLu7UPeWurz/vxE6E5jJ79PevpO3u8eYEWQyW6xtTVgtZhMxm50crZsdZLcxcrrcHm+7Dq/H7XIS8/kDwRAHHVwoGPD7WBiRaIyP8x2dXdHuuAIfiyaQZKm0AFHeJ6GnF5wSyctMNsekvJLvQ//AIIQhFERVyUusiJIclocxMjqG8QlRPc6hwrQHy1VM0tT0DGbnoDn5F+axQIu0tIyVVTQJa1injc2t7R3s7rUI+3RAh0fHOKnphdMqzuj84vIK12i66uYWd3T/gMcnPDeEiuqiVsfLK97eP+SKZEooNgpUvdc/vzSvaoG5bEZROHz/SIVfaHkhnWJJJJQm6pCbGEHYuO2GgzIerdFnMOIP6eR7uE2ojZ0AAAAldEVYdGRhdGU6Y3JlYXRlADIwMTYtMTEtMTBUMTI6MTg6MDQtMDU6MDAHaYknAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDE2LTExLTEwVDEyOjE4OjA0LTA1OjAwdjQxmwAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAAASUVORK5CYII="></a>--}}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>