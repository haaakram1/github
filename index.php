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
                $query="SELECT * FROM posts";
                $select_all_post_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($select_all_post_query)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                       $post_status=$row['post_status'];
                    $post_content=$row['post_content'];
                   $post_content_sub=substr($row['post_content'],0,100);
                    
                
                if($post_status == "draft"){
                    
                    
                   
                }
                
                
                
                else{
                
                
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?pid=<?php echo $post_id?>"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php 
                    echo $post_date?> </p>
                <hr>
                <a href="post.php?pid=<?php echo $post_id?>">
                <img src="images/<?php echo $post_image;?>" alt="" class="img-responsive">
            </a>
                <hr>
                <?php
                if(isset($_GET['readmore'])){
                    if($_GET['readmore']==$post_id){
                    
                    echo "<p>$post_content</p>";
                }
                     else{
                        echo "<p>$post_content_sub</p>"; 
                    }
                    }
                    else{
                        echo "<p>$post_content_sub</p>"; 
                    }
                ?>
               <?php
                echo"<a class='btn btn-primary' href='index.php?readmore=$post_id'>Read More
                <span class='glyphicon glyphicon-chevron-right'></span></a>"; ?>

                <hr>
                <?php }}?>

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


         

       