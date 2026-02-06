<?php 
    /*
        Template Name: Contact
    */
?>

<?= get_header(); ?>
            <div id="c_static_001_P_6841-17116977331910">
                <div class="e_bannerA-1 s_list" needjs="false">
                    <div class="swiper-container">
                        <div class="swiper-wrapper p_swiperContainer">
                            <div class="swiper-slide p_slide">
                                <div class="p_img">
                                    <a href="javascript:;">
                                        <img
                                            src="<?= bloginfo('template_url'); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/12c1a8fb-5588-4f53-8344-dcfc465bc042.jpg"
                                            alt="Свяжитесь с нами"
                                            title="Свяжитесь с нами"
                                            la="la"
                                        />
                                    </a>
                                </div>
                                <div class="p_info">
                                    <div>
                                        <p class="text-white p_btitle">
                                            <a href="javascript:;">
                                                Свяжитесь с нами
                                            </a>
                                        </p>
                                        <p class="text-white p_summary">
                                            Вы можете связаться с MARSRIVA
                                            следующими способами
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination p_pagenation"></div>
                    </div>
                </div>
                <input
                    type="hidden"
                    name="propJson"
                    value='{"settings_1":{"pagination":true,"showText":true,"autoplay":false,"speed":0,"videoLoop":false,"videoControlor":false,"isThumb":"false","navigation":false,"effect":"slide","videoAutoplay":false,"videoMouted":true,"deplay":4,"direction":"horizontal"}}'
                />
            </div>
            <div id="c_static_001_P_8174-1670469284390">
                <div class="e_container-2 s_layout">
                    <div class="cbox-2-0 p_item">
                        <div class="e_breadcrumb-8 s_list" needjs="true">
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
                                $breadcrumb_items = [];
                                
                                // Определяем тип страницы
                                if (is_tax('product_cat') || is_product_category()) {
                                    // Страница категории WooCommerce
                                    $current_term = get_queried_object();
                                    $taxonomy = 'product_cat';
                                } elseif (is_category()) {
                                    // Страница категории блога
                                    $current_term = get_queried_object();
                                    $taxonomy = 'category';
                                } elseif (is_singular('product')) {
                                    // Страница товара WooCommerce
                                    $terms = get_the_terms(get_the_ID(), 'product_cat');
                                    if ($terms && !is_wp_error($terms)) {
                                        $current_term = reset($terms);
                                        $taxonomy = 'product_cat';
                                        $is_single_page = true;
                                    }
                                } elseif (is_single()) {
                                    // Страница поста блога
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $current_term = $categories[0];
                                        $taxonomy = 'category';
                                        $is_single_page = true;
                                    }
                                } elseif (is_page() && !is_front_page()) {
                                    // Обычная страница (Контакты, О нас и т.д.)
                                    $current_page = get_queried_object();
                                    
                                    // Получаем родительские страницы (если есть)
                                    if ($current_page->post_parent) {
                                        $parent_ids = get_post_ancestors($current_page->ID);
                                        // Переворачиваем, чтобы идти от корня к текущей
                                        foreach (array_reverse($parent_ids) as $parent_id) {
                                            $parent = get_post($parent_id);
                                            if ($parent) {
                                                $breadcrumb_items[] = [
                                                    'title' => $parent->post_title,
                                                    'url' => get_permalink($parent),
                                                    'is_current' => false
                                                ];
                                            }
                                        }
                                    }
                                    
                                    // Добавляем текущую страницу
                                    $breadcrumb_items[] = [
                                        'title' => $current_page->post_title,
                                        'url' => '',
                                        'is_current' => true
                                    ];
                                }
                                
                                // Формируем хлебные крошки для категорий/постов/товаров
                                if ($current_term && $taxonomy) {
                                    // Получаем всех предков (от корня к текущей)
                                    $ancestors = get_ancestors($current_term->term_id, $taxonomy);
                                    if (!empty($ancestors)) {
                                        foreach (array_reverse($ancestors) as $ancestor_id) {
                                            $ancestor = get_term($ancestor_id, $taxonomy);
                                            if ($ancestor && !is_wp_error($ancestor)) {
                                                $breadcrumb_items[] = [
                                                    'title' => $ancestor->name,
                                                    'url' => get_term_link($ancestor),
                                                    'is_current' => false
                                                ];
                                            }
                                        }
                                    }
                                    
                                    // Добавляем текущую категорию
                                    $breadcrumb_items[] = [
                                        'title' => $current_term->name,
                                        'url' => !$is_single_page ? '' : get_term_link($current_term),
                                        'is_current' => !$is_single_page
                                    ];
                                    
                                    // Добавляем заголовок поста/товара
                                    if ($is_single_page) {
                                        $breadcrumb_items[] = [
                                            'title' => get_the_title(),
                                            'url' => '',
                                            'is_current' => true
                                        ];
                                    }
                                }
                                
                                // Выводим элементы хлебных крошек
                                foreach ($breadcrumb_items as $item) : ?>
                                    <li class="p_breadcrumbItem">
                                        <div class="p_showTitle">
                                            <?php if ($item['is_current']) : ?>
                                                <span class="text-secondary p_title"><?= esc_html($item['title']); ?></span>
                                            <?php else : ?>
                                                <a href="<?= esc_url($item['url']); ?>" class="text-secondary p_title">
                                                    <?= esc_html($item['title']); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="propJson" value="{}" />
            </div>
            <div id="c_grid-1670469364408">
                <div class="p_gridbox e_comp signal">
                    <div
                        id="content_box-1670469364408-0"
                        class="d_gridCell_0 p_gridCell"
                    >
                        <div id="c_grid-1671105623265">
                            <div class="p_gridbox e_comp signal">
                                <div
                                    id="content_box-1671105623265-0"
                                    class="d_gridCell_0 p_gridCell"
                                >
                                    <div id="c_new_list_191-1711704053390">
                                        <p class="e_text-19 s_title">
                                            Если у вас есть какие-либо вопросы,
                                            пожалуйста, оставьте нам сообщение
                                        </p>
                                        <input
                                            type="hidden"
                                            name="propJson"
                                            value='{"href_19":{"type":"none","value":"","target":""},"prompt_19":"","dense_19":""}'
                                        />
                                    </div>
                                    <div id="c_magiccube_009-1712043553063">
                                        <div
                                            class="p_tab_wrapper p_top"
                                            needjs="true"
                                        >
                                            <div class="p_tablist top">
                                                <span
                                                    class="tab-item js_editor_click active p_active"
                                                >
                                                    Отдел поддержки
                                                </span>
                                                <span
                                                    class="tab-item js_editor_click p_tab"
                                                >
                                                    Отдел продаж
                                                </span>
                                                <span
                                                    class="tab-item js_editor_click p_tab"
                                                >
                                                    Проектный отдел
                                                </span>
                                            </div>
                                            <div
                                                class="top-content content_wrapper"
                                            >
                                                <div
                                                    class="p_content content-box active"
                                                    id="content_box-1712043553063-0"
                                                >
                                                    <div
                                                        id="c_form_064-1712043876358"
                                                    >
                                                        <div
                                                            class="e_container-14 s_layout mw"
                                                        >
                                                            <div
                                                                class="cbox-14-0 p_item"
                                                            >
                                                                <form
                                                                    class="e_form-29 s_layout messforma"
                                                                    needjs="true"
                                                                >
                                                                    <div
                                                                        class="cbox-29"
                                                                    >
                                                                        <div
                                                                            class="e_input-30 s_form1 form-group"
                                                                            needjs="true"
                                                                            data-pagelink=""
                                                                            hidden
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Адрес
                                                                                    источника</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="text"
                                                                                        data-name="e_input-30"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_input-31 s_form1 form-group"
                                                                            needjs="true"
                                                                            data-pagename=""
                                                                            hidden
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Страница
                                                                                    источника</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="text"
                                                                                        data-name="e_input-31"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-32 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Имя:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-32"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-34 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Страна/Регион:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-34"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-37 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Телефон:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-37"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueEmail-33 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Электронная
                                                                                    почта:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="email1712044176522"
                                                                                        data-name="e_clueEmail-33"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_textarea-35 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Описание:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <textarea
                                                                                    class="form-control s_form-control s_input p_input"
                                                                                    rows="3"
                                                                                    name="e_textarea-35"
                                                                                    placeholder="Пожалуйста опишите ваши требования"
                                                                                ></textarea>
                                                                                <div
                                                                                    class="invalid-feedback"
                                                                                ></div>
                                                                            </div>
                                                                        </div>
                                                                        <a
                                                                            class="e_formBtn-36 s_button1 btn btn-primary"
                                                                            href="javascript:;"
                                                                            needjs="true"
                                                                        >
                                                                            <span
                                                                                >ПОДСТАВИТЬ</span
                                                                            >
                                                                        </a>
                                                                    </div>
                                                                    <input
                                                                        name="jumpPage"
                                                                        type="hidden"
                                                                        value="/successfully.html"
                                                                    />
                                                                    <input
                                                                        name="i18nJson"
                                                                        type="hidden"
                                                                        value='{"required_37":"Пожалуйста, введите содержание","minLength_37":"Вводимое содержание не может быть меньше %len символов","minLength_34":"Вводимое содержание не может быть меньше %len символов","minLength_35":"Вводимое содержание не может быть меньше %len символов","required_33":"Пожалуйста, введите содержание","required_34":"Пожалуйста, введите содержание","required_35":"Пожалуйста, введите содержание","minLength_32":"Вводимое содержание не может быть меньше %len символов","minLength_33":"Вводимое содержание не может быть меньше %len символов","minLength_30":"Вводимое содержание не может быть меньше %len символов","minLength_31":"Вводимое содержание не может быть меньше %len символов","maxLength_31":"Не допускается вводить более %len символов","maxLength_30":"Не допускается вводить более %len символов","maxLength_35":"Не допускается вводить более %len символов","maxLength_34":"Не допускается вводить более %len символов","maxLength_33":"Не допускается вводить более %len символов","maxLength_32":"Не допускается вводить более %len символов","required_30":"Пожалуйста, введите содержание","required_31":"Пожалуйста, введите содержание","maxLength_37":"Не допускается вводить более %len символов","required_32":"Пожалуйста, введите содержание"}'
                                                                    />
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <input
                                                            type="hidden"
                                                            name="propJson"
                                                            value='{"value_37":"","value_35":"","submit_29":{"obj2":{"type":"customPage","value":{"type":"link","params":[],"value":"/successfully.html"},"target":"_self"},"obj1":{"result":1,"request":[],"promptTime":0,"prompt":"Подать успешно!"},"logic":[],"type":2,"obj3":{}},"showPlaceholder_30":true,"showPlaceholder_31":true,"showPlaceholder_34":true,"value_30":"","showPlaceholder_35":true,"showPlaceholder_32":true,"showPlaceholder_33":true,"value_33":"","value_34":"","value_31":"","value_32":"","showPlaceholder_37":true,"datasource_30":{},"notice_29":{"rules":[{"code":"submit","mail":"e_clueEmail-33","phone":"e_input-30","title":"Support Contact Us","user":2}],"status":1},"rule_29":[],"formId_29":"1224749826092900352","datasource_37":{},"datasource_35":{},"datasource_34":{},"datasource_33":{},"datasource_32":{},"datasource_31":{},"state_37":"normal","state_35":"normal","business_36":[],"validate_37":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_35":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","state":true,"value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_34":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_33":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_32":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_31":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":false},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"state_30":"normal","validate_30":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":false},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"customParam_34":"","basic_29":{"submitLimit":{"unit":1,"count":1,"interval":1,"peopleLimit":1,"limitRule":1},"submitTime":{"limit":2,"startTime":"","endTime":"","prompt":""},"formInfo":{"app":"120113","name":"SUPPORT","title":"Support Contact Us"},"advanced":{"customState":[],"message":1}},"customParam_37":"","customParam_31":"","state_33":"normal","customParam_30":"","state_34":"normal","state_31":"normal","customParam_33":"","customParam_32":"","state_32":"normal","ddItem_33":{},"ddItem_34":{},"ddItem_35":{},"ddItem_30":{},"ddItem_31":{},"ddItem_32":{},"prompt_36":"","ddItem_37":{},"initType_33":1,"initType_32":1,"initType_35":1,"initType_34":1,"enterSubmit_35":false,"enterSubmit_34":false,"initType_31":1,"enterSubmit_37":false,"initType_30":1,"initType_37":1,"enterSubmit_31":false,"enterSubmit_30":false,"enterSubmit_33":false,"enterSubmit_32":false,"async_29":{"status":1,"target":"clue","relation":[{"from":"e_input-2","to":"contactName"},{"from":"e_input-4","to":"email"},{"from":"e_input-3","to":"phone"}]},"type_34":"text","type_32":"text","type_33":"email","type_30":"text","type_31":"text","placeholder_32":"","placeholder_31":"","placeholder_30":"","placeholder_35":"Пожалуйста опишите ваши требования","placeholder_34":"","type_36":1,"placeholder_33":"","type_37":"text","label_30":"Адрес источника","label_31":"Страница источника","label_32":"Имя:","label_33":"Электронная почта:","placeholder_37":"","label_34":"Страна/Регион:","label_35":"Описание:","label_37":"Телефон:","sourceUuid_29":"1775070299767832576","showLabel_30":true,"showLabel_31":true,"showLabel_32":true,"showLabel_33":true,"showLabel_34":true,"showLabel_35":true,"cuname_30":"text","showLabel_37":true,"action_36":1,"cuname_34":"name1712044155340","cuname_33":"email1712044176522","cuname_32":"name1712044155340","cuname_31":"text","cuname_37":"name1712044155340"}'
                                                        />
                                                    </div>
                                                </div>
                                                <div
                                                    class="p_content content-box"
                                                    id="content_box-1712043553063-1"
                                                >
                                                    <div
                                                        id="c_form_064-17120447468330"
                                                    >
                                                        <div
                                                            class="e_container-14 s_layout mw"
                                                        >
                                                            <div
                                                                class="cbox-14-0 p_item"
                                                            >
                                                                <form
                                                                    class="e_form-37 s_layout messforma"
                                                                    needjs="true"
                                                                >
                                                                    <div
                                                                        class="cbox-37"
                                                                    >
                                                                        <div
                                                                            class="e_input-38 s_form1 form-group"
                                                                            needjs="true"
                                                                            data-pagelink=""
                                                                            hidden
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Адрес
                                                                                    источника</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="text"
                                                                                        data-name="e_input-38"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_input-39 s_form1 form-group"
                                                                            needjs="true"
                                                                            data-pagename=""
                                                                            hidden
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Страница
                                                                                    источника</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="text"
                                                                                        data-name="e_input-39"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-40 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Имя:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-40"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-42 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Страна/Регион:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-42"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-45 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Телефон:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-45"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueEmail-41 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Электронная
                                                                                    почта:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="email1712044176522"
                                                                                        data-name="e_clueEmail-41"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_textarea-43 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Описание:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <textarea
                                                                                    class="form-control s_form-control s_input p_input"
                                                                                    rows="3"
                                                                                    name="e_textarea-43"
                                                                                    placeholder="Пожалуйста опишите ваши требования"
                                                                                ></textarea>
                                                                                <div
                                                                                    class="invalid-feedback"
                                                                                ></div>
                                                                            </div>
                                                                        </div>
                                                                        <a
                                                                            class="e_formBtn-44 s_button1 btn btn-primary"
                                                                            href="javascript:;"
                                                                            needjs="true"
                                                                        >
                                                                            <span
                                                                                >ПОДСТАВИТЬ</span
                                                                            >
                                                                        </a>
                                                                    </div>
                                                                    <input
                                                                        name="jumpPage"
                                                                        type="hidden"
                                                                        value="/successfully.html"
                                                                    />
                                                                    <input
                                                                        name="i18nJson"
                                                                        type="hidden"
                                                                        value='{"required_38":"Пожалуйста, введите содержание","required_39":"Пожалуйста, введите содержание","minLength_45":"Вводимое содержание не может быть меньше %len символов","required_45":"Пожалуйста, введите содержание","minLength_38":"Вводимое содержание не может быть меньше %len символов","minLength_39":"Вводимое содержание не может быть меньше %len символов","minLength_40":"Вводимое содержание не может быть меньше %len символов","minLength_43":"Вводимое содержание не может быть меньше %len символов","minLength_41":"Вводимое содержание не может быть меньше %len символов","minLength_42":"Вводимое содержание не может быть меньше %len символов","maxLength_42":"Не допускается вводить более %len символов","maxLength_41":"Не допускается вводить более %len символов","maxLength_40":"Не допускается вводить более %len символов","maxLength_45":"Не допускается вводить более %len символов","maxLength_43":"Не допускается вводить более %len символов","maxLength_39":"Не допускается вводить более %len символов","required_40":"Пожалуйста, введите содержание","maxLength_38":"Не допускается вводить более %len символов","required_41":"Пожалуйста, введите содержание","required_42":"Пожалуйста, введите содержание","required_43":"Пожалуйста, введите содержание"}'
                                                                    />
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <input
                                                            type="hidden"
                                                            name="propJson"
                                                            value='{"datasource_41":{},"cuname_45":"name1712044155340","value_38":"","datasource_40":{},"cuname_42":"name1712044155340","formId_37":"1224750133670240256","value_39":"","notice_37":{"rules":[{"code":"submit","mail":"","phone":"","title":"Sales Contact Us","user":2}],"status":1},"datasource_45":{},"datasource_43":{},"datasource_42":{},"datasource_39":{},"showPlaceholder_38":true,"showPlaceholder_39":true,"submit_37":{"obj2":{"type":"customPage","value":{"type":"link","params":[],"value":"/successfully.html"},"target":"_self"},"obj1":{"result":1,"request":[],"promptTime":0,"prompt":"Подать успешно!"},"logic":[],"type":2,"obj3":{}},"datasource_38":{},"showPlaceholder_41":true,"showPlaceholder_42":true,"validate_45":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"showPlaceholder_40":true,"validate_43":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","state":true,"value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_42":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"showPlaceholder_45":true,"validate_41":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_40":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"showPlaceholder_43":true,"state_38":"normal","customParam_40":"","state_39":"normal","validate_39":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":false},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_38":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":false},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"prompt_44":"","customParam_39":"","customParam_38":"","business_44":[],"enterSubmit_45":false,"async_37":{"status":1,"target":"clue","relation":[{"from":"e_input-2","to":"contactName"},{"from":"e_input-4","to":"email"},{"from":"e_input-3","to":"phone"}]},"state_40":"normal","enterSubmit_42":false,"enterSubmit_41":false,"state_41":"normal","enterSubmit_43":false,"ddItem_38":{},"state_45":"normal","ddItem_39":{},"enterSubmit_40":false,"state_42":"normal","state_43":"normal","enterSubmit_39":false,"type_45":"text","enterSubmit_38":false,"ddItem_45":{},"type_44":1,"ddItem_40":{},"type_41":"email","ddItem_41":{},"type_42":"text","ddItem_42":{},"type_40":"text","ddItem_43":{},"initType_39":1,"initType_38":1,"label_41":"Электронная почта:","label_42":"Страна/Регион:","label_43":"Описание:","label_45":"Телефон:","label_40":"Имя:","initType_43":1,"initType_45":1,"initType_40":1,"initType_42":1,"initType_41":1,"label_38":"Адрес источника","label_39":"Страница источника","type_38":"text","type_39":"text","placeholder_39":"","placeholder_38":"","sourceUuid_37":"1775070607344533504","showLabel_40":true,"showLabel_41":true,"basic_37":{"submitLimit":{"unit":1,"count":1,"interval":1,"peopleLimit":1,"limitRule":1},"submitTime":{"limit":2,"startTime":"","endTime":"","prompt":""},"formInfo":{"app":"120113","name":"Sales","title":"Sales Contact Us"},"advanced":{"customState":[],"message":1}},"showLabel_42":true,"showLabel_43":true,"customParam_45":"","showLabel_45":true,"customParam_42":"","customParam_41":"","placeholder_43":"Пожалуйста опишите ваши требования","rule_37":[],"placeholder_42":"","placeholder_41":"","placeholder_40":"","placeholder_45":"","showLabel_38":true,"showLabel_39":true,"cuname_38":"text","cuname_39":"text","value_40":"","action_44":1,"value_41":"","cuname_41":"email1712044176522","cuname_40":"name1712044155340","value_45":"","value_42":"","value_43":""}'
                                                        />
                                                    </div>
                                                </div>
                                                <div
                                                    class="p_content content-box"
                                                    id="content_box-1712043553063-2"
                                                >
                                                    <div
                                                        id="c_form_064-17120447381530"
                                                    >
                                                        <div
                                                            class="e_container-14 s_layout mw"
                                                        >
                                                            <div
                                                                class="cbox-14-0 p_item"
                                                            >
                                                                <form
                                                                    class="e_form-37 s_layout messforma"
                                                                    needjs="true"
                                                                >
                                                                    <div
                                                                        class="cbox-37"
                                                                    >
                                                                        <div
                                                                            class="e_input-38 s_form1 form-group"
                                                                            needjs="true"
                                                                            data-pagelink=""
                                                                            hidden
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Адрес
                                                                                    источника</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="text"
                                                                                        data-name="e_input-38"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_input-39 s_form1 form-group"
                                                                            needjs="true"
                                                                            data-pagename=""
                                                                            hidden
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Страница
                                                                                    источника</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="text"
                                                                                        data-name="e_input-39"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-40 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Имя:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-40"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-42 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Страна/Регион:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-42"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueName-45 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Телефон:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="name1712044155340"
                                                                                        data-name="e_clueName-45"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_clueEmail-41 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Электронная
                                                                                    почта:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <div
                                                                                    class="input-group"
                                                                                >
                                                                                    <input
                                                                                        type="text"
                                                                                        class="form-control s_form-control s_input p_input"
                                                                                        name="email1712044176522"
                                                                                        data-name="e_clueEmail-41"
                                                                                        placeholder=""
                                                                                    />
                                                                                    <div
                                                                                        class="invalid-feedback"
                                                                                    ></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="e_textarea-43 s_form1 form-group"
                                                                            needjs="true"
                                                                            required
                                                                        >
                                                                            <label
                                                                                class="p_label"
                                                                            >
                                                                                <span
                                                                                    class="s_label"
                                                                                    >Описание:</span
                                                                                >
                                                                            </label>
                                                                            <div
                                                                                class=""
                                                                            >
                                                                                <textarea
                                                                                    class="form-control s_form-control s_input p_input"
                                                                                    rows="3"
                                                                                    name="e_textarea-43"
                                                                                    placeholder="Пожалуйста опишите ваши требования"
                                                                                ></textarea>
                                                                                <div
                                                                                    class="invalid-feedback"
                                                                                ></div>
                                                                            </div>
                                                                        </div>
                                                                        <a
                                                                            class="e_formBtn-44 s_button1 btn btn-primary"
                                                                            href="javascript:;"
                                                                            needjs="true"
                                                                        >
                                                                            <span
                                                                                >ПОДСТАВИТЬ</span
                                                                            >
                                                                        </a>
                                                                    </div>
                                                                    <input
                                                                        name="jumpPage"
                                                                        type="hidden"
                                                                        value="/successfully.html"
                                                                    />
                                                                    <input
                                                                        name="i18nJson"
                                                                        type="hidden"
                                                                        value='{"required_38":"Пожалуйста, введите содержание","required_39":"Пожалуйста, введите содержание","minLength_45":"Вводимое содержание не может быть меньше %len символов","required_45":"Пожалуйста, введите содержание","minLength_38":"Вводимое содержание не может быть меньше %len символов","minLength_39":"Вводимое содержание не может быть меньше %len символов","minLength_40":"Вводимое содержание не может быть меньше %len символов","minLength_43":"Вводимое содержание не может быть меньше %len символов","minLength_41":"Вводимое содержание не может быть меньше %len символов","minLength_42":"Вводимое содержание не может быть меньше %len символов","maxLength_42":"Не допускается вводить более %len символов","maxLength_41":"Не допускается вводить более %len символов","maxLength_40":"Не допускается вводить более %len символов","maxLength_45":"Не допускается вводить более %len символов","maxLength_43":"Не допускается вводить более %len символов","maxLength_39":"Не допускается вводить более %len символов","required_40":"Пожалуйста, введите содержание","maxLength_38":"Не допускается вводить более %len символов","required_41":"Пожалуйста, введите содержание","required_42":"Пожалуйста, введите содержание","required_43":"Пожалуйста, введите содержание"}'
                                                                    />
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <input
                                                            type="hidden"
                                                            name="propJson"
                                                            value='{"datasource_41":{},"cuname_45":"name1712044155340","value_38":"","datasource_40":{},"cuname_42":"name1712044155340","formId_37":"1224750216411275264","value_39":"","notice_37":{"rules":[{"code":"reply","mail":"","phone":"","title":"Reseller Contact Us","user":2}],"status":1},"datasource_45":{},"datasource_43":{},"datasource_42":{},"datasource_39":{},"showPlaceholder_38":true,"showPlaceholder_39":true,"submit_37":{"obj2":{"type":"customPage","value":{"type":"link","params":[],"value":"/successfully.html"},"target":"_self"},"obj1":{"result":1,"request":[],"promptTime":0,"prompt":"Подать успешно!"},"logic":[],"type":2,"obj3":{}},"datasource_38":{},"showPlaceholder_41":true,"showPlaceholder_42":true,"validate_45":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"showPlaceholder_40":true,"validate_43":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","state":true,"value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_42":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"showPlaceholder_45":true,"validate_41":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_40":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":true},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"showPlaceholder_43":true,"state_38":"normal","customParam_40":"","state_39":"normal","validate_39":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":false},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"validate_38":{"minLength":{"msg":"您输入的内容不能少于%len个字符","state":false,"value":5},"custom":{"msg":"","reg":"","state":false},"required":{"msg":"内容不能为空","value":false},"maxLength":{"msg":"您输入的内容不能多于%len个字符","state":false,"value":128}},"prompt_44":"","customParam_39":"","customParam_38":"","business_44":[],"enterSubmit_45":false,"async_37":{"status":1,"target":"clue","relation":[{"from":"e_input-2","to":"contactName"},{"from":"e_input-4","to":"email"},{"from":"e_input-3","to":"phone"}]},"state_40":"normal","enterSubmit_42":false,"enterSubmit_41":false,"state_41":"normal","enterSubmit_43":false,"ddItem_38":{},"state_45":"normal","ddItem_39":{},"enterSubmit_40":false,"state_42":"normal","state_43":"normal","enterSubmit_39":false,"type_45":"text","enterSubmit_38":false,"ddItem_45":{},"type_44":1,"ddItem_40":{},"type_41":"email","ddItem_41":{},"type_42":"text","ddItem_42":{},"type_40":"text","ddItem_43":{},"initType_39":1,"initType_38":1,"label_41":"Электронная почта:","label_42":"Страна/Регион:","label_43":"Описание:","label_45":"Телефон:","label_40":"Имя:","initType_43":1,"initType_45":1,"initType_40":1,"initType_42":1,"initType_41":1,"label_38":"Адрес источника","label_39":"Страница источника","type_38":"text","type_39":"text","placeholder_39":"","placeholder_38":"","sourceUuid_37":"1775070690102345728","showLabel_40":true,"showLabel_41":true,"basic_37":{"submitLimit":{"unit":1,"count":1,"interval":1,"peopleLimit":1,"limitRule":1},"submitTime":{"limit":2,"startTime":"","endTime":"","prompt":""},"formInfo":{"app":"120113","name":"Reseller","title":"Reseller Contact Us"},"advanced":{"customState":[],"message":1}},"showLabel_42":true,"showLabel_43":true,"customParam_45":"","showLabel_45":true,"customParam_42":"","customParam_41":"","placeholder_43":"Пожалуйста опишите ваши требования","rule_37":[],"placeholder_42":"","placeholder_41":"","placeholder_40":"","placeholder_45":"","showLabel_38":true,"showLabel_39":true,"cuname_38":"text","cuname_39":"text","value_40":"","action_44":1,"value_41":"","cuname_41":"email1712044176522","cuname_40":"name1712044155340","value_45":"","value_42":"","value_43":""}'
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input
                                            type="hidden"
                                            name="propJson"
                                            value='{"layout":"top","mouseovertoggle":false,"needjs":true,"__instanceId":"1712043553063","tags":[{"showTabIcon":false,"src":"","showTabLink":false,"showTabLabel":true,"active":true,"label":"Отдел поддержки","href":{"type":"none","value":"","target":"_self"},"imgsrc":"","showTabImage":false},{"showTabIcon":false,"src":"","showTabLink":false,"showTabLabel":true,"active":false,"label":" Отдел продаж","href":{"type":"none","value":"","target":"_self"},"imgsrc":"","showTabImage":false},{"showTabIcon":false,"src":"","showTabLink":false,"showTabLabel":true,"active":false,"label":"Проектный отдел","href":{"type":"none","value":"","target":"_self"},"imgsrc":"","showTabImage":false}],"direction":"horizontal"}'
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="c_grid-116273709439190">
                <div class="p_gridbox signal s_tmpl_footer">
                    <div
                        id="content_box-116273709439190-0"
                        class="d_gridCell_0 p_gridCell ND_empty"
                    >
                        <div id="c_effect_109-1669431337050">
                            <div class="e_loop_sub-1 s_list">
                                <div class="zxbox">
                                    <div class="p_backtop"></div>
                                    <div class="cbox-1 p_loopItem">
                                        <p class="e_text-2 s_title zx_haoname">
                                            <a
                                                rel="nofollow"
                                                href="https://www.marsriva.ru/cdn-cgi/l/email-protection#94fdfaf2fbd4f9f5e6e7e6fde2f5baf7fbf9"
                                                target="_blank"
                                            >
                                                <span>E-mail</span>
                                            </a>
                                        </p>
                                        <p class="e_text-6 s_title zx_type">
                                            8
                                        </p>
                                        <div
                                            class="e_container-5 s_layout zx_xjie"
                                        >
                                            <div class="cbox-5-0 p_item">
                                                <div class="e_subImg-4 s_img">
                                                    <img
                                                        src="Contact.html"
                                                        alt="E-mail"
                                                        title="E-mail"
                                                        la="la"
                                                        needthumb="true"
                                                    />
                                                </div>
                                                <p
                                                    class="e_text-7 s_title zx_zh"
                                                >
                                                    <a
                                                        rel="nofollow"
                                                        href="https://www.marsriva.ru/cdn-cgi/l/email-protection#573e393138173a362524253e21367934383a"
                                                        target="_self"
                                                    >
                                                        <span
                                                            class="__cf_email__"
                                                            data-cfemail="3950575f567954584b4a4b504f58175a5654"
                                                            >[email&#160;protected]</span
                                                        >
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-1 p_loopItem">
                                        <p class="e_text-2 s_title zx_haoname">
                                            <a
                                                rel="nofollow"
                                                href="tel:+86-075523350016"
                                                target="_blank"
                                            >
                                                <span>Телефон</span>
                                            </a>
                                        </p>
                                        <p class="e_text-6 s_title zx_type">
                                            9
                                        </p>
                                        <div
                                            class="e_container-5 s_layout zx_xjie"
                                        >
                                            <div class="cbox-5-0 p_item">
                                                <div class="e_subImg-4 s_img">
                                                    <img
                                                        src="Contact.html"
                                                        alt="Телефон"
                                                        title="Телефон"
                                                        la="la"
                                                        needthumb="true"
                                                    />
                                                </div>
                                                <p
                                                    class="e_text-7 s_title zx_zh"
                                                >
                                                    <a
                                                        rel="nofollow"
                                                        href="tel:+86-075523350016"
                                                        target="_self"
                                                    >
                                                        +86-075523350016
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbox-1 p_loopItem">
                                        <p class="e_text-2 s_title zx_haoname">
                                            <a
                                                rel="nofollow"
                                                href="https://api.whatsapp.com/send?phone=+8613908088978&text=Hello"
                                                target="_blank"
                                            >
                                                <span>WhatsApp</span>
                                            </a>
                                        </p>
                                        <p class="e_text-6 s_title zx_type">
                                            5
                                        </p>
                                        <div
                                            class="e_container-5 s_layout zx_xjie"
                                        >
                                            <div class="cbox-5-0 p_item">
                                                <div class="e_subImg-4 s_img">
                                                    <img
                                                        src="Contact.html"
                                                        alt="WhatsApp"
                                                        title="WhatsApp"
                                                        la="la"
                                                        needthumb="true"
                                                    />
                                                </div>
                                                <p
                                                    class="e_text-7 s_title zx_zh"
                                                >
                                                    <a
                                                        rel="nofollow"
                                                        href="https://api.whatsapp.com/send?phone=+8613908088978&text=Hello"
                                                        target="_self"
                                                    >
                                                        +8613908088978
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p_backbottom"></div>
                                </div>
                                <div class="zx_btm_o"></div>
                            </div>
                            <input
                                type="hidden"
                                name="propJson"
                                value='{"href_4":{"type":"none","value":"","target":""},"href_7":{"transport":[],"type":"field","value":"link","target":"_self"},"href_6":{"type":"none","value":"","target":""},"pageConfig_1":{"pcColumn":3,"loopItem":".p_loopItem","pcRow":2,"moColumn":3,"datasourceid":"datasource1","elementid":1},"setting_4":{"fit":"contain","errorUrl":"","needThumb":"true","isLazy":"true"},"href_2":{"transport":[],"type":"field","value":"link","target":"_blank"},"prompt_6":"Тип обслуживания клиентов","prompt_7":"","prompt_2":""}'
                            />
                        </div>
<?= get_footer(); ?>