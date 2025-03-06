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
                                <h4 class="card-title">Student Create </h4>
                            </div>
                            <div class="card-body">
                            <form  action="<?php echo base_url('student-save'); ?>" method="post">

<div class="row" bis_skin_checked="1">
<div class="mb-3 col-md-6" bis_skin_checked="1">
        <label class="form-label">Admission No</label>
        <input type="text" name="ad_no" class="form-control" placeholder="Admission no">
    </div>
    <div class="mb-3 col-md-6" bis_skin_checked="1">
        <label class="form-label">Student Name</label>
        <input type="text" name="student_name" class="form-control" placeholder="Student name">
    </div>
</div>
<div class="row" bis_skin_checked="1">
<div class="mb-3 col-md-6" bis_skin_checked="1">
        <label class="form-label">Hostel</label>
        <select name="hostel_id" id="hostel_id" class="form-control" required>
                    <option value="">-- Select Hostel --</option>
                    <?php if (!empty($hostel)) : ?>
                        <?php foreach ($hostel as $hos) : ?>
                            <option value="<?php echo $hos['id']; ?>">
                                <?php echo $hos['hostel_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <option value="">No Hostels Found</option>
                    <?php endif; ?>
                </select>
</div>
<div class="mb-3 col-md-6" bis_skin_checked="1">
        <label class="form-label">Room</label>
        <select name="room_id" id="room_id" class="form-control">
                <option value="">-- Select Room --</option>
            </select>
</div>
</div>
<div class="mb-3 col-md-6" bis_skin_checked="1">
<button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <h4 class="card-title">Student List </h4>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($student) && !empty($student)) : ?>
                                                <?php foreach ($student as $i => $std) : ?>
                                                    <tr>
                                                        <td><?= $i + 1; ?></td>
                                                        <td><?php echo $std['student_name']; ?></td>
                                                        <td><?php echo $std['ad_no']; ?></td>
                                                        <td><?php echo $std['hostel_name']; ?></td>
                                                        <td><?php echo $std['room_name']; ?></td>
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
        $(document).ready(function() {
            $("#hostel_id").change(function() {
                var hostel_id = $(this).val();
                if (hostel_id !== "") {
                    $.ajax({
                        url: "<?= base_url('getroom'); ?>",
                        type: "GET",
                        data: { hostel_id: hostel_id },
                        dataType: "json",
                        success: function(response) {
                            $("#room_id").html('<option value="">-- Select Room --</option>');
                            $.each(response, function(index, room) {
                                $("#room_id").append('<option value="' + room.id + '">' + room.room_name + '</option>');
                            });
                        }
                    });
                } else {
                    $("#room_id").html('<option value="">-- Select Room --</option>');
                }
            });
        });
    </script>