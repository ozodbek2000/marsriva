		<div id="c_static_001_P_33550-1706856898819">
                            <div class="e_container-36 s_layout">
                                <div class="cbox-36-0 p_item">
                                    <div class="e_container-57 s_layout">
                                        <div class="cbox-57-0 p_item">
                                            <div class="e_image-50 s_img">
                                                <img
                                                    src="<?= bloginfo( "template_url" ); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/dd95ada5-dd1a-4a96-baf6-8ef5dab37a60.png"
                                                    alt="Название изображения"
                                                    title="Название изображения"
                                                    la="la"
                                                    needthumb="true"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="e_container-1 s_layout">
                                        <div class="cbox-1-0 p_item">
                                            <div
                                                class="e_container-35 s_layout"
                                                data-wow-duration="0.8s"
                                            >
                                                <div class="cbox-35-0 p_item">
                                                    <div
                                                        class="e_bottomNav-29 s_title"
                                                        data-wow-duration="0.8s"
                                                        needjs="true"
                                                    >
                                                        <!-- 导航内容 开始 -->
                                                        <ul class="p_level1Box">
                                                            <?php
                                                                /**
                                                                 * Супер оптимизированный вывод - один SQL запрос
                                                                 */

                                                                // Получаем ВСЕ категории одним запросом
                                                                $all_categories = get_terms([
                                                                    'taxonomy'   => 'product_cat',
                                                                    'hide_empty' => false,
                                                                    'orderby' => 'term_id',
                                                                    'order'      => 'ASC',
                                                                    'exclude' => [15]
                                                                ]);

                                                                // Группируем по родителям
                                                                $categories_tree = [];
                                                                foreach ($all_categories as $cat) {
                                                                    if ($cat->parent == 0) {
                                                                        $categories_tree[$cat->term_id] = [
                                                                            'category' => $cat,
                                                                            'children' => []
                                                                        ];
                                                                    }
                                                                }

                                                                // Добавляем детей к родителям
                                                                foreach ($all_categories as $cat) {
                                                                    if ($cat->parent != 0 && isset($categories_tree[$cat->parent])) {
                                                                        $categories_tree[$cat->parent]['children'][] = $cat;
                                                                    }
                                                                }

                                                                if (!empty($categories_tree)) : ?>
                                                                        <?php foreach ($categories_tree as $tree_item) : 
                                                                            $parent_cat = $tree_item['category'];
                                                                            $children = $tree_item['children'];
                                                                        ?>
                                                                            <li class="p_level1Item">
                                                                                <p class="p_menu1Item s_templatetitle js_editor_click">
                                                                                    <a href="<?php echo esc_url(get_term_link($parent_cat)); ?>">
                                                                                        <span><?php echo esc_html($parent_cat->name); ?></span>
                                                                                    </a>
                                                                                    <?php if (!empty($children)) : ?>
                                                                                        <svg t="1625735163067" class="icon p_jtIcon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1486">
                                                                                            <path d="M661.16183428 486.94732961L415.99871022 219.24359155c-13.37500289-14.59708438-35.98351032-15.54759219-50.51270128-2.24048272-14.59708438 13.37500289-15.54759219 35.98351032-2.24048272 50.51270127l223.09776396 243.60157549-222.89408371 244.28050967c-13.30710947 14.59708438-12.28870823 37.20559179 2.30837613 50.51270125 14.59708438 13.30710947 37.20559179 12.28870823 50.51270128-2.30837613l244.75576356-268.11109855c0.47525392-0.54314733 1.01840124-1.15418807 1.42576173-1.6973354 11.13452018-13.51078973 10.93083994-33.53934734-1.2899749-46.84645682z" p-id="1487"></path>
                                                                                        </svg>
                                                                                    <?php endif; ?>
                                                                                </p>
                                                                                
                                                                                <?php if (!empty($children)) : ?>
                                                                                    <ul class="p_level2Box s_templatesum">
                                                                                        <?php foreach ($children as $child_cat) : ?>
                                                                                            <li class="p_level2Item">
                                                                                                <p class="p_menu2Item js_editor_click">
                                                                                                    <a href="<?php echo esc_url(get_term_link($child_cat)); ?>">
                                                                                                        <span><?php echo esc_html($child_cat->name); ?></span>
                                                                                                    </a>
                                                                                                </p>
                                                                                            </li>
                                                                                        <?php endforeach; ?>
                                                                                    </ul>
                                                                                <?php endif; ?>
                                                                            </li>
                                                                        <?php endforeach; ?>
                                                            <?php endif; ?>
                                                            <!-- <li
                                                                class="p_level1Item"
                                                            >
                                                                <p
                                                                    class="p_menu1Item s_templatetitle js_editor_click"
                                                                >
                                                                    <a>
                                                                        <span
                                                                            >Поддержка</span
                                                                        >
                                                                    </a>
                                                                    <svg
                                                                        t="1625735163067"
                                                                        class="icon p_jtIcon"
                                                                        viewBox="0 0 1024 1024"
                                                                        version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        p-id="1486"
                                                                    >
                                                                        <path
                                                                            d="M661.16183428 486.94732961L415.99871022 219.24359155c-13.37500289-14.59708438-35.98351032-15.54759219-50.51270128-2.24048272-14.59708438 13.37500289-15.54759219 35.98351032-2.24048272 50.51270127l223.09776396 243.60157549-222.89408371 244.28050967c-13.30710947 14.59708438-12.28870823 37.20559179 2.30837613 50.51270125 14.59708438 13.30710947 37.20559179 12.28870823 50.51270128-2.30837613l244.75576356-268.11109855c0.47525392-0.54314733 1.01840124-1.15418807 1.42576173-1.6973354 11.13452018-13.51078973 10.93083994-33.53934734-1.2899749-46.84645682z"
                                                                            p-id="1487"
                                                                        ></path>
                                                                    </svg>
                                                                </p>
                                                                <ul
                                                                    class="p_level2Box s_templatesum"
                                                                >
                                                                    <li
                                                                        class="p_level2Item"
                                                                    >
                                                                        <p
                                                                            class="p_menu2Item js_editor_click"
                                                                        >
                                                                            <a
                                                                                href="Solar_Inverter_Selector.html"
                                                                                target=""
                                                                            >
                                                                                <span
                                                                                    >Выбор
                                                                                    продуктов</span
                                                                                >
                                                                            </a>
                                                                        </p>
                                                                    </li>
                                                                    <li
                                                                        class="p_level2Item"
                                                                    >
                                                                        <p
                                                                            class="p_menu2Item js_editor_click"
                                                                        >
                                                                            <a
                                                                                href="Downloads/2356.html"
                                                                                target=""
                                                                            >
                                                                                <span
                                                                                    >Загрузки</span
                                                                                >
                                                                            </a>
                                                                        </p>
                                                                    </li>
                                                                    <li
                                                                        class="p_level2Item"
                                                                    >
                                                                        <p
                                                                            class="p_menu2Item js_editor_click"
                                                                        >
                                                                            <a
                                                                                href="FAQS/2.html"
                                                                                target=""
                                                                            >
                                                                                <span
                                                                                    >FAQs</span
                                                                                >
                                                                            </a>
                                                                        </p>
                                                                    </li>
                                                                    <li
                                                                        class="p_level2Item"
                                                                    >
                                                                        <p
                                                                            class="p_menu2Item js_editor_click"
                                                                        >
                                                                            <a
                                                                                href="news_1/1.html"
                                                                                target=""
                                                                            >
                                                                                <span
                                                                                    >Блог</span
                                                                                >
                                                                            </a>
                                                                        </p>
                                                                    </li>
                                                                </ul>
                                                            </li> -->
                                                            <li
                                                                class="p_level1Item"
                                                            >
                                                                <!-- 名称 -->
                                                                <p
                                                                    class="p_menu1Item s_templatetitle js_editor_click"
                                                                >
                                                                    <a>
                                                                        <span
                                                                            >Компания</span
                                                                        >
                                                                    </a>
                                                                    <svg
                                                                        t="1625735163067"
                                                                        class="icon p_jtIcon"
                                                                        viewBox="0 0 1024 1024"
                                                                        version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        p-id="1486"
                                                                    >
                                                                        <path
                                                                            d="M661.16183428 486.94732961L415.99871022 219.24359155c-13.37500289-14.59708438-35.98351032-15.54759219-50.51270128-2.24048272-14.59708438 13.37500289-15.54759219 35.98351032-2.24048272 50.51270127l223.09776396 243.60157549-222.89408371 244.28050967c-13.30710947 14.59708438-12.28870823 37.20559179 2.30837613 50.51270125 14.59708438 13.30710947 37.20559179 12.28870823 50.51270128-2.30837613l244.75576356-268.11109855c0.47525392-0.54314733 1.01840124-1.15418807 1.42576173-1.6973354 11.13452018-13.51078973 10.93083994-33.53934734-1.2899749-46.84645682z"
                                                                            p-id="1487"
                                                                        ></path>
                                                                    </svg>
                                                                </p>
                                                                <!-- 子集 -->
                                                                <ul
                                                                    class="p_level2Box s_templatesum"
                                                                >
                                                                    <li
                                                                        class="p_level2Item"
                                                                    >
                                                                        <!-- 名称 2 -->
                                                                        <p
                                                                            class="p_menu2Item js_editor_click"
                                                                        >
                                                                            <a
                                                                                href="About.html"
                                                                                target=""
                                                                            >
                                                                                <span
                                                                                    >О
                                                                                    нас</span
                                                                                >
                                                                            </a>
                                                                        </p>
                                                                        <!-- 子集 2 -->
                                                                    </li>
                                                                    <li
                                                                        class="p_level2Item"
                                                                    >
                                                                        <!-- 名称 2 -->
                                                                        <p
                                                                            class="p_menu2Item js_editor_click"
                                                                        >
                                                                            <a
                                                                                href="<?= get_permalink( 93 ); ?>"
                                                                                target=""
                                                                            >
                                                                                <span
                                                                                    >Контакты</span
                                                                                >
                                                                            </a>
                                                                        </p>
                                                                        <!-- 子集 2 -->
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                        <!-- 导航内容 结束 -->
                                                    </div>

                                                    <div
                                                        class="e_credible-33 s_list"
                                                        needjs="true"
                                                    ></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cbox-1-1 p_item">
                                            <div
                                                class="e_container-38 s_layout"
                                            >
                                                <div class="cbox-38-0 p_item">
                                                    <p
                                                        class="e_text-40 s_title"
                                                    >
                                                        Cледитe за нами
                                                    </p>
                                                    <div
                                                        class="e_loop-56 s_list"
                                                        needjs="true"
                                                        ds-id=""
                                                        elem-id="e_loop-56"
                                                    >
                                                        <div class="">
                                                            <div class="p_list">
                                                                <div
                                                                    class="cbox-56 p_loopitem"
                                                                >
                                                                    <div
                                                                        class="e_image-39 s_img"
                                                                    >
                                                                        <a
                                                                            href="https://dzen.ru/marsriva"
                                                                            target="_blank"
                                                                        >
                                                                            <img
                                                                                src="<?= bloginfo( "template_url" ); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/d5d1c493-a372-4283-a9d9-193eee341c6e.webp"
                                                                                alt="д3еH"
                                                                                title="д3еH"
                                                                                la="la"
                                                                                needthumb="true"
                                                                            />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="cbox-56 p_loopitem"
                                                                >
                                                                    <div
                                                                        class="e_image-39 s_img"
                                                                    >
                                                                        <a
                                                                            href="https://t.me/marsrivaru"
                                                                            target="_blank"
                                                                        >
                                                                            <img
                                                                                src="<?= bloginfo( "template_url" ); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/d8d12b98-d2da-4f7c-a0c4-169625de2879.webp"
                                                                                alt="Telegram"
                                                                                title="Telegram"
                                                                                la="la"
                                                                                needthumb="true"
                                                                            />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="cbox-56 p_loopitem"
                                                                >
                                                                    <div
                                                                        class="e_image-39 s_img"
                                                                    >
                                                                        <a
                                                                            href="https://vk.com/marsriva_cis"
                                                                            target="_blank"
                                                                        >
                                                                            <img
                                                                                src="<?= bloginfo( "template_url" ); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/6eaeef20-4843-43a6-8fea-8fff98e20f72.webp"
                                                                                alt="vk"
                                                                                title="vk"
                                                                                la="la"
                                                                                needthumb="true"
                                                                            />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="cbox-56 p_loopitem"
                                                                >
                                                                    <div
                                                                        class="e_image-39 s_img"
                                                                    >
                                                                        <a
                                                                            href="https://vkvideo.ru/@marsriva_cis"
                                                                            target="_blank"
                                                                        >
                                                                            <img
                                                                                src="<?= bloginfo( "template_url" ); ?>/omo-oss-image.thefastimg.com/portal-saas/pg2025012411115407946/cms/image/908e2e27-903f-4e54-8213-22e89620a593.webp"
                                                                                alt="vkvi ridec"
                                                                                title="vkvi ridec"
                                                                                la="la"
                                                                                needthumb="true"
                                                                            />
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input
                                                            type="hidden"
                                                            name="_config"
                                                            value=""
                                                        />
                                                        <input
                                                            type="hidden"
                                                            name="view"
                                                            value="Home"
                                                        />
                                                        <input
                                                            type="hidden"
                                                            name="pageParamsJson"
                                                            value=""
                                                        />
                                                        <input
                                                            type="hidden"
                                                            name="i18nJson"
                                                            value='{"pageItem_56":"шт.","noMore_56":"Нет больше информации","loadNow_56":"Загрузка...","pageUnit_56":"стр.","pageJump_56":"Перейти на","totalAcount_56":"Всего Х","noData_29":"Нет данных","loadMore_56":"Нажмите «загрузить еще»","conditions_56":"условие:","confirm_56":"Подтвердить","clearConditions_56":"чистое состояние","pageWhole_56":"всего","noData_56":"Нет данных"}'
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="e_line-58 s_line" />
                                </div>
                            </div>
                            <div class="e_container-22 s_layout">
                                <div class="cbox-22-0 p_item">
                                    <div class="e_container-23 s_layout">
                                        <div class="cbox-23-0 p_item">
                                            <div
                                                class="e_container-30 s_layout"
                                            >
                                                <div class="cbox-30-0 p_item">
                                                    <p
                                                        class="e_text-27 s_templatesum"
                                                    >
                                                        Copyright @ 2026
                                                        Marsriva Technology Co.,
                                                        Ltd. Все права защищены.
                                                    </p>
                                                    <div
                                                        class="e_provider-26 s_templatesum"
                                                        needjs="true"
                                                    >
                                                        <a
                                                            href="https://beian.miit.gov.cn"
                                                            target="_blank"
                                                        >
                                                        </a>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cbox-23-1 p_item">
                                            <div
                                                class="e_container-24 s_layout"
                                            >
                                                <div class="cbox-24-0 p_item">
                                                    <div
                                                        class="e_richText-34 s_title clearfix"
                                                    >
                                                        <p
                                                            style="
                                                                font-size: 14px;
                                                                line-height: 24px;
                                                            "
                                                        >
                                                            <span
                                                                style="
                                                                    color: #969b9f;
                                                                "
                                                                >
                                                                <a
                                                                    href="https://inweb.uz"
                                                                    target="_blank"
                                                                    >Powered
                                                                    by: inweb</a
                                                                ></span
                                                            >
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input
                                type="hidden"
                                name="propJson"
                                value='{"imgList2_39":[],"showMark_26":true,"href_27":{"type":"none","value":"","target":""},"dense_40":"","size_33":2,"setting_50":{"fit":"contain","errorUrl":"","needThumb":"true","isLazy":"false"},"imgList1_39":[],"href_39":{"type":"","value":"","target":""},"showArrow_29":true,"space_39":0,"ct_33":"df","page_56":{"size":6,"from":0,"totalCount":100},"imgList2_50":[],"prompt_40":"","href_40":{"type":"none","value":"","target":""},"href_50":{"type":"","value":"","target":""},"imgList1_50":[],"pageConfig_56":{"showJump":true,"marquee":{"navigation":true,"marqueeTime":4,"scrollType":"horizontal","opp":false},"filterPosition":"","moColumn":3,"rolling":{"navigation":true,"pageStyle":1,"scrollType":"horizontal","pagenation":true,"scrollTime":4,"autoScroll":true,"speed":600},"pageType":"hidden","singleTotal":0,"showButtom":false,"showTotal":false,"pcColumn":3,"loopItem":".p_loopitem","status":true,"pcRow":2,"datasourceid":"prop","elementid":56},"setting_39":{"fit":"contain","errorUrl":"","needThumb":"true","isLazy":"false"},"space_50":0}'
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div id="c_static_001_P_23798-1706842472051">
                <div class="e_container-1 s_layout saf-plug">
                    <div class="cbox-1-0 p_item">
                        <h3
                            class="e_h3-2 s_summary"
                            data-regCode="HRASE-ZNNT-DASDE-ZES"
                        >
                            <text>SAF Coolest v1.3.1.2 设置面板</text
                            ><span>HRASE-ZNNT-DASDE-ZES</span>
                        </h3>
                        <div class="e_container-32 s_layout">
                            <div class="cbox-32-0 p_item">
                                <div class="e_container-41 s_layout">
                                    <div class="cbox-41-0 p_item">
                                        <div
                                            class="e_richText-40 s_title clearfix saf-setItem"
                                        >
                                            <h3 saf-svg="nodata">无数据提示</h3>
                                            <div saf-set-nodata>
                                                <p style="text-align: center">
                                                    <span style="line-height: 2"
                                                        ><span
                                                            style="
                                                                font-size: 18px;
                                                            "
                                                            ><strong
                                                                >Извините,
                                                                текущий раздел
                                                                обновляется,
                                                                следите за
                                                                обновлениями!</strong
                                                            ></span
                                                        ></span
                                                    >
                                                </p>

                                                <p style="text-align: center">
                                                    <span style="line-height: 2"
                                                        >Вы можете просмотреть
                                                        другие разделы или
                                                        вернуться<a
                                                            href="index.html"
                                                            ><span
                                                                style="
                                                                    color: #ff0000;
                                                                "
                                                                >Главная</span
                                                            ></a
                                                        ></span
                                                    >
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="saf-svgs hide">
                            <div class="phone">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100"
                                    height="113.158"
                                    viewBox="0 0 100 113.158"
                                >
                                    <path
                                        id="phone"
                                        d="M26.316,113.158A26.315,26.315,0,0,1,0,86.842V26.316A26.315,26.315,0,0,1,26.316,0H73.684A26.315,26.315,0,0,1,100,26.316V86.842a26.315,26.315,0,0,1-26.316,26.316ZM9.221,25.7l-.011.613V86.842A17.105,17.105,0,0,0,25.7,103.937l.613.01H73.684A17.105,17.105,0,0,0,90.779,87.455l.011-.613V26.316A17.105,17.105,0,0,0,74.3,9.221l-.613-.011H26.316A17.105,17.105,0,0,0,9.221,25.7ZM36.842,91.447a4.605,4.605,0,0,1-.379-9.195l.379-.016H63.158a4.605,4.605,0,0,1,.379,9.195l-.379.016Z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="links">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100"
                                    height="99.989"
                                    viewBox="0 0 100 99.989"
                                >
                                    <path
                                        id="links"
                                        d="M127.992,99.61a27.341,27.341,0,0,0-24.62,15.511,8.75,8.75,0,0,0,6.425,2.66,9.568,9.568,0,0,0,2.66-.395,18.533,18.533,0,0,1,6.042-6.042,17.928,17.928,0,0,1,9.48-2.66,18.156,18.156,0,0,1,6.888,1.353,17.914,17.914,0,0,1,5.963,3.979l13.64,13.64a17.914,17.914,0,0,1,3.979,5.963,18.211,18.211,0,0,1,0,13.775,17.634,17.634,0,0,1-3.979,5.963,17.857,17.857,0,0,1-5.963,3.979,18.24,18.24,0,0,1-13.786,0,17.913,17.913,0,0,1-5.963-3.979l-9.548-9.548a35.762,35.762,0,0,1-9.413,1.24q-.778,0-2.2-.068c.361.395.721.789,1.093,1.172l13.64,13.64a26.747,26.747,0,0,0,8.939,5.963,27.333,27.333,0,0,0,20.7-.011,27.4,27.4,0,0,0,14.9-14.88,27.4,27.4,0,0,0,0-20.7,26.815,26.815,0,0,0-5.963-8.928l-13.64-13.64c-.259-.259-.654-.62-1.172-1.1a26.9,26.9,0,0,0-8.488-5.129,27.64,27.64,0,0,0-9.616-1.759ZM96.169,67.8A27.344,27.344,0,0,0,85.82,69.828a27.464,27.464,0,0,0-14.9,14.891,27.4,27.4,0,0,0,.023,20.7,26.84,26.84,0,0,0,5.952,8.928l13.64,13.64c.259.271.654.631,1.172,1.1a26.651,26.651,0,0,0,8.488,5.129,27.259,27.259,0,0,0,9.627,1.759,27.341,27.341,0,0,0,24.62-15.511,8.714,8.714,0,0,0-6.425-2.66,9.508,9.508,0,0,0-2.66.395,18.5,18.5,0,0,1-6.031,6.042,17.956,17.956,0,0,1-9.48,2.66,18.156,18.156,0,0,1-6.888-1.353,17.8,17.8,0,0,1-5.963-3.979l-13.64-13.64a17.745,17.745,0,0,1-3.979-5.963,18.211,18.211,0,0,1,0-13.775,18.317,18.317,0,0,1,9.942-9.942,18.211,18.211,0,0,1,13.775,0,17.8,17.8,0,0,1,5.963,3.979l9.559,9.548a35.762,35.762,0,0,1,9.413-1.24q.778,0,2.2.068c-.361-.395-.721-.789-1.1-1.172l-13.64-13.64a26.84,26.84,0,0,0-8.928-5.952A27.176,27.176,0,0,0,96.169,67.8Zm0,0"
                                        transform="translate(-68.9 -67.799)"
                                    ></path>
                                </svg>
                            </div>
                            <div class="words">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100"
                                    height="117.177"
                                    viewBox="0 0 100 117.177"
                                >
                                    <path
                                        id="word"
                                        d="M24.874,117.177A24.9,24.9,0,0,1,0,92.3V38.415a24.9,24.9,0,0,1,20.688-24.5A17.783,17.783,0,0,1,38.019,0H61.98A17.781,17.781,0,0,1,79.307,13.918,24.9,24.9,0,0,1,100,38.415V92.3a24.905,24.905,0,0,1-24.878,24.874ZM8.1,38.415V92.3A16.793,16.793,0,0,0,24.874,109.08H75.122A16.8,16.8,0,0,0,91.9,92.3h0V38.415A16.8,16.8,0,0,0,79.668,22.279,17.772,17.772,0,0,1,61.979,38.652H38.019A17.774,17.774,0,0,1,20.328,22.279,16.8,16.8,0,0,0,8.1,38.415Zm29.921-7.861h23.96a9.644,9.644,0,0,0,9.585-8.917H28.432A9.644,9.644,0,0,0,38.019,30.553ZM29.371,13.537H70.625A9.645,9.645,0,0,0,61.979,8.1H38.019A9.644,9.644,0,0,0,29.371,13.537ZM57.025,91.089,51.873,69.8C51.2,66.778,50.62,63.917,50.1,61h-.26c-.523,2.919-1.148,5.78-1.771,8.8l-5.05,21.291H35.734L27.875,52.774H34.12l3.591,19.938L39.742,85h.206c.835-4.109,1.719-8.224,2.6-12.285L47.5,52.774h5.31l5,19.938c.883,4.009,1.719,8.124,2.6,12.285h.26c.624-4.163,1.3-8.277,1.925-12.285l3.645-19.938h5.78L64.471,91.089Z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="pic">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100"
                                    height="87.5"
                                    viewBox="0 0 100 87.5"
                                >
                                    <path
                                        id="pic"
                                        d="M185.333,187.329v25.088a13.75,13.75,0,0,1-13.75,13.75h-72.5a13.75,13.75,0,0,1-13.75-13.75v-60a13.75,13.75,0,0,1,13.75-13.75h72.5a13.75,13.75,0,0,1,13.75,13.75v34.913Zm-7.5-8.745V152.417a6.25,6.25,0,0,0-6.25-6.25h-72.5a6.25,6.25,0,0,0-6.25,6.25v40.369a34,34,0,0,1,5-.369,33.619,33.619,0,0,1,21.48,7.716,41.758,41.758,0,0,1,58.52-21.549Zm0,9.637a14.132,14.132,0,0,0-5.115-3.857,34.352,34.352,0,0,0-46.576,18.915q-.48,1.309-1.64,4.521a3.75,3.75,0,0,1-6.02,1.53c-1.926-1.715-3.346-2.937-4.235-3.65a26.12,26.12,0,0,0-16.414-5.764,26.388,26.388,0,0,0-5,.475v12.025a6.25,6.25,0,0,0,6.25,6.25h72.5a6.25,6.25,0,0,0,6.25-6.25v-24.2Zm-65-9.555a11.25,11.25,0,1,1,11.25-11.25A11.25,11.25,0,0,1,112.833,178.667Zm0-7.5a3.75,3.75,0,1,0-3.75-3.75A3.75,3.75,0,0,0,112.833,171.167Z"
                                        transform="translate(-85.333 -138.667)"
                                    ></path>
                                </svg>
                            </div>
                            <div class="slider">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100"
                                    height="91.223"
                                    viewBox="0 0 100 91.223"
                                >
                                    <path
                                        id="slider"
                                        d="M246.848,168.96h-86a6.986,6.986,0,0,0-6.991,6.991v66.232a5.446,5.446,0,0,0,5.445,5.445h89.11a5.446,5.446,0,0,0,5.445-5.445V175.951A7,7,0,0,0,246.848,168.96Zm-18.275,6.785h8.485v8.485h-8.485Zm-14.96,0H222.1v8.485h-8.485Zm-14.96,0h8.485v8.485h-8.485Zm45.517,66.4H162.444v-50.4h81.724Zm-8.348,18.035H171.874a3.246,3.246,0,1,1,0-6.493h63.947a3.246,3.246,0,1,1,0,6.493Z"
                                        transform="translate(-153.856 -168.96)"
                                    ></path>
                                </svg>
                            </div>
                            <div class="nodata">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="100"
                                    height="65.364"
                                    viewBox="0 0 100 65.364"
                                >
                                    <path
                                        id="nodata"
                                        d="M10,44.667h1.347a.667.667,0,0,1,.653.667.656.656,0,0,1-.653.667H10v1.347A.667.667,0,0,1,9.333,48a.656.656,0,0,1-.667-.653V46H7.32a.667.667,0,0,1-.653-.667.656.656,0,0,1,.653-.667H8.667V43.32a.667.667,0,0,1,.667-.653A.656.656,0,0,1,10,43.32Zm88-5.333V37.987a.656.656,0,0,0-.667-.653.667.667,0,0,0-.667.653v1.347H95.32a.656.656,0,0,0-.653.667.668.668,0,0,0,.653.667h1.347v1.347a.656.656,0,0,0,.667.653A.667.667,0,0,0,98,42.013V40.667h1.347A.656.656,0,0,0,100,40a.667.667,0,0,0-.653-.667Zm-48.437,22H16a1.333,1.333,0,0,1,0-2.667h6.047a5.3,5.3,0,0,1-.709-2.66V17.327A5.329,5.329,0,0,1,26.672,12h3.995V10.66a5.329,5.329,0,0,1,5.339-5.327H67.995a5.327,5.327,0,0,1,5.339,5.327V49.34A5.3,5.3,0,0,1,72.623,52H80a1.333,1.333,0,1,1,0,2.667H64v1.34a5.3,5.3,0,0,1-.711,2.66H64a1.333,1.333,0,0,1,0,2.667H56.989a2.667,2.667,0,0,1-4.18,3.247Zm4.875-2.667h4.24a2.658,2.658,0,0,0,2.656-2.673V17.264a2.582,2.582,0,0,0-2.573-2.6H26.573A2.585,2.585,0,0,0,24,17.264V55.993a2.672,2.672,0,0,0,2.655,2.673h20.24l-.685-.687a2.661,2.661,0,0,1-.693-2.577l-1.259-1.26a9.349,9.349,0,1,1,1.885-1.885l1.26,1.26a2.657,2.657,0,0,1,2.577.692ZM64,52h4.012a2.668,2.668,0,0,0,2.655-2.667V10.667A2.658,2.658,0,0,0,68.012,8H35.987a2.668,2.668,0,0,0-2.653,2.667V12H58.661A5.327,5.327,0,0,1,64,17.327ZM17,3h1.987a1,1,0,1,1,0,2H17V6.987a1,1,0,1,1-2,0V5H13.013a1,1,0,1,1,0-2H15V1.013a1,1,0,1,1,2,0V3ZM1.333,60a1.337,1.337,0,0,1,1.329-1.333h8.008a1.333,1.333,0,0,1,0,2.667H2.663A1.328,1.328,0,0,1,1.333,60Zm42.048-8.619a6.668,6.668,0,1,0-9.429,0,6.668,6.668,0,0,0,9.429,0ZM29.333,20a1.333,1.333,0,0,1,1.332-1.333H45.333a1.333,1.333,0,0,1,0,2.667H30.667A1.329,1.329,0,0,1,29.333,20Zm0,6.667a1.329,1.329,0,0,1,1.324-1.333H52.009a1.333,1.333,0,0,1,0,2.667H30.657a1.325,1.325,0,0,1-1.324-1.333Zm0,6.667A1.332,1.332,0,0,1,30.664,32H40a1.333,1.333,0,0,1,0,2.667H30.664a1.328,1.328,0,0,1-1.331-1.333ZM4,25.333a4,4,0,1,1,4-4,4,4,0,0,1-4,4Zm0-2a2,2,0,1,0-2-2,2,2,0,0,0,2,2Zm82.667-6a4,4,0,1,1,4-4,4,4,0,0,1-4,4Zm0-2a2,2,0,1,0-2-2A2,2,0,0,0,86.667,15.333Z"
                                    ></path>
                                </svg>
                            </div>
                            <div class="shield-mo">
                                <svg
                                    t="1631117672294"
                                    viewBox="0 0 1024 1024"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    p-id="4853"
                                    width="200"
                                    height="200"
                                >
                                    <path
                                        d="M512 1024C229.248 1024 0 794.752 0 512S229.248 0 512 0s512 229.248 512 512-229.248 512-512 512z m0-85.333333c235.648 0 426.666667-191.018667 426.666667-426.666667S747.648 85.333333 512 85.333333 85.333333 276.352 85.333333 512s191.018667 426.666667 426.666667 426.666667z m-42.666667-469.333334a42.666667 42.666667 0 0 1 85.333334 0v298.666667a42.666667 42.666667 0 0 1-85.333334 0v-298.666667z m38.4-136.533333a59.733333 59.733333 0 1 1 0-119.466667 59.733333 59.733333 0 0 1 0 119.466667z"
                                        p-id="4854"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <div class="e_html-31 s_list">
                            <h3>
                                V1.3.1 SVG图标库<span
                                    >请自行添加图标，用div包起来，并命名使用</span
                                >
                            </h3>
                            <div class="saf-svgs">
                                <div class="search">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="100"
                                        height="96.983"
                                        viewBox="0 0 100 96.983"
                                    >
                                        <path
                                            id="search"
                                            d="M93.962,95.944,77.127,79.11a45.789,45.789,0,1,1,4.77-5.235L98.965,90.942a3.537,3.537,0,1,1-5,5ZM7.079,45.825a38.7,38.7,0,1,0,38.7-38.7A38.7,38.7,0,0,0,7.079,45.825Z"
                                        />
                                    </svg>
                                </div>
                                <div class="downicon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="384"
                                        height="810.667"
                                        viewBox="0 0 384 810.667"
                                    >
                                        <path
                                            id="down-arrow"
                                            d="M507.733,853.333V128H550.4V861.867L695.467,716.8l29.867,29.867-192,192-192-192L371.2,716.8Z"
                                            transform="translate(-341.333 -128)"
                                        />
                                    </svg>
                                </div>
                                <div class="tel">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="100"
                                        height="100"
                                        viewBox="0 0 100 100"
                                    >
                                        <path
                                            id="tel"
                                            d="M160.189,146.376a6.274,6.274,0,0,0-8.862,0l-4.431,4.431c-2.507,2.507-10.623.012-17.724-7.09s-9.6-15.214-7.09-17.724l.005-.005,4.426-4.426a6.274,6.274,0,0,0,0-8.862l-19.5-19.5a6.273,6.273,0,0,0-8.861,0l-4.431,4.431a21.371,21.371,0,0,0-5.929,12.8,39.805,39.805,0,0,0,1.678,16.136c3.461,11.781,11.268,24.166,21.974,34.87s23.09,18.513,34.867,21.974a43.582,43.582,0,0,0,12.237,1.917,31.058,31.058,0,0,0,3.9-.24,21.371,21.371,0,0,0,12.8-5.929l4.431-4.431a6.273,6.273,0,0,0,0-8.861ZM176.14,171.19l-4.43,4.431c-5,5-13.519,6.063-23.98,2.986-10.986-3.231-22.612-10.586-32.736-20.71s-17.479-21.75-20.71-32.736c-3.077-10.461-2.016-18.978,2.986-23.98l4.431-4.43a1.253,1.253,0,0,1,1.773,0l19.5,19.5a1.253,1.253,0,0,1,0,1.773l-4.431,4.43c-2.6,2.6-3.122,6.767-1.466,11.731a38.169,38.169,0,0,0,21.636,21.636,16.936,16.936,0,0,0,5.318.949,8.771,8.771,0,0,0,6.414-2.415l4.43-4.431a1.253,1.253,0,0,1,1.773,0l19.5,19.5a1.253,1.253,0,0,1,0,1.774Zm-31.195-68.311a2.507,2.507,0,0,1,2.507-2.507,25.065,25.065,0,0,1,25.065,25.065,2.507,2.507,0,1,1-5.013,0,20.075,20.075,0,0,0-20.052-20.052,2.507,2.507,0,0,1-2.507-2.507Zm0,15.039a2.507,2.507,0,0,1,2.507-2.507,10.037,10.037,0,0,1,10.026,10.026,2.507,2.507,0,1,1-5.013,0,5.019,5.019,0,0,0-5.013-5.013,2.507,2.507,0,0,1-2.507-2.507Zm42.611,7.52a2.507,2.507,0,1,1-5.013,0,35.134,35.134,0,0,0-35.091-35.091,2.507,2.507,0,1,1,0-5.013,40.074,40.074,0,0,1,40.1,40.1Z"
                                            transform="translate(-87.557 -85.333)"
                                        />
                                    </svg>
                                </div>
                                <div class="tel01">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="100"
                                        height="100.001"
                                        viewBox="0 0 100 100.001"
                                    >
                                        <path
                                            id="tel-1"
                                            d="M179.688,165.873a6.273,6.273,0,0,1,0,8.861l-4.431,4.431a21.371,21.371,0,0,1-12.8,5.929,31.058,31.058,0,0,1-3.9.24,43.582,43.582,0,0,1-12.237-1.918c-11.777-3.461-24.163-11.268-34.867-21.974s-18.513-23.089-21.975-34.867A39.857,39.857,0,0,1,87.8,110.439a21.371,21.371,0,0,1,5.929-12.8l4.431-4.431a6.273,6.273,0,0,1,8.861,0l19.5,19.5a6.274,6.274,0,0,1,0,8.862l-4.431,4.428c-2.507,2.507-.012,10.623,7.09,17.724s15.214,9.6,17.724,7.09l4.431-4.431a6.274,6.274,0,0,1,8.862,0Zm-32.233-45.448a5.019,5.019,0,0,1,5.013,5.013,2.507,2.507,0,0,0,5.013,0,10.037,10.037,0,0,0-10.026-10.026,2.507,2.507,0,0,0,0,5.013Zm36.952-10.6a40.074,40.074,0,0,0-36.952-24.494,2.507,2.507,0,0,0,0,5.013,35.134,35.134,0,0,1,35.092,35.092,2.507,2.507,0,1,0,5.013,0,39.848,39.848,0,0,0-3.153-15.611Zm-36.952-4.441a20.075,20.075,0,0,1,20.052,20.052,2.507,2.507,0,1,0,5.013,0,25.065,25.065,0,0,0-25.065-25.065,2.507,2.507,0,0,0,0,5.013Z"
                                            transform="translate(-87.56 -85.333)"
                                        />
                                    </svg>
                                </div>
                                <div class="email">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="100"
                                        height="78.564"
                                        viewBox="0 0 100 78.564"
                                    >
                                        <path
                                            id="e-mail"
                                            d="M73.1,171.8h80a9.952,9.952,0,0,1,10,9.7l-49.983,27.437-49.971-27.4A9.9,9.9,0,0,1,73.1,171.8Zm-9.955,20.234L63.1,240.548a9.937,9.937,0,0,0,10,9.816h80a9.937,9.937,0,0,0,10-9.816V192.01l-48.8,26.153a2.511,2.511,0,0,1-2.393,0l-48.757-26.13Z"
                                            transform="translate(-63.1 -171.8)"
                                        />
                                    </svg>
                                </div>
                                <div class="wechat">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="100"
                                        height="80.605"
                                        viewBox="0 0 100 80.605"
                                    >
                                        <path
                                            id="WeChat"
                                            d="M142.705,180.648a31.49,31.49,0,0,1,3.409.206c-3.061-14.109-18.308-24.594-35.709-24.594-19.456,0-35.394,13.124-35.394,29.787,0,9.617,5.3,17.515,14.163,23.642l-3.539,10.538,12.372-6.141c4.43.866,7.98,1.759,12.4,1.759,1.11,0,2.209-.054,3.3-.141a25.8,25.8,0,0,1-1.094-7.337C112.615,193.066,125.893,180.648,142.705,180.648Zm-19.027-9.5a4.378,4.378,0,1,1,0,8.756c-2.655,0-5.315-1.759-5.315-4.384S121.024,171.151,123.678,171.151Zm-24.771,8.756c-2.655,0-5.331-1.759-5.331-4.384s2.676-4.373,5.331-4.373a4.378,4.378,0,1,1,0,8.756Zm76.1,28.039c0-14-14.16-25.417-30.064-25.417-16.84,0-30.1,11.414-30.1,25.417,0,14.023,13.262,25.413,30.1,25.413a44.794,44.794,0,0,0,10.618-1.753l9.709,5.26-2.663-8.751C169.718,222.838,175.011,215.844,175.011,207.946Zm-39.824-4.384a3.5,3.5,0,1,1,0-7.006c2.676,0,4.43,1.756,4.43,3.5C139.616,201.827,137.863,203.562,135.187,203.562Zm19.467,0a3.5,3.5,0,1,1,0-7.006c2.655,0,4.43,1.756,4.43,3.5C159.083,201.827,157.308,203.562,154.654,203.562Z"
                                            transform="translate(-75.011 -156.26)"
                                        />
                                    </svg>
                                </div>
                                <div class="qcode">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="100"
                                        height="100"
                                        viewBox="0 0 100 100"
                                    >
                                        <path
                                            id="qcode"
                                            d="M282.564,282.564h15.385V267.179h15.385v23.077H297.949v7.692H282.564v-7.692H267.179V267.179h15.385Zm-69.231-15.385h46.154v46.154H213.333V267.179Zm15.385,15.385v15.385H244.1V282.564Zm-15.385-69.231h46.154v46.154H213.333Zm15.385,15.385V244.1H244.1V228.718Zm38.462-15.385h46.154v46.154H267.179Zm15.385,15.385V244.1h15.385V228.718Zm15.385,69.231h15.385v15.385H297.949Zm-30.769,0h15.385v15.385H267.179Z"
                                            transform="translate(-213.333 -213.333)"
                                        />
                                    </svg>
                                </div>
                                <div class="prev">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="47.062"
                                        height="100"
                                        viewBox="0 0 47.062 100"
                                    >
                                        <path
                                            id="prev"
                                            d="M249.333,341.48l-44.3,44.538a7.842,7.842,0,0,1-11.247,0l-44.45-44.685c14.044,11.585,31.359,18.424,50.088,18.424a78.331,78.331,0,0,0,49.912-18.274Z"
                                            transform="translate(388.395 -149.333) rotate(90)"
                                        />
                                    </svg>
                                </div>
                                <div class="next">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="47.062"
                                        height="100"
                                        viewBox="0 0 47.062 100"
                                    >
                                        <path
                                            id="next"
                                            d="M100,46.914,55.7,2.376a7.842,7.842,0,0,0-11.247,0L0,47.062C14.044,35.476,31.359,28.638,50.088,28.638A78.331,78.331,0,0,1,100,46.912Z"
                                            transform="translate(47.062) rotate(90)"
                                        />
                                    </svg>
                                </div>
                                <div class="skype">
                                    <svg
                                        t="1677935897853"
                                        class="icon"
                                        viewBox="0 0 1024 1024"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        p-id="2917"
                                        width="200"
                                        height="200"
                                    >
                                        <path
                                            d="M975.296 577.952c2.816-20.8 4.416-41.952 4.416-63.488 0-258.304-210.528-467.744-470.208-467.744-25.792 0-51.104 2.112-75.744 6.176-44.128-28.768-96.672-45.536-153.216-45.536C125.536 7.36 0 132.96 0 287.968c0 56.384 16.608 108.8 45.184 152.768-3.84 24.032-5.824 48.64-5.824 73.728 0 258.336 210.432 467.776 470.176 467.776 29.312 0 57.856-2.848 85.6-7.872 43.104 26.752 93.856 42.304 148.288 42.304C898.432 1016.64 1024 891.008 1024 736.032 1024 677.44 1006.08 622.976 975.296 577.952zM553.472 859.2c-149.408 7.776-219.328-25.28-283.392-85.376-71.52-67.136-42.784-143.712 15.488-147.616 58.24-3.872 93.216 66.016 124.288 85.472 31.04 19.392 149.184 63.52 211.584-7.808 67.936-77.664-45.184-117.856-128.128-130.016-118.4-17.536-267.904-81.6-256.256-207.808 11.616-126.144 107.168-190.816 207.712-199.936 128.16-11.648 211.584 19.424 277.568 75.712 76.288 65.056 35.008 137.792-13.6 143.648-48.416 5.824-102.816-107.008-209.568-108.704-110.048-1.728-184.448 114.528-48.576 147.584 135.936 33.024 281.504 46.56 333.92 170.848C836.992 719.424 703.008 851.392 553.472 859.2z"
                                            fill="#000000"
                                            p-id="2918"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="moreicon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="767.307"
                                        height="577.548"
                                        viewBox="0 0 767.307 577.548"
                                    >
                                        <path
                                            id="路径_276"
                                            data-name="路径 276"
                                            d="M885.113,489.373,628.338,232.6a32,32,0,1,0-45.254,45.255l203.3,203.3H158.025a30.846,30.846,0,0,0,0,61.692h628.36l-203.3,203.3A32,32,0,0,0,628.338,791.4L885.113,534.627a32,32,0,0,0,0-45.254Z"
                                            transform="translate(-127.179 -223.226)"
                                        ></path>
                                    </svg>
                                </div>
                                <div class="tel02">
                                    <svg
                                        t="1683854973181"
                                        viewBox="0 0 1024 1024"
                                        version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                        p-id="20559"
                                        width="200"
                                        height="200"
                                    >
                                        <path
                                            d="M713.5 599.9c-10.9-5.6-65.2-32.2-75.3-35.8-10.1-3.8-17.5-5.6-24.8 5.6-7.4 11.1-28.4 35.8-35 43.3-6.4 7.4-12.9 8.3-23.8 2.8-64.8-32.4-107.3-57.8-150-131.1-11.3-19.5 11.3-18.1 32.4-60.2 3.6-7.4 1.8-13.7-1-19.3-2.8-5.6-24.8-59.8-34-81.9-8.9-21.5-18.1-18.5-24.8-18.9-6.4-0.4-13.7-0.4-21.1-0.4-7.4 0-19.3 2.8-29.4 13.7-10.1 11.1-38.6 37.8-38.6 92s39.5 106.7 44.9 114.1c5.6 7.4 77.7 118.6 188.4 166.5 70 30.2 97.4 32.8 132.4 27.6 21.3-3.2 65.2-26.6 74.3-52.5 9.1-25.8 9.1-47.9 6.4-52.5-2.7-4.9-10.1-7.7-21-13z m211.7-261.5c-22.6-53.7-55-101.9-96.3-143.3-41.3-41.3-89.5-73.8-143.3-96.3C630.6 75.7 572.2 64 512 64h-2c-60.6 0.3-119.3 12.3-174.5 35.9-53.3 22.8-101.1 55.2-142 96.5-40.9 41.3-73 89.3-95.2 142.8-23 55.4-34.6 114.3-34.3 174.9 0.3 69.4 16.9 138.3 48 199.9v152c0 25.4 20.6 46 46 46h152.1c61.6 31.1 130.5 47.7 199.9 48h2.1c59.9 0 118-11.6 172.7-34.3 53.5-22.3 101.6-54.3 142.8-95.2 41.3-40.9 73.8-88.7 96.5-142 23.6-55.2 35.6-113.9 35.9-174.5 0.3-60.9-11.5-120-34.8-175.6z m-151.1 438C704 845.8 611 884 512 884h-1.7c-60.3-0.3-120.2-15.3-173.1-43.5l-8.4-4.5H188V695.2l-4.5-8.4C155.3 633.9 140.3 574 140 513.7c-0.4-99.7 37.7-193.3 107.6-263.8 69.8-70.5 163.1-109.5 262.8-109.9h1.7c50 0 98.5 9.7 144.2 28.9 44.6 18.7 84.6 45.6 119 80 34.3 34.3 61.3 74.4 80 119 19.4 46.2 29.1 95.2 28.9 145.8-0.6 99.6-39.7 192.9-110.1 262.7z"
                                            p-id="20560"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <link
                    type="text/css"
                    rel="stylesheet"
                    href="<?= bloginfo("template_url"); ?>/assets/upload/css/a542852518db4913ba26b2cb5f622c2a.css"
                /> -->
                <!-- <link
                    type="text/css"
                    rel="stylesheet"
                    href="<?= bloginfo("template_url"); ?>/assets/upload/css/abe57529cab54a19b6da0041db3fb122.css"
                /> -->
                <!-- <link
                    type="text/css"
                    rel="stylesheet"
                    href="<?= bloginfo("template_url"); ?>/assets/upload/css/6f7215910b184bd6873d42388538e76c.css"
                /> -->
                <?php wp_footer(); ?>
                <!-- <script src="<?= bloginfo("template_url"); ?>/assets/upload/js/9369ea15214844fba0610aee5ce2161e.js"></script>
                <script src="<?= bloginfo("template_url"); ?>/assets/upload/js/56d1dc9e74114aa0a152b07725ffc960.js"></script> -->

                <input
                    type="hidden"
                    name="propJson"
                    value='{"dense_38":"","dense_37":"","prompt_38":"","prompt_43":"","href_43":{"transport":[],"type":"page","value":{"pageId":"af96174b-39ab-430a-a049-013fbaedc0p6","hash":""},"target":"_self"},"dense_43":"","href_2":{"type":"none","value":"","target":""},"prompt_37":"","href_38":{"type":"none","value":"","target":""},"href_37":{"type":"none","value":"","target":""}}'
                />
            </div>
            <div id="c_popbox-17125600253470">
                <div
                    class="pop_wrapper"
                    id="contentId"
                    bg-close="false"
                    auto-play="false"
                >
                    <div class="p_container">
                        <a href="javascript:;" class="p_close"
                            ><svg
                                t="1610353588925"
                                class="icon"
                                viewBox="0 0 1024 1024"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                                p-id="5295"
                                width="200"
                                height="200"
                            >
                                <path
                                    d="M798.72 225.73511147a44.78293333 44.78293333 0 0 0-31.85777813-13.19822294c-11.83288853 0-23.66577813 5.00622187-31.85777707 13.19822294L512 447.82933333 289.45066667 225.28a44.78293333 44.78293333 0 0 0-31.85777814-13.19822187c-11.83288853 0-23.66577813 5.00622187-32.31288853 13.19822187a45.32906667 45.32906667 0 0 0 0 64.17066667L447.82933333 512 225.28 734.54933333a45.32906667 45.32906667 0 1 0 64.17066667 64.17066667L512 576.17066667l222.54933333 222.54933333a45.32906667 45.32906667 0 1 0 64.17066667-64.17066667L576.17066667 512l222.54933333-222.54933333c17.29422187-17.29422187 17.29422187-46.42133333 0-63.7155552z"
                                    p-id="5296"
                                ></path>
							</svg >
						</a>

                        <div
                            class="p_content pop-content"
                            id="content_box-17125600253470"
                        >
                            <div id="c_static_001-17125600254591">
                                <p class="e_text-1 s_title">
                                    Выберите вашу страну/регион
                                </p>
                                <div class="e_container-2 s_layout">
                                    <div class="cbox-2-0 p_item">
                                        <div
                                            class="e_loop-3 s_list"
                                            needjs="true"
                                            ds-id=""
                                            elem-id="e_loop-3"
                                        >
                                            <div class="">
                                                <div class="p_list">
                                                    <div
                                                        class="cbox-3 p_loopitem"
                                                    >
                                                        <p
                                                            class="e_text-4 s_title"
                                                        >
                                                            Америка
                                                        </p>

                                                        <ul class="p_navBox2">
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Бразилия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Português</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Чили</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Español</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Колумбия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Español</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Мексика</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Español</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Соединенные
                                                                            Штаты</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Венесуэла</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Español</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="cbox-3 p_loopitem"
                                                    >
                                                        <p
                                                            class="e_text-4 s_title"
                                                        >
                                                            Азиатско-Тихоокеанский
                                                        </p>

                                                        <ul class="p_navBox2">
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Бангладеш</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Индонезия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Bahasa
                                                                            Indonesia</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Казахстан</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Русский</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Малайзия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Шри-Ланка</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Таиланд</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >ไทย</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="cbox-3 p_loopitem"
                                                    >
                                                        <p
                                                            class="e_text-4 s_title"
                                                        >
                                                            Европа
                                                        </p>

                                                        <ul class="p_navBox2">
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Германия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Deutsch</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Греция</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >E入λnvIKá</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Нидерланды</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Nederlands</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Норвегия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Испания</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Español</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Украина</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >yкранська</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="cbox-3 p_loopitem"
                                                    >
                                                        <p
                                                            class="e_text-4 s_title"
                                                        >
                                                            Ближний Восток и
                                                            Африка
                                                        </p>

                                                        <ul class="p_navBox2">
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Дубай</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >اللغة
                                                                            العربية</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Марокко</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >Français</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Пакистан</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Саудовская
                                                                            Аравия</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >اللغة
                                                                            العربية</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Объединенные
                                                                            Арабские
                                                                            Эмираты</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >اللغة
                                                                            العربية</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                            <li
                                                                class="p_navItem2"
                                                            >
                                                                <p
                                                                    class="p_menu2Item"
                                                                >
                                                                    <a
                                                                        href="index.html"
                                                                    >
                                                                        <span
                                                                            class="navName"
                                                                            >Южная
                                                                            Африка</span
                                                                        >
                                                                        <span
                                                                            class="navAliasName"
                                                                            >English</span
                                                                        >
                                                                    </a>
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="p_page">
                                                    <div class="page_con"></div>
                                                </div>
                                            </div>
                                            <input
                                                type="hidden"
                                                name="_config"
                                                value='{"cname":"导航-列表接口","type":"list","params":{"size":2,"query":[{"filter":"ignore-empty-check","esField":"navId","groupName":"数据展示条件,默认条件组","groupEnd":"2,1","field":"navId","sourceType":"static","valueName":"New-多语言导航","dataType":"string","logic":"and","groupBegin":"1,2","value":"1777221616406384640","operator":"eq"}],"header":{"Data-Query-Es-Field":"","Data-Query-Random":0,"Data-Query-Field":""},"from":0,"sort":[]},"valueUrl":"/fwebapi/cms/lowcode/navigation/8/list/param/navValue?cate&#x3D;0","priority":0,"_dataFilter":{"filter":false,"showCondition":false,"conditionExclude":false,"showSearch":false,"currentConditionHide":false,"selectFirstCondition":false,"fields":[],"viscidityEnableShowAll":false,"cascaderEnable":false,"showSearchCname":"","viscidityEnable":false,"viscidityEnableShowFirst":false},"datasourceType":"nomarl","appId":"navigation","sourceUuid":"ffce28fdeddd496cac3ca5377604e664","pageParams":[],"metaUrl":"/fwebapi/cms/lowcode/navigation/8/list/navMeta?cate&#x3D;0","disabled":false,"api":"/fwebapi/cms/lowcode/navigation/8/navList?cate&#x3D;0","id":"datasource1","apiId":"8","reqKey":"/fwebapi/cms/lowcode/navigation/8/navList?cate&#x3D;0|{\"size\":2,\"query\":[{\"filter\":\"ignore-empty-check\",\"esField\":\"navId\",\"groupName\":\"数据展示条件,默认条件组\",\"groupEnd\":\"2,1\",\"field\":\"navId\",\"sourceType\":\"static\",\"valueName\":\"New-多语言导航\",\"dataType\":\"string\",\"logic\":\"and\",\"groupBegin\":\"1,2\",\"value\":\"1777221616406384640\",\"operator\":\"eq\"}],\"header\":{\"Data-Query-Es-Field\":\"\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"\"},\"from\":0,\"sort\":[]}|{\"Data-Query-Es-Field\":\"\",\"Data-Query-Random\":0,\"Data-Query-Field\":\"\"}"}'
                                            />
                                            <input
                                                type="hidden"
                                                name="view"
                                                value="Home"
                                            />
                                            <input
                                                type="hidden"
                                                name="pageParamsJson"
                                                value=""
                                            />
                                            <input
                                                type="hidden"
                                                name="i18nJson"
                                                value='{"loadMore_3":"Нажмите «загрузить еще»","noMore_3":"Нет больше информации","clearConditions_3":"чистое состояние","noData_3":"Нет данных","loadNow_3":"Загрузка...","confirm_3":"Подтвердить","pageItem_3":"шт.","pageJump_3":"Перейти на","pageWhole_3":"всего","totalAcount_3":"Всего Х","conditions_3":"условие:","pageUnit_3":"стр."}'
                                            />
                                        </div>
                                    </div>
                                </div>
                                <input
                                    type="hidden"
                                    name="propJson"
                                    value='{"page_3":{"size":6,"from":0,"totalCount":100},"href_4":{"transport":[],"type":"none","value":"","target":"_self"},"href_1":{"type":"none","value":"","target":""},"prompt_4":"","pageConfig_3":{"showJump":true,"marquee":{"navigation":true,"marqueeTime":4,"scrollType":"horizontal","opp":false},"filterPosition":"","moColumn":1,"rolling":{"navigation":true,"pageStyle":1,"scrollType":"horizontal","pagenation":true,"scrollTime":4,"autoScroll":true,"speed":600},"pageType":"hidden","singleTotal":0,"showButtom":false,"showTotal":false,"pcColumn":1,"loopItem":".p_loopitem","status":true,"pcRow":2,"datasourceid":"datasource1","elementid":3},"dense_4":"","dense_1":"","prompt_1":""}'
                                />
                            </div>
                        </div>
                    </div>
                    <div
                        class="p_background"
                        style="background-color: rgba(0, 0, 0, 0.7)"
                    ></div>
                </div>
            </div>
            <?php if (!is_front_page()) : ?>
                <?= get_sidebar(); ?>
            <?php endif; ?>
	</div>

        <script id="tpltool_ExtractJs">
            $(".p_navItem2").each(function () {
                if ($(this).find(".p_level3Item").length != 0) {
                    $(this).parents(".p_navItem1").addClass("atvm");
                }
            });
            $(".e_navigationF-24 .p_navItem1").hover(
                function () {
                    $(this).find(".p_navBox2").addClass("aciver");
                },
                function () {
                    $(this).find(".p_navBox2").removeClass("aciver");
                }
            );

            $(".e_navigationF-24 .p_navBox1").hover(
                function () {
                    $(".nav_bj").addClass("avcaue");
                },
                function () {
                    $(".nav_bj").removeClass("avcaue");
                }
            );
        </script>
        
    </body>
</html>
