<?php
$id="";
$_POST['msg']="Department Entry ";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))

	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub']) || isset($_POST['btn_upd'])){
	$facuties_name=$_POST['fnametxt'];
	$note=$_POST['notetxt'];	
	
if(ctype_alpha($facuties_name)==false)
{
		$_POST['msg']="Re-Enter Department name";
}
else if($facuties_name=="" || $note=="")
{
	$_POST['msg']="Please Enter Detail Please";
}
else
{
if(isset($_POST['btn_sub']))
{
$sql_ins=mysql_query("INSERT INTO facuties_tbl 
						VALUES(
							NULL,
							'$facuties_name',
							'$note'
							)
					");
}
if(isset($_POST['btn_upd'])){	
	$sql_update=mysql_query("UPDATE facuties_tbl SET 
								faculties_name='$fac_name',
								note='$note'
							WHERE
								faculties_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_faculties");
}
if($sql_ins==true)
	$msg="Department Detail Inserted";
else
	$msg="Insert Error:".mysql_error();
}	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SGGS University .::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM facuties_tbl WHERE faculties_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>

<div id="top_style">
        <div id="top_style_text">
        Department Update
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=View_Faculties"><input type="button" name="btn_view" value="Back" title="Department" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            
            <tr>
            	<td>Department Name</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox" value="<?php echo $rs_upd['faculties_name'];?>" />
                </td>
            </tr>
             <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="4"><?php  echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
            
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in"  />
                </td>
            </tr>
            </table>

   </div>

    </form>

</div><!-- end of style_informatios -->

<?php	
}
else
{
?>
<div id="top_style">
        <div id="top_style_text">
        	<?php echo $_POST['msg']; ?>
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=View_Faculties"><input type="button" name="btn_view" title="Department" value="Department" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            
            <tr>
            	<td>Department</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox" />
                </td>
            </tr>
             <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="4"></textarea>
                </td>
            </tr>
            
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
                </td>
            </tr>
            </table>

   </div>

    </form>

</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>