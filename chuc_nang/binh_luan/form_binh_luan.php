	<?php 
	include('connect.php'); 
	$masp=$_GET['masp'];
	$sql= "select count(id_bl) from binh_luan where masp='".$masp."'";
	$execc= mysqli_query($connect, $sql);
	$row=mysqli_fetch_array($execc);
	?>
<div class="comment-vote">
					<div class="comment-vote__star">
						<div class="comment-vote__star-number">5/5</div>
						<div class="comment-vote__star-star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="comment-vote__star-total">
							<p><?php echo $row['count(id_bl)'] ?> đánh giá và hỏi đáp</p>
						</div>
					</div>
				</div>
				<div class="comment-form">
					<form action="?menu=exec_binh_luan" method="post">
						<div class="product-rating">
							<p class="mb-0">Bạn chấm sản phẩm này bao nhiêu sao? </p>
							<div class="form-group" id="rating-ability-wrapper">
									<input type="hidden"  name="masp" value="<?php echo $masp ?>">
									<input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
								<h2 class="bold rating-header" style="">
									<span class="selected-rating">0</span><small> / 5</small>
								</h2>
								<i  class="fa start fa-star-o" data-attr="1" id="rating-star-1"></i>
								<i  class="fa start fa-star-o" data-attr="2" id="rating-star-2"></i>
								<i  class="fa start fa-star-o" data-attr="3" id="rating-star-3"></i>
								<i  class="fa start fa-star-o" data-attr="4" id="rating-star-4"></i>
								<i  class="fa start fa-star-o" data-attr="5" id="rating-star-5"></i>
							</div>
						</div>
						<div class="comment-content-text">
							<textarea name="content" id="content" placeholder="Mời bạn để lại đánh giá,bình luận (Vui lòng nhập tiếng việt có dấu)"></textarea>
						</div>
	<!-- 					<div class="comment-name-and-email">
							<input type="text" name="name" id="name" placeholder="Họ và Tên...">
							<input type="text" name="phone" id="phone" placeholder="Số siện thoại">
							<input type="email" name="email" id="email" placeholder="Email">
						</div> -->
						<div class="comment-btn">
							<input type="submit" class="btn btn-primary float-right" value="Gửi">
						</div>
					</form>
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