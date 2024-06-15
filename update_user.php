
<div class="modal fade in" id="update_modal<?php echo $fetch['borrow_id']?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form method="POST" action="adviser_approve_save.php?borrow_id=<?php echo $fetch['borrow_id']?>">
				<div class="modal-header">
					<h5 class="modal-title">รายการเบิกพัสดุฯ/ครุภัณฑ์และสารเคมี [<?php echo $fetch['borrow_id']?>]</h5>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<ul class="list-group list-group-flush">
							
						<?php
							$query2 = mysqli_query($conn, "SELECT * FROM borrow_list WHERE borrow_id = '$fetch[borrow_id]';") or die(mysqli_error($conn));
							$i = 1;
							while($fetch2 = mysqli_fetch_array($query2)){
						?>
						  <li class="list-group-item"><?php echo $i?>. <?php echo $fetch2['equ_list'] ?> จำนวน <?php echo $fetch2['num'] ?> <?php echo $fetch2['unit'] ?></li>
						<?php
							$i++;
							}
						?>
						</ul>					
					</div>
				</div>
				<div class="modal-footer">
					<button name="yes" class="btn btn-warning">รับทราบ/เห็นควรอนุมัติ</button>
					<button name="no" class="btn btn-warning">ไม่อนุมัติรายการ</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal">ปิด</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>