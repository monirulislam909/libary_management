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
													<th>Title</th>
													<th>Author</th>
													<th>ISBN</th>
													<th>Copy</th>
													<th>availableCopy</th>
													<th>Cover</th>
													<th>action</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($data as $book )
													
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td>{{$book->title}}</td>
													<td>{{$book->author}}</td>
													<td>{{$book->isbn}}</td>
													<td>{{$book->copies}}</td>
													<td>{{$book->availableCopy}}</td>
													<td><img style="width: 50px" src="{{ asset('bookPhoto/'.$book->cover) }}" alt=""></td>
													<td>
	 												<a class="btn btn-success"  href="#">view</a>
	 												<a class="btn btn-warning"  href="#">edit</a>
	 												<a class="btn btn-danger" href="#">delete</a>
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