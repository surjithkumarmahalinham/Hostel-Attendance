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
                                <h4 class="card-title">Report </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table display dataTablesCard order-table shadow-hover card-table text-black dataTable no-footer">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Room</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($attendance)) : ?>
                    <?php foreach ($attendance as $i => $record) : ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?php echo $record['student_name']; ?></td>
                            <td><?php echo $record['room_name']; ?></td>
                            <td>
                                <span class="badge badge-<?= ($record['status'] == '1') ? 'success' : 'danger'; ?>">
                                    <?= strtoupper($record['status']); ?>
                                </span>
                            </td>
                            <td><?= date('d-m-Y', strtotime($record['created_on'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">No Attendance Records Found</td>
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