/**
 * Author: Yraen Ironheart
 * Date: 4/08/12
 * Time: 9:15 PM
 *
 * Javascript for the live preview
 */
contentPreview = {

	/**
	 * Facade
	 *
	 * Sets overflow properties to match viewport height and
	 * loads an initial version of the current content setup
	 *
	 * Allows components to be sortable
	 */
	init: function() {
		$('ul#componentsEditable').sortable();

		contentPreview.setOverflow();

		$(window).resize(function() {
			contentPreview.setOverflow();
		});

		contentPreview.update();
	},

	/**
	 * Resize preview component so it fills the full height of the screen
	 * when starting, and when viewport is resized
	 */
	setOverflow: function() {
		$('.componentsEditablePreview').css('height', $(window).height());
	},

	/**
	 * Ajax in preview of current component setup
	 */
	update: function() {
		$.get('/admin/content/preview', function (responseData) {
			$('.componentsEditablePreview').html(responseData);
		});
	}
}
