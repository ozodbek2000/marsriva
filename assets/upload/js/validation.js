// Telegram Bot Configuration
var TELEGRAM_CONFIG = {
    botToken: '8107637501:AAFKh_xa4qfXyB5_f_exQRhD8fFw71GbFXI',
    chatId: '-1003843843530'
};

// Function to send message to Telegram
function sendToTelegram(formData, departmentName) {
    // Format the message
    var message = '📝 *Новая заявка с сайта*\n\n';
    
    // Add department if provided
    if (departmentName) {
        message += '🏢 *Отдел:* ' + departmentName + '\n\n';
    }
    
    // Handle different form field names
    if (formData.name1711095872177 || formData.name1712044155340) {
        var name = formData.name1711095872177 || formData.name1712044155340;
        message += '👤 *Имя:* ' + name + '\n';
    }
    if (formData.name1712044155340_country) {
        message += '🌍 *Страна/Регион:* ' + formData.name1712044155340_country + '\n';
    }
    if (formData.name1711095872177_phone || formData.name1712044155340_phone) {
        var phone = formData.name1711095872177_phone || formData.name1712044155340_phone;
        message += '📱 *Телефон:* ' + phone + '\n';
    }
    if (formData.email1711095920712 || formData.email1712044176522) {
        var email = formData.email1711095920712 || formData.email1712044176522;
        message += '📧 *Email:* ' + email + '\n';
    }
    if (formData['e_textarea-5'] || formData['e_textarea-35']) {
        var description = formData['e_textarea-5'] || formData['e_textarea-35'];
        message += '\n💬 *Сообщение:*\n' + description;
    }
    
    // Telegram API endpoint
    var apiUrl = 'https://api.telegram.org/bot' + TELEGRAM_CONFIG.botToken + '/sendMessage';
    
    // Send to Telegram
    return $.ajax({
        url: apiUrl,
        type: 'POST',
        data: {
            chat_id: TELEGRAM_CONFIG.chatId,
            text: message,
            parse_mode: 'Markdown'
        },
        timeout: 10000
    });
}

