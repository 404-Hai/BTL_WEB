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
    <h1 class="text-center">Quản lý lượt đặt phòng</h1>

    <div class="table-responsive">
        <table class="table table-hover ">
            <thead class="thead-dark">
                <tr>
                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Phòng</th>
                    <th>Số lượng phòng</th>
                    <th>Checkin</th>
					<th>Checkout</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
				require_once("../conn.php");
				$sql = "SELECT * FROM info";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
				
				?>		
						<tr class="item">
							<td><?php echo $row["nameuser"]?></td>
							<td><?php echo $row["email"]?></td>
							<td><?php echo $row["phone"]?></td>
							<td><?php echo $row["brand"]?></td>
							<td><?php echo $row["soluong"]?></td>
							<td><?php echo $row["checkin"]?></td>
							<td><?php echo $row["checkout"]?></td>
							
						</tr>
				<?php 
					}
				}
				?>
              
            </tbody>
        </table>
    </div>
</div>

<!-- Modal 

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
                <p>Bạn có chắc chắn muốn xoá order này ?</p>
            </div>
            <div class="modal-footer d-flex justify-content-center justify-content-lg-around">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

 /Modal -->