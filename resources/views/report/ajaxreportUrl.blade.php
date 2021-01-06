<table class="table table-noaction" id="table_format">
    <thead>
        <tr>
            <th class="text-left">URL NAME</th>
            <th class="text-center">VISISTOR</th>
            <th class="text-center">LEADS</th>
            <th class="text-center">CR%</th>
        </tr>
    </thead>
    @if($formInforURL->count())
    <tbody>
        @foreach ($formInforURL as $key=> $urlInfor)
        <tr>
            <td class="text-left"><a href="{{ isset($urlInfor->from_url)?$urlInfor->from_url:'N/a' }}" 
                class="btn-link name" target="_blank">{{ isset($urlInfor->from_url)?$urlInfor->from_url:'N/a' }}</a>
            </td>
            <td class="text-center">
                {{ $formLog->totalShowWithURL( $urlInfor->from_url ) }}
            </td>
            <td class="text-center">{{ $urlInfor->total }}</td>
            <td class="text-center">
                {{ $formLog->convertRate( $formLog->totalShowWithURL($urlInfor->from_url), $urlInfor->total) }}
            </td>           
        </tr>
        @endforeach
    </tbody>
    @endif
    @if(!$formInforURL->count())
    <tbody>
        <tr>
            <td class="text-center" colspan="4"><h3>No tracking data</h3> </td>
        </tr>
    </tbody>
    @endif

</table>