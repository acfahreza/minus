<?php //include 'config/header.php'; ?>
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">

          <?php //include 'config/menu.php'; ?>
          
          <div class="col-xs-12 col-sm-9 content">
            
            <div class="panel panel-default">
              
              <div class="panel-body">
                <div class="content-row">
                  <h2 class="content-row-title"><?php echo $judul; ?></h2>
                  <div class="row">
                    <div class="col-md-12">
                     <?php include $konten.'.php'; ?>
                    </div>
                  </div>
                </div>

              </div><!-- panel body -->
            </div>

        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
    <?php //include 'config/footer.php'; ?>
    <script src="assets/bootstrap-datepicker.js"></script>
  
    <script type="text/javascript">
      $('.tgl').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                //startView: 2,
                todayBtn: true,
                todayHighlight: true,
                //clearBtn: true,
                language: 'id'
            });
  </script>