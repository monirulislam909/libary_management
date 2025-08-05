@extends('layouts.app')

@section('main')
<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			
			
			<!-- Sidebar -->
         
			
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Student Form</h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Create Student</h4>
                                    @if (session('success'))
                                        {{ session('success') }}
                                    @endif
								</div>
								<div class="card-body">
									<form action="{{ route('student.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> Name</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="name" value="{{ $data->name }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Email Address</label>
											<div class="col-lg-9">
												<input type="email" class="form-control" name="email"value="{{ $data->email }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Phone</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="phone"value="{{ $data->phone }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Location</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="location"value="{{ $data->location }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Photo</label>
											<div class="col-lg-9">
												<input type="file" class="form-control" name="photo">
                                                <img style="width: 100px" src="{{ asset('studentPhoto/'.$data->photo) }}" alt="">
											</div>
										</div>
										
										
										<div class="text-right">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					</div>
					
						
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
@endsection