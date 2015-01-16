#University Management System

####SETUP INSTRUCTIONS

* Keep the project in your **Root Folder**<br/>
  If your are using **XAMPP** Go to **C:/XAMPP/htdocs/** and clone this repository
* **Database Setup:** <br/>
   Create a database name of your wish in your local development environment in **connections/connect.php** file
   replace your database name with **Project_Database_Name** in the file code looks as shown below
   
      <?php
        mysql_connect("localhost","root") or die("No Connection");
        mysql_select_db("Project_Database_Name") or die("No Database name");
      ?>

* Fireup your **MySQL and PHP** in  XAMPP control Panel in your browser go to
  [http://localhost/univ_management/](http://localhost/univ_management/)
* Default login Credentials :<br/>*User Id* : **admin** <br/> *Password* : **admin**
* Voila you are done !! You must see this page as shown in the below image<br/>
  ![HOme Page looks like this](https://github.com/ynagarjuna1995/univ_management/blob/master/picture/Home_page.png)
