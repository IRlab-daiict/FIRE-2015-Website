<html>
<?php

foreach ($_POST as $key => $value) {
 if ( $key == "regex" ) {
 $regex = '/' . $value . '/';
 echo 'regex = ' . $value . '<br/>';
 }
}

$file = fopen("./reg2011", "r");
$f = fread($file, filesize("./reg2011"));
fclose($file);

$a = explode('#', $f);
//print_r($a);
$c = 0;
$res = '';
foreach($a as $i) {
 //print_r($i);
 if(preg_match($regex, $i)) {
  $c = $c + 1;
  $i = preg_replace('/Phone.*[0-9]+\n/', '', $i);
  $res .= $i;
 //echo '<pre>';
 //echo $i;
 //echo '</pre>';
 }
}

echo '<hr/>';
echo '<b>' . $c . ' matches.' . '</b><br/>';
echo '<hr/>';
echo '<pre>';
echo $res;
echo '</pre>';
echo '<hr/>';
?>
</html>
