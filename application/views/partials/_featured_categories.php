<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if (!empty($featured_categories)): ?>
    <!--    <div class="featured-categories">
            <div class="card-columns">
                <?php /*foreach ($featured_categories as $category): */ ?>
                    <div class="card lazyload" data-bg="<?php /*echo get_category_image_url($category); */ ?>">
                        <a href="<?php /*echo generate_category_url($category); */ ?>">
                            <div class="caption text-truncate">
                                <span><?php /*echo category_name($category); */ ?></span>
                            </div>
                        </a>
                    </div>
                <?php /*endforeach; */ ?>
            </div>
        </div>-->
    <div class="main-carousel"
         data-flickity='{"cellAlign":"left","groupCells": 2,"draggable": ">1","contain": true,"pageDots": false }'>
        <?php foreach ($featured_categories as $category): ?>
            <a class="carousel-cell" href="<?php echo generate_category_url($category); ?>">
                <img src="<?php echo get_category_image_url($category); ?>">
                <span style="margin:-225px 0 0 30px;color:#ffffff;"><?php echo category_name($category); ?></span>
            </a>
        <?php endforeach; ?>
    </div>
    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
        }

        .carousel {
            background: #EEE;
        }

        .carousel-cell {
            width: 20%;
            height: 125px;
            border-radius: 5px;
            display: inline-flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin-right: 10px;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        .carousel-cell>img {
            flex: 1 0 100%;
        }
        .carousel-cell>span {
            flex: 1 0 100%;
        }

        .carousel-cell img {
            display: block;
            max-height: 100%;
            max-width: 100%;
        }
        /* position outside */
        .flickity-button {
            background: #e5e3e3 !important;
        }
        .flickity-button:hover {
            background: #F90 !important;
        }
        .flickity-prev-next-button {
            width: 30px !important;
            height: 30px !important;
            border-radius: 30px !important;
        }
        .flickity-prev-next-button.previous {
            left: -40px !important;
        }
        .flickity-prev-next-button.next {
            right: -40px !important;
        }

        @media screen and ( max-width: 768px ) {
            /* half-width cells for larger devices */
            .carousel-cell {
                width: 50%;
            }
        }

    </style>
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/flickity.min.css">
    <script src="<?= base_url(); ?>assets/js/flickity.pkgd.min.js"></script>

<?php endif; ?>