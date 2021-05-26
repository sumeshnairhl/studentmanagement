   
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
       

          <!-- Content Row -->
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
          <div class="row">

              <h3>Welcome to Dashboard  </h3>
                   
     
           
          </div>

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

     