<!DOCTYPE html>
<html>
    <head>

    </head>
<body>
    <?php
        session_start();
        $this_array = $_SESSION['THIS_ARRAY'];
        foreach($this_array as $value){
            echo $value."<br/>";
        }

    ?>
</body>
</html>