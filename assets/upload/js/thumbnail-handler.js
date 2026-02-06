jQuery(document).ready(function($) {
    // Handle thumbnail clicks for product image gallery
    $(document).on('click', '.e_magnifier-27 .thumbnail_box .static-img', function() {
        var $thumbnail = $(this);
        var $thumbnailBox = $thumbnail.closest('.thumbnail_box');
        var imageUrl = $thumbnail.find('.small-img').data('url');
        var index = $thumbnail.index();
        
        // Remove active class from all thumbnails
        $thumbnailBox.find('.static-img').removeClass('active');
        
        // Add active class to clicked thumbnail
        $thumbnail.addClass('active');
        
        // Update main image
        var $magnifier = $thumbnail.closest('.e_magnifier-27');
        var $imagesCover = $magnifier.find('.images-cover');
        
        // Hide all images and show the selected one
        $imagesCover.find('.image-item').hide();
        $imagesCover.find('.image-item').eq(index).show();
    });
    
    // Set first thumbnail as active on page load
    $('.e_magnifier-27 .thumbnail_box .static-img:first').addClass('active');
    
    // Show first image on page load
    $('.e_magnifier-27 .images-cover .image-item:first').show();
});
