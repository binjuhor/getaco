@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">List trash element</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>id form</th>
                            <th>type</th>
                            <th>label</th>
                            <th>value</th>
                            <th>sort order</th>
                            <th>required</th>
                            <th>validate</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($elements as $element)
                        <tr>
                            <td>{{ $element['id_form'] }}</td>
                            <td>{{ $element['element_type'] }}
                                @if($element['element_type'] == 'checkbox' || $element['element_type'] == 'select' || $element['element_type'] == 'radio')
                                    <a href="item?id={{ $element['id_element'] }}">option</a>
                                @endif
                            </td>
                            <td>{{ $element['element_label'] }}</td>
                            <td>{{ $element['element_value'] }}</td>
                            <td>{{ $element['sort_order'] }}</td>
                            <td>{{ $element['element_required'] }}</td>
                            <td>{{ $element['element_validate'] }}</td>
                            
                            <td><a href="unTrash?id={{ $element['id_element'] }}">untrash</a></td>
                            <td><a href="delete?id={{ $element['id_element'] }}">delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection