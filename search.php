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
 <h1 class="page-header">Result:</h1>
 <br>
                
<!--              PUT YOUR SIGN UP FORM HERE-->
<?php
//insert right button name
if(isset($_POST['Search']))
{//here i should put the name of the input
  $userid1=$_SESSION['UserID'];
  $search = mysqli_real_escape_string($connection,$_POST['Search_key']);
  
    $sql = "SELECT * FROM users WHERE Fname LIKE '%$search%' OR Lname LIKE '%$search%' OR Email LIKE '%$search%' OR Hometown LIKE '%$search%' ";
  
    $sql2 = " SELECT * FROM post WHERE ( Caption LIKE '%$search%' And Public=1 ) OR(Caption LIKE '%$search%' AND AuthorID IN (SELECT FriendID AS ID FROM friends INNER JOIN users ON friends.FriendID =users.UserID WHERE friends.UserID={$_SESSION['UserID']} UNION SELECT users.UserID AS ID FROM friends INNER JOIN users ON friends.UserID =users.UserID WHERE friends.FriendID={$_SESSION['UserID']})) ORDER BY PostTime DESC";


  $result = mysqli_query($connection, $sql);
  $result2 = mysqli_query($connection, $sql2);

  $queryResult = mysqli_num_rows($result);
  echo "<h3>There is ".$queryResult." result(s) in Users:</h3>";
  echo "<hr>";
  if ($queryResult > 0) {
      while ($row = mysqli_fetch_assoc($result)){
        $UserID=$row['UserID'];
        $Fname=$row['Fname'];
        $Lname=$row['Lname'];
        $ProfilePic=$row['ProfilePic'];
?>
        <img class="img-responsive img-thumbnail" width="100" height="100" src="pictures/profile-pic/<?php echo $ProfilePic?>" alt="" >
        <?php 
        if($UserID!=$_SESSION['UserID'])
        {
                ?>
       <a href="profile/user_index.php?UserID=<?php echo $UserID;?>"><?php echo $Fname." ".$Lname; ?></a>
                <?php
        }else{
            ?>
                  <a href="profile/p_index.php"><?php echo $Fname." ".$Lname; ?></a>
            <?php
        }
                ?>
       <hr>
     <?php
      }
  }
  $queryResult2 = mysqli_num_rows($result2);
  echo "<h3>There is ".$queryResult2." result(s) in Posts:</h3>";
  if ($queryResult2 > 0) {
      while ($row2 = mysqli_fetch_assoc($result2))
      {
          $Pid     = $row2['Pid'];
          $AuthorID= $row2['AuthorID'];
          $Caption = $row2['Caption'];
          $Image   = $row2['Image'];
          $PostTime= $row2['PostTime'];
          $query   ="SELECT Fname,Lname from users WHERE UserID= '{$AuthorID}'";
          $result  =mysqli_query($connection,$query);
          if(!$result)
          {
              die("ERROR".mysqli_error($connection));
          }
           $row1=mysqli_fetch_assoc($result);
           $Fname=$row1['Fname'];
           $Lname=$row1['Lname'];
        ?>
        <p class="lead">
        <?php 
            if($AuthorID!=$_SESSION['UserID'])
        {
                ?>
       <a href="profile/user_index.php?UserID=<?php echo $AuthorID;?>"><?php echo $Fname." ".$Lname;?></a> Posted:
                <?php
        }else{
            ?>
                  <a href="profile/p_index.php?"><?php echo $Fname." ".$Lname;?></a> Posted:
            <?php
        }
                ?>
                </p>
                <img class="img-responsive" src="pictures/post-pic/<?php echo $Image;?>" alt="">
                <p><?php echo $Caption;?></p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $PostTime;?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
    <?php
      }
  }

}

 ?>

            </div>
       
            <!-- Blog Sidebar Widgets Column -->
     

        </div>
        <!-- /.row -->


        <!-- Footer -->

     <?php include "footer.php";?>
