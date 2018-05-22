<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Login System</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="<?php echo base_url(); ?>assets/back_end/img/caretutors_logo.png" rel="shortcut icon" type="image/x-icon" />

    <link href="<?php echo base_url(); ?>assets/back_end/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/back_end/css/admin_index.css" rel="stylesheet" type="text/css">

    <!-- JS -->
    <script src="<?php echo base_url(); ?>assets/back_end/js/sweetalert.min.js" type="text/javascript" language="javascript"></script>

    <script src="<?php echo base_url(); ?>assets/back_end/js/notify.min.js" type="text/javascript" language="javascript"></script>

    <link href="https://fonts.googleapis.com/css?family=Arvo|Dosis|Exo+2" rel="stylesheet">
</head>
<body>

<!-- Alert Section -->
<?php
    $login  = $this->session->userdata('login');
    $this->session->unset_userdata('login');
    if($login == 'Fail'):
      echo '
        <script type="text/javascript">
            swal({title:"Your Data Is Invalid!!!", icon:"warning", button:true});
        </script>
      ';
    endif; 
?>

<!--LOG IN SECTION-->
    
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h1>CARETUTORS.COM</h1>
                        <small>A Web Application</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-lg-6 div_center">                  
                        <div class="log_in_wrap">
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('App/login'); ?>" enctype="multipart/form-data">
                                <div class="col-md-12 form-group">
                                    <label for="email" class="control-label">User Name</label>
                                    <input type="text" class="form-control prompt" name="usr_name" id="usr_name" value="" required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control prompt" name="password" id="password" value="" required>
                                </div>

                                <div class="col-md-12 form-group text-center">
                                    <button type="submit" class="btn btn-success s_btn">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  

            </div>
        </div>
    </div>

<!--END LOG IN & REGISTER SECTION-->

</body>
</html>                
