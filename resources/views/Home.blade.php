<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PontiPin — Discover Cafes in Pontianak</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="styles.css">
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          cream: '#F6F2E9',
          sand: '#EFE7D8',
          espresso: '#2B2016',
          terracotta: '#C1603B',
          ink: '#2E2A24',
        },
        fontFamily: {
          serif: ['Fraunces', 'serif'],
          sans: ['Inter', 'sans-serif'],
        },
      },
    },
  };
</script>
</head>
<body class="bg-cream text-ink antialiased">

  <!-- Header -->
  <header class="border-b border-ink/10 bg-cream">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 lg:px-10 py-4">
      <div class="flex items-center gap-2.5">
        <span class="flex items-center justify-center w-9 h-9 rounded-full bg-espresso text-cream">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 10h14v4a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4v-4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
            <path d="M17 11h1.5a2.5 2.5 0 0 1 0 5H17" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M6 3c.5 1 .5 1.7 0 2.5M9.5 3c.5 1 .5 1.7 0 2.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
          </svg>
        </span>
        <span class="font-display text-xl text-ink">Ponti<span class="text-terracotta">Pin</span></span>
      </div>

      <nav class="hidden md:flex items-center gap-8 text-[15px] text-ink/70">
        <a href="#" class="text-ink font-medium">Home</a>
        <a href="#cafes" class="hover:text-ink transition-colors">Explore Cafes</a>
      </nav>

      <div class="flex items-center gap-2">
        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-terracotta text-white text-sm font-semibold">D</span>
        <span class="text-sm text-ink/70">d</span>
      </div>
    </div>
  </header>


  <section class="max-w-7xl mx-auto px-6 lg:px-10 pt-16 pb-20 grid lg:grid-cols-2 gap-14 items-center">
    <div>
      <p class="flex items-center gap-1.5 text-terracotta text-[13px] font-semibold tracking-wide mb-5">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/>
          <circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/>
        </svg>
        West Kalimantan, Indonesia
      </p>

      <h1 class="font-display text-6xl leading-[1.05] text-ink mb-6">
        Discover Cafes<br>in <span class="text-terracotta">Pontianak</span>
      </h1>

      <p class="text-ink/65 text-[17px] leading-relaxed max-w-md mb-8">
        The equator city runs on coffee. Explore curated cafes across every district — browse menus, check prices, read honest reviews, and find your next favorite spot.
      </p>

      <form class="flex items-center gap-2 bg-white rounded-full p-1.5 pl-5 max-w-lg shadow-sm ring-1 ring-ink/5 mb-6">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-ink/40 shrink-0" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
          <path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        <input type="text" placeholder="Search cafes by name..." class="flex-1 bg-transparent outline-none text-[15px] placeholder:text-ink/35 py-2">
        <button type="submit" class="bg-terracotta hover:bg-terracotta/90 transition-colors text-white text-[15px] font-medium rounded-full px-6 py-2.5">Search</button>
      </form>

      <div class="flex items-center gap-4 flex-wrap">
        <a href="#cafes" class="inline-flex items-center gap-2 bg-espresso hover:bg-ink transition-colors text-cream text-[15px] font-medium rounded-full px-6 py-3">
          Explore Cafes
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
        <p class="text-[14px] text-ink/60"><span class="font-semibold text-ink">8</span> cafes catalogued across <span class="font-semibold text-ink">6</span> districts</p>
      </div>
    </div>

    <div class="relative w-full h-[430px] hidden lg:block">
      <div class="absolute top-0 right-0 w-[92%] h-[380px] rounded-[28px] overflow-hidden shadow-lg ring-1 ring-ink/5">
        <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200&auto=format&fit=crop" alt="Cafe interior with tiled wall and marble tables" class="w-full h-full object-cover">
      </div>
      <div class="absolute bottom-0 left-0 w-[190px] h-[190px] rounded-[22px] overflow-hidden shadow-xl ring-4 ring-cream">
        <img src="https://images.unsplash.com/photo-1541167760496-1628856ab772?q=80&w=800&auto=format&fit=crop" alt="Latte art coffee cup" class="w-full h-full object-cover">
      </div>
    </div>
  </section>


  <section class="bg-sand">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
      <p class="text-terracotta text-[13px] font-semibold tracking-wide mb-3">Browse by vibe</p>
      <h2 class="font-display text-3xl md:text-4xl text-ink mb-8">What kind of cafe are you looking for?</h2>

      <div class="flex flex-wrap gap-3">
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8h14v5a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8Z" stroke="currentColor" stroke-width="1.6"/><path d="M17 9h1.5a2 2 0 0 1 0 4H17" stroke="currentColor" stroke-width="1.6"/></svg>
          Coffee Shop <span class="text-ink/40">(5)</span>
        </button>
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="5" width="18" height="11" rx="1.5" stroke="currentColor" stroke-width="1.6"/><path d="M2 19h20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
          Co-working Cafe <span class="text-ink/40">(2)</span>
        </button>
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 9a8 8 0 0 1 16 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M7.5 12a4.5 4.5 0 0 1 9 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="15.5" r="1.3" fill="currentColor"/></svg>
          Study-Friendly <span class="text-ink/40">(5)</span>
        </button>
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 4c-8 0-15 5-16 12 5 1 9-2 11-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><path d="M4 20c2-4 5-7 9-9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
          Outdoor Cafe <span class="text-ink/40">(2)</span>
        </button>
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3v2.5M12 18.5V21M3 12h2.5M18.5 12H21M6 6l1.6 1.6M16.4 16.4 18 18M18 6l-1.6 1.6M7.6 16.4 6 18" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
          Instagrammable <span class="text-ink/40">(3)</span>
        </button>
      </div>
      <div class="flex flex-wrap gap-3 mt-3">
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="6" width="18" height="12" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M3 10h18" stroke="currentColor" stroke-width="1.6"/></svg>
          Affordable Cafe <span class="text-ink/40">(3)</span>
        </button>
        <button class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="1.6"/><path d="M12 7.5V12l3 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          24-Hour Cafe <span class="text-ink/40">(1)</span>
        </button>
      </div>
    </div>
  </section>


  <section id="cafes" class="bg-cream">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-20">
      <div class="flex items-end justify-between mb-8">
        <div>
          <p class="text-terracotta text-[13px] font-semibold tracking-wide mb-3">Community favorites</p>
          <h2 class="font-display text-3xl md:text-4xl text-ink">Popular right now</h2>
        </div>
        <a href="#" class="hidden sm:inline-flex items-center gap-1.5 text-terracotta text-[15px] font-medium hover:underline">
          View all
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <div class="grid md:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <article class="bg-white rounded-2xl overflow-hidden ring-1 ring-ink/5 shadow-sm">
          <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=900&auto=format&fit=crop" alt="Kedai Kopi Aming interior" class="w-full h-48 object-cover">
          <div class="p-5">
            <div class="flex items-center justify-between mb-2">
              <h3 class="font-display text-xl text-ink">Kedai Kopi Aming</h3>
              <span class="flex items-center gap-1 text-[13px] font-semibold text-ink bg-amber-50 rounded-full px-2.5 py-1">
                <span class="text-amber-500">★★★★★</span> 4.8
              </span>
            </div>
            <p class="text-ink/60 text-[14px] leading-relaxed mb-4">
              Legendary old-school Pontianak coffee stall serving robusta since decades ago — strong, cheap, and…
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Coffee Shop</span>
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Affordable Cafe</span>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-ink/10">
              <span class="flex items-center gap-1 text-[13px] text-ink/55">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/></svg>
                Pontianak Kota
              </span>
              <a href="#" class="text-terracotta text-[13px] font-medium inline-flex items-center gap-1 hover:underline">View Details →</a>
            </div>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="bg-white rounded-2xl overflow-hidden ring-1 ring-ink/5 shadow-sm">
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=900&auto=format&fit=crop" alt="Kopi Khatulistiwa interior" class="w-full h-48 object-cover">
          <div class="p-5">
            <div class="flex items-center justify-between mb-2">
              <h3 class="font-display text-xl text-ink">Kopi Khatulistiwa</h3>
              <span class="flex items-center gap-1 text-[13px] font-semibold text-ink bg-amber-50 rounded-full px-2.5 py-1">
                <span class="text-amber-500">★★★★★</span> 4.7
              </span>
            </div>
            <p class="text-ink/60 text-[14px] leading-relaxed mb-4">
              A warm specialty coffee house near the Equator Monument, roasting single-origin Kalimantan beans…
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Coffee Shop</span>
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Instagrammable</span>
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Study-Friendly</span>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-ink/10">
              <span class="flex items-center gap-1 text-[13px] text-ink/55">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/></svg>
                Pontianak Kota
              </span>
              <a href="#" class="text-terracotta text-[13px] font-medium inline-flex items-center gap-1 hover:underline">View Details →</a>
            </div>
          </div>
        </article>


        <article class="bg-white rounded-2xl overflow-hidden ring-1 ring-ink/5 shadow-sm">
          <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=900&auto=format&fit=crop" alt="Ruang Seduh cafe storefront at night" class="w-full h-48 object-cover">
          <div class="p-5">
            <div class="flex items-center justify-between mb-2">
              <h3 class="font-display text-xl text-ink">Ruang Seduh</h3>
              <span class="flex items-center gap-1 text-[13px] font-semibold text-ink bg-amber-50 rounded-full px-2.5 py-1">
                <span class="text-amber-500">★★★★★</span> 4.6
              </span>
            </div>
            <p class="text-ink/60 text-[14px] leading-relaxed mb-4">
              Minimalist co-working cafe with long communal tables, plenty of outlets, and a quiet zone for deep…
            </p>
            <div class="flex flex-wrap gap-2 mb-4">
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Co-working Cafe</span>
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Study-Friendly</span>
              <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">Coffee Shop</span>
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-ink/10">
              <span class="flex items-center gap-1 text-[13px] text-ink/55">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/><circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/></svg>
                Pontianak Selatan
              </span>
              <a href="#" class="text-terracotta text-[13px] font-medium inline-flex items-center gap-1 hover:underline">View Details →</a>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-espresso text-cream/70">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-14 flex flex-col md:flex-row md:items-start md:justify-between gap-8">
      <div class="max-w-sm">
        <div class="flex items-center gap-2.5 mb-4">
          <span class="flex items-center justify-center w-8 h-8 rounded-full bg-terracotta text-white">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3 10h14v4a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4v-4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
              <path d="M17 11h1.5a2.5 2.5 0 0 1 0 5H17" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
            </svg>
          </span>
          <span class="font-display text-lg text-cream">PontiPin</span>
        </div>
        <p class="text-[14px] leading-relaxed">
          A digital catalog of cafes across Pontianak, West Kalimantan. Discover, explore, and sip your way through the equator city.
        </p>
      </div>
      <p class="text-[13px] text-cream/50 md:pt-1">Currently covering Pontianak only · Built with coffee</p>
    </div>
  </footer>

</body>
</html>