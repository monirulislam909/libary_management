@extends('layouts.app')
@section('main')
	<!-- Main Wrapper -->
        <div class="main-wrapper d-flex justify-content-center " style="min-height: 100vh;">
		
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					
					
					<div class="row ">
						<div class="col-sm-12 justify-center">
                            
                                
                            
							<div class="card" style="width: 600px">
						<div class="card-header">
                            @if ($data->cover)
                                <img class="w-100 h-50" src="{{ asset('bookPhoto/'.$data->cover) }}" alt="">
                            @endif
                        </div>
                        <div class="card-body ">
                                    <h1>{{$data->title}}</h1>
                                    <h2>{{$data->author}}</h2>
                                    <h3>{{$data->isbn}}</h3>
									
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