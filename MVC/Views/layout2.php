<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <?php
        if ($data["Page"]=="dangky") {
            echo "<link rel='stylesheet' href='./public/css/dangky.css'>";
        }
    ?>
</head>
<body>
    <div>
        <?php
            require_once "./MVC/Views/Pages/{$data['Page']}.php";
        ?>
    </div>
</body>
</html>