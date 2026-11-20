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
            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand">
                    <img class="size-7" src="{{ asset('images/icons/cup.svg') }}" alt="">
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Total cafes</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ $totalCafes ?? 0 }}</p>
                </div>
            </article>

            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand">
                    <img class="size-7" src="{{ asset('images/icons/stars.svg') }}" alt="">
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Average rating</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ number_format($averageRating ?? 0, 1, ',', '.') }} <span class="font-body text-base text-ink/55">stars</span></p>
                </div>
            </article>

            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand">
                    <img class="size-7" src="{{ asset('images/icons/cup-warning.svg') }}" alt="">
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Cafes to moderate</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ $cafesNeedModeration ?? 0 }}</p>
                </div>
            </article>

            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand">
                    <img class="size-7" src="{{ asset('images/icons/chat-warning.svg') }}" alt="">
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
