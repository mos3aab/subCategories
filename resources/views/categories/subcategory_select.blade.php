@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" {{ $test ? 'disabled':'' }} style="margin-left:100px;" {{$id==$subcategory->id?'selected':''}}>
        @for ($i = 0; $i <= $dataLevel; $i++)
            &nbsp;&nbsp;&nbsp;
        @endfor
        {{$subcategory->name}}
    </option>
    @if(count($subcategory->subcategory))
        @include('categories.subcategory_select',['subcategories' => $subcategory->subcategory, 'id' => $id, 'dataLevel' => $dataLevel + 1 ])
    @endif
@endforeach

