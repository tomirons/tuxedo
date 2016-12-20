<table class="attribute-list" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td class="attribute-list-container">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="attribute-list-item"><strong>Amount Due:</strong> ${{ number_format($total, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td class="attribute-list-item"><strong>Due By:</strong> {{ $dueDate }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>