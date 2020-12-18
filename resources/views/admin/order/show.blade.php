@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Hóa đơn #{{ $order->id }}
                  <a href="{{ route('order.index') }}" class="btn btn-outline-secondary ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</a>
               </h1>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <!-- Main content -->
               <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                     <div class="col-12">
                        <h4>
                           <img src="{{ asset('upload/logo/logoKTX.jpg') }}" alt="logoKTX" width="50px"> Ký túc xá Hoàng Trí.
                           <small class="float-right">Ngày giờ: {{ date('d/m/Y H:i:s', strtotime($order->created_at)) }}</small>
                        </h4>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                     <div class="col-sm-4 invoice-col">
                        Thông tin khách hàng
                        <address>
                           <strong>#{{ $order->user->id }} - {{ $order->user->name }}</strong><br>
                           {{ $order->user->address }}<br>
                           Quận huyện: 
                              @if($order->user->district != null)
                                 {{ $order->user->district->name }}
                              @else
                                 Chưa cập nhật
                              @endif
                           <br>
                           Thành phố: 
                              @if($order->user->province != null)
                                 {{ $order->user->province->name }}
                              @else
                                 Chưa cập nhật
                              @endif
                           <br>
                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-4 invoice-col">
                        Thông tin liên hệ
                        <address>
                           <strong>Số ĐT: {{ $order->user->phone }}</strong><br>
                           Email: {{ $order->user->email }} <br>
                           CMND: {{ $order->user->identity_card_number }}
                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-4 invoice-col">
                        <b>Hóa đơn #{{ $order->id }}</b><br>
                        <br>
                        <b>Tình trạng thanh toán:</b> 
                        @if($order->status == 1)
                           <span class="badge badge-danger">Chưa thanh toán</span>
                        @elseif($order->status == 2)
                           <span class="badge badge-success">Đã thanh toán</span>
                        @elseif($order->status == 3)
                           <span class="badge badge-info">Đã thanh toán qua Ngân Lượng</span>
                        @endif
                        <br>
                        <b>Thanh toán vào:</b>
                        @if($order->status != 1)
                           {{ date('d/m/Y H:i:s', strtotime($order->updated_at)) }}
                        @endif
                        
                        <br>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                     <!-- accepted payments column -->
                     <div class="col-6">
                        <p class="lead">Phương thức thanh toán:</p>
                        @if($order->payment_method == 'NL')
                           <img src="https://storage.googleapis.com/reward/userfiles/backend/reward/detail/1448856376_4f1bda18726739c4a9385714e9c758e7617a422b.jpg?v=1604049063" alt="NL" width="100px">
                        @else
                           <img src="https://webstockreview.net/images/money-clip-art-paper-money-9.png" alt="COD" width="50px">
                        @endif

                        <p class="lead mt-3">Ghi chú:</p>
                           {{ $order->note }}
                        </p>

                        <p class="lead mt-3">Tình trạng:</p>
                           @if($order->status == 1)
                              <form action="{{ route('order.update', $order->id) }}" method="post" accept-charset="utf-8">
                                 @csrf
                                 <button type="" class="btn btn-block btn-outline-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ THANH TOÁN')">Xác nhận đã thanh toán</button>
                              </form>
                           @else
                              <button type="button" class="btn btn-block btn-success" disabled="">Đã thanh toán</button>
                           @endif
                           
                        </p>
                     </div>
                     <!-- /.col -->
                     <div class="col-6">
                        <p class="lead">Chi tiết tổng tiền</p>

                        <div class="table-responsive">
                           <table class="table">
                              <tr>
                                 <th style="width:50%">Tạm tính:</th>
                                 <td>{{ number_format($order->price) }} VNĐ</td>
                              </tr>
                              <tr>
                                 <th>VAT (5%)</th>
                                 <td>{{ number_format($order->vat) }} VNĐ</td>
                              </tr>
                              <tr>
                                 <th>Tổng tiền:</th>
                                 <td>{{ number_format($order->total) }} VNĐ</td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.invoice -->
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection