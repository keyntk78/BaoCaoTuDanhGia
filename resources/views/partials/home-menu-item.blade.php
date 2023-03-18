@php
    $bgColor = 'primary';
    switch ($color) {
        case 1:
            $bgColor = 'primary';
            break;
        case 2:
            $bgColor = 'secondary';
            break;
        case 3:
            $bgColor = 'success';
            break;
        case 4:
            $bgColor = 'danger';
            break;
        case 5:
            $bgColor = 'warning';
            break;
        case 6:
            $bgColor = 'info';
            break;
        default:
            $bgColor = 'dark';
            break;
    }
@endphp
<div class="col-xl-3 col-md-6 mb-4">
    <a class="card home-card hover-{{$bgColor}} border-left-{{$bgColor}} shadow h-100 py-2 stretched-link" href="{{ route($route) }}"">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="h5 mb-0 font-weight-bold text-{{$bgColor}} text-uppercase">{{ $title }}</div>
                </div>
                <div class="col-auto">
                    <i class="{{ $icon }} fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </a>
</div>
