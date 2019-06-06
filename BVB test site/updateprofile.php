<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Facebook Style profile edit</title>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>


<script type="text/javascript">
<?php 
$id = (int)$_GET['id'];
?>


$(document).ready(function()
{

$('.edit_link').click(function()
{
$('.text_wrapper').hide();
var data=$('.text_wrapper').html();
$('.edit').show();
$('.editbox').html(data);
$('.editbox').focus();
return false;
});

$(".editbox").mouseup(function() 
{
return false
});

$(".editbox").change(function() 
{
$('.edit').hide();
var boxval = $(".editbox").val();
var dataString = 'data='+ encodeURIComponent(boxval)+'id='+<?php echo $id?>;
$.ajax({
type: "POST",
url: "update_profile_ajax.php?id="+<?php echo $id?>,
data: dataString,
cache: false,
success: function(html)
{
$('.text_wrapper').html(boxval);
$('.text_wrapper').show();

}
});

});
 
$(document).mouseup(function()
{
$('.edit').hide();
$('.text_wrapper').show();
});

});
</script>
<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;

font-size:12px;
}
.mainbox
{
width:250px;
margin:50px;
}
.text_wrapper
{
border:solid 1px #0099CC;
padding:5px;
width:187px;



}
.edit_link
{
float:right
}
.editbox
{
overflow: hidden; height: 61px;border:solid 1px #0099CC; width:190px; font-size:12px;font-family:Arial, Helvetica, sans-serif; padding:5px
}
</style>
</head>

<body>
<div class="mainbox">
<a href="#" class="edit_link" title="Edit">Edit</a>
<?php
include("db.php");
$sql=mysql_query("SELECT `message` from `knyga` where `id` = '".$_GET['id']."' ");
$row=mysql_fetch_array($sql);
$profile=$row['message'];
?>
<div class="text_wrapper" style=""><?php echo $profile; ?></div>






<div class="edit" style="display:none"><textarea class="editbox" cols="23" rows="3"   name="profile_box"></textarea></div>

</div>
</body>
</html>
