<table class="alert" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td class="alert-content alert-{{ $type }}">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="alert-item">{{ Illuminate\Mail\Markdown::parse($slot) }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
