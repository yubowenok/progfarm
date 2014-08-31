		<div class="header">
			<div class="container">
				<ul class="nav nav-tabs">

					<li><a href="index.php">Home</a></li>
					<li><a href="challenge.php">Challenges</a></li>
					<li><a href="shop.php">Shopping</a></li>
					
					<?php
					if($userid){
					echo "<li><a href='mine.php'>".$username."</a></li>";
				}
					else{
					echo "<li><a href='mine.php'>Mine</a></li>";
				}
					?>
					<li><a href="login.php"> Log In </a></li>
					<li><a href="logout.php"> Log Out </a></li>
					<li><a href="help.php"> Help </a></li>


				</ul>
			</div>
		</div>