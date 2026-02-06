<?php
/* 
	Template Name: Single-product
*/
?>
<div id="c_static_001-1716445880719">
                <input type="hidden" name="propJson" value="{}" />
            </div>
            <div id="c_static_001_P_25368-1711074949519">
                <div class="e_container-1 s_layout">
                    <div class="cbox-1-0 p_item">
                        <div class="e_breadcrumb-5 s_list" needjs="true">
                            <?php
                                /**
                                 * WooCommerce Product Breadcrumb with Full Category Hierarchy
                                 */

                                // Get product categories
                                $product_id = get_the_ID();
                                $categories = get_the_terms($product_id, 'product_cat');

                                if ($categories && !is_wp_error($categories)) {
                                    // Find the deepest category (most specific one)
                                    $deepest_category = null;
                                    $max_depth = 0;
                                    
                                    foreach ($categories as $category) {
                                        $depth = 0;
                                        $current = $category;
                                        while ($current->parent != 0) {
                                            $depth++;
                                            $current = get_term($current->parent, 'product_cat');
                                            if (is_wp_error($current)) break;
                                        }
                                        if ($depth > $max_depth) {
                                            $max_depth = $depth;
                                            $deepest_category = $category;
                                        }
                                    }
                                    
                                    // If no hierarchy found, use first category
                                    if (!$deepest_category) {
                                        $deepest_category = reset($categories);
                                    }
                                    
                                    // Build complete category hierarchy from bottom to top
                                    $category_hierarchy = array();
                                    $current_cat = $deepest_category;
                                    
                                    while ($current_cat && !is_wp_error($current_cat)) {
                                        array_unshift($category_hierarchy, $current_cat);
                                        if ($current_cat->parent != 0) {
                                            $current_cat = get_term($current_cat->parent, 'product_cat');
                                        } else {
                                            break;
                                        }
                                    }
                                }
                                ?>

                                <ul class="p_breadcrumb">
                                    <!-- Home -->
                                    <li class="p_breadcrumbItem">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <span class="text-secondary p_icon">
                                                <svg
                                                    t="1631185047228"
                                                    class="icon"
                                                    viewBox="0 0 1029 1024"
                                                    version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    p-id="1034"
                                                    width="200"
                                                    height="200"
                                                >
                                                    <path
                                                        d="M44.799492 528.986943a42.836848 42.836848 0 0 1-31.231646-13.567846 42.725916 42.725916 0 0 1 2.133309-60.329983L491.685094 11.446142a42.68325 42.68325 0 0 1 58.538003 0.34133l465.658723 443.642972c17.066473 16.21315 17.749132 43.26351 1.45065 60.329983s-43.26351 17.749132-60.329983 1.45065L520.442102 101.301124 73.897829 517.552406c-8.27724 7.679913-18.687788 11.434537-29.098337 11.434537z"
                                                        p-id="1035"
                                                    ></path>
                                                    <path
                                                        d="M752.716803 1024H282.876794c-111.188073 0-201.640381-86.697684-201.640381-193.27781V434.524014c0-23.551733 19.11445-42.666183 42.666183-42.666183s42.666183 19.11445 42.666183 42.666183v396.283509c0 59.476659 52.138076 107.945443 116.308015 107.945443h469.925341c64.084607 0 116.308015-48.383452 116.308015-107.945443V434.524014c0-23.551733 19.11445-42.666183 42.666183-42.666183s42.666183 19.11445 42.666183 42.666183v396.283509c-0.085332 106.494793-90.537641 193.192477-201.725713 193.192477z"
                                                        p-id="1036"
                                                    ></path>
                                                    <path
                                                        d="M657.400549 1017.173411H383.142324c-23.551733 0-42.666183-19.11445-42.666183-42.666183V625.839179c0-23.551733 19.11445-42.666183 42.666183-42.666183h274.258225c23.551733 0 42.666183 19.11445 42.666184 42.666183v348.668049c0 23.551733-19.11445 42.666183-42.666184 42.666183z m-231.592041-85.332367h188.925858V668.505362H425.808508v263.335682z"
                                                        p-id="1037"
                                                    ></path>
                                                </svg>
                                            </span>
                                            <span class="text-secondary p_title">Главная страница</span>
                                        </a>
                                    </li>

                                    <?php 
                                    // Display all categories in hierarchy
                                    if (!empty($category_hierarchy)) :
                                        foreach ($category_hierarchy as $category) : 
                                    ?>
                                    <li class="p_breadcrumbItem">
                                        <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                            <span class="text-secondary p_title"><?php echo esc_html($category->name); ?></span>
                                        </a>
                                    </li>
                                    <?php 
                                        endforeach;
                                    endif;
                                    ?>

                                    <!-- Current Product -->
                                    <li class="p_breadcrumbItem">
                                        <span class="p_title"><?php echo esc_html(get_the_title()); ?></span>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="propJson" value="{}" />
            </div>
            <div id="c_product_detail_103-1711080118464">
                <div class="e_container-1 s_layout">
                    <div class="cbox-1-0 p_item">
                        <div class="e_container-26 s_layout">
                            <div class="cbox-26-0 p_item">
                                <div
                                    class="e_magnifier-27 s_list"
                                    needjs="true"
                                >
                                    <div
                                        class="magnifier thumb_bottom"
                                        id="magnifierWrapper"
                                    >
                                        <div class="magnifier-container">
                                            <!--图片容器-->
											<div class="images-cover">
												<?php
												// Ensure WooCommerce is active
													if (function_exists('wc_get_product')) {
														global $product;

														if ($product) {
															// Get main image
															$main_image_id = $product->get_image_id();
															$main_image_url = wp_get_attachment_url($main_image_id);
															$main_thumbnail_url = wp_get_attachment_image_url($main_image_id, 'thumbnail');

															// Display main image
															if ($main_image_id) {
																echo '<div class="image-item static-item" style="display: block;">';
																echo '<img src="' . esc_url($main_image_url) . '" alt="' . esc_attr(get_post_meta($main_image_id, '_wp_attachment_image_alt', true)) . '" />';
																echo '</div>';
															}

															// Get gallery images
															$attachment_ids = $product->get_gallery_image_ids();

															if ($attachment_ids) {
																foreach ($attachment_ids as $attachment_id) {
																	$image_url = wp_get_attachment_url($attachment_id);
																	$thumbnail_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
																	echo '<div class="image-item static-item">';
																	echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) . '" />';
																	echo '</div>';
																}
															}
														}
													}
												?>
											</div>

                                            <!--跟随鼠标移动的盒子-->
                                            <div class="move-view"></div>
                                        </div>
                                        <div class="magnifier-assembly">
                                            <!--按钮组-->
                                            <div class="magnifier-btn">
                                                <span class="magnifier-btn-left" >
                                                    <svg
                                                        t="1646298466594"
                                                        class="icon"
                                                        viewBox="0 0 1024 1024"
                                                        version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        p-id="5178"
                                                        width="200"
                                                        height="200"
                                                    >
                                                        <path
                                                            d="M352.60436487 538.8676877L614.1116972 824.41834163c14.26666975 15.57022334 38.38241101 16.58409834 53.88021469 2.38984824 15.57022334-14.26666975 16.58409834-38.38241101 2.38984823-53.88021469L432.41081189 513.08629466l237.7536893-260.56587697c14.1942501-15.57022334 13.10795545-39.68596458-2.46226787-53.88021469-15.57022334-14.1942501-39.68596458-13.10795545-53.88021469 2.46226788L352.74920415 487.08764267c-0.50693751 0.57935715-1.08629466 1.23113394-1.52081251 1.8104911-11.87682152 14.41150904-11.6595626 35.77530383 1.37597323 49.96955393z"
                                                            p-id="5179"
                                                        ></path>
                                                    </svg ></span>
                                                <span
                                                    class="magnifier-btn-right"
                                                    ><svg
                                                        t="1646298477962"
                                                        class="icon"
                                                        viewBox="0 0 1024 1024"
                                                        version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        p-id="5312"
                                                        width="200"
                                                        height="200"
                                                    >
                                                        <path
                                                            d="M661.16183428 486.94732961L415.99871022 219.24359155c-13.37500289-14.59708438-35.98351032-15.54759219-50.51270128-2.24048272-14.59708438 13.37500289-15.54759219 35.98351032-2.24048272 50.51270127l223.09776396 243.60157549-222.89408371 244.28050967c-13.30710947 14.59708438-12.28870823 37.20559179 2.30837613 50.51270125 14.59708438 13.30710947 37.20559179 12.28870823 50.51270128-2.30837613l244.75576356-268.11109855c0.47525392-0.54314733 1.01840124-1.15418807 1.42576173-1.6973354 11.13452018-13.51078973 10.93083994-33.53934734-1.2899749-46.84645682z"
                                                            p-id="5313"
                                                        ></path></svg></span>
                                            </div>
                                            <!--缩略图-->
                                            <div
                                                class="magnifier-line js-magnifier-line"
                                            >
												<?php
													// Ensure WooCommerce is active
													if (function_exists('wc_get_product')) {
														global $product;

														if ($product) {
															// Get main image
															$main_image_id = $product->get_image_id();
															$main_image_url = wp_get_attachment_url($main_image_id);
															$main_thumbnail_url = wp_get_attachment_image_url($main_image_id, 'thumbnail');

															echo '<ul class="clearfix animation03 thumbnail_box">';

															// Display main image
															if ($main_image_id) {
																echo '<li class="static-img">';
																echo '<div class="small-img" data-url="' . esc_url($main_image_url) . '">';
																echo '<img src="' . esc_url($main_thumbnail_url) . '" alt="' . esc_attr(get_post_meta($main_image_id, '_wp_attachment_image_alt', true)) . '" />';
																echo '</div>';
																echo '</li>';
															}

															// Get gallery images
															$attachment_ids = $product->get_gallery_image_ids();

															if ($attachment_ids) {
																foreach ($attachment_ids as $attachment_id) {
																	$image_url = wp_get_attachment_url($attachment_id);
																	$thumbnail_url = wp_get_attachment_image_url($attachment_id, 'thumbnail');
																	echo '<li class="static-img">';
																	echo '<div class="small-img" data-url="' . esc_url($image_url) . '">';
																	echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)) . '" />';
																	echo '</div>';
																	echo '</li>';
																}
															}

															echo '</ul>';
														}
													}
												?>
                                            </div>
                                        </div>
                                        <!--经过放大的图片显示容器-->
                                        <div class="magnifier-view"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cbox-1-1 p_item">
                        <div class="e_container-2 s_layout">
                            <div class="cbox-2-0 p_item">
                                <h1 class="e_h1-3 s_subtitle"><?= the_title(); ?></h1>
                                <div class="e_container-92 s_layout">
                                    <div class="cbox-92-0 p_item">
                                        <p class="e_h1-44 s_subtitle">
                                            Держать Wi-Fi включенным
                                        </p>
                                    </div>
                                    <div class="cbox-92-1 p_item">
                                        <p class="e_h1-46 s_subtitle">
                                            Мощность: 18 Вт (макс.) или 36 Вт
                                            (макс.)
                                        </p>
                                    </div>
                                </div>
                                <hr class="e_line-45 s_line" />
                                <div class="e_productTabList-93" needjs="true">
                                    <!-- 内容 -->
                                    <ul class="p_tabContent">
                                        <!-- 产品描述 -->
                                        <li class="p_contentItem">
                                            <!-- 描述 -->
                                            <div class="p_infoItem">
                                                <link
                                                    href="https://m2cdn.fastindexs.com/npmanager/static/lib/ckeditor5/preview.css?v=1.3.045"
                                                    rel="stylesheet"
                                                /><style type="text/css">
                                                    .Products_box {
                                                        position: relative;
                                                    }
                                                    .Products_box
                                                        .max-width-1600 {
                                                        position: absolute;
                                                        max-width: 1600px;
                                                        width: 95%;
                                                        top: 50%;
                                                        left: 50%;
                                                        transform: translateX(
                                                            -50%
                                                        );
                                                        z-index: 7;
                                                    }
                                                    .Products_box
                                                        .max-width-1600
                                                        p {
                                                        font-size: 28px;
                                                        color: white;
                                                        margin: 0;
                                                    }
                                                    .Products_box.top
                                                        .max-width-1600 {
                                                        top: 15%;
                                                    }
                                                    .Products_box.top
                                                        .max-width-1600
                                                        p {
                                                        text-align: center;
                                                        margin: 0;
                                                    }
                                                    .Products_box.left
                                                        .max-width-1600
                                                        p {
                                                        text-align: left;
                                                        margin: 0;
                                                    }
                                                </style>
                                                <div
                                                    class="Products_box top"
                                                    products_box="Products_box"
                                                    top=""
                                                >
                                                    <div>
                                                        <img
                                                            class="image_resized"
                                                            style="width: 100%"
                                                            src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/921a01b1-8f12-40c0-baaa-f5671c0935e0.jpg"
                                                            id="1840577633870733312"
                                                        />
                                                    </div>
                                                    <div
                                                        class="max-width-1600"
                                                        style="top: 50px"
                                                        max-width-1600=""
                                                    >
                                                        <p>
                                                            <span
                                                                style="
                                                                    font-size: 48px;
                                                                "
                                                                ><strong
                                                                    >Умный Мини
                                                                    ИБП
                                                                    Постоянного
                                                                    тока</strong
                                                                ></span
                                                            >
                                                        </p>
                                                        <h5
                                                            style="
                                                                text-align: center;
                                                            "
                                                        >
                                                            <span
                                                                style="
                                                                    color: #ffffff;
                                                                    font-size: 28px;
                                                                "
                                                                >Серия KP3 |
                                                                Непрерывное
                                                                питание
                                                                Wi-Fi</span
                                                            >
                                                        </h5>
                                                    </div>
                                                    
                                                </div>
                                                <div
                                                    class="Products_box top"
                                                    products_box="Products_box"
                                                    top="">
                                                        <div>
                                                            <img
                                                                class="image_resized"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                                src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/dbd042f5-c4c6-46a1-88e3-af72a024133d.jpg"
                                                                id="1840577620619194368"
                                                            />
                                                        </div>
                                                        <div
                                                            class="max-width-1600"
                                                            style="top: 50px"
                                                            max-width-1600=""
                                                        >
                                                            <p>&nbsp;</p>
                                                            <h5
                                                                style="
                                                                    text-align: center;
                                                                "
                                                            >
                                                                &nbsp;
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    
                                            </div>
                                        </li>

                                        <!-- 自定义 -->
                                        <li class="p_contentItem"></li>

                                        <!-- 自定义 -->
                                        <li class="p_contentItem"></li>

                                        <!-- 自定义 -->
                                        <li class="p_contentItem"></li>

                                        <!-- 自定义 -->
                                        <li class="p_contentItem active">
                                            <?= wpautop(get_the_content()); ?>
                                        </li>
                                        <style>
                                            .p_contentItem .e_container-2{
                                                padding: 0 !important;
                                            }
                                            .p_contentItem .e_container-1{
                                                margin: 0 !important;
                                            }
                                        </style>
                                    </ul>
                                </div>
                                <a
                                    class="e_button-48 s_button1 btn btn-primary"
                                    href="javascript: openDialog('1711095708841')"
                                    target="_self"
                                >
                                    <span>Оставьте сообщение</span>
                                </a>

                                <div class="e_container-16 s_layout">
                                    <div class="cbox-16-0 p_item">
                                        <div
                                            class="e_specification-41"
                                            needjs="true"
                                        >
                                            <ul class="style"></ul>
                                            <input
                                                type="hidden"
                                                name="productId"
                                                value="1248788763485638656"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="e_inputHidden-24 formHide">
                                    <p>隐藏域元素占位</p>

                                    <input
                                        type="hidden"
                                        name="hiddenValue24-0"
                                        value="1248788763485638656"
                                    />
                                    <input
                                        type="hidden"
                                        name="hiddenValue24-1"
                                        value="1248788763485638656"
                                    />
                                    <input
                                        type="hidden"
                                        name="hiddenValue24-2"
                                        value="portal-saas/pg2025012411115407946/cms/image/562ae485-bdc9-4702-954d-6c066193713b.jpg"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="e_productTabList-90" needjs="true">
                    <!-- 标题 -->
                    <ul class="p_tabName">
                        <li class="js_nameItem p_nameItem active">Обзор</li>
                        <li class="js_nameItem p_nameItem">Характеристики</li>
                        <li class="js_nameItem p_nameItem">Загрузки</li>
                        <li class="js_nameItem p_nameItem">Поддержка</li>
                        <li class="js_nameItem p_nameItem">Описание</li>
                    </ul>
                </div>

                <div class="e_container-42 s_layout">
                    <div class="cbox-42-0 p_item">
                        <div
                            class="e_productTabList-33 Products_imst"
                            needjs="true"
                        >
                            <!-- 内容 -->
                            <ul class="p_tabContent">
                                <!-- 产品描述 -->
                                <li class="p_contentItem active">
                                    <!-- 描述 -->
                                    <div class="p_infoItem">
                                        <link
                                            href="https://m2cdn.fastindexs.com/npmanager/static/lib/ckeditor5/preview.css?v=1.3.045"
                                            rel="stylesheet"
                                        /><style type="text/css">
                                            .Products_box {
                                                position: relative;
                                            }
                                            .Products_box .max-width-1600 {
                                                position: absolute;
                                                max-width: 1600px;
                                                width: 95%;
                                                top: 50%;
                                                left: 50%;
                                                transform: translateX(-50%);
                                                z-index: 7;
                                            }
                                            .Products_box .max-width-1600 p {
                                                font-size: 28px;
                                                color: white;
                                                margin: 0;
                                            }
                                            .Products_box.top .max-width-1600 {
                                                top: 15%;
                                            }
                                            .Products_box.top
                                                .max-width-1600
                                                p {
                                                text-align: center;
                                                margin: 0;
                                            }
                                            .Products_box.left
                                                .max-width-1600
                                                p {
                                                text-align: left;
                                                margin: 0;
                                            }
                                        </style>
                                        <?php if( have_rows('advantages') ): ?>
                                            <?php while( have_rows('advantages') ): the_row(); 
                                                $background = get_sub_field('background');
                                                $title = get_sub_field('title');
                                                $subtitle = get_sub_field('subtitle');
                                                $characteristic = get_sub_field('characteristic');
                                                $color = get_sub_field('color'); // 'black' или 'white'
                                                
                                                // Определяем цвет текста
                                                $text_color = ($color === 'white') ? '#ffffff' : '#000000';
                                            ?>
                                            
                                            <div class="Products_box top" products_box="Products_box" top="">
                                                <div>
                                                    <img
                                                        class="image_resized"
                                                        style="width: 100%"
                                                        src="<?= esc_url($background); ?>"
                                                        alt="<?= esc_attr($title); ?>"
                                                    />
                                                </div>
                                                <div class="max-width-1600" style="top: 50px" max-width-1600="">
                                                    <p>
                                                        <span style="font-size: 48px; color: <?= $text_color; ?>">
                                                            <strong><?= esc_html($title); ?></strong>
                                                        </span>
                                                    </p>
                                                    <h5 style="text-align: center">
                                                        <span style="color: <?= $text_color; ?>; font-size: 28px;">
                                                            <?= esc_html($subtitle); ?>
                                                        </span>
                                                    </h5>
                                                    <p>
                                                        <span style="color: <?= $text_color; ?>; font-size: 28px;">
                                                            <?= esc_html($characteristic); ?>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <!-- <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                            <div>
                                                <img
                                                    class="image_resized"
                                                    style="width: 100%"
                                                    src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/921a01b1-8f12-40c0-baaa-f5671c0935e0.jpg"
                                                    id="1840577633870733312"
                                                />
                                            </div>
                                            <div
                                                class="max-width-1600"
                                                style="top: 50px"
                                                max-width-1600=""
                                            >
                                                <p>
                                                    <span
                                                        style="font-size: 48px"
                                                        ><strong
                                                            >Умный Мини ИБП
                                                            Постоянного
                                                            тока</strong
                                                        ></span
                                                    >
                                                </p>
                                                <h5 style="text-align: center">
                                                    <span
                                                        style="
                                                            color: #ffffff;
                                                            font-size: 28px;
                                                        "
                                                        >Серия KP3 | Непрерывное
                                                        питание Wi-Fi</span
                                                    >
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                                <div>
                                                    <img
                                                        class="image_resized"
                                                        style="width: 100%"
                                                        src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/dbd042f5-c4c6-46a1-88e3-af72a024133d.jpg"
                                                        id="1840577620619194368"
                                                    />
                                                </div>
                                                <div
                                                    class="max-width-1600"
                                                    style="top: 50px"
                                                    max-width-1600=""
                                                >
                                                    <p>&nbsp;</p>
                                                    <h5
                                                        style="
                                                            text-align: center;
                                                        "
                                                    >
                                                        &nbsp;
                                                    </h5>
                                                </div>
                                        </div>
                                        <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                                    <div>
                                                        <img
                                                            class="image_resized"
                                                            style="width: 100%"
                                                            src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/058b8592-5e07-4b43-9573-372ec5d186b7.jpg"
                                                            id="1840577608127258624"
                                                        />
                                                    </div>
                                                    <div
                                                        class="max-width-1600"
                                                        style="top: 50px"
                                                        max-width-1600=""
                                                    >
                                                        <p>
                                                            <span
                                                                style="
                                                                    color: #000000;
                                                                    font-size: 48px;
                                                                "
                                                                ><strong
                                                                    >Переключение
                                                                    AC/DC за 0
                                                                    мс</strong
                                                                ></span
                                                            >
                                                        </p>
                                                        <h5
                                                            style="
                                                                text-align: center;
                                                            "
                                                        >
                                                            <span
                                                                style="
                                                                    color: #000000;
                                                                    font-size: 20px;
                                                                "
                                                                ><span
                                                                    style="
                                                                        line-height: 1;
                                                                    "
                                                                    >Обеспечение
                                                                    бесперебойной
                                                                    работы ваших
                                                                    устройств
                                                                    при
                                                                    переключении
                                                                    ИБП из
                                                                    режима AC в
                                                                    режим
                                                                    батареи</span
                                                                ></span
                                                            >
                                                        </h5>
                                                    </div>
                                        </div>
                                        <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                                        <div>
                                                            <img
                                                                class="image_resized"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                                src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/517541b4-5ae7-4d40-bfbb-636f56fb07c6.jpg"
                                                                id="1840577595531821056"
                                                            />
                                                        </div>
                                                        <div
                                                            class="max-width-1600"
                                                            style="top: 50px"
                                                            max-width-1600=""
                                                        >
                                                            <p>
                                                                <span
                                                                    style="
                                                                        color: #000000;
                                                                        font-size: 48px;
                                                                    "
                                                                    ><span
                                                                        style="
                                                                            line-height: 1;
                                                                        "
                                                                        ><strong
                                                                            >Типичные
                                                                            сценарии
                                                                            применения</strong
                                                                        ></span
                                                                    ></span
                                                                >
                                                            </p>
                                                            <h5
                                                                style="
                                                                    text-align: center;
                                                                "
                                                            >
                                                                <span
                                                                    style="
                                                                        color: #000000;
                                                                        font-size: 20px;
                                                                    "
                                                                    ><span
                                                                        style="
                                                                            line-height: 1;
                                                                        "
                                                                        >Питание
                                                                        беспроводного
                                                                        маршрутизатора
                                                                        и
                                                                        модема</span
                                                                    ></span
                                                                >
                                                            </h5>
                                                        </div>
                                        </div>
                                        <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                                            <div>
                                                                <img
                                                                    class="image_resized"
                                                                    style="
                                                                        width: 100%;
                                                                    "
                                                                    src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/9d09b7b9-fb40-48a9-9619-82a77e5b38b3.jpg"
                                                                    id="1840577583276064768"
                                                                />
                                                            </div>
                                                            <div
                                                                class="max-width-1600"
                                                                style="
                                                                    top: 50px;
                                                                "
                                                                max-width-1600=""
                                                            >
                                                                <p>
                                                                    <span
                                                                        style="
                                                                            color: #000000;
                                                                            font-size: 48px;
                                                                        "
                                                                        ><strong
                                                                            >Размещение
                                                                            в
                                                                            любом
                                                                            месте</strong
                                                                        ></span
                                                                    >
                                                                </p>
                                                                <h5
                                                                    style="
                                                                        text-align: center;
                                                                    "
                                                                >
                                                                    <span
                                                                        style="
                                                                            color: #000000;
                                                                            font-size: 20px;
                                                                        "
                                                                        ><span
                                                                            style="
                                                                                line-height: 1;
                                                                            "
                                                                            >Благодаря
                                                                            настенным
                                                                            крепежным
                                                                            отверстиям
                                                                            на
                                                                            задней
                                                                            панели
                                                                            вы
                                                                            можете
                                                                            легко
                                                                            установить
                                                                            серию
                                                                            KP3
                                                                            на
                                                                            стену</span
                                                                        ></span
                                                                    >
                                                                </h5>
                                                            </div>
                                        </div>
                                        <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                                                <div>
                                                                    <img
                                                                        class="image_resized"
                                                                        style="
                                                                            width: 100%;
                                                                        "
                                                                        src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/4d62b204-0e8a-47b9-8b56-8eae070e2e1c.jpg"
                                                                        id="1840577571726192640"
                                                                    />
                                                                </div>
                                                                <div
                                                                    class="max-width-1600"
                                                                    style="
                                                                        top: 50px;
                                                                    "
                                                                    max-width-1600=""
                                                                >
                                                                    <p>
                                                                        <span
                                                                            style="
                                                                                color: #000000;
                                                                                font-size: 48px;
                                                                            "
                                                                            ><strong
                                                                                >Multi-output</strong
                                                                            ></span
                                                                        >
                                                                    </p>
                                                                    <h5
                                                                        style="
                                                                            text-align: center;
                                                                        "
                                                                    >
                                                                        <span
                                                                            style="
                                                                                color: #000000;
                                                                                font-size: 20px;
                                                                            "
                                                                            ><span
                                                                                style="
                                                                                    line-height: 1;
                                                                                "
                                                                                >3
                                                                                выхода
                                                                                постоянного
                                                                                тока
                                                                                +
                                                                                1
                                                                                выход
                                                                                USB
                                                                                позволяют
                                                                                подключать
                                                                                4
                                                                                и
                                                                                более
                                                                                устройств</span
                                                                            ></span
                                                                        >
                                                                    </h5>
                                                                </div>
                                        </div>
                                        <div class="Products_box top"
                                            products_box="Products_box"
                                            top="" >
                                                                    <div>
                                                                        <img
                                                                            class="image_resized"
                                                                            style="
                                                                                width: 100%;
                                                                            "
                                                                            src="<?= bloginfo("template_url"); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/ad52ef18-ecb7-4ddc-b2da-637ed1c2bec2.jpg"
                                                                            id="1840577550339436544"
                                                                        />
                                                                    </div>
                                                                    <div
                                                                        class="max-width-1600"
                                                                        style="
                                                                            top: 50px;
                                                                        "
                                                                        max-width-1600=""
                                                                    >
                                                                        <p>
                                                                            <span
                                                                                style="
                                                                                    color: #000000;
                                                                                    font-size: 48px;
                                                                                "
                                                                                ><strong
                                                                                    >Защита
                                                                                    от
                                                                                    пожара</strong
                                                                                ></span
                                                                            >
                                                                        </p>
                                                                        <h5
                                                                            style="
                                                                                text-align: center;
                                                                            "
                                                                        >
                                                                            <span
                                                                                style="
                                                                                    font-size: 20px;
                                                                                "
                                                                                >Корпус
                                                                                устройства
                                                                                с
                                                                                классом
                                                                                огнестойкости
                                                                                V-0
                                                                                обеспечивает
                                                                                безопасность
                                                                                вас
                                                                                и
                                                                                вашего
                                                                                имущества</span
                                                                            >
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="e_container-49 s_layout Products_imst">
                            <div class="cbox-49-0 p_item">
                                <p class="e_text-54 s_title">Развернуть все</p>

                                <div
                                    class="e_loop-50 s_list"
                                    needjs="true"
                                    ds-id=""
                                    elem-id="e_loop-50"
                                >
                                    <div class="">
                                        <div class="p_list">
                                            <div class="cbox-50 p_loopitem">
                                                <!-- <div class="e_foldItem-52 border showDetail"
                                                    needjs="true" >
                                                    <div class="bg-light p_ask">
                                                        <span class="p_asktitle"
                                                            >Умный мини-ИБП
                                                            серии DC
                                                            UPS-KP3</span
                                                        >
                                                        <i class="p_arrow"></i>
                                                    </div>
                                                    <div
                                                        class="border-top p_answer"
                                                    >
                                                        <div
                                                            class="text-body p_answerCon saf-mo-table"
                                                        >
                                                            <link
                                                                href="https://m2cdn.fastindexs.com/npmanager/static/lib/ckeditor5/preview.css?v=1.3.045"
                                                                rel="stylesheet"
                                                            />
                                                            <figure
                                                                class="table"
                                                                style="
                                                                    width: 100%;
                                                                "
                                                            >
                                                                <table
                                                                    class="ck-table-resized"
                                                                >
                                                                    <colgroup>
                                                                        <col
                                                                            style="
                                                                                width: 11.85%;
                                                                            "
                                                                        />
                                                                        <col
                                                                            style="
                                                                                width: 9.43%;
                                                                            "
                                                                        />
                                                                        <col
                                                                            style="
                                                                                width: 20.05%;
                                                                            "
                                                                        />
                                                                        <col
                                                                            style="
                                                                                width: 19.29%;
                                                                            "
                                                                        />
                                                                        <col
                                                                            style="
                                                                                width: 19.3%;
                                                                            "
                                                                        />
                                                                        <col
                                                                            style="
                                                                                width: 20.08%;
                                                                            "
                                                                        />
                                                                    </colgroup>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Модель</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et3"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                KP3S
                                                                            </td>
                                                                            <td
                                                                                class="et3"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                KP3
                                                                                EC
                                                                            </td>
                                                                            <td
                                                                                class="et3"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                KP3
                                                                            </td>
                                                                            <td
                                                                                class="et4"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                KP3
                                                                                Pro
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Емкость
                                                                                    батареи</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                36Wh
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                30.24Wh
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                36Wh
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                36Wh
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Тип
                                                                                    батареи</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                colspan="4"
                                                                                rowspan="1"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                Lithium-ion
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Спецификация
                                                                                    батареи</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                3.6V
                                                                                /
                                                                                10000mAh
                                                                                (2500mAh*4)
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                3.6V
                                                                                /
                                                                                8400mAh
                                                                                (4200mAh*2)
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                3.6V
                                                                                /
                                                                                10000mAh
                                                                                (2500mAh*4)
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                3.6V
                                                                                /
                                                                                10000mAh
                                                                                (2500mAh*4)
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Материал</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                colspan="4"
                                                                                rowspan="1"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                ABS
                                                                                +
                                                                                PC
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Вход</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                12V
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                12V
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                12V
                                                                                /
                                                                                2.0A
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                12V
                                                                                /
                                                                                4.0A
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                                rowspan="4"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Выход</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                12V
                                                                                /
                                                                                1.5A
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                1:
                                                                                12V
                                                                                /
                                                                                1.5A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                1:
                                                                                12V
                                                                                /
                                                                                1.5A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                1:
                                                                                12V
                                                                                /
                                                                                3.0A&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                 
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                2:&nbsp;
                                                                                9V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                2:&nbsp;
                                                                                9V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                2:
                                                                                9V
                                                                                /
                                                                                1.0A&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                 
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                3:&nbsp;
                                                                                5V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                3:&nbsp;
                                                                                5V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                DC
                                                                                3:
                                                                                5V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                 
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                USB:&nbsp;
                                                                                5V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                USB:&nbsp;
                                                                                5V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                USB:
                                                                                5V
                                                                                /
                                                                                2.0A&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Общий
                                                                                    выход&nbsp;</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                18W
                                                                                (макс.)
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                18W
                                                                                (макс.)
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                18W
                                                                                (макс.)
                                                                            </td>
                                                                            <td
                                                                                class="et7"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                36W
                                                                                (макс.)
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Чистый
                                                                                    вес</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et12"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                274g
                                                                            </td>
                                                                            <td
                                                                                class="et12"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                278g
                                                                            </td>
                                                                            <td
                                                                                class="et12"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                278g
                                                                            </td>
                                                                            <td
                                                                                class="et13"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                293g
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Размеры
                                                                                    устройства</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                colspan="4"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                115
                                                                                *
                                                                                83
                                                                                *
                                                                                27mm
                                                                                (Д*Ш*В)
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et14"
                                                                                rowspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Рабочая
                                                                                    температура</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                Режим
                                                                                ИБП
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                colspan="4"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                0℃&nbsp;–
                                                                                40℃
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et6"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                Режим
                                                                                батареи
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                colspan="4"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                -15℃&nbsp;–
                                                                                50℃
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et2"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Рабочая
                                                                                    влажность</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et6"
                                                                                colspan="4"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                Менее
                                                                                75%RH
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td
                                                                                class="et15"
                                                                                colspan="2"
                                                                            >
                                                                                <span
                                                                                    style="
                                                                                        font-size: 16px;
                                                                                    "
                                                                                    >Хранение</span
                                                                                >
                                                                            </td>
                                                                            <td
                                                                                class="et16"
                                                                                colspan="4"
                                                                                style="
                                                                                    text-align: center;
                                                                                "
                                                                            >
                                                                                15℃&nbsp;–
                                                                                35℃,
                                                                                40
                                                                                –
                                                                                75%RH
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </figure>
                                                            <p>
                                                                <span
                                                                    style="
                                                                        font-family: Microsoft
                                                                            YaHei;
                                                                    "
                                                                    >&nbsp;
                                                                    &nbsp;Спецификации
                                                                    могут
                                                                    изменяться
                                                                    без
                                                                    предварительного
                                                                    уведомления,
                                                                    все чертежи
                                                                    продукта
                                                                    предназначены
                                                                    только для
                                                                    справки.</span
                                                                ><br /> 
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php if( have_rows('characteristics') ): ?>
                                                    <?php while( have_rows('characteristics') ): the_row(); 
                                                        $charTitle = get_sub_field('char-title');
                                                    ?>
                                                    
                                                    <div class="e_foldItem-52 border showDetail"
                                                    needjs="true" >
                                                    <div class="bg-light p_ask">
                                                        <span class="p_asktitle"
                                                            ><?= esc_html($charTitle); ?></span
                                                        >
                                                        <i class="p_arrow"></i>
                                                    </div>
                                                    <div
                                                        class="border-top p_answer"
                                                    >
                                                        <div
                                                            class="text-body p_answerCon saf-mo-table"
                                                        >
                                                            <link
                                                                href="https://m2cdn.fastindexs.com/npmanager/static/lib/ckeditor5/preview.css?v=1.3.045"
                                                                rel="stylesheet"
                                                            />
                                                            <?= get_sub_field('grid') ?>
                                                            <!-- <p>
                                                                <span
                                                                    style="
                                                                        font-family: Microsoft
                                                                            YaHei;
                                                                    "
                                                                    >&nbsp;
                                                                    &nbsp;Спецификации
                                                                    могут
                                                                    изменяться
                                                                    без
                                                                    предварительного
                                                                    уведомления,
                                                                    все чертежи
                                                                    продукта
                                                                    предназначены
                                                                    только для
                                                                    справки.</span
                                                                ><br /> 
                                                            </p> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                    <?php endwhile; ?>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="p_page">
                                            <div class="page_con"></div>
                                        </div>
                                    </div>
                                    <input
                                        type="hidden"
                                        name="_config"
                                        value='{"ignoreEmptyCheck":true,"cname":"常见问题-列表接口","type":"list","params":{"size":8,"query":[{"valueName":"","dataType":"number","operator":"eq","filter":"ignore-empty-check","esField":"_relativeId","groupName":"数据展示条件,默认条件组","groupEnd":"2,1","field":"_relativeId","sourceType":"page","logic":"and","groupBegin":"1,2","value":"1248788763485638656","fieldType":"number"}],"header":{"Data-Query-Es-Field":"DETAIL_ES.es_date_prePublishTime,TEXT_DETAIL_ES.es_text_zdlcm,DETAIL_ES.es_symbol_text_DB2y401q","Data-Query-Random":0,"Data-Query-Field":"prePublishTime,zdlcm,text_DB2y401q"},"from":0,"sort":[],"_detailId":"1248788763485638656"},"valueUrl":"/fwebapi/cms/lowcode/60005/18509/list/value?cate&#x3D;0","priority":0,"_dataFilter":{"filter":false,"showCondition":false,"conditionExclude":false,"showSearch":false,"currentConditionHide":false,"selectFirstCondition":false,"fields":[],"viscidityEnableShowAll":false,"cascaderEnable":false,"showSearchCname":"","viscidityEnable":false,"viscidityEnableShowFirst":false},"datasourceType":"nomarl","appId":"60005","sourceUuid":"1441934909076799488","pageParams":[{"code":"_detailId","name":"默认参数"}],"metaUrl":"/fwebapi/cms/lowcode/60005/18509/list/meta?cate&#x3D;0","disabled":false,"api":"/fwebapi/cms/lowcode/60005/18509/list?cate&#x3D;0","id":"datasource4","apiId":"18509","reqKey":"/fwebapi/cms/lowcode/60005/18509/list?cate&#x3D;0|{\"size\":8,\"query\":[{\"valueName\":\"\",\"dataType\":\"number\",\"operator\":\"eq\",\"filter\":\"ignore-empty-check\",\"esField\":\"_relativeId\",\"groupName\":\"数据展示条件,默认条件组\",\"groupEnd\":\"2,1\",\"field\":\"_relativeId\",\"sourceType\":\"page\",\"logic\":\"and\",\"groupBegin\":\"1,2\",\"value\":\"1248788763485638656\",\"fieldType\":\"number\"}],\"header\":{\"Data-Query-Es-Field\":\"DETAIL_ES.es_date_prePublishTime,TEXT_DETAIL_ES.es_text_zdlcm,DETAIL_ES.es_symbol_text_DB2y401q\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"prePublishTime,zdlcm,text_DB2y401q\"},\"from\":0,\"sort\":[],\"_detailId\":\"1248788763485638656\"}|{\"Data-Query-Es-Field\":\"DETAIL_ES.es_date_prePublishTime,TEXT_DETAIL_ES.es_text_zdlcm,DETAIL_ES.es_symbol_text_DB2y401q\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"prePublishTime,zdlcm,text_DB2y401q\"}"}'
                                    />
                                    <input
                                        type="hidden"
                                        name="view"
                                        value="Products_details"
                                    />
                                    <input
                                        type="hidden"
                                        name="pageParamsJson"
                                        value='{"size":8,"from":0,"totalCount":1}'
                                    />
                                    <input
                                        type="hidden"
                                        name="i18nJson"
                                        value='{"pageUnit_50":"стр.","noData_50":"Нет данных","pageUnit_57":"стр.","confirm_50":"Подтвердить","goodstCode_33":"Номер товара","answer_52":"Ответ","loadMore_57":"Нажмите «загрузить еще»","goodstCode_90":"Номер товара","pageJump_50":"Перейти на","conditions_57":"условие:","goodstCode_93":"Номер товара","pageWhole_50":"всего","pageWhole_57":"всего","noData_57":"Нет данных","conditions_50":"условие:","noMore_57":"Нет больше информации","pageItem_57":"шт.","brand_33":"Бренд","pageItem_50":"шт.","loadNow_57":"Загрузка...","keyword_90":"Ключевые слова","loadMore_50":"Нажмите «загрузить еще»","goodstName_93":"Название товара","totalAcount_57":"Всего Х","totalAcount_50":"Всего Х","noMore_50":"Нет больше информации","pageJump_57":"Перейти на","brand_93":"Бренд","goodstName_33":"Название товара","ask_52":"Вопрос","keyword_33":"Ключевые слова","brand_90":"Бренд","goodstName_90":"Название товара","params_90":"параметр","keyword_93":"Ключевые слова","clearConditions_50":"чистое состояние","confirm_57":"Подтвердить","params_93":"параметр","loadNow_50":"Загрузка...","params_33":"параметр","clearConditions_57":"чистое состояние"}'
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="e_container-55 s_layout Products_imst">
                            <div class="cbox-55-0 p_item">
                                <p class="e_text-56 s_title">Загрузки</p>
                                <div
                                    class="e_loop-57 s_list"
                                    needjs="true"
                                    ds-id=""
                                    elem-id="e_loop-57"
                                >
                                    <div class="">
                                        <div class="p_list">
                                        <?php if( have_rows('files') ): ?>
                                            <?php while( have_rows('files') ): the_row(); 
                                                $file_name = get_sub_field('file-name');
                                                $file = get_sub_field('file');
                                                
                                                // Проверяем, существует ли файл
                                                if( $file ) {
                                                    // Получаем URL файла
                                                    $file_url = is_array($file) ? $file['url'] : $file;
                                                    
                                                    // Получаем ID файла для получения размера
                                                    $file_id = is_array($file) ? $file['ID'] : attachment_url_to_postid($file);
                                                    
                                                    // Получаем размер файла
                                                    $file_path = get_attached_file($file_id);
                                                    $file_size = $file_path ? filesize($file_path) : 0;
                                                    
                                                    // Конвертируем размер в KB
                                                    $file_size_kb = $file_size > 0 ? round($file_size / 1024, 1) : 0;
                                                } else {
                                                    $file_url = '#';
                                                    $file_size_kb = 0;
                                                }
                                            ?>
                                                
                                                <div class="cbox-57 p_loopitem">
                                                    <div class="e_container-59 s_layout">
                                                        <div class="cbox-59-0 p_item">
                                                            <div class="e_container-60 s_layout">
                                                                <div class="cbox-60-0 p_item">
                                                                    <div class="e_icon-62 s_title">
                                                                        <svg
                                                                            t="1711093667896"
                                                                            class="icon"
                                                                            viewBox="0 0 1024 1024"
                                                                            version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            p-id="17092"
                                                                            width="80"
                                                                            height="80"
                                                                        >
                                                                            <path
                                                                                d="M1008 464h-72c-4.4 0-8-3.6-8-8V314.5c0-17-6.7-33.3-18.8-45.3L658.8 18.8C646.7 6.7 630.5 0 613.5 0H144c-26.5 0-48 21.5-48 48v408c0 4.4-3.6 8-8 8H16c-8.8 0-16 7.2-16 16v400c0 8.8 7.2 16 16 16h80c0 35.3 14.3 67.3 37.5 90.5 23.2 23.2 55.2 37.5 90.5 37.5h656c26.5 0 48-21.5 48-48v-64c0-8.8 7.2-16 16-16h64c8.8 0 16-7.2 16-16V480c0-8.8-7.2-16-16-16zM704 154.5l69.5 69.5H708c-2.2 0-4-1.8-4-4v-65.5zM864 952c0 4.4-3.6 8-8 8H224c-35.3 0-64-28.7-64-64h696c4.4 0 8 3.6 8 8v48zM242.2 784.4V575.7H314c51.9 0 77.9 22 77.9 66 0 21.4-7.8 38.5-23.5 51.4-15.7 12.9-35.3 19.1-58.8 18.5h-22.9v72.8h-44.5z m195.3 0V575.7h72.1c74.1 0 111.1 33.9 111.1 101.7 0 32.2-10.4 58.1-31.1 77.7-20.7 19.5-47.5 29.3-80.3 29.3h-71.8z m340.4-118.7v36.4h-68.6v82.3h-44.5V575.7h119v36.4h-74.5v53.6h68.6zM864 456c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8V72c0-4.4 3.6-8 8-8h408c35.3 0 64 28.6 64 64v144c0 8.8 7.2 16 16 16h144c35.3 0 64 28.6 64 64v104z"
                                                                                p-id="17093"
                                                                                fill="#00b1af"
                                                                            ></path>
                                                                            <path
                                                                                d="M345.1 643.5c0 22.7-13.1 34.1-39.2 34.1h-19.3v-67.4h19.7c25.9 0 38.8 11.1 38.8 33.3zM574 678.1c0 21.5-6 38.5-18 51.1-12 12.6-28.6 18.9-49.7 18.9H482v-136h24.1c20.1 0 36.5 5.8 49 17.4 12.6 11.6 18.9 27.8 18.9 48.6z"
                                                                                p-id="17094"
                                                                                fill="#00b1af"
                                                                            ></path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                                <div class="cbox-60-1 p_item">
                                                                    <p class="e_text-63 s_title">
                                                                        <a href="<?= esc_url($file_url); ?>" target="_blank">
                                                                            <?= esc_html($file_name); ?>
                                                                        </a>
                                                                    </p>
                                                                    <p class="e_text-66 s_title">
                                                                        <a href="<?= esc_url($file_url); ?>" target="_blank"></a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="cbox-59-1 p_item">
                                                            <div class="e_loop_sub-64 s_list">
                                                                <div class="cbox-64 p_loopItem">
                                                                    <p class="e_text-65 s_title">
                                                                        <svg
                                                                            t="1711094163814"
                                                                            class="icon"
                                                                            viewBox="0 0 1024 1024"
                                                                            version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            p-id="19297"
                                                                            width="30"
                                                                            height="30"
                                                                        >
                                                                            <path
                                                                                d="M310.3488 893.7728a35.2 35.2 0 0 1 30.2592 35.3792c0 20.6336-17.664 36.9664-37.6832 36.9664H93.184c-49.408 0-93.056-41.9328-93.056-90.5216V91.392c0-48.4864 43.52-91.264 93.056-91.264h743.808c49.408 0 93.056 42.6496 93.056 91.264v163.6096c-0.8704 19.7888-18.5344 35.2512-37.7088 35.2512-19.3024 0-34.304-13.2352-36.8128-30.4128V116.1216c0-25.6-20.1728-44.3904-46.0288-44.3904H116.6592c-24.3456 0-44.3904 18.944-44.3904 44.3904v734.2336c0 23.8848 20.1728 43.52 44.3904 43.52h193.6896v-0.1024z m379.8528-520.2944c183.6032 0 333.6704 144.7168 333.6704 324.7616 0 180.0704-150.1952 325.632-333.6704 325.632-185.2672 0-333.696-145.5616-333.696-325.632 0-180.1728 148.3008-324.7616 333.696-324.7616z m0 592.64c150.9376 0 274.9184-119.9616 274.9184-267.9808 0-147.2-124.1088-267.264-275.0464-267.264-151.8336 0-275.9424 120.064-275.9424 267.264 0.128 148.0192 124.2368 267.9808 276.0704 267.9808zM363.1872 355.328c12.6208 0 22.7072 9.0368 22.7072 21.4016s-10.0864 22.272-22.7072 22.272H165.1968a22.4 22.4 0 0 1-22.6816-22.272c0-12.3648 10.0864-21.4016 22.6816-21.4016h197.9904z m270.7712-68.2496c0 12.3648-10.112 22.272-22.7072 22.272H165.1968a22.4 22.4 0 0 1-22.6816-22.272 23.04 23.04 0 0 1 22.6816-23.0144h446.0544a23.04 23.04 0 0 1 22.7072 23.0144z m153.344-88.8064c0 12.3648-10.0864 21.4016-22.7072 21.4016H165.1968c-12.5952 0-22.6816-9.0368-22.6816-21.4016s10.0864-22.272 22.6816-22.272h599.5264a22.528 22.528 0 0 1 22.5792 22.272z m-74.0352 678.3488a23.808 23.808 0 0 1-37.7088 0L579.0976 768c-5.9392-6.5536-8.448-15.5904-7.5776-26.3424a19.1232 19.1232 0 0 1 19.3024-17.3056h62.0288v-101.0432c0-12.3648 8.448-20.6592 21.0688-20.6592h40.2432c12.5952 0 21.0432 8.2944 21.0432 20.6592v101.0432h62.9248c9.216 0 17.664 7.424 20.1984 17.3056 0.8704 9.8816-2.5344 18.944-9.216 26.3424l-95.8464 108.5952zM674.176 562.432c-12.6208 0-21.0688-8.2944-21.0688-20.6592 0-10.752 8.448-20.6592 21.0688-20.6592h40.2176c12.6208 0 21.0688 9.9072 21.0688 20.6592 0 12.3648-8.448 20.6592-21.0688 20.6592h-40.2176z"
                                                                                fill="#00b1af"
                                                                                p-id="19298"
                                                                            ></path>
                                                                        </svg>
                                                                        <?= $file_size_kb; ?>KB
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                            
                                        </div>
                                        <div class="p_page">
                                            <div class="page_con"></div>
                                        </div>
                                    </div>
                                    <input
                                        type="hidden"
                                        name="_config"
                                        value='{"ignoreEmptyCheck":true,"cname":"企业下载-列表接口","type":"list","params":{"size":10,"query":[{"valueName":"","dataType":"number","operator":"eq","filter":"ignore-empty-check","esField":"_relativeId","groupName":"数据展示条件,默认条件组","groupEnd":"2,1","field":"_relativeId","sourceType":"page","logic":"and","groupBegin":"1,2","value":"1248788763485638656","fieldType":"number"}],"header":{"Data-Query-Es-Field":"DETAIL_ES.es_symbol_text_276a6s21,DETAIL_ES.es_multi_attachment_j6q40145,TEXT_DETAIL_ES.es_text_textarea_i88X15c6","Data-Query-Random":0,"Data-Query-Field":"text_276a6s21,attachment_j6q40145,textarea_i88X15c6"},"from":0,"sort":[],"_detailId":"1248788763485638656"},"valueUrl":"/fwebapi/cms/lowcode/60006/18511/list/value?cate&#x3D;0","priority":0,"_dataFilter":{"filter":false,"showCondition":false,"conditionExclude":false,"showSearch":false,"currentConditionHide":false,"selectFirstCondition":false,"fields":[],"viscidityEnableShowAll":false,"cascaderEnable":false,"showSearchCname":"","viscidityEnable":false,"viscidityEnableShowFirst":false},"appId":"60006","sourceUuid":"1441960262625263616","pageParams":[{"code":"_detailId","name":"默认参数"}],"metaUrl":"/fwebapi/cms/lowcode/60006/18511/list/meta?cate&#x3D;0","disabled":false,"api":"/fwebapi/cms/lowcode/60006/18511/list?cate&#x3D;0","id":"datasource5","apiId":"18511","reqKey":"/fwebapi/cms/lowcode/60006/18511/list?cate&#x3D;0|{\"size\":10,\"query\":[{\"valueName\":\"\",\"dataType\":\"number\",\"operator\":\"eq\",\"filter\":\"ignore-empty-check\",\"esField\":\"_relativeId\",\"groupName\":\"数据展示条件,默认条件组\",\"groupEnd\":\"2,1\",\"field\":\"_relativeId\",\"sourceType\":\"page\",\"logic\":\"and\",\"groupBegin\":\"1,2\",\"value\":\"1248788763485638656\",\"fieldType\":\"number\"}],\"header\":{\"Data-Query-Es-Field\":\"DETAIL_ES.es_symbol_text_276a6s21,DETAIL_ES.es_multi_attachment_j6q40145,TEXT_DETAIL_ES.es_text_textarea_i88X15c6\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"text_276a6s21,attachment_j6q40145,textarea_i88X15c6\"},\"from\":0,\"sort\":[],\"_detailId\":\"1248788763485638656\"}|{\"Data-Query-Es-Field\":\"DETAIL_ES.es_symbol_text_276a6s21,DETAIL_ES.es_multi_attachment_j6q40145,TEXT_DETAIL_ES.es_text_textarea_i88X15c6\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"text_276a6s21,attachment_j6q40145,textarea_i88X15c6\"}"}'
                                    />
                                    <input
                                        type="hidden"
                                        name="view"
                                        value="Products_details"
                                    />
                                    <input
                                        type="hidden"
                                        name="pageParamsJson"
                                        value='{"size":10,"from":0,"totalCount":4}'
                                    />
                                    <input
                                        type="hidden"
                                        name="i18nJson"
                                        value='{"pageUnit_50":"стр.","noData_50":"Нет данных","pageUnit_57":"стр.","confirm_50":"Подтвердить","goodstCode_33":"Номер товара","answer_52":"Ответ","loadMore_57":"Нажмите «загрузить еще»","goodstCode_90":"Номер товара","pageJump_50":"Перейти на","conditions_57":"условие:","goodstCode_93":"Номер товара","pageWhole_50":"всего","pageWhole_57":"всего","noData_57":"Нет данных","conditions_50":"условие:","noMore_57":"Нет больше информации","pageItem_57":"шт.","brand_33":"Бренд","pageItem_50":"шт.","loadNow_57":"Загрузка...","keyword_90":"Ключевые слова","loadMore_50":"Нажмите «загрузить еще»","goodstName_93":"Название товара","totalAcount_57":"Всего Х","totalAcount_50":"Всего Х","noMore_50":"Нет больше информации","pageJump_57":"Перейти на","brand_93":"Бренд","goodstName_33":"Название товара","ask_52":"Вопрос","keyword_33":"Ключевые слова","brand_90":"Бренд","goodstName_90":"Название товара","params_90":"параметр","keyword_93":"Ключевые слова","clearConditions_50":"чистое состояние","confirm_57":"Подтвердить","params_93":"параметр","loadNow_50":"Загрузка...","params_33":"параметр","clearConditions_57":"чистое состояние"}'
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="e_container-67 s_layout Products_imst">
                            <div class="cbox-67-0 p_item">
                                <p class="e_text-68 s_title">Поддержка</p>
                                <div class="e_container-77 s_layout">
                                    <div class="cbox-77-0 p_item">
                                        <div
                                            class="e_richText-79 s_title clearfix"
                                        >
                                            <p>
                                                <span style="line-height: 2"
                                                    ><span
                                                        style="font-size: 16px"
                                                        >Пожалуйста, обратитесь
                                                        в наш отдел технической
                                                        поддержки по вопросам
                                                        установки, устранения
                                                        неполадок или по общим
                                                        вопросам, связанным с
                                                        продуктом.</span
                                                    ></span
                                                >
                                            </p>

                                            <p>
                                                <span style="line-height: 2"
                                                    ><span
                                                        style="font-size: 16px"
                                                        >Часы работы: Пн &ndash;
                                                        Пт, с 9:00 до 19:00
                                                        UTC+8</span
                                                    ></span
                                                >
                                            </p>

                                            <p>
                                                <span style="line-height: 2"
                                                    ><span
                                                        style="font-size: 16px"
                                                        >Обратитесь в службу
                                                        технической поддержки:
                                                        Отправить заявку
                                                        сейчас</span
                                                    ></span
                                                >
                                            </p>

                                            <p>
                                                <span style="line-height: 2"
                                                    ><span
                                                        style="font-size: 16px"
                                                        >Отправить запрос в
                                                        службу поддержки</span
                                                    ></span
                                                >
                                            </p>
                                        </div>
                                        <hr class="e_line-82 s_line" />
                                        <a
                                            class="e_button-89 s_button1 btn btn-primary"
                                            href="<?= get_permalink( 93 ); ?>"
                                            target="_self"
                                        >
                                            <span
                                                >Отправить билет поддержки</span
                                            >
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input
                    type="hidden"
                    name="propJson"
                    value='{"prompt_65":"","prompt_66":"","prompt_63":"","pageConfig_64":{"pcColumn":1,"loopItem":".p_loopItem","pcRow":1,"moColumn":1,"datasourceid":"","elementid":64},"prompt_68":"","value2_24":"","needjs":true,"value5_24":"","prompt_54":"","prompt_56":"","zoom_27":-1,"page_57":{"size":6,"from":0,"totalCount":100},"value1_24":"","page_50":{"size":6,"from":0,"totalCount":100},"value4_24":"","href_89":{"transport":[],"type":"page","value":{"pageId":"b7936057-c3b3-40b9-81a4-1b0c5955eb89","hash":""},"target":"_self"},"status_48":true,"fd360_27":false,"showDefault_41":false,"value7_24":"","videoFd_27":false,"prompt_18":"9999+","value6_24":"","href_68":{"type":"none","value":"","target":""},"href_66":{"transport":[],"type":"field","value":"_href","target":"_self"},"href_65":{"type":"none","value":"","target":""},"href_63":{"transport":[],"type":"field","value":"_href","target":"_self"},"href_62":{"type":"none","value":"","target":""},"value10_24":"","value9_24":"","dense_54":"","dense_56":"","value8_24":"","href_48":{"transport":[],"type":"dialog-interact","value":"1711095708841","target":"_self"},"href_46":{"type":"none","value":"","target":""},"href_44":{"type":"none","value":"","target":""},"dense_65":"","style_41":"style","dense_63":"","dense_68":"","dense_66":"","pageConfig_57":{"showJump":true,"marquee":{"navigation":true,"marqueeTime":4,"scrollType":"horizontal","opp":false},"filterPosition":"","moColumn":1,"rolling":{"navigation":true,"pageStyle":1,"scrollType":"horizontal","pagenation":true,"scrollTime":4,"autoScroll":true,"speed":600},"pageType":"hidden","singleTotal":0,"showButtom":false,"showTotal":false,"pcColumn":1,"loopItem":".p_loopitem","status":true,"pcRow":10,"datasourceid":"datasource5","elementid":57},"href_3":{"type":"none","value":"","target":""},"value3_24":"","status_89":true,"pageConfig_50":{"showJump":true,"marquee":{"navigation":true,"marqueeTime":4,"scrollType":"horizontal","opp":false},"filterPosition":"","moColumn":1,"rolling":{"navigation":true,"pageStyle":1,"scrollType":"horizontal","pagenation":true,"scrollTime":4,"autoScroll":true,"speed":600},"pageType":"hidden","singleTotal":0,"showButtom":false,"showTotal":false,"pcColumn":1,"loopItem":".p_loopitem","status":true,"pcRow":8,"datasourceid":"datasource4","elementid":50},"thumbPosition_27":"bottom","href_56":{"type":"none","value":"","target":""},"href_54":{"type":"none","value":"","target":""},"href_52":{"type":"none","value":"","target":""}}'
                />
            </div>