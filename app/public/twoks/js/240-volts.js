$(function() {
	$('a.panelControl').click(function() {
		$('div.panel').hide();
		$('div.panel.' + $(this).attr('rel')).show();
	});
});

