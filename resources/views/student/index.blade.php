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
								<h3 class="page-title">All Student List</h3>
								
							
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>S/L</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Location</th>
													<th>Photo</th>
													<th>action</th>
												</tr>
											</thead>
											<tbody>
@foreach ($data as $student )
<tr>
	<td>{{ $loop->iteration }}</td>
	<td>{{$student->name}}</td>
	<td>{{$student->email}}</td>
	<td>{{$student->phone}}</td>
	<td>{{$student->location}}</td>
	<td><img style="width: 50px" src="{{ asset('studentPhoto/'.$student->photo) }}" alt=""></td>
	<td>
		<a class="btn btn-success"  href="{{ route('student.show', $student->id) }}">view</a>
		<a class="btn btn-warning"  href="#">edit</a>
		
		<div class="del d-inline-block">
			<form action="{{ route('student.destroy',$student->id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger d-inline-block">delete</button>
			</form>
		</div>
	</td>
	
</tr>
	
@endforeach

												
											
											</tbody>
										</table>
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