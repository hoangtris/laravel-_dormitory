@extends('master')

@section('content')
<div class="container my-2 py-5 z-depth-1">
	<!--Section: Content-->
	<section class="">
		<!-- Section heading -->
		<h3 class="font-weight-bold mb-5 text-center">Chi tiết phòng #{{ $room->id }}
			@if($room->status == 2)
			<span class="badge badge-danger">Phòng này đã được thuê</span>
			@endif
		</h3>
		<div class="row">
			<div class="col-xl-6 col-sm-6 col-12">
				<!--Carousel Wrapper-->
				<div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">
					<!--Slides-->
					<div class="carousel-inner text-center" role="listbox">
						<div class="carousel-item active">
							<img src="
							@if(strstr($room->image,'http'))
								{{ $room->image }}
							@else
								{{ asset('upload/room/'.$room->image) }}
							@endif
							" alt="" height="350px">
						</div>
					</div>
					<!--/.Slides-->
				</div>
				<!--/.Carousel Wrapper-->
			</div>

			<div class="col-xl-6 col-sm-6 col-12">

				<h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ">Phòng số #{{ $room->id }}    
				</h2>

				<h4 class="h3-responsive text-xl-left text-sm-left text-center mb-5 ">
					<span class="red-text font-weight-bold">
						<strong>{{ number_format($room->price) }}</strong>
					</span>
				</h4>

				<div class="font-weight-normal">
					<p>{!! $room->short_description !!}</p>
					<p><strong>Sức chứa: </strong>{{ $room->capacity }} người</p>
					<p><strong>Khu vực: </strong> {{ $room->area->name }} </p>
					<p><strong>Loại phòng: </strong> {{ $room->typeRoom->name }} </p>
					<p><strong>Thời hạn: </strong>{{ $room->duration }} ngày</p>

					<div class="mt-5">
						<form action="{{ route('checkout', $room->id) }}" method="post" class="ml-3">  
							@csrf
							<div class="row mt-3 mb-4">
								<div class="col-md-12 text-center text-md-left text-md-right">
									@if($allow == 1)
										<input type="hidden" name="id_phong" value="{{ $room->id }}">
										<input type="submit" name="book" value=" Đặt phòng" class="btn btn-outline-primary">
									@else
										@if($message == 'Vui lòng đăng nhập để đặt phòng')
											<a href="{{ route('login') }}" class="btn btn-secondary btn-rounded">{{ $message }}</a>
										@else
										<a class="btn btn-secondary btn-rounded">{{ $message }}</a>
										@endif
									@endif
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home">Mô tả chi tiết</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu1">Tiện nghi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu2">Ghi chú</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu3">Đánh giá</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
						<p>{!! $room->long_description !!}</p>
					</div>
					<div id="menu1" class="container tab-pane fade"><br>
						<p>{!! $room->typeRoom->description !!}</p>
					</div>
					<div id="menu2" class="container tab-pane fade"><br>
						{!! $room->note !!}
					</div>
					<div id="menu3" class="container tab-pane fade"><br>
						@if(Auth::check())
						<form action="{{ route('review.store') }}" method="post" class="mb-5">
							@csrf
							<label for="addReview">Nhập đánh giá</label>
							<textarea class="form-control" rows="5" name="content" required=""></textarea>
							<input type="hidden" name="room_id" value="{{ $room->id }}">
							<input type="submit" name="addReview" value="Gửi đánh giá" class="btn btn-success mt-2">
						</form>
						@else
							<p class="alert alert-warning">Vui lòng <a href="{{ route('login') }}" class="font-weight-bold alert-warning">đăng nhập</a> để đánh giá căn phòng này</p>
						@endif

						@forelse($reviews as $dg)
						<div class="media my-3">
							<img src="
							@if(strstr($dg->user->avatar,'https'))
								{{ $dg->user->avatar }}
							@else
								{{ asset('upload/avatar/'.$dg->user->avatar) }}
							@endif
							" alt="avatar" class="mr-3 mt-3 rounded-circle" width="70px" height="70px" style="object-fit: cover;">
							<div class="media-body">
								<h5>
									{{ $dg->user->name }}
									<small>
										<i>Đánh giá vào {{ date_format(date_create($dg->created_at),'d-m-Y H:i:s') }}</i>
									</small>
								</h5>
								<p class="text-break">{{ $dg->content }}</p>
							</div>
						</div>
						@empty
						<p>Chưa có đánh giá cho căn phòng này</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Section: Content-->
</div>
@endsection