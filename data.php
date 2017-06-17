<?php
//$data= "This is the PHP file";
//echo $data;
$name =array('ahmed','zizo','Malek','amir','Elsayed');

//foreach($name as $n)
//echo $n.'<br />'
$names = $_REQUEST['var'];
if( in_array($names,$name))
    echo "$names In array";
else
    echo "Not available";

?>