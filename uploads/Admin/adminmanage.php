<div class="manages">
        <h2>Thống kê thu nhập</h2>
        <div class="table-responsive-sm">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Tổng số lượt đặt phòng</th>
                        <th scope="col">Thu nhập</th>
                    </tr>
                </thead>
                <tbody>
              
                    <?php
						require_once("../conn.php");
						$sql = "SELECT SUM(price), COUNT(id_info) FROM info";
						$result = $conn->query($sql);
						$data = mysqli_fetch_row($result);
						//print_r($data);
						if ($result->num_rows > 0) {
							$sum = $data[0];
							$count = $data[1];
						?>		
								<tr class="item">
									<td><?php echo $count?></td>	
									<td><?php echo $sum?>$</td>	
								</tr>
						<?php 
							
						}
						?>
                </tbody>
            </table>
        </div>
    </div>	