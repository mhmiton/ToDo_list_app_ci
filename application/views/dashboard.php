<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>To-Do List App</title>
    <link href="<?php echo base_url(); ?>assets/back_end/img/caretutors_logo.png" rel="shortcut icon" type="image/x-icon" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/back_end/js/sweetalert.min.js" type="text/javascript" language="javascript"></script>

    <script src="<?php echo base_url(); ?>assets/back_end/js/notify.min.js" type="text/javascript" language="javascript"></script>

    <style type="text/css">
      .acc_btn{margin-bottom:3px;}  
    </style>

    <script type="text/javascript">
      (function(){
        var URL = {
          base_url:function(link=''){ return '<?php echo base_url(); ?>' + link; },
          site_url:function(link=''){ return '<?php echo site_url(); ?>' + link; }
        };
        window.URL = URL;
      }());
    </script>
  </head>
  <body>
    <!-- Alert Section -->
    <?php
        $msg   = $this->session->userdata('msg');
        $type  = $this->session->userdata('type');
        $this->session->unset_userdata(['msg','type']);

        if($msg && $type):
          echo '
            <script type="text/javascript">
                //swal({title:"'.$msg.'", icon:"'.$type.'", button:true});
                $.notify("'.$msg.'","'.$type.'");
            </script>
          ';
        endif; 
    ?>

    <div class="jumbotron text-center" style="width: 100%;">
      <h1 class="text-success">Building a To-Do List Application.</h1>
      <a class="btn btn-info" href="<?php echo site_url('App/logout'); ?>">Logout</a>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <button class="btn btn-success" id="modal_open" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"
            onclick="form_reset('form');"></i> Add New Task</button>
          <br><br><br>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <form name="form" id="form" action="<?php echo site_url('Crud/save'); ?>" method="post">
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title"><span class="change">Add</span> Task</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reset();">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label>Task Name</label>
                <input class="form-control" type="text" name="task_name" id="task_name" required>
              </div>
            </div>

            <div class="modal-footer">
              <span id="hide_input">
                <input type="hidden" name="id" id="id" value="">
              </span>

              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="form_reset('form');">Close</button>
              <button class="btn btn-info" type="submit" id="submit">Save</button>
            </div>

          </div>
        </div>
      </div>
    </form>

    <div class="container">
      <div class="row">
        <div class="col-md-12"> 
          <table id="dataTable" class="table table-responsive w-100 d-block d-md-table">
            <thead style="font-weight:bold;">
              <tr>
                <td scope="row" align="left" width="10%">SL</td>
                <td scope="row" align="left" width="65%">Task Name</td>
                <td scope="row" align="right" width="25%">Action</td>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($task_list as $key => $v): ?>
                <tr>
                  <td align="left"><?php echo $key+1; ?></td>
                  <td align="left"><?php echo $v->task_name; ?></td>
                  <td align="right">
                    <i class="btn btn-info fa fa-edit acc_btn edit_btn" data-id="<?php echo $v->id; ?>"></i>
                    <i class="btn btn-danger fa fa-trash acc_btn del_btn" data-id="<?php echo $v->id; ?>" data-href="Crud/task"></i>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/back_end/js/custom.js" type="text/javascript" language="javascript"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();

        $('.modal').modal({
            backdrop: 'static',
            keyboard: false,
            show: false
        });

        $('.edit_btn').click(function(){
          var id  = $(this).data('id');
          $.ajax({
            type:'POST',
            url:URL.site_url('Crud/task_edit'),
            data:{'id':id},
            dataType:'json',
            success:function(data)
            {
              $('#task_name').val(data.task_name);
              $('#id').val(data.id);

              $('#submit').text('Update');
              $('.change').text('Edit');
              $('#myModal').modal('show');
            }
          });
      });
    });
    </script>

    <br><br><br>
  </body>
</html>