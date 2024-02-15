
<form class="text-center" id="adjust{{ $item->id }}" action="{{ route($route . '.destroy', $item->id) }}">

`       @if (!empty($item->adjust_master_stock))
                
        <a type="button"
        href="{{ route('view.adjust.stock', [$item->id]) }}"
        id="status{{ $item->id }}"
        class="btn btn-primary' btn-md tooltip1">

        <i class="fas fa-view"></i>
            <span> View Adjustment </span>
        </a>
        @endif
        <a type="button"
        href="{{ route('adjust.stock', $item->id) }}"
        id="status{{ $item->id }}"
        class="btn btn-secondary btn-sm tooltip1">
        <i class="fa-solid fa-wrench"></i>
            <span> Adjust </span>
        </a>
</form>
