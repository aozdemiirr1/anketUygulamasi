<ul>
    @foreach($anketler as $anket)
        <li>
            <strong>{{ $anket->soru }}</strong><br>
            <ul>
                @php
                    $secenekler = json_decode($anket->secenekler);
                @endphp
                @foreach($secenekler as $secenek)
                    <li>{{ $secenek }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
