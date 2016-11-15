<?php

echo "Thank you for your order!", "\n\n";

echo $greeting ?? "Hello", "\n\n";

if (! empty($introLines)) {
    echo implode("\n", $introLines), "\n\n";
}

echo "Name: {$name}", "\n";
echo "Invoice: {$number}", "\n";
echo "Date: {$date}", "\n\n";

foreach ($items as $item) {
    echo $item['name'] . ": {$item['price']}", "\n";
}

echo "Total: " . number_format($total, 2, '.', ','), "\n\n";

if (! empty($outroLines)) {
    echo implode("\n", $outroLines), "\n\n";
}

echo 'Regards,', "\n";
echo config('app.name'), "\n";