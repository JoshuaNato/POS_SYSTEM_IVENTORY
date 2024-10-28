<?php 
include("../server/connection.php");
include('../user/add.php');
include '../set.php';
	
?>

<style>
    input[type=checkbox] {
        -ms-transform: scale(1.3);
        -moz-transform: scale(1.3);
        -webkit-transform: scale(1.3);
        -o-transform: scale(1.3);
        transform: scale(1.3);
        padding: 10px;
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row mb-4 mt-4">
            <div class="col-md-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>List of Orders </b>
                        <span class="float:right">
                            <a class="btn btn-primary btn-sm col-sm-2 float-right" href="billing/index.php" id="new_order">
                                <i class="fa fa-plus"></i> New
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Order Number</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                $order = $conn->query("SELECT * FROM orders ORDER BY unix_timestamp(date_created) DESC");
                                while($row = $order->fetch_assoc()):
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++ ?></td>
                                    <td><p><?php echo date("M d,Y", strtotime($row['date_created'])) ?></p></td>
                                    <td><p><?php echo $row['amount_tendered'] > 0 ? $row['ref_no'] : 'N/A' ?></p></td>
                                    <td><p><?php echo $row['order_number'] ?></p></td>
                                    <td class="text-right"><p><?php echo number_format($row['total_amount'], 2) ?></p></td>
                                    <td class="text-center">
                                        <?php if($row['amount_tendered'] > 0): ?>
                                            <span class="badge badge-success">Paid</span>
                                        <?php else: ?>
                                            <span class="badge badge-primary">Unpaid</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="location.href='billing/index.php?id=<?php echo $row['id'] ?>'"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-sm btn-info view_order" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-sm btn-danger delete_order" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('table').dataTable();
    });
    $('.view_order').click(function(){
        uni_modal("Order Details", "view_order.php?id=" + $(this).attr('data-id'), "mid-large");
    });
    $('.delete_order').click(function(){
        _conf("Are you sure to delete this order?", "delete_order", [$(this).attr('data-id')]);
    });
    function delete_order(id){
        start_load();
        $.ajax({
            url: 'ajax.php?action=delete_order',
            method: 'POST',
            data: {id: id},
            success: function(resp){
                if(resp == 1){
                    alert_toast("Data successfully deleted", 'success');
                    setTimeout(function(){
                        location.reload();
                    }, 1500);
                }
            }
        });
    }
</script>