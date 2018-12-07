<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
    <?php
session_start();
if(isset($_GET['Add_FriendID']))
{ 
   
//header("Location: profile/p_index.php");
  $UserID=$_SESSION['UserID'];
  $FriendID=$_GET['Add_FriendID'];
  $query = "INSERT INTO friends(UserID,FriendID) ";
  $query .= "VALUES('{$UserID}','{$FriendID}') ";      
  $send_query=mysqli_query($connection,$query);
      if(!$send_query)
      {
        die("ERROR!!".mysqli_error($connection));
      }
    $query="DELETE FROM add_user WHERE SenderID= '{$FriendID}' AND ReceiverID= '{$UserID}' ";
    $send_query=mysqli_query($connection,$query);
      if(!$send_query)
      {
        die("ERROR!!".mysqli_error($connection));
      }
    $_SESSION['Request_num']=$_SESSION['Request_num']-1;
    header("Location: requests.php");
}else if(isset($_GET['Decline_FriendID']))
{
    $UserID=$_SESSION['UserID'];
    $FriendID=$_GET['Decline_FriendID'];
    $query="DELETE FROM add_user WHERE SenderID= '{$FriendID}' AND ReceiverID= '{$UserID}' ";
    $send_query=mysqli_query($connection,$query);
      if(!$send_query)
      {
        die("ERROR!!".mysqli_error($connection));
      }
        $_SESSION['Request_num']=$_SESSION['Request_num']-1;
        header("Location: requests.php");
}
 
 
?>
    <!-- Navigation -->
<!--
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
             Brand and toggle get grouped for better mobile display 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
-->
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
<!--        </div>-->
        <!-- /.container -->
<!--    </nav>-->
<?php include "nav-bar.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
                    <!-- Side Bar start Entries Column -->

                       <!-- Side Bar end Entries Column -->

            <!-- Blog Entries Column -->
            <div class="col-md-8">
 <h1 class="page-header">Friend Requests</h1>
                
<!--              PUT YOUR SIGN UP FORM HERE-->
                <?php
             $userid= $_SESSION['UserID'];
             $query1="SELECT Nickname,Fname,Lname,ReceiverID,UserID,ProfilePic FROM add_user INNER JOIN users ON add_user.SenderID =users.UserID WHERE ReceiverID='{$userid}' ";
                    $send_query=mysqli_query($connection,$query1);
                      if(!$send_query)
                       {
                         die("ERROR!!".mysqli_error($connection));
                       } 
                    while($row1=mysqli_fetch_assoc($send_query))
                    {     

                        
                        if(empty($row1['Nickname']))
                       {
                            $name=$row1['Fname']." ".$row1['Lname'];
                           
                       }else{
                            $name=$row1['Nickname'];
                       }
                     $userID=$row1['ReceiverID'];
                     $FriendID=$row1['UserID'];
                     $ProfilePic=$row1['ProfilePic'];
                ?>
               
        
                <hr>
                <a href="profile/user_index.php?UserID=<?php echo $FriendID;?>"><img class="img-responsive img-thumbnail" width="100" height="100" src="pictures/profile-pic/<?php echo $ProfilePic?>" alt="" ></a>
                <a href="profile/user_index.php?UserID=<?php echo $FriendID;?>"><p class="lead"><?php echo $name?></p></a>
               <form action="" method="get">
                <a href="requests.php?Add_FriendID=<?php echo $FriendID?>"  class="btn btn-success">Accept</a>
                <a href="requests.php?Decline_FriendID=<?php echo $FriendID?>"  class="btn btn-danger">Decline</a>
                </form>
<hr>

                <?php } ?>
            </div>
       
            <!-- Blog Sidebar Widgets Column -->
     

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

     <?php include "footer.php";?>
