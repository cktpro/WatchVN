<nav class="menu navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">TRANG CHỦ</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<?php 
				include('connect.php');
				$sl="select * from menu_ngang";
				$exec= mysqli_query($connect, $sl);
				while($row=mysqli_fetch_array($exec)){
				?>
				<li><a href="?menu=<?php echo $row['loaimenu']; ?>"><?php 
				echo $row['title']; ?></a></li>
				<?php } ?>
				<li>
					<!-- Test -->
            <!-- <?php 
			include('connect.php');
			$sl= "select * from menu_doc";
			$exec= mysqli_query($connect,$sl);
			$i=0;
			while($row= mysqli_fetch_array($exec)){
				$i=$i+1;
				switch($i){
					case 1: $num= "One"; break;
					case 2: $num= "Two"; break;
					case 2: $num= "Three"; break;
					case 3: $num= "Four"; break;
					case 4: $num= "Five"; break;
					case 5: $num= "Six"; break;
				}
		?>

                            <a data-toggle="collapse" style="text-decoration: none;" data-parent="#accordion" href="#collapse<?php echo $num; ?>"><?php echo $row['title'];  ?></a>
 
                    <div id="collapse<?php echo $num; ?>" class="panel-collapse collapse out">
                        <div class="panel-body">
                            <table class="table">
                            <?php if($row['sub_1']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_1_link'].">".$row['sub_1']."</a>
                                    </td>
                                </tr>";}
                            ?>
                            <?php if($row['sub_2']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_2_link'].">".$row['sub_2']."</a>
                                    </td>
                                </tr>";}
                            ?>
                            <?php if($row['sub_3']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_3_link'].">".$row['sub_3']."</a>
                                    </td>
                                </tr>";}
                            ?>
                            <?php if($row['sub_4']!=""){echo "    
                                <tr>
                                    <td>
                                        <a href=".$row['sub_4_link'].">".$row['sub_4']."</a>
                                    </td>
                                </tr>";}
                            ?>
                            </table>
                        </div>
                </div>
                <?php } ?>
            </div> -->
		<!-- Endtest -->
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
		
	</div>
</nav>