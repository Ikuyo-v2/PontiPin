@extends('layout.app')
@section('title', $title)
@section('content')


<main class="max-w-6xl mx-auto px-6 md:px-10 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

    <div class="lg:col-span-2 space-y-12">
        <section>
            <img src="{{ $cafe->image_url }}" alt="{{ $cafe->name }}" class="w-full h-72 rounded-2xl object-cover">
            <div class="mt-5">
                <h1 class="font-display text-4xl font-semibold">{{ $cafe->name }}</h1>
                @if ($cafe->subtitle)
                    <p class="text-ink/65 mt-2">{{ $cafe->subtitle }}</p>
                @endif
                <p class="text-sm text-ink/60 mt-3">
                    <span class="text-amber-500">★★★★★</span>
                    {{ number_format((float) $cafe->rating, 1) }}
                    <span class="mx-1">·</span>
                    {{ $cafe->location }}
                </p>
                @if (! empty($cafe->tag_list))
                    <div class="flex flex-wrap gap-2 mt-4">
                        @foreach ($cafe->tag_list as $tag)
                            <span class="text-xs bg-cream text-ink/70 px-3 py-1.5 rounded-full">{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <section>
            <h2 class="font-display text-2xl font-semibold mb-4">About</h2>
            <p class="text-ink/80 leading-relaxed mb-4 max-w-prose">
                {{ $cafe->description ?: $cafe->subtitle ?: 'No description available.' }}
            </p>
            <div class="flex flex-wrap gap-6 text-sm text-ink/70">
                @if ($cafe->address)
                    <span class="flex items-center gap-1.5">
                        <span class="text-rust">📍</span> {{ $cafe->address }}
                    </span>
                @endif
                <span class="flex items-center gap-1.5">
                    <span class="text-rust">📍</span> {{ $cafe->location }}
                </span>
                @if ($cafe->opening_hours)
                    <span class="flex items-center gap-1.5">
                        <span class="text-rust">🕒</span> {{ $cafe->opening_hours }}
                    </span>
                @endif
            </div>
        </section>

        <section>
            <h2 class="font-display text-2xl font-semibold mb-4">Menu &amp; Prices</h2>
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach (collect(['All'])->concat($menuCategories) as $category)
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
                @forelse ($menus as $menu)
                    <div class="menu-item bg-white rounded-2xl p-3 flex gap-3 shadow-sm" data-category="{{ $menu->category ?? 'Other' }}">
                        <img src="{{ $menu->image_url }}" class="w-16 h-16 rounded-xl object-cover shrink-0" alt="{{ $menu->name }}" />
                        <div class="flex-1">
                            <div class="flex justify-between items-start gap-2">
                                <h3 class="font-semibold text-sm">{{ $menu->name }}</h3>
                                <span class="text-rust font-semibold text-sm whitespace-nowrap">Rp {{ number_format((float) $menu->price, 0, ',', '.') }}</span>
                            </div>
                            <p class="text-xs text-ink/60 mt-1 leading-snug">{{ $menu->description }}</p>
                            @if ($menu->category)
                                <span class="text-[10px] tracking-wide text-ink/40 font-medium mt-1 inline-block">{{ strtoupper($menu->category) }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="sm:col-span-2 text-sm text-ink/55">No menu items have been added yet.</p>
                @endforelse
            </div>
        </section>

        <section>
            <h2 class="font-display text-2xl font-semibold mb-4">Reviews <span class="text-ink/40 font-sans text-lg font-normal">({{ $reviews->count() }})</span></h2>

            @if (session('success'))
                <p class="mb-4 rounded-xl bg-green-50 p-3 text-sm text-green-800" role="status">{{ session('success') }}</p>
            @endif

            <div class="bg-white rounded-2xl p-6 shadow-sm mb-4">
                <h3 class="font-semibold mb-3">Share your experience</h3>
                @auth
                    <form method="POST" action="{{ route('cafe-page.reviews.store', $cafe) }}">
                        @csrf
                        <fieldset class="mb-4">
                            <legend class="mb-1 text-sm font-medium">Your rating</legend>
                            <div class="review-rating flex flex-row-reverse justify-end gap-1 text-2xl">
                                @for ($rating = 5; $rating >= 1; $rating--)
                                    <input
                                        class="sr-only"
                                        id="review-rating-{{ $rating }}"
                                        type="radio"
                                        name="rating"
                                        value="{{ $rating }}"
                                        aria-label="{{ $rating }} out of 5 stars"
                                        @checked((int) old('rating') === $rating)
                                        required>
                                    <label class="star cursor-pointer" for="review-rating-{{ $rating }}">★</label>
                                @endfor
                            </div>
                            @error('rating')
                                <p class="mt-1 text-sm text-red-600" role="alert">{{ $message }}</p>
                            @enderror
                        </fieldset>
                        <label class="sr-only" for="review-text">Your review</label>
                        <textarea
                            class="w-full resize-none rounded-xl border border-ink/10 p-3 text-sm text-ink/80 placeholder:text-ink/40 focus:outline-none focus:ring-2 focus:ring-rust/40"
                            id="review-text"
                            name="review"
                            rows="3"
                            maxlength="2000"
                            placeholder="How was the coffee, the vibe, the Wi-Fi?"
                            required>{{ old('review') }}</textarea>
                        @error('review')
                            <p class="mt-1 text-sm text-red-600" role="alert">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="mt-4 rounded-full bg-rust px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-rustdark">
                            Submit review
                        </button>
                    </form>
                @else
                    <p class="text-sm text-ink/60">
                        <a class="font-semibold text-rust hover:underline" href="{{ route('login') }}">Sign in</a> to submit a review.
                    </p>
                @endauth
            </div>

            @forelse ($reviews as $review)
                <div class="bg-white rounded-2xl p-6 shadow-sm mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-ink/10 flex items-center justify-center text-sm font-semibold">{{ mb_substr($review->user->name, 0, 1) }}</div>
                            <div>
                                <p class="font-semibold text-sm">{{ $review->user->name }}</p>
                                <p class="text-xs text-ink/50">{{ $review->created_at->format('Y-m-d') }}</p>
                            </div>
                        </div>
                        <div class="text-amber-500 text-sm" aria-label="Rated {{ $review->rating }} out of 5">
                            @for ($star = 1; $star <= 5; $star++)
                                <span class="{{ $star <= (int) $review->rating ? '' : 'text-ink/20' }}">★</span>
                            @endfor
                        </div>
                    </div>
                    <p class="text-sm text-ink/80 mt-2">{{ $review->review }}</p>
                </div>
            @empty
                <p class="text-sm text-ink/55">No reviews have been added yet.</p>
            @endforelse
        </section>
    </div>

    <aside class="space-y-6">
        @if ($cafe->latitude !== null && $cafe->longitude !== null)
            <div id="cafe-map" class="w-full h-48 rounded-xl overflow-hidden z-0"
                data-lat="{{ $cafe->latitude }}"
                data-lng="{{ $cafe->longitude }}"
                data-name="{{ $cafe->name }}">
            </div>
        @else
            <div class="w-full h-48 rounded-xl bg-white flex items-center justify-center text-sm text-ink/55">
                Map coordinates are not available.
            </div>
        @endif

        <div class="bg-white rounded-2xl p-5 shadow-sm">
            <h3 class="font-display text-lg font-semibold mb-4">Facilities</h3>
            <div class="flex flex-wrap gap-2">
                @forelse ($facilities as $facility)
                    <span class="text-xs bg-cream text-ink/70 px-3 py-1.5 rounded-full">✓ {{ $facility }}</span>
                @empty
                    <span class="text-xs text-ink/55">No facilities listed.</span>
                @endforelse
            </div>
        </div>
    </aside>
</main>
@endsection
