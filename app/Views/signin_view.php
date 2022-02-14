<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>
<?php
    echo $form_open;
    echo $label_email;
    echo $form_email;
    echo $label_username;
    echo $form_username;
    echo $label_password;
    echo $form_password;
    echo $form_submit;
    echo $form_close;

    if (count($arrErrors) > 0){
        ?>
<div>
    <?php
        foreach($arrErrors as $strError){
            echo "<p>".$strError."</p>";
        }
        ?>
</div>
<?php
    }
?>

</body>
</html>