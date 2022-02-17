<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Site</title>
</head>
<body>
    <?php
        if(file_exists($page)) {
            require_once($page);
        } else {
            throw new Exception("Site is not available!");
        }
    ?>
</body>
</html>