<div class="col-md-3">
<div class="well">
<!--  <?//php session_start();?>  -->
   <img class="img-responsive img-thumbnail" width="250" height="200" src="pictures/profile-pic/<?php echo $_SESSION['ProfilePic']?>" alt="" >
    <h4>  Welcome <?php 
        if(!empty($_SESSION['Nickname'])){
           echo $_SESSION['Nickname'];    
        }else{
            echo $_SESSION['Fname']." ".$_SESSION['Lname'];
        }
        
        ?>
        </h4>
    
</div>
                <!-- Blog Search Well -->
<!--
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                     /.input-group 
                </div>
-->

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                          <ul class="list-unstyled">
                           <li>
                        <i class="fa fa-fw fa-dashboard"></i> BIO:<?php echo $_SESSION['Bio'];?>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-desktop"></i> Gender:<?php  if($_SESSION['Gender']==1){echo"Male";}else{echo "Female";}?>
                    </li>
                   
                    <li>
                        <i class="fa fa-fw fa-wrench"></i> Birthdate:<?php echo $_SESSION['Birthdate'];?>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-wrench"></i> Status:<?php echo $_SESSION['RelationshipStatus'];?>
                    </li>
                    <li>
                        <i class="fa fa-fw fa-wrench"></i> Lives In:<?php echo $_SESSION['Hometown'];?>
                    </li>
                                
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->


            </div>