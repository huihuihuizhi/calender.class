<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<style>
	.fontb{
		border: 0px solid #050;
		color: white;
	    background: blue; 
	    width: 30px;	    
				}	
  td,th{
		
		text-align: center;
	}
	form{
		margin: 0px; padding: 0px;
	}
</style>
	</head>
	<body>
		<?php
 include "calender.class.php";//包含文件
 $calender=new Calender;//创建对象
 $calender->out();//调用其中的方法
 ?>
	</body>
</html>



 