@extends('layouts.admin')

@section('content')
<div class="row header_list">
  <div class="col-md-6"><h2>List bought package</h2></div>
  <div class="col-md-6 text-right">
  </div>
</div>
<div class="row content_table">
  <div class="col-md-12">
    <table class="table" id="table_format">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Company</th>
          <th>Package</th>
          <th>Expiry date</th>
          <th>Total</th>
        </tr>
      </thead>

      <tbody>
        @foreach($buy as $key=>$val)
        <tr>
          <td>{{ $key+1 }}</td>

          <td>{{ $val->name }}</td>

          <td>{{ $val->mail }}</td>

          <td>{{ $val->phone }}</td>
          <td>
            @foreach($cpn as $cp)

            @if($val->id_company == $cp->id_company)
            {{ $cp->company_name }}
            @endif

            @endforeach
          </td>
          <td>
            @foreach($pk as $p)
            @if($val->id_package == $p->id_package)
            {{ $p->name }}
            @endif
            @endforeach
          </td>
          <td>{{ $val->lim }}</td>
          <td>{{ number_format($val->total) }} đ</td>
        </tr>
        @endforeach
      </tbody>
    </table><br>
    <div class="col-md-12 text-right"><b style="font-size: 20px;">Revenue:  {{ number_format($sum_pay) }} đ</b></div>
  </div>
</div>
@endsection
