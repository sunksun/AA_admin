<?php
    $name = $_POST['name'];
    $description = $_POST['description'];
?>

<form action="adviser_approve_save.php" method="post">
<div id="modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header bg-header-modals">
              <h4 class="modal-title " id="myModalLabel2">ตัวอย่าง bootstrap-modals-variables</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             
          </div>
          <div class="modal-body">
				  
                <div class="row p-l-20 p-r-10">

                    <div class="col-sm-12 col-md-12 col-lg-12">
						<label class="">Name :</label>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <!-- แสดงผลตัวแปร name -->
                        <input type="input" name="name" value="<?=$name;?>" class="form-control">
                    </div>	
                    
					<div class="col-sm-12 col-md-12 col-lg-12">
						<label class="">Description :</label>
                    </div>
                    <!-- แสดงผลตัวแปร description -->
					<div class="col-sm-12 col-md-12 col-lg-12 form-group">
                        <input type="input" name="description" value="<?=$description;?>" class="form-control">
					</div>
                </div>
              
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-info">บันทึก</button>
          </div>

      </div>
    </div>
  </div>
</form>
