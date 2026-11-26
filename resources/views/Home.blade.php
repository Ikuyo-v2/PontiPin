@extends('layout.app')

@section('title', $title)

@section('content')

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
        The Khatulistiwa city runs on coffee. Explore curated cafes across every district. browse menus, check prices, read honest reviews, and find your next favorite spot.
      </p>

      <form action="{{ route('explore-cafe.index') }}" method="GET" class="flex items-center gap-2 bg-white rounded-full p-1.5 pl-5 max-w-lg shadow-sm ring-1 ring-ink/5 mb-6">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-ink/40 shrink-0" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
          <path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
        </svg>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search cafes by name..." class="flex-1 bg-transparent outline-none text-[15px] placeholder:text-ink/35 py-2">
        <button type="submit" class="bg-terracotta hover:bg-terracotta/90 transition-colors text-white text-[15px] font-medium rounded-full px-6 py-2.5 cursor-pointer">Search</button>
      </form>

      <div class="flex items-center gap-4 flex-wrap">
        <a href="#cafes" class="inline-flex items-center gap-2 bg-espresso hover:bg-ink transition-colors text-cream text-[15px] font-medium rounded-full px-6 py-3">
          Explore Cafes
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
        <p class="text-[14px] text-ink/60">
          <span class="font-semibold text-ink">{{ $totalCafes }}</span> {{ \Illuminate\Support\Str::plural('cafe', $totalCafes) }} catalogued across
          <span class="font-semibold text-ink">{{ $totalDistricts }}</span> {{ \Illuminate\Support\Str::plural('district', $totalDistricts) }}
        </p>
      </div>
    </div>

    <div class="relative w-full h-[430px] hidden lg:block">
      <div class="absolute top-0 right-0 w-[92%] h-[380px] rounded-[28px] overflow-hidden shadow-lg ring-1 ring-ink/5">
        <img src="{{ asset('images/cafe1.webp') }}" alt="Cafe interior with tiled wall and marble tables" class="w-full h-full object-cover">
      </div>
      <div class="absolute bottom-0 left-0 w-[190px] h-[190px] rounded-[22px] overflow-hidden shadow-xl ring-4 ring-cream">
        <img src="{{ asset('images/cafe2.avif') }}" alt="Latte art coffee cup" class="w-full h-full object-cover">
      </div>
    </div>
  </section>


  <section class="bg-sand">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-16">
      <p class="text-terracotta text-[13px] font-semibold tracking-wide mb-3">Browse by vibe</p>
      <h2 class="font-display text-3xl md:text-4xl text-ink mb-8">What kind of cafe are you looking for?</h2>

      <div class="flex flex-wrap gap-3">
        @forelse ($vibes as $vibe)
          <a href="{{ route('explore-cafe.index', ['tag' => $vibe['name']]) }}" class="inline-flex items-center gap-2 bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40 transition">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 8h14v5a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8Z" stroke="currentColor" stroke-width="1.6"/><path d="M17 9h1.5a2 2 0 0 1 0 4H17" stroke="currentColor" stroke-width="1.6"/></svg>
            {{ $vibe['name'] }} <span class="text-ink/40">({{ $vibe['count'] }})</span>
          </a>
        @empty
          <p class="text-[15px] text-ink/55">No cafe vibes catalogued yet.</p>
        @endforelse
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
        <a href="{{ route('explore-cafe.index') }}" class="hidden sm:inline-flex items-center gap-1.5 text-terracotta text-[15px] font-medium hover:underline">
          View all
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      <div class="grid md:grid-cols-3 gap-6">
        @forelse ($popularCafes as $cafe)
          @include('layout.partials.cafe-card', ['cafe' => $cafe])
        @empty
          <div class="col-span-full bg-white rounded-2xl ring-1 ring-ink/5 p-12 text-center text-ink/50 text-[15px]">
            No cafes available yet.
          </div>
        @endforelse
      </div>
    </div>
  </section>

@endsection