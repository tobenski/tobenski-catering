<?php 

$query = new WP_Query(array(
    'post_type' => 'page',
    'name' => 'catering',
    'posts_per_page' => 1,
));
    while($query->have_posts()){
        $query->the_post();
        get_header();
    } 
    wp_reset_query(  );
    get_template_part( '/partials/catering/navigation' ); 
?>
    
    <section class="flex w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <div class="card card-parent">
            <div class="card-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
            </div>
            <div class="card-content">                
                <a href="javascript:history.back()" class="card-back">
                    <i class="fas fa-arrow-left fa-lg fa-fw"></i>
                    <span class="uppercase text-lg tracking-tight font-bold ml-2">Tilbage</span>
                </a>
                <h2 class="card-header">
                    <?php the_title(); ?> 
                </h2>                
                <p>
                    <?php the_content(); ?> 
                </p>
                <hr class="mt-6 mb-2">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-users fa-2x fa-fw"></i>
                        <h6 class="card-header-small">Minimum <?php the_field('kuverter'); ?> personer.</h6>
                    </div>
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-check-double fa-2x fa-fw"></i>
                        <h6 class="card-header-small"><?php the_field('short_description'); ?></h6>
                    </div>
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-calendar fa-2x fa-fw"></i>
                        <h6 class="card-header-small">Bestil minimum <?php the_field('min_order_time'); ?> dage i forvejen</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flex w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <div class="card card-parent card-mirror">
            <div class="card-image">
                <img src="<?php echo get_field('event_secondary_image'); ?>" />
            </div>
            <div class="card-content">                
                <div class="card-header">
                    <h2>
                        Menu 
                    </h2>
                </div>
                <p>
                    <?php the_field('menu_content'); ?> 
                </p>
                <hr class="mt-6 mb-2">
                <div class="flex items-start justify-end mb-6">
                    <a class="btn btn-secondary"
                       href="mailto:<?php the_field('contact_email', 'option'); ?>?subject=Foresp%C3%B8rgelse%20p%C3%A5%20%5BANTAL%5D%20%22<?php the_title(); ?>%22%20Den%20%5BDATO%5D%20klokken%20%5BTIDSPUNKT%5D&body=Hej%20Det%20Gamle%20Posthus.%0D%0A%0D%0AVi%20vil%20gerne%20h%C3%B8re%20om%20det%20er%20muligt%20at%20bestille%20%5BANTAL%5D%20%22<?php the_title(); ?>%22%0D%0ATil%20%5BLEVERING%2FAFHENTNING%5D%20Den%20%5BDATO%5D%20klokken%20%5BTIDSPUNKT%5D%0D%0A%0D%0AKontakt%20oplysninger%3A%0D%0ANavn%3A%20%5BFORNAVN%20%26%20EFTERNAVN%5D%0D%0AE-mail%3A%20%5BEMAIL%20ADRESSE%5D%0D%0ATelefon%3A%20%5BTELEFON%20NUMMER%5D%0D%0A%0D%0AEvt.%20leverings%20adresse%3A%0D%0A%5BGADENAVN%20%26%20NUMMER%5D%0D%0A%5BPOSTNUMMER%20%26%20BY%5D%0D%0A%0D%0A">
                       Send forespørgelse
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section id="content" class="hidden md:flex flex-col w-full max-w-full pt-12 pb-16 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <?php  
        $args = array(
            'posts_per_page'    => -1,
            'post_type'         => 'catering',
            'post_parent'       => wp_get_post_parent_id(get_the_ID()),
            'orderby'           => 'menu_order',
            'order'             => 'ASC',
            'post__not_in'      => array(get_the_ID()),
        );
        $menu = new WP_Query($args);
        if ($menu->have_posts())
        {
        ?>
        <div class="flex w-full shadow-sm mt-12"
            x-data="{swiper: null}"
            x-init="swiper = new Swiper($refs.container, {
                loop: false,
                slidesPerView: 2,
                spaceBetween: 0,
                breakpoints: {
                    641: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    },
                    1025: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                    },
                    1281: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                    },
                },
                navigation: {
                    nextEl: '#next',
                    prevEl: '#prev',
                },
                })
                ">
            <div class="flex flex-col items-center justify-start w-1/4">
                <h3 class="w-full mb-2 font-mono font-semibold leading-tight tracking-tight uppercase sm:text-lg md:text-xl lg:text-3xl">Se også</h3>
                <div class="flex justify-start w-full">
                    <i id="prev" x-ref="prev" class="p-3 mx-4 text-4xl bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-left focus:outline-none"></i>
                    <i id="next" x-ref="next" class="p-3 mx-4 text-4xl bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-right focus:outline-none"></i>
                </div>
            </div><!-- Swiper.js -->
            <div class="w-3/4 swiper-container" x-ref="container">
                <div class="w-full swiper-wrapper">
                    <?php
                        while($menu->have_posts()) {
                            $menu->the_post();
                    ?>
                    <!-- The Slide -->
                    <div class="flex flex-col px-4 swiper-slide">
                        <a href="<?php the_permalink() ?>">
                            <div class="w-full px-4 mt-4 mb-6 h-60 card-small"> <!-- card DATA fra Menuer uden parents -->            
                                <img src="<?php the_post_thumbnail_url(); ?>" 
                                        alt="<?php the_post_thumbnail_caption() ?>" 
                                        class="object-cover object-center h-full min-w-full rounded-lg shadow-md">                
                                <div class="relative pl-4 -mt-40 -mr-8">
                                    <div class="p-6 bg-white rounded-lg shadow-lg">                    
                                        <div class="mt-1">
                                            <h4 class="mb-1 text-xl font-semibold leading-tight truncate"><?php the_title(); ?></h4>                                            
                                            <p class="mb-1 text-xs italic">
                                                Pris: <?php the_field('pris'); ?>,- per person
                                            </p>
                                        </div>
                                    </div>
                                </div>            
                            </div>
                        </a>                
                    </div>
                    <!-- end slide -->
                    <?php } ?>                    
                </div>
            </div>
        </div>
        <?php
        } else {
            echo 'no posts';
        }
        wp_reset_postdata();
        ?>
    </section> 

</main>
<?php get_footer( ); ?> 