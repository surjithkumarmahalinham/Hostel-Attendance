<?php include('layouts/master.php'); ?>

        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
			
           
				<div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
					<h2 class="mb-3 me-auto">Hostel Management</h2>
					<div>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="javascript:void(0)">Home
                                </a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						</ol>
					</div>
				</div>
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <h4 class="card-title">Attendance List </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="get_my_hostel" class="table display dataTablesCard order-table shadow-hover card-table text-black dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Room</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($attendance) && !empty($attendance)) : ?>
                                                <?php foreach ($attendance as $i => $atten) : ?>
                                                    <tr>
                                                        <td><?= $i + 1; ?></td>
                                                        <td><?php echo $atten['room_name']; ?></td>
                                                        <td><a href="<?php echo base_url();?>roomstudent/<?= $atten['id']; ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="3" class="text-center">No Hostels Found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
					
				</div>

</div>
</div>

<?php include('layouts/footer.php'); ?>