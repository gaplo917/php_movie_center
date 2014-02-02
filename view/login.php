<?php   include (dirname(__FILE__).'/nav_bar.php'); ?>

 <body>
  <div class="container">
  	<div class="row">
  		<div class="col-md-4 col-md-offset-4">
  			<form role="form" method='post' action='<?php echo $_SERVER['PHP_SELF'] ?>'>
			  <div class="form-group">
			    <label for="name">User Name</label>
			    <input type="text" class="form-control" id='name' name='name' placeholder="Enter User Name">
			  </div>
			  <div class="form-group">
			    <label for="pwd">Password</label>
			    <input type="password" class="form-control" id='pwd' name='pwd' placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
  		</div>
	</div>
  </div>
  </body>