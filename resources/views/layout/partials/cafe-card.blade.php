<article class="bg-white rounded-2xl overflow-hidden ring-1 ring-ink/5 shadow-sm flex flex-col justify-between">
  <div>
    <img src="{{ $cafe->image_url }}" alt="{{ $cafe->name }}" class="w-full h-48 object-cover" onerror="this.src='{{ asset('images/cafe1.webp') }}'">

    <div class="p-5">
      <div class="flex items-center justify-between gap-2 mb-2">
        <h3 class="font-display text-xl text-ink">{{ $cafe->name }}</h3>
        <span class="flex items-center gap-1 shrink-0 text-[13px] font-semibold text-ink bg-amber-50 rounded-full px-2.5 py-1">
          <span class="text-amber-500">★★★★★</span> {{ number_format((float) $cafe->rating, 1) }}
        </span>
      </div>

      <p class="text-ink/60 text-[14px] leading-relaxed mb-4">
        {{ \Illuminate\Support\Str::limit($cafe->description ?: $cafe->subtitle ?: 'Discover this Pontianak cafe spot.', 110) }}
      </p>

      @if (! empty($cafe->tag_list))
        <div class="flex flex-wrap gap-2 mb-4">
          @foreach (array_slice($cafe->tag_list, 0, 3) as $tag)
            <span class="text-[13px] bg-sand text-ink/70 rounded-full px-3 py-1">{{ $tag }}</span>
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
      {{ $cafe->location }}
    </span>
    <a href="{{ route('cafe-page.show', $cafe->id) }}" class="text-terracotta text-[13px] font-medium inline-flex items-center gap-1 hover:underline">
      View Details →
    </a>
  </div>
</article>
