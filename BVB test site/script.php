<?php
	//�������� ������ ��� ����
	//���������� ����� ���� �����
	if(!empty($_POST)){	
		$name=$_POST['name'];
		$email=$_POST['email'];
		$message=$_POST['message'];
		$avatar=$_FILES['avatar'];
	}
	//  ϳ���������� �� ��
	$db_host = 'localhost';
	$db_user = 'root';
	$db_password = '406';
	$database = 'test';
	
	mysql_connect($db_host, $db_user, $db_password);
	mysql_select_db($database);
	
	$name=$_FILES['avatar']['name'];
	$size=$_FILES['avatar']['size'];
	$tmp_name=$_FILES['avatar']['tmp_name'];
	
		if (isset($avatar))
		{
		$location="avatars/.$name";
		move_uploaded_file($tmp_name,$location);
		$avatarload = mysql_query("UPDATE `books`.`knyga` SET `avatar`='$location' WHERE 'id'=$id");
			echo "<a href=index.php>������ ���������! �����������. </a></p>";
		}
		else 
		{ 
			$avatar = "avatars/no_name.jpg"; 
			//echo "����������� ��� �� ������������. <a href=index.php> �����������. </a></p>";
		}
	mysql_query("CREATE TABLE IF NOT EXISTS knyga (`id` int(10) unsigned NOT NULL auto_increment, `avatar` varchar(100), 
	`date_created` datetime NOT NULL, `name` text, `email` text, `message` text,  PRIMARY KEY  (`id`) ) 
	ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6849") or die(mysql_error());

	//�������� � �� ��� ����
	  
	$result = mysql_query("INSERT INTO `books`.`knyga` (`id`, `avatar`, `date_created`, `name`, `email`, `message`)
                  VALUES ('', $avatar, NOW(), '$name', '$email', '$message')");
	if (!$result) {
	$feedback = '������� - ������� ���� �����';
	$feedback .= mysql_error();
	return $feedback;

	}
	//������ ���� ��� ����� ����� ��� ����� ����� � �������� ����
	$address = 'denys.marytchak@gmail.com';
	$sub = "��� ��������� ���� ���� ������ �����������";
	$mes = "̳��� ��� ������ �����������: $name \n������ ������: $email \n���� �����: $message";
	//³���������� ���� ������������ ��� ����� ����� � ����
	$verify = mail ($address,$sub,$mes,"Content-type:text/plain; charset = utf_8\r\nFrom:$email");
	if ($verify == 'true')
	{
		echo "<p>����������� ����������<br /><br />
		<a href=index.php>����������� �����</a></p>";
	}
	else
	{
		echo "<p>����������� �� ����������</p>";
	}
?>
