<?php

session_start();
include 'dbc.php';
include 'header.php';
include 'leftmenu.php';
$tid=$_GET['id'];
?>

<div class="right-menu">
<div class="topic">


<?php
$res = $conn->query("SELECT * from Topic WHERE TID='$tid'");
$row = $res->fetch_assoc();

$topic = $row['Topic'];
$desc = $row['TopicContents'];
$postdate = $row['PostDate'];
$ttid = $row['TTID'];
$tuid = $row['UID'];

$result = $conn->query("SELECT UName FROM User where UID=$tuid");
$row2 = $result->fetch_assoc();
$uname = $row2['UName'];
echo '<div class="topicname">';
	echo '<p>'.$topic.'</p>';
	echo '<br> <hr>';
	echo'Original Poster : <a href="usertopic.php?id='.$tuid.'">'.$uname.'</a> &nbsp; &nbsp; &nbsp;';
	echo '&nbsp;
	&nbsp;
	&nbsp;';
	echo'Date Created : '.$postdate;
	echo '&nbsp;
	&nbsp;
	&nbsp;
	';

	if(isset($_SESSION['UID']) )
	{
		if ($_SESSION['UID']==$tuid OR $_SESSION['UTID']==2)
		{
			echo '<a href="deletetopic.php?id='.$tid.'"> Delete Post </a>';
		}
	}

echo'</div>';
echo '<div class="description">';
	echo $row['TopicContents'];
	
echo'</div> </div>';
echo '<div class="reply-container">';
	$sql = "SELECT * from Reply where TID=$tid ORDER BY ReplyDate asc";
	$res = $conn->query($sql);
	while($row = $res->fetch_assoc())
	{
	$rid = $row['RID'];
	$reply=$row['Reply'];
	$replydate = $row['ReplyDate'];
	$ruid = $row['UID'];
	
	$result = $conn->query("SELECT UName FROM User where UID=$ruid");
	$row2 = $result->fetch_assoc();
	$uname = $row2['UName'];


		echo '<div class="replies">';
		echo $reply;
		echo '<br><hr>
			Original Poster : <a href="usertopic.php?id='.$ruid.'">'.$uname.'</a> &nbsp; &nbsp; &nbsp;
			Date Created : '.$replydate.' &nbsp; &nbsp; &nbsp;';
			if(isset($_SESSION['UID']) )
	{
		if ($_SESSION['UID']==$tuid OR $_SESSION['UTID']==2 OR $_SESSION['UID']==$ruid)
		{
			echo '<a href="deletereply.php?id='.$rid.'"> Delete Reply </a>';
		}
	}

		echo '</div>';
	}
echo '</div>';
echo '<div class="form">';
if(isset($_SESSION['UID']))
{	
	$id= $_SESSION['UID'];
?>


    <form name="Reply" method="post" >
    <div class="formelement">
          <label> Reply: </label> 
    </div>
        <div class="formelement">
        <textarea  class="textarea" name="reply" placeholder="Reply" required="required"></textarea>
    </div>  
   
    <div class="formelement" >
    <input type="submit" name="Reply" value ="Reply" class="button" />
    </div>



    </form>

    </div>

<?php

  if(isset($_POST['Reply']))
  {

  $reply=$_POST['reply'];

  $query = "INSERT INTO Reply VALUES('','$reply',NOW(),'$tid','$id')";
  if ($conn->query($query)===TRUE)
    {
    header('Location: topic.php?id='.$tid);
  }
  else
    echo '<script> alert("Error! Try again.")</script>';

}
}
else
	echo 'Please <a href="login.php"> Login </a> to reply.';	

echo '</div>';
include 'footer.php';
 ?>