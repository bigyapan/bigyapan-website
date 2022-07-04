<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if (!empty($featured_categories)): ?>
    <!--    <div class="featured-categories">
            <div class="card-columns">
                <?php /*foreach ($featured_categories as $category): */?>
                    <div class="card lazyload" data-bg="<?php /*echo get_category_image_url($category); */?>">
                        <a href="<?php /*echo generate_category_url($category); */?>">
                            <div class="caption text-truncate">
                                <span><?php /*echo category_name($category); */?></span>
                            </div>
                        </a>
                    </div>
                <?php /*endforeach; */?>
            </div>
        </div>-->
    <div class="container">
        <section class="customer-logos slider">
            <?php foreach ($featured_categories as $category): ?>
                <a class="slide-link" href="<?php echo generate_category_url($category); ?>">
                    <div class="slide lazyload">
                        <img src="<?php echo get_category_image_url($category); ?>">
                        <span><?php echo category_name($category); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>
    </div>
    <!--    Featured Categories Slider Styles   -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/slick-theme.css">
    <style>
        /* Slider */

        .slide span{
            display:flex;
            justify-content: center;
            text-align:center;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-slider {
            position: relative;
            display: block;
            box-sizing: border-box;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -khtml-user-select: none;
            -ms-touch-action: pan-y;
            touch-action: pan-y;
            -webkit-tap-highlight-color: transparent;
        }

        .slick-list {
            position: relative;
            display: block;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .slick-list:focus {
            outline: none;
        }

        .slick-list.dragging {
            cursor: pointer;
            cursor: hand;
        }

        .slick-slider .slick-track,
        .slick-slider .slick-list {
            -webkit-transform: translate3d(0, 0, 0);
            -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .slick-track {
            position: relative;
            top: 0;
            left: 0;
        }

        .slick-track:before,
        .slick-track:after {
            display: table;
            content: '';
        }

        .slick-track:after {
            clear: both;
        }

        .slick-loading .slick-track {
            visibility: hidden;
        }

        .slick-slide {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
        }

        [dir='rtl'] .slick-slide {
            float: right;
        }

        .slick-slide img {
            display: block;
        }

        .slick-slide.slick-loading img {
            display: none;
        }

        .slick-slide.dragging img {
            pointer-events: none;
        }

        .slick-initialized .slick-slide {
            display: block;
        }

        .slick-loading .slick-slide {
            visibility: hidden;
        }

        .slick-vertical .slick-slide {
            display: block;
            height: auto;
            border: 1px solid transparent;
        }

        .slick-arrow.slick-hidden {
            display: none;
        }

        .slide-link {
            text-decoration: none;
            color: black;
            width:70px !important;
        }
    </style>
    <!--    Featured Categories Slider Scripts   -->
    <script href="<?= base_url(); ?>assets/js/slick.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.customer-logos').slick({
                slidesToShow: 10,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                pauseOnHover: true,
                prevArrow: "<img class='a-left control-c prev slick-prev' src='<?= base_url(); ?>assets/img/icons/left-arrow.png'>",
                nextArrow: "<img class='a-right control-c next slick-next' src='<?= base_url(); ?>assets/img/icons/right-arrow.png'>",
                // variableWidth: true,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });
    </script>


<?php endif; ?>