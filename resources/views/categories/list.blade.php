@extends('welcome')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Category List</h4>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if( isset($categories) )
                    <div class="card-box">
                        <h4 class="header-title"></h4>
                        <p class="sub-header"></p>
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Updated</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr id="cat_{{$category->id}}">
                                        <td data-column="name">{{$category->name}}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{$category->updated_at->todatestring()}}</td>
                                        <td>
                                            <a href="/category/edit/{{$category->id}}" class='mdi mdi-pencil-plus'></a>
                                            <a href="#" cat-id="{{$category->id}}" data-target="doc-cat-delete-row" class='mdi mdi-delete'></a>
                                        </td>
                                    </tr>
                                    @if(count($category->subcategory))
                                        @include('categories.subcategory_view',['subcategories' => $category->subcategory, 'dataParent' => $category->id , 'dataLevel' => 1])
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        deleteCategory();
    function deleteCategory() {
        $("a[data-target='doc-cat-delete-row']").on('click', function (e) {
            e.preventDefault();
            var id = $(this).attr("cat-id");
            var token = $("input[name='_token").val();
            var confirm = window.confirm('Are You Sure You wnat to delete this category?');
            if (confirm) {
                $.ajax({
                    url: '/category/delete/' + id,
                    method: 'post',
                    data: { _token: token },
                    success: function (data) {
                        data = JSON.parse(data);
                        if (data.success) {
                            $('#cat_' + id).remove();
                        } else {
                            alert(data.error);
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });
    }
    });
</script>
@endsection
