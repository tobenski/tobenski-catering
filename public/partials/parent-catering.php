<?php
/*
Template Name: Catering Parent
Template Post Type: catering
*/
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
?>
    <?php get_template_part( '/partials/catering/navigation' ); ?>

    <section class="flex max-w-full pb-12 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl overflow-x-hidden sm:overflow-x-auto">
        <div class="card card-parent">
            <div class="card-image">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" />
            </div>
            <div class="card-content">                
                <a href="javascript:history.back()" class="card-back">
                    <i class="fas fa-arrow-left fa-lg fa-fw"></i>
                    <span class="uppercase text-lg tracking-tight font-bold ml-2">Tilbage</span>
                </a>
                <div class="card-header">
                <h2>
                    <?php the_title(); ?> 
                </h2>                
                </div>
                
                <p>
                    <?php the_content(); ?> 
                </p>
                <hr class="mt-6 mb-2">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-users md:text-3xl "></i>
                        <h6 class="card-header-small">Minimum <?php the_field('kuverter'); ?> personer.</h6>
                    </div>
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-check-double md:text-3xl"></i>
                        <h6 class="card-header-small"><?php the_field('short_description'); ?></h6>
                    </div>
                    <div class="flex flex-col items-center w-1/3">
                        <i class="fas fa-calendar md:text-3xl"></i>
                        <h6 class="card-header-small">Bestil minimum <?php the_field('min_order_time'); ?> dage i forvejen</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
         $args = array(
            'post_type' => 'catering',
            'post_parent' => get_the_ID(),
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        $i = 1;
        $children = new WP_Query($args);
        if($children->have_posts())
        {
            while($children->have_posts())
            {
                $children->the_post();
                $i++;
                include get_stylesheet_directory(  ) . '/partials/catering/catering-card.php';
            }
        } else {
            echo 'No Children Posts';
        }
        wp_reset_postdata();
    ?>
    
    <section class="hidden md:flex flex-col max-w-full pb-12 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <?php  
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'catering',
            'meta_key' => 'sticky',
            'meta_value' => 1,
            'post_parent__not_in' => array(0, get_the_ID()),
        );
        $sticky = new WP_Query($args);
        if ($sticky->have_posts())
        {
        ?>
        <div class="flex w-full shadow-sm mt-12"
            x-data="{swiper: null}"
            x-init="swiper = new Swiper($refs.container, {
                loop: false,
                slidesPerView: 1,
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
                    slidesPerView: 3,
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
                        while($sticky->have_posts()) {
                            $sticky->the_post();
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
                                                Pris: <?php echo get_post_meta(get_the_ID(), 'pris', true); ?>,- per person
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