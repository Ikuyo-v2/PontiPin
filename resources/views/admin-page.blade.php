@extends('layout.app')

@section('title', $title)

@section('content')
<main class="flex-1 bg-cream">
    <div class="mx-auto max-w-7xl px-6 py-10 lg:px-10 lg:py-14">
        <header class="mb-8 flex flex-col gap-5 border-b border-ink/10 pb-8 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-2 text-[13px] font-semibold tracking-wide text-terracotta">PontiPin admin dashboard</p>
                <h1 class="font-display text-4xl leading-tight text-ink md:text-5xl">Overview</h1>
                <p class="mt-2 text-[15px] text-ink/60">Manage cafes, ratings, and community reviews.</p>
            </div>
            <a href="{{ url('/cafe-page/create') }}" class="inline-flex items-center justify-center gap-2 rounded-full bg-terracotta px-5 py-3 text-[15px] font-medium text-white transition-colors hover:bg-terracotta/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-terracotta focus-visible:ring-offset-2">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                </svg>
                Add cafe
            </a>
        </header>

        <section aria-label="Dashboard statistics" class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            {{-- Total cafes (Group 59.svg) --}}
            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand text-[#3A281C]">
                    <svg class="size-8" viewBox="0 0 64 64" fill="none" aria-hidden="true">
                        <defs>
                            <mask id="icon-cup-mask">
                                <rect width="64" height="64" fill="white"/>
                                <ellipse cx="30" cy="25.5" rx="13" ry="2.2" fill="black"/>
                                <path d="M14.5 42.5c2.8 5.2 8.6 8.5 15.5 8.5s12.7-3.3 15.5-8.5" stroke="black" stroke-width="3.2" stroke-linecap="round"/>
                            </mask>
                        </defs>
                        <path d="M24.5 19.5c0-2.2 2-3.2 2-5.5s-2-3.3-2-5.5M30.5 18c0-2.2 2-3.2 2-5.5s-2-3.3-2-5.5M36.5 19.5c0-2.2 2-3.2 2-5.5s-2-3.3-2-5.5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        <g mask="url(#icon-cup-mask)" fill="currentColor">
                            <ellipse cx="30" cy="49.5" rx="20.5" ry="6.5"/>
                            <path d="M13 25.5C13 23.8 20.6 22.5 30 22.5s17 1.3 17 3c0 13.5-7.2 23.5-17 23.5S13 39 13 25.5Z"/>
                            <path d="M45.5 28.5h2.2c4 0 7.3 3.1 7.3 7s-3.3 7-7.3 7h-3.2v-3.6h3c2 0 3.6-1.5 3.6-3.4s-1.6-3.4-3.6-3.4h-2v-3.6Z"/>
                        </g>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Total cafes</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ $totalCafes ?? 0 }}</p>
                </div>
            </article>

            {{-- Average rating (Group 57.svg) --}}
            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand text-[#3A281C]">
                    <svg class="size-8" viewBox="0 0 64 64" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linejoin="round" aria-hidden="true">
                        {{-- Center star --}}
                        <polygon points="32,16 35.3,24.5 44.4,25 37.3,30.7 39.6,39.5 32,34.6 24.4,39.5 26.7,30.7 19.6,25 28.7,24.5"/>
                        {{-- Left star --}}
                        <polygon points="13,29.8 15.1,35.1 20.8,35.5 16.4,39.1 17.8,44.6 13,41.6 8.2,44.6 9.6,39.1 5.2,35.5 10.9,35.1"/>
                        {{-- Right star --}}
                        <polygon points="51,29.8 53.1,35.1 58.8,35.5 54.4,39.1 55.8,44.6 51,41.6 46.2,44.6 47.6,39.1 43.2,35.5 48.9,35.1"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Average rating</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ number_format($averageRating ?? 0, 1, ',', '.') }} <span class="font-body text-base text-ink/55">stars</span></p>
                </div>
            </article>

            {{-- Cafes to moderate (Group 60.svg) --}}
            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand text-[#3A281C]">
                    <svg class="size-8" viewBox="0 0 64 64" fill="none" aria-hidden="true">
                        <defs>
                            <mask id="icon-cup-warning-mask">
                                <rect width="64" height="64" fill="white"/>
                                <ellipse cx="26" cy="28" rx="11.5" ry="2" fill="black"/>
                                <path d="M12 43.5c2.5 4.8 7.8 7.8 14 7.8s11.5-3 14-7.8" stroke="black" stroke-width="3" stroke-linecap="round"/>
                                <path d="M43 9.5L58.5 36.5H27.5L43 9.5Z" fill="black" stroke="black" stroke-width="6" stroke-linejoin="round"/>
                            </mask>
                        </defs>
                        <g mask="url(#icon-cup-warning-mask)" fill="currentColor">
                            <ellipse cx="26" cy="50" rx="18.5" ry="5.8"/>
                            <path d="M10.5 28c0-1.5 6.9-2.7 15.5-2.7s15.5 1.2 15.5 2.7c0 12.2-6.5 21.2-15.5 21.2S10.5 40.2 10.5 28Z"/>
                            <path d="M40 31h2c3.6 0 6.5 2.8 6.5 6.3s-2.9 6.3-6.5 6.3h-2.8v-3.2h2.6c1.8 0 3.2-1.4 3.2-3.1s-1.4-3.1-3.2-3.1h-1.8V31Z"/>
                        </g>
                        <path d="M43 11L57.5 36H28.5L43 11Z" stroke="currentColor" stroke-width="3.2" stroke-linejoin="round"/>
                        <path d="M43 19.5v8" stroke="currentColor" stroke-width="3.2" stroke-linecap="round"/>
                        <circle cx="43" cy="31.8" r="1.8" fill="currentColor"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Cafes to moderate</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ $cafesNeedModeration ?? 0 }}</p>
                </div>
            </article>

            {{-- Reviews to moderate (Group 58.svg) --}}
            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand text-[#3A281C]">
                    <svg class="size-8" viewBox="0 0 64 64" fill="none" aria-hidden="true">
                        <path d="M35.5 20H16a5 5 0 0 0-5 5v29l7.5-6H41a5 5 0 0 0 5-5v-7.5" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M17.5 28.5h14M17.5 34.5h20.5M17.5 40.5h20" stroke="currentColor" stroke-width="3.2" stroke-linecap="round"/>
                        <path d="M45.5 10L59 33.5H32L45.5 10Z" stroke="currentColor" stroke-width="3.2" stroke-linejoin="round"/>
                        <path d="M45.5 18v7.2" stroke="currentColor" stroke-width="3.2" stroke-linecap="round"/>
                        <circle cx="45.5" cy="29.3" r="1.7" fill="currentColor"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Reviews to moderate</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ $reviewsNeedModeration ?? 0 }}</p>
                </div>
            </article>
        </section>

        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-ink/10">
            <div class="flex flex-col gap-3 border-b border-ink/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <h2 class="mt-1 font-display text-2xl text-ink sm:text-3xl">Highest rated cafes</h2>
                </div>
                <a href="{{ url('/explore-cafe') }}" class="inline-flex items-center gap-2 text-sm font-medium text-terracotta hover:underline">
                    Show all cafes
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M4 12h16m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left">
                    <thead class="text-xs font-semibold uppercase tracking-wide text-ink/55">
                        <tr>
                            <th scope="col" class="px-5 py-3 sm:px-7">ID</th>
                            <th scope="col" class="px-4 py-3">Cafe</th>
                            <th scope="col" class="px-4 py-3">Location</th>
                            <th scope="col" class="px-4 py-3">Rating</th>
                            <th scope="col" class="px-4 py-3">Last updated</th>
                            <th scope="col" class="px-4 py-3">View</th>
                            <th scope="col" class="px-4 py-3">Edit</th>
                            <th scope="col" class="px-4 py-3">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ink/10 text-sm text-ink">
                    @forelse ($topCafes ?? [] as $cafe)
                        <tr class="transition-colors hover:bg-cream/60">
                            <td class="whitespace-nowrap px-5 py-3 font-medium text-ink/60 sm:px-7">#{{ $cafe->id }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    @php
                                        $cafeImage = $cafe->image ?? $cafe->logo ?? '';
                                        if ($cafeImage && !str_starts_with($cafeImage, 'http://') && !str_starts_with($cafeImage, 'https://')) {
                                            $cafeImage = asset('storage/' . $cafeImage);
                                        }
                                    @endphp
                                    @if ($cafeImage)
                                        <img class="size-12 shrink-0 rounded-lg object-cover ring-1 ring-ink/10" src="{{ $cafeImage }}" alt="{{ $cafe->name }}">
                                    @else
                                        <div class="grid size-12 shrink-0 place-items-center rounded-lg bg-sand font-medium text-ink ring-1 ring-ink/10">
                                            {{ strtoupper(substr($cafe->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <span class="font-medium">{{ $cafe->name }}</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 text-ink/70">{{ $cafe->location ?? '-' }}</td>
                            <td class="whitespace-nowrap px-4 py-3 text-terracotta font-medium">
                                <span class="inline-flex items-center gap-1">
                                    <span>★</span>
                                    <span>{{ number_format((float) ($cafe->rating ?? 0), 1, ',', '.') }}</span>
                                </span>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 text-ink/60">{{ $cafe->updated_at?->format('m/d/Y') ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <a class="font-medium text-terracotta hover:underline" href="{{ url('/explore-cafe/' . $cafe->id) }}">View</a>
                            </td>
                            <td class="px-4 py-3">
                                <a class="font-medium text-ink/70 hover:text-terracotta hover:underline" href="{{ url('/cafe-page/' . $cafe->id . '/edit') }}">Edit</a>
                            </td>
                            <td class="px-4 py-3">
                                <form method="POST" action="{{ url('/cafe-page/' . $cafe->id) }}" onsubmit="return confirm('Delete {{ $cafe->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-700 hover:text-red-800 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center text-ink/55 sm:px-7">No cafes yet. Use “Add cafe” to create the first one.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-ink/10">
            <div class="flex flex-col gap-3 border-b border-ink/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <h2 class="mt-1 font-display text-2xl text-ink sm:text-3xl">Users</h2>
                </div>
                <a href="{{ url('/admin/users') }}" class="inline-flex items-center gap-2 text-sm font-medium text-terracotta hover:underline">
                    Show all users
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M4 12h16m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left">
                    <thead class="text-xs font-semibold uppercase tracking-wide text-ink/55">
                        <tr>
                            <th scope="col" class="px-5 py-3 sm:px-7">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Registered</th>
                            <th scope="col" class="px-4 py-3">Last updated</th>
                            <th scope="col" class="px-4 py-3">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-ink/10 text-sm text-ink">
                    @forelse ($users ?? [] as $user)
                        <tr class="transition-colors hover:bg-cream/60">
                            <td class="whitespace-nowrap px-5 py-3 font-medium text-ink/60 sm:px-7">#{{ $user->id }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <div class="grid size-10 shrink-0 place-items-center rounded-lg bg-sand font-medium text-ink ring-1 ring-ink/10">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="font-medium">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-4 py-3 text-ink/70">{{ $user->email }}</td>
                            <td class="whitespace-nowrap px-4 py-3 text-ink/60">{{ $user->created_at?->format('m/d/Y') ?? '-' }}</td>
                            <td class="whitespace-nowrap px-4 py-3 text-ink/60">{{ $user->updated_at?->format('m/d/Y') ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <form method="POST" action="{{ url('/admin/users/' . $user->id) }}" onsubmit="return confirm('Delete {{ $user->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-700 hover:text-red-800 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center text-ink/55 sm:px-7">No users yet.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-ink/10">
            <div class="flex flex-col gap-3 border-b border-ink/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <p class="text-[13px] font-semibold tracking-wide text-terracotta">Latest community feedback</p>
                    <h2 class="mt-1 font-display text-2xl text-ink sm:text-3xl">Newest reviews</h2>
                </div>
                <a href="{{ url('/admin/reviews') }}" class="inline-flex items-center gap-2 text-sm font-medium text-terracotta hover:underline">
                    Show all reviews
                    <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M4 12h16m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <div class="grid gap-3 p-5 sm:p-7">
                @forelse ($newestReviews ?? [] as $review)
                    <article class="rounded-xl bg-cream/70 p-4 ring-1 ring-ink/5 sm:p-5">
                        <div class="flex flex-col gap-1 sm:flex-row sm:items-baseline sm:gap-3">
                            <h3 class="font-display text-xl text-ink">{{ $review->user->name ?? 'Anonymous' }}</h3>
                            <p class="text-sm text-ink/55">reviewed <span class="font-medium text-terracotta">{{ $review->cafe->name ?? 'Cafe' }}</span></p>
                        </div>
                        <div class="mt-2 text-sm tracking-wider text-terracotta" aria-label="{{ $review->rating }} out of 5 stars">
                            {!! str_repeat('★', (int) ($review->rating ?? 0)) !!}{!! str_repeat('☆', max(0, 5 - (int) ($review->rating ?? 0))) !!}
                        </div>
                        <p class="mt-3 text-[15px] leading-relaxed text-ink/75">{{ $review->review ?? $review->comment ?? '' }}</p>
                    </article>
                @empty
                    <p class="rounded-xl bg-cream/70 px-4 py-10 text-center text-sm text-ink/55">No reviews yet.</p>
                @endforelse
            </div>
        </section>
    </div>
</main>
@endsection
