<?php $title = "Inicio"; ?>
<?php $is_home = true; ?>
<?php get_header(); ?>

<div class="section bloggSingle">
	<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8 single">
                <a href="blog-post.html" id="singleImg">
                         <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                </a>
                <!-- First Blog Post -->
                <div class="datesBlog row">
                 <ul class="dates col-xs-12 col-md-1"> 
                    <li>11</li> 
                    <li>nov</li>
                    <li>2016</li>
                 </ul> 
                 <div class="textDate col-xs-12 col-md-11">
                    <h2><a href="#"><?php the_title(); ?></a></h2>
                    <p class="plublising"> Publicado por <strong>Salavdor Romero</strong></p>
                 </div>   
                </div>
                <?php the_content(); ?>
                <h3 class="col-xs-12">Si quieres tomar clases de <strong><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></strong> da <a href="#">clic aquí</a>

                    <ul class="share">
                        <li><a href="#"><i class="flaticon-share"></i></a></li>
                        <li><a href="#"><i class="flaticon-facebook-logo"></i></a></li>
                        <li><a href="#"><i class="flaticon-twitter-logo-silhouette"></i></a></li>
                        <li><a href="#"><i class="flaticon-linkedin-logo"></i></a></li>
                    </ul>
                </h3>
             
               <!-- Comment -->
                <div class="media comments">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/blog/assets/images/blog/thumbComment.png" alt="">
                    </a>
                    <div class="media-body">
                        <h5 class="colorFontLight">
                            August Molliere
                        </h5> <br>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    </div>
                </div>
                  <!-- Comments Form -->
                <div class="leftComment">
                    <h4 class="colorFontLight" >Escribe un comentario o responde</h4>
                    <form role="form">
                         <div class="form-group">
                             <input type="text" placeholder="Nombre*" required>
                         </div>
                         <div class="form-group">
                             <input type="mail" placeholder="Correo*" required>
                         </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="6" placeholder="Mansaje"></textarea>
                        </div>
                        <button  type="submit" class="btn bgRed">ENVIAR</button>
                    </form>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4 widget">


                <!-- Blog Categories Well -->
                <div class="categorywell ">
                    <h4 class="wellTwo">Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include 'banner.php' ?>
            </div>

        </div>
        <!-- /.row -->
          <?php endwhile; ?>
         <?php endif; ?> 
    </div>
</div>
<?php get_footer(); ?>