<?php
$applications = [
    'gtAkademik',
    'gtFinansi',
    'gtPerizinan',
    'eCampuz',
    'eOviz',
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test 1</title>
</head>
<body>
    <ul>
        <?php foreach($applications as $application) : ?>
            <li><?= $application ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>