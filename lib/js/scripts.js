/*function toClipboard(text) {
  
  if (window.clipboardData) {
  	window.clipboardData.setData("Text",text);
  }
  
}*/

$(document).ready(function(){	
	$('#footer a:not(.copyright)').click(function(evt){
		evt.preventDefault();
		var t = jQuery(this);
		var src = t.attr('href');
		var url = 'ajax/help.php ' + src;
		
		jQuery('#modal').load(url, function(d){
			jQuery(this).dialog({
				'width': 700, 
				'modal': true,
			});
		});
	});

	jQuery('input.submit').click(function(evt){
		evt.preventDefault();
		
		var btn = jQuery(this);

		btn.val('Generating').addClass('disabled');

		//action URL - requires l (length), k (key) and s (salt)
		var url = 'api/?l='+ parseInt(jQuery('.strlen').val()) + '&s='+ jQuery('.strsalt').attr('placeholder') + '&k=SAMPLE_KEY';

		jQuery.get(url, function(d){
			jQuery('#genpw').fadeOut().remove();
			btn.val('Generate Again').removeClass('disabled');

			if(typeof d === 'string'){
				var obj = JSON.parse(d);
				var output = null;

				//build the output string
				output = '<ul id="genpw"><li><a>Your '+ obj.Length +' digit password is: <strong>'+ obj.StringResult +'</strong></a></li></ul>';

				//replace the old salt with a new one
				jQuery('.strsalt').attr('placeholder', obj.NewSalt);

				//write to the page
				jQuery(output).fadeIn().insertAfter(jQuery('.options'));
			}
		}).error(function(d){
			jQuery('#genpw').text('An error occurred, please try again.');
		});
	});
});