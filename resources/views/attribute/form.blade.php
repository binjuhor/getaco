 <form action="{{ URL::action('CustomerAttributeController@add') }}"
 class="form-horizonal form-row-seperated" method="POST" enctype="multipart/form-data" id="form_add_attribute">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <?php 
 $user = Auth::User();
 use App\Orbit;
 $orbits = Orbit::all();
 ?>
 @if($user->id_role == 0)
 <label for="name" class="col-md-2 control-label">Business</label>
 <div class="col-md-10">
    <select name="orbit" id="" class="form-control" required="required">
        <option value="null" selected disabled>Lĩnh vực hoạt động</option>
        @foreach($orbits as $orbit)
        <option value="{{$orbit->id_orbit}}">{{$orbit->orbit}}</option>
        @endforeach
    </select>
</div>
@endif
<div class="form-group row ">
    <label for="name" class="col-md-2 control-label">Attribute name</label>
    <div class="col-md-10">
        <input type="text" id="name" class="form-control" placeholder="Attribute name"
        name="name" required autofocus>
    </div>
</div>

<div class="form-group row attribute_option">
    <label for="attribute_type" class="col-md-2 control-label">Attribute type</label>
    <div class="col-md-10">
        <select id="attribute_type" class="form-control" name="attribute_type" required autofocus>
           @foreach ($attributeType as $key => $attibute)
           <option value="{{ $key }}">{{ $attibute }}</option>
           @endforeach
       </select>
   </div>
</div>

<div class="form-group row">
    <label for="attribute_type" class="col-md-2 control-label">Use for</label>
    <div class="col-md-10">
        <select id="attribute_type" class="form-control" name="attribute_for" required autofocus>
           <option value="1" selected="">Customer</option>
           <option value="0">Other</option>
       </select>
   </div>
</div>

<div class="form-group row">
    <label for="status" class="col-md-2 control-label">Show profile</label>
    <div class="col-md-10">
        <select id="status" class="form-control" name="status" required autofocus>
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-9 col-md-offset-2">
        <button type="submit" class="btn btn-primary">Add Attribute</button>
    </div>
</div>

</form>