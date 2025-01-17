<?php
require_once("../Controller/checkSignin.php");
?>
<style>
    th,
    td {
        text-align: center;
    }

    .modal-confirm {
        color: #636363;
        width: 400px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
    }

    .modal-confirm .modal-header {
        border-bottom: none;
        position: relative;
        display: block;
    }

    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -10px;
    }

    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }

    .modal-confirm .modal-body {
        color: #999;
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
        padding: 10px 15px 25px;
    }

    .modal-confirm .modal-footer a {
        color: #999;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
        outline: none !important;
    }

    .modal-confirm .btn-info {
        background: #c1c1c1;
    }

    .modal-confirm .btn-info:hover,
    .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }

    .modal-confirm .btn-danger {
        background: #f15e5e;
    }

    .modal-confirm .btn-danger:hover,
    .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
</style>

<div class="container-fluid">
    <h1 class="text-center">Quản lý tất cả các phòng</h1>
    <div class="d-flex justify-content-end align-items-center">
        <h4 class="text-right mr-2"><a href="#" id="otherRoom" class="btn btn-info h-100"> <i
                    class="fas fa-door-closed"></i>
                <br> <span>Xem lượt đặt phòng </span></a></h4>
        <h4 class="text-right mr-2"><a href="adminaddroom.php" class="btn btn-success h-100"> <i
                    class="fas fa-door-open"></i>
                <br> <span>Thêm phòng mới</span></a></h4>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                   
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên Phòng</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Mô tả</th>
                  

                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
				require_once("../conn.php");
				$sql = "SELECT * FROM room";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
				
				?>		
						<tr class="item">
							<td><img src="/uploads/<?php echo $row["image"] ?>" style="max-height: 80px"></td>
							<td><?php echo $row["name"]?></td>
							<td><?php echo $row["price"]?></td>
							<td><?php echo $row["description"]?></td>
							<td>
								<a href="../Admin/adminaddroom.php?id=<?php echo $row["id"] ?>"><i class="fas fa-cog"></i></a> | <a href="../Controller/delete.php?id=<?php echo $row["id"] ?>" class="delete" 
									data-target="#deleteModal"><i class="fas fa-trash"></i></a>

							</td>
						</tr>
				<?php 
					}
				}
				?>
				
				<tr class="control" style="text-align: right; font-weight: bold; font-size: 17px">
					<td colspan="5">
						<p>Số lượng phòng: <?= $result->num_rows?></p>
					</td>
				</tr>
           
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<!--
<div id="deleteModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fas fa-minus-circle fa-5x" style="color: red;"></i>
                </div>
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xoá phòng này ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <a href="../Controller/delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
-->
<!-- /Modal -->


<script>
    $("#otherRoom").click(function (e) {
        e.preventDefault();
        $("#manage-order").click();
    });
</script>