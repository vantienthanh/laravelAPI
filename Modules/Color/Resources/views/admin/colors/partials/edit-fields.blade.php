<div class="box-body">
    <span>Color name</span><input type="text" name="name" id="name" class="form-control" value="{{$color->name}}">
    <br>
    <span>Select color</span><input type="color" name="code" id="code" class="form-control" value="{{$color->code}}">
    <br>
    <select name="status" id="status" class="form-control">
        <option value="0">Hidden</option>
        <option value="1">Show</option>
    </select>
</div>
