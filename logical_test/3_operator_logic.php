<?php

function pembagian($nilai_a, $nilai_b)
{
    if ($nilai_b == 0) {
        throw new Exception("Nilai B tidak boleh 0");
    }

    $pembagian = 0;
    $hasil = $nilai_a;
    do {
        $hasil -= $nilai_b;
        $pembagian++;
    } while ($hasil >= $nilai_b);

    return $pembagian;
}

try {
    echo "Hasil pembagian 7/2:<br>";
    echo pembagian(7, 2);
    echo "<br>";
    echo "Hasil pembagian 8/4:<br>";
    echo pembagian(8, 4);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
