jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var pageNum = parseInt(saaspik_ajax_portfolio.startPage) + 1;

	// The maximum number of pages the current query can return.
	var max = parseInt(saaspik_ajax_portfolio.maxPages);

	// The link of the next page of posts.
	var nextLink = saaspik_ajax_portfolio.nextLink;

	// More text.
	var more_text = saaspik_ajax_portfolio.more_text;

	// Loading text.
	var loading_text = saaspik_ajax_portfolio.loading_text;

	// End of post text.
	var end_text = saaspik_ajax_portfolio.end_text;

	/**
	 * Load new posts when the link is clicked.
	 */
	if(pageNum <= max) {
		$('#saaspik-load-portfolio-posts .pix-btn').on( "click", function() {

			// Show that we're working.
			$(this).text(loading_text);

			$.ajax({
				type: 'POST',
				url: location.href + 'page/' + pageNum + '/',
				success: function(data) {
					var result = $(data).find('.ajax-content .pixsass-portfolio-item');


					var $container = $('.pixsass-isotope');
					$container.isotope({
						itemSelector: '.pixsass-portfolio-item',
						layoutMode: 'masonry',
					});

					var $items = $(result);
					$container.append( $items );
					$container.isotope( 'appended', $items );
					$container.imagesLoaded().progress(function(){
						$container.isotope( 'layout' );
					});

					pageNum++;
					// Update the button message.
					if(pageNum <= max) {
						$('#saaspik-load-portfolio-posts .pix-btn').text(more_text);
					} else {
						$('#saaspik-load-portfolio-posts .pix-btn').css({'pointer-events': 'none','cursor': 'default'}).text(end_text);
					}
				}
			});

			return false;
		});

	} else {
		$('#saaspik-load-portfolio-posts .pix-btn').hide();
	}
});