<?php

include ("script.php");
echo "
<html>
<head>
	<link rel='stylesheet' type='text/css' href='style.css' />
	<title>Księga gości na PHP</title>
</head><body>
	<!--Podłączenie --><form id='forma' action='script.php' method='post' enctype='multipart/form-data'>
	<h1>Księga gości</h1>
	<p>Wypełniając informacje w polu formularza, będziesz mógł wysłać nam wiadomość, referencję, komentarz itp.</p>
	<p>Imię użytkownika<br /><input type='text' name='name'></p>
	<p>Hasło użytkownika<br /> <input type='password' name='password'></p>
	<p>E-mail<br /><input type='text' name='email'></p>
	<p>Awatarka<br /><input type='file' name='avatar'> </p>
	<p>Wpisz teskt<br /><textarea name='message' cols='40' rows='7'></textarea></p></p>
	<p><input type='submit' name='submit'></p></form><br /><br />
	<h1 style='width:500px; margin-left:50px;'>Wpisy w naszej księdze gości:</h1>
</body></html>";

 // Łączymy się do BD
$db_host = 'localhost';
$db_user = 'root';
$db_password = '406';
$database = 'test';

mysql_connect($db_host, $db_user, $db_password);
mysql_select_db($database);
mysql_select_db('knyga'); // Wybieramy żądaną bazę danych
$r=mysql_query("SELECT * FROM knyga ORDER BY `id` DESC"); // Tworzymy SQL requesta, sortujemy wg. zmniejszenia ID
while($i<mysql_num_rows($r)) // Przewijamy wszystkie zapisy w tabeli
{
	$f=mysql_fetch_array($r); // Obsługuje szereg wyników zapytu, zwracając zbiór asocjacyjny, zbiór liczb lub obydwa
	print "<table id='zapysy'><tr id='z1'> <td> $f[1]<hr> </td></tr> <tr id='z2'> <td> <img src='$avatar' border=1 ALIGN=center HEITH=25 WIDTH=25> $f[2]:</td></tr><tr><td>$f[4] <a href=index.php?id=$f[0]> Edytuj</a></p> <br></td></tr></table>";
	// Wyświetlanie wartości w postaci HTML, gdzie $f[0], wartość pierwszej kolumny, $f[1] - wartość drugiej itd.
	$i++;
}
if (isset($_GET['id'])) include ("updateprofile.php");

?>


