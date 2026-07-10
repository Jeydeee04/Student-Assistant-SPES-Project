<div class="w-full relative">
    <div class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-gradient-to-bl from-green-500/5 via-emerald-500/0 to-transparent rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 -z-10 w-[500px] h-[500px] bg-gradient-to-tr from-blue-500/5 via-indigo-500/0 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Property & Equipment Dashboard</h1>
        <p class="text-slate-500 mt-1 font-medium text-sm">Real-time breakdown overview of land asset inventory accounts</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 w-full">
        <div class="bg-gradient-to-br from-green-800 via-emerald-800 to-emerald-700 rounded-3xl p-8 text-white shadow-xl shadow-emerald-900/10 flex items-center justify-between relative overflow-hidden group hover:shadow-2xl hover:shadow-emerald-900/20 transition-all duration-300 w-full">
            <div class="z-10">
                <span class="text-xs font-semibold text-emerald-200/80 uppercase tracking-wider block mb-1">Total Registered Assets</span>
                <span class="text-5xl font-bold tracking-tight total-assets">0</span>
            </div>
            <div class="bg-white/10 p-5 rounded-2xl z-10 backdrop-blur-md border border-white/10 group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-box-seam-fill text-4xl text-emerald-100"></i>
            </div>
            <div class="absolute -right-6 -bottom-6 w-36 h-36 bg-white/5 rounded-full blur-xl group-hover:bg-white/10 transition-all duration-300"></div>
        </div>

        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md hover:border-slate-300 transition-all duration-300 w-full">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Regular Fund Cluster</span>
                <span class="text-4xl font-bold text-slate-800 reg-total">0</span>
            </div>
            <div class="bg-blue-50/80 border border-blue-100 p-5 rounded-2xl text-blue-600">
                <i class="bi bi-file-earmark-text-fill text-3xl"></i>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-8 border border-slate-200/80 shadow-sm flex items-center justify-between hover:shadow-md hover:border-slate-300 transition-all duration-300 w-full">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-1">Split Fund Cluster</span>
                <span class="text-4xl font-bold text-slate-800 split-total">0</span>
            </div>
            <div class="bg-orange-50/80 border border-orange-100 p-5 rounded-2xl text-orange-600">
                <i class="bi bi-file-earmark-break-fill text-3xl"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 w-full">
        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-10 border border-slate-200/80 shadow-sm flex flex-col md:flex-row items-center justify-between gap-10 hover:shadow-md hover:border-slate-300 transition-all duration-300 w-full">
            <div class="flex-grow space-y-6 w-full md:w-auto">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-8 bg-emerald-600 rounded-full shadow-sm shadow-emerald-600/20"></div>
                    <h3 class="text-2xl font-bold text-slate-800 tracking-tight">Serviceable</h3>
                </div>
                <div class="flex flex-col">
                    <span class="text-5xl font-bold text-slate-800 tracking-tight total-serv">0</span>
                    <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full inline-block mt-2 border border-emerald-100/50">Active operational status</span>
                </div>
                <div class="pt-6 border-t border-slate-100/80 space-y-4">
                    <div class="flex justify-between items-center text-base">
                        <span class="text-slate-500 font-medium flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500 mr-3 shadow-sm shadow-emerald-500/20"></span>Regular Cluster</span>
                        <span class="font-semibold text-slate-700 bg-slate-100/60 px-3 py-1 rounded-lg text-sm reg-serv">0 items</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-slate-500 font-medium flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-emerald-300 mr-3 shadow-sm shadow-emerald-300/20"></span>Split Cluster</span>
                        <span class="font-semibold text-slate-700 bg-slate-100/60 px-3 py-1 rounded-lg text-sm split-serv">0 items</span>
                    </div>
                </div>
            </div>
            <div class="w-64 h-64 flex-shrink-0 drop-shadow-sm filter">
                <canvas id="serviceableChart"></canvas>
            </div>
        </div>

        <div class="bg-white/80 backdrop-blur-md rounded-3xl p-10 border border-slate-200/80 shadow-sm flex flex-col md:flex-row items-center justify-between gap-10 hover:shadow-md hover:border-slate-300 transition-all duration-300 w-full">
            <div class="flex-grow space-y-6 w-full md:w-auto">
                <div class="flex items-center gap-3">
                    <div class="w-3 h-8 bg-rose-500 rounded-full shadow-sm shadow-rose-500/20"></div>
                    <h3 class="text-2xl font-bold text-slate-800 tracking-tight">Unserviceable</h3>
                </div>
                <div class="flex flex-col">
                    <span class="text-5xl font-bold text-slate-800 tracking-tight total-unserv">0</span>
                    <span class="text-xs font-semibold text-rose-600 bg-rose-50 px-3 py-1.5 rounded-full inline-block mt-2 border border-rose-100/50">Pending disposal/maintenance</span>
                </div>
                <div class="pt-6 border-t border-slate-100/80 space-y-4">
                    <div class="flex justify-between items-center text-base">
                        <span class="text-slate-500 font-medium flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-orange-500 mr-3 shadow-sm shadow-orange-500/20"></span>Regular Cluster</span>
                        <span class="font-semibold text-slate-700 bg-slate-100/60 px-3 py-1 rounded-lg text-sm reg-unserv">0 items</span>
                    </div>
                    <div class="flex justify-between items-center text-base">
                        <span class="text-slate-500 font-medium flex items-center"><span class="w-2.5 h-2.5 rounded-full bg-orange-300 mr-3 shadow-sm shadow-orange-300/20"></span>Split Cluster</span>
                        <span class="font-semibold text-slate-700 bg-slate-100/60 px-3 py-1 rounded-lg text-sm split-unserv">0 items</span>
                    </div>
                </div>
            </div>
            <div class="w-64 h-64 flex-shrink-0 drop-shadow-sm filter">
                <canvas id="unserviceableChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    let serviceableChart, unserviceableChart;

    document.addEventListener("DOMContentLoaded", function() {
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        };

        serviceableChart = new Chart(document.getElementById('serviceableChart'), {
            type: 'pie',
            data: {
                labels: ['Regular', 'Split'],
                datasets: [{
                    data: [0, 0],
                    backgroundColor: ['#10b981', '#6ee7b7'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        unserviceableChart = new Chart(document.getElementById('unserviceableChart'), {
            type: 'pie',
            data: {
                labels: ['Regular', 'Split'],
                datasets: [{
                    data: [0, 0],
                    backgroundColor: ['#f97316', '#fdba74'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        loadDashboardStats();
    });

    async function loadDashboardStats() {
        try {
            const response = await fetch('/dar/api/dashboard-stats.php');
            const data = await response.json();

            document.querySelector('.total-assets').innerText = data.total;
            document.querySelector('.reg-total').innerText = data.reg_total ? data.reg_total : "---";
            document.querySelector('.split-total').innerText = data.split_total ? data.split_total : "---";
            document.querySelector('.total-serv').innerText = Number(data.reg_serv) + Number(data.split_serv);
            document.querySelector('.total-unserv').innerText = Number(data.reg_unserv) + Number(data.split_unserv);
            document.querySelector('.reg-serv').innerText = data.reg_serv + " item/s";
            document.querySelector('.split-serv').innerText = data.split_serv + " item/s";
            document.querySelector('.reg-unserv').innerText = data.reg_unserv + " item/s";
            document.querySelector('.split-unserv').innerText = data.split_unserv + " item/s";

            serviceableChart.data.datasets[0].data = [data.reg_serv, data.split_serv];
            serviceableChart.update();

            unserviceableChart.data.datasets[0].data = [data.reg_unserv, data.split_unserv];
            unserviceableChart.update();
        } catch (error) {
            console.error('Error:', error);
        }
    }
</script>