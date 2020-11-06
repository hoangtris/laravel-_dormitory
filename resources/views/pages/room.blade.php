@extends('master')

@section('content')
<div class="container my-5 py-5 z-depth-1">
      <!--Section: Content-->
      <section class="">
        <!-- Section heading -->
        <h3 class="font-weight-bold mb-5 text-center">Chi tiết phòng #{{ $room->id }}
          @if($room->status == 2)
            <span class="badge badge-danger">Phòng này đã được thuê</span>
          @endif
        </h3>
        <div class="row">
          <div class="col-lg-6 mr-3">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb1" class="carousel slide carousel-fade carousel-thumbnails mb-5 pb-4" data-ride="carousel">
              <!--Slides-->
              <div class="carousel-inner text-center text-md-left" role="listbox">
                <div class="carousel-item active">
                  <img src="
                  @if(strstr($room->image,'http'))
                  	{{ $room->image }}
                  @else
                  	{{ asset('image/'.$room->image) }}
                  @endif
                  " alt="" height="550px">
                </div>
              </div>
              <!--/.Slides-->
            </div>
            <!--/.Carousel Wrapper-->
          </div>

          <div class="col-lg-5 text-center text-md-left">

            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">Phòng số #{{ $room->id }}  
            @can('RoomManager')
              <span class="badge badge-success">Sửa phòng</span>
            @endcan     
            </h2>

            <h4 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
              <span class="red-text font-weight-bold">
                <strong>{{ number_format($room->price) }}</strong>
              </span>
            </h4>

            <div class="font-weight-normal">
            <p>{{ $room->short_description }}</p>
            <p><strong>Sức chứa: </strong>{{ $room->capacity }} người</p>
            <p><strong>Khu vực: </strong>
              @foreach($areas as $kv)
                @if($room->id_area == $kv->id)
                  {{ $kv->name }}
                @endif
              @endforeach
            </p>
            <p><strong>Loại phòng: </strong>
              @foreach($typesRoom as $kv)
                @if($room->id_type == $kv->id)
                  {{ $kv->name }}
                @endif
              @endforeach
            </p>
            <p><strong>Thời hạn: </strong>{{ $room->duration }} ngày</p>

              <div class="mt-5">
                <p class="grey-text"><strong>Thời hạn muốn thuê</strong></p>
                <form action="{{ route('checkout', $room->id) }}" method="post" class="ml-3">  
                  @csrf
                    <div class="row text-center text-md-left">
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <input class="form-check-input" name="duration" type="radio" checked="checked" value="1">
                          <label for="radio100" class="form-check-label dark-grey-text">1 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <input class="form-check-input" name="duration" type="radio" value="3">
                          <label for="radio100" class="form-check-label dark-grey-text">3 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-check-input" name="duration" type="radio" value="6">
                          <label for="radio101" class="form-check-label dark-grey-text">6 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-check-input" name="duration" type="radio" value="12">
                          <label for="radio102" class="form-check-label dark-grey-text">1 năm</label>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-3 mb-4">
                      <div class="col-md-12 text-center text-md-left text-md-right">
                          @if(Auth::check())
                              @if($roomOfCustomer != null)
                                  <a class="btn btn-warning btn-rounded mb-2"> Bạn đã có phòng</a>
                                  <br>
                                  <small>Nếu bạn thích phòng này, vui lòng hủy phòng để tiếp tục</small>
                              @elseif($room->status == 2)
                                  <a class="btn btn-danger btn-rounded"> Phòng này đã được thuê</a>
                              @else
                                  @can('Admin')
                                    <a class="btn btn-warning btn-rounded"> Admin không được đặt phòng</a>
                                  @elsecan('RoomManager')
                                    <a class="btn btn-warning btn-rounded"> Quản lí phòng không được đặt phòng</a>
                                  @elsecan('Cashier')
                                    <a class="btn btn-warning btn-rounded"> Thu ngân không được đặt phòng</a>
                                  @else
                                    <input type="hidden" name="id_phong" value="{{ $room->id }}">
                                    <input type="submit" name="book" value=" Đặt phòng" class="btn btn-outline-primary">
                                  @endcan
                              @endif
                          @elseif($room->status == 2)
                              <a class="btn btn-danger btn-rounded"> Phòng này đã được thuê</a>
                          @else
                              <a href="{{ route('login') }}" class="btn btn-secondary btn-rounded">Vui lòng đăng nhập để đặt phòng</a>
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
                <p>{{ $room->long_description }}</p>
              </div>
              <div id="menu1" class="container tab-pane fade"><br>
                @foreach($typesRoom as $kv)
                  @if($room->id_type == $kv->id)
                    <p>{!! $kv->description !!}</p>
                  @endif
                @endforeach
              </div>
              <div id="menu2" class="container tab-pane fade"><br>
                {{ $room->note }}
              </div>
              <div id="menu3" class="container tab-pane fade"><br>
                  <div class="card-body">
                    @forelse($reviews as $dg)
                        <div class="media p-3">
                          <img src="
                              @foreach($users as $tk)
                                @if($dg->user_id == $tk->id)
                                  {{ $tk->avatar }}
                                @endif
                              @endforeach
                          " alt="avatar" class="mr-3 mt-3 rounded-circle" width="70px" height="70px">
                          <div class="media-body">
                            <h5>
                              @foreach($users as $tk)
                                @if($dg->user_id == $tk->id)
                                  {{ $tk->name}}
                                @endif
                              @endforeach <small><i>Đánh giá vào {{ date_format(date_create($dg->created_at),'d-m-Y H:i:s') }}</i></small></h5>
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
        </div>
      </section>
      <!--Section: Content-->
</div>
@endsection