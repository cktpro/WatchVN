<table class="table">
					<tr>
						<td>
				<p class="alert alert-success">Chọn để đánh giá: </p></td>
						<td style="padding-left: 10px;">
							<form action="?menu=rate" method="post">
					<table width="200px">
						<tr width="8px">
						<input type="hidden" name="masp" value="<?php echo $_GET['masp']?>">
							<td><input type="radio" name="rate" id="rate1" value="1"></td>
							<td>
								<label for="rate1">
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="rate" id="rate2" value="2"></td>
							<td>
								<label for="rate2">
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="rate" id="rate3" value="3"></td>
							<td>
								<label for="rate3">
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="rate" id="rate4" value="4"></td>
							<td>
								<label for="rate4">
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="rate" id="rate5" value="5" checked="checked"></td>
							<td>
								<label for="rate5">
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
									<span class="fa" style="color: #E8EA1D; vertical-align: middle;"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-primary" type="submit" name="submit" value="Đánh giá"></td>
						</tr>
					</table>
				</form>
						</td>
					</tr>
				</table>