<form class="text-center btn-group" id="edit{{ $item->id }}" action="{{ route($route . '.destroy', $item->id) }}">

{{-- {{$route}} = categories --}}
    {{-- EDIT BUTTON --}}
    @if (isAdmin() || isPublisher())
    <button type="button" class="btn btn-warning btn-sm tooltip1"
         onclick="editForm('{{ route($route . '.edit', $item->id) }}', 'edit_form')"  data-bs-toggle="modal" data-bs-target="#edit"> 
        <i class="fas fa-edit"></i> <span> Edit {{ $page }} </span>
    </button>
    @else
    <button type="button" class="btn btn-warning btn-sm tooltip1"
    onclick="editForm('{{ route($route . '.edit', $item->id) }}', 'edit_form')"  data-bs-toggle="modal" data-bs-target="#edit"> 
   <i class="fas fa-edit"></i> <span> View {{ $page }} </span>
</button>
    @endif


    @if (isAdmin() || isPublisher())
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="button" id="delete{{ $item->id }}"
        onclick="deleteRow('edit{{ $item->id }}','delete{{ $item->id }}')" class="btn btn-danger btn-sm tooltip1"><i
            class="fas fa-trash-alt"></i> <span> Delete {{ $page }} </span>
    </button>

    <button type="button"
        onclick="changeStatus('{{ route($route . '.status', $item->id) }}','status{{ $item->id }}')"
        id="status{{ $item->id }}"
        class="btn {{ $item->status == 'active' ? 'btn-success' : 'btn-secondary' }}  btn-sm tooltip1">
        @if ($item->status == 'active')
            <i class="fas fa-check-circle"></i>
            <span> DeActivate {{ $page }} </span>
        @else
            <i class="fas fa-times-circle"></i>
            <span> Activate {{ $page }} </span>

        @endif
    </button>
    @endif
</form>



