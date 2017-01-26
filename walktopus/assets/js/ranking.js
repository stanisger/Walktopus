$(document).ready(function() {
	$('.rating').each(function(index, el) {
		var elements = $(el).find('.item_rating');
		var s = 0;

		$(elements).each(function(index, el) {
			if($(el).is(':checked')){
				s = $(this).val();
			}
		});

		$(elements).each(function(index, el) {
			$(el).removeClass('selected');
		});
		$(elements).each(function(index, el) {
			if(s >= index+1){
				$(el).addClass('selected');
			}
		});
	});

	$(document).on('click', '.item_rating', function(event) {
		event.preventDefault();
		var elements = $(this).parent('.rating').find('.item_rating');
		var s = $(this).val();

		if($(this).is(':checked')){
			$(elements).each(function(index, el) {
				$(this).removeClass('selected');
			});
			
			$(elements).each(function(index, el) {
				if(s >= index+1){
					$(this).addClass('selected');
				}
			});
		}
	});


});