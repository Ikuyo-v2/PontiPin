@extends('layout.app')

@section('title', $title)

@section('content')
<main class="max-w-6xl mx-auto px-6 md:px-10 py-12">

    <div class="mb-10">
        <h1 class="font-display text-3xl md:text-4xl font-semibold text-ink">Cafe Catalog</h1>
        <p class="mt-2 text-sm text-ink/60">Temukan kafe favoritmu di sekitar Pontianak.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($cafe as $item)
            <a href="{{ route('Home.show', $item['id']) }}"
               class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow block">

                <div class="h-40 w-full overflow-hidden bg-ink/5">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover" />
                </div>

                <div class="p-4">
                    <div class="flex items-start justify-between gap-2 mb-1">
                        <h2 class="font-display text-lg font-semibold text-ink">{{ $item['name'] }}</h2>
                        <span class="flex items-center gap-1 text-sm font-semibold text-ink shrink-0">
                            <span class="text-amber-500">★</span> {{ $item['rating'] }}
                        </span>
                    </div>

                    <p class="text-xs text-ink/60 flex items-center gap-1 mb-2">
                        <span class="text-rust">📍</span> {{ $item['location'] }}
                    </p>

                    <p class="text-sm text-ink/70 mb-3 leading-snug">{{ $item['subtitle'] }}</p>

                    <div class="flex flex-wrap gap-1.5">
                        @foreach (explode(',', $item['tags']) as $tag)
                            <span class="text-[10px] bg-cream text-ink/70 px-2.5 py-1 rounded-full">
                                {{ trim($tag) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </a>
        @endforeach
    </div>

</main>
@endsection