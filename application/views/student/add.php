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
          <h1 class="h3 mb-2 text-gray-800">Student</h1>
          <form method="post" action="<?php echo base_url().'student/add/';?>" enctype="multipart/form-data">
          	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
			 <input type="hidden" name="id" value="<?php echo !empty($studentdet->id)?$studentdet->id:''?>">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($studentdet->name)?$studentdet->name:'';?>">
			   
			  </div>

		      <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo !empty($studentdet->email)?$studentdet->email:'';?>">
			   
			  </div>

			   <div class="form-group">
			    <label for="exampleInputEmail1">Mobile</label>
			    <input type="text" maxlength="10" class="form-control onlynumber" name="mobile" placeholder="Enter Mobile" value="<?php echo !empty($studentdet->mobile)?$studentdet->mobile:'';?>">
			   
			  </div>
			  
			   <div class="form-group">
			    <label for="exampleInputEmail1">Department</label>
			    <input type="text" class="form-control" name="Dept" placeholder="Enter Department" value="<?php echo !empty($studentdet->Dept)?$studentdet->Dept:'';?>">
			   
			  </div>
			
			
			  <button type="submit" class="btn btn-primary">Submit</button>
		  </form>
      </div>