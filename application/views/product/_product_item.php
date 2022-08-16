<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="product-item">
    <div class="row-custom<?php echo (!empty($product->image_second)) ? ' product-multiple-image' : ''; ?>">
         <div class="img-product-container">
            <?php if (!empty($is_slider)): ?>
                <a href="<?php echo generate_product_url($product); ?>">
                    <img src="<?php echo base_url() . IMG_BG_PRODUCT_SMALL; ?>"
                         data-lazy="<?php echo get_product_item_image($product); ?>"
                         alt="<?php echo get_product_title($product); ?>" class="img-fluid img-product">
                    <?php if (!empty($product->image_second)): ?>
                        <img src="<?php echo base_url() . IMG_BG_PRODUCT_SMALL; ?>"
                             data-lazy="<?php echo get_product_item_image($product, true); ?>"
                             alt="<?php echo get_product_title($product); ?>" class="img-fluid img-product img-second">
                    <?php endif; ?>
                </a>
            <?php else: ?>
                <a href="<?php echo generate_product_url($product); ?>">
                    <img src="<?php echo base_url() . IMG_BG_PRODUCT_SMALL; ?>"
                         data-src="<?php echo get_product_item_image($product); ?>"
                         alt="<?php echo get_product_title($product); ?>" class="lazyload img-fluid img-product">
                    <?php if (!empty($product->image_second)): ?>
                        <img src="<?php echo base_url() . IMG_BG_PRODUCT_SMALL; ?>"
                             data-src="<?php echo get_product_item_image($product, true); ?>"
                             alt="<?php echo get_product_title($product); ?>"
                             class="lazyload img-fluid img-product img-second">
                    <?php endif; ?>
                </a>
            <?php endif; ?>
            <div class="product-item-options">
                <a href="javascript:void(0)" class="item-option btn-add-remove-wishlist" data-toggle="tooltip"
                   data-placement="left" data-product-id="<?php echo $product->id; ?>" data-type="list"
                   title="<?php echo trans("wishlist"); ?>">
                    <?php if (is_product_in_wishlist($product) == 1): ?>
                        <i class="icon-heart"></i>
                    <?php else: ?>
                        <i class="icon-heart-o"></i>
                    <?php endif; ?>
                </a>
                <?php if (($product->listing_type == "sell_on_site" || $product->listing_type == "bidding") && $product->is_free_product != 1):
                    if (!empty($product->has_variation) || $product->listing_type == "bidding"):?>
                        <a href="<?= generate_product_url($product); ?>" class="item-option" data-toggle="tooltip"
                           data-placement="left" data-product-id="<?php echo $product->id; ?>" data-reload="0"
                           title="<?php echo trans("view_options"); ?>">
                            <i class="icon-cart"></i>
                        </a>
                    <?php else:
                        $item_unique_id = uniqid();
                        if ($product->stock > 0):?>
                            <a href="javascript:void(0)" id="btn_add_cart_<?= $item_unique_id; ?>"
                               class="item-option btn-item-add-to-cart" data-id="<?= $item_unique_id; ?>"
                               data-toggle="tooltip" data-placement="left" data-product-id="<?php echo $product->id; ?>"
                               data-reload="0" title="<?php echo trans("add_to_cart"); ?>">
                                <i class="icon-cart"></i>
                            </a>
                        <?php endif;
                    endif;
                endif; ?>
            </div>
            <?php if (!empty($product->discount_rate) && !empty($discount_label)): ?>
                <span class="badge badge-discount">-<?= $product->discount_rate; ?>%</span>
            <?php endif; ?>
        </div>
        <?php if ($product->is_promoted && $this->general_settings->promoted_products == 1 && isset($promoted_badge) && $promoted_badge == true): ?>
            <span class="badge badge-dark badge-promoted"><?php echo trans("featured"); ?></span>
        <?php endif; ?>
    </div>
    <div class="row-custom item-details">
        <h3 class="product-title">
            <a href="<?php echo generate_product_url($product); ?>"><?= get_product_title($product); ?></a>
        </h3>
        <p class="product-user text-truncate">
            <a href="<?php echo generate_profile_url($product->user_slug); ?>">
                <?php echo get_shop_name_product($product); ?>
            </a>
        </p>
        <div class="product-item-rating">
            <?php if ($this->general_settings->reviews == 1) {
                $this->load->view('partials/_review_stars', ['review' => $product->rating]);
            } ?>
            <span class="item-wishlist"><i class="icon-heart-o"></i><?php echo $product->wishlist_count; ?></span>
        </div>
        <div class="item-meta">
            <?php $this->load->view('product/_price_product_item', ['product' => $product]); ?>
        </div>
    </div>
