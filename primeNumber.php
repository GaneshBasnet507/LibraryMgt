<?php
for($i=1;$i<10;$i++){
$flag=false;
$a=(int)$i/2;
for($j=2;$j<$a;$j++){
if($i % $j==0)
$flag=true;
}
if(!$flag)
echo $i." ";
}
?>
