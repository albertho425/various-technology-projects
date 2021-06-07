<?php
include('logic.php');
include('functions.php');
displays_errors();
template_header(" Like and Dislike in PHP and MySQL" , "far fa-thumbs-up fa-2x" );
?>

<div class="container mt-5">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Display blog posts from database to bootstrap cards -->
<div class="row">
            <!-- Access query parameter and assign to value -->
            <?php foreach ($posts as $post): ?>
                    <div class="col-12 col-lg-4 d-flex justify-content-center">
                        <div class="card text-white bg-dark mt-5" style="width: 18rem;">
                            <div class="card-body">

                                <!-- display the blog title -->
                                <h5 class="card-title"><?php echo $post['title'];?></h5>
                                <!-- display the blog content -->
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['text']; ?></h6>
                                <div class="mt-2">
                                <ul class="list-group list-group-flush">
                                <!-- The category / tag of each post -->
                                <li class="list-group-item text-white bg-dark">
                                  <i class="fas fa-tag"></i>
                                  <?php echo $post['category']; ?>
                                </li>
                                </div>
                                <div class="mt-2">
                                <!-- calendar year of each post -->
                                <li class="list-group-item text-white bg-dark">
                                  <i class="fas fa-calendar-day"></i>
                                  <?php echo $post['posted']; ?>
                                </li>
                                </div>
                                <div class="mt-2">
                                <!-- number of likes / dislikes for each post -->
                                <li class="list-group-item text-white bg-dark">
                                  <i <?php if (userLiked($post['id'])): ?>
                                        class="fa fa-thumbs-up like-btn"
                                       <?php else: ?>
                                        class="fa fa-thumbs-o-up like-btn"
                                       <?php endif ?>
                                 data-id="<?php echo $post['id'] ?>"></i>
                                 <span class="likes"><?php echo getLikes($post['id']); ?></span>
                                 &nbsp;&nbsp;&nbsp;&nbsp;

       <!-- if user dislikes post, style button differently -->
         <i
           <?php if (userDisliked($post['id'])): ?>
              class="fa fa-thumbs-down dislike-btn"
           <?php else: ?>
              class="fa fa-thumbs-o-down dislike-btn"
           <?php endif ?>
           data-id="<?php echo $post['id'] ?>"></i>
         <span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
        </li>
        </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
            </div>

        </div>


<!-- Display blog posts from database to bootstrap cards -->



  <script src="jquery.js"></script>

<?php template_footer(); ?>
