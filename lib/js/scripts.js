function toClipboard(text) {
  
  if (window.clipboardData) {
  	window.clipboardData.setData("Text",text);
  }
  
}

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
});