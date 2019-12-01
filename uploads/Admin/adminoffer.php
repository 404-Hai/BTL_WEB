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
    <h1 class="text-center">Quản lý tất cả ưu đãi</h1>
    <h4 class="text-right"><a href="adminaddoffer.php" class="btn btn-success h-100"> <i class="fab fa-buffer"></i>
            <br> <span>Add New Offer</span></a></h4>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên ưu đãi</th>
                    <th scope="col">Giảm giá hoặc quà tặng</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
				require_once("../conn.php");
				$sql = "SELECT room.image,offer.name,offer.price,offer.description, offer.amount
						FROM room, offer where room.name = offer.name ";
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
							<td><?php echo $row["amount"]?></td>
							<td>
								<a href="#"><i class="fas fa-cog"></i></a> | <a href="../Controller/deleteoffer.php?id=<?php echo $row["id"] ?>" class="delete" 
									data-target="#deleteModal"><i class="fas fa-trash"></i></a>

							</td>
						</tr>
				<?php 
					}
				}
				?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->



<!-- /Modal -->


<script>
    // $('#deleteModal').on('show.bs.modal', function (e) {
    //     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    // });

    // $('#deleteModal').on('show.bs.modal', function (e) {
    //     $(".delete").live('click', function (event) {
    //         $(this).closest('tr').remove();
    //     });
    // });
</script>