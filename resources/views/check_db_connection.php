<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Db Connection</title>
</head>
<body>
    <?php
    use Illuminate\Support\Facades\DB;
    if( DB::connection()->getPdo()){
        echo "successfully connected to " . DB::getDatabaseName();
    }
    ?>
</body>
</html>