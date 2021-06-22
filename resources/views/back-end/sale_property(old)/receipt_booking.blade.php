@php
    use App\Helpers\AppHelper;
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <link rel="icon" type="image/png" href="{{ Setting::get('ICON') }}" sizes="32x32">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('back-end/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('back-end/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('back-end/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('back-end/css/listswap.css')}}">

    <link rel="stylesheet" href="{{URL::asset('back-end/css/normalize.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('back-end/css/planit.css')}}"/>
    <style type="text/css" id="stylePrint">
        @font-face{
            font-family: 'Khmer OS Muol Light';
            src: url('{{ asset('public/back-end/fonts/print-font/KhmerOSmuollight.ttf') }}') format("truetype");
        }
        @font-face{
            font-family: 'Khmer OS System';
            src: url('{{ asset('public/back-end/fonts/print-font/KhmerOSsys.ttf') }}') format("truetype");
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
        @media print{
            
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
    <div style="width: 188mm; margin:auto; color: black !important;">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="content-printer clearfix" id="table_print" style="background: #a59b9b1f">
                        <div class="header">
                            <div class="logo" style="margin-left:10px">
                                <img src="{{Setting::get('LOGO')}}" width="100%" height="100%">
                            </div>
                            <div class="title">
                                <p style="margin-bottom: 0; font-family: Khmer OS Muol Light;margin-k">ក្រុមហ៊ុន​ រដ្ឋ ស៊ីង អចលនទ្រព្យ</p>
                                <p class="p-border-bottom" style="font-weight:bold;display:inline-block;border-bottom:2px solid #22228e;padding-bottom:1px;">RothSing Real Estate Co,ltd</p>
                            </div>
                            <div class="title">
                                <p style="margin-bottom: 0;"><span style="font-family: Khmer OS Muol Light;">បង្កាន់ដៃទទួលប្រាក់</span></p>
                            </div>
                        </div>

                        @php
                        $gender ="ស្រី";
                        if($customer->sex==1){
                            $gender = 'ប្រុស';
                        }
                        $old = '';
                        $old= $customer->age;
                        $price = 0;
                        $price *=1;
                        $paid = $payment_transaction->amount*1;
                        $paid_date=$payment_transaction->payment_date;
                        $paid_day_number = AppHelper::khMultipleNumber(date('d', strtotime($paid_date)));
                        $paid_month = AppHelper::khMonth(date('m', strtotime($paid_date)));
                        $paid_year = AppHelper::khMultipleNumber(date('Y', strtotime($paid_date)));
                        $paid_day_number_next='';
                        $paid_month_next='';
                        $paid_year_next='';
                        $paid_date_next=$reservation->date_expire;
                        $paid_day_number_next = AppHelper::khMultipleNumber(date('d', strtotime($paid_date_next)));
                        $paid_month_next = AppHelper::khMonth(date('m', strtotime($paid_date_next)));
                        $paid_year_next = AppHelper::khMultipleNumber(date('Y', strtotime($paid_date_next)));
                        @endphp

                        <div class="body">
                            {{-- <p>&nbsp;</p> --}}
                            <p class="text-justify f-kh" style="text-align: justify-all;">
                                <span class="f-kh">ឈ្មោះអតិថិជនៈ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 170px">&nbsp;{{ $customer->last_name.' '.$customer->first_name }} </span>
                                <br>
                                <span class="f-kh">ឡាតាំង</span>
                                <span class="horizontal_dotted_lines" style="min-width: 195px">&nbsp;{{ strtoupper($customer->last_name_en.' '.$customer->first_name_en) }} </span>
                                <span class="f-kh">ភេទៈ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 60px">&nbsp;{{ $gender }} </span>
                                <span class="f-kh">អាយុៈ</span><span class="horizontal_dotted_lines" style="min-width: 30px">&nbsp;{{$old}}</span>
                                <span class="f-kh">ឆ្នាំ</span>
                                <br>
                                <span class="f-kh">លេខទូរស័ព្ទ &nbsp;:</span>
                                <span class="horizontal_dotted_lines" style=";min-width: 170px">&nbsp;{{ $customer->phone1.' / '.$customer->phone2 }} </span>
                                <br>
                                <span class="f-kh">អាស័យដ្ឋានបច្ចុប្បន្ន​ &nbsp;:</span>
                                <span style="min-width: 170px">&nbsp;ផ្លូវលេខ <b>{{ $customer->street_number }}</b> ផ្ទះលេខ <b>{{$customer->house_number}}</b>  ភូមិ <b> {{$address-> dis_kh}}  </b> ឃុំ/សង្កាត់ <b>{{$address->com_kh}}</b>  ​ស្រុក/ខណ្ឌ <b>{{$address->dis_kh }}</b> រាជធានី/ខេត្ត <b>{{$address->prov_name}}</b>  </span>
                                <br>
                                <span class="f-kh">កាន់អត្តសញ្ញាណប័ណ្ណលេខៈ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 140px">&nbsp;{{$customer->identity}}</span>
                                <br>
                                <span class="f-kh">បានទិញផ្ទះ/ដីឡូត៍លេខៈ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 100px">&nbsp;{{$property->property_no}}</span>
                                {{-- <span class="f-kh">ផ្លូវលេខៈ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 70px">&nbsp;{{$property->address_number}}</span> --}}
                                <br>    
                                <span class="f-kh">គម្រោងៈ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 150px">&nbsp;{{ $project->property_name }} </span>
                                <br>
                                <span class="f-kh">តម្លៃផ្ទះ/ដីឡូត៍ៈ​</span>
                                <span class="horizontal_dotted_lines" style="min-width: 10px">&nbsp;​${{ number_format($property->property_price,2) }} </span>
                                (
                                <span class="horizontal_dotted_lines" style="min-width: 160px">&nbsp;​{{ AppHelper::khNumberWord($property->property_price) }}ដុល្លារអាមេរិក</span>
                                )
                                <br>
                                <span class="f-kh">ទឹកប្រាក់ដែលបានកក់</span>
                                <span class="horizontal_dotted_lines" style="min-width: 20px">&nbsp;​${{ number_format($paid,2) }} </span>
                                (
                                <span class="horizontal_dotted_lines" style="min-width: 60px">&nbsp;​{{ AppHelper::khNumberWord($paid) }}ដុល្លារអាមេរិក</span>
                                )
                                <br>

                                <span class="f-kh">កាលបរិច្ឆេទបង់ប្រាក់ថ្ងៃទី</span>
                                <span class="horizontal_dotted_lines" style="min-width: 30px">&nbsp;​{{ $paid_day_number }} </span>
                                <span class="f-kh">ខែ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 75px">&nbsp;{{ $paid_month }} </span>
                                <span class="f-kh">ឆ្នាំ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 50px">&nbsp;{{ $paid_year }} </span>
                                <span class="f-kh">កាលបរិច្ឆេទត្រូវផុតកំណត់</span>
                                <span class="horizontal_dotted_lines" style="min-width: 30px">&nbsp;​{{ $paid_day_number_next }} </span>
                                <span class="f-kh">ខែ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 75px">&nbsp;{{ $paid_month_next }} </span>
                                <span class="f-kh">ឆ្នាំ</span>
                                <span class="horizontal_dotted_lines" style="min-width: 50px">&nbsp;{{ $paid_year_next }} </span>
                                <span class="f-kh">រាល់ការបង់ប្រាក់រួចមិនអាចដកវិញបានទេ។</span>
                            </p>
                        </div>
                        <div class="footer">
                            <div class="row f-kh" style="margin: 0px;padding: 0px;">
                                <div class="col-sm-12" style="overflow: hidden;">
                                    <p style="overflow: hidden; float: right;">
                                        <span>សៀមរាប, ថ្ងៃទី​</span>
                                        <span class="horizontal_dotted_lines" style="min-width: 25px">&nbsp;{{ $paid_day_number }} </span>
                                        <span class="f-kh">ខែ</span>
                                        <span class="horizontal_dotted_lines" style="min-width: 80px">&nbsp;{{ $paid_month }} </span>
                                        <span class="f-kh">ឆ្នាំ</span>
                                        <span class="horizontal_dotted_lines" style="min-width: 70px">&nbsp;{{ $paid_year }} </span>
                                    </p>
                                </div>
                                <div class="col-sm-6 col-mb-4 text-center">
                                    <span class="f-kh">ហត្ថលេខាអ្នកប្រគល់</span><br><br><br>
                                    <span>..........................</span>
                                </div>
                                <div class="col-sm-6 col-mb-4 text-center">
                                    <span class="f-kh">ហត្ថលេខាអ្នកទទួល</span><br><br><br>
                                    <span>..........................</span>
                                </div>
                                <div class="col-md-12" style="background: #22228e; color:white; text-align: center;">
                                    <p class="f-kh p-footer" style="margin-bottom: 12px; margin-top: 10px;">ការិយាល័យលក់៖ ភូមិល្អក់ ឃុំ​​ កណ្តែក  ស្រុក ​ប្រាសាទបាគង ខេត្តសៀមរាប លេខទូរស័ព្ទ៖ 077 333 156 , 081 333 156</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-4" style="text-align: center;">
                        <button class="btn btn-small btn-primary" style="width: 180mm;" id="btn_print" type=""><i class="fa fa-print"></i>{{ __('item.print') }}</button>
                    </div>
                    <div class="col-md-12 mt-2" style="text-align: center;">
                        <button class="btn btn-small btn-danger" style="width: 180mm;" onclick="window.close();" type=""><i class="fa fa-close"></i>{{ __('item.close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="{{URL::asset('back-end/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('back-end/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('back-end/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('back-end/js/main.js')}}"></script>

<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script type="text/javascript" src="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="https://pratikborsadiya.in/vali-admin/js/plugins/bootstrap-datepicker.min.js">
<script type="text/javascript" src="{{ asset('js/printThis.js')}}"></script>
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