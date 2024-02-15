<form class="text-center" id="edit{{ $item->id }}" action="{{ route($route . '.destroy', $item->id) }}">


    {{-- EDIT BUTTON --}}
    <a type="button" class="btn btn-warning btn-sm tooltip1" href="{{ route($route . '.edit', $item->id) }}">
        <i class="fas fa-edit"></i> <span> Edit {{ $page }} </span>
    </a>

    @csrf


    <select type="button" id="status{{ $item->id }}" class="btn btn-primary  btn-sm tooltip1">
        <option {{ $item->status == 'pedding' ? 'selected' : '' }} value="{{ $item->status }}">{{ $item->status }}</option>


    </select>
</form>
