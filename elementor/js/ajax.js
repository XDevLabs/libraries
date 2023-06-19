(function ($){
    'use strict';

    $(document).ready(function ($) {
        $('.post-list__loadmore a').click(function(event) {
            event.preventDefault()
            var parent = $(this).closest('.post-list'),
            page = parent.data('page'),
            limit = parent.data('limit'),
            total = parent.data('total'),
            post_type = parent.data('type'),
            show_excerpt = parent.data('excerpt'),
            show_cats = parent.data('cats'),
            show_read_more = parent.data('readmore');

            page++;

            var data = {
                action: 'load_more_posts',
                page: page,
                limit: limit,
                post_type: post_type,
                show_excerpt: show_excerpt,
                show_cats: show_cats,
                show_read_more: show_read_more
            };
    
            $.ajax({
                url: ajax_settings.ajax_url,
                type: 'POST',
                data: data,
                success: function(response) {
                    parent.find('#post-list__response').append(response);
                    parent.attr('data-page', page)

                    if ( total <= limit * page ) {
                        parent.find('.post-list__loadmore').hide()
                    }
                }
            });
        });
    })
})(jQuery)