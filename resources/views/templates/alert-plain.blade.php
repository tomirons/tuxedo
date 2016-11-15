<?php

if (! empty($text)) {
    switch ($type) {
        case 'success':
            echo "Hooray! {$text}", "\n\n";
            break;

        case 'warning':
            echo "Wait! {$text}", "\n\n";
            break;

        case 'error':
            echo "Uh Oh! {$text}", "\n\n";
            break;
    }
}

echo $greeting ?? "Hello", "\n\n";

if (! empty($outroLines)) {
    echo implode("\n", $outroLines), "\n\n";
}

echo 'Regards,', "\n";
echo config('app.name'), "\n";