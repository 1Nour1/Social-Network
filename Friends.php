<!DOCTYPE html>
<html lang="en">

<?php include "header.php";
    session_start(); 
?>
    <!-- Navigation -->

        <!-- /.container -->

<?php include "nav-bar.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
                    <!-- Side Bar start Entries Column -->

                       <!-- Side Bar end Entries Column -->

            <!-- Blog Entries Column -->
            <div class="col-md-8">
 <h1 class="page-header">Friends:</h1>
                
<!--              PUT YOUR SIGN UP FORM HERE-->
                <?php
             $userid= $_SESSION['UserID'];
             $query1="SELECT Nickname,Fname,Lname,FriendID as ID,ProfilePic FROM friends INNER JOIN users ON friends.FriendID =users.UserID WHERE friends.UserID='{$userid}' UNION SELECT Nickname,Fname,Lname,users.UserID as ID,ProfilePic FROM friends INNER JOIN users ON friends.UserID =users.UserID WHERE friends.FriendID='{$userid}'";
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
                     $ProfilePic=$row1['ProfilePic'];
                     $FriendID=$row1['ID'];        
                        
                           
                ?>
                
                <a href="profile/user_index.php?UserID=<?php echo $FriendID;?>"><img class="img-responsive img-thumbnail" width="100" height="100" src="pictures/profile-pic/<?php echo $ProfilePic?>" alt="" ></a>
                 <a href="profile/user_index.php?UserID=<?php echo $FriendID;?>"><p class="lead"><?php echo $name?></p></a>
                           
                <hr>

                <?php } ?>
            </div>
       
            <!-- Blog Sidebar Widgets Column -->
     

        </div>
        <!-- /.row -->


        <!-- Footer -->

     <?php include "footer.php";?>
