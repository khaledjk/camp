@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Schedule activities</h1>
          <p>View All your Kids.. </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">schedule Activity</a></li>
        </ul>
      </div>

       <div class="row">

<div class="container">
	<div class="row">
		<section class="content">
				
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="pull-right">
						
						</div>
						<div class="table-container">
							<table class="table table-filter">
								<tbody>
									@foreach($schedules as $schedule)
									<tr data-status="pagado">
										
										<td>
											<a href="javascript:;" class="star">
												<i class="glyphicon glyphicon-star"></i>
											</a>
										</td>
										<td>
											<div class="media">
												<a href="#" class="pull-left">
													<img src="{{asset('/image-project/group-image.jpg')}}" style=" width: 80px;height: 80px" class="media-photo">
												</a>
												<div class="media-body">

													<h4 class="title">
														<h4>{{$schedule->schedule_date}}</h4>
													
													</h4>
													<td><p><a href="{!! route('view_schedule', ['id'=>$schedule->id]) !!}" class="btn btn-secondary form-control form-group"><span class="glyphicon glyphicon-pencil"></span></a></p></td>

												</div>
											</div>
										</td>
									</tr>

										
								    @endforeach

																
								</tbody>
							</table>
						</div>
					</div>
					<td><p><a href="{!! route('add_schedule', ['id'=>$id]) !!}" class="btn btn-secondary form-control form-group">Add New Schedule</span></a></p></td>

				</div>
				<div class="content-footer">
					<p>
						Page © - 2018 <br>
						Powered By <a href="http://www.arcazur.com" target="_blank">Arcazur</a>
					</p>
				</div>
			</div>
		</section>
		
	</div>
</div>

@endsection