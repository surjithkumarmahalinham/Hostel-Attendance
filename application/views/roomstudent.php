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
                                <h4 class="card-title"><span class="badge badge-primary"><?php echo $roomname->room_name; ?></span> Student List </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="get_my_hostel" class="table display dataTablesCard order-table shadow-hover card-table text-black dataTable no-footer">
                                        <thead>
                                            <tr>
                                            <th>Sno</th>
                                            <th>Student Name</th>
                                            <th>Admission No</th>
                                            <th>Hostel Name</th>
                                            <th>Room Name</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($studentList) && !empty($studentList)) : ?>
                                                <?php foreach ($studentList as $i => $std) : ?>
                                                    <tr>
                                                        <td><?= $i + 1; ?></td>
                                                        <td><?php echo $std['student_name']; ?></td>
                                                        <td><?php echo $std['ad_no']; ?></td>
                                                        <td><?php echo $std['hostel_name']; ?></td>
                                                        <td><?php echo $std['room_name']; ?></td>
                                                        <td id="attendance-buttons-<?= $std['id']; ?>"><a href="javascript:void(0);" 
                                                                class="btn btn-success mark-attendance" 
                                                                onclick="markAttendance(<?= $std['id']; ?>, '1')">
                                                                    <i class="fa fa-check"></i>
                                                                </a>

                                                                <a href="javascript:void(0);" 
                                                                class="btn btn-danger mark-attendance" 
                                                                onclick="markAttendance(<?= $std['id']; ?>, '0')">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                </td>
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
</div>

<?php include('layouts/footer.php'); ?>
<script>
        function markAttendance(student_id, status) {
        $.ajax({
            url: "<?= base_url('attendance_store'); ?>", // Adjust for CI3 or CI4
            type: "POST",
            data: { student_id: student_id, status: status },
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    alert("Attendance marked successfully!");
                    $("#attendance-buttons-" + student_id).html('<span class="badge badge-' + 
                        (status === 'present' ? 'success' : 'danger') + '">' + status.toUpperCase() + '</span>');
                } else {
                    alert("Error marking attendance!");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }
    </script>