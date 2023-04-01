@foreach($subcategories as $subcategory)
<tr id="cat_{{$subcategory->id}}">
        <td data-column="name">
            <span class="treegrid-indent" style="width:{{$dataLevel*30}}px">
            </span>
            {{$subcategory->name}}
        </td>
        <td>{{ $subcategory->description }}</td>
        <td>{{$subcategory->updated_at->todatestring()}}</td>
        <td>
            <a href="/category/edit/{{$subcategory->id}}"  class='mdi mdi-pencil-plus'></a>
            <a href="#" cat-id="{{$subcategory->id}}" data-target="doc-cat-delete-row" class='mdi mdi-delete'></a>
        </td>
</tr>
@if(count($subcategory->subcategory))
    @include('categories.subcategory_view',['subcategories' => $subcategory->subcategory, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel+1 ])
@endif
@endforeach
