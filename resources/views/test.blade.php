@extends('welcome')
@section('content')
@csrf
<div class="row">
    <div class="form-group col-md-3">
        <label for="parent" class="form-label">{{ __('Category') }}</label>
        <select class="form-control selectcategory"  name="category" required focus>
            <option value="" disabled selected>select Category</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{ $category->name }}</option>
            @if(count($category->subcategory))
            @include('categories.subcategory_select',['subcategories' => $category->subcategory, 'id' => 0,'test'=>1, 'dataLevel' => 1 ])
            @endif
            @endforeach
        </select>
    </div>
</div>
<script>
    $(document).ready(function () {
        getChild();
        function getChild() {
        $('.selectcategory').change(function () {
        var id=$(this).val();
        var token = $("input[name='_token").val();
        $.ajax({
            method: 'get',
            url: "/test/getChild/"+id,
            data: {id:id},
            dataType: "json",
            success: function (response) {
                // console.log(response.data);
                var data =response.data;
                if(data.length == 0) {
                    alert('End of Child Tree');
                    return false;
                }
                var html = '<div class="form-group col-md-3">'+
                '<label for="parent" class="form-label">Child Category</label>'+
                '<select class="form-control selectcategory"  name="category" required focus>'+
                    '<option value="" disabled selected>select Category</option>';
                    data.forEach(item => {
                        html+="<option value='" + item.id + "'>" + item.name + "</option>";
                    });
                html+= '</select></div>';
                $('.row').append(html);
                getChild();
                return false;
            }

        });
        });
        }
    });
</script>
@endsection
