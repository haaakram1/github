<?php include"include/db.php";?>

<?php include"include/header.php";?>


    <!-- Navigation -->
    <?php include"include/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
                <?php
                if(isset($_GET['pid'])){
                    $pid=$_GET['pid'];
                    
                }
                $query="SELECT * FROM posts WHERE post_id=$pid";
                $select_all_post_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_all_post_query)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                    
                
                
                
                
                
                
                
                
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php 
                    echo $post_date?> </p>
                <hr>
                <img src="images/<?php echo $post_image;?>" alt="" class="img-responsive">
                <hr>
                <p><?php echo $post_content?></p>
               

                <hr>               
                
                
             <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    
                  <?php 

    if(isset($_POST['create_comment'])) {

        $the_post_id = $_GET['pid'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];


        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {


             $query = "INSERT INTO comment (comm_post_id, comm_author, comm_email, comm_content, comm_status,comm_date)";

            $query .= "VALUES ($the_post_id ,'{$comment_author}', '{$comment_email}', '{$comment_content }', 'approved',now())";

            $create_comment_query = mysqli_query($connection, $query);

            if (!$create_comment_query) {
                die('QUERY FAILED' . mysqli_error($connection));


            }
          


        }
        
        $query2="UPDATE posts SET post_comment_count = post_comment_count + 1 ";
        $query2.="WHERE post_id=$the_post_id";
        $count_comment_query = mysqli_query($connection, $query2);
        

    }




?> 
                 <form action="#" method="post" role="form">

                <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" name="comment_author" class="form-control" name="comment_author">
                </div>

                <div class="form-group">
                    <label for="Author">Email</label>
                    <input type="email" name="comment_email" class="form-control" name="comment_email">
                </div>

                <div class="form-group">
                    <label for="comment">Your Comment</label>
                    <textarea name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>

            <?php
                
                 $query="SELECT * FROM comment WHERE comm_post_id=$pid AND comm_status='approved'";
                    $select_all_comment=mysqli_query($connection,$query);
                                 while($row=mysqli_fetch_assoc($select_all_comment)){
                        
                      $author= $row['comm_author'];
                     $comment=$row['comm_content'];
                      $date=$row['comm_date'];
               
            
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author;?>
                            <small><?php echo $date;?></small>
                        </h4>
                        <?php echo $comment?>
                    </div>
                </div>

               
                <?php }?>
               <?php }?>

                <!-- Second Blog Post -->
               
                <!-- Third Blog Post -->
              
                <!-- Pager -->
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include"include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
        <?php include"include/footer.php";?>


         

       