<?php
date_default_timezone_set('Europe/Berlin');
$now = date("H:i:s",time());
//defined restart times
if($now <= "06:00"){
	
	$restart = "06:00";
	
} else if($now <= "12:00"){
	
	$restart = "12:00";
	
} else if($now <= "18:00"){
	
	$restart = "18:00";
	
}else if($now <= "23:59"){
	
	$restart = "23:59";
	
}
//Assign variables with the corresponding times
$starttime = time();
$endtime = strtotime($restart);
//Subtract the end time from the start time and divide by 60 to get the value in minutes
$dauerInMinuten = ($endtime - $starttime);

function diff_time($differenz)
   {  
   $day  = floor($differenz / (3600*24));
   $hrs  = floor($differenz / 3600 % 24);
   $min  = floor($differenz / 60 % 60);
   $sek  = floor($differenz % 60);

   return array("sek"=>$sek,"min"=>$min,"hrs"=>$hrs,"day"=>$day);
   }

$differenz = diff_time($dauerInMinuten);

if(strlen($differenz['min'])==1){
	$differenz['min'] = "0".$differenz['min'];
}

$restarttime = $differenz['hrs'].":".$differenz['min']."h";
?>