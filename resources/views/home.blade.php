<h1>Galton Board</h1>
@foreach ($containers as $container)
    <ul class="container">
        <span class="number">{{ sprintf("%02d", $container) }}</span>
        @for($i = 0; $i < $container; $i++)
            <li class="block"></li>
        @endfor
    </ul>
@endforeach

<style lang="scss">
    .container {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .block {
        padding: 0;
        margin: 0 -2px 0 !important;
        width:15px;
        height: 65px;
        background: #BADA55;
        display: inline-block;
    }

    .number {
        font-weight: 200;
        font-size: 1.4rem;
        padding-right: 15px;
    }
</style>