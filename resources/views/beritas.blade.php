<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Berita & Artikel - e-CSR MAHULU</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/logo_mahulu.png">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Preconnect to Google font domains for faster loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- material symbols for icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet" />
    <!-- include weight/fill variant if needed -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    "primary": "#136dec",
                    "background-light": "#f8fafc",
                    "background-dark": "#0f172a",
                },
                fontFamily: {
                    "display": ["Public Sans"]
                },
                borderRadius: {
                    "DEFAULT": "0.5rem",
                    "lg": "0.75rem",
                    "xl": "1rem",
                    "full": "9999px"
                },
            },
        },
    }
    </script>
    <style>
    body {
        font-family: 'Public Sans', sans-serif;
    }

    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    </style>
</head>

<body
    class="bg-background-light  text-slate-900  font-display transition-colors duration-300 max-w-[1440px] mx-auto shadow-2xl bg-white ">
    <!-- Top Navigation -->
    <header
        class="sticky top-0 z-50 w-full bg-white/80  backdrop-blur-md border-b border-slate-200 ">
        <div class="max-w-7xl mx-auto px-12 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <div class="  rounded-lg text-white">
                        <img src="/assets/logo_mahulu.png" class="h-14 p-1 mr-1 bg-white rounded-full">
                    </div>
                    <h1 class="text-xl font-bold tracking-tight text-slate-900  uppercase">e-CSR MAHAKAM
                        ULU
                    </h1>
                </div>
                <nav class="  items-center gap-8 hidden">
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#beranda">Beranda</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#about">Tentang CSR</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#reports">Laporan</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#stats">Statistik</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="/beritas">Berita</a>
                </nav>
                <div class="flex items-center gap-4 hidden">
                    <button
                        class="bg-primary text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-blue-700 transition-all shadow-lg shadow-primary/30">
                        Login
                    </button>
                    <button class="hidden text-slate-900 ">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="py-12 bg-white ">
        <div class="max-w-7xl mx-auto px-12">
            <!-- Page Title -->
            <div class="mb-12">
                <h1 class="text-4xl font-extrabold mb-4">Berita &amp; Artikel Terkini</h1>
                <p class="text-slate-600  text-lg">Kumpulan berita dan artikel terbaru tentang
                    program CSR di Mahakam Ulu</p>
            </div>

            <!-- News Grid with Sidebar -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - News List -->
                <div class="lg:col-span-2">
                    <!-- Search Bar -->
                    <div class="mb-6">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="material-symbols-outlined text-slate-400">search</span>
                            </span>
                            <input type="text" id="beritaSearch"
                                class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200  bg-white  focus:ring-2 focus:ring-primary transition-all"
                                placeholder="Cari artikel..." />
                        </div>
                    </div>

                    <!-- News Articles Grid -->
                    <div class="space-y-6" id="beritaContainer">
                        @forelse($berita as $item)
                        <article
                            class="bg-white  rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all group berita-item cursor-pointer"
                            data-title="{{ strtolower($item->headline) }}"
                            data-category="{{ strtolower($item->kategori) }}"
                            onclick="window.location.href='/news/{{ $item->slug }}'">
                            <div class="flex flex-col md:flex-row gap-4">
                                <!-- Image -->
                                <div class="md:w-1/3 h-48 overflow-hidden flex-shrink-0">
                                    <img alt="{{ $item->headline }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        src="{{ asset('storage/' . $item->gambar) }}" />
                                </div>

                                <!-- Content -->
                                <div class="flex-1 p-6 flex flex-col justify-between">
                                    <div>
                                        <div class="flex items-center gap-3 mb-3">
                                            <span
                                                class="bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                                                {{ $item->kategori }}
                                            </span>
                                            <span class="text-xs text-slate-500">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                            </span>
                                        </div>
                                        <h3
                                            class="text-xl font-bold mb-3 group-hover:text-primary transition-colors line-clamp-2">
                                            {{ $item->headline }}
                                        </h3>
                                        <p class="text-slate-600  text-sm line-clamp-3">
                                            {{ Str::limit(strip_tags($item->berita), 150, '...') }}
                                        </p>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="flex items-center gap-4 text-sm text-slate-500">
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-sm">visibility</span>
                                                {{ $item->dilihat ?? 0 }} views
                                            </span>
                                        </div>
                                        <a href="/news/{{ $item->slug }}"
                                            class="text-primary font-semibold hover:underline flex items-center gap-1">
                                            Baca Selengkapnya
                                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-slate-500 text-lg">Belum ada artikel yang dipublikasikan</p>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-8 flex items-center justify-center gap-2">
                        <button id="prevPageBtn" onclick="previousPage()"
                            class="p-2 rounded-lg border border-slate-200  hover:bg-primary hover:text-white hover:border-primary transition-all disabled:opacity-50"
                            disabled>
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <div id="pageButtons" class="flex gap-1"></div>
                        <button id="nextPageBtn" onclick="nextPage()"
                            class="p-2 rounded-lg border border-slate-200  hover:bg-primary hover:text-white hover:border-primary transition-all disabled:opacity-50">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>

                <!-- Right Column - Most Visited Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Most Visited Card -->
                    <div class="bg-white  rounded-2xl p-6 shadow-sm sticky top-24">
                        <h3 class="text-xl font-bold mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">local_fire_department</span>
                            Paling Populer
                        </h3>

                        <div class="space-y-4">
                            @forelse($beritaTerpopuler as $index => $item)
                            <a href="/news/{{ $item->slug }}"
                                class="group block p-3 rounded-xl bg-slate-50  hover:bg-primary/10  transition-colors">
                                <div class="flex items-start gap-3">
                                    <!-- Left: Image -->
                                    <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                                        <img alt="{{ $item->headline }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                            src="{{ asset('storage/' . $item->gambar) }}" />
                                    </div>
                                    <!-- Right: Content -->
                                    <div class="flex-1 min-w-0 flex flex-col justify-between">
                                        <h4 class="font-semibold text-sm group-hover:text-primary transition-colors line-clamp-2">
                                            {{ $item->headline }}
                                        </h4>
                                        <div class="flex items-center gap-2 text-xs text-slate-500 mt-2">
                                            <span class="material-symbols-outlined text-xs">visibility</span>
                                            <span>{{ $item->dilihat ?? 0 }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @empty
                            <div class="text-center py-8">
                                <p class="text-slate-500 text-sm">Belum ada artikel populer</p>
                            </div>
                            @endforelse
                        </div>

                        <!-- Divider -->
                        <div class="my-6 border-t border-slate-200 "></div>

                        <!-- Categories -->
                        <!-- <h4 class="font-bold text-sm mb-3 uppercase tracking-wide">Kategori</h4>
                        <div class="space-y-2">
                            <button onclick="filterByCategory('all')"
                                class="w-full text-left px-3 py-2 rounded-lg text-sm hover:bg-primary/10  transition-colors category-filter active">
                                Semua Kategori
                            </button>
                            @php
                            $categories = $berita->pluck('kategori')->unique()->values();
                            @endphp
                            @forelse($categories as $category)
                            <button onclick="filterByCategory('{{ $category }}')"
                                class="w-full text-left px-3 py-2 rounded-lg text-sm hover:bg-primary/10  transition-colors category-filter">
                                {{ $category }}
                            </button>
                            @empty
                            @endforelse
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-background-dark text-white pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-12">
            <div class="grid md:grid-cols-3 gap-12 mb-16">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="rounded-lg text-white">
                            <img src="/assets/logo_mahulu.png" class="h-14 p-1 mr-1 bg-white rounded-full">
                        </div>
                        <h1 class="text-xl font-bold tracking-tight uppercase">e-CSR MAHULU </h1>
                    </div>
                    <div>

                        <ul class="space-y-4 text-slate-400 text-sm">
                            <li class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary">location_on</span>
                                <span>Jl. Poros Ujoh Bilang - Long Bagun Kec. Long Bagun Kab. Mahulu Provinsi Kalimantan
                                    Timur</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">phone</span>
                                <span>0852-2220-0606</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-primary">mail</span>
                                <span>csrmahulu@gmail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h5 class="font-bold text-lg mb-6">Link Terkait</h5>
                    <ul class="space-y-4 text-slate-400 text-sm">
                        <li><a target="_blank" class="hover:text-primary transition-colors"
                                href="https://csr-indonesia.com/">CSR Indonesia</a>
                        </li>
                        <li><a target="_blank" class="hover:text-primary transition-colors"
                                href="https://forumcsrindonesia.org/">Forum CSR Indonesia</a>
                        </li>
                        <li><a target="_blank" class="hover:text-primary transition-colors"
                                href="https://gocsrkaltim.com/">Go CSR Kaltim</a>
                        </li>
                        <li><a target="_blank" class="hover:text-primary transition-colors"
                                href="https://bappelitbangda.mahakamulukab.go.id/beranda">Bappelitbangda
                                Mahulu</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-bold text-lg mb-6">Informasi</h5>
                    <ul class="space-y-4 text-slate-400 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="/">Beranda</a></li>
                        <li><a class="hover:text-primary transition-colors" href="/beritas">Berita & Artikel</a></li>
                        <li><a class="hover:text-primary transition-colors" href="/#about">Tentang CSR</a></li>
                        <li><a class="hover:text-primary transition-colors" href="/#reports">Laporan</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 border-t border-white/10 text-center text-slate-500 text-sm">
                <p>© 2025 BAPPELITBANGDA MAHULU.</p>
            </div>
        </div>
    </footer>

    <script>
    // Pagination variables
    const itemsPerPage = 6;
    let currentPage = 1;
    let allItems = [];
    let filteredItems = [];
    let currentCategory = 'all';

    // Initialize pagination
    document.addEventListener('DOMContentLoaded', function() {
        allItems = Array.from(document.querySelectorAll('.berita-item'));
        filteredItems = [...allItems];
        renderPage();
        updatePagination();
    });

    // Search functionality
    document.getElementById('beritaSearch').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        filteredItems = allItems.filter(item => {
            const title = item.getAttribute('data-title');
            const category = item.getAttribute('data-category');
            const matches = title.includes(searchTerm) || category.includes(searchTerm);
            return matches;
        });

        currentPage = 1;
        renderPage();
        updatePagination();
    });

    // Category filter
    function filterByCategory(category) {
        currentCategory = category;

        // Update active button
        document.querySelectorAll('.category-filter').forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        if (category === 'all') {
            filteredItems = [...allItems];
        } else {
            filteredItems = allItems.filter(item => {
                return item.getAttribute('data-category') === category.toLowerCase();
            });
        }

        currentPage = 1;
        renderPage();
        updatePagination();
    }

    // Render current page
    function renderPage() {
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        const startIdx = (currentPage - 1) * itemsPerPage;
        const endIdx = startIdx + itemsPerPage;

        // Hide all items
        allItems.forEach(item => item.style.display = 'none');

        // Show items for current page
        filteredItems.slice(startIdx, endIdx).forEach(item => {
            item.style.display = '';
        });

        // Show "no results" message if needed
        if (filteredItems.length === 0) {
            document.getElementById('beritaContainer').innerHTML =
                '<div class="text-center py-12"><p class="text-slate-500">Tidak ada artikel yang ditemukan</p></div>';
        }
    }

    // Update pagination buttons
    function updatePagination() {
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        const pageButtonsContainer = document.getElementById('pageButtons');
        pageButtonsContainer.innerHTML = '';

        // Previous button
        document.getElementById('prevPageBtn').disabled = currentPage === 1;

        // Page buttons
        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                const btn = document.createElement('button');
                btn.innerText = i;
                btn.className = `px-3 py-2 rounded-lg transition-all text-sm ${i === currentPage 
                    ? 'bg-primary text-white shadow-lg' 
                    : 'border border-slate-200  hover:bg-slate-100 '}`;
                btn.onclick = () => {
                    currentPage = i;
                    renderPage();
                    updatePagination();
                    window.scrollTo({
                        top: document.getElementById('beritaContainer').offsetTop - 100,
                        behavior: 'smooth'
                    });
                };
                pageButtonsContainer.appendChild(btn);
            }
        }

        // Next button
        document.getElementById('nextPageBtn').disabled = currentPage === totalPages || totalPages === 0;
    }

    // Navigation functions
    function previousPage() {
        if (currentPage > 1) {
            currentPage--;
            renderPage();
            updatePagination();
            window.scrollTo({
                top: document.getElementById('beritaContainer').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }

    function nextPage() {
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderPage();
            updatePagination();
            window.scrollTo({
                top: document.getElementById('beritaContainer').offsetTop - 100,
                behavior: 'smooth'
            });
        }
    }
    </script>
</body>

</html>