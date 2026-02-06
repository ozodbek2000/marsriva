<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package marsriva
 */

?>


</div>
                </div>
            </div>
            <div id="c_static_001-1711073284474">
                <div class="e_image-1 s_img">
					<?php 
						$post_id = get_the_ID();
						$title = get_the_title($post_id);
					?>
                    <img
                        src="<?= get_field('background', $post_id); ?>"
                        alt="<?= $title; ?>"
                        title="<?= $title; ?>"
                        la="la"
                        needthumb="true"
                    />
                </div>
                <input
                    type="hidden"
                    name="propJson"
                    value='{"href_1":{"type":"none","value":"","target":""},"setting_1":{"fit":"contain","errorUrl":"portal-saas/pg2025012411115407946/cms/image/6fc49fb3-71c6-4aa4-a41c-a64a53218e37.jpg","needThumb":"true","isLazy":"false"},"space_1":0,"imgList1_1":[],"imgList2_1":[]}'
                />
            </div>
            <div id="c_static_001_P_25368-1711074949519">
                <div class="e_container-1 s_layout">
                    <div class="cbox-1-0 p_item">
						<div class="e_breadcrumb-5 s_list" needjs="true">
                            <ul class="p_breadcrumb">
                                <!-- Главная страница -->
                                <li class="p_breadcrumbItem">
                                    <a href="<?= esc_url(get_home_url()); ?>">
                                        <span class="text-secondary p_icon">
                                            <svg t="1631185047228" class="icon" viewBox="0 0 1029 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1034" width="200" height="200">
                                                <path d="M44.799492 528.986943a42.836848 42.836848 0 0 1-31.231646-13.567846 42.725916 42.725916 0 0 1 2.133309-60.329983L491.685094 11.446142a42.68325 42.68325 0 0 1 58.538003 0.34133l465.658723 443.642972c17.066473 16.21315 17.749132 43.26351 1.45065 60.329983s-43.26351 17.749132-60.329983 1.45065L520.442102 101.301124 73.897829 517.552406c-8.27724 7.679913-18.687788 11.434537-29.098337 11.434537z" p-id="1035"></path>
                                                <path d="M752.716803 1024H282.876794c-111.188073 0-201.640381-86.697684-201.640381-193.27781V434.524014c0-23.551733 19.11445-42.666183 42.666183-42.666183s42.666183 19.11445 42.666183 42.666183v396.283509c0 59.476659 52.138076 107.945443 116.308015 107.945443h469.925341c64.084607 0 116.308015-48.383452 116.308015-107.945443V434.524014c0-23.551733 19.11445-42.666183 42.666183-42.666183s42.666183 19.11445 42.666183 42.666183v396.283509c-0.085332 106.494793-90.537641 193.192477-201.725713 193.192477z" p-id="1036"></path>
                                                <path d="M657.400549 1017.173411H383.142324c-23.551733 0-42.666183-19.11445-42.666183-42.666183V625.839179c0-23.551733 19.11445-42.666183 42.666183-42.666183h274.258225c23.551733 0 42.666183 19.11445 42.666184 42.666183v348.668049c0 23.551733-19.11445 42.666183-42.666184 42.666183z m-231.592041-85.332367h188.925858V668.505362H425.808508v263.335682z" p-id="1037"></path>
                                            </svg>
                                        </span>
                                        <span class="text-secondary p_title">Главная страница</span>
                                    </a>
                                </li>

                                <?php
                                $current_term = null;
                                $taxonomy = '';
                                $is_single_page = false;
                                
                                // Определяем тип страницы и получаем термин
                                if (is_tax('product_cat') || is_product_category()) {
                                    $current_term = get_queried_object();
                                    $taxonomy = 'product_cat';
                                } elseif (is_category()) {
                                    $current_term = get_queried_object();
                                    $taxonomy = 'category';
                                } elseif (is_singular('product')) {
                                    $terms = get_the_terms(get_the_ID(), 'product_cat');
                                    if ($terms && !is_wp_error($terms)) {
                                        $current_term = reset($terms);
                                        $taxonomy = 'product_cat';
                                        $is_single_page = true;
                                    }
                                } elseif (is_single()) {
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $current_term = $categories[0];
                                        $taxonomy = 'category';
                                        $is_single_page = true;
                                    }
                                }
                                
                                // Формируем и выводим хлебные крошки
                                if ($current_term && $taxonomy) {
                                    $breadcrumb_items = [];
                                    
                                    // Получаем всех предков (от корня к текущей)
                                    $ancestors = get_ancestors($current_term->term_id, $taxonomy);
                                    if (!empty($ancestors)) {
                                        foreach (array_reverse($ancestors) as $ancestor_id) {
                                            $ancestor = get_term($ancestor_id, $taxonomy);
                                            if ($ancestor && !is_wp_error($ancestor)) {
                                                $breadcrumb_items[] = ['term' => $ancestor, 'is_current' => false];
                                            }
                                        }
                                    }
                                    
                                    // Добавляем текущую категорию
                                    $breadcrumb_items[] = ['term' => $current_term, 'is_current' => !$is_single_page];
                                    
                                    // Выводим элементы
                                    foreach ($breadcrumb_items as $item) : ?>
                                        <li class="p_breadcrumbItem">
                                            <div class="p_showTitle">
                                                <?php if ($item['is_current']) : ?>
                                                    <span class="text-secondary p_title"><?= esc_html($item['term']->name); ?></span>
                                                <?php else : ?>
                                                    <a href="<?= esc_url(get_term_link($item['term'])); ?>" class="text-secondary p_title">
                                                        <?= esc_html($item['term']->name); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach;
                                }
                                
                                // Заголовок поста/товара
                                if ($is_single_page) : ?>
                                    <li class="p_breadcrumbItem">
                                        <div class="p_showTitle">
                                            <span class="text-secondary p_title"><?= esc_html(get_the_title()); ?></span>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
						</div>
                    </div>
                </div>
                <input type="hidden" name="propJson" value="{}" />
            </div>
            <div id="c_static_001_P_41317-1716431291952">
                <div class="e_container-4 s_layout">
                    <div class="cbox-4-0 p_item">
                        <div
                            class="e_categoryC-2 saf-cnProCate"
                            needjs="false"
                            data-currentCate="Солнечные инверторы"
                        >
                            <div class="saf-cn-cate cate1">
                                <div class="saf-cn-cateTitle">Энергия</div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="26.html">Все</a></li>
                                        <li>
                                            <a href="29.html"
                                                >Солнечные инверторы</a
                                            >
                                        </li>
                                        <li>
                                            <a href="46.html"
                                                >Солнечные панели</a
                                            >
                                        </li>
                                        <li>
                                            <a href="36.html"
                                                >Энергетические батареи</a
                                            >
                                        </li>
                                        <li>
                                            <a href="35.html"
                                                >Система хранения энергии</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate1">
                                <div class="saf-cn-cateTitle">Системы ИБП</div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="27.html">Все</a></li>
                                        <li><a href="30.html">DC ИБП</a></li>
                                        <li><a href="68.html">ИБП</a></li>
                                        <li>
                                            <a href="32.html"
                                                >Стабилизаторы напряжения</a
                                            >
                                        </li>
                                        <li>
                                            <a href="69.html">SOHO Инверторы</a>
                                        </li>
                                        <li><a href="33.html">Батареи</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate1">
                                <div class="saf-cn-cateTitle">Зарядка</div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="57.html">Все</a></li>
                                        <li>
                                            <a href="58.html">Удлинитель</a>
                                        </li>
                                        <li><a href="59.html">Повербанк</a></li>
                                        <li>
                                            <a href="60.html"
                                                >Зарядное устройство для
                                                электромобилей</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate1">
                                <div class="saf-cn-cateTitle">
                                    Стеллажи и аксессуары
                                </div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="28.html">Все</a></li>
                                        <li>
                                            <a href="61.html"
                                                >Настенные шкафы</a
                                            >
                                        </li>
                                        <li>
                                            <a href="62.html"
                                                >Напольные шкафы</a
                                            >
                                        </li>
                                        <li>
                                            <a href="63.html">Аксессуары</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="saf-cn-cate cate2 active">
                                <div class="saf-cn-cateTitle">
                                    <?= get_the_title(); ?>
                                </div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="29.html">Все</a></li>
                                        <li>
                                            <a href="42.html"
                                                >Автономный инвертор</a
                                            >
                                        </li>
                                        <li>
                                            <a href="41.html"
                                                >Гибридный инвертор</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate2">
                                <div class="saf-cn-cateTitle">
                                    Энергетические батареи
                                </div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="36.html">Все</a></li>
                                        <li>
                                            <a href="54.html"
                                                >Низкое напряжение (НН)</a
                                            >
                                        </li>
                                        <li>
                                            <a href="50.html"
                                                >Высокое напряжение (ВН)</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate2">
                                <div class="saf-cn-cateTitle">
                                    Система хранения энергии
                                </div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="35.html">Все</a></li>
                                        <li>
                                            <a href="48.html"
                                                >Портативная электростанция</a
                                            >
                                        </li>
                                        <li>
                                            <a href="47.html"
                                                >Резервное хранение энергии в
                                                жилых помещениях</a
                                            >
                                        </li>
                                        <li>
                                            <a href="49.html"
                                                >Коммерческое хранение
                                                энергии</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate2">
                                <div class="saf-cn-cateTitle">ИБП</div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="68.html">Все</a></li>
                                        <li>
                                            <a href="65.html"
                                                >Линейный интерактивный ИБП</a
                                            >
                                        </li>
                                        <li>
                                            <a href="66.html">Онлайн ИБП</a>
                                        </li>
                                        <li>
                                            <a href="67.html"
                                                >Литий-ионный ИБП (источник
                                                бесперебойного питания)</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="saf-cn-cate cate2">
                                <div class="saf-cn-cateTitle">Батареи</div>
                                <div class="saf-cn-cateList">
                                    <ul>
                                        <li><a href="33.html">Все</a></li>
                                        <li>
                                            <a href="38.html"
                                                >VRLA аккумуляторы</a
                                            >
                                        </li>
                                        <li>
                                            <a href="37.html"
                                                >Батарейные блоки расширения</a
                                            >
                                        </li>
                                        <li>
                                            <a href="../Products/71.html"
                                                >Li-ion аккумуляторы</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input
                    type="hidden"
                    name="propJson"
                    value='{"isParam_2":false,"tag_2":[],"showImg_2":true}'
                />
            </div>
            <div id="c_static_001-1711073392830">
                <div class="e_container-1 s_layout">
                    <div class="cbox-1-0 p_item">
                        <div
                            class="e_loop-2 s_list"
                            needjs="true"
                            ds-id=""
                            elem-id="e_loop-2"
                        >
                            <div class="">
                                <div class="p_list">
                                    <?php
                                    if (class_exists('WooCommerce')) {
                                        $args = [
                                            'post_type' => 'product',
                                            'posts_per_page' => 12,
                                            'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                                        ];

                                        $loop = new WP_Query($args);

                                        if ($loop->have_posts()) {
                                            while ($loop->have_posts()) : $loop->the_post();
                                                global $product; ?>
                                                <div class="cbox-2 p_loopitem">
                                                    <div class="e_container-3 s_layout">
                                                        <div class="cbox-3-0 p_item">
                                                            <div class="e_image-4 s_img">
                                                                <a href="<?php the_permalink(); ?>" target="_self">
                                                                    <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="e_container-10 s_layout">
                                                                <div class="cbox-10-0 p_item">
                                                                    <p class="e_text-6 s_title"><?php the_title(); ?></p>
                                                                    <p class="e_text-8 s_title"><?php echo $product->get_price_html(); ?></p>
                                                                    <p class="e_text-11 s_description"><?php echo wp_trim_words($product->get_short_description(), 20, '...'); ?></p>
                                                                    <a class="e_button-9 s_button1 btn btn-primary" href="<?php the_permalink(); ?>" target="_self">
                                                                        <span>Узнать больше &gt;</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile;
                                            wp_reset_postdata();
                                        } else {
                                            echo '<p>Товары не найдены.</p>';
                                        }
                                    }
                                    ?>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/335.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/0f1d92fd-7abe-4a0c-ae41-e20ebc304c1a.jpg"
                                                            alt="MR-SPF1.2K-LP1-TL20E"
                                                            title="MR-SPF1.2K-LP1-TL20E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF1.2K-LP1-TL20E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP20 —
                                                            Высокочастотный
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 1.2кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/335.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/337.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/9efd4e9c-1780-452f-bce3-00191030a768.jpg"
                                                            alt="MR-SPF3.6K-LP1-TL20E"
                                                            title="MR-SPF3.6K-LP1-TL20E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF3.6K-LP1-TL20E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP20 —
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            RATED POWER: 3.6kVA
                                                            / 3.6kW
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/337.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/331.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/934a7988-906a-4fc4-a0f5-d4da97b4169d.jpg"
                                                            alt="MR-SPF5K-LP1-TL20E"
                                                            title="MR-SPF5K-LP1-TL20E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF5K-LP1-TL20E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP20 —
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 5кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/331.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/330.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/934a7988-906a-4fc4-a0f5-d4da97b4169d.jpg"
                                                            alt="MR-SPF6.5K-LP1-TL20E"
                                                            title="MR-SPF6.5K-LP1-TL20E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF6.5K-LP1-TL20E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP20 —
                                                            Высокочастотный
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 6.5кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/330.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/232.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/ab17e30b-04b8-482c-81f9-506f36d92770.jpg"
                                                            alt="MR-SPF8000M TWIN (версия 1)"
                                                            title="MR-SPF8000M TWIN (версия 1)"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF8000M TWIN
                                                            (версия 1)
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный - IP20 -
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 8 кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/232.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/231.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/ab17e30b-04b8-482c-81f9-506f36d92770.jpg"
                                                            alt="MR-SPF11000M TWIN (версия 1)"
                                                            title="MR-SPF11000M TWIN (версия 1)"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF11000M TWIN
                                                            (версия 1)
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный - IP20 -
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 11 кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/231.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/336.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/f997fa06-7d87-48fe-9552-9744e9dc3aba.jpg"
                                                            alt="MR-SPF12K-LP1-TL20E"
                                                            title="MR-SPF12K-LP1-TL20E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF12K-LP1-TL20E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP20 —
                                                            Высокочастотный
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 12кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/336.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/332.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/83ba5e6f-39ac-4402-9cff-6eb428640b21.jpg"
                                                            alt="MR-SPH6.6К-LP1-TL65E"
                                                            title="MR-SPH6.6К-LP1-TL65E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPH6.6К-LP1-TL65E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP66 —
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 6.6кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/332.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/333.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/83ba5e6f-39ac-4402-9cff-6eb428640b21.jpg"
                                                            alt="MR-SPH8.6К-LP1-TL65E"
                                                            title="MR-SPH8.6К-LP1-TL65E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPH8.6К-LP1-TL65E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP66 —
                                                            Высокочастотный
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 8.6кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/333.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/334.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/83ba5e6f-39ac-4402-9cff-6eb428640b21.jpg"
                                                            alt="MR-SPH10.6K-LP1-TL65E"
                                                            title="MR-SPH10.6K-LP1-TL65E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPH10.6K-LP1-TL65E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный — IP66 —
                                                            Высокочастотный
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 10.6кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/334.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_details/1361441737636380672.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/ddf53ddf-fbd5-4e53-a5cb-9a8ee678dd6e.jpg"
                                                            alt="MR-SPH8K-LP3-TL65E"
                                                            title="MR-SPH8K-LP3-TL65E"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPH8K-LP3-TL65E
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Трехфазный - IP65 -
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 8 кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_details/1361441737636380672.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-2 p_loopitem">
                                        <div class="e_container-3 s_layout">
                                            <div class="cbox-3-0 p_item">
                                                <div class="e_image-4 s_img">
                                                    <a
                                                        href="../Products_item_2/150.html"
                                                        target="_self"
                                                    >
                                                        <img
                                                            src="https://omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/76e9271b-4db4-453d-b658-8dcd2b7b9502.jpg"
                                                            alt="MR-SPF1200"
                                                            title="MR-SPF1200"
                                                            la="la"
                                                            needthumb="true"
                                                        />
                                                    </a>
                                                </div>
                                                <div
                                                    class="e_container-10 s_layout"
                                                >
                                                    <div
                                                        class="cbox-10-0 p_item"
                                                    >
                                                        <p
                                                            class="e_text-13 s_title"
                                                        ></p>
                                                        <p
                                                            class="e_text-6 s_title"
                                                        >
                                                            MR-SPF1200
                                                        </p>
                                                        <p
                                                            class="e_text-8 s_title"
                                                        >
                                                            Однофазный - IP20 -
                                                            Высокая частота
                                                        </p>
                                                        <p
                                                            class="e_text-11 s_title"
                                                        >
                                                            Номинальная
                                                            мощность: 1,2 кВт
                                                        </p>
                                                        <a
                                                            class="e_button-9 s_button1 btn btn-primary"
                                                            href="../Products_item_2/150.html"
                                                            target="_self"
                                                        >
                                                            <span
                                                                >Узнать
                                                                больше&gt;</span
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p_page">
                                    <div class="page_con">
                                        <a
                                            href="javascript:;"
                                            class="page_a page_prev disabled"
                                            >&lt;</a
                                        >
                                        <a
                                            class="page_a page_num current"
                                            href="javascript:;"
                                            >1</a
                                        ><a
                                            class="page_a page_num"
                                            href="javascript:;"
                                            >2</a
                                        ><a
                                            class="page_a page_num"
                                            href="javascript:;"
                                            >3</a
                                        >
                                        <a
                                            href="javascript:;"
                                            class="page_a page_next"
                                            >&gt;</a
                                        >
                                    </div>
                                </div>
                            </div>
                            <input
                                type="hidden"
                                name="_config"
                                value='{"ignoreEmptyCheck":true,"cname":"产品-产品列表","type":"list","params":{"size":12,"query":[{"filter":"ignore-empty-check","esField":"category.id","groupName":"数据展示条件,默认条件组","field":"categoryId","valueName":"","sourceType":"page","dataType":"string","logic":"and","groupBegin":"1,2","value":"1222952471572643840","operator":"eq"},{"filter":"ignore-empty-check","esField":"productName.keyword","groupEnd":"2,1","field":"title","sourceType":"page","valueName":"","dataType":"string","logic":"or","fieldType":"string","operator":"like"}],"header":{"Data-Query-Es-Field":"summary,deliveryDateDesc","Data-Query-Random":0,"Data-Query-Field":"summary,delivery"},"from":0,"sort":[],"_detailId":"1222952471572643840"},"valueUrl":"/fwebapi/product/datasource/143150160001/product/list/param/value","priority":0,"_dataFilter":{"filter":false,"showCondition":false,"conditionExclude":false,"showSearch":false,"currentConditionHide":false,"selectFirstCondition":false,"fields":[],"viscidityEnableShowAll":false,"cascaderEnable":false,"showSearchCname":"","viscidityEnable":false,"viscidityEnableShowFirst":false},"appId":"143150160001","sourceUuid":"d2f12f858d9f46eeb5b049baa1dffc37","pageParams":[{"code":"_detailId","name":"默认参数"},{"code":"Search","name":"搜索"}],"metaUrl":"/fwebapi/product/datasource/143150160001/product/list/meta","disabled":false,"api":"/fwebapi/product/product/es/findPage?appId&#x3D;143150160001&amp;templateId&#x3D;product","id":"datasource1","apiId":"product","reqKey":"/fwebapi/product/product/es/findPage?appId&#x3D;143150160001&amp;templateId&#x3D;product|{\"size\":12,\"query\":[{\"filter\":\"ignore-empty-check\",\"esField\":\"category.id\",\"groupName\":\"数据展示条件,默认条件组\",\"field\":\"categoryId\",\"valueName\":\"\",\"sourceType\":\"page\",\"dataType\":\"string\",\"logic\":\"and\",\"groupBegin\":\"1,2\",\"value\":\"1222952471572643840\",\"operator\":\"eq\"},{\"filter\":\"ignore-empty-check\",\"esField\":\"productName.keyword\",\"groupEnd\":\"2,1\",\"field\":\"title\",\"sourceType\":\"page\",\"valueName\":\"\",\"dataType\":\"string\",\"logic\":\"or\",\"fieldType\":\"string\",\"operator\":\"like\"}],\"header\":{\"Data-Query-Es-Field\":\"summary,deliveryDateDesc\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"summary,delivery\"},\"from\":0,\"sort\":[],\"_detailId\":\"1222952471572643840\"}|{\"Data-Query-Es-Field\":\"summary,deliveryDateDesc\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"summary,delivery\"}"}'
                            />
                            <input type="hidden" name="view" value="Products" />
                            <input
                                type="hidden"
                                name="pageParamsJson"
                                value='{"size":12,"from":0,"totalCount":32}'
                            />
                            <input
                                type="hidden"
                                name="i18nJson"
                                value='{"confirm_2":"Подтвердить","loadMore_2":"Нажмите «загрузить еще»","loadNow_2":"Загрузка...","noMore_2":"Нет больше информации","clearConditions_2":"чистое состояние","pageItem_2":"шт.","noData_2":"Нет данных","totalAcount_2":"Всего Х","pageJump_2":"Перейти на","conditions_2":"условие:","pageWhole_2":"всего","pageUnit_2":"стр."}'
                            />
                        </div>
                    </div>
                </div>
                <input
                    type="hidden"
                    name="propJson"
                    value='{"dense_13":"","dense_11":"","href_9":{"transport":[],"type":"field","value":"hrefObject","target":"_self"},"href_8":{"type":"none","value":"","target":""},"href_4":{"transport":[],"type":"field","value":"hrefObject","target":"_self"},"href_6":{"type":"none","value":"","target":""},"setting_4":{"fit":"contain","errorUrl":"","needThumb":"true","isLazy":"true"},"dense_8":"","pageConfig_2":{"showJump":false,"marquee":{"navigation":true,"marqueeTime":4,"scrollType":"horizontal","opp":false},"filterPosition":"","moColumn":2,"rolling":{"navigation":true,"pageStyle":1,"scrollType":"horizontal","pagenation":true,"scrollTime":4,"autoScroll":true,"speed":600},"pageType":"turnpageajax","singleTotal":0,"showButtom":false,"showTotal":false,"pcColumn":3,"loopItem":".p_loopitem","status":true,"pcRow":4,"datasourceid":"datasource1","elementid":2},"dense_6":"","page_2":{"size":6,"from":0,"totalCount":100},"imgList1_4":[],"imgList2_4":[],"space_4":0,"prompt_11":"","prompt_6":"","prompt_8":"","status_9":true,"prompt_13":"","href_13":{"type":"none","value":"","target":""},"href_11":{"type":"none","value":"","target":""}}'
                />
            </div>

