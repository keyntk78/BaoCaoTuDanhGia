<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ $controller->href }}">{{ $controller->name }}</a></li>
        @if (empty($childAction))
        <li class="breadcrumb-item active" aria-current="page">{{ $action->name }}</li>
        @else
        <li class="breadcrumb-item"><a href="{{ $action->href }}">{{ $action->name }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $childAction->name }}</li>
        @endif
    </ol>
</nav>
