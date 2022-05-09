<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <section class="w section">
            <h2 class="section__header">
                Sklep
            </h2>
            <div class="filters">
                <h3 class="filters__header">
                    Kategoria:
                </h3>
                <div class="filters__selectWrapper">
                    <button class="filters__select" onclick="toggleCategories()">
                        <span>
                            <?php
                                echo $wp_query->get_queried_object()->name;
                            ?>
                        </span>
                        <span class="filters__select__arrow">
                            <i class="fa-regular fa-angle-down"></i>
                        </span>
                    </button>

                    <div class="filters__select__options">
                        <a class="filters__select__options__item" href="/sklep">
                            Wszystkie produkty
                        </a>
                        <?php
                        $args = array(
                            'taxonomy' => 'product_cat',
                            'orderby' => 'name',
                            'order' => 'ASC',
                            'hide_empty' => false
                        );
                        foreach(get_categories( $args ) as $category) {
                            ?>

                            <a class="filters__select__options__item" href="<?php echo get_term_link( $category, 'product_cat' ); ?>">
                                <?php
                                echo $category->name;
                                ?>
                            </a>

                            <?php
                        }
                        ?>
                    </div>
                </div>
                <h3 class="filters__header">
                    Sortuj według:
                </h3>
                <button class="filters__sort" onclick="sortByPriceAsc()">
                    Cena (od najniższej)
                </button>
                <button class="filters__sort" onclick="sortByPriceDesc()">
                    Cena (od najwyższej)
                </button>
                <button class="filters__sort" onclick="sortByName()">
                    Lista A-Z
                </button>
            </div>
            <div class="flex">

                <?php

                $loop = new WP_Query(array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'tax_query'      => array( array(
                        'taxonomy'   => 'product_cat',
                        'field'      => 'term_id',
                        'terms'      => array( get_queried_object()->term_id ),
                    ) )
                ));

                if($loop->have_posts()) {
                    while($loop->have_posts()) {
                        $loop->the_post();
                        global $product;
                        ?>
                        <div class="product">
                            <a class="flex" href="<?php echo get_permalink( $product->get_id() ); ?>">
                                <figure class="product__imgWrapper">
                                    <img class="img" src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="produkt" />
                                </figure>
                                <div class="product__right">
                                    <h3 class="product__name">
                                        <?php echo the_title(); ?>
                                    </h3>
                                    <h4 class="product__price">
                                        <?php echo $product->get_price_html(); ?>
                                    </h4>
                                    <p class="product__desc">
                                        <?php
                                        $full_excerpt = $product->get_short_description();
                                        if(strlen($full_excerpt) > 100) {
                                            echo substr($full_excerpt, 0, 100) . '...';
                                        }
                                        else {
                                            echo $full_excerpt;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </a>
                            <?php woocommerce_template_loop_add_to_cart($loop->post, $product); ?>
                        </div>
                        <?php
                    }


                    ?>
                <?php
                    wp_reset_postdata();
                }
                ?>
            </div>

            <nav class="pagination">
                <?php
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $loop->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => '<i class="fa-solid fa-angle-left"></i>',
                    'next_text'    => '<i class="fa-solid fa-angle-right"></i>',
                    'add_args'     => false,
                    'add_fragment' => '',
                ) );
                ?>
            </nav>
        </section>

        <section class="w section">
            <h4 class="section__header--plain">
                Korzyści
            </h4>
            <div class="icons flex">
                <div class="icons__item">
                    <figure class="icons__item__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/24-hours.svg'; ?>" alt="szybka-wysylka" />
                    </figure>
                    <h5 class="icons__item__header">
                        Szybka wysyłka
                    </h5>
                    <p class="icons__item__text">
                        Produkty wysyłamy nawet w ciągu 24 godzin.
                    </p>
                </div>
                <div class="icons__item">
                    <figure class="icons__item__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/exchange.svg'; ?>" alt="szybka-wysylka" />
                    </figure>
                    <h5 class="icons__item__header">
                        14 dni na zwrot
                    </h5>
                    <p class="icons__item__text">
                        Nasi klienci mają 14 dni na zwrot bez podania przyczyny.
                    </p>
                </div>
                <div class="icons__item">
                    <figure class="icons__item__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/like-it.svg'; ?>" alt="szybka-wysylka" />
                    </figure>
                    <h5 class="icons__item__header">
                        Gwarancja satysfakcji
                    </h5>
                    <p class="icons__item__text">
                        Nasze produkty gwarantują najwyższą jakość.
                    </p>
                </div>
                <div class="icons__item">
                    <figure class="icons__item__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/guarantee-certificate.svg'; ?>" alt="szybka-wysylka" />
                    </figure>
                    <h5 class="icons__item__header">
                        Produkt przebadany
                    </h5>
                    <p class="icons__item__text">
                        Sprzedawane przez nas suplementy są w pełni przebadane.
                    </p>
                </div>
            </div>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
