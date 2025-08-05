@extends('layouts.app')

@section('main')
<!-- Main Wrapper -->
        <div class="main-wrapper">
		
	
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Book Form</h3>
								
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-xl-8 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Edit Book</h4>
                                    @if (session('success'))
                                        {{ session('success') }}
                                    @endif
								</div>
								<div class="card-body">
									<form action="{{ route('book.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
										<div class="form-group row">
											<label class="col-lg-3 col-form-label"> Title</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="title" value="{{ $data->title }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Author</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="author" value="{{ $data->author }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">isbn</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="isbn" value="{{ $data->isbn }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Copies</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="copies" value="{{ $data->copies }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">availableCopies</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="available_copy" value="{{ $data->available_copy }}">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Cover</label>
											<div class="col-lg-9">
												<input type="file" class="form-control" name="cover">
                                                <img style="width: 100px" src="{{ asset('bookPhoto/'.$data->cover) }}" alt="">
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