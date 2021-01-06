@extends('layouts.admin')
@section('content')
<div class="row header_list">
        <div class="col-md-6"><h2>PACKAGE LIST</h2></div>
        <div class="col-md-6 text-right">
            <a href="{{ action('PackageController@add') }}" class="btn btn-primary">
                <img src="">ADD PACKAGE</a>
            </div>
    </div>
    <div class="row content_table">
        <div class="col-md-12">
            <table class="table" id="table_format">
                <thead>
                <tr>
                    <th>ID</th>
							<th class="text-center">Package name</th>
							<th class="text-center">Feature</th>
							<th class="text-center">Action</th>
                </tr>
                </thead>

                <tbody>

                	@foreach ($packages as $index => $package )
						<tr>
							<td>{{ $package->id_package }}</td>
                            <td class="text-center">
                                {{ $package->name }}
                                @if($package->status === 'highlight')
                                    - Package highlight
                                @endif
                            </td>
							<td class="">
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
							</td>

							<td scope="col" class="text-center">
                            <a href="{{ action('PackageController@edit') }}?id={{$package->id_package}}"  title="Edit" class="btn-action btn-edit"></a>
                            <a href="{{ action('PackageController@delete') }}?id={{$package->id_package}}"  title="Delete" class="btn-action btn-delete action_delete"></a>
                        </td>
						</tr>
						@endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection