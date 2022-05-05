<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Enqueue scripts */
function metahuman_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap', false );
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), 1.0, false);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'metahuman_scripts' );

/* Header */
function remove_header_actions() {
    remove_all_actions('storefront_header');
    remove_all_actions('storefront_content_top');
}
add_action('wp_head', 'remove_header_actions');

function metahuman_header() {
    ?>
    <!-- HEADER -->
    <aside class="topBar w flex d-desktop">
        <a href="mailto:sales@metahuman.com.pl" class="flex topBar__link topBar__link--mail">
            <img class="icon icon--mail" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/email.svg'; ?>" alt="email" />
            Napisz do nas: sales@metahuman.com.pl
        </a>
        <div class="topBar__right flex">
            <a href="" class="topBar__link flex">
                <img class="icon icon--user" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/user.svg'; ?>" alt="panel-klienta" />
                Panel klienta
            </a>
            <a href="" class="topBar__link flex">
                <img class="icon icon--cart" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/cart.svg'; ?>" alt="koszyk" />
                Twój koszyk (0.00 PLN)
            </a>
        </div>
    </aside>
    <header class="topBar topBar--mobile d-mobile flex">
        <div class="center">
            <a href=".." class="topBar__logoWrapper">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/logo-footer.png'; ?>" alt="meta-human" />
            </a>
        </div>
        <div class="topBar--mobile__header flex">
            <button class="topBar__btn" onclick="openMobileMenu()">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/menu.svg'; ?>" alt="menu" />
            </button>
            <a class="topBar__btn" href="..">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/user.svg'; ?>" alt="panel-klienta" />
            </a>
            <a class="topBar__btn" href="..">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/cart.svg'; ?>" alt="koszyk" />
            </a>
        </div>
        <div class="mobileMenu d-mobile">
            <button class="closeBtn" onclick="closeMobileMenu()">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/close.svg'; ?>" alt="zamknij" />
            </button>

            <a href=".." class="mobileMenu__logoWrapper">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/logo.png'; ?>" alt="logo" />
            </a>

            <ul class="mobileMenu__list">
                <li class="topHeader__menu__item">
                    <a class="mobileMenu__header" href="..">
                        Sklep
                    </a>
                    <ul class="topHeader__menu__submenu">
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Regeneracja
                            </a>
                        </li>
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Siła
                            </a>
                        </li>
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Nastrój
                            </a>
                        </li>
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Zestawy
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="topHeader__menu__item">
                    <a href=".." class="topHeader__menu__item__link">
                        Metahuman
                    </a>
                </li>
                <li class="topHeader__menu__item">
                    <a href=".." class="topHeader__menu__item__link">
                        Blog
                    </a>
                </li>
                <li class="topHeader__menu__item">
                    <a href=".." class="topHeader__menu__item__link">
                        Kontakt
                    </a>
                </li>
            </ul>
        </div>
    </header>
    <header class="w flex topHeader d-desktop">
        <a href=".." class="topHeader__logoWrapper">
            <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/logo.png'; ?>" alt="meta-human" />
        </a>
        <label class="topHeader__search">
            <input class="input"
                   placeholder="Wyszukaj produkt..." />
        </label>
        <ul class="topHeader__menu flex">
            <li class="topHeader__menu__item">
                <span class="topHeader__menu__item__link topHeader__menu__item__link--dropdown flex">
                    Sklep
                    <img class="icon icon--arrowDown" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/arrow-down.svg'; ?>" alt="rozwin" />
                    <ul class="topHeader__menu__submenu">
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Regeneracja
                            </a>
                        </li>
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Siła
                            </a>
                        </li>
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Nastrój
                            </a>
                        </li>
                        <li class="topHeader__menu__submenu__item">
                            <a href="" class="topHeader__menu__submenu__item__link">
                                Zestawy
                            </a>
                        </li>
                    </ul>
                </span>
            </li>
            <li class="topHeader__menu__item">
                <a href=".." class="topHeader__menu__item__link">
                    Metahuman
                </a>
            </li>
            <li class="topHeader__menu__item">
                <a href=".." class="topHeader__menu__item__link">
                    Blog
                </a>
            </li>
            <li class="topHeader__menu__item">
                <a href=".." class="topHeader__menu__item__link">
                    Kontakt
                </a>
            </li>
        </ul>
    </header>
    <?php
}

add_action('storefront_before_content', 'metahuman_header', 10);

function metahuman_homepage() {
    ?>
    <!-- FRONTPAGE -->
    <main class="slider w">
        <figure class="slider__item slider__item--0">
            <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/baner.png'; ?>" alt="baner" />
        </figure>
        <figure class="slider__item slider__item--1">
            <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/baner.png'; ?>" alt="baner" />
        </figure>
        <figure class="slider__item slider__item--2">
            <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/baner.png'; ?>" alt="baner" />
        </figure>

        <div class="slider__controls d-desktop flex">
            <button class="slider__controls__item slider__prev" onclick="prevSlide()">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/next.svg'; ?>" alt="poprzedni" />
            </button>
            <button class="slider__controls__item slider__controls__item--dot slider__controls__item--dot--0" onclick="goToSlide(0)">

            </button>
            <button class="slider__controls__item slider__controls__item--dot slider__controls__item--dot--1" onclick="goToSlide(1)">

            </button>
            <button class="slider__controls__item slider__controls__item--dot slider__controls__item--dot--2" onclick="goToSlide(2)">

            </button>
            <button class="slider__controls__item slider__next" onclick="nextSlide()">
                <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/next.svg'; ?>" alt="nastepny" />
            </button>
        </div>
    </main>

    <section class="w section">
        <h2 class="section__header">
            Bestsellery
        </h2>
        <div class="flex">
            <a href=".." class="product">
                <div class="flex">
                    <figure class="product__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/produkt.png'; ?>" alt="produkt" />
                    </figure>
                    <div class="product__right">
                        <h3 class="product__name">
                            Elite ATP
                        </h3>
                        <h4 class="product__price">
                            89.00 PLN
                        </h4>
                        <p class="product__desc">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        </p>
                    </div>
                </div>
                <button class="product__addToCartBtn">
                    Kupuję
                </button>
            </a>
            <a href=".." class="product">
                <div class="flex">
                    <figure class="product__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/produkt.png'; ?>" alt="produkt" />
                    </figure>
                    <div class="product__right">
                        <h3 class="product__name">
                            Elite ATP
                        </h3>
                        <h4 class="product__price">
                            89.00 PLN
                        </h4>
                        <p class="product__desc">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        </p>
                    </div>
                </div>
                <button class="product__addToCartBtn">
                    Kupuję
                </button>
            </a>
            <a href=".." class="product">
                <div class="flex">
                    <figure class="product__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/produkt.png'; ?>" alt="produkt" />
                    </figure>
                    <div class="product__right">
                        <h3 class="product__name">
                            Elite ATP
                        </h3>
                        <h4 class="product__price">
                            89.00 PLN
                        </h4>
                        <p class="product__desc">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        </p>
                    </div>
                </div>
                <button class="product__addToCartBtn">
                    Kupuję
                </button>
            </a>
        </div>
    </section>

    <section class="w section">
        <h2 class="section__header">
            Promocje
        </h2>
        <div class="flex">
            <a href=".." class="product">
                <div class="flex">
                    <figure class="product__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/produkt.png'; ?>" alt="produkt" />
                    </figure>
                    <div class="product__right">
                        <h3 class="product__name">
                            Elite ATP
                        </h3>
                        <h4 class="product__price">
                            89.00 PLN
                        </h4>
                        <p class="product__desc">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        </p>
                    </div>
                </div>
                <button class="product__addToCartBtn">
                    Kupuję
                </button>
            </a>
            <a href=".." class="product">
                <div class="flex">
                    <figure class="product__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/produkt.png'; ?>" alt="produkt" />
                    </figure>
                    <div class="product__right">
                        <h3 class="product__name">
                            Elite ATP
                        </h3>
                        <h4 class="product__price">
                            89.00 PLN
                        </h4>
                        <p class="product__desc">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        </p>
                    </div>
                </div>
                <button class="product__addToCartBtn">
                    Kupuję
                </button>
            </a>
            <a href=".." class="product">
                <div class="flex">
                    <figure class="product__imgWrapper">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/produkt.png'; ?>" alt="produkt" />
                    </figure>
                    <div class="product__right">
                        <h3 class="product__name">
                            Elite ATP
                        </h3>
                        <h4 class="product__price">
                            89.00 PLN
                        </h4>
                        <p class="product__desc">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        </p>
                    </div>
                </div>
                <button class="product__addToCartBtn">
                    Kupuję
                </button>
            </a>
        </div>
    </section>

    <section class="w section section--bigImage">
        <figure class="bigImage">
            <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/peptydy.png'; ?>" alt="peptydy" />
        </figure>
        <div class="bigImage__content">
            <h4 class="bigImage__header">
                PEPTYDY
            </h4>
            <h5 class="bigImage__subheader">
                Innowacja, która wprowadzi Twój organizm na wyższy poziom.
            </h5>
            <a href=".." class="bigImage__btn">
                Dowiedz się więcej
                <img class="icon icon--next" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/arrow-next.svg'; ?>" alt="dalej" />
            </a>
        </div>
    </section>

    <section class="w section">
        <h4 class="section__header--plain">
            Ostatnie wpisy na blogu
        </h4>
        <div class="flex">
            <a href="" class="product product--blog">
                <figure class="blog__imgWrapper">
                    <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/blog.png'; ?>" alt="blog" />
                </figure>
                <h5 class="blog__title">
                    Wpływ witaminy C na nasze zdrowie
                </h5>
                <p class="blog__excerpt">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                </p>
                <button class="product__addToCartBtn">
                    Czytaj dalej
                    <img class="icon icon--next" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/arrow-next.svg'; ?>" alt="dalej" />
                </button>
            </a>
            <a href="" class="product product--blog">
                <figure class="blog__imgWrapper">
                    <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/blog.png'; ?>" alt="blog" />
                </figure>
                <h5 class="blog__title">
                    Wpływ witaminy C na nasze zdrowie
                </h5>
                <p class="blog__excerpt">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                </p>
                <button class="product__addToCartBtn">
                    Czytaj dalej
                    <img class="icon icon--next" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/arrow-next.svg'; ?>" alt="dalej" />
                </button>
            </a>
            <a href="" class="product product--blog">
                <figure class="blog__imgWrapper">
                    <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/blog.png'; ?>" alt="blog" />
                </figure>
                <h5 class="blog__title">
                    Wpływ witaminy C na nasze zdrowie
                </h5>
                <p class="blog__excerpt">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                </p>
                <button class="product__addToCartBtn">
                    Czytaj dalej
                    <img class="icon icon--next" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/arrow-next.svg'; ?>" alt="dalej" />
                </button>
            </a>
        </div>
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
    <?php
}

add_action('storefront_homepage', 'metahuman_homepage', 12);

function metahuman_footer() {
    ?>
    <footer class="footer w">
        <div class="flex">
            <div class="footer__col">
                <a href=".." class="footer__col__logoWrapper">
                    <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/logo-footer.png'; ?>" alt="metahuman" />
                </a>
                <p class="footer__col__text">
                    Meta Human to innowacja, która wprowadzi Twój organizm na wyższy poziom. Lata doświadczeń i nauki zaowocowały powstaniem nowej marki, bazującej na udoskonalonych suplementach, które rzeczywiście wykazują miarodajne i zauważalne korzyści.
                </p>
                <h5 class="footer__col__header">
                    Metody płatności
                </h5>
                <img class="footer__col__paymentMethods" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/metody-platnosci.png'; ?>" alt="metody-platnosci" />
            </div>
            <div class="footer__col">
                <h5 class="footer__col__header">
                    Sklep
                </h5>
                <a href=".." class="footer__col__link">
                    Regeneracja
                </a>
                <a href=".." class="footer__col__link">
                    Siła
                </a>
                <a href=".." class="footer__col__link">
                    Nastrój
                </a>
                <a href=".." class="footer__col__link">
                    Zestawy
                </a>
            </div>
            <div class="footer__col">
                <h5 class="footer__col__header">
                    Pomoc
                </h5>
                <a href=".." class="footer__col__link">
                    Kontakt
                </a>
                <a href=".." class="footer__col__link">
                    Polityka prywatności
                </a>
                <a href=".." class="footer__col__link">
                    Regulamin
                </a>
            </div>
            <div class="footer__col">
                <h5 class="footer__col__header">
                    Informacje
                </h5>
                <a href=".." class="footer__col__link">
                    Reklamacje i zwroty
                </a>
                <a href=".." class="footer__col__link">
                    MetaHuman
                </a>
            </div>
            <div class="footer__col">
                <h5 class="footer__col__header">
                    Adres
                </h5>
                <p class="footer__col__text footer__col__text--address">
                    <span>
                        85, Great Portland Street,
                    </span>
                    <span>
                        First Floor,
                    </span>
                    <span>
                        Londyn, W1W 7LT
                    </span>
                    <span>
                        Company number: 12886777
                    </span>
                </p>
                <h5 class="footer__col__header footer__col__header--socialMedia">
                    Social media
                </h5>
                <div class="flex socialMediaWrapper">
                    <a href="" class="socialMedia">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/facebook.svg'; ?>" alt="facebook" />
                    </a>
                    <a href="" class="socialMedia">
                        <img class="img" src="<?php echo get_home_url() . '/wp-content/uploads/2022/05/instagram.svg'; ?>" alt="facebook" />
                    </a>
                </div>
            </div>
        </div>

        <aside class="footer__bottom">
            <h6 class="footer__bottom__header">
                &copy; 2022 Meta Human
            </h6>
            <h6 class="footer__bottom__header">
                Projekt i wykonanie: <a href="https://skylo.pl" target="_blank" rel="noreferrer">skylo.pl</a>
            </h6>
        </aside>
    </footer>
    <?php
}

add_action('storefront_footer', 'metahuman_footer', 14);