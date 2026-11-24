@extends('layout.app')

@section('title', $title)

@section('content')
<main class="flex-1 bg-cream">
    <div class="mx-auto max-w-7xl px-6 py-10 lg:px-10 lg:py-14">
        {{-- Flash notifications --}}
        @if (session('success'))
            <div class="mb-6 flex items-center justify-between gap-3 rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-800 ring-1 ring-emerald-600/20" role="alert">
                <div class="flex items-center gap-3">
                    <span class="grid size-6 shrink-0 place-items-center rounded-full bg-emerald-600 text-xs text-white">✓</span>
                    <p>{{ session('success') }}</p>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900" aria-label="Close notification">✕</button>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 flex items-center justify-between gap-3 rounded-2xl bg-red-50 px-5 py-4 text-sm font-medium text-red-800 ring-1 ring-red-600/20" role="alert">
                <div class="flex items-center gap-3">
                    <span class="grid size-6 shrink-0 place-items-center rounded-full bg-red-600 text-xs text-white">!</span>
                    <p>{{ session('error') }}</p>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-700 hover:text-red-900" aria-label="Close notification">✕</button>
            </div>
        @endif

        @if (isset($errors) && $errors->any())
            <div class="mb-6 rounded-2xl bg-red-50 p-5 text-sm text-red-800 ring-1 ring-red-600/20">
                <p class="font-semibold mb-2">There were problems with your submission:</p>
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <header class="mb-8 flex flex-col gap-5 border-b border-ink/10 pb-8 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-2 text-[13px] font-semibold tracking-wide text-terracotta">PontiPin admin dashboard</p>
                <h1 class="font-display text-4xl leading-tight text-ink md:text-5xl">Overview</h1>
                <p class="mt-2 text-[15px] text-ink/60">Manage cafes, ratings, and community reviews.</p>
            </div>
            <button type="button" onclick="openCreateCafeModal()" class="inline-flex items-center justify-center gap-2 rounded-full bg-terracotta px-5 py-3 text-[15px] font-medium text-white transition-colors hover:bg-terracotta/90 focus:outline-none focus-visible:ring-2 focus-visible:ring-terracotta focus-visible:ring-offset-2 cursor-pointer shadow-sm">
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                </svg>
                Add cafe
            </button>
        </header>

        <section aria-label="Dashboard statistics" class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            {{-- Total cafes --}}
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

            {{-- Average rating --}}
            <article class="flex items-center gap-4 rounded-2xl bg-white p-5 shadow-sm ring-1 ring-ink/10 sm:p-6">
                <div class="grid size-14 shrink-0 place-items-center rounded-xl bg-sand text-[#3A281C]">
                    <svg class="size-8" viewBox="0 0 64 64" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linejoin="round" aria-hidden="true">
                        <polygon points="32,16 35.3,24.5 44.4,25 37.3,30.7 39.6,39.5 32,34.6 24.4,39.5 26.7,30.7 19.6,25 28.7,24.5"/>
                        <polygon points="13,29.8 15.1,35.1 20.8,35.5 16.4,39.1 17.8,44.6 13,41.6 8.2,44.6 9.6,39.1 5.2,35.5 10.9,35.1"/>
                        <polygon points="51,29.8 53.1,35.1 58.8,35.5 54.4,39.1 55.8,44.6 51,41.6 46.2,44.6 47.6,39.1 43.2,35.5 48.9,35.1"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="text-sm font-medium text-ink/60">Average rating</h2>
                    <p class="mt-1 font-display text-3xl leading-none text-ink">{{ number_format($averageRating ?? 0, 1, ',', '.') }} <span class="font-body text-base text-ink/55">stars</span></p>
                </div>
            </article>

            {{-- Cafes to moderate --}}
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

            {{-- Reviews to moderate --}}
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

        {{-- Cafes management section --}}
        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-ink/10">
            <div class="flex flex-col gap-3 border-b border-ink/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <h2 class="font-display text-2xl text-ink sm:text-3xl">Manage cafes</h2>
                    <p class="mt-0.5 text-xs text-ink/60">Showing {{ count($topCafes ?? []) }} cafe records from database</p>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="openCreateCafeModal()" class="inline-flex items-center gap-1.5 rounded-full bg-sand px-4 py-1.5 text-xs font-semibold text-espresso transition hover:bg-sand/80">
                        <span>+ Add cafe</span>
                    </button>
                    <a href="{{ url('/explore-cafe') }}" class="inline-flex items-center gap-2 text-sm font-medium text-terracotta hover:underline">
                        Explore view
                        <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M4 12h16m-6-6 6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left">
                    <thead class="text-xs font-semibold uppercase tracking-wide text-ink/55 bg-cream/40">
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
                                        $cafeImage = $cafe->image ?? '';
                                        if ($cafeImage && !str_starts_with($cafeImage, 'http://') && !str_starts_with($cafeImage, 'https://')) {
                                            $cafeImage = asset($cafeImage);
                                        }
                                    @endphp
                                    @if ($cafeImage)
                                        <img class="size-12 shrink-0 rounded-lg object-cover ring-1 ring-ink/10" src="{{ $cafeImage }}" alt="{{ $cafe->name }}" onerror="this.src='{{ asset('images/cafe1.webp') }}'">
                                    @else
                                        <div class="grid size-12 shrink-0 place-items-center rounded-lg bg-sand font-medium text-ink ring-1 ring-ink/10">
                                            {{ strtoupper(substr($cafe->name, 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-medium text-ink">{{ $cafe->name }}</p>
                                        @if ($cafe->address)
                                            <p class="text-xs text-ink/50 line-clamp-1">{{ $cafe->address }}</p>
                                        @endif
                                    </div>
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
                                <a class="font-medium text-terracotta hover:underline" href="{{ route('cafe-page.show', $cafe->id) }}" target="_blank">View</a>
                            </td>
                            <td class="px-4 py-3">
                                <button type="button" onclick="openEditCafeModal({{ json_encode($cafe) }})" class="font-medium text-ink/70 hover:text-terracotta hover:underline cursor-pointer">
                                    Edit
                                </button>
                            </td>
                            <td class="px-4 py-3">
                                <button type="button" onclick="openDeleteCafeModal({{ $cafe->id }}, {{ json_encode($cafe->name) }})" class="font-medium text-red-700 hover:text-red-800 hover:underline cursor-pointer">
                                    Delete
                                </button>
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

        {{-- Users management section --}}
        <section id="users-table" class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-ink/10">
            <div class="flex flex-col gap-3 border-b border-ink/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <h2 class="font-display text-2xl text-ink sm:text-3xl">Registered users</h2>
                    <p class="mt-0.5 text-xs text-ink/60">Showing {{ count($users ?? []) }} registered user(s)</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[720px] text-left">
                    <thead class="text-xs font-semibold uppercase tracking-wide text-ink/55 bg-cream/40">
                        <tr>
                            <th scope="col" class="px-5 py-3 sm:px-7">ID</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Registered</th>
                            <th scope="col" class="px-4 py-3">Last updated</th>
                            <th scope="col" class="px-4 py-3">Action</th>
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
                                <button type="button" onclick="openDeleteUserModal({{ $user->id }}, {{ json_encode($user->name) }})" class="font-medium text-red-700 hover:text-red-800 hover:underline cursor-pointer">
                                    Delete
                                </button>
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

        {{-- Reviews section --}}
        <section class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-ink/10">
            <div class="flex flex-col gap-3 border-b border-ink/10 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <div>
                    <p class="text-[13px] font-semibold tracking-wide text-terracotta">Latest community feedback</p>
                    <h2 class="mt-1 font-display text-2xl text-ink sm:text-3xl">Newest reviews</h2>
                </div>
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

    {{-- MODAL 1: Create Cafe Modal --}}
    <div id="createCafeModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-ink/60 backdrop-blur-xs overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="createCafeTitle">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-6 sm:p-8 max-h-[90vh] overflow-y-auto ring-1 ring-ink/10 my-8">
            <div class="flex items-start justify-between border-b border-ink/10 pb-4 mb-6">
                <div>
                    <p class="text-xs font-semibold text-terracotta uppercase tracking-wider">New entry</p>
                    <h3 id="createCafeTitle" class="font-display text-2xl font-semibold text-ink">Add New Cafe</h3>
                </div>
                <button type="button" onclick="closeModal('createCafeModal')" class="size-8 grid place-items-center rounded-full text-ink/50 hover:bg-cream hover:text-ink text-lg cursor-pointer">✕</button>
            </div>

            <form action="{{ route('cafe-page.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Cafe Name *</label>
                        <input type="text" name="name" required placeholder="e.g. Kopi Aming" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Location (District) *</label>
                        <input type="text" name="location" required placeholder="e.g. Pontianak Kota" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Address</label>
                        <input type="text" name="address" placeholder="e.g. Jl. Gajah Mada No. 12" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Rating (0.0 – 5.0)</label>
                        <input type="number" step="0.1" min="0" max="5" name="rating" value="4.8" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Opening Hours</label>
                        <input type="text" name="opening_hours" placeholder="e.g. 08.00 – 23.00 WIB" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Tags (comma separated)</label>
                        <input type="text" name="tags" placeholder="e.g. Coffee Shop, Cozy, Casual" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-ink/70 mb-1">Facilities</label>
                    <input type="text" name="facilities" placeholder="e.g. Parking, Indoor & Outdoor Seating, Wi-Fi" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Latitude</label>
                        <input type="number" step="any" name="latitude" placeholder="e.g. -0.026330" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Longitude</label>
                        <input type="number" step="any" name="longitude" placeholder="e.g. 109.342504" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Image Path / URL</label>
                        <input type="text" name="image" placeholder="e.g. CAFES/CW_CAFE.jpg or https://..." class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Or Upload Image File</label>
                        <input type="file" name="image_file" accept="image/*" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3 py-2 text-xs text-ink/80 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-sand file:text-espresso">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-ink/70 mb-1">Subtitle</label>
                    <input type="text" name="subtitle" placeholder="Short catchphrase" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-ink/70 mb-1">Description</label>
                    <textarea name="description" rows="3" placeholder="Full cafe description..." class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta resize-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-ink/10">
                    <button type="button" onclick="closeModal('createCafeModal')" class="rounded-full border border-ink/20 px-5 py-2.5 text-sm font-medium text-ink/70 hover:bg-cream cursor-pointer">Cancel</button>
                    <button type="submit" class="rounded-full bg-terracotta hover:bg-terracotta/90 text-white font-medium px-6 py-2.5 text-sm shadow-sm cursor-pointer">Create Cafe</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL 2: Edit Cafe Modal --}}
    <div id="editCafeModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-ink/60 backdrop-blur-xs overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="editCafeTitle">
        <div class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl p-6 sm:p-8 max-h-[90vh] overflow-y-auto ring-1 ring-ink/10 my-8">
            <div class="flex items-start justify-between border-b border-ink/10 pb-4 mb-6">
                <div>
                    <p class="text-xs font-semibold text-terracotta uppercase tracking-wider">Update record</p>
                    <h3 id="editCafeTitle" class="font-display text-2xl font-semibold text-ink">Edit Cafe</h3>
                </div>
                <button type="button" onclick="closeModal('editCafeModal')" class="size-8 grid place-items-center rounded-full text-ink/50 hover:bg-cream hover:text-ink text-lg cursor-pointer">✕</button>
            </div>

            <form id="editCafeForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Cafe Name *</label>
                        <input type="text" id="edit_name" name="name" required class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Location (District) *</label>
                        <input type="text" id="edit_location" name="location" required class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Address</label>
                        <input type="text" id="edit_address" name="address" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Rating (0.0 – 5.0)</label>
                        <input type="number" step="0.1" min="0" max="5" id="edit_rating" name="rating" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Opening Hours</label>
                        <input type="text" id="edit_opening_hours" name="opening_hours" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Tags (comma separated)</label>
                        <input type="text" id="edit_tags" name="tags" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-ink/70 mb-1">Facilities</label>
                    <input type="text" id="edit_facilities" name="facilities" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Latitude</label>
                        <input type="number" step="any" id="edit_latitude" name="latitude" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Longitude</label>
                        <input type="number" step="any" id="edit_longitude" name="longitude" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Image Path / URL</label>
                        <input type="text" id="edit_image" name="image" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-ink/70 mb-1">Or Replace Image File</label>
                        <input type="file" name="image_file" accept="image/*" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3 py-2 text-xs text-ink/80 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-sand file:text-espresso">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-ink/70 mb-1">Subtitle</label>
                    <input type="text" id="edit_subtitle" name="subtitle" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-ink/70 mb-1">Description</label>
                    <textarea id="edit_description" name="description" rows="3" class="w-full rounded-xl border border-ink/15 bg-cream/30 px-3.5 py-2.5 text-sm text-ink focus:border-terracotta focus:outline-none focus:ring-1 focus:ring-terracotta resize-none"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-ink/10">
                    <button type="button" onclick="closeModal('editCafeModal')" class="rounded-full border border-ink/20 px-5 py-2.5 text-sm font-medium text-ink/70 hover:bg-cream cursor-pointer">Cancel</button>
                    <button type="submit" class="rounded-full bg-terracotta hover:bg-terracotta/90 text-white font-medium px-6 py-2.5 text-sm shadow-sm cursor-pointer">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL 3: Delete Cafe Confirmation Modal --}}
    <div id="deleteCafeModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-ink/60 backdrop-blur-xs" role="dialog" aria-modal="true" aria-labelledby="deleteCafeTitle">
        <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl p-6 sm:p-7 ring-1 ring-ink/10 text-center">
            <div class="mx-auto mb-4 grid size-14 place-items-center rounded-2xl bg-red-100 text-red-600">
                <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M3 6h18m-2 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M10 11v6M14 11v6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3 id="deleteCafeTitle" class="font-display text-2xl font-semibold text-ink">Delete Cafe?</h3>
            <p class="mt-2 text-sm text-ink/70 leading-relaxed">
                Are you sure you want to delete <span id="deleteCafeName" class="font-semibold text-ink"></span>? This action cannot be undone and will also delete its menu items.
            </p>

            <form id="deleteCafeForm" method="POST" class="mt-6 flex items-center justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="closeModal('deleteCafeModal')" class="rounded-full border border-ink/20 px-5 py-2.5 text-sm font-medium text-ink/70 hover:bg-cream cursor-pointer">Cancel</button>
                <button type="submit" class="rounded-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-2.5 text-sm shadow-sm cursor-pointer">Yes, Delete</button>
            </form>
        </div>
    </div>

    {{-- MODAL 4: Delete User Confirmation Modal --}}
    <div id="deleteUserModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-ink/60 backdrop-blur-xs" role="dialog" aria-modal="true" aria-labelledby="deleteUserTitle">
        <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl p-6 sm:p-7 ring-1 ring-ink/10 text-center">
            <div class="mx-auto mb-4 grid size-14 place-items-center rounded-2xl bg-red-100 text-red-600">
                <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h3 id="deleteUserTitle" class="font-display text-2xl font-semibold text-ink">Delete User?</h3>
            <p class="mt-2 text-sm text-ink/70 leading-relaxed">
                Are you sure you want to delete <span id="deleteUserName" class="font-semibold text-ink"></span>? The account will be permanently removed.
            </p>

            <form id="deleteUserForm" method="POST" class="mt-6 flex items-center justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="closeModal('deleteUserModal')" class="rounded-full border border-ink/20 px-5 py-2.5 text-sm font-medium text-ink/70 hover:bg-cream cursor-pointer">Cancel</button>
                <button type="submit" class="rounded-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-2.5 text-sm shadow-sm cursor-pointer">Yes, Delete</button>
            </form>
        </div>
    </div>
