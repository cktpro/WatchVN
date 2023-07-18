 <link rel="stylesheet" type="text/css" href="bootstraps.min.css" />
<script src="js/jquery.slim.mins.js"></script>
    <script src="js/popper.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="form-group" id="rating-ability-wrapper">
	    <label class="control-label" for="rating">
	    <span class="field-label-header">How would you rate your ability to use the computer and access internet?*</span><br>
	    <span class="field-label-info"></span>
	    <input type="text" id="selected_rating" name="selected_rating" value="" required="required">
	    </label>
	    <h2 class="bold rating-header" style="">
	    <span class="selected-rating">0</span><small> / 5</small>
	    </h2>
	    <i  class="fa start fa-star-o" data-attr="1" id="rating-star-1"></i>
	    <i  class="fa start fa-star-o" data-attr="2" id="rating-star-2"></i>
	    <i  class="fa start fa-star-o" data-attr="3" id="rating-star-3"></i>
	    <i  class="fa start fa-star-o" data-attr="4" id="rating-star-4"></i>
	    <i  class="fa start fa-star-o" data-attr="5" id="rating-star-5"></i>
	</div>
<script>
		jQuery(document).ready(function($){
	    
	$(".fa").on('click',(function(e) {
	
	var previous_value = $("#selected_rating").val();
	
	var selected_value = $(this).attr("data-attr");
	$("#selected_rating").val(selected_value);

	$(".selected-rating").empty();
	$(".selected-rating").html(selected_value);
	
	for (i = 1; i <= selected_value; ++i) {
	$("#rating-star-"+i).toggleClass('fa-star-o');
	$("#rating-star-"+i).toggleClass('fa-star');
	}
	
	for (ix = 1; ix <= previous_value; ++ix) {
	$("#rating-star-"+ix).toggleClass('fa-star');
	$("#rating-star-"+ix).toggleClass('fa-star-o');
	}
	
	}));
	
		
});
</script>