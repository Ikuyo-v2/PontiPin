@extends('layout.app')
@section('title', $title)
@section('content')


<main class="max-w-6xl mx-auto px-6 md:px-10 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

    <div class="lg:col-span-2 space-y-12">
        <section>
            <h2 class="font-display text-2xl font-semibold mb-4">About</h2>
            <p class="text-ink/80 leading-relaxed mb-4 max-w-prose">
                Legendary old-school Pontianak coffee stall serving robusta since decades ago —
                strong, cheap, and authentic.
            </p>
            <div class="flex flex-wrap gap-6 text-sm text-ink/70">
                <span class="flex items-center gap-1.5">
                    <span class="text-rust">📍</span> Pontianak Kota
                </span>
                <span class="flex items-center gap-1.5">
                    <span class="text-rust">🕒</span> 05.30 – 17.00 WIB
                </span>
            </div>
        </section>

        <section>
            <h2 class="font-display text-2xl font-semibold mb-4">Menu &amp; Prices</h2>
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach (['All', 'Coffee', 'Snacks', 'Tea'] as $category)
                    <button
                        type="button"
                        data-menu-filter="{{ $category }}"
                        class="menu-filter px-4 py-1.5 rounded-full text-sm font-medium border border-ink/10 {{ $category === 'All' ? 'bg-rust text-white' : 'bg-white text-ink/80' }}"
                        aria-pressed="{{ $category === 'All' ? 'true' : 'false' }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                @foreach ($menus as $menu)
                @php
                    $menuCategory = is_array($menu) ? ($menu['category'] ?? 'Other') : ($menu->category ?? 'Other');
                    $menuName = is_array($menu) ? $menu['name'] : $menu->name;
                    $menuPrice = is_array($menu) ? $menu['price'] : $menu->price;
                    $menuImage = is_array($menu) ? $menu['image'] : $menu->image;
                    $menuDescription = is_array($menu) ? $menu['description'] : $menu->description;
                @endphp
                <div class="menu-item bg-white rounded-2xl p-3 flex gap-3 shadow-sm" data-category="{{ $menuCategory }}">
                    <img src="{{ $menuImage }}" class="w-16 h-16 rounded-xl object-cover shrink-0" alt="{{ $menuName }}" />
                    <div class="flex-1">
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="font-semibold text-sm">{{ $menuName }}</h3>
                            <span class="text-rust font-semibold text-sm whitespace-nowrap">Rp {{ number_format((float) $menuPrice, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-xs text-ink/60 mt-1 leading-snug">{{ $menuDescription }}</p>
                        <span class="text-[10px] tracking-wide text-ink/40 font-medium mt-1 inline-block">{{ strtoupper($menuCategory) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section>
            <h2 class="font-display text-2xl font-semibold mb-4">Reviews <span class="text-ink/40 font-sans text-lg font-normal">(1)</span></h2>

            <div class="bg-white rounded-2xl p-6 shadow-sm mb-4">
                <h3 class="font-semibold mb-3">Share your experience</h3>
                <div class="flex gap-1 text-2xl mb-4" aria-label="Star rating input">
                    <span class="star filled">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                </div>
                <textarea
                    class="w-full border border-ink/10 rounded-xl p-3 text-sm text-ink/80 placeholder:text-ink/40 focus:outline-none focus:ring-2 focus:ring-rust/40 resize-none"
                    rows="3"
                    placeholder="How was the coffee, the vibe, the Wi-Fi?"></textarea>
                <button class="mt-4 bg-rust hover:bg-rustdark transition-colors text-white text-sm font-semibold px-5 py-2.5 rounded-full">
                    Submit review
                </button>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-ink/10 flex items-center justify-center text-sm font-semibold">S</div>
                        <div>
                            <p class="font-semibold text-sm">Sinta Maharani</p>
                            <p class="text-xs text-ink/50">2026-05-10</p>
                        </div>
                    </div>
                    <div class="text-amber-500 text-sm">★★★★★</div>
                </div>
                <p class="text-sm text-ink/80 mt-2">A Pontianak institution. Kopi susu for 10k and it beats most fancy cafes.</p>
            </div>
        </section>
    </div>

    <aside class="space-y-6">
        <div id="cafe-map" class="w-full h-48 rounded-xl overflow-hidden z-0"
            data-lat="{{ $cafe['latitude'] ?? -0.0263 }}"
            data-lng="{{ $cafe['longitude'] ?? 109.3425 }}"
            data-name="{{ $cafe['name'] ?? 'Cafe Location' }}">
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-sm">
            <h3 class="font-display text-lg font-semibold mb-4">Facilities</h3>
            <div class="flex flex-wrap gap-2">
                <span class="text-xs bg-cream text-ink/70 px-3 py-1.5 rounded-full">✓ Parking</span>
                <span class="text-xs bg-cream text-ink/70 px-3 py-1.5 rounded-full">✓ Smoking Area</span>
                <span class="text-xs bg-cream text-ink/70 px-3 py-1.5 rounded-full">✓ Indoor Seating</span>
            </div>
        </div>
    </aside>
</main>
@endsection