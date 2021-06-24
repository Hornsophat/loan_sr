<?php
    use App\Helpers\AppHelper;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <link rel="icon" type="image/png" href="<?php echo e(Setting::get('ICON')); ?>" sizes="32x32">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/main.css')); ?>">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/font-awesome.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/custom.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('back-end/css/listswap.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(URL::asset('back-end/css/normalize.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('back-end/css/planit.css')); ?>"/>
    <style type="text/css" id="stylePrint">
        @font-face{
            font-family: 'Khmer OS Muol Light';
            src: url('<?php echo e(asset('public/back-end/fonts/print-font/KhmerOSmuollight.ttf')); ?>') format("truetype");
        }
        @font-face{
            font-family: 'Khmer OS System';
            src: url('<?php echo e(asset('public/back-end/fonts/print-font/KhmerOSsys.ttf')); ?>') format("truetype");
        }
        .content-printer{
            width: 180mm;
            height: 110mm;
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
            font-size: 16px;
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
            margin-left: 35px;
        }
        .logo img{
            width: 100px;
            height: auto;
        }
        table{
            white-space: nowrap;
            border-collapse: collapse;
            border-spacing: 0 0.5em;
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
            font-size: 14px;
            font-family: Khmer OS System;

        }
        .horizontal_dotted_lines::before {
            content: '\0000a0';
            position: absolute;
            width: 100%;
            bottom: 2px !important;
            border-bottom: 0.1px dotted #bdbdbd;
        }
        /* .f-kh{
            font-family: Khmer OS System;
        } */
        .text-justify{
            text-align: justify !important;
            text-justify: inter-word !important;
            justify-content: space-between;
        }
        .f-kh{
            font-size: 14px;
            font-family: Khmer OS System;
        }
        p ,span{
            color: black;
        }
        .p-footer, .p-footer span{
            color: white;
        }
        .p-border-bottom{
            border-color:black;
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
            .col-sm-6{
                float: left;
                width: 50%!important;
            }
            .col-sm-4{
                float: left;
                width: 33.333%!important;
            }
            .col-md-12{
                float: left;
                width: 100%!important;
            }
            .col-mb-7{
                margin-bottom: 80px;
            }
            .col-mb-4{
                margin-bottom: 10px;
            }
            .text-center{
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div style="width: 188mm; margin:auto;">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="content-printer clearfix" id="table_print" style="background: #0000001f">
                        <div class="header">
                            <div class="logo">
                                <img src="<?php echo e(Setting::get('LOGO')); ?>" width="100%" height="100%">
                            </div>
                            <div class="title">
                                <p style="margin-bottom: 0; font-family: Khmer OS Muol Light;font-size:23px">ក្រុម​ហ៊ុន រដ្ឋ ស៊ីង អចលនទ្រព្យ</p>
                                <p class="p-border-bottom" style="display:inline-block;font-family:Time New Roman;font-size:25px;font-weight: bold;">RothSing Real Estate Co,ltd</p>
                            </div>
                            <div class="title">
                                <p><span style="font-family: Khmer OS Muol Light;">ប័ណ្ណទទួលប្រាក់ / RECEIPT</span></p>
                            </div>
                        </div>
                        <br><br>
                        <?php
                        $gender ="ស្រី";
                        if($customer->sex==1){
                            $gender = 'ប្រុស';
                        }
                        $old = '';
                        if($customer->dob){
                            $old = (date('Y')*1)-(date('Y', strtotime($customer->dob))*1);
                        }
                        
                        $price = $sale_item->total_price-$sale_item->discount_amount;
                        $price *=1;
                        
                        //calculate date for late pay
                        $paid = $payment_transaction->amount*1;
                        $paid_date=$payment_transaction->payment_date;
                        $loandate=$loan->loan_date;
                        $paiddate=new DateTime($paid_date);
                        $dateloan=new DateTime($loandate);
                        $interval=$paiddate->diff($dateloan);
                        $day=$interval->format('%a');
                        $penalty_price=$payment_schedule->penalty_amount;

                        //Represent functions for calculations
                        $amount_pay=($payment_schedule->amount_to_spend)+ ($payment_schedule->penalty_amount);
                        $pay_late_total=$payment_schedule->penalty_amount;
                        $total_pay=$paid + $pay_late_total;
                        $payment_schedule->amount_to_spend1 = $payment_schedule->amount_to_spend - $payment_schedule->paid +  $payment_transaction->amount;
                        $balance_amount= $payment_schedule->amount_to_spend1 -$payment_transaction->amount;
                        
                        //Sum Data
                        $total_outstanding_amount=0;
                        $total_outstanding_amount += $loan->outstanding_amount;
                        $total_loan_amount=0;
                        $total_loan_amount +=$sale_item->paid ;
                        

                        $paid_day_number = AppHelper::khMultipleNumber(date('d', strtotime($paid_date)));
                        $paid_month = AppHelper::khMonth(date('m', strtotime($paid_date)));
                        $paid_year = AppHelper::khMultipleNumber(date('Y', strtotime($paid_date)));
                        $paid_day_number_next='';
                        $paid_month_next='';
                        $paid_year_next='';
                      
                        $total_amount_paid='';
                        if(!empty($payment_schedule_paid)){
                            $total_amount_paid=$payment_schedule_paid;
                        }
                        

                        if(!empty($payment_schedule_next)){
                            $paid_date_next=$payment_schedule_next->payment_date;
                            $paid_day_number_next = AppHelper::khMultipleNumber(date('d', strtotime($paid_date_next)));
                            $paid_month_next = AppHelper::khMonth(date('m', strtotime($paid_date_next)));
                            $paid_year_next = AppHelper::khMultipleNumber(date('Y', strtotime($paid_date_next)));
                        }
                        ?>
                        <div class="body">
                            
                            <p class="text-justify f-kh" style="text-align: justify-all;">
                                <span class="f-kh​" style="margin-left:65%">លេខប័ណ្ណ/No &nbsp; :</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 80px">&nbsp;<?php echo e($payment_schedule->reference); ?></span><br>    
                                <span class="f-kh​" style="margin-left:0">គម្រោង / Project :</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 80px;">&nbsp; <b>បុរីសិរីសួស្តី333</b></span><br>  <br>  
                                <span class="f-kh">លេខកូដអតិថិជន &nbsp;:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 140px">&nbsp;<?php echo e($customer->customer_no); ?></span>
                                <br>
                                <span class="f-kh">ឈ្មោះអតិថិជន &nbsp;: </span>&nbsp;
                                <span class="horizontal_dotted_lines" style=";min-width: 170px"><?php echo e($customer->last_name.' '.$customer->first_name); ?> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="f-kh">ឡាតាំង &nbsp;:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 120px">&nbsp;<?php echo e(strtoupper($customer->last_name_en.' '.$customer->first_name_en)); ?> </span>
                                <br>
                                <span class="f-kh">ភេទៈ</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 60px">&nbsp;<?php echo e($gender); ?> </span>
                                <span class="f-kh">អាយុៈ</span><span class="horizontal_dotted_lines" style=";min-width: 30px">&nbsp;<?php echo e($customer->age); ?></span>
                                <span class="f-kh">ឆ្នាំ</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <span class="f-kh">លេខទូរស័ព្ទ &nbsp;:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 170px">&nbsp;<?php echo e($customer->phone1.' / '.$customer->phone2); ?> </span>
                               <!-- <span class="f-kh" style="min-width:120px">លេខកិច្ចសន្យា / Agreement No:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 80px">&nbsp;00<?php echo e($loan->sale_id); ?></span>-->
                                <br>
                               <span class="f-kh">អាស័យដ្ឋានបច្ចុប្បន្ន​ &nbsp;:</span>
                               <span class="horizontal_dotted_lines" style="font-size:15px;min-width: 170px">&nbsp;ផ្លូវលេខ <b><?php echo e($customer->street_number); ?></b> ផ្ទះលេខ <b><?php echo e($customer->house_number); ?></b>  ភូមិ <b> <?php echo e($address-> dis_kh); ?>  </b> ឃុំ/សង្កាត់ <b><?php echo e($address->com_kh); ?></b>  ​ស្រុក/ខណ្ឌ <b><?php echo e($address->dis_kh); ?></b> រាជធានី/ខេត្ត <b><?php echo e($address->prov_name); ?></b>  </span>
                               <br>
                               <span class="f-kh">កាលបរិចេ្ឆទទិញអចលនទ្រព្យ:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 70px">&nbsp; <?php echo e(AppHelper::khMultipleNumber(date('d', strtotime($loan->first_pay_date)))); ?> ខែ <?php echo e(AppHelper::khMonth(date('m', strtotime($loan->first_pay_date)))); ?> ឆ្នាំ <?php echo e(AppHelper::khMultipleNumber(date('Y', strtotime($loan->first_pay_date)))); ?></span>
                                <br>
                                <span class="f-kh">តម្លៃអចនទ្រព្យសរុប:​</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 120px;">&nbsp;​$ <?php echo e(number_format($price,2)); ?> </span>
                                (
                                <span class="horizontal_dotted_lines" style=";min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord($price)); ?>ដុល្លារអាមេរិក</span>
                                )
                                <br>
                                <table style="width: 100%" border="1px solid black">
                                <tr>
                                    <th><span class="f-kh">ប្រាក់បង់ប្រចាំខែ:</span></th>
                                    <th><span class="f-kh" >ប្រាក់ពិន័យបង់យឺតក្នុងមួយថ្ងៃ:</span></th>
                                    <th> <span class="f-kh" >រយះពេលបង់យឺត:</span></th>
                                    <th><span class="f-kh">ប្រាក់ពិន័យសរុប:</span></th>
                                    
                                </tr>
                                <tr>
                                    <td><span class="horizontal_dotted_lines" style=";min-width: 70px">&nbsp;​$ <?php echo e(number_format( $payment_schedule->amount_to_spend - $pay_late_total,2)); ?> </span>​ </td>
                                    <td><span class="horizontal_dotted_lines" style=";min-width: 120px;color:red">&nbsp; $ <?php echo e(number_format( $sale_item->penalty,2)); ?> / day</span></td>
                                    <td><span class="horizontal_dotted_lines" style=";min-width: 120px;color:red">&nbsp;<?php echo e($day_penalty); ?> ថ្ងៃ</span></td>
                                    <td><span class="horizontal_dotted_lines" style=";min-width: 170px;;color:red">$ &nbsp;<?php echo e($pay_late_total); ?> </span></td>
                                   
                                </tr>
                                </table>
                                
                                <br>
                                <span class="f-kh">ទឹកប្រាក់ដែលបានបង់សរុប:​</span>
                                <span class="horizontal_dotted_lines" style="min-width: 100px">&nbsp;​$ <?php echo e(number_format(    $total_amount_paid ,2)); ?> </span>​ 
                            (
                                <span class="horizontal_dotted_lines" style="min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord(  $total_amount_paid ,2)); ?>ដុល្លារអាមេរិក</span>
                                )
                                <br>
                                <span class="f-kh">ទឹកប្រាក់ដែលបានបង់ប្រចាំខែ:​</span>
                                <?php if( $payment_transaction->amount!=0): ?>
                                <span class="horizontal_dotted_lines" style="min-width: 100px">&nbsp;​$ <?php echo e(number_format(  $payment_transaction->amount,2)); ?> </span>​ 
                            (
                                <span class="horizontal_dotted_lines" style="min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord($payment_transaction->amount,2)); ?>ដុល្លារអាមេរិក</span>
                                )
                             <?php endif; ?>
                             <?php if( $payment_transaction->amount==0): ?>
                             <span class="horizontal_dotted_lines" style="min-width: 100px">&nbsp;​$ <?php echo e(number_format($pay_late_total,2)); ?> </span>​ 
                            (
                                <span class="horizontal_dotted_lines" style="min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord($pay_late_total,2)); ?>ដុល្លារអាមេរិក</span>
                                )
                             <?php endif; ?>
                             <br>
                                <span class="f-kh">ទឹកប្រាក់ដែលនៅសល់ប្រចាំខែ:​</span>
                                <span class="horizontal_dotted_lines" style="min-width: 100px">&nbsp;​$ <?php echo e(number_format($balance_amount,2)); ?> </span>​ 
                                (
                                    <span class="horizontal_dotted_lines" style="min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord($balance_amount,2)); ?>ដុល្លារអាមេរិក</span>
                                    )    
                                <br>
                               <?php   
                               $total_oustanding_amount=0;
                               $oustanding_amount=0;
                               $total_oustanding_amount=$oustanding_amount+=$loan->outstanding_amount;  ?>
                                <span class="f-kh">ទឹកប្រាក់ដែលនៅសល់សរុប:​</span>
                                <span class="horizontal_dotted_lines" style="min-width: 100px">&nbsp;​$ <?php echo e(number_format($total_oustanding_amount,2)); ?> </span>​ 
                                (
                                    <span class="horizontal_dotted_lines" style="min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord( $total_oustanding_amount,2)); ?>ដុល្លារអាមេរិក</span>
                                    )
                                <br>
                                <span class="f-kh" style="font-family:Khmer OS System">ដំណាក់កាលទី​៊​ / Stage No:</span>
                                <span  class="horizontal_dotted_lines" style=";min-width: 30px;font-weight:bold"><?php echo e($payment_schedule->order); ?></span>

                                <span class="f-kh"> &nbsp;&nbsp;ចំនួនទឹកប្រាក់:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 107px">&nbsp;​$ <?php echo e(number_format($payment_schedule->amount_to_spend,2)); ?> </span>​ 
                                (
                                    <span class="horizontal_dotted_lines" style=";min-width: 240px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord( $payment_schedule->amount_to_spend,2)); ?>ដុល្លារអាមេរិក</span>
                                    )
                                    <br> 
                                <span style="font-family:Khmer OS System">ធនាគារ / Bank:</span>
                                <span style="font-family:Khmer OS System;font-weight:bold;font-size:14px"> <b> ABA: 000457077 SAN ROTHSING <br> ACLIDA: 34512075730311 SAN ROTHSING</b></span>
                                <br>       
                                 <!-- <span class="f-kh">ប្រាក់ដែលបានបង់ៈ</span>
                                    <span class="horizontal_dotted_lines" style=";min-width: 100px">&nbsp;​$ <?php echo e(number_format( $payment_schedule->paid,2)); ?> </span>​ 
                                (
                                    <span class="horizontal_dotted_lines" style=";min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord($payment_schedule->paid,2)); ?>ដុល្លារអាមេរិក</span>
                                    )
                               <br>
                               <span class="f-kh">ប្រាក់ដែលនៅសល់</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 100px">&nbsp;​$ <?php echo e(number_format($balance_amount,2)); ?> </span>​ 
                                (
                                    <span class="horizontal_dotted_lines" style=";min-width: 270px;font-family:Khmer OS System">&nbsp;​<?php echo e(AppHelper::khNumberWord($balance_amount,2)); ?>ដុល្លារអាមេរិក</span>
                                    )  -->
                                <?php if(!empty($payment_transaction->remark)): ?>
                                <span class="f-kh" style="color: red;font-weight:">កំណត់ចំណាំ: <?php echo e($payment_transaction->remark); ?></span>
                                <?php endif; ?>
                                <br>
                                <span class="f-kh">កាលបរិច្ឆេទបង់ប្រាក់ថ្ងៃទី</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 30px;font-family:Khmer OS System">&nbsp;​<?php echo e($paid_day_number); ?> </span>
                                <span class="f-kh">ខែ</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 60px;font-family:Khmer OS System">&nbsp;<?php echo e($paid_month); ?> </span>
                                <span class="f-kh">ឆ្នាំ</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 50px;font-family:Khmer OS System">&nbsp;<?php echo e($paid_year); ?> </span>
                                
                                
                                
                              
                            </p>
                        </div>
                        <div class="footer">
                            <div class="row f-kh" style="margin: 0px;padding: 0px;">
                                <!-- <div class="col-sm-5" style="overflow: hidden;">
                                    <p style="overflow: hidden; float: right;">
                                        <span>សៀមរាប, ថ្ងៃទី​</span>
                                        <span class="horizontal_dotted_lines" style=";min-width: 25px">&nbsp;<?php echo e($paid_day_number); ?> </span>
                                        <span class="f-kh">ខែ</span>
                                        <span class="horizontal_dotted_lines" style=";min-width: 60px">&nbsp;<?php echo e($paid_month); ?> </span>
                                        <span class="f-kh">ឆ្នាំ</span>
                                        <span class="horizontal_dotted_lines" style=";min-width: 70px">&nbsp;<?php echo e($paid_year); ?> </span>
                                    </p>
                                </div> -->
                                <div class="col-sm-4  text-left" style="margin-left:120px">
                                    <span class="f-kh">អ្នកប្រគល់ / Pay by:</span><br><br><br>
                                    <span>ឈ្មោះ / Name: <b><?php echo e($customer->last_name.' '.$customer->first_name); ?></b> <br> Tel: <b><?php echo e($customer->phone1.' / '.$customer->phone2); ?></b></span>
                                </div>
                                <div class="col-sm-4  text-center" style="margin-left:100px">
                                    <span class="f-kh">អ្នកទទួល(បេឡាករ) / Receive by:</span><br><br><br>
                                    <span>ឈ្មោះ / Name :.................................. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel: ...........................................</span>
                                </div>
                                <div class="col-md-12 mt-4" style="background:#22228e;color:white; text-align: center; margin-top: 40px;">
                                    <p class="f-kh p-footer" style="margin-bottom: 12px;">ការិយាល័យលក់៖ ភូមិល្អក់ ឃុំ​​ កណ្តែក  ស្រុក ​ប្រាសាទបាគង ខេត្តសៀមរាប លេខទូរស័ព្ទ៖ 077 333 156 , 081 333 156</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4" style="text-align: center;">
                        <button class="btn btn-small btn-primary" style="width: 180mm;" id="btn_print" type=""><i class="fa fa-print"></i><?php echo e(__('item.print')); ?></button>
                    </div>
                    <?php if($can_redirect_back): ?>
                        <?php if($property): ?>
                        <div class="col-md-12 mt-2" style="text-align: center;">
                            <a class="btn btn-small btn-danger" style="width: 180mm;" href="<?php echo e(route('sale_property.view_sale', ['property'=>$property->id])); ?>"><i class="fa fa-angle-left"></i><?php echo e(__('item.back')); ?></a>
                        </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="col-md-12 mt-2" style="text-align: center;"><?php echo e($can_redirect_back); ?>

                            <button class="btn btn-small btn-danger" style="width: 180mm;" onclick="window.close();" type=""><i class="fa fa-close"></i><?php echo e(__('item.close')); ?></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/jquery-3.2.1.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/popper.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('back-end/js/main.js')); ?>"></script>

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
</body>
</html>