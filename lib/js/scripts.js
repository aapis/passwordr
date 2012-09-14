function toClipboard(text) {
  
  if (window.clipboardData) {
  	window.clipboardData.setData("Text",text);
  }
  
}

$(document).ready(function(){	
	$('a#info').click(function(){
		$("#changelogging").dialog({
			height: 500,
			width: 550,
			modal: true
		});
	});
	
	/*$('input.submit').click(function(){
		var $this = jQuery(this);
		
		$this.val('Loading!');
		$('#genpw').css({opacity: 0.3});
				
		$.ajax({
			type: 'POST',
			url: 'index.php',
			data: {
				password: $('.generated').val()
			},
			success: function(data){
				$this.val('Generate Again');
				$('#generatepw strong').text('PW_PLACEHOLDER');
				$('#generatepw').fadeIn().css({opacity: 1});
				//alert(data.password);
			},
			error: function(data){
				//alert(data);
			}
		});
		
		return false;
	});*/
});