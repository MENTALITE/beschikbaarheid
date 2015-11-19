<html>
<head>
<style>
body{font-size:12px}
p,span,td,table,div,input{font-family:Calibri,Ubunt,Helvetica,Arial,Sans}
td{border:1px solid #f4f4f4;padding:3px;font-size:11px}
.rw{width:960px;margin:40px auto;}
</style>
</head>
<body>
<div class="rw">
<?php 
 
  // ------------------------------------ 
 
  /* +------------------------------------------+
     |            Show text calendar            |
     +------------------------------------------+ */
  function showmonth($month, $year) {
   
    $first_day = mktime(0,0,0,$month, 1, $year);  // Here we generate the first day of the month
    $title = date('F', $first_day);               // This gets us the month name 
    $day_of_week = date('D', $first_day);         // day of week for 1st day of month
   
    switch($day_of_week) {                        // blank days before months first day
        case "Mon": $blankdays = 0; break; 
        case "Tue": $blankdays = 1; break; 
        case "Wed": $blankdays = 2; break; 
        case "Thu": $blankdays = 3; break; 
        case "Fri": $blankdays = 4; break; 
        case "Sat": $blankdays = 5; break; 
		case "Sun": $blankdays = 6; break; 
        
    }
   
    $days_in_month = cal_days_in_month(0, $month, $year); // days in the month
   
    echo "<table>";
    echo "<tr><th colspan=7> $title $year </th></tr>";
    
    echo "<tr>                                     <!-- table header row  -->
            <td>Ma</td>
            <td>Di</td>
            <td>Wo</td>
            <td>Do</td>
            <td>Vr</td>
            <td>Za</td>
            <td>Zo</td>
          </tr>";
   
    $day_count = 1;
 
    $blank_cnt =  $blankdays;  
    echo "<tr>";
 
    while ( $blank_cnt > 0 )                     // blank day table cells
    { 
        echo "<td></td>"; 
        $blank_cnt--; 
        $day_count++;
    }
   
    $day_num = 1;                                // day number
    $cnt = $blankdays;                           // skip blank days in first week
	while ( $day_num <= $days_in_month ) {       // count days until done
      if ($cnt==7) {$cnt = 0;};
      while ($cnt < 7) {
        $dtm = strtotime($day_num.'-'.$month.'-'.$year);
		$dtmdg = date('D', $dtm);
		$kleurd = ($dtmdg=='Sat' || $dtmdg=='Sun')? '#ccc':'#ccff33';
		$klik = '<br><div style="margin-bottom:2px;background-color:'.$kleurd.'">08-13</div><div style="background-color:'.$kleurd.'">13-18</div>';
		echo " <td>$day_num".$klik."</td> "; 
        $day_num++; 
        $day_count++;
        $cnt++;
        if ($day_num > $days_in_month) {break;}
        if ($cnt == 7) { echo "</tr>"; }
      }
    }
 
    while ( $cnt > 1 && $cnt <=6 ) {            // continue with $cnt for end of month blank days
        echo "<td></td>";
        $cnt++;
    }
   
    echo "</tr></table>";
   
  } // end of function 
 
	echo '<div style="display:inline;float:left;width:30%">';
	showmonth('10','2015');
    echo '</div><div style="display:inline;float:left;width:30%">';
	showmonth('11','2015');
	//echo '</div>';
	echo '</div><div style="display:inline;float:left;width:30%">';
	showmonth('12','2015');
	echo '</div>';
?>

</div>
</body>