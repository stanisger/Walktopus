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
                            <div class="caption"> <a href="#"><?php the_category(); ?></a></div>
                        </figure>
                        <h4 class="w700" > <?php the_title(); ?></h4>
                        <p><?php echo get_excerpt(300); ?><</p>
                        <a href="#" class="btn-default">Leer más</a>
                        <div class="date">
                            <span>25 de Octubre 2016</span> <i class="wt-chat colorAqua"></i> <em>4</em>
                        </div>
                    </div>
                </div>
            </div>
         <?php endwhile; ?>
         <?php endif; ?> 
        </div>
	</div>

        <!--∂∂ Todos los academias ∂∂-->
		<div id="academicas" class="tab-pane fade in">
			<div class="contnet">Academias</div>
		</div>

        <!--∂∂ Deportes y Fitness-->
		<div id="arteycultura" class="tab-pane fade in">Arte y Cultura</div>

        <!--∂∂ Arte y cultura ∂∂-->
		<div id="deportesyfitness" class="tab-pane fade in">
             <div class="contnet">Deportes y Fitness</div>
		</div>

        <!--∂∂ Desarrollo profesional ∂∂-->
		<div id="desarrolloprofesional" class="tab-pane fade in">
			<div class="contnet">Desarrollo Profesional</div>
		</div>

        <!--∂∂ Idiomas ∂∂-->
		<div id="idiomas" class="tab-pane fade in">
			<div class="contnet">Idiomas</div>
		</div>

        <!--∂∂ Música ∂∂-->
		<div id="musica" class="tab-pane fade in">
			<div class="contnet">Música</div>
		</div>

   		<!--∂∂ Salud y belleza ∂∂-->
		<div id="saludybelleza" class="tab-pane fade in">
			<div class="contnet">Salud y Belleza</div>
		</div>
        
        <!--∂∂ Hobbies ∂∂-->
		<div id="hobbies" class="tab-pane fade in">
             <div class="contnet">Hobbies</div>
		</div>

       <!--∂∂ Ontologias ∂∂-->
		<div id="ontologia" class="tab-pane fade in">
           <div class="contnet">Ontologia</div>
		</div>

	</div>
</div>


<div class="section pagination">
	<div class="container">
		<div class="pagination">
			<div class="row">
				<div class="col-xs-12 text-center">
					<ul>
						<li><a href=""> &#171; Anterior</a></li>
						<li><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="" class="active">3</a></li>
						<li>...</li>
						<li><a href="">6</a></li>
						<li><a href="">Siguiente &#187; </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    
var $img = $('#post');
var $singleImg = $('#singleImg');

$(function(){
   $img.find('img').css({
    'width' : '100%'
   })
    $singleImg.find('img').css({
    'width' : '100%'
   })

});

</script>
<?php get_footer(); ?>