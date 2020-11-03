@extends('master')

@section('content')
<div class="container my-5 py-5 z-depth-1">
      <!--Section: Content-->
      <section class="text-center">
        <!-- Section heading -->
        <h3 class="font-weight-bold mb-5">Chi tiết phòng #{{ $room->id }}</h3>
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
            <p><strong>Số lượng nhà vệ sinh: </strong>{{ $room->wc }}</p>
            <p><strong>An ninh: </strong>{{ $room->security }}</p>
            <p><strong>Tiện nghi: </strong>{{ $room->convenient }}</p>

              <div class="mt-5">
                <p class="grey-text"><strong>Thời hạn muốn thuê theo hợp đồng</strong></p>
                <form action="#" method="post" class="ml-3">  
                  @csrf
                    <div class="row text-center text-md-left">
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" checked="checked" value="1">
                          <label for="radio100" class="form-check-label dark-grey-text">1 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4 ">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" value="3">
                          <label for="radio100" class="form-check-label dark-grey-text">3 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" value="6">
                          <label for="radio101" class="form-check-label dark-grey-text">6 tháng</label>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input class="form-check-input" name="radio_thoihan" type="radio" value="12">
                          <label for="radio102" class="form-check-label dark-grey-text">1 năm</label>
                        </div>
                      </div>
                    </div>

                    <div class="row mt-3 mb-4">
                      <div class="col-md-12 text-center text-md-left text-md-right">
                        <input type="hidden" name="id_phong" value="{{ $room->id }}">
                        <input type="submit" class="btn btn-primary btn-rounded" value=" Đặt phòng">
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Section: Content-->
</div>
@endsection