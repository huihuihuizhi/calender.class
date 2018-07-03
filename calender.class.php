<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
<?php
class Calender{
	private $year;//当前的年
	private $month;//当前的月
	private $start_weekday;//当月的第一天对应的是周几
	private $days;//当前月一共多少天
	function __construct(){
	    $this->year=isset($_GET["year"])?$_GET["year"]:@date("Y");//获取当前的年
	    //$this->year=date("Y");
	    $this->month=isset($_GET["month"])?$_GET["month"]:@date("m");//获取当前的月
		$this->start_weekday=@date("w",mktime(0,0,0,$this->month,1,$this->year));//date("w") 把当前月的1号转成周几
	    $this->days=@date("t",mktime(0,0,0,$this->month,1,$this->year));//当前月有多少天
	}
	function out(){
		echo '<table align="center">';
			$this->changeDate("test.php");
			$this->weekslist();
			$this->dayslist();
		echo "</table>";
	}
	//表头信息
	private function weekslist(){
	//$week = array('日','一','二','三','四','五','六');
	
	echo '<tr>';
		echo "<th class='fontb'>日</th>";
		echo "<th class='fontb'>一</th>";
		echo "<th class='fontb'>二</th>";
		echo "<th class='fontb'>三</th>";
		echo "<th class='fontb'>四</th>";		
		echo "<th class='fontb'>五</th>";
		echo "<th class='fontb'>六</th>";			
	echo '</tr>';
	}
	//遍历天
	private function dayslist(){
		echo '<tr>';
		//输出空格（当前一共月第一天前面要空出来）
		for($j=0;$j<$this->start_weekday;$j++)
			echo '<td>&nbsp;</td>';
		for($k=1;$k<=$this->days;$k++){
			$j++;
			if($k==@date('d')) 
			   echo '<td class="fontb">'.$k.'</td>';
			else
			echo '<td>'.$k.'</td>';
			if($j%7==0)
			
			 echo '</tr><tr>';
		}
		//后面几个空格
		while($j%7!==0){
			echo '<td>&nbsp;</td>';
			$j++;
				
		}
		echo '</tr>';
		
	}
	
	private function lasty($year,$month){
		$year=$year-1;
		if($year < 1970)
			$year = 1970;
			return "year={$year}&month={$month}";
	}
	private function lastm($year,$month){
		if($month == 1){
			$year= $year -1;
			if($year < 1970)
			$year = 1970;
			$month=12;
		}else{
			$month--;
		}
		return "year={$year}&month={$month}";
	}
	private function nexty($year,$month){
		$year=$year+1;
		if($year > 2038)
			$year = 2038;
			return "year={$year}&month={$month}";
	}
	private function nextm($year,$month){
		if($month == 12){
			$year= $year ++;
			if($year > 2038)
			$year = 2038;
			$month=1;
		}else{
			$month++;
		}
		return "year={$year}&month={$month}";
	}
	private function changeDate($url=" "){
		echo '<tr>';
			echo '<td><a href="?'.$this->lasty($this->year,$this->month).'">'.'<<'.'</a></td>';
			echo '<td><a href="?'.$this->lastm($this->year,$this->month).'">'.'<'.'</a></td>';
			//echo '<td colspan="3">'.$this->year.'年'.$this->month.'月'.'</td>';
			echo '<td colspan="3">';
				echo '<form>';
					
				echo '<select name="year" onchange="window.location=\''.$url.'?year=\'+this.options[selectedIndex].value+\'&month='.$this->month.'\'">';
				 	for($sy=1970;$sy<=2038;$sy++){
				 		$selected = ($sy == $this->year)?"selected" : "";
				 		echo '<option '.$selected.' value="'.$sy.'">'.$sy.'</option>';
				 	}
				 echo '</select>';
				 
				echo '<select name="month" onchange="window.location=\''.$url.'?year='.$this->year.'&month=\'+this.options[selectedIndex].value">';
				 	for($sm=1;$sm<=12;$sm++){
				 		$selected1 = ($sm == $this->month)?"selected" : "";
				 		echo '<option '.$selected1.' value="'.$sm.'">'.$sm.'</option>';
				 	}
				 echo '</select>';		
				echo '</form>';
			echo '<td><a href="?'.$this->nexty($this->year,$this->month).'">'.'>>'.'</a></td>';
			echo '<td><a href="?'.$this->nextm($this->year,$this->month).'">'.'>'.'</a></td>';
			
		echo '</tr>';
	}
}

	
