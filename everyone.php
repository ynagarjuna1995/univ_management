<?php
	session_start();
	
	require("conection/connect.php");
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
	
	
?>
<!doctype html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"></link>
    
	<link rel="stylesheet" href="../css/signin.css">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    

<body>
	


	   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="everyone.php?tag=home">Univeristy Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            
                <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Students <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?tag=Student_entry">Student Entry</a></li>
                            <li class="divider"></li>
                            <li><a href="?tag=View_Students">Student View</a></li>
                        </ul>
                </li>
                 <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Teachers <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?tag=Teachers_Entry">Teachers Entry</a></li>
                            <li class="divider"></li>
                            <li><a href="?tag=View_Teachers">Tecahers View</a></li>
                        </ul>
                </li>
                 <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Subjects <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?tag=Subject_Entry">Subject Entry</a></li>
                            <li class="divider"></li>
                            <li><a href="?tag=View_Subjects">Subject View</a></li>
                        </ul>
                </li>
                 <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Departments <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?tag=Faculties_Entry">Department Entry</a></li>
                            <li class="divider"></li>
                            <li><a href="?tag=View_Faculties">Department View</a></li>
                        </ul>
                </li>
                 <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">score <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?tag=Score_Entry">Score Entry</a></li>
                            <li class="divider"></li>
                            <li><a href="?tag=View_Scores">Score View</a></li>
                        </ul>
                </li>
                 <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="?tag=Users_Entry">Users Entry</a></li>
                            <li class="divider"></li>
                            <li><a href="?tag=View_Users">Users View</a></li>
                        </ul>
                </li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



		<?php
   						if($tag=="home")
                            include("home.php");
                        elseif($tag=="Student_entry")
                            include("Students_Entry.php");
                        elseif($tag=="Teachers_Entry")
                            include("Teachers_Entry.php");
                        elseif($tag=="Score_Entry")
                            include("Score_Entry.php");	
                        elseif($tag=="Subject_Entry")
                            include("Subject_Entry.php");
                        elseif($tag=="Faculties_Entry")
                            include("Faculties_Entry.php");
                        elseif($tag=="Users_Entry")
                            include("Users_Entry.php");	
                        elseif($tag=="View_Students")
                            include("View_Students.php");
						elseif($tag=="View_Teachers")
							include("View_Teachers.php");
						elseif($tag=="View_Subjects")
							include("View_Subjects.php");
						elseif($tag=="View_Scores")
							include("View_Scores.php");
						elseif($tag=="View_Users")
							include("View_Users.php");
						elseif($tag=="View_Faculties")
							include("View_Faculties.php");
						
						
						elseif($tag=="Test_Score")
							include("test_Scores.php");
												

		?>				
						

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   

</body>


                
                
         
                   
                