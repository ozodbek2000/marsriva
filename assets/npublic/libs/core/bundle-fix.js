/**
 * bundle-fix-ultra.js
 * УЛЬТРА-агрессивное исправление - полностью отключает RequireJS
 * Используйте только если bundle-fix-v2.js не помог
 */

(function() {
    'use strict';
    
    console.log('🔧🔧🔧 УЛЬТРА исправления для bundle.js...');
    
    // 1. Создаем полный объект tenant
    window.tenant = window.tenant || {};
    Object.assign(window.tenant, {
        tenantId: "local-dev",
        domain: window.location.hostname || "localhost",
        mobileDomain: window.location.hostname || "localhost",
        makeDomain: window.location.hostname || "localhost",
        language: "ru",
        status: 6,
        mobileStatus: 6,
        unittype: "local",
        productGroupId: null,
        productVersion: null,
        cdnFlag: '3',
        foreign: false,
        viewType: 'p'
    });
    
    // 2. ПОЛНОСТЬЮ отключаем RequireJS от загрузки внешних скриптов
    if (window.requirejs && window.requirejs.load) {
        // Сохраняем оригинальный метод load
        var originalLoad = window.requirejs.load;
        
        // Перехватываем все попытки загрузки
        window.requirejs.load = function(context, moduleName, url) {
            console.log('🔍 RequireJS пытается загрузить:', moduleName, url);
            
            // Список паттернов URL для блокировки
            var blockedPatterns = [
                '/npublic/',
                '/thirdcode/',
                '/fwebapi/',
                'cmsAjax',
                'pl_service',
                'language/',
                'md.js',
                'mallmd'
            ];
            
            // Проверяем, нужно ли блокировать
            var shouldBlock = blockedPatterns.some(function(pattern) {
                return (url && url.indexOf(pattern) !== -1) || 
                       (moduleName && moduleName.indexOf(pattern) !== -1);
            });
            
            if (shouldBlock) {
                console.warn('🚫 ЗАБЛОКИРОВАН RequireJS модуль:', moduleName);
                
                // Немедленно вызываем onScriptLoad с пустым модулем
                setTimeout(function() {
                    if (context.completeLoad) {
                        context.completeLoad(moduleName);
                    }
                }, 0);
                
                return;
            }
            
            // Для незаблокированных модулей используем оригинальный load
            return originalLoad.apply(this, arguments);
        };
    }
    
    // 3. Отключаем обработчик ошибок RequireJS ПОЛНОСТЬЮ
    if (window.requirejs) {
        window.requirejs.onError = function(err) {
            console.log('ℹ️ RequireJS ошибка проигнорирована:', err.requireModules || err.message);
            // Ничего не делаем - полностью игнорируем
        };
    }
    
    // 4. Блокируем создание script тегов для определенных URL
    var originalCreateElement = document.createElement;
    document.createElement = function(tagName) {
        var element = originalCreateElement.call(document, tagName);
        
        if (tagName && tagName.toLowerCase() === 'script') {
            // Перехватываем установку src
            var descriptor = Object.getOwnPropertyDescriptor(HTMLScriptElement.prototype, 'src');
            if (descriptor && descriptor.set) {
                var originalSrcSetter = descriptor.set;
                
                Object.defineProperty(element, 'src', {
                    set: function(value) {
                        // Проверяем URL
                        var blockedPaths = [
                            '/npublic/',
                            '/thirdcode/',
                            'cmsAjax.js',
                            'language/ru.js',
                            'language/zh_CN.js'
                        ];
                        
                        var isBlocked = blockedPaths.some(function(path) {
                            return value && value.indexOf(path) !== -1;
                        });
                        
                        if (isBlocked) {
                            console.warn('🚫 Заблокирован скрипт:', value);
                            // Устанавливаем пустой data URI
                            return originalSrcSetter.call(this, 'data:text/javascript;base64,Ly8gRW1wdHk=');
                        }
                        
                        return originalSrcSetter.call(this, value);
                    },
                    get: descriptor.get
                });
            }
        }
        
        return element;
    };
    
    // 5. Отключаем AJAX запросы к CMS эндпоинтам
    if (window.$) {
        var originalAjax = $.ajax;
        
        $.ajax = function(settings) {
            var url = typeof settings === 'string' ? settings : (settings && settings.url);
            
            var blockedUrls = [
                '/tenant.json',
                '/thirdcode/',
                '/producer/',
                '/fwebapi/',
                '/npublic/',
                '/languages',
                '/buryPointSendMessage'
            ];
            
            var isBlocked = blockedUrls.some(function(blocked) {
                return url && url.indexOf(blocked) !== -1;
            });
            
            if (isBlocked) {
                console.warn('🚫 AJAX заблокирован:', url);
                
                // Возвращаем пустой успешный Promise
                var deferred = $.Deferred();
                setTimeout(function() {
                    deferred.resolve({
                        status: 200,
                        statusText: 'OK',
                        data: {}
                    });
                }, 0);
                
                return deferred.promise();
            }
            
            return originalAjax.apply(this, arguments);
        };
        
        // Также блокируем $.get, $.post
        ['get', 'post', 'getJSON'].forEach(function(method) {
            if ($[method]) {
                var original = $[method];
                $[method] = function(url) {
                    var blockedUrls = ['/tenant.json', '/thirdcode/', '/fwebapi/', '/npublic/'];
                    
                    if (blockedUrls.some(function(b) { return url.indexOf(b) !== -1; })) {
                        console.warn('🚫 $.' + method + ' заблокирован:', url);
                        return $.Deferred().resolve({}).promise();
                    }
                    
                    return original.apply(this, arguments);
                };
            }
        });
    }
    
    // 6. Отключаем все проблемные функции
    var disableFunctions = [
        'getThirdCode',
        'getLixiaoCode',
        'onlineService',
        'mostLanguage',
        'intelligenceJump',
        'lixiaoCount',
        'highLightKeywords',
        'gohomeFromBlank',
        'designRefresh',
        'setHistory',
        'safTempReplace'
    ];
    
    disableFunctions.forEach(function(funcName) {
        if (typeof window[funcName] === 'function') {
            var noop = function() {
                console.log('🚫 Отключено:', funcName);
            };
            window[funcName] = noop;
        }
    });
    
    // 7. Предотвращаем редиректы
    var originalLocationSetter = Object.getOwnPropertyDescriptor(window.location, 'href');
    if (!originalLocationSetter || !originalLocationSetter.set) {
        // Для некоторых браузеров создаем защиту через beforeunload
        window.addEventListener('beforeunload', function(e) {
            // Можно раскомментировать для отладки:
            // e.preventDefault();
            // e.returnValue = 'Предотвращён редирект';
        });
    }
    
    // 8. Создаем глобальную переменную-флаг
    window.__BUNDLE_FIX_ULTRA_ENABLED__ = true;
    
    console.log('✅✅✅ УЛЬТРА исправления применены!');
    console.log('🔒 RequireJS загрузка внешних модулей: ЗАБЛОКИРОВАНА');
    console.log('🔒 AJAX к CMS эндпоинтам: ЗАБЛОКИРОВАН');
    console.log('🔒 Динамическое создание <script>: КОНТРОЛИРУЕТСЯ');
    console.log('🔒 Проблемные функции: ОТКЛЮЧЕНЫ');
    console.log('📋 Отключенные функции:', disableFunctions.join(', '));
    
})();