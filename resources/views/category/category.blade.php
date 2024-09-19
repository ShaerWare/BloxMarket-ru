@section('content')
    <h1>Все категории</h1>
    <table class="table table-bordered">
        <tr>
            <th width="30%">Наименование</th>
            <th width="65%">Описание</th>
            <th><i class="fas fa-edit"></i></th>
            <th><i class="fas fa-trash-alt"></i></th>
        </tr>
        @if (count($items))
    @php
        $level++;
    @endphp
    @foreach ($items as $item)
        <tr>
            <td>
                @if ($level)
                    {{ str_repeat('—', $level) }}
                @endif
                <a href="{{ route('admin.category.show', ['category' => $item->id]) }}"
                   style="font-weight:@if($level) normal @else bold @endif">
                    {{ $item->name }}
                </a>
            </td>
            <td>{{ iconv_substr($item->content, 0, 150) }}</td>
            <td>
                <a href="{{ route('category.edit', ['category' => $item->id]) }}">
                    <i class="far fa-edit"></i>
                </a>
            </td>
            <td>
                <form action="{{ route('category.destroy', ['category' => $item->id]) }}"
                      method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                        <i class="far fa-trash-alt text-danger"></i>
                    </button>
                </form>
            </td>
        </tr>
        @if ($item->children->count())
            @include('admin.category.part.tree', ['items' => $item->children, 'level' => $level])
        @endif
    @endforeach
@endif
        @include('admin.category.part.tree', ['items' => $category, 'level' => -1])
    </table>
@endsection
