<?php
date_default_timezone_set('europe/berlin');
ignore_user_abort(TRUE);
?>
<html>
        <head>
                <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<link href="styl1.css" rel="stylesheet">
                <title>System inteligentnego domu RPI</title>
        </head>
        <body>
                <center>
                        <h1 id="tytul">Witaj w systemie inteligentnego domu!</h1>
<div id="pole">
<?php
$connect = mysqli_connect('localhost','domownik', 'domek','sterowanie') or die('Nie można połączyć się z serwerem');
$przekaznik1_off= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik1' and stan='0'";
$zapytanie_przekaznik1_off=mysqli_query($connect, $przekaznik1_off) or die ('błąd zapytania 1');
$przekaznik1_on= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik1' and stan='1'";
$zapytanie_przekaznik1_on=mysqli_query($connect, $przekaznik1_on) or die ('błąd zapytania 2');
	if(mysqli_num_rows($zapytanie_przekaznik1_off)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik1" value="Włącz urządzenie 1">
		</form>';
		shell_exec('gpio -g mode 16 out');
		shell_exec('gpio -g write 16 0');
	}
	if(mysqli_num_rows($zapytanie_przekaznik1_on)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik1" value="Wyłącz urządzenie 1">
		</form>';
		shell_exec('gpio -g mode 16 out');
		shell_exec('gpio -g write 16 1');
	}
	
$przekaznik2_off= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik2' and stan='0'";
$zapytanie_przekaznik2_off=mysqli_query($connect, $przekaznik2_off) or die ('błąd zapytania 3');
$przekaznik2_on= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik2' and stan='1'";
$zapytanie_przekaznik2_on=mysqli_query($connect, $przekaznik2_on) or die ('błąd zapytania 4');
	if(mysqli_num_rows($zapytanie_przekaznik2_off)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik2" value="Włącz urządzenie 2">
		</form>';
		shell_exec('gpio -g mode 12 out');
		shell_exec('gpio -g write 12 0');
	}
	if(mysqli_num_rows($zapytanie_przekaznik2_on)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik2" value="Wyłącz urządzenie 2">
		</form>';
		shell_exec('gpio -g mode 12 out');
		shell_exec('gpio -g write 12 1');
	}
	
$przekaznik3_off= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik3' and stan='0'";
$zapytanie_przekaznik3_off=mysqli_query($connect, $przekaznik3_off) or die ('błąd zapytania 5');
$przekaznik3_on= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik3' and stan='1'";
$zapytanie_przekaznik3_on=mysqli_query($connect, $przekaznik3_on) or die ('błąd zapytania 6');
	if(mysqli_num_rows($zapytanie_przekaznik3_off)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik3" value="Włącz urządzenie 3">
		</form>';
		shell_exec('gpio -g mode 3 out');
		shell_exec('gpio -g write 3 0');
	}
	if(mysqli_num_rows($zapytanie_przekaznik3_on)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik3" value="Wyłącz urządzenie 3">
		</form>';
		shell_exec('gpio -g mode 3 out');
		shell_exec('gpio -g write 3 1');
	}
	
$przekaznik4_off= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik4' and stan='0'";
$zapytanie_przekaznik4_off=mysqli_query($connect, $przekaznik4_off) or die ('błąd zapytania 7');
$przekaznik4_on= "SELECT przekaznik from przekazniki WHERE przekaznik='przekaznik4' and stan='1'";
$zapytanie_przekaznik4_on=mysqli_query($connect, $przekaznik4_on) or die ('błąd zapytania 8');
	if(mysqli_num_rows($zapytanie_przekaznik4_off)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik4" value="Włącz urządzenie 4">
		</form>';
		shell_exec('gpio -g mode 15 out');
		shell_exec('gpio -g write 15 0');
	}
	if(mysqli_num_rows($zapytanie_przekaznik4_on)>0)
	{
		echo'
		<form method="post" class="form1">
		<input type="submit" name="przekaznik4" value="Wyłącz urządzenie 4">
		</form>';
		shell_exec('gpio -g mode 15 out');
		shell_exec('gpio -g write 15 1');
	}
if(isset($_POST['przekaznik1']))
{
	$przekaznik1_zmiana= "UPDATE przekazniki SET stan=!stan WHERE przekaznik='przekaznik1'";
	mysqli_query($connect, $przekaznik1_zmiana) or die ('błąd zapytania 9');
	header("refresh:0");
}

if(isset($_POST['przekaznik2']))
{
	$przekaznik2_zmiana= "UPDATE przekazniki SET stan=!stan WHERE przekaznik='przekaznik2'";
	mysqli_query($connect, $przekaznik2_zmiana) or die ('błąd zapytania 10');
	header("refresh:0");
}

if(isset($_POST['przekaznik3']))
{
	$przekaznik3_zmiana= "UPDATE przekazniki SET stan=!stan WHERE przekaznik='przekaznik3'";
	mysqli_query($connect, $przekaznik3_zmiana) or die ('błąd zapytania 11');
	header("refresh:0");
}

if(isset($_POST['przekaznik4']))
{
	$przekaznik4_zmiana= "UPDATE przekazniki SET stan=!stan WHERE przekaznik='przekaznik4'";
	mysqli_query($connect, $przekaznik4_zmiana) or die ('błąd zapytania 12');
	header("refresh:0");
}
?>
</center>
</div>
<?php
	$temp=shell_exec('python3 /var/www/html/temp.py');
	echo'<br><h2 id="tytul1">Temperatura wynosi: '.$temp.'</h2>';
?>
</body>
</html>
