<script>
	$(document).ready(function(){
		var hash = window.location.hash.substr(1);
		if(hash){
			$('.promolist__link[data-id="' + hash + '"]').click();
		} 
	});
</script>