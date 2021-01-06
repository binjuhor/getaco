@extends('layouts.app')

@section('content')

<form action="{{ url('app/user/permission') }}" id="formrole" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 text-left report_header">
                <div><h2>Role</h2></div>
                <div class="report_title">Note that the right to add edit del always comes with view permissions !</div>
            </div>
            <div class="col-xs-6 text-right report_header">
                <button type="submit" class="btn btn-primary btn_save">Save Change</button>
            </div>
        </div>
        <div class="col-md-12">
            <div class="report_line"></div>
        </div>
    </div>

    <div class="row content_table">
        <div class="col-md-12">
         @foreach($group as $rows)
         <div class="row"><h3>{{ $rows['name_group'] }}</h3></div>
         <table class="table" id="table_format" style="margin-bottom: 40px; margin-top: 25px">
            <thead>
                <tr>
                    <th class="col-md-6" style="text-align: center;">FUNCTION</th>
                    <th class="col-md-2" style="text-align: center;">LOW</th>
                    <th class="col-md-2" style="text-align: center;">MEDIUM</th>
                    <th class="col-md-2" style="text-align: center;">HIGH</th>
                </tr>
            </thead>
            <tbody >
                <?php $i = 0; ?>
            @foreach($role as $key)
            @if($key['id_group'] == $rows['id_group'])
            <?php $i++; ?>
                <tr>
                    <td class="permission_content"><a class="btn-link name">{{ $key['title'] }}</a></td>

                    @for($i=4 ; $i>=2; $i--)
                    <td style="text-align: center;"><input type="checkbox" 
                        id="{{ $key['id'].'role'.$i }}" 
                        name="{{ $key['id'].'role'.$i }}" 
                        value="{{ $key['id'] }}" 
                        {{ isset($key['role'.$i])&&$key['role'.$i] == 1?"checked":"" }}
                        >
                        <label class="lable label_format" for="{{ $key['id'].'role'.$i }}">&nbsp</label>
                    </td>
                    @endfor
                </tr>
            @endif
            @endforeach
            </tbody>
            
        </table>

        @endforeach
    </div>
</div>
</form>
@endsection
