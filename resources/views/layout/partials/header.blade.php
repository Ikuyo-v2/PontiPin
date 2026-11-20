  <header class="border-b border-ink/10 bg-cream">
      <div class="max-w-7xl mx-auto flex items-center justify-between px-6 lg:px-10 py-4">
            <img src="images/PontiPin.png" alt="PontiPin Logo" class="h-10 w-auto object-contain md:h-12">

          <nav class="hidden md:flex items-center gap-8 text-[15px] text-ink/70">
              <a href="{{ route('home.index') }}"
                  class="{{ request()->routeIs('home', 'home.*') ? 'text-ink font-medium' : 'hover:text-ink transition-colors' }}"
                  @if (request()->routeIs('home', 'home.*')) aria-current="page" @endif>
                  Home
              </a>
              <a href="{{ route('explore-cafe.index') }}"
                  class="{{ request()->routeIs('explore-cafe.*') ? 'text-ink font-medium' : 'hover:text-ink transition-colors' }}"
                  @if (request()->routeIs('explore-cafe.*')) aria-current="page" @endif>
                  Explore Cafes
              </a>
          </nav>

          @auth
              <div class="flex items-center gap-3">
                  <a href="{{ route('admin-page.index') }}"
                      class="flex items-center justify-center w-8 h-8 rounded-full bg-terracotta text-white text-sm font-semibold uppercase"
                      title="{{ auth()->user()->name }}">
                      {{ substr(auth()->user()->name, 0, 1) }}
                  </a>
                  <span class="text-sm font-medium text-ink/80 hidden sm:inline">{{ auth()->user()->name }}</span>
                  <form method="POST" action="{{ route('logout') }}" class="inline">
                      @csrf
                      <button type="submit" class="text-xs text-ink/50 hover:text-terracotta transition-colors ml-1">
                          Log out
                      </button>
                  </form>
              </div>
          @else
              <div class="flex items-center gap-3">
                  <a href="{{ route('login') }}" class="text-sm font-medium text-ink/80 hover:text-terracotta transition-colors">
                      Sign in
                  </a>
                  <a href="{{ route('register') }}" class="hidden sm:inline-flex items-center justify-center rounded-full bg-terracotta px-4 py-1.5 text-xs font-semibold text-white hover:bg-terracotta/90 transition-colors">
                      Sign up
                  </a>
              </div>
          @endauth
      </div>
  </header> 