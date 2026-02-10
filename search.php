<?php
/*
    Template Name: Search
*/

get_header();

// Get search query from URL parameter
$search_query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';

// Set up pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// WooCommerce product query arguments
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 6,
    'paged' => $paged,
    'post_status' => 'publish',
    'meta_query' => array(
        array(
            'key' => '_stock_status',
            'value' => 'outofstock',
            'compare' => '!='
        )
    )
);

// Add search query if provided
if (!empty($search_query)) {
    $args['s'] = $search_query;
}

// Execute the query
$products = new WP_Query($args);
$total_products = $products->found_posts;
$total_pages = $products->max_num_pages;
?>

<div id="c_relevant_057-1668158909138" class="response-animated" style="margin-top: 120px;">
    
    <!-- Search Section -->
    <div class="e_search-84 s_list" needjs="true">
        
        <!-- Search Input -->
        <div class="p_inputCon">
            <input class="p_input" 
                   type="text" 
                   id="search-input"
                   value="<?php echo esc_attr($search_query); ?>"
                   placeholder="Пожалуйста, введите ключевые слова">
        </div>
        
        <!-- Category Select Dropdown -->
        <div class="p_selectCon formHide">
            <div class="p_select">
                <span class="p_current">
                    <span class="p_c_span" data-v="143150160001">Управление продукцией</span>
                    <svg t="1659083611648" 
                         class="icon" 
                         viewBox="0 0 1024 1024" 
                         version="1.1" 
                         xmlns="http://www.w3.org/2000/svg" 
                         p-id="32915" 
                         width="200" 
                         height="200">
                        <path d="M128.005 302.974l386.971 420.571 381.020-422.746z" p-id="32916"></path>
                    </svg>
                </span>
                
                <ul class="p_selectList" style="display: none;">
                    <li class="p_selectItem" data-v="all">Все.</li>
                    <li class="p_selectItem" data-v="143150160001">Управление продукцией</li>
                    <li class="p_selectItem" data-v="60003">Новости информация</li>
                    <li class="p_selectItem" data-v="60007">Введение</li>
                    <li class="p_selectItem" data-v="2260">Корпоративные торговые точки</li>
                    <li class="p_selectItem" data-v="60005">Часто задаваемые вопросы</li>
                    <li class="p_selectItem" data-v="60008">Корпоративное видео</li>
                    <li class="p_selectItem" data-v="60004">Бизнес-атлас</li>
                </ul>
            </div>
        </div>
        
        <!-- Search Button -->
        <div class="p_btnCon">
            <a class="btn btn-primary p_btn" href="javascript:;" id="search-btn">Поиск</a>
        </div>
        
        <input type="hidden" name="searchUrl" value="<?php echo esc_url(get_permalink()); ?>">
    </div>
    
    <!-- Results Section -->
    <div id="c_static_001-17125489015010" class="response-animated">
        <div class="e_container-1 s_layout response-transition">
            <div class="cbox-1-0 p_item">
                                
                <!-- Loop Container -->
                <div class="e_loop-2 s_list response-transition" 
                     needjs="true" 
                     ds-id="" 
                     elem-id="e_loop-2">
                    <div class="">
                        
                        <!-- Results List -->
                        <div class="p_list" style="justify-content: center;">
                            
                            <?php if ($products->have_posts()): ?>
                                
                                <?php while ($products->have_posts()): $products->the_post(); 
                                    global $product;
                                    $product_id = get_the_ID();
                                    $product_title = get_the_title();
                                    $product_url = get_permalink();
                                    
                                    // Get product image
                                    $image_id = $product->get_image_id();
                                    if ($image_id) {
                                        $image_url = wp_get_attachment_image_url($image_id, 'medium');
                                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                    } else {
                                        $image_url = wc_placeholder_img_src('medium');
                                        $image_alt = $product_title;
                                    }
                                    
                                    // Get product categories
                                    $categories = get_the_terms($product_id, 'product_cat');
                                    $category_name = '';
                                    if ($categories && !is_wp_error($categories)) {
                                        $category_name = $categories[0]->name;
                                    }
                                    
                                    // Get product price
                                    $price = $product->get_price_html();
                                    
                                    // Get product short description
                                    $short_description = $product->get_short_description();
                                ?>
                                
                                <!-- Single Product Item -->
                                <div class="cbox-2 p_loopitem">
                                    <div class="e_container-3 s_layout response-transition">
                                        
                                        <!-- Product Image -->
                                        <div class="cbox-3-0 p_item">
                                            <div class="e_image-4 s_img response-transition">
                                                <a href="<?php echo esc_url($product_url); ?>" target="_self">
                                                    <img src="<?php echo esc_url($image_url); ?>" 
                                                         alt="<?php echo esc_attr($image_alt ? $image_alt : $product_title); ?>" 
                                                         title="<?php echo esc_attr($product_title); ?>" 
                                                         la="la" 
                                                         needthumb="true">
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <!-- Product Info -->
                                        <div class="cbox-3-1 p_item">
                                            <div class="e_container-10 s_layout response-transition">
                                                <div class="cbox-10-0 p_item">
                                                    <?php if ($category_name): ?>
                                                    <p class="e_text-13 s_title response-transition">
                                                        <?php echo esc_html($category_name); ?>
                                                    </p>
                                                    <?php endif; ?>
                                                    
                                                    <p class="e_text-6 s_title response-transition">
                                                        <a href="<?php echo esc_url($product_url); ?>" style="text-decoration: none; color: inherit;">
                                                            <?php echo esc_html($product_title); ?>
                                                        </a>
                                                    </p>
                                                    
                                                    <?php if ($price): ?>
                                                    <p class="e_text-8 s_title response-transition">
                                                        <?php echo $price; ?>
                                                    </p>
                                                    <?php endif; ?>
                                                    
                                                    <?php if ($short_description): ?>
                                                    <p class="e_text-11 s_title response-transition">
                                                        <?php echo wp_trim_words($short_description, 15, '...'); ?>
                                                    </p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <?php endwhile; ?>
                                
                            <?php else: ?>
                                
                                <!-- No Results -->
                                <div class="no-products-found" style="text-align: center; padding: 40px 20px;">
                                    <p style="font-size: 18px; color: #999;">Нет данных</p>
                                    <?php if (!empty($search_query)): ?>
                                    <p style="color: #666;">По запросу "<?php echo esc_html($search_query); ?>" ничего не найдено</p>
                                    <?php endif; ?>
                                </div>
                                
                            <?php endif; ?>
                            
                        </div>
                        
                        <!-- Pagination -->
                        <?php if ($total_pages > 1): ?>
                        <div class="p_page">
                            <div class="page_con">
                                
                                <!-- Previous Button -->
                                <?php if ($paged > 1): ?>
                                <a href="<?php echo esc_url(add_query_arg(array('query' => $search_query, 'paged' => $paged - 1))); ?>" 
                                   class="page_a page_prev">&lt;</a>
                                <?php else: ?>
                                <a href="javascript:;" class="page_a page_prev disabled">&lt;</a>
                                <?php endif; ?>
                                
                                <!-- Page Numbers -->
                                <?php
                                $start_page = max(1, $paged - 2);
                                $end_page = min($total_pages, $paged + 2);
                                
                                for ($i = $start_page; $i <= $end_page; $i++):
                                    if ($i == $paged):
                                ?>
                                <a class="page_a page_num current" href="javascript:;"><?php echo $i; ?></a>
                                <?php else: ?>
                                <a class="page_a page_num" 
                                   href="<?php echo esc_url(add_query_arg(array('query' => $search_query, 'paged' => $i))); ?>">
                                   <?php echo $i; ?>
                                </a>
                                <?php 
                                    endif;
                                endfor; 
                                ?>
                                
                                <!-- Next Button -->
                                <?php if ($paged < $total_pages): ?>
                                <a href="<?php echo esc_url(add_query_arg(array('query' => $search_query, 'paged' => $paged + 1))); ?>" 
                                   class="page_a page_next">&gt;</a>
                                <?php else: ?>
                                <a href="javascript:;" class="page_a page_next disabled">&gt;</a>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    
                    <!-- Hidden Configuration Inputs -->
                    <input type="hidden" name="view" value="Search">
                    <input type="hidden" name="pageParamsJson" value='{"size":6,"from":<?php echo ($paged - 1) * 6; ?>,"totalCount":<?php echo $total_products; ?>}'>
                    <input type="hidden" name="i18nJson" value='{"confirm_2":"Подтвердить","loadMore_2":"Нажмите «загрузить еще»","loadNow_2":"Загрузка...","noMore_2":"Нет больше информации","clearConditions_2":"чистое состояние","pageItem_2":"шт.","noData_2":"Нет данных","totalAcount_2":"Всего <?php echo $total_products; ?>","pageJump_2":"Перейти на","conditions_2":"условие:","pageWhole_2":"всего","pageUnit_2":"стр."}'>
                    
                </div>
                
            </div>
        </div>
    </div>
    
</div>

<script>
jQuery(document).ready(function($) {
    // Search button click handler
    $('#search-btn').on('click', function(e) {
        e.preventDefault();
        var searchQuery = $('#search-input').val().trim();
        var searchUrl = $('input[name="searchUrl"]').val();
        
        if (searchQuery) {
            window.location.href = searchUrl + '?query=' + encodeURIComponent(searchQuery);
        }
    });
    
    // Enter key handler for search input
    $('#search-input').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $('#search-btn').trigger('click');
        }
    });
    
    // Category select dropdown functionality
    $('.p_current').on('click', function() {
        $(this).siblings('.p_selectList').toggle();
    });
    
    $('.p_selectItem').on('click', function() {
        var value = $(this).data('v');
        var text = $(this).text();
        
        $('.p_c_span').text(text).data('v', value);
        $('.p_selectList').hide();
    });
    
    // Close dropdown when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.p_select').length) {
            $('.p_selectList').hide();
        }
    });
});
</script>

<?php
// Reset post data
wp_reset_postdata();

get_footer();
?>