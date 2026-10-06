<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const cards = document.querySelectorAll('.card-item');
        
        cards.forEach(card => {
            const title = card.querySelector('.search-target').textContent.toLowerCase();
            card.style.display = title.includes(filter) ? 'block' : 'none';
        });
    });
</script>


<script>
    // ApexCharts options and config
    window.addEventListener("load", function () {
        const getPresentaseKegiatan = () => {
            return {
                series: [
                    {{ $prsBidang_1->count() }}, {{ $prsBidang_2->count() }},
                    {{ $prsBidang_3->count() }}, {{ $prsBidang_4->count() }},
                    {{ $prsBidang_5->count() }}, {{ $prsBidang_6->count() }},
                    {{ $prsBidang_7->count() }}, {{ $prsBidang_8->count() }}
                ],
                colors: ["#1e6653", "#16BDCA", "#e26666", "#383838"],
                chart: {
                    height: "auto",
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -20
                        }
                    },
                },
                labels: [
                    '{{ $nmBidang_1[0]->nama }}', '{{ $nmBidang_2[0]->nama }}',
                    '{{ $nmBidang_3[0]->nama }}', '{{ $nmBidang_4[0]->nama }}',
                    '{{ $nmBidang_5[0]->nama }}', '{{ $nmBidang_6[0]->nama }}',
                    '{{ $nmBidang_7[0]->nama }}', '{{ $nmBidang_8[0]->nama }}',
                ],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    formatter: function (value) {
                        return value.toFixed(2) + ' %'
                    }
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    fontSize: "10%"
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function (value) {
                            return value
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }
        if (document.getElementById("presentaseKegiatan") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("presentaseKegiatan"),
                getPresentaseKegiatan());
            chart.render();
        }



        const getPaguKegiatan = () => {
            return {
                series: [
                    {{ $prsBidang_1->map(fn($item) => (int) $item->realisasi_uang)->sum() }}, {{ $prsBidang_2->map(fn($item) => (int) $item->realisasi_uang)->sum() }},
                    {{ $prsBidang_3->map(fn($item) => (int) $item->realisasi_uang)->sum() }}, {{ $prsBidang_4->map(fn($item) => (int) $item->realisasi_uang)->sum() }},
                    {{ $prsBidang_5->map(fn($item) => (int) $item->realisasi_uang)->sum() }}, {{ $prsBidang_6->map(fn($item) => (int) $item->realisasi_uang)->sum() }},
                    {{ $prsBidang_7->map(fn($item) => (int) $item->realisasi_uang)->sum() }}, {{ $prsBidang_8->map(fn($item) => (int) $item->realisasi_uang)->sum() }}
                ],
                colors: ["#1e6653", "#16BDCA", "#e26666", "#383838"],
                chart: {
                    height: "auto",
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -20
                        }
                    },
                },
                labels: [
                    '{{ $nmBidang_1[0]->nama }}', '{{ $nmBidang_2[0]->nama }}',
                    '{{ $nmBidang_3[0]->nama }}', '{{ $nmBidang_4[0]->nama }}',
                    '{{ $nmBidang_5[0]->nama }}', '{{ $nmBidang_6[0]->nama }}',
                    '{{ $nmBidang_7[0]->nama }}', '{{ $nmBidang_8[0]->nama }}',
                ],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    formatter: function (value) {
                        return value.toFixed(2) + ' %'
                    }
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    fontSize: "10%"
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function (value) {
                            return value
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }
        if (document.getElementById("paguKegiatan") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("paguKegiatan"),
                getPaguKegiatan());
            chart.render();
        }

        const options = {
            colors: ["#1A56DB", "#FDBA8C"],
            series: [{
                name: "Organic",
                color: "#1A56DB",
                data: [{
                    x: "{{ $nmBidang_1[0]->nama }}",
                    y: "{{ $prsBidang_1->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_2[0]->nama }}",
                    y: "{{ $prsBidang_2->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_3[0]->nama }}",
                    y: "{{ $prsBidang_3->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_4[0]->nama }}",
                    y: "{{ $prsBidang_4->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_5[0]->nama }}",
                    y: "{{ $prsBidang_5->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_6[0]->nama }}",
                    y: "{{ $prsBidang_6->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_7[0]->nama }}",
                    y: "{{ $prsBidang_7->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                {
                    x: "{{ $nmBidang_8[0]->nama }}",
                    y: "{{ $prsBidang_8->map(fn($item) => (int) $item->realisasi_uang)->sum() }}",
                },
                ],
            },],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 '
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            fill: {
                opacity: 1,
            },
        }

        if (document.getElementById("berRealisasiPagu") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("berRealisasiPagu"), options);
            chart.render();
        }


    });
</script>

