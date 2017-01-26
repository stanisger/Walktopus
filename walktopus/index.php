<?php $title = "Inicio"; ?>
<?php $is_home = true; ?>
<?php get_header(); ?>


<div class="section blogg">
	<div class="container-fluid">
		
		<div class="row categories_tab">
			<ul class="nav nav-tabs text-center">
				<li class="active"><a class="element-tab" data-toggle="tab" href="#todos">Todos</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#academicas">Académicas</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#arteycultura">Arte y Cultura</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#deportesyfitness">Deportes y Fitness</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#desarrolloprofesional">Desarrollo Profesional</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#idiomas">Idiomas</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#musica">Musica</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#saludybelleza">Salud y Belleza</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#hobbies">Hobbies</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#ontologia">Ontología</a></li>
			</ul>
		</div>
		
		<div class="row categories_dropdown">
			<div class="dropdown">
				<button id="categories_dropdown_btn" class="btn btn-primary dropdown-toggle btn-block btn-large" type="button" data-toggle="dropdown">Seleccione <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li class="active"><a class="element-tab" data-toggle="tab" href="#todos">Todos</a></li>
				<li class=""><a class="element-tab" data-toggle="tab" href="#academicas">Académicas</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#arteycultura">Arte y Cultura</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#deportesyfitness">Deportes y Fitness</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#desarrolloprofesional">Desarrollo Profesional</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#idiomas">Idiomas</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#musica">Musica</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#saludybelleza">Salud y Belleza</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#hobbies">Hobbies</a></li>
					<li class=""><a class="element-tab" data-toggle="tab" href="#ontologia">Ontología</a></li>
				</ul>
			</div>
		</div>

	</div>
</div>

<!--∆∆ Post Container ∆∆-->
<div class="container">
	<div class="tab-content elements">
       <!--∂∂ Todos los post ∂∂-->
    	<div id="todos" class="tab-pane fade in active">
    		<div class="row">
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-md-4">
                <div class="panel blogHub">
                    <div>
                        <figure class="blog" id="post">
                            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                            <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                        </figure>
                        <h4 class="w700" > <?php the_title(); ?></h4>
                        <p><?php echo get_excerpt(120); ?></p>
                        <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                        <div class="date">
                            <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                        </div>
                    </div>
                </div>
            </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
    	</div>


        <!--∂∂ Academias ∂∂-->
		<div id="academicas" class="tab-pane fade in">
            <div class="row">
             <?php query_posts( array( 'category_name' => 'Académias', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-md-4">
                <div class="panel blogHub">
                    <div>
                        <figure class="blog" id="post">
                            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                            <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                        </figure>
                        <h4 class="w700" > <?php the_title(); ?></h4>
                        <p><?php echo get_excerpt(120); ?></p>
                        <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                        <div class="date">
                            <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                        </div>
                    </div>
                </div>
            </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

        <!--∂∂ Deportes y Fitness-->
		<div id="arteycultura" class="tab-pane fade in">
           <div class="row">
                 <?php query_posts( array( 'category_name' => 'Arte y Cultura', 'post_type' => '' ) );  ?>
                 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
                 <?php endwhile; ?>
                     <div class="section pagination">
                        <div class="container">
                            <div class="pagination">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <?php pagination('« Anterior', 'Siguiente »'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 <?php endif; ?>     
            </div>      
        </div>

        <!--∂∂ Arte y cultura ∂∂-->
		<div id="deportesyfitness" class="tab-pane fade in">
             <div class="row">
             <?php query_posts( array( 'category_name' => 'Deportes y Fitness', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-md-4">
                <div class="panel blogHub">
                    <div>
                        <figure class="blog" id="post">
                            <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                            <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                        </figure>
                        <h4 class="w700" > <?php the_title(); ?></h4>
                        <p><?php echo get_excerpt(120); ?></p>
                        <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                        <div class="date">
                            <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                        </div>
                    </div>
                </div>
            </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

        <!--∂∂ Desarrollo profesional ∂∂-->
		<div id="desarrolloprofesional" class="tab-pane fade in">
			<div class="row">
             <?php query_posts( array( 'category_name' => 'Desarrollo Profesional', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

        <!--∂∂ Idiomas ∂∂-->
		<div id="idiomas" class="tab-pane fade in">
			<div class="row">
             <?php query_posts( array( 'category_name' => 'Idiomas', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

        <!--∂∂ Música ∂∂-->
		<div id="musica" class="tab-pane fade in">
			<div class="row">
             <?php query_posts( array( 'category_name' => 'Música', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

   		<!--∂∂ Salud y belleza ∂∂-->
		<div id="saludybelleza" class="tab-pane fade in">
			<div class="row">
             <?php query_posts( array( 'category_name' => 'Salud y Belleza', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>
        
        <!--∂∂ Hobbies ∂∂-->
		<div id="hobbies" class="tab-pane fade in">
            <div class="row">
             <?php query_posts( array( 'category_name' => 'Hobbies', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

       <!--∂∂ Ontologias ∂∂-->
		<div id="ontologia" class="tab-pane fade in">
           <div class="row">
             <?php query_posts( array( 'category_name' => 'Ontología', 'post_type' => '' ) );  ?>
             <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-6 col-md-4">
                    <div class="panel blogHub">
                        <div>
                            <figure class="blog" id="post">
                                <?php  if ( has_post_thumbnail() ) { the_post_thumbnail( '' ); } ?>
                                <div class="caption"> <a ><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></a></div>
                            </figure>
                            <h4 class="w700" > <?php the_title(); ?></h4>
                            <p><?php echo get_excerpt(120); ?></p>
                            <a href="<?php the_permalink();?>" class="btn-default">Leer más</a>
                            <div class="date">
                                <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em><?php comments_number( '', '', '% responses' ); ?></em>

                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
                 <div class="section pagination">
                    <div class="container">
                        <div class="pagination">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <?php pagination('« Anterior', 'Siguiente »'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>  
             <?php wp_reset_postdata(); ?>   
            </div>
		</div>

	</div>
</div>


<?php get_footer(); ?>