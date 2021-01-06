<div class="row">
    <table class="table">
        <thead>
          <tr>
            @foreach($labels as $label)
                <th>{{$label}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
                <tr>
                  @foreach($data as $value)
                    <td>{{$value}}</td>
                  @endforeach
                </tr>
            @endforeach
        </tbody>
  </table>
</div>