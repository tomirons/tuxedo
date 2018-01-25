<table class="purchase" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <h3>{{ $data['id'] }}</h3></td>
        <td>
            <h3 class="align-right">{{ $data['date'] }}</h3>
        </td>
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
                @foreach ($data['items'] as $item)
                    <tr>
                        <td width="80%" class="purchase_item">{{ $item[$data['keys']['name']] }}</td>
                        <td class="align-right" width="20%" class="purchase_item">{{ $item[$data['keys']['price']] }}</td>
                    </tr>
                @endforeach
                @if ($data['shipping'] > 0)
                    <tr>
                        <td width="80%" class="purchase_footer" valign="middle">
                            <p class="purchase_shipping purchase_shipping--label">Shipping</p>
                        </td>
                        <td width="20%" class="purchase_footer" valign="middle">
                            <p class="purchase_shipping">{{ $data['shipping'] }}</p>
                        </td>
                    </tr>
                @endif
                @if ($data['tax'] > 0)
                    <tr>
                        <td width="80%" class="{{ !$data['shipping'] ? 'purchase_footer' : null }}" valign="middle">
                            <p class="purchase_tax purchase_tax--label">Tax</p>
                        </td>
                        <td width="20%" class="{{ !$data['shipping'] ? 'purchase_footer' : null }}" valign="middle">
                            <p class="purchase_tax">{{ $data['tax'] }}</p>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td width="80%" class="{{ !$data['tax'] && !$data['shipping'] ? 'purchase_footer' : null }}" valign="middle">
                        <p class="purchase_total purchase_total--label">Total</p>
                    </td>
                    <td width="20%" class="{{ !$data['tax'] && !$data['shipping'] ? 'purchase_footer' : null }}" valign="middle">
                        <p class="purchase_total">{{ $data['total'] }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
