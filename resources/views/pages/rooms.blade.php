@extends('master')

@section('content')

  <!-- Page Content -->
  <div class="container-fluid px-5 pt-5">

    <div class="row">

      <div class="col-3 mb-3">
		    <h2 class="my-4">Tìm kiếm</h2>
  			<form class="example" action="#" method="get">
  			  <input type="text" placeholder="Nhập giá trị.." name="key" class="form-control mb-1">
  			  <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i> Tìm</button>
  			</form>
		  
        <h2 class="my-4">Khu vực</h2>
        <div class="list-group">
		  	@foreach($areas as $kv)
          	<a href="{{ route('rooms.area', $kv->slug) }}" class="list-group-item list-group-item-action">{{ $kv->name }}</a>
			  @endforeach
        </div>
		  
	      <h2 class="my-4">Loại phòng</h2>
        <div class="list-group">
		  	@foreach($typesRoom as $kv)
          	<a href="{{ route('rooms.type', $kv->slug) }}" class="list-group-item list-group-item-action">{{ $kv->name }}</a>
			  @endforeach
        </div>

        <h2 class="my-4">Mức giá</h2>
        <div class="list-group">
            <a href="{{ route('rooms.price', '<1tr') }}" class="list-group-item list-group-item-action">Dưới 1 triệu</a>
            <a href="{{ route('rooms.price', '1-2tr') }}" class="list-group-item list-group-item-action">1 triệu ~ 2 triệu</a>
            <a href="{{ route('rooms.price', '2-3tr') }}" class="list-group-item list-group-item-action">2 triệu ~ 3 triệu</a>
            <a href="{{ route('rooms.price', '3-4tr') }}" class="list-group-item list-group-item-action">3 triệu ~ 4 triệu</a>
            <a href="{{ route('rooms.price', '>4tr') }}" class="list-group-item list-group-item-action">Trên 4 triệu</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col">
        <div class="row">
  		    @forelse($rooms as $p)
          <div class="col-lg-4 col-md-4 mb-4">
            <div class="card h-100">
              <a href="{{ route('rooms.detail', $p->id) }}"><img class="card-img-top"
                src="
                  @if(strstr($p->image,'http'))
                    {{ $p->image }}
                  @else
                    {{ asset('image/'.$p->image) }}
                  @endif
                " alt="" height="250px"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{ route('rooms.detail', $p->id) }}">Phòng số #{{ $p->id }}</a>			
                </h4>

                <h5>{{ number_format($p->price) }} VND</h5>
        				<div class="card-text">Khu vực: 
        					@foreach($areas as $kv)
        						@if($p->id_area == $kv->id)
        							{{$kv->name}}
        						@endif
        					@endforeach
        				</div>	
        				<div class="card-text">Loại phòng: 
        					@foreach($typesRoom as $lp)
        						@if($p->id_type == $lp->id)
        							{{$lp->name}}
        						@endif
        					@endforeach
        				</div>
        				<div class="card-text">Sức chứa: {{ $p->capacity }}</div> 
        				<div class="card-text">Thời hạn: {{ $p->duration }}</div>
        				<div class="card-text">An ninh: {{ $p->security }}</div>   
              </div>
              
              <div class="card-footer">
                  <a href="{{ route('rooms.detail', $p->id) }}"><button type="button" class="btn btn-outline-primary" style="width: 100%">Xem phòng</button></a>
              </div>
            </div>
          </div>
          @empty
          	<p class="h4">Không tìm thấy phòng.<p>
  		    @endforelse
        </div>
        <!-- /.row -->
        {{ $rooms->onEachSide(1)->links() }}
      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection