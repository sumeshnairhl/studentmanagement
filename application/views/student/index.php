  <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php 
                      if(!empty($this->session->flashdata('successreg')))
                    {
                      ?>

                    <div class="alert alert-success" role="alert">
                          <?php echo $this->session->flashdata('successreg');?>
                    </div>
                    <?php 
                    }
                    ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Student Management</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Student Management</h6>
              <a href="<?php echo base_url().'student/add'?>">Add</a>
            </div>
            <br>

          
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Roll No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Created Date</th>
					  <th>Actions</th>
                    </tr>
                  </thead>
               
                  <tbody>
                  	<?php 

                  		foreach($listing as $listingval)
                  		{
                  		
                  	?>
                    <tr>
                      <td><?php echo $listingval['id'];?></td>
                      <td><?php echo $listingval['name'];?></td>
                      <td><?php echo $listingval['email'];?></td>
                       <td><?php echo $listingval['Dept'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($listingval['created_date']));?></td>
                      <td><a href="<?php echo base_url().'student/update/'.$listingval['id']?>">Edit</a> | <a href="<?php echo base_url().'student/delete/'.$listingval['id']?>" onclick="return confirm('Are you sure you want to Delete?')">Delete</a></td>
                    </tr>
                	<?php 
                		}
                	?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->