
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Hóa đơn #<?php echo e($order->id); ?>

                  <a href="<?php echo e(route('order.index')); ?>" class="btn btn-outline-secondary ml-3"><i class="fas fa-reply"></i>&nbsp&nbsp Quay về</a>
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
                           <strong>#<?php echo e($order->user->id); ?> - <?php echo e($order->user->name); ?></strong><br>
                           <?php echo e($order->user->address); ?><br>
                           Quận huyện: 
                              <?php if($order->user->district != null): ?>
                                 <?php echo e($order->user->district->name); ?>

                              <?php else: ?>
                                 Chưa cập nhật
                              <?php endif; ?>
                           <br>
                           Thành phố: 
                              <?php if($order->user->province != null): ?>
                                 <?php echo e($order->user->province->name); ?>

                              <?php else: ?>
                                 Chưa cập nhật
                              <?php endif; ?>
                           <br>
                        </address>
                     </div>
                     <!-- /.col -->
                     <div class="col-sm-4 invoice-col">
                        Thông tin liên hệ
                        <address>
                           <strong>Số ĐT: <?php echo e($order->user->phone); ?></strong><br>
                           Email: <?php echo e($order->user->email); ?> <br>
                           CMND: <?php echo e($order->user->identity_card_number); ?>

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
                           <?php if($order->status == 1): ?>
                              <form action="<?php echo e(route('order.update', $order->id)); ?>" method="post" accept-charset="utf-8">
                                 <?php echo csrf_field(); ?>
                                 <button type="" class="btn btn-block btn-outline-danger" onclick="return confirm('Bạn có muốn chuyển sang trạng thái ĐÃ THANH TOÁN')">Xác nhận đã thanh toán</button>
                              </form>
                           <?php else: ?>
                              <button type="button" class="btn btn-block btn-success" disabled="">Đã thanh toán</button>
                           <?php endif; ?>
                           
                        </p>
                     </div>
                     <!-- /.col -->
                     <div class="col-6">
                        <p class="lead">Chi tiết tổng tiền</p>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/xampp/htdocs/laravel_dormitory/resources/views/admin/order/show.blade.php ENDPATH**/ ?>