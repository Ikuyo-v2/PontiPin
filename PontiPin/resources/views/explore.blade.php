<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Explore Cafes - KopiPontianak</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FAF7F2] text-stone-800 min-h-screen">

  <header class="bg-[#FAF7F2] border-b border-stone-200 sticky top-0 z-10">
    <div class="max-w-5xl mx-auto px-4 h-14 flex items-center justify-between">
      <a href="#" class="font-bold text-lg flex items-center gap-2">
        <span class="w-6 h-6 rounded-full bg-[#9A4126] text-white flex items-center justify-center text-xs">☕</span>
        KopiPontianak
      </a>
      <div class="flex gap-4 text-sm font-medium">
        <a href="#" class="text-stone-500 hover:text-black">Home</a>
        <a href="#" class="text-[#9A4126] font-bold">Explore Cafes</a>
      </div>
      <span class="w-7 h-7 rounded-full bg-[#9A4126] text-white flex items-center justify-center text-xs font-bold">D</span>
    </div>
  </header>

  <main class="max-w-5xl mx-auto px-4 py-6">
    <div class="mb-5">
      <span class="text-[11px] font-bold text-[#9A4126]">PONTIANAK ONLY</span>
      <h1 class="text-2xl font-bold mt-1">Explore Cafes</h1>
      <p class="text-xs text-stone-500">Daftar cafe pilihan di sekitar Kota Pontianak.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 mb-3">
      <input type="text" placeholder="Cari cafe..." class="bg-white border border-stone-300 text-xs px-3 py-2 rounded-lg outline-none">
      <select class="bg-white border border-stone-300 text-xs px-2 py-2 rounded-lg outline-none text-stone-600">
        <option>Semua Wilayah</option>
        <option>Pontianak Kota</option>
        <option>Pontianak Selatan</option>
      </select>
      <select class="bg-white border border-stone-300 text-xs px-2 py-2 rounded-lg outline-none text-stone-600">
        <option>Paling Populer</option>
        <option>Rating Tertinggi</option>
      </select>
    </div>

    <div class="flex flex-wrap gap-2 text-xs mb-6">
      <button class="px-3 py-1 rounded-full bg-[#9A4126] text-white font-medium">Semua</button>
      <button class="px-3 py-1 rounded-full bg-white border border-stone-300 text-stone-600">Coffee Shop</button>
      <button class="px-3 py-1 rounded-full bg-white border border-stone-300 text-stone-600">Co-working</button>
      <button class="px-3 py-1 rounded-full bg-white border border-stone-300 text-stone-600">Outdoor</button>
      <button class="px-3 py-1 rounded-full bg-white border border-stone-300 text-stone-600">Affordable</button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      
      <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-sm flex flex-col justify-between">
        <div>
          <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?w=500" class="h-36 w-full object-cover" alt="Kopi Aming">
          <div class="p-3">
            <div class="flex justify-between items-start mb-1">
              <h2 class="font-bold text-sm">Kedai Kopi Aming</h2>
              <span class="text-xs text-amber-500 font-semibold">★ 4.8</span>
            </div>
            <p class="text-stone-500 text-xs line-clamp-2">Kopi legendaris khas Pontianak dengan robusta pekat dan harga terjangkau.</p>
            <div class="flex gap-1 mt-2 text-[10px]">
              <span class="bg-stone-100 text-stone-600 px-2 py-0.5 rounded">Coffee Shop</span>
              <span class="bg-stone-100 text-stone-600 px-2 py-0.5 rounded">Affordable</span>
            </div>
          </div>
        </div>
        <div class="p-3 border-t border-stone-100 flex justify-between items-center text-xs">
          <span class="text-stone-400">Pontianak Kota</span>
          <a href="#" class="text-[#9A4126] font-bold hover:underline">Detail →</a>
        </div>
      </div>

      <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-sm flex flex-col justify-between">
        <div>
          <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=500" class="h-36 w-full object-cover" alt="Kopi Khatulistiwa">
          <div class="p-3">
            <div class="flex justify-between items-start mb-1">
              <h2 class="font-bold text-sm">Kopi Khatulistiwa</h2>
              <span class="text-xs text-amber-500 font-semibold">★ 4.7</span>
            </div>
            <p class="text-stone-500 text-xs line-clamp-2">Specialty coffee house bernuansa hangat dekat ikon Tugu Khatulistiwa.</p>
            <div class="flex gap-1 mt-2 text-[10px]">
              <span class="bg-stone-100 text-stone-600 px-2 py-0.5 rounded">Coffee Shop</span>
              <span class="bg-stone-100 text-stone-600 px-2 py-0.5 rounded">Work-Friendly</span>
            </div>
          </div>
        </div>
        <div class="p-3 border-t border-stone-100 flex justify-between items-center text-xs">
          <span class="text-stone-400">Pontianak Kota</span>
          <a href="#" class="text-[#9A4126] font-bold hover:underline">Detail →</a>
        </div>
      </div>

      <div class="bg-white border border-stone-200 rounded-xl overflow-hidden shadow-sm flex flex-col justify-between">
        <div>
          <img src="https://images.unsplash.com/photo-1559925393-8be0ec4767c8?w=500" class="h-36 w-full object-cover" alt="Ruang Seduh">
          <div class="p-3">
            <div class="flex justify-between items-start mb-1">
              <h2 class="font-bold text-sm">Ruang Seduh</h2>
              <span class="text-xs text-amber-500 font-semibold">★ 4.6</span>
            </div>
            <p class="text-stone-500 text-xs line-clamp-2">Cafe minimalis nyaman dengan banyak stopkontak untuk kerja dan nugas.</p>
            <div class="flex gap-1 mt-2 text-[10px]">
              <span class="bg-stone-100 text-stone-600 px-2 py-0.5 rounded">Co-working</span>
              <span class="bg-stone-100 text-stone-600 px-2 py-0.5 rounded">Quiet Zone</span>
            </div>
          </div>
        </div>
        <div class="p-3 border-t border-stone-100 flex justify-between items-center text-xs">
          <span class="text-stone-400">Pontianak Selatan</span>
          <a href="#" class="text-[#9A4126] font-bold hover:underline">Detail →</a>
        </div>
      </div>

    </div>
  </main>

  <footer class="bg-[#2A1B14] text-stone-400 text-xs py-6 mt-12">
    <div class="max-w-5xl mx-auto px-4 flex justify-between">
      <p class="font-bold text-white">☕ KopiPontianak</p>
      <p>Katalog Cafe Pontianak</p>
    </div>
  </footer>

</body>
</html>