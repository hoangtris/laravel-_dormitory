
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Chi tiết đơn số #<?php echo e($orderDetail->id); ?> - Phòng #<?php echo e($orderDetail->room_id); ?>

                  <a href="<?php echo e(route('booking.index')); ?>" class="btn btn-outline-secondary ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</a>
               </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Invoice</li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Note:</h5>
                  Trang này đang trong quá trình xây dựng
               </div>


               <!-- Main content -->
               <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  <div class="row">
                     <div class="col-12">
                        <h4>
                           <img src="<?php echo e(asset('upload/logo/logoKTX.jpg')); ?>" alt="logoKTX" width="50px"> Ký túc xá Hoàng Trí.
                           <small class="float-right">Ngày giờ: <?php echo e(date('d/m/Y H:i:s', strtotime($order->created_at))); ?></small>
                        </h4>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- info row -->
                  <div class="row invoice-info">
                     <div class="col-sm-4 invoice-col">
                        Thông tin khách hàng
                        <address>
                           <strong><?php echo e($user->name); ?></strong><br>
                           <?php echo e($user->address); ?><br>
                           Quận huyện: <br>
                           Thành phố: <br>
                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-4 invoice-col">
                        Thông tin liên hệ
                        <address>
                           <strong>Số ĐT: <?php echo e($user->phone); ?></strong><br>
                           Email: <?php echo e($user->email); ?> <br>
                           CMND: <?php echo e($user->identity_card_number); ?>

                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-4 invoice-col">
                        <b>Hóa đơn #<?php echo e($order->id); ?></b><br>
                        <br>
                        <b>Tình trạng thanh toán:</b> 
                        <?php if($order->status == 1): ?>
                           <span class="badge badge-danger">Chưa thanh toán</span>
                        <?php elseif($order->status == 2): ?>
                           <span class="badge badge-success">Đã thanh toán</span>
                        <?php elseif($order->status == 3): ?>
                           <span class="badge badge-info">Đã thanh toán qua Ngân Lượng</span>
                        <?php endif; ?>
                        <br>
                        <b>Thanh toán vào:</b>
                        <?php if($order->status != 1): ?>
                        <?php echo e(date('d/m/Y H:i:s', strtotime($order->updated_at))); ?>

                        <?php endif; ?>
                        
                        <br>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Table row -->
                  <div class="row">
                     <div class="col-12 table-responsive">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Mã phòng</th>
                                 <th>Giá</th>
                                 <th>Ngày dọn vào</th>
                                 <th>Ngày hết hạn</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>
                                    <img src="
                                    <?php if(strstr($room->image,'http')): ?>
                                    <?php echo e($room->image); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('upload/room/'.$room->image)); ?>

                                    <?php endif; ?>
                                    " alt="imageRoom" width="75">
                                 </td>
                                 <td class="align-middle"><?php echo e($room->id); ?></td>
                                 <td class="align-middle"><?php echo e(number_format($room->price)); ?></td>
                                 <td class="align-middle"><?php echo e(date('d-m-Y', strtotime($orderDetail->date_move_in))); ?></td>
                                 <td class="align-middle"><?php echo e(date('d-m-Y', strtotime($orderDetail->expiration_date))); ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <div class="row">
                     <!-- accepted payments column -->
                     <div class="col-6">
                        <p class="lead">Phương thức thanh toán:</p>
                        <?php if($order->payment_method == 'NL'): ?>
                           <img src="https://storage.googleapis.com/reward/userfiles/backend/reward/detail/1448856376_4f1bda18726739c4a9385714e9c758e7617a422b.jpg?v=1604049063" alt="NL" width="100px">
                        <?php else: ?>
                           <img src="https://webstockreview.net/images/money-clip-art-paper-money-9.png" alt="COD" width="50px">
                        <?php endif; ?>

                        <p class="lead mt-3">Ghi chú:</p>
                           <?php echo e($order->note); ?>

                        </p>

                        <p class="lead mt-3">Tình trạng:</p>
                           <?php if($orderDetail->status == 1): ?>
                              <form action="<?php echo e(route('booking.update', $orderDetail->id)); ?>" method="post" accept-charset="utf-8">
                                 <?php echo csrf_field(); ?>
                                 <button type="" class="btn btn-block btn-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ CHẤP NHẬN')">Chờ chấp nhận</button>
                              </form>
                           <?php else: ?>
                              <button type="button" class="btn btn-block btn-success" disabled="">Đã chấp nhận</button>
                           <?php endif; ?>
                           
                        </p>
                     </div>
                     <!-- /.col -->
                     <div class="col-6">
                        <p class="lead">Chi tiết thanh toán</p>

                        <div class="table-responsive">
                           <table class="table">
                              <tr>
                                 <th style="width:50%">Tạm tính:</th>
                                 <td><?php echo e(number_format($order->price)); ?> VNĐ</td>
                              </tr>
                              <tr>
                                 <th>VAT (5%)</th>
                                 <td><?php echo e(number_format($order->vat)); ?> VNĐ</td>
                              </tr>
                              <tr>
                                 <th>Tổng tiền:</th>
                                 <td><?php echo e(number_format($order->total)); ?> VNĐ</td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- this row will not appear when printing -->
                  <div class="row no-print">
                     <div class="col-12">
                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                           Payment
                        </button>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                           <i class="fas fa-download"></i> Generate PDF
                        </button>
                        <a href="invoice-print.html" target="_blank" class="btn btn-default float-right" style="margin-right: 5px;"><i class="fas fa-print"></i> Print</a>
                     </div>
                  </div>
               </div>
               <!-- /.invoice -->
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/booking/showbooking.blade.php ENDPATH**/ ?>