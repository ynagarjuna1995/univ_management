<?php
$id="";
$_POST['msg']="Students Entry Page";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
//--------------add data-----------------	
if(isset($_POST['btn_upd']) || isset($_POST['btn_sub']))
{

	$f_name=$_POST['fnametxt'];
	$l_name=$_POST['lnametxt'];
	$gender=$_POST['gender'];
	$dob=$_POST['yy']."/".$_POST['mm']."/".$_POST['dd'];
	$pob=$_POST['pobtxt'];
	$addr=$_POST['addrtxt'];
	$phone=$_POST['phonetxt'];
	$mail=$_POST['emailtxt'];
	$note=$_POST['notetxt'];	


if(ctype_alpha($f_name)==false || ctype_alpha($l_name)==false || ctype_alpha($pob)==false)
{
	$_POST['msg']="Please Enter Alphabet only";
}

else if(strlen($phone) != 10  || !preg_match("/^[0-9]{10}$/",$phone))
{
$_POST['msg']="Please Enter Valid Phone Number";
}
else if($_POST['fnametxt']=="" || $_POST['lnametxt']== "" || $_POST['pobtxt']=="" || $_POST['phonetxt']=="" || $_POST['phonetxt']=="" || $_POST['notetxt']=="")
{
$_POST['msg']="Please Enter All Detail";
}
else
{

if(isset($_POST['btn_sub']))
{
$sql_ins=mysql_query("INSERT INTO stu_tbl 
						VALUES(
							NULL,
							'$f_name',
							'$l_name' ,
							'$gender',
							'$dob',
							'$pob',
							'$addr',
							'$phone',
							'$mail',
							'$note'
							)
					");

}
if(isset($_POST['btn_upd']))
{
	$sql_update=mysql_query("UPDATE stu_tbl SET 
								f_name='$f_name',
								l_name='$l_name' ,
								gender='$gender',
								dob='$dob',
								pob='$pob',
								address='$addr',
								phone='$phone',
								email='$mail',
								note='$note'
							WHERE
								stu_id=$id
							");
if($sql_ins==true)
		header("location:?tag=view_students");

}
if($sql_ins==true)
	$_POST['msg']="Student Record Inserted Successfully";
else
	$_POST['msg']="Insert Error:".mysql_error();
	
}

}
?>


<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet"  type="text/css" href="css/style_entry.css" />
<link href="css/bootstrap.min.css" rel="stylesheet"></link>
<title>::. University Database .::</title>
</head>
<body>
<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM stu_tbl WHERE stu_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	list($y,$m,$d)=explode('-',$rs_upd['dob']);
?>

<!-- for form Upadte-->

<div id="top_style">
        <div id="top_style_text">
        Students Update </div>
        <!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=View_Students"><input type="button" name="btn_view" title="View Students" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

 <div class="container">
<div id="style_informations">
	<form method="post" >
    	<div>
    	<table class="table">
        	<tr>
               <thead>
            	<td>First Name:</td>
               </thead> 
            	<td>
                	<input type="text" name="fnametxt" id="textbox" value="<?php echo $rs_upd['f_name'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Last Name:</td>
            	<td>
                	<input type="text" name="lnametxt" id="textbox" value="<?php echo $rs_upd['l_name'];?>"/>
                </td>
            </tr>
            
            <tr>
            	<td>Gender:</td>
                <td>
                	<input type="radio" name="gender" value="Male" <?php if($rs_upd['gender']=="Male") echo "checked";?> />Male
                    <input type="radio" name="gender" value="Female" <?php if($rs_upd['gender']=="Female") echo "checked";?>/>Female
                </td>
            </tr>
            
            <tr>
            	<td>Date Of Birth:</td>
                <td>
                	<select name="yy" >
                    	<option>years</option>
                    	
                        <?php
							$sel="";
							for($i=1985;$i<=2015;$i++){	
								if($i==$y){
									$sel="selected='selected'";}
								else
								$sel="";
							echo"<option value='$i' $sel>$i </option>";
							}
							
						?>
                       
                	</select>
                    -
                    <select name="mm">
                    	<option>Month</option>
						<?php
							$sel="";
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
									if($i==$m){
										$sel=$sel="selected='selected'";}
									else
										$sel="";
                                echo"<option value='$i' $sel> $mon</option>";		
                            }
                        ?>
                    </select>
                    -
                    <select name="dd">
                    	<option>Date</option>
						<?php
						$sel="";
                        for($i=1;$i<=31;$i++){
							if($i==$d){
								$sel=$sel="selected='selected'";}
							else
								$sel="";
                        ?>
                        <option value="<?php echo $i ;?>"<?php echo $sel?> >
                        <?php
                        if($i<10)
                            echo"0"."$i" ;
                        else
                            echo"$i";	
							  
						?>
						</option>	
						<?php 
						}?>
					</select>
                </td>
            </tr>
            
            <tr>
            	<td>Place Of Brith:</td>
                <td>
                	<input type="text" name="pobtxt" id="textbox" value="<?php echo $rs_upd['pob'];?> "/>
                
                </td>
            </tr>
            <tr>
            	<td>Address:</td>
            	<td>
                	<textarea name="addrtxt" cols="22" rows="3"> <?php echo $rs_upd['address'];?></textarea>
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
 
	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            
            <tr>
            	<td>Phone:</td>
            	<td>
                	<input type="text" name="phonetxt" id="textbox" value="<?php echo $rs_upd['phone'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>E-mail:</td>
                <td>
                	<input type="text" name="emailtxt"  id="textbox" value="<?php echo $rs_upd['email'];?> "/>
                </td>
            </tr>
            
            <tr>
            	<td>Note:</td>
                <td>
                	<textarea name="notetxt" cols="22" rows="5"><?php echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
    	</table>
  </div>
    </form>

</div><!-- end of style_informatios -->
</div>

<?php	
}
else
{
?>
<!-- for form Register-->
	
<div id="top_style">
        <div id="top_style_text">        
<?php echo $_POST['msg']; ?>
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=View_Students"><input type="button" name="btn_view" title="View Students" value="View_Students" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->
<div id="style_informations">
	<form method="post" >
    <div>
   	  <table border="0" cellpadding="4" cellspacing="0">
        	<tr>
            	<td>First Name:</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox"/>
                </td>
            </tr>
            
            <tr>
            	<td>Last Name:</td>
            	<td>
                	<input type="text" name="lnametxt" id="textbox"/>
                </td>
            </tr>
            
            <tr>
            	<td>Gender:</td>
                <td>
                	<input type="radio" name="gender" value="Male" checked="checked" />Male
                    <input type="radio" name="gender" value="Female"/>Female
                </td>
            </tr>
            
            <tr>
            	<td>Date Of Birth:</td>
                <td>
                	<select name="yy" >
                    	<option>Year</option>
                        <?php
							
							for($i=1985;$i<=2015;$i++){	
							echo"<option value='$i'>$i</option>";
							}
						?>
               	  </select>
                    -
                    <select name="mm">
                    	<option>Month</option>
						<?php
                            $mm=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","NOv","Dec");
                            $i=0;
                            foreach($mm as $mon){
                                $i++;
                                echo"<option value='$i'> $mon</option>";		
                            }
                        ?>
                    </select>
                    -
                    <select name="dd">
                    	<option>Date</option>
						<?php
                        for($i=1;$i<=31;$i++){
                        ?>
                        <option value="<?php echo $i; ?>">
                        <?php
                        if($i<10)
                            echo"0".$i;
                        else
                            echo"$i";	  
						?>
						</option>	
						<?php 
						}?>
					</select>
              </td>
        </tr>
            
            <tr>
            	<td>Place Of Brith:</td>
                <td>
                	<input type="text" name="pobtxt" id="textbox"/>
                
                </td>
            </tr>
            <tr>
            	<td>Address:</td>
            	<td>
                	<textarea name="addrtxt" cols="22" rows="3"></textarea>
    			</td>
        	</tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Register" id="button-in"  />
                </td>
            </tr>
	  </table>
    </div>
 
	<div>
	  <table border="0" cellpadding="4" cellspacing="0">
	    <tr>
	      <td>Phone:</td>
	      <td><input type="text" name="phonetxt" id="textbox" /></td>
        </tr>
	    <tr>
	      <td>E-mail:</td>
	      <td><input type="email" name="emailtxt"  id="textbox" /></td>
        </tr>
	    <tr>
	      <td>Note:</td>
	      <td><textarea name="notetxt" cols="22" rows="5"></textarea></td>
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