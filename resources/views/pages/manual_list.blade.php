<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <!-- Lijst van de 5 populairste handleidingen -->

    <ul>
        @foreach ($topManuals as $topManual)
            <li>
                @if ($topManual->locally_available)
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $topManual->id }}/" alt="{{ $topManual->name }}" title="{{ $topManual->name }}">
                        {{ $topManual->name }}
                    </a>
                    ({{ $topManual->filesize_human_readable }})
                @else
                    <a href="{{ $topManual->url }}" target="new" alt="{{ $topManual->name }}" title="{{ $topManual->name }}">
                        {{ $topManual->name }}
                    </a>
                @endif
            </li>
        @endforeach
    </ul>

    <!-- Start Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($manuals as $manual)
            <div class="border p-4 rounded shadow hover:shadow-lg">
                @if ($manual->locally_available)
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">
                        {{ $manual->name }}
                    </a>
                    ({{ $manual->filesize_human_readable }})
                @else
                    <a href="{{ $manual->url }}" target="new" alt="{{ $manual->name }}" title="{{ $manual->name }}">
                        {{ $manual->name }}
                    </a>
                @endif
            </div>
        @endforeach
    </div>
    <!-- Einde Grid Layout -->

</x-layouts.app>
