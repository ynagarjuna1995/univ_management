<?php
$_POST['msg']="User Entry";
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_upd']) || isset($_POST['btn_sub']))
{
	$username=$_POST['usertxt'];
	$pwd=$_POST['pwdtxt'];
	$type=$_POST['typetxt'];
	$note=$_POST['notetxt'];	

if(strlen($username) <5 )
{
$_POST['msg']="UserName Length Aleast 5";
}
else if(strlen($pwd) <8)
{
$_POST['msg']="Password Length Aleast 8";
}	
else if($type!="admin" && $type!="user")
{
$_POST['msg']="Type must admin or User";
}
else if($username=="" || $pwd=="" || $type=="")
{
$_POST['msg']="Please Enter All Detail";

} 
else
{
if(isset($_POST['btn_sub']))
{
$sql_ins=mysql_query("INSERT INTO users_tbl 
						VALUES(
							NULL,
							'$username',
							'$pwd' ,
							'$type',
							'$note'
							)
					");
}
if(isset($_POST['btn_upd'])){	
	$sql_update=mysql_query("UPDATE users_tbl SET 
								username='$username' ,
								password='$pwd' , 
								type='$note' ,
								note='$note'
							WHERE
								u_id=$id
							");
	if($sql_update==true)
		header("location:?tag=view_users");
}
if($sql_ins==true)
	$msg="USER SUCCESSFULL SIGN UP";
else
	$msg="Insert Error:".mysql_error();
	
}
}
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Users Entry</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>
<?php
if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM users_tbl WHERE u_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
?>
	<div id="top_style">
        <div id="top_style_text">
        Users Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=View_Users"><input type="button" name="btn_view" value="Back"  title="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table class="table">
        
            <tr>
            	<td>Username </td>
            	<td>
                	<input type="text" name="usertxt" id="textbox" value="<?php echo $rs_upd['username'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Password</td>
            	<td>
                	<input type="text" name="pwdtxt" id="textbox" value="<?php  echo $rs_upd['password'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Type</td>
            	<td>
                	<input type="text" name="typetxt" id="textbox"  value="<?php echo $rs_upd['type'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="5"><?php echo $rs_upd['note'];?></textarea>
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
            	<a href="?tag=View_Users"><input type="button" name="btn_view" value="View_Users"  title="View Users" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        
            <tr>
            	<td>Username </td>
            	<td>
                	<input type="text" name="usertxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Password</td>
            	<td>
                	<input type="text" name="pwdtxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Type</td>
            	<td>
                	<input type="text" name="typetxt" id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="5"></textarea>
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