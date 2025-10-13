<div class="max-w-6xl p-5 mx-auto my-5 bg-white rounded-lg shadow-md md:p-10">
    <h1 class="text-[#2C437F] text-xl md:text-2xl font-bold">Solusi Cerdas untuk Tata Kelola Desa</h1>
    <p class="max-w-2xl mx-auto my-8 text-base text-justify text-gray-700 mb-14 md:mb-12 md:text-center">Kami hadir sebagai mitra
        strategis dalam
        pengembangan
        kapasitas aparatur
        desa dan kecamatan melalui
        bimtek dan
        studi banding yang relevan, inovatif, dan berkelanjutan. Dengan jaringan luas, dukungan tenaga profesional,
        serta kolaborasi lintas sektor, kami berkomitmen mendampingi desa menuju tata kelola yang lebih baik.</p>
    <div class="flex flex-col items-stretch justify-center gap-5 md:flex-row md:flex-wrap">
        @foreach ($cards as $card)
            <div class="bg-[#3660AF] text-white px-5 py-5 md:py-7 rounded-lg w-full md:w-auto md:max-w-60 flex flex-col md:items-center group hover:bg-[#2C437F] transition duration-300 transform">
                <h5 class="text-center text-sm md:text-base font-bold group-hover:scale-105 transform transition-all mb-3 md:mb-0 order-2 md:order-1 hidden md:block min-h-[70px]">
                    {{ $card['title'] }}
                </h5>
                <img src="{{ $card['img'] }}" alt="" class="order-1 w-16 h-16 mx-auto mb-5 md:my-7 md:order-2"
                    loading="lazy">

                <h5 class="text-center text-sm md:text-base font-bold group-hover:scale-105 transform transition-all mb-3 md:mb-0 order-2 md:order-1 md:hidden min-h-[1px]">
                    {{ $card['title'] }}
                </h5>
                <p class="text-center text-xs md:text-sm group-hover:scale-105 transform transition-all order-3 md:order-3 min-h-[72px]">{{ $card['text'] }} </p>
            </div>
        @endforeach
    </div>
</div>
