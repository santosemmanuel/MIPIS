<!DOCTYPE html>
<html>
<head>
	<title></title>
    <script type="text/javascript" src="bootstrap/js/jquery-2.1.4.min.js">
    </script>
    <script type="text/javascript">
        var counter = 0;
        $(function(){
           $('#add_field').click(function(){
             counter += 1;
               $('#container').append(
                   '<strong>Hobby No.'+ counter + '</strong><br />'+
                   '<input id="field_'+ counter + '" name ="dynfields[]' + '"type = "text"/><br/>'
               );
           });

        });
    </script>
    <style>
        .example-print {
            display: none;
        }
        @media print {
            .example-screen {
                display: none;
            }
            .example-print {
                display: block;
            }
        }
    </style>
</head>
<body>
<?php
    session_start();
    require_once('includes/connection.php');
    //$connect = mysql_connect("localhost", "root") or die(mysql_error());
    //$select_db = mysql_select_db("") or die(mysql_error());
    if(isset($_POST['submit_val'])){
        if($_POST['dynfields']){
            foreach($_POST['dynfields'] as $key => $value){
                $values = mysql_real_escape_string($value);
                $query = mysql_query("INSERT INTO record SET hobbies = '$values'",$connect);
            }
        }

        echo "<i><h2><strong>".count($_POST['dynfields'])."</strong>Hobbies Added </h2></li>";
    }
    ?>
    <?php
       if(!isset($_POST['submit_val'])){
    ?>
        <h1> add your hobbies</h1>
        <form method="post" action="">
            <div id="container">
                <p id="add_field">
                    <a href="#"><span>Click To Add Hobbies</span></a>
                </p>
				
            </div>
			<p id="remove_field">
                   <a href="#"><span>Remove</span></a>
                </p>
            <input type="submit" name="submit_val" value="Submit"/>
        </form>
    <?php } ?>

<?php
    function this_echo(){
        echo "Hello<br/>";
    }
    echo this_echo();

    $b = 0;

    $new_array = array();
    $arr = array('num','null','null','num','null','num');
    for($a = 0; $a < 6; $a++){
           if($arr[$a] == 'null'){
               $new_array[] = $b++;
           } else {

           }
    }
    echo count($new_array);


    require_once('includes/connection.php');


?>

    <form method ="post" action ="">
        <button class="add_field_button">Add More Fields</button>
        <br /><input type="text" name="my_text[]"/>
        <br /><input type="text" name="my_text[]"/>
               <input type="submit" name="submit_sample" value="Submit"/>
    </form>
<?php
//require_once("includes/connection_db.php");


    if(isset($_POST['submit_sample'])){

        $values = array();
        for($a = 0; $a <count($_POST['my_text']); $a++){
           $values[] = $_POST['my_text'];
        }
        echo $values;
        mysql_query("INSERT INTO sample SET my_text = '$values'");

    }

?>
<?php

    $arrayBook = array('hello' => 'hi');
        foreach ($arrayBook as $name_book => $num_book) {
            # code...
            echo $name_book;
            echo "<br>";
            echo $num_book;
        }
?>
<?php

	$a = 04;
	$b = 01;
	$total = $a - $b;
	echo "0".$total;
	
	$year = "2016";
	$first_sem = array("June" => "$year/06", "July" => "$year/07");
	foreach($first_sem as $string => $int){
		echo "<br/>".$string.",".$int."<br/>";
	}
?>

<div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mytext[]"></div>
</div>

<script>
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><select><?php
                                        $result = mysql_query("SELECT * FROM inventory WHERE expr=0");
                                        while($row = mysql_fetch_array($result)){
                                            echo "<option>".$row['medicine_name']."</option>";
                                        }
                                      ?></select>' +
                    '<input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

</script>

<?php


$name = "Hello";
    function sample_arr(){
        global $name;
        $arrays = array();
        $arrays[0] = $name;
        return $arrays;
    }
    $values = sample_arr();
    echo $values[0];

$zero = 0;
$sum = 10 - 07;
echo "<br/>".$zero."".$sum;

require_once('functions/functions.php');
   echo strip_zeros_from_date(date("Y/*m/*d",time()));
?>
</body>
<?php
    $new_a = array();
    $w = 6;
    $z = 6;
    $ans = $w - 3;
    for($q=$w; $q >= $ans; $q--){
        if($q == $z-1){
            break;
        }else {
            $new_a[] = $q;
        }
    }

    foreach($new_a as $val){
        echo "<br>".$val;
    }
?>
<?php
$val_1 =1;
$val = 3;
$c_arr = array();
$arr = array("1"=>'11','2'=>'12','3'=>'1','4'=>'2','5'=>'3');
while($arr){
    if($val == $val_1){
        break;
    }
    $c_arr[] = $arr[$val];
$val--;
}
foreach($c_arr as $nen){
    echo "<br>".$nen;
}
?>

<div class="example-screen">You only see me in the browser</div>

<div class="example-print">You only see me in the print</div>

<?php

    $this_array = array("I","Love","Fatima");
    $_SESSION['THIS_ARRAY'] = $this_array;
?>

<input type="text" maxlength="6" />
</html>