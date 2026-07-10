<div class="w-full relative">
    <div class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-gradient-to-bl from-green-500/5 via-emerald-500/0 to-transparent rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 -z-10 w-[500px] h-[500px] bg-gradient-to-tr from-blue-500/5 via-indigo-500/0 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Split Summary</h1>
            <p class="text-slate-500 mt-1 font-medium text-sm">Detailed inventory tracking of all split fund cluster land asset properties</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <button onclick="toggleFilterMenu()" class="flex items-center px-4 py-2.5 bg-white border border-slate-200 text-slate-700 font-semibold text-sm rounded-xl shadow-sm hover:bg-slate-50 hover:border-slate-300 transition-all duration-200">
                    <i class="bi bi-filter mr-2 text-base"></i> Filter
                </button>
                <div id="filterMenu" class="hidden absolute right-0 mt-3 w-56 bg-white/95 backdrop-blur-sm border border-slate-200 rounded-2xl shadow-xl z-20 overflow-hidden transform transition-all duration-200 scale-95 opacity-0">
                    <div class="px-4 py-3 border-b border-slate-100">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Filter by Status</span>
                    </div>
                    <div class="p-1">
                        <button onclick="applyFilter('all', this)" class="filter-btn group flex items-center w-full px-4 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-all active-filter">
                            <i class="bi bi-layers mr-3 text-slate-400 group-hover:text-emerald-500"></i> All Assets
                        </button>
                        <button onclick="applyFilter('serviceable', this)" class="filter-btn group flex items-center w-full px-4 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-all">
                            <i class="bi bi-check-circle mr-3 text-slate-400 group-hover:text-emerald-500"></i> Serviceable
                        </button>
                        <button onclick="applyFilter('unserviceable', this)" class="filter-btn group flex items-center w-full px-4 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-rose-50 hover:text-rose-700 transition-all">
                            <i class="bi bi-x-circle mr-3 text-slate-400 group-hover:text-rose-500"></i> Unserviceable
                        </button>
                        <button onclick="applyFilter('disposed', this)" class="filter-btn group flex items-center w-full px-4 py-2.5 text-sm font-semibold text-slate-700 rounded-xl hover:bg-slate-100 hover:text-slate-900 transition-all">
                            <i class="bi bi-trash mr-3 text-slate-400 group-hover:text-slate-600"></i> Disposed
                        </button>
                    </div>
                </div>
            </div>
            <button onclick="document.location.href='api/export-assets.php?cluster=split'" class="flex items-center px-4 py-2.5 bg-gradient-to-r from-green-800 to-emerald-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-emerald-900/10 hover:shadow-lg hover:shadow-emerald-900/20 transition-all duration-200">
                <i class="bi bi-download mr-2 text-base"></i> Export Data
            </button>
        </div>
    </div>

    <div class="mb-5 flex flex-col md:flex-row items-center justify-between gap-4 bg-white/60 backdrop-blur-md p-4 rounded-2xl border border-slate-200/80 shadow-sm">
        <div class="relative w-full md:max-w-md">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                <i class="bi bi-search text-base"></i>
            </span>
            <input type="text"
                oninput="filterTable(this.value)"
                placeholder="Search by name, property number, office, or equipment type..."
                class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 text-slate-800 placeholder-slate-400 font-medium text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-600/20 focus:border-emerald-600 shadow-inner transition-all duration-200" />
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-md rounded-3xl border border-slate-200/80 shadow-sm flex flex-col min-h-[calc(100vh-320px)] w-full transition-all duration-300 hover:shadow-md">
        <div class="overflow-x-auto w-full flex-grow">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="border-b border-slate-200/80 bg-slate-50/70 text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="py-5 px-6 w-4"></th>
                        <th class="py-5 px-6">Property Number</th>
                        <th class="py-5 px-6">Type of Equipment</th>
                        <th class="py-5 px-6">Type of Property</th>
                        <th class="py-5 px-6">Actual User</th>
                        <th class="py-5 px-6">Price</th>
                        <th class="py-5 px-6 text-center">Status</th>
                        <th class="py-5 px-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700 text-sm font-medium">
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-100/80 bg-slate-50/40 flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-500 text-xs font-semibold mt-auto">
            <span id="page-info">Showing 0 to 0 of 0 properties</span>
            <div class="flex items-center gap-2">
                <button id="prevBtn" onclick="changePage(-1)" class="px-3 py-1.5 border border-slate-200 bg-white rounded-lg hover:bg-slate-50">Previous</button>
                <button id="nextBtn" onclick="changePage(1)" class="px-3 py-1.5 border border-slate-200 bg-white rounded-lg hover:bg-slate-50">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
    let allAssets = [];
    let currentPage = 1;
    const rowsPerPage = 6;

    async function loadAssets() {
        const response = await fetch('/dar/api/assets.php?cluster=split');
        allAssets = await response.json();
        filteredAssets = [...allAssets];
        renderFilteredTable();
    }

    let filteredAssets = [];

    function toggleFilterMenu() {
        const menu = document.getElementById('filterMenu');
        menu.classList.toggle('hidden');
        setTimeout(() => {
            menu.classList.toggle('scale-95');
            menu.classList.toggle('opacity-0');
        }, 10);
    }

    function applyFilter(status, btnElement) {
        if (status === 'all') {
            filteredAssets = [...allAssets];
        } else {
            filteredAssets = allAssets.filter(asset => asset.status.toLowerCase() === status);
        }

        document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active-filter', 'bg-emerald-50', 'text-emerald-700'));
        btnElement.classList.add('active-filter', 'bg-emerald-50', 'text-emerald-700');

        currentPage = 1;
        renderFilteredTable();
        toggleFilterMenu();
    }

    function filterTable(query) {
        const q = query.toLowerCase();

        filteredAssets = allAssets.filter(asset =>
            (asset.personnel_name?.toLowerCase().includes(q)) ||
            (asset.property_number?.toLowerCase().includes(q)) ||
            (asset.office_division?.toLowerCase().includes(q)) ||
            (asset.equipment_type?.toLowerCase().includes(q))
        );

        currentPage = 1;
        renderFilteredTable();
    }

    function renderFilteredTable() {
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = '';

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageItems = filteredAssets.slice(start, end);

        if (pageItems.length === 0 && currentPage > 1) {
            currentPage--;
            renderFilteredTable();
            return;
        }

        pageItems.forEach(asset => {
            const id = asset.asset_id;
            switch (asset.property_type) {
                case 'ict':
                    asset.property_type = 'ICT Equipment';
                    break;
                case 'office':
                    asset.property_type = 'Office Equipments';
                    break;
                case 'land':
                    asset.property_type = 'Land Assets';
                    break;
                case 'vehicle':
                    asset.property_type = 'Vehicles / Transportation';
                    break;
            }
            tbody.innerHTML += `
            <tr id="row-${id}" class="hover:bg-slate-50/50 transition-all duration-150 cursor-pointer border-l-4 border-l-transparent" onclick="toggleDetails(${id})">
                <td class="py-5 px-4 text-center">
                    <i id="chevron-${id}" class="bi bi-chevron-down text-slate-400 text-xs inline-block transition-transform duration-200"></i>
                </td>
                <td class="py-5 px-6 text-slate-900 font-semibold">${asset.property_number}</td>
                <td class="py-5 px-6 text-slate-500">${asset.equipment_type}</td>
                <td class="py-5 px-6 text-slate-500">${asset.property_type}</td>
                <td class="py-5 px-6">${asset.actual_user}</td>
                <td class="py-5 px-6 text-slate-500 font-semibold">₱ ${asset.price}</td>
                <td class="py-5 px-6 text-center">
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold ${asset.status === 'serviceable' ? 'text-emerald-700 bg-emerald-50 border border-emerald-100' : asset.status === 'unserviceable' ? 'text-red-700 bg-red-50 border border-red-100' : 'text-yellow-700 bg-yellow-50 border border-yellow-100'}">
                        <span class="w-1.5 h-1.5 rounded-full ${asset.status === 'serviceable' ? 'bg-emerald-500' : asset.status === 'unserviceable' ? 'bg-red-500' : 'bg-yellow-500'} mr-1.5"></span>${asset.status.toUpperCase()}
                    </span>
                </td>
                <td class="py-5 px-6 text-center" onclick="event.stopPropagation();">
                    <div class="flex items-center justify-center gap-2">
                        <a href="/dar/split-summary/edit?id=${id}" class="p-2 bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 text-slate-600 rounded-xl transition-all duration-200">
                            <i class="bi bi-pencil-square text-base"></i>
                        </a>
                        <button onclick="deleteAsset(${id})" class="p-2 bg-slate-100 hover:bg-rose-50 hover:text-rose-700 text-slate-600 rounded-xl transition-all duration-200">
                            <i class="bi bi-trash text-base"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <tr id="details-${id}" class="hidden bg-slate-50/40">
                <td colspan="8" class="p-6 whitespace-normal border-l-4 border-l-emerald-600/30">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-white p-6 rounded-2xl border border-slate-200/60 shadow-inner">
                        <div class="space-y-1">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Name</h4>
                            <p class="text-slate-800 text-sm font-semibold">${asset.personnel_name}</p>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Designation</h4>
                            <p class="text-slate-800 text-sm font-semibold">${asset.designation}</p>
                        </div>
                        <div class="space-y-1">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Office / Division</h4>
                            <p class="text-slate-800 text-sm font-semibold">${asset.office_division}</p>
                        </div>
                        <div class="space-y-1 md:col-span-3 pt-2 border-t border-slate-200">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Property Description</h4>
                            <p class="text-slate-600 text-sm font-normal leading-relaxed break-words">${asset.description}</p>
                        </div>
                        <div class="space-y-1 md:col-span-3 pt-2">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Remarks</h4>
                            <p class="text-slate-600 text-sm font-normal leading-relaxed break-words">${asset.remarks}</p>
                        </div>
                    </div>
                </td>
            </tr>`;
        });

        document.getElementById('page-info').innerText = `Showing ${start + 1} to ${Math.min(end, filteredAssets.length)} of ${filteredAssets.length} properties`;
        document.getElementById('prevBtn').disabled = currentPage === 1;
        document.getElementById('nextBtn').disabled = end >= filteredAssets.length;
    }

    function toggleDetails(id) {
        document.getElementById(`details-${id}`).classList.toggle('hidden');
        document.getElementById(`row-${id}`).classList.toggle('bg-slate-50');
        document.getElementById(`chevron-${id}`).classList.toggle('rotate-180');
    }

    function changePage(dir) {
        currentPage += dir;
        renderFilteredTable();
    }

    async function deleteAsset(id) {
        if (!confirm('Are you sure you want to delete this?')) return;

        const response = await fetch(`/dar/api/assets.php?id=${id}`, {
            method: 'DELETE'
        });

        if (response.ok) {
            console.log('Asset deleted successfully');
            allAssets = allAssets.filter(asset => asset.asset_id != id);
            filteredAssets = filteredAssets.filter(asset => asset.asset_id != id);
            renderFilteredTable();
        } else {
            alert('Failed to delete.');
        }
    }

    window.addEventListener('pageshow', (event) => {
        loadAssets();
    });

    document.addEventListener('DOMContentLoaded', loadAssets);
</script>