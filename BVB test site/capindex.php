
<head>
<title>Тест</title>
<meta http-equiv="Content-Type" content="text/html;charset=windows-1251" />
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<img src="captcha.php" width="120" height="20" /><br />
Введите капчу: <input type="text" name="capcha" /><br />
<input type="submit" value="Wyślij" />
</form>
</body>
</html>

<?php 
// Wprawdzamy czy capcha była wprowadzona 
if(isset($_POST['capcha']))
{ 
$code = $_POST['capcha']; // Odbior przekazanej capchy. 
session_start(); 

// Porownujemy wprowadzoną capche z zachowaną w zmiennej 
if(isset($_SESSION['capcha']) && strtoupper($_SESSION['capcha']) == strtoupper($code))  
{echo 'Poprawna!';} 
else 
{echo 'Nie poprawna!';} 

// Kasujemy capche z sesji
unset($_SESSION['capcha']);  

exit(); 
} 
?>