@extends('layouts.layout_setting')
@section('content_setting')
    <div class="row plans sub_plan">
        <div class="info_subscription">
            @if($sort_pay != 0)
                @foreach($pay as $val)
                    <?php $endtime = $val->lim;  ?>
                @endforeach
                <?php
                $startTime = date("Y-m-d");
                $hieu_so = abs(strtotime($startTime) - strtotime($endtime));
                $nam = floor($hieu_so / (365*60*60*24));
                $thang = floor(($hieu_so - $nam * 365*60*60*24) / (30*60*60*24));
                $ngay = floor(($hieu_so - $nam * 365*60*60*24 - $thang*30*60*60*24)/ (60*60*24));
                $tong_so_ngay = $nam*365 + $thang*30 + $ngay;
                ?>

                <div class="info_subscription">
                    <h1>{{ $tong_so_ngay }} <small>DAY</small></h1>
                    <span>Number of days left before the copyright expires</span>
                </div>
            @endif
        </div>
        <div class="detail_subscription">
            @foreach ($packages as $index => $package )
                <div class="col-md-6 tex-center item">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $package->name }}
                            @if($package->status === 'highlight')
                                - Package highlight
                            @endif
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach ($package->feature as $num => $feature )
                                    <li>
                                        {{ $feature->name }}
                                        @if (trim($feature['status'])=='yes')
                                            <i class="fa fa-check"></i>
                                        @else
                                            <i class="fa fa-times"></i>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <a class="btn btn-primary " href="{{ URL::action('PackageController@order') }}?id= {{ $package->id_package }}" data-packid="{{$package->id_package}}">
                                @if($sort_pay == 0)
                                    <span>Buy now {{$package['origin_price']}} vnđ</span>
                                @else
                                    <span>gia hạn {{$package['origin_price']}} vnđ</span>
                                @endif
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="footer_subscription text-center">
            <span><u><a href="{{ asset('diff#xemthemtinhnang')}}">So sánh tính năng các gói ?</a></u></span>
        </div>

    </div>
@endsection
@section('extra_footer')
    <script src="{{asset('/js/getaco.js')}}"></script>
@endsection
