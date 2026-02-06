// Magnifier jQuery Plugin - Handles product image carousel and zoom
(function($) {
    'use strict';
    
    $.fn.magnifier = function(options) {
        return this.each(function() {
            var $container = $(this);
            var $magnifier = $container.closest('.e_magnifier-27');
            
            // Initialize carousel functionality
            initCarousel($magnifier);
            
            // Initialize thumbnail clicks
            initThumbnailClicks($magnifier);
        });
    };
    
    function initCarousel($magnifier) {
        var $thumbnailBox = $magnifier.find('.thumbnail_box');
        var $thumbnails = $thumbnailBox.find('.static-img');
        var $btnLeft = $magnifier.find('.magnifier-btn-left');
        var $btnRight = $magnifier.find('.magnifier-btn-right');
        
        if (!$thumbnailBox.length || !$thumbnails.length) return;
        
        var thumbnailWidth = 102; // Width of one thumbnail including margin
        var visibleCount = 4; // Number of thumbnails visible at once
        var currentIndex = 0;
        var maxIndex = Math.max(0, $thumbnails.length - visibleCount);
        
        // Set initial position
        $thumbnailBox.css({
            'position': 'relative',
            'left': '0px',
            'transition': 'none'
        });
        
        // Update button states
        function updateButtons() {
            if (currentIndex <= 0) {
                $btnLeft.addClass('disabled').css('opacity', '0.5');
            } else {
                $btnLeft.removeClass('disabled').css('opacity', '1');
            }
            
            if (currentIndex >= maxIndex) {
                $btnRight.addClass('disabled').css('opacity', '0.5');
            } else {
                $btnRight.removeClass('disabled').css('opacity', '1');
            }
        }
        
        // Left button click handler
        $btnLeft.off('click').on('click', function(e) {
            e.preventDefault();
            if (currentIndex > 0) {
                currentIndex--;
                var newLeft = -(currentIndex * thumbnailWidth);
                $thumbnailBox.stop().animate({ left: newLeft + 'px' }, 300);
                updateButtons();
            }
        });
        
        // Right button click handler
        $btnRight.off('click').on('click', function(e) {
            e.preventDefault();
            if (currentIndex < maxIndex) {
                currentIndex++;
                var newLeft = -(currentIndex * thumbnailWidth);
                $thumbnailBox.stop().animate({ left: newLeft + 'px' }, 300);
                updateButtons();
            }
        });
        
        // Initialize button states
        updateButtons();
    }
    
    function initThumbnailClicks($magnifier) {
        var $thumbnails = $magnifier.find('.static-img');
        var $imagesContainer = $magnifier.find('.images-cover');
        var $imageItems = $imagesContainer.find('.image-item, .static-item');
        
        // Thumbnail click handler
        $thumbnails.off('click').on('click', function(e) {
            e.preventDefault();
            var index = $(this).index();
            
            // Remove active class from all thumbnails
            $thumbnails.removeClass('active');
            
            // Add active class to clicked thumbnail
            $(this).addClass('active');
            
            // Show corresponding main image
            if ($imageItems.length > 0) {
                $imageItems.css('display', 'none');
                $imageItems.eq(index).css('display', 'block');
            }
        });
        
        // Initialize: show first image and set first thumbnail as active
        if ($imageItems.length > 0) {
            $imageItems.css('display', 'none');
            $imageItems.first().css('display', 'block');
        }
        $thumbnails.first().addClass('active');
    }
    
    // Auto-initialize on document ready
    $(document).ready(function() {
        $('.e_magnifier-27[needjs="true"]').each(function() {
            $(this).find('.magnifier-container').magnifier();
        });
    });
    
})(jQuery);