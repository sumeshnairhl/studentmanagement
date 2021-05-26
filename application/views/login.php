<?php 
$csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
);
?>


  <div class="container">
   
    <!-- Outer Row -->
    <div class="row justify-content-center">
      
      <div class="col-xl-10 col-lg-12 col-md-9">
         
    
      
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block "></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center errormsg">
                    <?php 
                      if(!empty($this->session->flashdata('errorreg')))
                    {
                      ?>

                    <div class="alert alert-danger" role="alert">
                          <?php echo $this->session->flashdata('errorreg');?>
                    </div>
                    <?php 
                    }
                    ?>
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                     <?php echo validation_errors(); ?>
                  </div>
                  <form class="user" method="post" action="<?php echo base_url().'login';?>">
                   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <div class="form-group">
                      <input type="email" name="emailuser" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="passworduser" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                   
                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                     
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url().'login/forgotpassword'?>">Forgot Password?</a>
                  </div>
              
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>