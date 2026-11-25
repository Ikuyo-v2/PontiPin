@extends('layout.app')

@section('title', $title)

@section('content')

  <main class="bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-16 pb-20">
      
      <!-- Header Section (Sama persis dengan Style Home) -->
      <div class="mb-10">
        <p class="flex items-center gap-1.5 text-terracotta text-[13px] font-semibold tracking-wide mb-4">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/>
            <circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/>
          </svg>
          West Kalimantan, Indonesia
        </p>

        <h1 class="font-display text-4xl md:text-5xl text-ink mb-4">
          Explore Cafes in <span class="text-terracotta">Pontianak</span>
        </h1>

        <p class="text-ink/65 text-[17px] leading-relaxed max-w-xl">
          The equator city runs on coffee. Explore curated cafes across every district — browse menus, check prices, read honest reviews, and find your next favorite spot.
        </p>
      </div>

      <!-- Search & Filter Controls -->
      <form action="{{ route('explore-cafe.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
        @if ($filters['tag'] !== '')
          <input type="hidden" name="tag" value="{{ $filters['tag'] }}">
        @endif

        <div class="relative flex items-center bg-white rounded-full px-4 py-2 ring-1 ring-ink/10 shadow-sm">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-ink/40 shrink-0 mr-2.5" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
            <path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
          <input
            type="text"
            name="search"
            value="{{ $filters['search'] }}"
            placeholder="Search cafes by name..."
            class="w-full bg-transparent outline-none text-[15px] placeholder:text-ink/35 text-ink">
          <button type="submit" class="bg-terracotta hover:bg-terracotta/90 transition-colors text-white text-[13px] font-medium rounded-full px-4 py-1.5 ml-2 shrink-0 cursor-pointer">
            Search
          </button>
        </div>

        <div class="relative">
          <select name="location" onchange="this.form.submit()" class="w-full bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 shadow-sm outline-none appearance-none cursor-pointer">
            <option value="">Semua Wilayah</option>
            @foreach ($locations as $loc)
              <option value="{{ $loc }}" @selected($filters['location'] === $loc)>{{ $loc }}</option>
            @endforeach
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-ink/40">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>

        <div class="relative">
          <select name="sort" onchange="this.form.submit()" class="w-full bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 shadow-sm outline-none appearance-none cursor-pointer">
            <option value="populer" @selected($filters['sort'] === 'populer')>Paling Populer</option>
            <option value="rating" @selected($filters['sort'] === 'rating')>Rating Tertinggi</option>
            <option value="latest" @selected($filters['sort'] === 'latest')>Terbaru</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-ink/40">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>
      </form>

      @php
        $baseQuery = array_filter([
            'search' => $filters['search'] !== '' ? $filters['search'] : null,
            'location' => $filters['location'] !== '' ? $filters['location'] : null,
            'sort' => $filters['sort'] !== 'populer' ? $filters['sort'] : null,
        ]);
      @endphp

      <!-- Filter Categories -->
      <div class="flex flex-wrap gap-2.5 mb-10">
        <a
          href="{{ route('explore-cafe.index', $baseQuery) }}"
          class="{{ $filters['tag'] === '' ? 'bg-terracotta text-white font-medium shadow-sm' : 'bg-white hover:bg-sand text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40' }} rounded-full px-5 py-2 text-[14px] transition">
          Semua
        </a>
        @foreach ($availableTags as $tagName)
          <a
            href="{{ route('explore-cafe.index', array_merge($baseQuery, ['tag' => $tagName])) }}"
            class="{{ $filters['tag'] === $tagName ? 'bg-terracotta text-white font-medium shadow-sm' : 'bg-white hover:bg-sand text-ink/80 ring-1 ring-ink/10 hover:ring-terracotta/40' }} rounded-full px-5 py-2 text-[14px] transition">
            {{ $tagName }}
          </a>
        @endforeach
      </div>

      <!-- Cafe Cards Grid -->
      <div class="grid md:grid-cols-3 gap-6">
        @forelse ($cafes as $cafe)
          @include('layout.partials.cafe-card', ['cafe' => $cafe])
        @empty
          <div class="col-span-full bg-white rounded-2xl ring-1 ring-ink/5 p-12 text-center text-ink/50 text-[15px]">
            <p>Tidak ada cafe yang ditemukan.</p>
            @if ($filters['search'] !== '' || $filters['location'] !== '' || $filters['tag'] !== '')
              <a href="{{ route('explore-cafe.index') }}" class="inline-block mt-3 text-terracotta font-medium hover:underline">Reset filter</a>
            @endif
          </div>
        @endforelse
      </div>

    </div>
  </main>

@endsection