// RequireJS path configuration to fix module loading issues
// This ensures RequireJS uses the correct file paths for modules

(function() {
    // Wait for RequireJS to be available
    if (typeof requirejs !== 'undefined') {
        requirejs.config({
            paths: {
                // Map module names to actual file paths (without .js extension)
                'cmsAjax': baseOrigin + '/npublic/libs/widget/cmsAjax',
                'pl_toast': baseOrigin + '/npublic/libs/widget/pl_toast',
                'magnifier': baseOrigin + '/upload/js/magnifier'
            },
            // Disable automatic .min.js suffix in production
            urlArgs: function(id, url) {
                // Remove .min from URLs if it exists
                return '';
            }
        });
    }
})();
