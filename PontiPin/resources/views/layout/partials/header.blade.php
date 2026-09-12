{{-- Navbar --}}
<header class="flex items-center justify-between px-6 md:px-10 py-4 bg-cream">
    <div class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-md bg-ink text-cream flex items-center justify-center text-sm">☕</div>
        <span class="font-display text-lg font-semibold">KopiPontianak</span>
    </div>
    <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-ink/80">
        <a href="#" class="hover:text-ink">Home</a>
        <a href="#" class="hover:text-ink">Explore Cafes</a>
    </nav>
    <div class="flex items-center gap-2 bg-white rounded-full pl-1 pr-3 py-1 shadow-sm">
        <div class="w-7 h-7 rounded-full bg-rust text-white flex items-center justify-center text-xs font-semibold">D</div>
        <span class="text-sm font-medium">dd</span>
    </div>
</header>

{{-- Hero --}}
<section class="relative h-[420px] md:h-[520px] overflow-hidden">
    <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=1800&auto=format&fit=crop"
         alt="Kedai Kopi Aming interior"
         class="absolute inset-0 w-full h-full object-cover" />
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-black/10"></div>

    <div class="relative h-full flex flex-col justify-end px-6 md:px-12 pb-8 max-w-5xl">
        <a href="#" class="text-white/90 text-sm font-medium mb-4 flex items-center gap-1 w-fit">
            <span>&larr;</span> All cafes
        </a>
        <h1 class="font-display text-4xl md:text-6xl text-white font-semibold mb-4">Kedai Kopi Aming</h1>
        <div class="flex flex-wrap items-center gap-3">
            <span class="flex items-center gap-1 bg-white rounded-full px-3 py-1 text-sm font-semibold">
                <span class="text-amber-500">★</span> 4.8
            </span>
            <span class="bg-black/40 text-white text-sm rounded-full px-3 py-1">Coffee Shop</span>
            <span class="bg-black/40 text-white text-sm rounded-full px-3 py-1">Affordable Cafe</span>
        </div>
    </div>
</section>