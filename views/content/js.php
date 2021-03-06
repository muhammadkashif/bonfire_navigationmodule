$.subscribe('list-view/list-item/click', function(id) {
	$('#content').load('<?php echo site_url(SITE_AREA.'/content/navigation/edit') ?>/'+ id);
});
$(function() {
	$( ".sortable" ).sortable({
		update: update_order,
		placeholder: "ui-state-highlight"
	}).disableSelection();
});

function update_order(event, ui) {
	order = new Array();
	$('tr', this).each(function(){
		order.push( $(this).find('input[name="action_to[]"]').val() );
	});
	order = order.join(',');

	$.post('<?php echo site_url(SITE_AREA . '/content/navigation/ajax_update_positions');?>', { order: order }, function() {
		$('tr').removeClass('alt');
		$('tr:even').addClass('alt');
	});
}