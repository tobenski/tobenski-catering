<?php 
    get_header(); 
?>


    <section class="flex flex-wrap w-full max-w-full pt-12 pb-6 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <!-- MENU CARD-->
        <div class="card card-full">
            <div class="card-image">            
                <img src="<?php the_post_thumbnail_url(  ) ;?>">
            </div>
            <div class="card-content">
                <div class="card-header">
                <h2 class="text-center text-xl md:text-3xl"><?php the_title(); ?></h2>
                </div>
                <p><?php the_content(); ?></p>
            </div>            
        </div>
    </section>
    <section id="content" class="flex flex-col w-screen max-w-full p-0 pb-12 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl">
        <?php
        $args = array(
            'post_type' => 'catering',
            'post_parent' => 0,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        $parent_query = new WP_Query($args);
        if ($parent_query->have_posts())
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
                    slidesPerView: 2,
                    spaceBetween: 0,
                    loop: false,
                    },
                    1025: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                    loop: false,
                    },
                    1281: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                    loop: false,
                    },
                },
                navigation: {
                    nextEl: '#next',
                    prevEl: '#prev',
                },
            })
            ">

            <div class="w-full swiper-container" x-ref="container">
                <i id="prev" class="absolute z-10 top-1/3 left-0 -ml-2 p-3 mx-4 text-4xl opacity-75 hover:opacity-100 bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-left focus:outline-none"></i>
                <div class="w-full swiper-wrapper">
                    <?php
                        while($parent_query->have_posts()) {
                            $parent_query->the_post();
                    ?>
                    <!-- The Slide -->
                    <div class="flex flex-col swiper-slide">
                        <a href="<?php the_permalink() ?>">
                            <div class="w-full px-4 mt-4 mb-6 h-60 card-small">          
                                <img src="<?php the_post_thumbnail_url(); ?>" 
                                        alt="<?php the_post_thumbnail_caption() ?>" 
                                        class="object-cover object-center h-full min-w-full rounded-lg shadow-md">                
                                <div class="relative pl-4 -mt-40 -mr-8">
                                    <div class="p-6 bg-white rounded-lg shadow-lg">                    
                                        <div class="mt-1">
                                            <h4 class="mb-1 text-xl font-semibold leading-tight truncate"><?php the_title(); ?></h4>                                            
                                            <p class="mb-1 text-xs italic">
                                                fra <?php the_field('pris'); ?>,- per person
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
                <i id="next" class="absolute z-10 top-1/3 right-0 -mr-2 p-3 mx-4 text-4xl opacity-75 hover:opacity-100 bg-secondary rounded-full cursor-pointer hover:text-white hover:bg-secondary-hover fa fa-arrow-right focus:outline-none"></i>
            </div>
        </div>
        <?php
        } else {
            echo 'no posts';
        }
        wp_reset_postdata();
        ?>
    </section>
    <?php 
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'catering',
            'meta_key' => 'sticky',
            'meta_value' => 1
        );
        $i = 0;
        $sticky = new WP_Query($args);
        if($sticky->have_posts())
        {
            while($sticky->have_posts())
            {
                $sticky->the_post();
                $i++;
                include get_stylesheet_directory(  ) . '/partials/catering/catering-card.php';
            }
        } else {
            echo 'No Sticky Posts';
        }
        wp_reset_postdata();
    ?>

<?php get_footer(); ?>