// Modify the form submission handler
(function($) {
    'use strict';
    
    if (typeof $ === 'undefined') {
        return;
    }
    
    if (typeof $.formValidate !== 'function') {
        $.formValidate = function(e, t, r, n) {
            var i, a, o;
            if ("resetForm" != e)
                if ("errorMessage" != e)
                    for (var l in r.required.value = !(!t.attr("required") || !r.required), r) {
                        var c = r[l];
                        if ("" == e) {
                            var u = !("required" != l || !c.value) && c.msg;
                            if (s(t, u), !1 !== u)
                                return
                        } else if ("type" == l && c.state) {
                            u = (i = e,
                            a = c.value,
                            o = void 0,
                            !(!(o = {
                                text: /[\w\W]*/,
                                mobile: /^[0-9]{11}$/,
                                countryMobile: /^[0-9\+-]+$/,
                                tel: /^[0-9\+-]+$/,
                                countryTel: /^[0-9\+-]+$/,
                                number: /^-?[0-9]+(\.[0-9]*)?$/,
                                email: /^[A-Za-z\d]+([-_.][A-Za-z\d]+)*@([A-Za-z\d]+[-.])+[A-Za-z\d]{2,5}$/,
                                card: /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/,
                                url: /^(?:http(s)?:\/\/)[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\*\+,;=.]+$/
                            })[a] || o[a].test(i)) && c.msg);
                            if (s(t, u), !1 !== u)
                                return
                        } else {
                            if ("decimal" == l && c.state && -1 < e.indexOf(".") && e.split(".")[1].length > c.value)
                                return c.msg = c.msg.replace("%len", c.value),
                                void s(t, c.msg);
                            if ("minLength" == l && c.state && e.length < c.value)
                                return c.msg = c.msg.replace("%len", c.value),
                                void s(t, c.msg);
                            if ("maxLength" == l && c.state && e.length > c.value)
                                return c.msg = c.msg.replace("%len", c.value),
                                void s(t, c.msg);
                            if ("min" == l && c.state && Number(e) < Number(c.value))
                                return c.msg = c.msg.replace("%len", c.value),
                                void s(t, c.msg);
                            if ("max" == l && c.state && Number(e) > Number(c.value))
                                return c.msg = c.msg.replace("%len", c.value),
                                void s(t, c.msg);
                            if ("custom" == l && c.state && !new RegExp(c.value).test(e))
                                return void s(t, c.msg);
                            s(t, !1)
                        }
                    }
                else
                    s(t, r);
            else
                s(t, !1);
                
            function s(e, t) {
                var r = e.find(".invalid-feedback"),
                    inputEl = e.find(".p_input");
                n && (r = (inputEl = n).parent().find(".invalid-feedback")),
                !1 === t ? (inputEl.removeClass("is-invalid"), r.text("")) : (inputEl.addClass("is-invalid"), r.text(t))
            }
        };
    }
    
    // Tab switching functionality - only change active class
    function initTabSwitching() {
        $('.p_tab_wrapper .p_tablist .tab-item').off('click.tabswitch').on('click.tabswitch', function(e) {
            e.preventDefault();
            
            var $clickedTab = $(this);
            var $tabList = $clickedTab.closest('.p_tablist');
            
            // Remove active classes from all tabs
            $tabList.find('.tab-item').removeClass('active p_active');
            
            // Add active class to clicked tab
            $clickedTab.addClass('active p_active');
        });
    }
    
    function initFormValidation($form) {
        // Determine button selector based on form class
        var buttonSelector = $form.hasClass('e_form-1') ? '.e_formBtn-22' : 
                            $form.hasClass('e_form-29') ? '.e_formBtn-36' : 
                            '.e_formBtn-22, .e_formBtn-36';
        
        $form.find(buttonSelector).off('click.formvalidation');
        $form.find('.p_input').off('blur.formvalidation input.formvalidation');
        
        // Form submission handler
        $form.find(buttonSelector).on('click.formvalidation', function(e) {
            e.preventDefault();
            
            var $button = $(this);
            var isValid = true;
            
            // Validate each required field
            $form.find('.form-group[required]').each(function() {
                var $group = $(this);
                var $input = $group.find('.p_input');
                var value = $input.val().trim();
                
                var rules = {
                    required: {
                        value: true,
                        msg: 'Пожалуйста, введите содержание'
                    }
                };
                
                // Email validation
                if ($group.hasClass('e_clueEmail-25') || $group.hasClass('e_clueEmail-33')) {
                    rules.type = {
                        value: 'email',
                        state: true,
                        msg: 'Пожалуйста, введите корректный email'
                    };
                }
                
                $.formValidate(value, $group, rules);
                
                if ($input.hasClass('is-invalid')) {
                    isValid = false;
                }
            });
            
            if (isValid) {
                // Disable button to prevent double submission
                $button.prop('disabled', true).css('opacity', '0.6');
                
                // Get active department/tab name - улучшенный поиск
                var departmentName = '';
                
                // Способ 1: Поиск в родительском табе
                var $tabWrapper = $form.closest('.p_tab_wrapper');
                if ($tabWrapper.length > 0) {
                    var $activeTab = $tabWrapper.find('.p_tablist .tab-item.active');
                    if ($activeTab.length > 0) {
                        departmentName = $activeTab.text().trim();
                    }
                }
                
                // Способ 2: Если не нашли, ищем через content-box
                if (!departmentName) {
                    var $contentBox = $form.closest('.content-box.active, .p_content.active');
                    if ($contentBox.length > 0) {
                        var contentIndex = $contentBox.index();
                        var $tabList = $contentBox.closest('.p_tab_wrapper').find('.p_tablist');
                        var $activeTab = $tabList.find('.tab-item').eq(contentIndex);
                        if ($activeTab.length > 0) {
                            departmentName = $activeTab.text().trim();
                        }
                    }
                }
                
                // Способ 3: Просто найти активный таб на странице
                if (!departmentName) {
                    var $activeTab = $('.p_tablist .tab-item.active, .p_tablist .tab-item.p_active');
                    if ($activeTab.length > 0) {
                        departmentName = $activeTab.text().trim();
                    }
                }
                
                // Collect form data with better field detection
                var formData = {};
                
                $form.find('.p_input').each(function() {
                    var $input = $(this);
                    var name = $input.attr('name');
                    var value = $input.val();
                    var dataName = $input.attr('data-name');
                    
                    if (name && value) {
                        // Check if this is a specific field type based on data-name or class
                        var $formGroup = $input.closest('.form-group');
                        
                        // Name field
                        if ($formGroup.hasClass('e_clueName-23') || $formGroup.hasClass('e_clueName-32')) {
                            formData.name1712044155340 = value;
                        }
                        // Country field
                        else if ($formGroup.hasClass('e_clueName-30') || $formGroup.hasClass('e_clueName-34')) {
                            formData.name1712044155340_country = value;
                        }
                        // Phone field
                        else if ($formGroup.hasClass('e_clueName-29') || $formGroup.hasClass('e_clueName-37')) {
                            formData.name1712044155340_phone = value;
                        }
                        // Email field
                        else if ($formGroup.hasClass('e_clueEmail-25')) {
                            formData.email1711095920712 = value;
                        }
                        else if ($formGroup.hasClass('e_clueEmail-33')) {
                            formData.email1712044176522 = value;
                        }
                        // Textarea
                        else if ($formGroup.hasClass('e_textarea-5') || $formGroup.hasClass('e_textarea-35')) {
                            formData[name] = value;
                        }
                        // Default
                        else if (!$formGroup.attr('hidden')) {
                            formData[name] = value;
                        }
                    }
                });
                
                // Check if chat ID is configured
                if (!TELEGRAM_CONFIG.chatId) {
                    alert('Ошибка: Chat ID не настроен. Пожалуйста, укажите Chat ID в настройках.');
                    $button.prop('disabled', false).css('opacity', '1');
                    return;
                }
                
                // Send to Telegram with department name
                sendToTelegram(formData, departmentName)
                    .done(function(response) {
                        if (response.ok) {
                            alert('Сообщение успешно отправлено!');
                            // Reset form
                            $form[0].reset();
                            $form.find('.is-invalid').removeClass('is-invalid');
                            $form.find('.invalid-feedback').text('');
                            
                            // Close popup if exists
                            $('.fixed').fadeOut();
                        } else {
                            alert('Ошибка при отправке. Попробуйте позже.');
                        }
                    })
                    .fail(function(xhr, status, error) {
                        alert('Ошибка подключения. Проверьте настройки и попробуйте снова.');
                    })
                    .always(function() {
                        // Re-enable button
                        $button.prop('disabled', false).css('opacity', '1');
                    });
                
            }
        });
        
        // Validation on blur
        $form.find('.p_input').on('blur.formvalidation', function() {
            var $input = $(this);
            var $group = $input.closest('.form-group');
            var value = $input.val().trim();
            
            if ($group.attr('required')) {
                var rules = {
                    required: {
                        value: true,
                        msg: 'Пожалуйста, введите содержание'
                    }
                };
                
                if ($group.hasClass('e_clueEmail-25') || $group.hasClass('e_clueEmail-33')) {
                    rules.type = {
                        value: 'email',
                        state: true,
                        msg: 'Пожалуйста, введите корректный email'
                    };
                }
                
                $.formValidate(value, $group, rules);
            }
        });
        
        // Remove error on input
        $form.find('.p_input').on('input.formvalidation', function() {
            var $input = $(this);
            if ($input.val().trim() !== '') {
                $input.removeClass('is-invalid');
                $input.closest('.form-group').find('.invalid-feedback').text('');
            }
        });
    }
    
    // Initialize on document ready
    $(document).ready(function() {
        // Initialize tab switching
        initTabSwitching();
        
        // Initialize both form types
        $('form.e_form-1, form.e_form-29').each(function() {
            initFormValidation($(this));
        });
        
        // Watch for popup opening
        $(document).on('click', 'a[href*="openDialog"]', function(e) {
            setTimeout(function() {
                $('.fixed:visible form.e_form-1, .fixed:visible form.e_form-29').each(function() {
                    initFormValidation($(this));
                });
            }, 100);
        });
        
        // Periodic check for forms in popups
        var checkInterval = setInterval(function() {
            $('.fixed:visible form.e_form-1, .fixed:visible form.e_form-29').each(function() {
                var $form = $(this);
                if (!$form.data('validation-initialized')) {
                    initFormValidation($form);
                    $form.data('validation-initialized', true);
                }
            });
        }, 500);
        
        setTimeout(function() {
            clearInterval(checkInterval);
        }, 10000);
    });
    
})(jQuery);