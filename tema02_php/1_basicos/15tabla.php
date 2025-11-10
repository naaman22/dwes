<?php

$data = [
    [
        'Nombre' => 'Mauro',
        'Apellido' => 'Chojrin',
        'Correo' => 'mauro.chojrin@leewayweb.com',
    ],
    [
        'Nombre' => 'Alberto',
        'Apellido' => 'Loffatti',
        'Correo' => 'aloffatti@hotmail.com',
    ],
    [
        'Nombre' => 'Foo',
        'Apellido' => 'Bar',
        'Correo' => 'foo_bar@example.com',
    ]
];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <thead>
            <?php
                foreach ($data[0] as $key => $value){
                    echo "<th>$key</th>";
                }
            ?>

        </thead>
        <tbody>
            <?php
                for ($i=0; $i < count($data); $i++) { 
            ?>
            <tr>
                <?php
                    foreach ($data[$i] as $key => $value) {
                        echo "<td>$value</td>";
                    }
                ?>
            </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
</body>
</html>