<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>CSC Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by themesbrand" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo $this->Url->build('/front_end/assets/images/logo.png'); ?>">


        <!-- Clock css -->
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/daterangepicker/daterangepicker.css'); ?>" rel="stylesheet" />
        <!-- Plugins css -->
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/timepicker/tempusdominus-bootstrap-4.css'); ?>" rel="stylesheet" />
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/timepicker/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/clockpicker/jquery-clockpicker.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/colorpicker/asColorPicker.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/select2/select2.min.css'); ?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css'); ?>" rel="stylesheet" /> 

        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/dropify/css/dropify.min.css'); ?>" rel="stylesheet">

         <!-- DataTables -->
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/buttons.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" /> 
        

        <!-- App css -->
        <link href="<?php echo $this->Url->build('/back_end/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/css/icons.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/css/metismenu.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $this->Url->build('/back_end/assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
         <script src="<?php echo $this->Url->build('/back_end/assets/js/jquery.min.js'); ?>"></script>
    </head>

    <body>

         <?php echo $this->element('back_end/nav'); ?>   
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user media">                    
                    <img src="<?php echo $this->Url->build('/back_end/assets/images/users/user-1.jpg'); ?>" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                    <div class="media-body">
                        <h5 class="text-light">Mr. Michael Hill </h5>
                        <ul class="list-unstyled list-inline mb-0 mt-2">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class=""><i class="mdi mdi-account text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class=""><i class="mdi mdi-settings text-light"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class=""><i class="mdi mdi-power text-danger"></i></a>
                            </li>
                        </ul>
                    </div>                    
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right align-item-center mt-2">
                                <?php echo $this->Flash->render(); ?>   
                            </div>
                            <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>Dashboard</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard 1</li>
                                </ol>
                            </div>                                      
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
            </div>
        </div>
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <?php echo $this->element('back_end/aside'); ?>  

                <?= $this->fetch('content') ?>
            </div>
        </div>
        <!-- end page-wrapper -->

         <!-- jQuery  -->
       
        <script src="<?php echo $this->Url->build('/back_end/assets/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/metisMenu.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/waves.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/js/jquery.slimscroll.min.js'); ?>"></script>

        <!-- Plugins js -->
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/moment/moment.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/timepicker/tempusdominus-bootstrap-4.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/timepicker/bootstrap-material-datetimepicker.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/clockpicker/jquery-clockpicker.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/colorpicker/jquery-asColor.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/colorpicker/jquery-asGradient.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/colorpicker/jquery-asColorPicker.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/select2/select2.min.js'); ?>"></script>

        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js'); ?>"></script>

        <script src="<?php echo $this->Url->build('/back_end/assets/pages/jquery.clock-img.init.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/pages/jquery.forms-advanced.js'); ?>"></script>

        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/dropify/js/dropify.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/pages/jquery.form-upload.init.js'); ?>"></script>

        <!--Wysiwig js-->
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/tinymce/tinymce.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/pages/jquery.form-editor.init.js'); ?>"></script>


        <!-- Required datatable js -->
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
        <!-- Buttons examples -->
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/dataTables.buttons.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/buttons.bootstrap4.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/jszip.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/pdfmake.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/vfs_fonts.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/buttons.html5.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/buttons.print.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/buttons.colVis.min.js'); ?>"></script>
        <!-- Responsive examples -->
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/dataTables.responsive.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/datatables/responsive.bootstrap4.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/pages/jquery.datatable.init.js'); ?>"></script>

        <script src="<?php echo $this->Url->build('/back_end/assets/plugins/parsleyjs/parsley.min.js'); ?>"></script>
        <script src="<?php echo $this->Url->build('/back_end/assets/pages/jquery.validation.init.js'); ?>"></script> 

        <!-- App js -->
        <script src="<?php echo $this->Url->build('/back_end/assets/js/app.js'); ?>"></script>

        <script type="text/javascript">
            $(document).on('change','.category',function(e){
       
                var category = $(this).val();
               

                $('#sub_category').empty();

                // $('#sub_category').removeClass("chosen");

                $.ajax({

                         type: "POST",
                         url:  '<?php echo $this->Url->build('/admin/products/get_sub_category'); ?>',
                         dataType: "json",
                         data: {category:category},
                         success:function(data)
                         {
                             var toAppend = '<option value="0">Select Sub Category</option>';

                             $.each(data,function(i,o){

                                toAppend += '<option value="'+o.id+'">'+o.name+'</option>';

                              });
                              
                             $('#sub_category').append(toAppend);

                         }
                    });
                });


            // $(document).on('click','#add_more',function(){

            //     var rowCount = $('#dynamicTable tbody tr').length;

            //     // alert(rowCount);

            //     var html = $('.field_1').html();

            //     var htmlnew = "<tr class='field_"+rowCount+"'>"+html+"</tr>";

            //     // htmlnew.find('th div').addClass('test'); 

            //     $('#dynamicTable tbody').append(htmlnew);
            //     // console.log(html);
            // })

            $(document).on('click','#add_more',function(){

                var rowCount = $('#dynamicTable tbody tr').length;

                var varient = $('.selectVariant').html();

                var html = "<tr><th><select class='form-control selectVariant' name='data[varient][]'>"+varient+"</select></th><th><select class='form-control sub_variant' id='sub_varient_1' name='data[sub_varient][]'></select></th><th><button type='button' class='btn btn-danger remove-tr'>Remove</button></th>";

                 $('#dynamicTable tbody').append(html);

            });


            $(document).on('click','#add_more_sku',function(){


                var html = '<tr><th><div class="input text"><input required="" type="text" name="data_sizes[sku_code][]" placeholder="SKU Code" class="form-control" id="data-sizes-sku-code"></div></th><th><div class="input text"><input required="" type="text" name="data_sizes[size][]" placeholder="Size" class="form-control" id="data-sizes-size"></div></th><th><div class="input text"><input required="" type="text" name="data_sizes[quantity][]" placeholder="Quantity" class="form-control" id="data-sizes-quantity"></div></th><th><button type="button" id="remove_1" class="btn btn-danger remove-tr">Remove</button></th></tr>';


                $('#dynamicTable_sku tbody').append(html);

            });


            $(document).on('click','.remove-tr',function(){
                $(this).closest('tr').remove();
            })


             $(document).on('change','.selectVariant',function(e){
     
                var variant = $(this).val();
                var id = $(this).attr('data-id');

                var select = $(this).closest('th').next().find('select');

                select.empty();

                $.ajax({

                         type: "POST",
                         url:  '<?php echo $this->Url->build('/admin/products/get_sub_variant'); ?>',
                         dataType: "json",
                         data: {variant:variant},
                         success:function(data)
                         {
                             var toAppend = '<option value="0">Select Sub Category</option>';

                             $.each(data,function(i,o){

                                toAppend += '<option value="'+o.id+'">'+o.name+'</option>';

                              });
                              
                             
                              select.append(toAppend);

                         }
                    });
                });


             $(document).on('click','.checkboxCustom',function(){
                 if(this.checked) {
                    $(this).val(1);
                 }else{
                    $(this).val(0);
                 }
             })
        </script>

        <style type="text/css">
            .navbar-custom {
                background: #3ebffc;
            }
        </style>

    </body>
</html>