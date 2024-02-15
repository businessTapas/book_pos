@auth
    @if (Route::currentRouteName() != 'pos.index')
        @if (auth()->user()->type == 'admin')
            @include('include.sidebar.admin')
        @elseif (auth()->user()->type == 'central-store')
            @include('include.sidebar.central')
        @elseif (auth()->user()->type == 'retail-store')
            @include('include.sidebar.retail')
        @elseif (auth()->user()->type == 'publisher')
            @include('include.sidebar.supplier')
        @endif
    @endif
@endauth
