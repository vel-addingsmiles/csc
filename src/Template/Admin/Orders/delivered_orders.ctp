<div class="page-content">
    <div class="container-fluid"> 
        <?php echo $this->element('back_end/order'); ?>  
        <div class="row">
        
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Delivered Orders</h4>

                         <div class="box-tools float-right">
                            <?php echo $this->Form->create('',['type' => 'get']); ?>
                            <div class="input-group input-group-sm" style="width: 150px;">                            
                                <input type="text" name="search" required = "true" class="form-control pull-right" placeholder="Search" 
                                value = '<?php if(!empty($this->request->getQuery()['search'])){ echo $this->request->getQuery()['search']; }else{ echo "";}?>' />

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>

                        <br><br>
                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                             <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Order Id</th>
                                    <th>Total</th>
                                    <th>Customer Name</th>
                                    <th>Customer Mobile</th>
                                    <th>Order Status</th>
                                    <th>Order History</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($orders as $key => $order) {  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php echo $order['order_number']; ?>
                                        </td>                              
                                        <td>
                                            <?php echo $order['order_total']; ?>
                                        </td>
                                        <td>
                                            <?php echo $order['user']['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $order['user']['mobile']; ?>
                                        </td>
                                        <td>
                                            <select class="form-control order_status" order-id="<?php echo $order['id']; ?>">
                                                <option value="3" <?php if($order['invoice_status'] == 3){ echo "Selected"; } ?>>Delivered</option>
                                                <option value="5" <?php if($order['invoice_status'] == 5){ echo "Selected"; } ?>>Returned</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm getHistory" data-id="<?php echo $order['id']; ?>">History</button>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo $this->Url->build('/admin/orders/view/'.$order->id); ?>" type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>  

                        
                          <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        
                        <?php if(!empty($this->Paginator->numbers())){ ?>
                         <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php
                                $this->Paginator->templates([
                                    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                                ]);
                                $this->Paginator->templates([
                                    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                                ]);
                                ?>
                                <?= $this->Paginator->prev('Prev') ?>
                                <?php
                                $this->Paginator->templates([
                                    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                                ]);
                                ?>
                                <?= $this->Paginator->numbers() ?>
                                <?php
                                $this->Paginator->templates([
                                    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                                ]);
                                $this->Paginator->templates([
                                    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'
                                ]);
                                ?>
                                <?= $this->Paginator->next('Next') ?>
                            </ul>
                        </nav>
                      <?php } ?>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div><!-- container -->

    <?php echo $this->element('back_end/footer'); ?>  
</div>
<!-- end page content-->

<script type="text/javascript">
    $(document).ready(function(){
        $('.pagination').find('.active a').addClass('page-link');
        $('.pagination').find('.active a').addClass('custom-link');
    })
</script>

<style type="text/css">
    .custom-link{
        color: #ffffff !important;
    }
</style>

<script type="text/javascript">
    $(document).on('change','.order_status',function(){
        // alert($(this).val());
        // alert($(this).attr('order-id'));

        $.ajax({
              type: "POST",
              url: '<?php echo $this->Url->build('/admin/orders/changeStatus'); ?>',
              dataType: "json",
              data: {status:$(this).val(),order_id:$(this).attr('order-id')},
              success:function(data)
              {      

                    
                 
              },
              error: function (){ }
        });


    });
    $(document).on('click','.getHistory',function(){

        $.ajax({
              type: "POST",
              url: '<?php echo $this->Url->build('/admin/orders/getHistory'); ?>',
              dataType: "json",
              data: {order_id:$(this).attr('data-id')},
              success:function(data)
              {      

                    $('.tbody').html(data.html);

                    $('#myModal').modal('show');
                 
              },
              error: function (){ }
        });
    })

</script>


  <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Order history</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <table class="table table-bordered">
              <thead>
                  <th>History</th>
                  <th>Date</th>
              </thead>
              <tbody class="tbody">
                  
              </tbody>
          </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
 </div>