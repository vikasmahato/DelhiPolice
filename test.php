<!DOCTYPE html>
<html>
<head>
<script type='text/javascript'
  src='http://code.jquery.com/jquery-git2.js'></script>
<script type='text/javascript'
  src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.0/bootstrap.min.js"></script>
<script type='text/javascript'
  src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<style type='text/css'>
@import url('http://getbootstrap.com/dist/css/bootstrap.css');

  url('http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker.css')
  ;
</style>
<script type='text/javascript'>
$(window).load(function(){
    $('.input-daterange').datepicker({});
});
</script>
</head>
<body>
  <div class="container">
      
      <form action ="" method="POST">
<button class='btn btn-danger btn-xs' type="submit" name="approve_btn" value="delete"><span class="fa fa-times"></span> delete</button>
</form>

      
      <div id="approveModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirm action</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to perform this action?
      </div>
     <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-primary" id="approve">Approve</button>
    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
  </div>
    </div>
  </div>
</div>
   <div class="row">
      <div class="col-md-5">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="inputComment" class="col-sm-3 control-label">Comments</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputComment"
                    placeholder="Comment" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label">Dates range</label>
                <div class="col-sm-9">
                  <div class="input-daterange" id="datepicker">
                    <div class="input-group">
                      <input type="text" class="input-small form-control"
                        name="start" /> <span class="input-group-addon">to</span> <input
                        type="text" class="input-small form-control" name="end" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-success">Approve</button>
                    <button type="submit" class="btn btn-danger">Deny</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
     
    </div>
  </div>
    
<script type='text/javascript'> 
    $('button[name="approve_btn"]').on('click', function(e){
    var $form=$(this).closest('form'); 
    e.preventDefault();
    $('#approveModal').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#approve', function() {
            $form.trigger('submit'); // submit the form
        });
        // .one() is NOT a typo of .on()
});
    </script>   
    
</body>
</html>