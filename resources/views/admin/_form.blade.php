<div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative">
    <h2 class="text-[18px] font-bold  ml-6">Tambah Artikel</h2>
</div>

<form action="{{ $action }}" method="POST" enctype="multipart/form-data"
    class="p-8 -mt-2 space-y-2 bg-white shadow-xl rounded-xl">
    @csrf
    @if (isset($method) && $method === 'PUT')
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        {{-- Judul --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 ">Judul Artikel</label>
            <input type="text" name="title" required value="{{ old('title', $article->title ?? '') }}"
                class="w-full px-2 py-2 border border-blue-300 rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                placeholder="Masukkan judul artikel">
        </div>

        {{-- Target Website --}}
        <div>
            <label class="block mb-1 text-sm font-semibold text-gray-700">Target Website</label>
            <select name="target_website" required
                class="w-full px-2 py-2 bg-white border border-blue-300 rounded-lg shadow-sm cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500">
                @foreach ($targetWebsites as $target)
                    <option value="{{ $target }}" {{ old('target_website', $article->target_website ?? '') === $target ? 'selected' : '' }}>
                        {{ ucwords(str_replace('-', ' ', $target)) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Gambar Utama --}}
        <div>
            <label class="block -mt-1 text-sm font-semibold text-gray-700">Gambar Utama</label>
            <input type="file" name="main_image" accept="image/*"
                class="w-full px-2 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer file:mr-4 file:py-1 file:px-2 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            @if (!empty($article->main_image))
                <img src="{{ asset('storage/' . $article->main_image) }}" alt=""
                    class="object-cover w-16 border rounded-lg shadow-sm cursor-pointer h-18">
            @endif
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700">Kategori</label>
            <select name="category" id="category" required
                class="w-full px-2 py-2 mb-2 border border-blue-300 rounded-lg shadow-sm cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500">
                <option value="">-- Pilih kategori --</option>
            </select>
        </div>
        </div>

    {{-- Konten Artikel --}}
    <div>
        <label class="block mb-2 text-sm font-semibold text-gray-700">Isi Artikel</label>
        <input id="content" type="hidden" name="content" value="{{ old('content', $article->content ?? '') }}">
        <trix-editor input="content"
            class="trix-content bg-gray-100 border-[#ced1d6] rounded-b-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 min-h-[300px] mb-4 -mt-2">
        </trix-editor>
    </div>

    <div class="grid grid-cols-1 gap-6 mt-2 md:grid-cols-2">
        {{-- Penulis --}}
        <div>
            <label class="block mb-1 text-sm font-semibold text-gray-700">Penulis</label>
            <select name="author"
                class="w-full px-2 py-2 border border-blue-300 rounded-lg shadow-sm cursor-pointer focus:outline-none focus:ring-1 focus:ring-blue-500">
                <option value="">Pilih penulis</option>
                @foreach ($defaultAuthors as $author)
                    <option value="{{ $author }}" {{ old('author') == $author ? 'selected' : '' }}>
                        {{ ucwords(str_replace('-', ' ', $author)) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Gambar Tambahan --}}
        <div>
            <label class="block mb-1 text-sm font-semibold text-gray-700">Gambar Tambahan</label>
            <input type="file" name="images[]" accept="image/*" multiple
                class="w-full px-2 py-2 bg-white border border-gray-300 rounded-lg cursor-pointer file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-sm file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>
    </div>
        

    <div class="flex items-center justify-between pt-4">
        {{-- Tombol Back --}}
        <a href="{{ route('articles.index') }}"
            class="bg-[#FF0000] hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-lg shadow text-[16px] transition duration-200 cursor-pointer">
            Batal
        </a>
    
        {{-- Tombol Upload --}}
        <button type="submit"
            class="bg-[#4880FF] hover:bg-blue-700 text-white font-semibold px-4 py-2 text-[16px] rounded-lg shadow-lg transition duration-200 cursor-pointer">
            Upload Artikel
        </button>
    </div>
    
</form>

<style>
    trix-editor ul {
        list-style-type: disc;
        padding-left: 1.25rem;
    }

    trix-editor ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
    }

    trix-toolbar {
    background-color: #FCFDFD; 
    border: 1px solid #ced1d6; 
    border-radius: 0.5rem; 
    padding: 0.25rem;
    z-index: 10;
}

/* Semua tombol: normal */
trix-toolbar .trix-button {
    filter: brightness(0) saturate(100%) invert(45%) sepia(120%) saturate(686%) hue-rotate(199deg) brightness(99%) contrast(100%);
    border: none;
    transition: all 0.2s ease;
}

trix-toolbar .trix-button:hover,
trix-toolbar .trix-button--active,
trix-toolbar .trix-button.trix-active {
    background-color: rgba(72, 128, 255, 0.1);
    border-radius: 0.25rem;
}

trix-editor blockquote {
        border-left: 4px solid #60A5FA;
        padding-left: 1rem;
        background-color: #F0F9FF;
        font-style: italic;
        margin: 0.5rem 0;
    }

    trix-editor pre {
        background-color: #F3F4F6;
        color: #1F2937;
        font-family: monospace;
        padding: 0.75rem;
        border-radius: 0.375rem;
        overflow-x: auto;
        margin: 0.5rem 0;
    }

</style>

<script>
    const categories = {
        'csc': [
            'Event Organizer',
            'Ketahanan Pangan',
            'Konstruksi',
        ],
        'pustaka-pemda': [
            'Bimbingan Teknis (Bimtek)',
            'Pengelolaan Keuangan Desa (APBDes, Dana Desa, dll.)',
            'Perencanaan dan Pelaporan Pembangunan Desa',
            'Pelatihan Penyusunan RPJMDes dan RKPDes',
            'Manajemen Aset Desa',
            'Digitalisasi Administrasi Desa',
            'Studi Banding',
            'Kunjungan ke desa-desa percontohan',
            'Pertukaran pengalaman dan pembelajaran praktik terbaik',
            'Pemantapan inovasi pelayanan publik desa',
            'Workshop dan Seminar Tematik',
            'Inovasi tata kelola pemerintahan digital',
            'Peningkatan kapasitas leadership kepala desa dan perangkatnya',
        ],
        'pspi': [
            'Bimbingan Teknis',
            'Pengelolaan Keuangan Desa (APBDes, Dana Desa, dll.)',
            'Perencanaan dan Pelaporan Pembangunan Desa',
            'Pelatihan Penyusunan RPJMDes dan RKPDes',
            'Manajemen Aset Desa',
            'Digitalisasi Administrasi Desa',
            'Studi Banding',
            'Kunjungan ke desa-desa percontohan',
            'Pertukaran pengalaman dan pembelajaran praktik terbaik',
            'Pemantapan inovasi pelayanan publik desa',
            'Workshop dan Seminar Tematik',
            'Inovasi tata kelola pemerintahan digital',
            'Peningkatan kapasitas leadership kepala desa dan perangkatnya',
        ]
    };

    const targetSelect = document.querySelector('select[name="target_website"]');
    const categorySelect = document.getElementById('category');

    function populateCategories(target) {
        const cats = categories[target] || [];
        categorySelect.innerHTML = '<option value="">-- Pilih kategori --</option>';
        cats.forEach(cat => {
            const opt = document.createElement('option');
            opt.value = cat;
            opt.textContent = cat;
            categorySelect.appendChild(opt);
        });

        const oldValue = @json(old('category', ''));
        if (oldValue) {
            categorySelect.value = oldValue;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        populateCategories(targetSelect.value);
    });

    targetSelect.addEventListener('change', function () {
        populateCategories(this.value);
    });
</script>

<script>
    document.addEventListener("trix-attachment-add", function(event) {
        if (event.attachment.file) {
            uploadTrixImage(event.attachment);
        }
    });

    function uploadTrixImage(attachment) {
        let file = attachment.file;
        let form = new FormData();
        form.append("image", file);

        fetch("{{ route('trix.upload') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: form,
        })
        .then(response => response.json())
        .then(result => {
            attachment.setAttributes({
                url: result.url,
                href: result.url
            });
        })
        .catch(error => {
            console.error(error);
        });
    }
</script>

<script>
    const targetWebsiteSelect = document.querySelector('select[name="target_website"]');
    const authorSelect = document.querySelector('select[name="author"]');

    const authorMapping = {
        'pustaka-pemda': 'admin-pustaka-pemda',
        'csc': 'admin-csc',
        'pspi': 'admin-pspi'
    };

    targetWebsiteSelect.addEventListener('change', function () {
        const selectedTarget = this.value;
        if (authorMapping[selectedTarget]) {
            authorSelect.value = authorMapping[selectedTarget];
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const selectedTarget = targetWebsiteSelect.value;
        if (authorMapping[selectedTarget]) {
            authorSelect.value = authorMapping[selectedTarget];
        }
    });
</script>


