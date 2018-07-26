@foreach ($containers as $container)
    <div class="container">
        {{ sprintf("%02d",$container) }} :
        @for($i = 0; $i < $container; $i++)
            |
        @endfor
    </div>
@endforeach