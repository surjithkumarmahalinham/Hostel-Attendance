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
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">
											<span class="font-w500 fs-16 d-block mb-2">Total Hostel
</span>
											<h2><?php echo $total->total_hostels; ?></h2>
										</div>	
										
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">Total Room
											<h2><?php echo $total->total_rooms; ?></h2>
										</div>	
										
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-sm-6">
								<div class="card">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="menu">
											<span class="font-w500 fs-16 d-block mb-2">Total Students
</span>
											<h2><?php echo $total->total_students; ?></h2>
										</div>	
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-xl-6">
							<div class="col-xl-12">
								<div class="card">
								
									<div class="card-body pb-2">
										<div class="tab-content">
											<div class="tab-pane fade show active" id="Monthly">
												<div id="chartTimeline1" class="chart-timeline"></div>
											</div>	
											<div class="tab-pane fade " id="Daily">
												<div id="chartTimeline2" class="chart-timeline"></div>
											</div>
											<div class="tab-pane fade " id="Today">
												<div id="chartTimeline3" class="chart-timeline"></div>
											</div>
										</div>
									</div>	
								</div>	
							</div>
					</div>
					
					
					
						</div>
					</div>
				</div>
				
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php include('layouts/footer.php'); ?>