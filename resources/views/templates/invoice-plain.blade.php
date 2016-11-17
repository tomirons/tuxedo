<?php

echo "Thank you for your order!", "\n\n";

if (isset($greeting))
{
    echo $greeting, "\n\n";
}

if (! empty($introLines)) {
    echo implode("\n", $introLines), "\n\n";
}

echo "Date: {$date}", "\n\n";

foreach ($items as $item) {
    echo "{$item['product_name']} : {$item['product_price']}", "\n";
}

echo "\nSubtotal: " . number_format($subtotal, 2, '.', ','), "\n";

if ($tax > 0){
    echo "Tax: " . number_format($tax, 2, '.', ','), "\n";
}

if ($shipping > 0){
    echo "Shipping: " . number_format($shipping, 2, '.', ','), "\n";
}

echo "Total: " . number_format($total, 2, '.', ','), "\n\n";

if (! empty($outroLines)) {
    echo implode("\n", $outroLines), "\n\n";
}

echo 'Regards,', "\n";
echo config('app.name'), "\n";