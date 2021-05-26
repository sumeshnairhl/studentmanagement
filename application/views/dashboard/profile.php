 <?php 
$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
);
?>
  <!-- Begin Page Content -->
        <div class="container-fluid">
        	<div class="errormsg">
        	  <?php echo validation_errors(); ?>
         	</div>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Update User</h1>
          <form method="post" action="<?php echo base_url().'dashboard/profile/'.$this->uri->segment(3);?>" enctype="multipart/form-data">
          	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
			  <div class="form-group">
			    <label for="exampleInputEmail1">First Name</label>
			    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?php echo $detail->first_name;?>">
			   
			  </div>

		      <div class="form-group">
			    <label for="exampleInputEmail1">Last Name</label>
			    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php echo $detail->last_name;?>">
			   
			  </div>

			   <div class="form-group">
			    <label for="exampleInputEmail1">Password</label>
			    <input type="password" class="form-control" name="password" placeholder="Enter Password" value="">
			   
			  </div>

			   <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" class="form-control" name="user_email" placeholder="Enter email" value="<?php echo $detail->user_email;?>">
			   
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">User Image</label>
				  <input type="file" class="form-control" name="user_image" accept="image/x-png,image/gif,image/jpeg" ><br>
			   	<?php 
			   	 if(!empty($detail->user_image))
			   	 {
			   	?>
			   		<img height="200px" width="200px" src="<?php echo base_url().'uploads/users/'.$detail->user_image;?>" >
			   	<?php 
			   	}
			   	?>
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Status</label>
				    <select class="form-control"  name="user_status">
				      <option <?php if($detail->user_status==1){echo " selected ";}?>value="1">Active</option>
				      <option <?php if($detail->user_status==0){echo " selected ";}?> value="0">In-Active</option>
				      
				    </select>
			   
			  </div>
			
			
			  <button type="submit" class="btn btn-primary">Submit</button>
		  </form>
      </div>