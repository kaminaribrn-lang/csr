    <!DOCTYPE html>

    <html class="light" lang="id">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>e-CSR MAHULU</title>
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/logo_mahulu.png">
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&amp;display=swap"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
            rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
            <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
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
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Beranda</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#about">Tentang CSR</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#reports">Laporan</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#stats">Statistik</a>
                        <a class="text-sm font-semibold hover:text-primary transition-colors" href="#news">Berita</a>
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
        <!-- Hero Slider Section -->
        <section class="pt-10 px-6">
            {{-- slider --}}
            <?php
                $dataSlider = DB::table('slider')->get();
                $ucapan = DB::table('profil')->where('url', 'ucapan')->get();
                $ucapan = $ucapan[0]->keterangan; 
            ?>

            <div class="w-full flex flex-col md:flex-row mx-auto items-center gap-6 lg:gap-4 ">
                <!-- Left Side - Leader Image -->
                <div class="w-full md:w-1/3 flex justify-center lg:p-4">
                    <img class="w-full max-w-xs md:max-w-md lg:max-w-lg h-auto rounded-xl bg-cover object-cover cursor-pointer border-2 border-blue-800 shadow-lg"
                        src="/assets/{{ $ucapan }}">
                </div>

                <!-- Right Side - Slider -->
                <div class="w-full ">
                    <div class="relative rounded-xl overflow-hidden shadow-lg group">
                        <div class="flex transition-transform duration-500 ease-out" id="sliderContainer"
                            style="width: 100%; transform: translateX(0);">
                            @forelse($dataSlider as $slide)
                            <div class="w-full flex-shrink-0">
                                <img alt="Slider" class="w-full h-auto max-h-80 md:max-h-[416px] object-cover" 
                                    src="/assets/{{ $slide->slider }}" />
                            </div>
                            @empty
                            <div class="w-full h-96 bg-slate-200 flex items-center justify-center">
                                <p class="text-slate-500">Tidak ada slider tersedia</p>
                            </div>
                            @endforelse
                        </div>


                        <!-- Slider Controls: Only show on desktop (sm+) -->
                        <div class="absolute inset-y-0 left-0 flex items-center z-10 px-2 hidden sm:flex">
                            <button id="heroPrevBtn" type="button"
                                class="w-12 h-12 rounded-full border border-slate-200  flex items-center justify-center hover:bg-primary hover:text-white hover:border-primary transition-all text-slate-600  bg-white/80 ">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </button>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center z-10 px-2 hidden sm:flex">
                            <button id="heroNextBtn" type="button"
                                class="w-12 h-12 rounded-full border border-slate-200  flex items-center justify-center hover:bg-primary hover:text-white hover:border-primary transition-all text-slate-600  bg-white/80 ">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                        </div>

                        <!-- Slider Dots -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="sliderDots">
                        </div>
                    </div>
                </div>

                <script>
                let currentSlide = 0;
                let autoSlideInterval;

                function initSlider() {
                    const slides = document.querySelectorAll('#sliderContainer > div');
                    const dotsContainer = document.getElementById('sliderDots');

                    // Create dots
                    slides.forEach((_, index) => {
                        const dot = document.createElement('button');
                        dot.className =
                            `w-3 h-3 rounded-full transition-all ${index === 0 ? 'bg-primary w-8' : 'bg-white/50'}`;
                        dot.onclick = () => goToSlide(index);
                        dotsContainer.appendChild(dot);
                    });

                    // Add event listeners for desktop-only nav buttons
                    const prevBtn = document.getElementById('heroPrevBtn');
                    const nextBtn = document.getElementById('heroNextBtn');
                    if (prevBtn) prevBtn.addEventListener('click', prevSlide);
                    if (nextBtn) nextBtn.addEventListener('click', nextSlide);

                    startAutoSlide();
                }

                function updateSlider() {
                    const container = document.getElementById('sliderContainer');
                    container.style.transform = `translateX(-${currentSlide * 100}%)`;

                    // Update dots
                    const dots = document.querySelectorAll('#sliderDots button');
                    dots.forEach((dot, index) => {
                        if (index === currentSlide) {
                            dot.className = 'w-8 h-3 rounded-full bg-primary transition-all';
                        } else {
                            dot.className = 'w-3 h-3 rounded-full bg-white/50 transition-all';
                        }
                    });
                }

                function nextSlide() {
                    const slides = document.querySelectorAll('#sliderContainer > div');
                    currentSlide = (currentSlide + 1) % slides.length;
                    updateSlider();
                    resetAutoSlide();
                }

                function prevSlide() {
                    const slides = document.querySelectorAll('#sliderContainer > div');
                    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                    updateSlider();
                    resetAutoSlide();
                }

                function goToSlide(index) {
                    currentSlide = index;
                    updateSlider();
                    resetAutoSlide();
                }

                function startAutoSlide() {
                    autoSlideInterval = setInterval(nextSlide, 7000);
                }

                function resetAutoSlide() {
                    clearInterval(autoSlideInterval);
                    startAutoSlide();
                }

                initSlider();
                </script>
            </div>

        </section>

        <!-- About CSR Section -->
        <section class="py-24 bg-white " id="about">
            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center justify-between">
                <div class="space-y-6">
                    <h3 class="text-primary font-bold tracking-widest uppercase text-sm">Tentang CSR Reporting</h3>
                    <h2 class="text-4xl font-extrabold text-slate-900  leading-tight">Transformasi Digital
                        untuk Pelaporan CSR yang Akuntabel</h2>
                    <p class="text-slate-600  text-lg">Sistem Pelaporan CSR Online dirancang untuk
                        mempermudah perusahaan dalam melaporkan kontribusi sosial dan lingkungannya. Dengan integrasi data
                        yang real-time, kami memastikan setiap rupiah yang dialokasikan memberikan dampak yang terukur bagi
                        masyarakat dan pembangunan berkelanjutan.</p>
                    <ul class="space-y-4 hidden">
                        <li class="flex items-center gap-3">
                            <span
                                class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-full text-sm">check</span>
                            <span class="font-medium">lorem ipsum</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-full text-sm">check</span>
                            <span class="font-medium">lorem ipsum</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span
                                class="material-symbols-outlined text-primary bg-primary/10 p-1 rounded-full text-sm">check</span>
                            <span class="font-medium">lorem ipsum</span>
                        </li>
                    </ul>
                </div>
                <div class="relative m-auto w-full max-w-xs md:max-w-md lg:max-w-lg">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl"></div>
                    <div
                        class="rounded-3xl overflow-hidden shadow-2xl transition-transform duration-500 hover:scale-[1.02] w-full">
                        <img alt="Tree planting activity" class="w-full h-auto"
                            data-alt="Volunteers planting young trees in a field" src="/assets/tentang.png" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Legal Basis (Dasar Hukum) -->
        <section class="py-20 bg-slate-50 ">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold mb-4">Dasar Hukum Pelaksanaan</h2>
                    <p class="text-slate-600 ">Landasan regulasi program Tanggung Jawab Sosial dan
                        Lingkungan di Indonesia</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($dasarhukum as $item)
                    <div
                        class="bg-white  p-8 rounded-2xl border border-slate-200  hover:border-primary transition-colors group h-full flex flex-col">
                        <span
                            class="material-symbols-outlined text-2xl text-primary mb-4 group-hover:scale-110 transition-transform">history_edu</span>
                        <h4 class="font-bold mb-2">{{ $item->nama }}</h4>
                        <p class="text-sm text-slate-500">{{ $item->deskripsi }} </p>
                        <button type="button" onclick="openPdfPreview('{{ asset('assets/' . $item->file) }}')"
                            class="mt-auto  px-4 py-2 bg-primary/10 hover:bg-primary text-primary hover:text-white rounded-lg font-semibold text-sm transition-all duration-300 flex items-center gap-2 group">
                            <span
                                class="material-symbols-outlined text-base group-hover:scale-110 transition-transform">open_in_new</span>
                            Lihat Dokumen
                        </button>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-slate-500">Tidak ada data dasar hukum</p>
                    </div>
                    @endforelse

                    <script>
                    function openPdfPreview(pdfUrl) {
                        const modal = document.createElement('div');
                        modal.className = 'fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4';
                        modal.innerHTML = `
                            <div class="bg-white  rounded-2xl max-w-4xl w-full h-full flex flex-col">
                                <div class="flex justify-between items-center p-6 border-b border-slate-200 ">
                                    <h3 class="text-xl font-bold">Preview PDF</h3>
                                    <button type="button" onclick="this.closest('.fixed').remove()" class="text-slate-500 hover:text-slate-900">
                                        <span class="material-symbols-outlined">close</span>
                                    </button>
                                </div>
                                <div class="flex-1 overflow-auto">
                                    <iframe src="${pdfUrl}" class="w-full h-full" frameborder="0"></iframe>
                                </div>
                            </div>
                        `;
                        document.body.appendChild(modal);
                        modal.onclick = (e) => e.target === modal && modal.remove();
                    }
                    </script>
                </div>
            </div>
        </section>
        <!-- Program Unggulan Bupati -->
        <section class="py-20 bg-white " id="program-unggulan-bupati">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">
                    <div>
                        <h3 class="text-primary font-bold tracking-widest uppercase text-xs mb-2">PROGRAM PRIORITAS</h3>
                        <h2 class="text-2xl font-extrabold">Program Unggulan Bupati</h2>
                        <p class="text-sm text-slate-600  mt-3 max-w-3xl">Daftar program unggulan beserta uraian rinci yang dapat ditampilkan penuh, disembunyikan, atau dibuka sebagian sesuai kebutuhan pencarian.</p>
                    </div>
                    <div class="grid w-full lg:w-auto sm:grid-cols-3 xl:grid-cols-3 gap-3">
                        <div class="relative sm:col-span-2 xl:col-span-1">
                            <input id="programUnggulanSearch"
                                class="w-full pl-10 pr-4 py-2.5 text-sm rounded-xl border border-slate-200  bg-white  focus:ring-2 focus:ring-primary transition-all"
                                placeholder="Cari program atau uraian..." type="text" />
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">search</span>
                        </div>
                        <div class="sm:col-span-1 xl:col-span-1">
                            @php
                                $yearOptions = collect($programUnggulanYears ?? [])
                                    ->map(function ($year) {
                                        return (string) $year;
                                    })
                                    ->merge(['2025', '2026'])
                                    ->unique()
                                    ->sort()
                                    ->values();
                            @endphp
                            <select id="programUnggulanYearFilter"
                                class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary transition-all">
                                <option value="" {{ $selectedYear === '' ? 'selected' : '' }}>Semua Tahun</option>
                                @foreach($yearOptions as $year)
                                    <option value="{{ $year }}" {{ (string) $selectedYear === (string) $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3 mb-4 text-xs text-slate-600 ">
                    <div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-blue-100 text-blue-900 border border-blue-200">
                        <span class="w-3 h-3 rounded-sm bg-blue-300"></span>
                        <span class="font-semibold">Baris Program</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-white  border border-slate-200 ">
                        <span class="w-3 h-3 rounded-sm bg-white border border-slate-300"></span>
                        <span class="font-semibold">Baris Uraian</span>
                    </div>
                </div>

                <div class="bg-white  rounded-2xl border border-slate-200  overflow-hidden shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="min-w-[860px] w-full text-left border-collapse" id="programUnggulanTable">
                            <thead class="bg-slate-50  border-b border-slate-200 ">
                                <tr>
                                    <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Program / Uraian</th>
                                    <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Jenis Baris</th>
                                    <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider">Total Nominal Realisasi CSR</th>
                                    <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="programUnggulanTableBody" class="divide-y divide-slate-200 ">
                                @forelse($programUnggulanBupati as $program)
                                    @php
                                        $programNominal = $programNominalMap[(string) $program->id] ?? ['all' => 0, 'years' => []];
                                    @endphp
                                    <tr class="program-row bg-blue-100 text-blue-950" data-program-id="{{ $program->id }}"
                                        data-program-name="{{ strtolower($program->nama) }}"
                                        data-nominal-all="{{ (float) $programNominal['all'] }}"
                                        data-yearly-nominal='@json($programNominal['years'])' style="display: none;">
                                        <td class="px-4 py-2.5 text-sm font-bold whitespace-nowrap">{{ $program->nama }}</td>
                                        <td class="px-4 py-2.5 text-xs font-semibold whitespace-nowrap">Program</td>
                                        <td class="px-4 py-2.5 text-xs text-blue-900 nominal-cell">{{ number_format($programNominal['all'], 0, ',', '.') }}</td>
                                        <td class="px-4 py-2.5 text-center">
                                            <button type="button"
                                                class="toggle-uraian inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-blue-200 hover:bg-blue-300 transition-all text-xs font-semibold text-blue-900"
                                                data-program-id="{{ $program->id }}">
                                                <span class="material-symbols-outlined text-sm">unfold_less</span>
                                                <span class="toggle-label">Sembunyikan Uraian</span>
                                            </button>
                                        </td>
                                    </tr>
                                    @foreach($program->uraians as $uraian)
                                        @php
                                            $uraianNominal = $uraianNominalMap[(string) $uraian->id] ?? ['all' => 0, 'years' => []];
                                        @endphp
                                        <tr class="uraian-row bg-white  text-slate-800 "
                                            data-parent-id="{{ $program->id }}"
                                            data-uraian-id="{{ $uraian->id }}"
                                            data-uraian-text="{{ strtolower($uraian->uraian) }}"
                                            data-nominal-all="{{ (float) $uraianNominal['all'] }}"
                                            data-yearly-nominal='@json($uraianNominal['years'])' style="display: none;">
                                            <td class="px-4 py-2.5 text-xs leading-relaxed border-l-4 border-blue-100">{{ $uraian->uraian }}</td>
                                            <td class="px-4 py-2.5 text-xs whitespace-nowrap text-slate-600">Uraian</td>
                                            <td class="px-4 py-2.5 text-xs text-slate-500 nominal-cell">{{ number_format($uraianNominal['all'], 0, ',', '.') }}</td>
                                            <td class="px-4 py-2.5 text-center text-xs text-slate-400">-</td>
                                        </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-sm text-center text-slate-500">Belum ada program unggulan bupati</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 px-6 py-4 bg-slate-50  border-t border-slate-200 ">
                        <div class="text-xs text-slate-700 ">
                            Menampilkan <span id="programUnggulanStartIndex" class="font-bold">0</span> -
                            <span id="programUnggulanEndIndex" class="font-bold">0</span> dari
                            <span id="programUnggulanTotalRows" class="font-bold">0</span> baris
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            <button id="expandAllPrograms"
                                class="px-4 py-2 rounded-lg bg-primary text-white text-xs font-semibold hover:bg-blue-700 transition-all">
                                Tampilkan Semua Uraian
                            </button>
                            <button id="collapseAllPrograms"
                                class="px-4 py-2 rounded-lg bg-slate-200  text-slate-700  text-xs font-semibold hover:bg-slate-300  transition-all">
                                Sembunyikan Semua
                            </button>
                            <label class="flex items-center gap-2 px-3 py-2 text-xs rounded-lg border border-slate-200  bg-white  text-slate-700 ">
                                <span class="font-semibold whitespace-nowrap">Jumlah baris</span>
                                <select id="programUnggulanRowsPerPage"
                                    class="bg-transparent focus:outline-none text-xs">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </label>
                            <div class="flex gap-2" id="programUnggulanPageButtons"></div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    let rowsPerPage = 10;
                    let currentPage = 1;
                    const expandedPrograms = new Set();

                    const searchInput = document.getElementById('programUnggulanSearch');
                    const yearFilterSelect = document.getElementById('programUnggulanYearFilter');
                    const rowsPerPageSelect = document.getElementById('programUnggulanRowsPerPage');
                    const resetButton = document.getElementById('programUnggulanReset');
                    const pageButtonsContainer = document.getElementById('programUnggulanPageButtons');
                    const programRows = Array.from(document.querySelectorAll('.program-row'));

                    const programGroups = programRows.map((programRow) => {
                        const id = programRow.dataset.programId;
                        const uraianRows = Array.from(document.querySelectorAll(`.uraian-row[data-parent-id="${id}"]`));

                        return {
                            id,
                            programRow,
                            uraianRows,
                            programName: programRow.dataset.programName || '',
                        };
                    });

                    programGroups.forEach((group) => expandedPrograms.add(group.id));

                    function formatNominal(value) {
                        return new Intl.NumberFormat('id-ID', {
                            maximumFractionDigits: 0,
                        }).format(Number(value || 0));
                    }

                    function getYearlyNominalData(row) {
                        try {
                            return JSON.parse(row.dataset.yearlyNominal || '{}');
                        } catch (e) {
                            return {};
                        }
                    }

                    function getSelectedYear() {
                        return yearFilterSelect ? yearFilterSelect.value : '';
                    }

                    function getRowNominalByYear(row) {
                        const selectedYear = getSelectedYear();

                        if (!selectedYear) {
                            return Number(row.dataset.nominalAll || 0);
                        }

                        const yearlyNominal = getYearlyNominalData(row);
                        return Number(yearlyNominal[selectedYear] || 0);
                    }

                    function getFilteredGroups() {
                        const query = searchInput.value.trim().toLowerCase();

                        return programGroups.filter((group) => {
                            const programMatch = group.programName.includes(query);
                            const yearFilteredUraianRows = group.uraianRows;

                            const matchingUraianRows = group.uraianRows.filter((row) => {
                                const text = row.dataset.uraianText || '';
                                return text.includes(query);
                            });

                            group.programRow.dataset.programMatch = programMatch ? '1' : '0';
                            group.programRow.dataset.matchingUraianCount = matchingUraianRows.length;
                            group.yearFilteredUraianRows = yearFilteredUraianRows;
                            group.matchingUraianRows = matchingUraianRows;

                            if (!query) {
                                return true;
                            }

                            return programMatch || matchingUraianRows.length > 0;
                        });
                    }

                    function getVisibleUraianRows(group, query) {
                        const programMatch = group.programRow.dataset.programMatch === '1';
                        const shouldShowByMode = expandedPrograms.has(group.id);

                        if (!shouldShowByMode) {
                            return [];
                        }

                        if (!query) {
                            return group.yearFilteredUraianRows || [];
                        }

                        return programMatch ? (group.yearFilteredUraianRows || []) : (group.matchingUraianRows || []);
                    }

                    function updateToggleButtons() {
                        document.querySelectorAll('.toggle-uraian').forEach((button) => {
                            const programId = button.dataset.programId;
                            const isExpanded = expandedPrograms.has(programId);
                            const label = button.querySelector('.toggle-label');
                            const icon = button.querySelector('.material-symbols-outlined');

                            label.textContent = isExpanded ? 'Sembunyikan Uraian' : 'Tampilkan Uraian';
                            icon.textContent = isExpanded ? 'unfold_less' : 'unfold_more';
                        });
                    }

                    function createPageButton(text, enabled, onClick, isActive = false) {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.innerText = text;
                        btn.disabled = !enabled;
                        btn.className = `px-3 py-1.5 text-xs border rounded-lg transition-all ${isActive ? 'bg-blue-500 text-white border-blue-500 shadow-sm' : 'bg-white  text-slate-700  hover:bg-slate-50 '} ${!enabled ? 'opacity-30 cursor-not-allowed' : ''}`;
                        btn.onclick = onClick;
                        pageButtonsContainer.appendChild(btn);
                    }

                    function renderButtons(totalPages) {
                        pageButtonsContainer.innerHTML = '';

                        if (totalPages <= 1) {
                            return;
                        }

                        createPageButton('Prev', currentPage > 1, () => {
                            currentPage--;
                            updateProgramTable();
                        });

                        for (let i = 1; i <= totalPages; i++) {
                            if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                                createPageButton(i, true, () => {
                                    currentPage = i;
                                    updateProgramTable();
                                }, i === currentPage);
                            } else if (i === currentPage - 2 || i === currentPage + 2) {
                                const dot = document.createElement('span');
                                dot.innerText = '...';
                                dot.className = 'px-2 text-slate-400';
                                pageButtonsContainer.appendChild(dot);
                            }
                        }

                        createPageButton('Next', currentPage < totalPages, () => {
                            currentPage++;
                            updateProgramTable();
                        });
                    }

                    function updateProgramTable() {
                        const query = searchInput.value.trim().toLowerCase();
                        const filteredGroups = getFilteredGroups();
                        const flatVisibleRows = [];

                        filteredGroups.forEach((group) => {
                            flatVisibleRows.push(group.programRow);

                            getVisibleUraianRows(group, query).forEach((row) => {
                                flatVisibleRows.push(row);
                            });
                        });

                        const totalRows = flatVisibleRows.length;
                        const totalPages = Math.ceil(totalRows / rowsPerPage);

                        if (currentPage > totalPages && totalPages > 0) currentPage = totalPages;
                        if (currentPage < 1) currentPage = 1;

                        const start = (currentPage - 1) * rowsPerPage;
                        const end = start + rowsPerPage;
                        const pageRows = new Set(flatVisibleRows.slice(start, end));

                        programGroups.forEach((group) => {
                            const programNominalCell = group.programRow.querySelector('.nominal-cell');
                            if (programNominalCell) {
                                programNominalCell.innerText = formatNominal(getRowNominalByYear(group.programRow));
                            }

                            group.programRow.style.display = pageRows.has(group.programRow) ? '' : 'none';

                            const visibleUraianRows = getVisibleUraianRows(group, query);

                            group.uraianRows.forEach((row) => {
                                const uraianNominalCell = row.querySelector('.nominal-cell');
                                if (uraianNominalCell) {
                                    uraianNominalCell.innerText = formatNominal(getRowNominalByYear(row));
                                }

                                row.style.display = visibleUraianRows.includes(row) && pageRows.has(row) ? '' : 'none';
                            });
                        });

                        document.getElementById('programUnggulanTotalRows').innerText = totalRows;
                        document.getElementById('programUnggulanStartIndex').innerText = totalRows === 0 ? 0 : start + 1;
                        document.getElementById('programUnggulanEndIndex').innerText = Math.min(end, totalRows);

                        updateToggleButtons();
                        renderButtons(totalPages);
                    }

                    document.querySelectorAll('.toggle-uraian').forEach((button) => {
                        button.addEventListener('click', function() {
                            const programId = this.dataset.programId;

                            if (expandedPrograms.has(programId)) {
                                expandedPrograms.delete(programId);
                            } else {
                                expandedPrograms.add(programId);
                            }

                            updateProgramTable();
                        });
                    });

                    searchInput.addEventListener('input', function() {
                        currentPage = 1;
                        updateProgramTable();
                    });

                    if (yearFilterSelect) {
                        yearFilterSelect.addEventListener('change', function() {
                            currentPage = 1;
                            updateProgramTable();
                        });
                    }

                    rowsPerPageSelect.addEventListener('change', function() {
                        rowsPerPage = parseInt(this.value, 10);
                        currentPage = 1;
                        updateProgramTable();
                    });

                    document.getElementById('expandAllPrograms').addEventListener('click', function() {
                        programGroups.forEach((group) => expandedPrograms.add(group.id));
                        updateProgramTable();
                    });

                    document.getElementById('collapseAllPrograms').addEventListener('click', function() {
                        expandedPrograms.clear();
                        updateProgramTable();
                    });

                    if (resetButton) {
                        resetButton.addEventListener('click', function() {
                            searchInput.value = '';
                            rowsPerPage = 10;
                            rowsPerPageSelect.value = '10';
                            expandedPrograms.clear();
                            programGroups.forEach((group) => expandedPrograms.add(group.id));
                            currentPage = 1;
                            updateProgramTable();
                        });
                    }

                    updateProgramTable();
                });
            </script>
        </section>
        <!-- Grafik Realisasi Kumulatif Bulanan -->
        <section class="py-16 bg-white" id="grafik-realisasi-bulanan">
            <div class="max-w-7xl mx-auto px-6">
                <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <h3 class="text-primary font-bold tracking-widest uppercase text-xs mb-2">ANALISIS REALISASI</h3>
                        <h2 class="text-2xl font-extrabold">Grafik Realisasi CSR Kumulatif per Bulan ({{ $selectedYear }})</h2>
                    </div>
                    <div class="w-full md:w-56">
                        <label for="monthlyChartYearFilter" class="block text-xs font-semibold text-slate-600 mb-2">Filter Tahun</label>
                        <select id="monthlyChartYearFilter"
                            class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary transition-all">
                            @foreach(($monthlyRealizationYears ?? ['2025', '2026']) as $yearOption)
                                <option value="{{ $yearOption }}" {{ (string) $selectedYear === (string) $yearOption ? 'selected' : '' }}>
                                    {{ $yearOption }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <p class="text-sm text-slate-600 mt-2">Logika kumulatif: Januari = realisasi Januari, Februari = Januari-Februari, hingga Desember = Januari-Desember.</p> -->
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 md:p-6">
                    <div class="h-[360px]">
                        <canvas id="monthlyCumulativeRealizationChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <script>
            window.addEventListener('load', function() {
                const monthlyChartYearFilter = document.getElementById('monthlyChartYearFilter');
                if (monthlyChartYearFilter) {
                    monthlyChartYearFilter.addEventListener('change', function() {
                        const url = new URL(window.location.href);
                        url.searchParams.set('tahun', this.value);
                        window.location.href = url.toString();
                    });
                }

                const chartEl = document.getElementById('monthlyCumulativeRealizationChart');
                if (!chartEl || typeof Chart === 'undefined') {
                    return;
                }

                const labels = @json($monthlyLabels);
                const values = @json($monthlyCumulativeRealization);

                const formatRupiah = (value) => {
                    return 'Rp ' + Number(value || 0).toLocaleString('id-ID');
                };

                new Chart(chartEl.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Realisasi Kumulatif CSR',
                            data: values,
                            backgroundColor: '#136dec',
                            borderRadius: 8,
                            maxBarThickness: 38,
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return formatRupiah(context.raw);
                                    },
                                },
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return formatRupiah(value);
                                    },
                                },
                            },
                        },
                    },
                });
            });
        </script>
        <!-- CSR Fields (Bidang CSR) -->
        <section class="py-24 bg-white hidden ">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h3 class="text-primary font-bold uppercase text-sm mb-2">BIDANG - BIDANG</h3>
                        <h2 class="text-3xl font-extrabold">Pembangunan CSR</h2>
                    </div>
                    <!-- <button class="text-primary font-bold flex items-center gap-2 hover:underline">
                        Lihat Semua <span class="material-symbols-outlined">arrow_forward</span>
                    </button> -->
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @forelse($bidangCsr as $item)
                    <!-- Field Card -->
                    <div class="group cursor-pointer h-full" onclick="showPopup({{ $item->id }})">
                        <div
                            class="bg-slate-100  rounded-3xl p-8 text-center transition-all hover:bg-primary hover:text-white h-full flex flex-col items-center justify-center hover:shadow-lg hover:scale-105">
                            <span
                                class="material-symbols-outlined text-5xl mb-4 text-primary group-hover:text-white group-hover:scale-110 transition-transform">{{$item->logo}}</span>
                            <h4 class="font-bold group-hover:underline">{{ $item->nama }}</h4>
                            <span
                                class="material-symbols-outlined text-sm mt-4 font-semibold text-primary group-hover:text-white group-hover:scale-110 transition-transform">touch_app
                                <p class="font-display text-sm">Klik untuk detail</p>
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-slate-500">Tidak ada data bidang CSR</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- Statistics and Company Table Section -->
        <section class="py-24 bg-white ">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                    <!-- Stats Card -->
                    <div class="md:col-span-1">
                        <div class="bg-gradient-to-br from-primary to-blue-700 rounded-3xl p-8 text-white shadow-xl">
                            <div class="flex items-center justify-between mb-6">
                                <span class="material-symbols-outlined text-5xl opacity-80">business</span>
                                <span class="material-symbols-outlined text-3xl">trending_up</span>
                            </div>
                            <h3 class="text-sm font-semibold opacity-90 mb-2">PERUSAHAAN TERDAFTAR</h3>
                            <h2 class="text-5xl font-black mb-6">{{ $perusahaan->count() }}</h2>
                            <p class="text-sm opacity-90 leading-relaxed">Perusahaan yang telah berpartisipasi dalam program
                                CSR Reporting</p>
                            <div class="mt-6 pt-6 border-t border-white/20">
                                <p class="text-xs opacity-75">Total Program CSR</p>
                                <p id="perusahaanProgramTotal" class="text-3xl font-bold">{{ $perusahaan->sum('kegiatans_count') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Table Container -->
                    <div class="md:col-span-2 w-full">
                        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 mb-4 w-full">
                            <h3 class="text-2xl font-extrabold">Daftar Perusahaan</h3>
                            <div class="flex w-full flex-col gap-2 sm:w-3/4 sm:flex-row sm:justify-end">
                                <select id="perusahaanYearFilter"
                                    class="w-full sm:w-40 px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary transition-all">
                                    <option value="" {{ $selectedYear === '' ? 'selected' : '' }}>Semua Tahun</option>
                                    @foreach($perusahaanYears as $year)
                                        <option value="{{ $year }}" {{ (string) $selectedYear === (string) $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                                <input id="perusahaanSearch"
                                    class="w-full sm:w-1/2 pl-4 pr-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="Cari perusahaan..." type="text" />
                            </div>
                        </div>

                        <div
                            class="bg-white  rounded-2xl border border-slate-200  overflow-hidden w-full">
                            <div class="overflow-x-auto w-full">
                                <table class="min-w-[600px] w-full text-left border-collapse" id="perusahaanTable">
                                    <thead
                                        class="bg-slate-50  border-b border-slate-200 ">
                                        <tr>
                                            <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider whitespace-nowrap">Nama Perusahaan
                                            </th>
                                            <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-center whitespace-nowrap">
                                                Jumlah Kegiatan</th>
                                            <th class="px-4 py-3 text-xs font-bold uppercase tracking-wider text-right whitespace-nowrap">
                                                Total Pagu</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y text-xs divide-slate-200 " id="perusahaanTableBody">
                                        @forelse($perusahaan as $data)
                                        <tr class="hover:bg-slate-50  transition-colors perusahaan-row"
                                            data-name="{{ strtolower($data->nama) }}"
                                            data-year-stats="{{ json_encode($perusahaanStatsByYear[(string) $data->id] ?? []) }}">
                                            <td class="px-4 py-3 font-semibold text-slate-800  whitespace-nowrap">
                                                {{ $data->nama }}</td>
                                            <td class="px-4 py-3 text-center whitespace-nowrap">
                                                <span
                                                    class="bg-blue-100 text-blue-700   px-3 py-1 rounded-full text-xs font-bold">
                                                    <span class="perusahaan-count">{{ $data->kegiatans_count }}</span> Kegiatan
                                                </span>
                                            </td>
                                            <td
                                                class="px-4 py-3 text-right font-mono font-bold text-green-600  whitespace-nowrap">
                                                Rp <span class="perusahaan-total">{{ number_format($data->total_pagu ?? 0, 0, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-8 text-center text-slate-500">Tidak ada data
                                                perusahaan</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination Section -->
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 px-4 py-4 bg-slate-50  w-full">
                                <div class="text-sm text-slate-700 ">
                                    Menampilkan <span id="perusahaanStartIndex" class="font-bold">0</span> - 
                                    <span id="perusahaanEndIndex" class="font-bold">0</span> dari 
                                    <span id="perusahaanTotalRows" class="font-bold">0</span> data
                                </div>
                                <div class="flex gap-2" id="perusahaanPageButtons">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const rowsPerPage = 10;
                        let currentPage = 1;
                        let filteredRows = [];
                        
                        const tableBody = document.getElementById('perusahaanTableBody');
                        const allRows = Array.from(tableBody.querySelectorAll('.perusahaan-row'));
                        const searchInput = document.getElementById('perusahaanSearch');
                        const yearFilter = document.getElementById('perusahaanYearFilter');
                        const pageButtonsContainer = document.getElementById('perusahaanPageButtons');
                        const programTotal = document.getElementById('perusahaanProgramTotal');

                        filteredRows = allRows;

                        function applyFilters() {
                            const query = searchInput.value.toLowerCase();
                            const selectedYear = yearFilter.value;
                            let totalActivities = 0;

                            allRows.forEach(row => {
                                const stats = JSON.parse(row.dataset.yearStats || '{}');
                                let count = 0;
                                let total = 0;

                                if (selectedYear) {
                                    count = Number(stats[selectedYear]?.count || 0);
                                    total = Number(stats[selectedYear]?.total || 0);
                                } else {
                                    Object.values(stats).forEach(yearStats => {
                                        count += Number(yearStats.count || 0);
                                        total += Number(yearStats.total || 0);
                                    });
                                }

                                row.querySelector('.perusahaan-count').innerText = count;
                                row.querySelector('.perusahaan-total').innerText = new Intl.NumberFormat('id-ID').format(total);
                                totalActivities += count;
                            });

                            programTotal.innerText = totalActivities;
                            filteredRows = allRows.filter(row => row.dataset.name.includes(query));
                            currentPage = 1;
                            updateTable();
                        }
                        
                        function updateTable() {
                            const totalRows = filteredRows.length;
                            const totalPages = Math.ceil(totalRows / rowsPerPage);
                            
                            if (currentPage > totalPages && totalPages > 0) currentPage = totalPages;
                            if (currentPage < 1) currentPage = 1;
                            
                            const start = (currentPage - 1) * rowsPerPage;
                            const end = start + rowsPerPage;
                            
                            allRows.forEach(row => row.style.display = "none");
                            
                            filteredRows.forEach((row, index) => {
                                if (index >= start && index < end) {
                                    row.style.display = "";
                                }
                            });
                            
                            document.getElementById('perusahaanTotalRows').innerText = totalRows;
                            document.getElementById('perusahaanStartIndex').innerText = totalRows === 0 ? 0 : start + 1;
                            document.getElementById('perusahaanEndIndex').innerText = Math.min(end, totalRows);
                            
                            renderButtons(totalPages);
                        }
                        
                        searchInput.addEventListener('input', applyFilters);
                        yearFilter.addEventListener('change', applyFilters);
                        
                        function renderButtons(totalPages) {
                            pageButtonsContainer.innerHTML = '';
                            if (totalPages <= 1) return;
                            
                            createBtn('Prev', currentPage > 1, () => {
                                currentPage--;
                                updateTable();
                            });
                            
                            for (let i = 1; i <= totalPages; i++) {
                                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                                    createBtn(i, true, () => {
                                        currentPage = i;
                                        updateTable();
                                    }, i === currentPage);
                                } else if (i === currentPage - 2 || i === currentPage + 2) {
                                    const dot = document.createElement('span');
                                    dot.innerText = '...';
                                    dot.className = "px-2 text-slate-400";
                                    pageButtonsContainer.appendChild(dot);
                                }
                            }
                            
                            createBtn('Next', currentPage < totalPages, () => {
                                currentPage++;
                                updateTable();
                            });
                        }
                        
                        function createBtn(text, enabled, onClick, isActive = false) {
                            const btn = document.createElement('button');
                            btn.innerText = text;
                            btn.disabled = !enabled;
                            btn.className = `px-3 py-1 text-sm border rounded-lg transition-all ${isActive ? 'bg-blue-600 text-white border-blue-600 shadow-sm' : 'bg-white  text-slate-700  hover:bg-slate-50 '} ${!enabled ? 'opacity-30 cursor-not-allowed' : ''}`;
                            btn.onclick = onClick;
                            pageButtonsContainer.appendChild(btn);
                        }
                        
                        applyFilters();
                    });
                    </script>    </div>
            </div>
        </section>

        <script>
        // Table carousel functionality
        const tableBody = document.getElementById('tableBody');
        const prevTableBtn = document.getElementById('prevTableBtn');
        const nextTableBtn = document.getElementById('nextTableBtn');
        const rowsPerPage = 5;
        let currentPage = 0;

        function updateTableDisplay() {
            const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(row => row.style.display !== 'none');
            const totalPages = Math.ceil(allRows.length / rowsPerPage);

            allRows.forEach((row, index) => {
                const pageIndex = Math.floor(index / rowsPerPage);
                row.style.display = pageIndex === currentPage ? '' : 'none';
            });

            updateDots(totalPages);
        }

        function updateDots(totalPages) {
            const dotsContainer = document.getElementById('carouselDots');
            dotsContainer.innerHTML = '';

            for (let i = 0; i < totalPages; i++) {
                const dot = document.createElement('button');
                dot.className =
                    `w-3 h-3 rounded-full transition-all ${i === currentPage ? 'bg-primary w-8' : 'bg-slate-300'}`;
                dot.onclick = () => {
                    currentPage = i;
                    updateTableDisplay();
                };
                dotsContainer.appendChild(dot);
            }
        }

        prevTableBtn.addEventListener('click', () => {
            const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(row => row.style.display !==
                'none');
            const totalPages = Math.ceil(allRows.length / rowsPerPage);
            currentPage = (currentPage - 1 + totalPages) % totalPages;
            updateTableDisplay();
        });

        nextTableBtn.addEventListener('click', () => {
            const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(row => row.style.display !==
                'none');
            const totalPages = Math.ceil(allRows.length / rowsPerPage);
            currentPage = (currentPage + 1) % totalPages;
            updateTableDisplay();
        });

        updateTableDisplay();
        </script>

        <!-- News & Articles Section -->
        <section class="py-24 bg-slate-50  overflow-hidden" id="news">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
                    <h2 class="text-3xl font-extrabold">Berita &amp; Artikel Terkini</h2>
                    <div class="relative w-full md:w-96">
                        <input id="beritaSearch"
                            class="w-full pl-12 pr-4 py-3 rounded-xl border-none ring-1 ring-slate-200  bg-white  focus:ring-2 focus:ring-primary transition-all"
                            placeholder="Cari berita..." type="text" />
                        <span
                            class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    </div>

                    <script>
                    document.getElementById('beritaSearch').addEventListener('keyup', function(e) {
                        const searchTerm = e.target.value.toLowerCase();
                        const newsCards = document.querySelectorAll('#newsCarousel > div');

                        newsCards.forEach(card => {
                            const headline = card.querySelector('h4').textContent.toLowerCase();
                            const category = card.querySelector('.bg-primary').textContent.toLowerCase();

                            if (headline.includes(searchTerm) || category.includes(searchTerm)) {
                                card.style.display = 'block';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    });
                    </script>
                </div>
                <div class="flex gap-6 overflow-x-auto pb-10 hide-scrollbar snap-x" id="newsCarousel">
                    @forelse($berita as $item)
                    <a href="/news/{{ $item->slug }}"
                        class="min-w-[320px] md:min-w-[380px] snap-start bg-white  rounded-3xl overflow-hidden shadow-sm group block cursor-pointer">
                        <div class="h-60 overflow-hidden relative">
                            <img alt="{{ $item->headline }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                src="{{ asset('storage/' . $item->gambar) }}" />
                            <div
                                class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                                {{ $item->kategori }}
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-slate-400 text-sm mb-2">{{ $item->tanggal }}</p>
                            <h4 class="text-xl font-bold mb-3 group-hover:text-primary transition-colors line-clamp-3">
                                {{ $item->headline }}</h4>
                            <p class="text-slate-500 text-sm">
                                {{ Str::limit(strip_tags($item->berita), 120, '...') }}
                            </p>
                        </div>
                    </a>
                    @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-slate-500">Tidak ada berita tersedia</p>
                    </div>
                    @endforelse
                </div>
                <div class="flex justify-between items-center gap-4 mt-6">
                    <div class="flex justify-center gap-4 hidden sm:flex">
                        <button id="prevBtn"
                            class="w-12 h-12 rounded-full border border-slate-200  flex items-center justify-center hover:bg-primary hover:text-white hover:border-primary transition-all text-slate-600 ">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button id="nextBtn"
                            class="w-12 h-12 rounded-full border border-slate-200  flex items-center justify-center hover:bg-primary hover:text-white hover:border-primary transition-all text-slate-600 ">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                    <a href="/beritas"
                        class="px-6 py-3 bg-primary text-white rounded-full font-semibold hover:bg-blue-700 transition-colors flex items-center gap-2">
                        Berita Lainnya
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </a>
                </div>



                <script>
                const carousel = document.getElementById('newsCarousel');
                const prevBtn = document.getElementById('prevBtn');
                const nextBtn = document.getElementById('nextBtn');
                const cardWidth = 320 + 24; // min-w-[320px] + gap-6

                function scrollToNext() {
                    carousel.scrollBy({
                        left: cardWidth,
                        behavior: 'smooth'
                    });
                }

                function scrollToPrev() {
                    carousel.scrollBy({
                        left: -cardWidth,
                        behavior: 'smooth'
                    });
                }

                prevBtn.addEventListener('click', scrollToPrev);
                nextBtn.addEventListener('click', scrollToNext);

                // Auto scroll every 5 seconds
                setInterval(scrollToNext, 5000);
                </script>
            </div>
        </section>
        <!-- CSR Data Table -->
        <section class="py-24 bg-white " id="reports">
            <div class="max-w-7xl mx-auto px-6">

                <div class="mb-4 flex justify-between items-center gap-4 mb-6">
                    <div class="">
                        <h2 class="text-3xl font-extrabold mb-4">Laporan Kegiatan CSR Mahulu</h2>
                        <p class="text-slate-600 ">Transparansi data realisasi program
                            CSR yang telah
                            terverifikasi</p>
                    </div>
                    <div class="mb-4 flex w-full flex-col justify-end gap-2 sm:w-auto sm:flex-row">
                        <select id="reportYearFilter"
                            class="block w-full sm:w-36 px-3 py-2 border border-slate-300 rounded-xl leading-5 bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="" {{ $selectedYear === '' ? 'selected' : '' }}>Semua Tahun</option>
                            @foreach($perusahaanYears as $year)
                                <option value="{{ $year }}" {{ (string) $selectedYear === (string) $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                        <div class="relative w-full md:w-72">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="material-symbols-outlined text-slate-400 text-sm">search</span>
                            </span>
                            <input type="text" id="tableSearch"
                                class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-xl leading-5 bg-white placeholder-slate-500 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Cari data CSR...">
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white  rounded-2xl border border-slate-200  overflow-hidden">
                    <div class="overflow-x-auto">
                        <!-- Data Table with Pagination -->

                        <div
                            class="bg-white  rounded-2xl border border-slate-200  overflow-hidden">
                            <div class="overflow-x-auto">

                                <table class="w-full text-left border-collapse" id="dataTable">
                                    <thead
                                        class="bg-slate-50  border-b border-slate-200 ">
                                        <tr>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">No</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Bidang</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Program CSR
                                            </th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Waktu Kegiatan</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Perusahaan</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Lokasi</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Kecamatan</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider">Desa</th>
                                            <th class="px-6 py-4 text-sm font-bold uppercase tracking-wider text-right">
                                                Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200 " id="dataTableBody">
                                        @foreach($datax as $item)
                                        <tr class="data-row hover:bg-slate-50 transition-colors" data-year="{{ $item->tahun }}">
                                            <td class="px-6 py-5 font-semibold text-slate-800 nr-cell"></td>
                                            <td class="px-6 py-5">{{ $item->namaBidang ?? '-' }}</td>
                                            <td class="px-6 py-5">{{ $item->nama ?? '-' }}</td>
                                            <td class="px-6 py-5 whitespace-nowrap">{{ !empty($item->waktuKegiatanAksi) ? \Carbon\Carbon::parse($item->waktuKegiatanAksi)->format('d-m-Y') : '-' }}</td>
                                            <td class="px-6 py-5">{{ $item->namaPerusahaan ?? '-' }}</td>
                                            <td class="px-6 py-5">{{ $item->lokasiAksi ?? '-' }}</td>
                                            <td class="px-6 py-5">{{ $item->kecamatanAksi ?? '-' }}</td>
                                            <td class="px-6 py-5">{{ $item->desaAksi ?? '-' }}</td>
                                            <td
                                                class="px-6 py-5 text-right font-mono whitespace-nowrap font-bold text-green-600">
                                                Rp {{ number_format($item->realisasi_uang ?? 0, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr id="reportNoDataRow" class="hidden">
                                            <td colspan="9" class="px-6 py-8 text-center text-slate-500">Tidak ada data
                                                tersedia untuk filter ini</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div id="paginationNav"
                                    class="flex items-center justify-between px-6 py-4 bg-white border-t border-slate-200">
                                    <div class="text-sm text-slate-700">
                                        Menampilkan <span id="startIndex" class="font-bold">0</span> - <span id="endIndex"
                                            class="font-bold">0</span> dari <span id="totalRows" class="font-bold">0</span>
                                        data
                                    </div>
                                    <div class="flex gap-2" id="pageButtons">
                                    </div>
                                </div>

                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const rowsPerPage = 10;
                                    let currentPage = 1;
                                    let filteredRows = []; // Menyimpan baris yang lolos filter

                                    const tableBody = document.getElementById('dataTableBody');
                                    const allRows = Array.from(tableBody.querySelectorAll('.data-row'));
                                    const searchInput = document.getElementById('tableSearch');
                                    const yearFilter = document.getElementById('reportYearFilter');
                                    const pageButtonsContainer = document.getElementById('pageButtons');
                                    const noDataRow = document.getElementById('reportNoDataRow');

                                    filteredRows = allRows;

                                    function updateTable() {
                                        const totalRows = filteredRows.length;
                                        const totalPages = Math.ceil(totalRows / rowsPerPage);

                                        // Pastikan currentPage tidak melampaui totalPages setelah difilter
                                        if (currentPage > totalPages && totalPages > 0) currentPage = totalPages;
                                        if (currentPage < 1) currentPage = 1;

                                        const start = (currentPage - 1) * rowsPerPage;
                                        const end = start + rowsPerPage;

                                        // Sembunyikan SEMUA baris dulu
                                        allRows.forEach(row => row.style.display = "none");
                                        noDataRow.classList.toggle('hidden', totalRows !== 0);

                                        // Tampilkan hanya yang masuk filter dan masuk range halaman
                                        filteredRows.forEach((row, index) => {
                                            if (index >= start && index < end) {
                                                row.style.display = "";
                                                // Update nomor urut agar tetap rapi (1, 2, 3...)
                                                row.querySelector('.nr-cell').innerText = index + 1;
                                            }
                                        });

                                        // Update Info Text
                                        document.getElementById('totalRows').innerText = totalRows;
                                        document.getElementById('startIndex').innerText = totalRows === 0 ? 0 :
                                            start + 1;
                                        document.getElementById('endIndex').innerText = Math.min(end, totalRows);

                                        renderButtons(totalPages);
                                    }

                                    function applyFilters() {
                                        const query = searchInput.value.toLowerCase();
                                        const selectedYear = yearFilter.value;

                                        filteredRows = allRows.filter(row => {
                                            const matchesYear = !selectedYear || row.dataset.year === selectedYear;
                                            return matchesYear && row.innerText.toLowerCase().includes(query);
                                        });

                                        currentPage = 1;
                                        updateTable();
                                    }

                                    searchInput.addEventListener('input', applyFilters);
                                    yearFilter.addEventListener('change', applyFilters);

                                    function renderButtons(totalPages) {
                                        pageButtonsContainer.innerHTML = '';
                                        if (totalPages <= 1) return; // Sembunyikan tombol jika hanya 1 halaman

                                        createBtn('Prev', currentPage > 1, () => {
                                            currentPage--;
                                            updateTable();
                                        });

                                        for (let i = 1; i <= totalPages; i++) {
                                            if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <=
                                                    currentPage + 1)) {
                                                createBtn(i, true, () => {
                                                    currentPage = i;
                                                    updateTable();
                                                }, i === currentPage);
                                            } else if (i === currentPage - 2 || i === currentPage + 2) {
                                                const dot = document.createElement('span');
                                                dot.innerText = '...';
                                                dot.className = "px-2 text-slate-400";
                                                pageButtonsContainer.appendChild(dot);
                                            }
                                        }

                                        createBtn('Next', currentPage < totalPages, () => {
                                            currentPage++;
                                            updateTable();
                                        });
                                    }

                                    function createBtn(text, enabled, onClick, isActive = false) {
                                        const btn = document.createElement('button');
                                        btn.innerText = text;
                                        btn.disabled = !enabled;
                                        btn.className =
                                            `px-3 py-1 text-sm border rounded-lg transition-all ${isActive ? 'bg-blue-600 text-white border-blue-600 shadow-sm' : 'bg-white text-slate-700 hover:bg-slate-50'} ${!enabled ? 'opacity-30 cursor-not-allowed' : ''}`;
                                        btn.onclick = onClick;
                                        pageButtonsContainer.appendChild(btn);
                                    }

                                    updateTable();
                                });
                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!-- Graphics Section -->
        <section class="py-24 bg-slate-50 ">
            <div class="max-w-7xl mx-auto px-6">
                <div class="mb-12 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                    <div>
                        <h3 class="text-primary font-bold tracking-widest uppercase text-sm mb-2">VISUALISASI DATA</h3>
                        <h2 class="text-3xl font-extrabold">Distribusi Program CSR per Bidang</h2>
                    </div>
                    <div class="w-full sm:w-44">
                        <label for="distributionYearFilter" class="block text-xs font-semibold text-slate-600 mb-2">Filter Tahun</label>
                        <select id="distributionYearFilter"
                            class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary transition-all">
                            <option value="" {{ $selectedYear === '' ? 'selected' : '' }}>Semua Tahun</option>
                            @foreach($perusahaanYears as $year)
                                <option value="{{ $year }}" {{ (string) $selectedYear === (string) $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Pie Chart -->
                    <div class="bg-white  rounded-2xl p-8 shadow-lg">
                        <h3 class="text-xl font-bold mb-6">Grafik Distribusi Bidang CSR</h3>
                        <canvas id="bidangChart" class="max-w-full" style="max-height: 300px;"></canvas>
                    </div>

                    <!-- Budget Chart -->
                    <div class="bg-white  rounded-2xl p-8 shadow-lg">
                        <h3 class="text-xl font-bold mb-6">Grafik Anggaran per Bidang</h3>
                        <canvas id="budgetChart" class="max-w-full" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const datax = @json($datax);
            const colors = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8', '#F7DC6F', '#BB8FCE', '#85C1E2',
                '#F8B88B', '#A8E6CF', '#FFD3B6', '#FFAAA5'
            ];
            const distributionYearFilter = document.getElementById('distributionYearFilter');
            const ctx = document.getElementById('bidangChart').getContext('2d');
            const bidangChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        backgroundColor: [],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                font: {
                                    size: 11
                                },
                                padding: 12,
                            }
                        }
                    }
                }
            });

            const ctxBudget = document.getElementById('budgetChart').getContext('2d');
            const budgetChart = new Chart(ctxBudget, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Nominal Pagu (Rp)',
                        data: [],
                        backgroundColor: [],
                        borderColor: [],
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000000).toFixed(1) + 'M';
                                },
                                font: {
                                    size: 10
                                }
                            }
                        },
                        y: {
                            ticks: {
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });

            function updateDistributionCharts() {
                const selectedYear = distributionYearFilter.value;
                const bidangCounts = {};
                const bidangBudget = {};

                datax
                    .filter(item => !selectedYear || String(item.tahun) === selectedYear)
                    .forEach(item => {
                        const bidang = item.namaBidang || 'Tidak Terdata';
                        bidangCounts[bidang] = (bidangCounts[bidang] || 0) + 1;
                        bidangBudget[bidang] = (bidangBudget[bidang] || 0) + Number(item.nominalpagu || 0);
                    });

                const labels = Object.keys(bidangCounts);
                const chartColors = labels.map((_, index) => colors[index % colors.length]);

                bidangChart.data.labels = labels;
                bidangChart.data.datasets[0].data = labels.map(label => bidangCounts[label]);
                bidangChart.data.datasets[0].backgroundColor = chartColors;
                bidangChart.update();

                budgetChart.data.labels = labels;
                budgetChart.data.datasets[0].data = labels.map(label => bidangBudget[label]);
                budgetChart.data.datasets[0].backgroundColor = chartColors;
                budgetChart.data.datasets[0].borderColor = chartColors;
                budgetChart.update();
            }

            distributionYearFilter.addEventListener('change', updateDistributionCharts);
            updateDistributionCharts();
        });
        </script>

        <section class="flex-1 flex flex-col items-center">
            <div class="w-full max-w-6xl px-6 py-12 md:py-20">
                <!-- Hero Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24">
                    <!-- Left Side: Feedback Form -->
                    <div
                        class="bg-white  p-8 rounded-xl border border-slate-100  shadow-sm">
                        <h3 class="text-slate-900  text-lg font-bold mb-6">Masukan dan Saran</h3>
                        <form class="space-y-6" id="feedbackForm">
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-slate-700  ml-1">Nama
                                    Lengkap</label>
                                <input
                                    class="w-full px-4 py-3 rounded-lg border border-slate-200  bg-slate-50  focus:bg-white  focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-slate-400 text-sm"
                                    placeholder="Masukkan nama lengkap Anda" type="text" name="nama" required />
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-slate-700  ml-1">Email</label>
                                <input
                                    class="w-full px-4 py-3 rounded-lg border border-slate-200  bg-slate-50  focus:bg-white  focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-slate-400 text-sm"
                                    placeholder="contoh@email.com" type="email" name="email" required />
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-slate-700  ml-1">Pesan</label>
                                <textarea
                                    class="w-full px-4 py-3 rounded-lg border border-slate-200  bg-slate-50  focus:bg-white  focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-slate-400 text-sm"
                                    placeholder="Tuliskan masukan atau saran Anda di sini..." rows="4" name="pesan"
                                    required></textarea>
                            </div>
                            <button
                                class="w-full md:w-auto px-8 py-3 bg-primary text-white text-sm font-bold rounded-lg shadow-lg shadow-primary/20 hover:shadow-primary/30 hover:translate-y-[-2px] active:translate-y-0 transition-all"
                                type="submit" id="submitBtn">
                                Kirim Pesan
                            </button>
                            <div id="successMessage"
                                class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50">
                                <div
                                    class="bg-white  rounded-2xl shadow-2xl max-w-md w-full p-8 animate-bounce">
                                    <div class="flex flex-col items-center text-center">
                                        <span
                                            class="material-symbols-outlined text-6xl text-green-600  mb-4">check_circle</span>
                                        <h3 class="text-2xl font-bold text-green-700  mb-2">Terima Kasih!
                                        </h3>
                                        <p class="text-sm text-slate-600  mb-6">Masukan dan saran Anda
                                            telah kami terima.</p>
                                        <button onclick="document.getElementById('successMessage').classList.add('hidden')"
                                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition-all">
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script>
                        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
                            e.preventDefault();

                            const successMessage = document.getElementById('successMessage');
                            const submitBtn = document.getElementById('submitBtn');

                            // Disable button
                            submitBtn.disabled = true;
                            submitBtn.textContent = 'Mengirim...';

                            // Show success message
                            successMessage.classList.remove('hidden');

                            // Reset form
                            this.reset();

                            // Re-enable button after 3 seconds
                            setTimeout(() => {
                                submitBtn.disabled = false;
                                submitBtn.textContent = 'Kirim Pesan';
                                successMessage.classList.add('hidden');
                            }, 3000);
                        });
                        </script>
                    </div>
                    <!-- Right Side: Social Media & Info -->
                    <div class="flex flex-col justify-between py-4">
                        <div>
                            <h3 class="text-slate-900  text-lg font-bold mb-6">Sosial Media</h3>
                            <div class="space-y-3">
                                <!-- Instagram -->
                                <a class="group flex items-center p-4 rounded-lg border border-slate-100  bg-white  hover:border-primary/50 transition-all"
                                    href="https://www.instagram.com/csrmahulu/">
                                    <div
                                        class="size-10 rounded-lg bg-pink-50  flex items-center justify-center text-pink-600  mr-4 group-hover:scale-110 transition-transform">
                                        <img src="assets/logo/logo-ig.png" style="width:60px; border-radius : 10px;">
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-slate-900 ">Instagram</p>
                                        <p class="text-xs text-slate-500">@csrmahulu</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-sm text-slate-300 group-hover:text-primary transition-colors">arrow_forward_ios</span>
                                </a>
                                <!-- YouTube -->
                                <a class="group flex items-center p-4 rounded-lg border border-slate-100  bg-white  hover:border-primary/50 transition-all"
                                    href="https://www.youtube.com/@bappelitbangdamahulu3002">
                                    <div
                                        class="size-10 rounded-lg bg-red-50  flex items-center justify-center text-red-600  mr-4 group-hover:scale-110 transition-transform">
                                        <img src="assets/logo/logo-youtube.png" style="width:60px; border-radius : 10px;">
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-slate-900 ">Youtube</p>
                                        <p class="text-xs text-slate-500">csrmahulu</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-sm text-slate-300 group-hover:text-primary transition-colors">arrow_forward_ios</span>
                                </a>
                                <!-- WhatsApp -->
                                <a class="group flex items-center p-4 rounded-lg border border-slate-100  bg-white  hover:border-primary/50 transition-all"
                                    href="https://wa.me/6285250562443">
                                    <div
                                        class="size-10 rounded-lg bg-emerald-50  flex items-center justify-center text-emerald-600  mr-4 group-hover:scale-110 transition-transform">
                                        <img src="assets/logo/logo-wa.png" style=" width:70px; border-radius : 10px;">
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-slate-900 ">Whatsapp</p>
                                        <p class="text-xs text-slate-500">Konsultasi / Koordinasi</p>
                                    </div>
                                    <span
                                        class="material-symbols-outlined text-sm text-slate-300 group-hover:text-primary transition-colors">arrow_forward_ios</span>
                                </a>
                            </div>
                        </div>
                        <div class="mt-8 p-5 rounded-lg bg-primary/5 border border-primary/10">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-outlined text-primary text-2xl">location_on</span>
                                <div>
                                    <p class="text-sm font-bold text-slate-900  mb-1">BAPPELITBANGDA
                                        MAHULU</p>
                                    <p class="text-xs text-slate-600  leading-relaxed">
                                        Komplek Perkantoran Semi Permanen Ujoh Bilang<br>Kabupaten Mahakam Ulu
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <footer class="bg-background-dark text-white pt-20 pb-10">
            <div class="max-w-7xl mx-auto px-6">
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
                                    href="https://csr-indonesia.com/">CSR Indonesia</a></p>
                            </li>
                            <li><a target="_blank" class="hover:text-primary transition-colors"
                                    href="https://forumcsrindonesia.org/">Forum CSR Indonesia</a></p>
                            </li>
                            <li><a target="_blank" class="hover:text-primary transition-colors"
                                    href="https://gocsrkaltim.com/">Go CSR Kaltim</a></p>
                            </li>
                            <li><a target="_blank" class="hover:text-primary transition-colors"
                                    href="https://bappelitbangda.mahakamulukab.go.id/beranda">Bappelitbangda
                                    Mahulu</a></p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-lg mb-6">Kunjungan</h5>
                        <div class="grid grid-cols-2 gap-3 mb-6">

                            <div class="bg-slate-800/50 p-3 rounded-lg">
                                <p class="text-xs text-slate-400 mb-1">Hari Ini</p>
                                <p class="text-lg font-bold text-white">{{ $kunjunganHari ?? 0 }}</p>
                            </div>
                            <div class="bg-slate-800/50 p-3 rounded-lg">
                                <p class="text-xs text-slate-400 mb-1">Bulan Ini</p>
                                <p class="text-lg font-bold text-white">{{ $kunjunganBulan ?? 0 }}</p>
                            </div>
                            <div class="bg-slate-800/50 p-3 rounded-lg">
                                <p class="text-xs text-slate-400 mb-1">Tahun Ini</p>
                                <p class="text-lg font-bold text-white">{{ $kunjunganTahun ?? 0 }}</p>
                            </div>
                            <div class="bg-slate-800/50 p-3 rounded-lg">
                                <p class="text-xs text-slate-400 mb-1">Total</p>
                                <p class="text-lg font-bold text-white">{{ $totalKunjungan ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-8 border-t border-white/10 text-center text-slate-500 text-sm">
                    <p>© 2025 BAPPELITBANGDA MAHULU.</p>
                </div>
            </div>
        </footer>

        <div id="modalDetail"
            class="fixed inset-0 z-[999] hidden flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
            <div class="bg-white rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden">
                <div class="p-6 bg-blue-600 text-white flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <span id="modalIcon"
                            class="material-symbols-outlined text-2xl  text-white group-hover:scale-110 transition-transform"></span>
                        <h3 id="modalTitle" class="text-xl font-bold">Detail CSR Bidang</h3>
                    </div>
                    <button onclick="closePopup()" class="text-white text-2xl">&times;</button>
                </div>
                <div class="p-6 max-h-[75vh] overflow-y-auto">
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-blue-50 p-4 rounded-2xl text-center">
                            <p class="text-xs text-blue-600 font-bold">TOTAL KEGIATAN</p>
                            <h4 id="countKegiatan" class="text-2xl font-black">0</h4>
                        </div>
                        <div class="bg-green-50 p-4 rounded-2xl text-center">
                            <p class="text-xs text-green-600 font-bold">TOTAL ANGGARAN</p>
                            <h4 id="totalAnggaran" class="text-2xl font-black text-green-600">Rp 0</h4>
                        </div>
                    </div>
                    <h5 class="font-bold mb-3">Daftar Kegiatan:</h5>
                    <div id="listKegiatan" class="space-y-3">
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
    function showPopup(id) {
        const modal = document.getElementById('modalDetail');
        const listContainer = document.getElementById('listKegiatan');

        // Tampilkan loading sederhana
        listContainer.innerHTML = 'Memuat data...';
        modal.classList.remove('hidden');

        // Fetch data dari route Laravel
        fetch(`/bidang-detail/${id}`)
            .then(response => response.json())
            .then(data => {
                // Update Header & Statistik
                document.getElementById('modalIcon').innerText = data.logo;
                document.getElementById('modalTitle').innerText = 'Detail Bidang ' + data.nama_bidang;
                document.getElementById('countKegiatan').innerText = data.total_kegiatan;
                document.getElementById('totalAnggaran').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(data
                    .total_anggaran);

                // Update List Kegiatan
                listContainer.innerHTML = ''; // Kosongkan loading
                if (data.kegiatan.length > 0) {
                    data.kegiatan.forEach(kgt => {
                        listContainer.innerHTML += `
                            <div class="border p-4 rounded-xl shadow-sm bg-slate-50">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <strong>${kgt.nama ? kgt.nama : 'Perusahaan Tidak Terdata'}</strong>
                                        <p class="text-xs text-slate-500 mt-1">Lokasi: ${kgt.desa ? kgt.desa : '-'}, ${kgt.kecamatan ? kgt.kecamatan : '-'}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs font-semibold text-slate-600">Nominal</p>
                                        <p class="text-sm font-bold text-primary whitespace-nowrap">Rp ${kgt.nominalpagu ? new Intl.NumberFormat('id-ID').format(kgt.nominalpagu) : '0'}</p>
                                    </div>
                                </div>
                                <p class="text-sm text-slate-600 mt-1">
                                    Lokasi: Desa ${kgt.desa}, Kec. ${kgt.kecamatan}
                                </p>
                            </div>
                        `;
                    });
                } else {
                    listContainer.innerHTML = '<p class="text-center text-slate-400">Tidak ada kegiatan.</p>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                listContainer.innerHTML = 'Gagal mengambil data.';
            });
    }

    function closePopup() {
        document.getElementById('modalDetail').classList.add('hidden');
    }
    </script>

    </html>