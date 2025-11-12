<?php
    require __DIR__ . "/vendor/autoload.php";

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $log = new Logger('app');
    $log->pushHandler(new StreamHandler('app.log'));
    $log->error("Error generico");

    $errorDebug = "Pablo es un poco ciruelo";

    $log->debug("Debug: $errorDebug");

?> 