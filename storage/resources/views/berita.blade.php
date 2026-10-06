<section class="skills-one my-[100px]">
    <div class="flex h-100  items-start justify-center gap-2">
        <div class="  col-12 col-lg-12">
            <div class="sec-title-two text-center sec-title-animation animation-style1">
                <p class="text-3xl text-[#1E40AF] mb-5 font-medium ">Berita & Artikel</p>
                {{-- <p>It’s about telling a story through the message and visuals
                    that get your<br>ideas across to your customers</p> --}}
            </div>
            <div class="max-w-[1400px] w-full">
                <div id="newsGrid" class="grid grid-cols-1 sm:grid-cols-2 gap-6"></div>
                <nav aria-label="Pagination" class="mt-8 flex justify-center items-center space-x-2">
                    <button id="prevBtn" class="px-3 py-1 rounded-md bg-blue-600 text-white disabled:bg-blue-300"
                        aria-label="Previous page">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div id="paginationNumbers" class="flex space-x-1"></div>
                    <button id="nextBtn" class="px-3 py-1 rounded-md bg-blue-600 text-white disabled:bg-blue-300"
                        aria-label="Next page">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</section>


<script>
    // Sample data: 30 news items
    const newsData = @json($berita);

    const itemsPerPage = 4;
    let currentPage = 1;
    const totalPages = Math.ceil(newsData.length / itemsPerPage);


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

            // Left image
            const img = document.createElement("img");
            img.src = `${window.location.origin}/storage/${item.gambar}`;
            img.alt = item.slug;
            img.width = 120;
            img.height = 90;
            img.className = "flex-shrink-0 object-cover";

            // Right content container
            const content = document.createElement("div");
            content.className = "flex flex-col justify-between p-3 flex-grow";

            // Title
            const title = document.createElement("h3");
            title.className = "font-semibold text-gray-900 text-sm leading-tight";
            title.textContent = item.headline;

            // Highlight text (2 lines clamp)
            const highlight = document.createElement("p");
            highlight.className =
                "text-gray-600 text-xs leading-snug line-clamp-2 mt-1 mb-2";
            highlight.textContent = item.preview;

            // "Selengkapnya" button/link
            const link = document.createElement("a");
            link.href = '/detail-berita/' + item.slug;
            link.textContent = "Selengkapnya";
            link.className =
                "inline-block bg-blue-600 text-white text-xs font-medium px-3 py-1 rounded hover:bg-blue-700 transition-colors w-max";

            content.appendChild(title);
            content.appendChild(highlight);
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
                    window.scrollTo({ behavior: "smooth" });
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
            window.scrollTo({ behavior: "smooth" });
        }
    });

    nextBtn.addEventListener("click", () => {
        if (currentPage < totalPages) {
            currentPage++;
            update();
            window.scrollTo({ behavior: "smooth" });
        }
    });

    update();
</script>