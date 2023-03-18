<div class="d-sm-flex align-items-baseline mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $controller->name }}</h1>
    <small class="ml-2 font-italic">{{ $action->name }}</small>
    @if (!empty($childAction))
    <small class="ml-2 font-italic">({{ $childAction->name }})</small>
    @endif
</div>
