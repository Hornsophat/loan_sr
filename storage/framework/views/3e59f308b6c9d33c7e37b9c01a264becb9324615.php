<?php
    use App\Helpers\AppHelper;
?>
<!DOCTYPE html>
<html>
  <body>
    <div style="width: 188mm; margin:auto;">
        <div class="modal fade bd-example-modal-lg" id="ScheduleModal" tabindex="-1" role="dialog" aria-labelledby="ScheduleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="col-sm-12 mt-4" style="text-align: center;">
                            <button class="btn btn-small btn-primary" style="width: 30mm;margin-left:700px" id="btn_print" type=""><i class="fa fa-print"></i><?php echo e(__('item.print')); ?></button>
                        </div>
                    </div>
                   
                    <div class="modal-body">
                        <div class="content-printer clearfix" id="table_print" style="background: #a59b9b1f"> 
                            <style>
                                   #id1{
                                width:100px;
                                opacity
                            }
                            .content-printer{
                                width: 300mm;
                                height: 410mm;
                                margin:auto;
                                margin-top: 25px;
                                position: relative;
                            }
                            .header{
                                width: 100%;
                                position: relative;
                                text-align: center;
                            }
                            .title p{
                                font-size: 20px;
                            }
                            .body{
                                width: 100%;
                                overflow: hidden;
                                position: relative;
                            }
                            .header .title{
                                font-size: 22px;
                            }
                            .logo{
                                position: absolute;
                                top:0;
                                margin-left: 50px;
                            }
                            .logo img{
                                width: 100px;
                                height: auto;
                            }
                            table{
                                white-space: nowrap;
                                border-collapse: collapse;
                                border-spacing: 0 0.5em;
                                width: 90%;
                        
                            }
                            table tr{
                                line-height: 20px;
                                padding:20px;
                            }
                            .footer{
                                position: absolute;
                                left: 0;
                                bottom: 0;
                                width: 100%;
                            }
                            .col-mb-7{
                                margin-bottom: 70px;
                            }
                            .col-mb-4{
                                margin-bottom: 40px;
                            }
                            table tr td{padding:2px 5px;}
                             .horizontal_dotted_lines{
                                /*padding: 0px 9px;*/
                                position: relative;
                                /*text-align: left;*/
                                display: inline-table;
                                font-weight: 600;
                        
                            }
                            .horizontal_dotted_lines::before {
                                content: '\0000a0';
                                position: absolute;
                                width: 100%;
                                bottom: 2px !important;
                                border-bottom: 0.1px dotted #bdbdbd;
                            }
                            .f-kh{
                                font-family: Khmer OS System;
                            }
                            .text-justify{
                                text-align: justify !important;
                                text-justify: inter-word !important;
                                justify-content: space-between;
                            }
                            .f-kh{
                                font-size: 12px;
                            }
                           
                            .p-footer, .p-footer span{
                                color: white;
                            }
                           
                            .footer{
                                font-size: 12px;
                                /*padding: 0px 15px;*/
                            }
                            @media  print{
                                
                                table tr{
                                    line-height: 20px;
                                    padding:20px;
                                }
                                table tr td{font-size:12px !important; padding:2px 5px;}
                                .title p{
                                    font-size: 16px;
                                }
                                .row{
                                    width: 100%;
                                }
                                
                                .col-md-4{
                                    float: left;
                                    width: 30%!important;
                                }
                                .col-md-2{
                                    float: left;
                                    width: 20%!important;
                                }
                               
                            }
                         
                            </style> 
                        <?php
                        if($loan)
                        {
                        $datefirst=$loan->first_pay_date;
                        $loanterm=$loan->installment_term;
                        $effectiveDate = date('Y-m-d', strtotime("+$loanterm month", strtotime($datefirst)));	
                         }					
                        ?>
                        <div style="width: 288mm; margin:auto;">
                            <div class=" ">
                                <div class="col-md-12">
                        <div class="table-responsive">
                            <div class="header">
                                <div class="logo">
                                    <img id = "id1" src="<?php echo e(Setting::get('LOGO')); ?>" >
                                </div>
                                <div class="title">
                                    <p style="margin-bottom: 0;"><span style="font-family: Khmer OS Muol Light;font-size:23px">ក្រុមហ៊ុន​ រដ្ឋ ស៊ីន អចលនទ្រព្យ</span></p>
                                </div>
                                <div class="title">
                                    <p style="margin-bottom: 0;"><span style="font-family: Time New Roman;font-size:25px;font-weight:bold">RothSing Real Estate Co,ltd</span></p>
                                </div>
                                <div class="title">
                                    <p style="margin-bottom: 0;"><span style="font-family: Khmer OS;font-size:20px;font-weight:bold"><b>អាស័យដ្ឋាន៖ </b>ភូមិល្អក់ ឃុំកណ្តែក ស្រុកប្រាសាទបាគង ខេត្ត​សៀមរាប</span></p>
                                </div>
                                <div class="title">
                                    <p style="margin-bottom: 0;"><span style="font-family: Khmer OS;font-size:20px;font-weight:bold"><b>លេខទូរស័ព្ទ៖ 089 71 23 23 / 070 71 23 23</b></span></p>
                                </div>
                                <br><br>
                                <div class="title">
                                    <p style="margin-bottom: 0;"><span style="font-family: Khmer OS Muol Light;font-size:15px">តារាងបង់ប្រាក់ប្រចាំខែ</span></p>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class="row"​ style="font-family: Khmer os; font-size:17px">
                                <div class="col-md-2">ឈ្មោះភាគី(ខ) </div>
                                <div class="col-md-4">: <b><?php echo e($customer->last_name .' '. $customer->first_name); ?> </b></div>
                                <div class="col-md-2">លេខកូដកម្ចី </div>
                                <?php if($loan): ?>
                                <div class="col-md-4">: <b><?php echo e($loan->reference); ?></b></div>
                                <?php endif; ?>
                                <div class="col-md-2">អាស័យដ្ឋាន </div>
                                <div class="col-md-4">:ផ្លូវលេខ <b><?php echo e($customer->street_number); ?></b> ផ្លូវលេខ <b><?php echo e($customer->house_number); ?></b>  ភូមិ <b><?php echo e($address->vil_kh); ?></b> ឃុំ/សង្កាត់ <b><?php echo e($address->com_kh); ?></b> ស្រុក/ខណ្ឌ <b><?php echo e($address->dis_kh); ?></b> រាជធានី/ខេត្ត <b><?php echo e($address->prov_name); ?></b></div>
                                <div class="col-md-2">ធ្វើនៅថ្ងៃទី </div>
                                <div class="col-md-4">: <b><?php echo e($sale->created_at); ?></b></div>
                                <div class="col-md-2">ចំនួនទឹកប្រាក់ </div>
                                <?php if($loan): ?>
                                <div class="col-md-4">: <b>$ <?php echo e($loan->loan_amount); ?> (<?php echo e(AppHelper::khNumberWord($loan->loan_amount)); ?>ដុល្លាអាមេរិក)</b></div>
                                <?php endif; ?>
                                <div class="col-md-2">លេខទូរស័ព្ទ </div>
                                <div class="col-md-4">: <b><?php echo e($customer->phone1 .' / '. $customer->phone2); ?></b></div>
                                <div class="col-md-2">អាត្រាការប្រាក់ </div>
                                <?php if($loan): ?>
                                <div class="col-md-4">: <b>% <?php echo e($loan->interest_rate); ?></b> </div>
                                <?php endif; ?>
                                <div class="col-md-2">កាលបរិច្ឆេទ </div>
                                <?php if($loan): ?>
                                <div class="col-md-4">:  <b><?php echo e($loan->first_pay_date); ?> - <?php echo e($effectiveDate); ?></b></div>
                                <?php endif; ?>
                                <div class="col-md-2">រយ:ពេល(ខែ) </div>
                                <?php if($loan): ?>
                                <div class="col-md-4">: <b><?php echo e($loan->installment_term); ?> ខែ </b></div>
                                <?php endif; ?>
                                <?php if($loan): ?>
                                <div class="col-md-2">ការប្រាក់/ខែ </div>
                                <div style=" font-weight: bold;"class="col-md-4" id="loanIn"></div>
                                <?php endif; ?>
                            </div>
                                <br><br>
                            <table class="table table-nowrap" style="width:100px margin-left:10px;border:1px solid black;text-align:center" >
                                <tr>
                                        <th style="border:1px solid black"><?php echo e(__('item.no')); ?>​​ (ខែ)</th>
                                        <th style="border:1px solid black"><?php echo e(__('item.date')); ?></th>
                                        
                                        
                                        <th style="border:1px solid black"><?php echo e(__("item.total_amount_to_be_paid")); ?></th>
                                        <th style="border:1px solid black"><?php echo e(__("item.interest_amount")); ?></th>
                                        <th style="border:1px solid black"><?php echo e(__('item.amount')); ?></th>
                                        <th style="border:1px solid black"><?php echo e(__('item.principle_balance')); ?></th>
                                        
                                        
                                    </tr>
                                    <tr>
                                    <tbody id="contentScheduleModal" style="height: 90%; overflow-y: auto;">
                                    </tbody>
                                </tr>
                            </table>
                            <div>
                                <?php if($loan): ?>
                                <p style="font-family: Khmer os; font-size:18px;"><b>ចំណាំ៖</b> អតិថិជនឈ្មោះ <b><?php echo e($customer->last_name .' '. $customer->first_name); ?></b> ត្រូវបង់ប្រាក់ចំនួន <b>$ <?php echo e($loan->loan_amount); ?> (<?php echo e(AppHelper::khNumberWord($loan->loan_amount)); ?>ដុល្លាអាមេរិក)</b> ក្នុងខែទី <b>១៣</b> មកកាន់ក្រុមហ៊ុន ឬ បង់រំលោះជាមួយធនាគារ</p>
                                <?php endif; ?>
                                <tr>
                                    <td ><p class="text-right" style="font-size:16px;font-family:Khmer OS System;margin-left:650px"> សៀមរាប, ថ្ងៃទី<b><?php echo e(AppHelper::khMultipleNumber(date('d', strtotime($sale->created_at)))); ?> </b>ខែ <b><?php echo e(AppHelper::khMonth(date('m', strtotime($sale->created_at)))); ?></b>  ឆ្នាំ <b><?php echo e(AppHelper::khMultipleNumber(date('Y', strtotime($sale->created_at)))); ?></b> <br> ភាគី(ក)អ្នកឲ្យបង់រំលស់ប្រាក់-ក្រុមហ៊ុន​ រដ្ឋ ស៊ីន អចលនទ្រព្យ</p> </td>
                                </tr>
                                
                                <table style="width:90%;font-size:18px;height:350px;margin-top:1px;font-family:Khmer OS System">
                                    <tr class="text-center">
                                    <th>ស្នាមមេដៃភាគី(ក)</th>
                                    <th>ស្នាមមេដៃសាក្សីភាគី(ក)</th>
                                    <th>ស្នាមមេដៃសាក្សីភាគី(ខ)</th>
                                    <th>ស្នាមមេដៃស្តាំភាគី(ខ)</th>
                                    </tr>
                                    <tr class="text-center">
                                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;..................................</td>    
                                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;......................................</td>
                                    <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;..................................</td>
                                    <td>&emsp;&emsp;&emsp;&emsp; <?php echo e($customer->last_name ." ". $customer->first_name); ?></td>
                                    </tr>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><?php echo e(__('item.close')); ?></button>
                     
                        </div>
                </div>       
            </div>
        </div>
    </div>        
    
        
    
  </body>  

    <script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/jquery-3.2.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/bootstrap.min.js')); ?>"></script>
    
    
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script type="text/javascript" src="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js">
    <script type="text/javascript" src="<?php echo e(asset('js/printThis.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var styleP = $('#stylePrint').text();
            $('#btn_print').click(function(){
                var t = window.open();
                t.document.write("<style>"+styleP+"</style>");
                t.document.write($('#table_print').html());
                t.print();
                t.close();
            });
        });
    </script>
</html>    