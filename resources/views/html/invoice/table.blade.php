<table class="purchase" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <h3>{{ $invoice->id }}</h3></td>
        <td>
            <h3 class="align-right">{{ date('') }}</h3></td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <th class="purchase_heading">
                        <p>Description</p>
                    </th>
                    <th class="purchase_heading">
                        <p class="align-right">Amount</p>
                    </th>
                </tr>
                {{#each invoice_details}}
                <tr>
                    <td width="80%" class="purchase_item">{{description}}</td>
                    <td class="align-right" width="20%" class="purchase_item">{{amount}}</td>
                </tr>
                {{/each}}
                <tr>
                    <td width="80%" class="purchase_footer" valign="middle">
                        <p class="purchase_total purchase_total--label">Total</p>
                    </td>
                    <td width="20%" class="purchase_footer" valign="middle">
                        <p class="purchase_total">{{total}}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>