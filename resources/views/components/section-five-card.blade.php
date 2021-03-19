<div class="linear-bg mx-auto py-4 px-3 text-center @if ($big)big d-md-flex @endif">
    <img class="h-75 my-auto" src="{{ $imgsrc }}" alt="image">
    @if (!$big)
        <div class="h-25 mt-4">
            <h4>{{ $title }}</h4>
        </div>
        <div class="h-25">
            <h5>{!!  $detail  !!}</h5>
        </div>
    @else
    <div class="h-xs-25">
        <div class="h-xs-50 h-md-25 mt-4">
            <h3>{{ $title }}</h3>
        </div>
        <div class="h-xs-50 h-md-25">
            <ul class="text-left">
                @foreach ($point as $item)
                <li><h5 class="py-1">{{ $item }}</h5></li>
                @endforeach
            </ul>
        </div>
    </div>
        
    @endif
</div>