</div>
<!--<div onclick="window.location='<?php /*echo generate_product_url($product); */?>'"  class="product-card product-item">
        <div class="product-media row-custom <?php /*echo (!empty($product->image_second)) ? ' product-multiple-image' : ''; */?>">
            <div class="product-img img-product-container">
                <?php /*if (!empty($is_slider)): */?>
                    <img src="<?php /*echo base_url() . IMG_BG_PRODUCT_SMALL; */?>"
                         data-lazy="<?php /*echo get_product_item_image($product); */?>"
                         alt="<?php /*echo get_product_title($product); */?>" class="img-fluid img-product">
                    <?php /*if (!empty($product->image_second)): */?>
                        <img src="<?php /*echo base_url() . IMG_BG_PRODUCT_SMALL; */?>"
                             data-lazy="<?php /*echo get_product_item_image($product, true); */?>"
                             alt="<?php /*echo get_product_title($product); */?>" class="img-fluid img-product img-second">
                    <?php /*endif; */?>
                <?php /*else: */?>
                    <img src="<?php /*echo base_url() . IMG_BG_PRODUCT_SMALL; */?>"
                         data-src="<?php /*echo get_product_item_image($product); */?>"
                         alt="<?php /*echo get_product_title($product); */?>" class="lazyload img-fluid img-product">
                    <?php /*if (!empty($product->image_second)): */?>
                        <img src="<?php /*echo base_url() . IMG_BG_PRODUCT_SMALL; */?>"
                             data-src="<?php /*echo get_product_item_image($product, true); */?>"
                             alt="<?php /*echo get_product_title($product); */?>"
                             class="lazyload img-fluid img-product img-second">
                    <?php /*endif; */?>
                <?php /*endif; */?>
            </div>
            <?php /*if ($product->is_promoted && $this->general_settings->promoted_products == 1): */?>
                <div class="cross-vertical-badge product-badge">
                    <i class="fa fa-star"></i>
                    <span><?php /*echo trans("featured"); */?></span>
                </div>
            <?php /*endif; */?>
            <?php /*if ($product->is_sold): */?>
                <div class="product-type">
                    <span class="flat-badge sale">sold</span>
                </div>
            <?php /*endif; */?>

            <ul class="product-action" style="list-style: none;">
                <li class="view"><i class="fa fa-eye"></i><span><?php /*echo $product->pageviews; */?></span></li>
                <li class="rating"><i class="fa fa-star"></i><span><?php /*echo $product->rating; */?>/5</span></li>
                <li class="rating"><i class="fa fa-clock-o"></i>
                    <span><?php /*echo $this->category_model->time_elapsed_string($product->created_at); */?></span>
                </li>
            </ul>
        </div>
        <div class="product-content">
            <ul style="list-style: none;" class=" breadcrumb-test breadcrumb-product product-category">
                <?php
/*                $parent_categories = $this->category_model->get_parent_categories_tree($this->category_model->get_category_back_end($product->category_id));
                if (!empty($parent_categories)):*/?>
                    <div class="row m-l-5">
                        <h6 class="breadcrumb-product-item m-t-15 text-truncate">
                            <i
                                    class="fa fa-tag breadcrumb-product-item" style="margin-right:5px;"></i>

                            <?php /*echo category_name($parent_categories[0]); */?></h6>
                    </div>

                <?php /*endif; */?>
            </ul>
            <h5 style="font-size: 16px;
    font-weight: bold;" class="product-title text-truncate">
                <a href="<?php /*echo generate_product_url($product); */?>"><?/*= get_product_title($product); */?></a>
            </h5>
            <div class="product-meta">
            <span><i class="fa fa-shopping-bag"></i><a href="<?php /*echo generate_profile_url($product->user_slug); */?>">
                <?php /*echo get_shop_name_product($product); */?>
            </a></span>
            </div>
            <div class="product-info">
                <h5 class="product-price text-truncate">
                    <?php /*$this->load->view('product/_price_product_item', ['product' => $product]); */?>
                </h5>
                <div>
                    <a href="javascript:void(0)" style="display:inline-flex" class="item-option btn-add-remove-wishlist"
                       data-toggle="tooltip"
                       data-placement="bottom" data-product-id="<?php /*echo $product->id; */?>" data-type="list"
                       title="<?php /*echo trans("wishlist"); */?>">
                        <?php /*if (is_product_in_wishlist($product) == 1): */?>
                            <i class="icon-heart"></i>
                        <?php /*else: */?>
                            <i class="icon-heart-o"></i>
                        <?php /*endif; */?>
                        <span style="margin-left:2px;"><?php /*echo $product->wishlist_count; */?></span>

                    </a>
                    <?php /*if (($product->listing_type == "sell_on_site" || $product->listing_type == "bidding") && $product->is_free_product != 1):
                        if (!empty($product->has_variation) || $product->listing_type == "bidding"):*/?>
                            <a href="<?/*= generate_product_url($product); */?>" class="item-option" data-toggle="tooltip"
                               data-placement="left" data-product-id="<?php /*echo $product->id; */?>" data-reload="0"
                               title="<?php /*echo trans("view_options"); */?>">
                                <i class="icon-cart"></i>
                            </a>
                        <?php /*else:
                            $item_unique_id = uniqid();
                            if ($product->stock > 0):*/?>
                                <a href="javascript:void(0)" id="btn_add_cart_<?/*= $item_unique_id; */?>"
                                   class="item-option btn-item-add-to-cart" data-id="<?/*= $item_unique_id; */?>"
                                   data-toggle="tooltip" data-placement="left" data-product-id="<?php /*echo $product->id; */?>"
                                   data-reload="0" title="<?php /*echo trans("add_to_cart"); */?>">
                                    <i class="icon-cart"></i>
                                </a>
                            <?php /*endif;
                        endif;
                    endif; */?>
                </div>
            </div>
        </div>
</div>-->