 <?php 
    if ( in_category( 'Académias' )) {             
            include 'banners/academiaBanner.php';
        } elseif ( in_category( 'Arte y Cultura' )) {
            include 'banners/arteBanner.php';
        } elseif (in_category('Deportes y Fitness' )) {
            include 'banners/deporteBanner.php';
        }elseif (in_category('Desarrollo Profesional' )) {
           include 'banners/profesionalBanner.php';
        }elseif (in_category('Música' )) {
            include 'banners/musicaBanner.php';
        } elseif (in_category('Idiomas' )) {
           include 'banners/idiomaBanner.php';
        }elseif (in_category('Salud y Belleza' )) {
            include 'banners/saludBanner.php';
        }elseif (in_category('Hobbies' )) {
            include 'banners/hobbieBanner.php';
        }elseif (in_category('Ontología' )) {
            include 'banners/ontologiaBanner.php';
        }else{
          include 'banner.php';
        }                   
  ?>