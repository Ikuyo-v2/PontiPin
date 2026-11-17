@extends('layout.app')

@section('title', $title)

@section('content')
<style>
    :root {
        --bg: #ffffff;
        --card: #fcf9f6;
        --ink: #3b2a20;
        --line: #d9d2cb;
        --accent: #c65d3e;
    }
    .admin { font-family: 'Manrope', 'Inter', sans-serif; color: var(--ink); background: var(--bg); }
    .admin h1, .admin h2, .admin h3, .admin .serif { font-family: 'Cormorant Garamond', Georgia, serif; font-weight: 500; }
 
    /* Page header */
    .admin-head { display: flex; justify-content: space-between; align-items: center;
        padding: 24px 80px; border-bottom: 1px solid var(--ink); }
    .admin-head h1 { font-size: 48px; margin: 0; line-height: 1.1; }
    .admin-head p { margin: 4px 0 0; font-size: 15px; opacity: .8; }
    .btn-add { display: inline-flex; align-items: center; gap: 12px; background: var(--accent); color: #fff;
        padding: 14px 24px; border-radius: 6px; text-decoration: none; font-family: 'Cormorant Garamond', serif;
        font-size: 24px; }
    .btn-add span { font-size: 36px; line-height: 1; }
 
    .admin-body { max-width: 1320px; margin: 0 auto; padding: 48px 24px; }
 
    /* Stat cards */
    .stats { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
    .stat { display: flex; align-items: center; gap: 24px; background: var(--card);
        border: 1px solid var(--ink); border-radius: 18px; padding: 24px 36px; }
    .stat-icon { width: 156px; height: 156px; flex: none; display: grid; place-items: center;
        background: #fff; border: 1px solid var(--line); border-radius: 10px; }
    .stat-icon img { width: 110px; height: 110px; object-fit: contain; }
    .stat-text { flex: 1; text-align: center; }
    .stat-text h3 { margin: 0 0 24px; font-size: 32px; }
    .stat-text .value { font-size: 44px; }
 
    /* Panels */
    .panel { background: var(--card); border: 1px solid var(--ink); border-radius: 18px;
        padding: 36px; margin-top: 64px; }
    .panel-head { display: flex; justify-content: space-between; align-items: center;
        padding: 0 24px; margin-bottom: 24px; }
    .panel-head h2 { margin: 0; font-size: 44px; }
    .show-all { color: var(--ink); text-decoration: none; font-size: 15px; display: inline-flex; gap: 14px; align-items: center; }
    .show-all.accent { color: var(--accent); }
    .show-all svg { width: 28px; height: 28px; }
 
    /* Table */
    table.cafes { width: 100%; border-collapse: collapse; }
    .cafes th { text-align: left; font-weight: 500; font-size: 16px; padding: 12px 8px 16px;
        border-bottom: 1px solid var(--ink); }
    .cafes td { padding: 12px 8px; border-bottom: 1px solid var(--line); vertical-align: middle; font-size: 16px; }
    .cafes tr:last-child td { border-bottom: 0; }
    .cafe-cell { display: flex; align-items: center; gap: 14px; letter-spacing: .15em; }
    .cafe-logo { width: 72px; height: 72px; border-radius: 8px; border: 1px solid var(--line);
        background: #fff; object-fit: cover; }
    .date { letter-spacing: .2em; font-size: 15px; }
    .link-btn { background: none; border: 0; padding: 0; font: inherit; color: var(--ink);
        text-decoration: none; cursor: pointer; }
    .link-btn:hover { color: var(--accent); }
 
    /* Reviews */
    .reviews { border-top: 1px solid var(--ink); padding-top: 28px; display: grid; gap: 16px; }
    .review { background: var(--card); border: 1px solid var(--ink); border-radius: 18px;
        padding: 20px 32px; min-height: 130px; }
    .review-top { display: flex; align-items: baseline; gap: 18px; }
    .review-top h3 { margin: 0; font-size: 26px; }
    .review-top small { color: var(--accent); font-size: 13px; }
    .stars { color: var(--accent); letter-spacing: 2px; font-size: 16px; }
    .review p { margin: 14px 0 0; font-size: 17px; }
 
    @media (max-width: 900px) {
        .stats { grid-template-columns: 1fr; }
        .admin-head { padding: 20px; }
        .cafes th:nth-child(n+3), .cafes td:nth-child(n+3) { display: none; }
    }
</style>
 
<main class="admin">
 
    {{-- Header --}}
    <header class="admin-head">
        <div>
            <h1>Admin</h1>
            <p>PontiPin admin dashboard</p>
        </div>
        <a href="{{ url('/admin/cafes/create') }}" class="btn-add"><span>+</span> Add Cafes</a>
    </header>
 
    <div class="admin-body">
 
        {{-- Stats --}}
        <section class="stats">
            <div class="stat">
                <div class="stat-icon"><img src="{{ asset('images/icons/cup.svg') }}" alt=""></div>
                <div class="stat-text">
                    <h3>Total cafes</h3>
                    <div class="value">{{ $totalCafes ?? 0 }}</div>
                </div>
            </div>
 
            <div class="stat">
                <div class="stat-icon"><img src="{{ asset('images/icons/stars.svg') }}" alt=""></div>
                <div class="stat-text">
                    <h3>Ratings</h3>
                    <div class="value">{{ number_format($averageRating ?? 0, 1, ',', '.') }} stars</div>
                </div>
            </div>
 
            <div class="stat">
                <div class="stat-icon"><img src="{{ asset('images/icons/cup-warning.svg') }}" alt=""></div>
                <div class="stat-text">
                    <h3>Cafe need moderation</h3>
                    <div class="value">{{ $cafesNeedModeration ?? 0 }}</div>
                </div>
            </div>
 
            <div class="stat">
                <div class="stat-icon"><img src="{{ asset('images/icons/chat-warning.svg') }}" alt=""></div>
                <div class="stat-text">
                    <h3>Reviews need moderation</h3>
                    <div class="value">{{ $reviewsNeedModeration ?? 0 }}</div>
                </div>
            </div>
        </section>
 
        {{-- Highest rated cafes --}}
        <section class="panel">
            <div class="panel-head">
                <h2>Highest rated cafes</h2>
                <a href="{{ url('/admin/cafes') }}" class="show-all">Show all
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 12h18M14 5l7 7-7 7"/></svg>
                </a>
            </div>
 
            <table class="cafes">
                <thead>
                    <tr>
                        <th>Cafe</th>
                        <th>Last updated</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete Cafe</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($topCafes ?? [] as $cafe)
                    <tr>
                        <td>
                            <div class="cafe-cell">
                                <img class="cafe-logo" src="{{ asset('storage/' . $cafe->logo) }}" alt="{{ $cafe->name }}">
                                <span>{{ $cafe->name }}</span>
                            </div>
                        </td>
                        <td class="date">{{ $cafe->updated_at->format('m/d/Y') }}</td>
                        <td><a class="link-btn" href="{{ url('/explore/' . $cafe->id) }}">View</a></td>
                        <td><a class="link-btn" href="{{ url('/admin/cafes/' . $cafe->id . '/edit') }}">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ url('/admin/cafes/' . $cafe->id) }}"
                                  onsubmit="return confirm('Delete {{ $cafe->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link-btn">Delete Cafe</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">No cafes yet. Use “Add Cafes” to create the first one.</td></tr>
                @endforelse
                </tbody>
            </table>
        </section>
 
        {{-- Newest reviews --}}
        <section class="panel">
            <div class="panel-head">
                <h2>Newest review</h2>
                <a href="{{ url('/admin/reviews') }}" class="show-all accent">Show all
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 12h18M14 5l7 7-7 7"/></svg>
                </a>
            </div>
 
            <div class="reviews">
                @forelse ($newestReviews ?? [] as $review)
                    <article class="review">
                        <div class="review-top">
                            <h3>{{ $review->user->name }}</h3>
                            <small>{{ $review->cafe->name }}</small>
                        </div>
                        <div class="stars" aria-label="{{ $review->rating }} out of 5 stars">
                            {!! str_repeat('★', $review->rating) !!}{!! str_repeat('☆', 5 - $review->rating) !!}
                        </div>
                        <p>{{ $review->comment }}</p>
                    </article>
                @empty
                    <p>No reviews yet.</p>
                @endforelse
            </div>
        </section>
 
    </div>
</main>
@endsection