</main>

<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.classList.add('overflow-hidden');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
    }

    function openCreateCafeModal() {
        openModal('createCafeModal');
    }

    function openEditCafeModal(cafe) {
        const form = document.getElementById('editCafeForm');
        form.action = `/cafe-page/${cafe.id}`;

        document.getElementById('edit_name').value = cafe.name || '';
        document.getElementById('edit_location').value = cafe.location || '';
        document.getElementById('edit_address').value = cafe.address || '';
        document.getElementById('edit_rating').value = cafe.rating || '4.8';
        document.getElementById('edit_opening_hours').value = cafe.opening_hours || '';
        document.getElementById('edit_tags').value = cafe.tags || '';
        document.getElementById('edit_facilities').value = cafe.facilities || '';
        document.getElementById('edit_latitude').value = cafe.latitude || '';
        document.getElementById('edit_longitude').value = cafe.longitude || '';
        document.getElementById('edit_image').value = cafe.image || '';
        document.getElementById('edit_subtitle').value = cafe.subtitle || '';
        document.getElementById('edit_description').value = cafe.description || '';

        openModal('editCafeModal');
    }

    function openDeleteCafeModal(id, name) {
        const form = document.getElementById('deleteCafeForm');
        form.action = `/cafe-page/${id}`;
        document.getElementById('deleteCafeName').textContent = name;
        openModal('deleteCafeModal');
    }

    function openDeleteUserModal(id, name) {
        const form = document.getElementById('deleteUserForm');
        form.action = `/admin/users/${id}`;
        document.getElementById('deleteUserName').textContent = name;
        openModal('deleteUserModal');
    }

    // Close on click outside backdrop
    ['createCafeModal', 'editCafeModal', 'deleteCafeModal', 'deleteUserModal'].forEach(function(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal(modalId);
                }
            });
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            ['createCafeModal', 'editCafeModal', 'deleteCafeModal', 'deleteUserModal'].forEach(closeModal);
        }
    });
</script>
@endsection
