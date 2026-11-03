@extends('layout.app')

@section('title', $title)

@section('content')

  <main class="bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-14 pb-20">
      
      <!-- Header Section -->
      <div class="mb-8">
        <p class="flex items-center gap-1.5 text-terracotta text-[13px] font-semibold tracking-wide mb-3">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/>
            <circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/>
          </svg>
          PONTIANAK ONLY
        </p>
        <h1 class="font-display text-4xl md:text-5xl text-ink mb-3">Explore Cafes</h1>
        <p class="text-ink/65 text-[16px] max-w-xl">
          Daftar cafe pilihan di sekitar Kota Pontianak. Cari menu, harga, dan temukan tempat ngopi terbaik favoritmu.
        </p>
      </div>

      <!-- Search & Filter Controls -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-6">
        <div class="relative flex items-center bg-white rounded-full px-4 py-2.5 ring-1 ring-ink/10 shadow-sm">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-ink/40 shrink-0 mr-2.5" xmlns="http://www.w3.org/2000/svg">
            <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="1.8"/>
            <path d="m20 20-3.5-3.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
          </svg>
          <input type="text" placeholder="Cari cafe..." class="w-full bg-transparent outline-none text-[15px] placeholder:text-ink/40 text-ink">
        </div>

        <div class="relative">
          <select class="w-full bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 shadow-sm outline-none appearance-none cursor-pointer">
            <option value="">Semua Wilayah</option>
            <option value="pontianak-kota">Pontianak Kota</option>
            <option value="pontianak-selatan">Pontianak Selatan</option>
            <option value="pontianak-barat">Pontianak Barat</option>
            <option value="pontianak-timur">Pontianak Timur</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-ink/40">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>

        <div class="relative">
          <select class="w-full bg-white rounded-full px-5 py-3 text-[15px] text-ink/80 ring-1 ring-ink/10 shadow-sm outline-none appearance-none cursor-pointer">
            <option value="populer">Paling Populer</option>
            <option value="rating">Rating Tertinggi</option>
            <option value="abjad">Nama (A-Z)</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-ink/40">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
          </div>
        </div>
      </div>

      <!-- Category Filter Pills -->
      <div class="flex flex-wrap gap-2.5 mb-10">
        <button class="bg-terracotta text-white font-medium rounded-full px-5 py-2 text-[14px] transition shadow-sm">Semua</button>
        <button class="bg-white hover:bg-sand text-ink/80 rounded-full px-5 py-2 text-[14px] ring-1 ring-ink/10 hover:ring-terracotta/40 transition">Coffee Shop</button>
        <button class="bg-white hover:bg-sand text-ink/80 rounded-full px-5 py-2 text-[14px] ring-1 ring-ink/10 hover:ring-terracotta/40 transition">Co-working Cafe</button>
        <button class="bg-white hover:bg-sand text-ink/80 rounded-full px-5 py-2 text-[14px] ring-1 ring-ink/10 hover:ring-terracotta/40 transition">Study-Friendly</button>
        <button class="bg-white hover:bg-sand text-ink/80 rounded-full px-5 py-2 text-[14px] ring-1 ring-ink/10 hover:ring-terracotta/40 transition">Outdoor Cafe</button>
        <button class="bg-white hover:bg-sand text-ink/80 rounded-full px-5 py-2 text-[14px] ring-1 ring-ink/10 hover:ring-terracotta/40 transition">Instagrammable</button>
        <button class="bg-white hover:bg-sand text-ink/80 rounded-full px-5 py-2 text-[14px] ring-1 ring-ink/10 hover:ring-terracotta/40 transition">Affordable Cafe</button>
      </div>

      <!-- Dynamic Cards Grid -->
      <div class="grid md:grid-cols-3 gap-6">

        @forelse ($cafe as $item)
          <article class="bg-white rounded-2xl overflow-hidden ring-1 ring-ink/5 shadow-sm flex flex-col justify-between transition hover:shadow-md">
            <div>
              <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-48 object-cover">
              
              <div class="p-5">
                <div class="flex items-center justify-between mb-2">
                  <h3 class="font-display text-xl text-ink">{{ $item['name'] }}</h3>
                  <span class="flex items-center gap-1 text-[13px] font-semibold text-ink bg-amber-50 rounded-full px-2.5 py-1 shrink-0">
                    <span class="text-amber-500">★</span> {{ number_format($item['rating'], 1) }}
                  </span>
                </div>

                <p class="text-ink/60 text-[14px] leading-relaxed mb-4 line-clamp-2">
                  {{ $item['description'] ?? $item['subtitle'] }}
                </p>

                @if (!empty($item['tags']))
                  <div class="flex flex-wrap gap-2 mb-4">
                    @php
                      $tags = is_array($item['tags']) ? $item['tags'] : explode(',', $item['tags']);
                    @endphp
                    @foreach ($tags as $tag)
                      <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">{{ trim($tag) }}</span>
                    @endforeach
                  </div>
                @endif
              </div>
            </div>

            <div class="p-5 pt-4 border-t border-ink/10 flex items-center justify-between">
              <span class="flex items-center gap-1 text-[13px] text-ink/55">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 21s7-6.2 7-12a7 7 0 1 0-14 0c0 5.8 7 12 7 12Z" stroke="currentColor" stroke-width="1.7"/>
                  <circle cx="12" cy="9" r="2.4" stroke="currentColor" stroke-width="1.7"/>
                </svg>
                {{ $item['location'] }}
              </span>
              <a href="{{ url('/explore/' . $item['id']) }}" class="text-terracotta text-[13px] font-medium inline-flex items-center gap-1 hover:underline">
                View Details →
              </a>
            </div>
          </article>
        @empty
          <div class="col-span-full bg-white rounded-2xl ring-1 ring-ink/5 p-12 text-center text-ink/50 text-[15px]">
            Tidak ada cafe yang sesuai dengan pencarian.
          </div>
        @endforelse

      </div>

    </div>
  </main>

@endsection