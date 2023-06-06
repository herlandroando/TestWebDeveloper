<?php

for ($i = 1; $i <= 50; $i++) {
    echo "Line $i:";
    // if ($i % 3 == 0 && $i % 5 == 0) {
    //     echo "FooBar";
    //     continue;
    // }
    if ($i % 3 == 0) {
        echo "Foo";
    }
    if ($i % 5 == 0) {
        echo "Bar";
    }

    if ($i % 3 != 0 && $i % 5 != 0) {
        echo $i;
    }

    echo "<br>";
}

?>