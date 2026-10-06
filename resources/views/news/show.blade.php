<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ $berita->headline }} - e-CSR MAHULU</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/logo_mahulu.png">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&amp;display=swap"
        rel="stylesheet" />
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

    .prose {
        max-width: none;
    }

    .prose p, .prose li, .prose span {
        color: inherit;
    }

    .prose img {
        border-radius: 0.75rem;
        margin: 1.5rem 0;
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
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="/">Beranda</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="/#about">Tentang CSR</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="/#reports">Laporan</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="/#stats">Statistik</a>
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

    <!-- Article Content -->
    <section class="py-12 bg-white ">
        <div class="max-w-7xl mx-auto px-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-2 mb-8 text-sm text-slate-600 ">
                        <a href="/" class="hover:text-primary transition-colors">Beranda</a>
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                        <a href="/beritas" class="hover:text-primary transition-colors">Berita</a>
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                        <span>{{ $berita->kategori }}</span>
                    </div>

                    <div class="mb-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-primary text-white text-xs font-bold px-4 py-1.5 rounded-full uppercase">
                                {{ $berita->kategori }}
                            </span>
                        </div>

                        <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight">
                            {{ $berita->headline }}
                        </h1>

                        <div
                            class="flex flex-col md:flex-row md:items-center gap-4 text-slate-600  pb-8 border-b border-slate-200 ">
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                <span>{{ \Carbon\Carbon::parse($berita->tanggal)->format('d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                <span>{{ $berita->dilihat ?? 0 }} kali dibaca</span>
                            </div>
                        </div>
                    </div>

                    @if($berita->gambar)
                    <div class="mb-8 rounded-2xl overflow-hidden shadow-lg">
                        <img alt="{{ $berita->headline }}" class="w-full h-auto object-cover" style="max-height: 500px;"
                            src="{{ asset('storage/' . $berita->gambar) }}" />
                    </div>
                    @endif

                    <div class="prose  prose-lg mb-12">
                        {!! $berita->berita !!}
                    </div>

                    @if($berita->hastag)
                    <div class="flex items-center gap-2 mb-12 pb-12 border-b border-slate-200 ">
                        <span class="text-slate-600 ">Tags:</span>
                        <span
                            class="inline-block bg-slate-100  px-3 py-1 rounded-full text-sm font-medium">
                            #{{ $berita->hastag }}
                        </span>
                    </div>
                    @endif

                    <div class="mb-8">
                        <a href="/beritas"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            <span class="material-symbols-outlined">arrow_back</span>
                            Kembali ke Berita
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-1">
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
                                    <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                                        <img alt="{{ $item->headline }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                            src="{{ asset('storage/' . $item->gambar) }}" />
                                    </div>
                                    <div class="flex-1 min-w-0 flex flex-col justify-between">
                                        <h4
                                            class="font-semibold text-sm group-hover:text-primary transition-colors line-clamp-2">
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
</body>

</html>
