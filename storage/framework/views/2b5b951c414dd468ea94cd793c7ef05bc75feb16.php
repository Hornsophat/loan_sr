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
            margin-left: 0px;
        }
        .logo img{
            width: 100px;
            height: auto;
        }
        .kh{
            font-family:Khmer OS;
            font-weight:bold;
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
<?php 
  $paid_day_number = AppHelper::khMultipleNumber(date('d', strtotime($general_expense->date)));
  $paid_month = AppHelper::khMonth(date('m', strtotime($general_expense->date)));
  $paid_year = AppHelper::khMultipleNumber(date('Y', strtotime($general_expense->date)));
?>                     
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
                                <p style="margin-bottom: 0; font-family: Khmer OS Muol Light;font-size:14px">ក្រុម​ហ៊ុន រដ្ឋ ស៊ីង អចលនទ្រព្យ</p>
                                <p class="p-border-bottom" style="display:inline-block;font-family:Time New Roman;font-size:15px;font-weight: bold;">RothSing Real Estate Co,ltd</p>
                            </div>
                            <div class="title">
                                <p><span style="font-family: Khmer OS Muol Light;">ប័ណ្ណទទួលប្រាក់ / RECEIPT</span></p>
                            </div>
                            </div>
                            <span class="f-kh">កាលបរិច្ឆេទ:</span>
                            <span class="horizontal_dotted_lines" style="min-width: 200px">&nbsp;<?= $general_expense->date ?></span>
                            <br>
                            <span class="f-kh">ចំណងជើង:</span>
                            <span class="horizontal_dotted_lines" style="min-width: 195px">&nbsp;<?= $general_expense->title ?></span>
                            <br>
                            <span class="f-kh">ប្រភេទ:</span>
                            <span class="horizontal_dotted_lines" style="min-width: 170px">&nbsp;<?= $general_expense->name ?></span>
                            <br>
                            <span class="f-kh">គម្រោងអចលនទ្រព្យ:</span>
                            <span class="horizontal_dotted_lines" style="min-width: 250px">&nbsp;<?= $general_expense->property_name ?></span>
                            <br>
                            <span class="f-kh">គ្រប់គ្រងព័តមានបុគ្គលិក:</span>
                            <span class="horizontal_dotted_lines" style="min-width: 270px">&nbsp;<?= $general_expense->employee_name ?></span>
                            <br>
                            <span class="f-kh">ចំនួនទឹកប្រាក់ ($):</span>
                            <span class="horizontal_dotted_lines" style="min-width: 230px">&nbsp;<?= $general_expense->amount ?></span>
                            <br>
                            <span class="f-kh">បរិយាយ:</span>
                            <span class="horizontal_dotted_lines" style="min-width: 178px">&nbsp;<?= $general_expense->description ?></span>
                            <div>
                                    <p style="margin-left:100px">
                                        <span class="f-kh">សៀមរាប, ថ្ងៃទី​</span>
                                        <span class="horizontal_dotted_lines" style=";min-width: 25px">&nbsp;<?php echo e($paid_day_number); ?> </span>
                                        <span class="f-kh">ខែ</span>
                                        <span class="horizontal_dotted_lines" style=";min-width: 60px">&nbsp;<?php echo e($paid_month); ?> </span>
                                        <span class="f-kh">ឆ្នាំ</span>
                                        <span class="horizontal_dotted_lines" style=";min-width: 70px">&nbsp;<?php echo e($paid_year); ?> </span>
                                    </p>
                                </div> 
                                <div class="col-sm-4  text-left" style="margin-left:180px">
                                    <span class="f-kh">ប្រធានផ្នែកហិរញ្ញវត្ថុ</span><br><br><br>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-12 mt-4" style="text-align: center;">
                        <button class="btn btn-small btn-primary" style="width: 180mm;" id="btn_print" type=""><i class="fa fa-print"></i><?php echo e(__('item.print')); ?></button>
                    </div>
                    <div class="col-md-12 mt-2" style="text-align: center;">
                            <a class="btn btn-small btn-danger" style="width: 180mm;" href="<?php echo e(route('general_expenses')); ?>"><i class="fa fa-angle-left"></i><?php echo e(__('item.back')); ?></a>
                        </div>
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