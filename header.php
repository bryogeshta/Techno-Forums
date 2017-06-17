
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Techno Forums</title>
    <link rel="stylesheet" href="design.css" type="text/css">
</head>
<body>
<h1>Techno Forums</h1>
    <div id="wrapper">
    <div id="menu">
        <a class="item" href="home.php">Home</a> -
        <a class="item" href="create_topic.php">Create a topic</a>
          <?php 
        if(isset($_SESSION['UID']))
        {
        echo '-<a class="item" href="mytopic.php">My Topics</a>'; 
        if($_SESSION['UTID']==2)
        {
            echo '-<a class="item" href="userlist.php">UserList</a>';
        }
        }

        echo '<div id="userbar">';
        if(isset($_SESSION['UID']))
        {
            echo ' <a class="item" href="UserUpdate.php?id='.$_SESSION["UID"].'" >Hello '. $_SESSION['name'] .'</a> -
              <a href="logout.php" class="item">Log out</a>';
        }
        else
        {
            echo'
        <a href="login.php" class="item"> Login </a>-
        <a href="register.php" class="item"> Sign-up </a>';

        }
        ?>
        </div>
    </div>
    </div>
        <div id="content">