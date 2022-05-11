<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

	        <?php
	        if(is_page('Artykuły')) {
	        ?>
                <header class="entry-header">
                    <h1 class="entry-title">
                        Blog
                    </h1>
                </header>
                <section class="w section section--blogPage">
                    <div class="flex productsWrapper">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 100
                        );

                        $post_query = new WP_Query($args);

                        if($post_query->have_posts() ) {
                            while($post_query->have_posts() ) {
                                $post_query->the_post();
                                $post_id = get_the_ID();
                                $category_object = get_the_category($post_id);
                                $category_name = $category_object[0]->name;
                                ?>

                                <a href="<?php the_permalink() ?>" class="product product--blog">
                                    <figure class="blog__imgWrapper">
                                        <?php
                                        echo get_the_post_thumbnail();
                                        ?>
                                    </figure>
                                    <h5 class="blog__title">
                                        <?php
                                        echo the_title();
                                        ?>
                                    </h5>
                                    <p class="blog__excerpt">
                                        <?php
                                        echo get_field('zajawka');
                                        ?>
                                    </p>
                                    <span class="addToCartBtnWrapper">
                                    <button class="product__addToCartBtn">
                                        Czytaj dalej
                                        <img class="icon icon--next" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/arrow-next.svg'; ?>" alt="dalej" />
                                    </button>
                                </span>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </section>
            <?php
            }
	        else if(is_page('Kontakt')) {
	            ?>

                <section class="w section section--contact flex">
                    <div class="contact__data">
                        <h2 class="contact__data__header">
                            <?php
                                echo get_field('naglowek_danych_kontaktowych');
                            ?>
                        </h2>
                        <h3 class="contact__data__subheader">
                            <?php
                                echo get_field('adres_-_naglowek');
                            ?>
                        </h3>
                        <div class="contact__data__address">
                            <?php
                                echo get_field('adres');
                            ?>
                        </div>
                        <h3 class="contact__data__subheader">
	                        <?php
                                echo get_field('biuro_-_naglowek');
	                        ?>
                        </h3>
                        <div class="contact__data__address">
		                    <?php
                                echo get_field('biuro');
		                    ?>
                        </div>
                    </div>
                    <div class="contact__form">
                        <h2 class="contact__data__header">
                            <?php
                                echo get_field('naglowek_formularza');
                            ?>
                        </h2>
                        <h3 class="contact__data__subheader">
		                    <?php
		                        echo get_field('drugi_naglowek_formularza');
		                    ?>
                        </h3>
                        <?php
                            the_content();
                        ?>
                    </div>
                </section>

                    <?php
            }
	        else if(is_page('Metahuman')) {
                ?>
            <section class="w section section--contact">
                <div class="metahuman__headImage">
                    <img class="img" src="<?php echo get_field('glowne_zdjecie'); ?>" alt="metahuman" />
                </div>
                <div class="metahuman__section flex">
                    <figure class="metahuman__section__imgWrapper">
                        <img class="img" src="<?php echo get_field('zdjecie_1'); ?>" alt="metahuman" />
                    </figure>
                    <div class="metahuman__section__content">
                        <h4 class="metahuman__section__header">
                            <?php
                                echo get_field('naglowek_1');
                            ?>
                        </h4>
                        <div class="metahuman__section__text">
                            <?php
                                echo get_field('tekst_1');
                            ?>
                        </div>
                    </div>
                </div>
                <div class="metahuman__section flex">
                    <div class="metahuman__section__content">
                        <h4 class="metahuman__section__header">
			                <?php
			                echo get_field('naglowek_2');
			                ?>
                        </h4>
                        <div class="metahuman__section__text">
			                <?php
			                echo get_field('tekst_2');
			                ?>
                        </div>
                    </div>
                    <figure class="metahuman__section__imgWrapper">
                        <img class="img" src="<?php echo get_field('zdjecie_2'); ?>" alt="metahuman" />
                    </figure>
                </div>
                <div class="metahuman__section flex">
                    <figure class="metahuman__section__imgWrapper">
                        <img class="img" src="<?php echo get_field('zdjecie_3'); ?>" alt="metahuman" />
                    </figure>
                    <div class="metahuman__section__content">
                        <h4 class="metahuman__section__header">
				            <?php
				            echo get_field('naglowek_3');
				            ?>
                        </h4>
                        <div class="metahuman__section__text">
				            <?php
				            echo get_field('tekst_3');
				            ?>
                        </div>
                    </div>
                </div>
            </section>

                    <?php
            }
	        else {
		        while ( have_posts() ) :
			        the_post();

			        do_action( 'storefront_page_before' );

			        get_template_part( 'content', 'page' );

			        /**
			         * Functions hooked in to storefront_page_after action
			         *
			         * @hooked storefront_display_comments - 10
			         */
			        do_action( 'storefront_page_after' );

		        endwhile; // End of the loop
            }
	        ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