<script>
    // Sample data: 30 news items
    // const newsData = [
    //   {
    //     id: 1,
    //     gambar:
    //       "asset1.PNG",
    //     alt: "A scenic mountain landscape with a sunrise and misty valley",
    //     headline: "Breaking News: Mountain Sunrise Captivates Viewers",
    //     highlight:
    //       "The early morning sunrise over the mountains has captivated thousands of viewers with its breathtaking colors and misty valleys.",
    //     url: "#",
    //   },
    //   {
    //     id: 2,
    //     gambar:
    //       "asset1.PNG",
    //     alt: "Close-up of a person typing on a laptop keyboard in a cozy cafe",
    //     headline: "Tech Update: New Laptop Model Released",
    //     berita:
    //       "The latest laptop model features improved battery life and a sleek design, making it a favorite among tech enthusiasts.",
    //     url: "#",
    //   },
    //   {
    //     id: 3,
    //     gambar:
    //       "asset1.PNG",
    //     alt: "A bustling city street with people walking and colorful storefronts",
    //     headline: "City Life: Downtown Revitalization Project Begins",
    //     berita:
    //       "The city council has approved a new revitalization project aimed at improving downtown infrastructure and public spaces.",
    //     url: "#",
    //   },
    //   {
    //     id: 4,
    //     gambar:
    //       "asset1.PNG",
    //     alt: "A chef preparing gourmet dishes in a modern kitchen",
    //     headline: "Culinary News: Gourmet Chef Opens New Restaurant",
    //     berita:
    //       "Famous chef opens a new restaurant downtown, promising an innovative menu with locally sourced ingredients.",
    //     url: "#",
    //   },
    //   {
    //     id: 5,
    //     gambar:
    //       "asset1.PNG",
    //     alt: "A soccer player kicking a ball during an intense match",
    //     headline: "Sports Update: Local Team Wins Championship",
    //     berita:
    //       "The local soccer team clinched the championship title after a thrilling final match that kept fans on the edge of their seats.",
    //     url: "#",
    //   },
    //   {
    //     id: 6,
    //     gambar:
    //       "asset1.PNG",
    //     alt: "A scientist working in a laboratory with test tubes and microscopes",
    //     headline: "Science Breakthrough: New Vaccine Shows Promise",
    //     berita:
    //       "Researchers have developed a new vaccine that shows promising results in early clinical trials, potentially changing the future of medicine.",
    //     url: "#",
    //   }
    // ];


    const myInput = document.getElementById('beritas');
    const newsData = myInput.value;


    const itemsPerPage = 6;
    let currentPage = 1;
    const totalPages = Math.ceil(newsData.length / itemsPerPage);

    alert(totalPages);

    const newsGrid = document.getElementById("newsGrid");
    const paginationNumbers = document.getElementById("paginationNumbers");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    function renderNews() {
        newsGrid.innerHTML = "";
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const currentItems = newsData.slice(start, end);

        currentItems.forEach((item) => {
            const newsItem = document.createElement("div");
            newsItem.className =
                "flex bg-white rounded-md shadow-sm overflow-hidden hover:shadow-md transition-shadow";

            // Left gambar
            const img = document.createElement("img");
            img.src = '/assets/' + item.gambar;
            img.alt = item.alt;
            img.width = 120;
            img.height = 90;
            img.className = "flex-shrink-0 object-cover";

            // Right content container
            const content = document.createElement("div");
            content.className = "flex flex-col justify-between p-3 flex-grow";

            // Title
            const headline = document.createElement("h3");
            headline.className = "font-semibold text-gray-900 text-sm leading-tight";
            headline.textContent = item.headline;

            // Highlight text (2 lines clamp)
            const berita = document.createElement("p");
            berita.className =
                "text-gray-600 text-xs leading-snug line-clamp-2 mt-1 mb-2";
            berita.textContent = item.berita;

            // "Selengkapnya" button/link
            const link = document.createElement("a");
            link.href = item.url;
            link.textContent = "Selengkapnya";
            link.className =
                "inline-block bg-blue-600 text-white text-xs font-medium px-3 py-1 rounded hover:bg-blue-700 transition-colors w-max";

            content.appendChild(headline);
            content.appendChild(berita);
            content.appendChild(link);

            newsItem.appendChild(img);
            newsItem.appendChild(content);

            newsGrid.appendChild(newsItem);
        });
    }

    function renderPagination() {
        paginationNumbers.innerHTML = "";

        // Show max 7 page numbers with current page in center if possible
        let startPage = Math.max(1, currentPage - 3);
        let endPage = Math.min(totalPages, currentPage + 3);

        if (currentPage <= 4) {
            endPage = Math.min(7, totalPages);
        } else if (currentPage > totalPages - 4) {
            startPage = Math.max(1, totalPages - 6);
        }

        for (let i = startPage; i <= endPage; i++) {
            const btn = document.createElement("button");
            btn.textContent = i;
            btn.className =
                "px-3 py-1 rounded-md " +
                (i === currentPage
                    ? "bg-blue-700 text-white font-semibold"
                    : "bg-white border border-gray-300 text-gray-700 hover:bg-blue-100");
            btn.setAttribute("aria-label", `Page ${i}`);
            btn.addEventListener("click", () => {
                if (currentPage !== i) {
                    currentPage = i;
                    update();
                    window.scrollTo({ top: 0, behavior: "smooth" });
                }
            });
            paginationNumbers.appendChild(btn);
        }

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages;
    }

    function update() {
        renderNews();
        renderPagination();
    }

    prevBtn.addEventListener("click", () => {
        if (currentPage > 1) {
            currentPage--;
            update();
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    });

    nextBtn.addEventListener("click", () => {
        if (currentPage < totalPages) {
            currentPage++;
            update();
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    });

    update();
</script>