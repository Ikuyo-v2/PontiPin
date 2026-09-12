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
                <button class="px-4 py-1.5 rounded-full bg-rust text-white text-sm font-medium">All</button>
                <button class="px-4 py-1.5 rounded-full bg-white text-ink/80 text-sm font-medium border border-ink/10">Coffee</button>
                <button class="px-4 py-1.5 rounded-full bg-white text-ink/80 text-sm font-medium border border-ink/10">Snacks</button>
                <button class="px-4 py-1.5 rounded-full bg-white text-ink/80 text-sm font-medium border border-ink/10">Tea</button>
            </div>

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="bg-white rounded-2xl p-3 flex gap-3 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=200&auto=format&fit=crop" class="w-16 h-16 rounded-xl object-cover shrink-0" alt="Kopi O Panas" />
                    <div class="flex-1">
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="font-semibold text-sm">Kopi O Panas</h3>
                            <span class="text-rust font-semibold text-sm whitespace-nowrap">Rp 8.000</span>
                        </div>
                        <p class="text-xs text-ink/60 mt-1 leading-snug">Classic black robusta, brewed the old way.</p>
                        <span class="text-[10px] tracking-wide text-ink/40 font-medium mt-1 inline-block">COFFEE</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-3 flex gap-3 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=200&auto=format&fit=crop" class="w-16 h-16 rounded-xl object-cover shrink-0" alt="Kopi Susu Aming" />
                    <div class="flex-1">
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="font-semibold text-sm">Kopi Susu Aming</h3>
                            <span class="text-rust font-semibold text-sm whitespace-nowrap">Rp 10.000</span>
                        </div>
                        <p class="text-xs text-ink/60 mt-1 leading-snug">Robusta with condensed milk, sweet and strong.</p>
                        <span class="text-[10px] tracking-wide text-ink/40 font-medium mt-1 inline-block">COFFEE</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-3 flex gap-3 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1587049352846-4a222e784d38?q=80&w=200&auto=format&fit=crop" class="w-16 h-16 rounded-xl object-cover shrink-0" alt="Roti Srikaya" />
                    <div class="flex-1">
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="font-semibold text-sm">Roti Srikaya</h3>
                            <span class="text-rust font-semibold text-sm whitespace-nowrap">Rp 12.000</span>
                        </div>
                        <p class="text-xs text-ink/60 mt-1 leading-snug">Toasted bread with homemade kaya jam.</p>
                        <span class="text-[10px] tracking-wide text-ink/40 font-medium mt-1 inline-block">SNACKS</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-3 flex gap-3 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1499638673689-79a0b5115d87?q=80&w=200&auto=format&fit=crop" class="w-16 h-16 rounded-xl object-cover shrink-0" alt="Teh Obeng" />
                    <div class="flex-1">
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="font-semibold text-sm">Teh Obeng</h3>
                            <span class="text-rust font-semibold text-sm whitespace-nowrap">Rp 6.000</span>
                        </div>
                        <p class="text-xs text-ink/60 mt-1 leading-snug">Iced sweet tea, Pontianak style.</p>
                        <span class="text-[10px] tracking-wide text-ink/40 font-medium mt-1 inline-block">TEA</span>
                    </div>
                </div>
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
        <div class="bg-white rounded-2xl p-5 shadow-sm">
            <h3 class="font-display text-lg font-semibold mb-4">Location</h3>
            <div class="rounded-xl overflow-hidden mb-4 relative">
                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=600&auto=format&fit=crop" class="w-full h-40 object-cover" alt="Map preview" />
                <div class="absolute inset-0 flex items-center justify-center">
                    <span class="text-3xl drop-shadow">📍</span>
                </div>
            </div>
            <p class="text-sm text-ink/70 flex items-start gap-1.5 mb-4">
                <span class="text-rust mt-0.5">📍</span> Jl. HOS Cokroaminoto No. 5, Pontianak
            </p>
            <button class="w-full bg-rust hover:bg-rustdark transition-colors text-white text-sm font-semibold py-2.5 rounded-full flex items-center justify-center gap-2">
                <span>➤</span> Get Directions
            </button>
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
