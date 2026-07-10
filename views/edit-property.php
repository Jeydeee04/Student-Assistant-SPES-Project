<div class="w-full relative">
    <div class="absolute top-0 right-0 -z-10 w-[600px] h-[600px] bg-gradient-to-bl from-green-500/5 via-emerald-500/0 to-transparent rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-1/4 -z-10 w-[500px] h-[500px] bg-gradient-to-tr from-blue-500/5 via-indigo-500/0 to-transparent rounded-full blur-3xl pointer-events-none"></div>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Edit Property</h1>
        <p class="text-slate-500 mt-1 font-medium text-sm">Modify and update existing land asset entries or office equipment details within the master inventory</p>
    </div>

    <form id="form-data" class="bg-white/80 backdrop-blur-md rounded-3xl border border-slate-200/80 shadow-sm p-10 w-full transition-all duration-300 hover:shadow-md space-y-8">
        <div>
            <h3 class="text-lg font-bold text-slate-800 tracking-tight mb-4 flex items-center gap-2">
                <i class="bi bi-person-badge text-xl text-emerald-700"></i> Accountable Personnel
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Name of Employee</label>
                    <input name="name" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Designation</label>
                    <input name="designation" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Office / Division</label>
                    <input name="division" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800">
                </div>
            </div>
        </div>

        <hr class="border-slate-100">

        <div>
            <h3 class="text-lg font-bold text-slate-800 tracking-tight mb-4 flex items-center gap-2">
                <i class="bi bi-box-seam text-xl text-emerald-700"></i> Property & Equipment Details
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Property Number</label>
                    <input name="property_number" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800 font-mono">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Type of Property</label>
                    <select name="property_type" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-700">
                        <option value="ict">ICT Equipment</option>
                        <option value="office">Office Equipments</option>
                        <option value="land">Land Assets</option>
                        <option value="vehicle">Vehicles / Transportation</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Type of Equipment</label>
                    <input name="equipment_type" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Fund Cluster</label>
                    <select name="fund_cluster" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-700">
                        <option value="regular">Regular</option>
                        <option value="split">Split</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Actual User</label>
                    <input name="actual_user" type="text" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Price (PHP)</label>
                    <input name="price" type="number" step="0.01" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Condition</label>
                    <select name="status" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-700">
                        <option value="serviceable">Serviceable</option>
                        <option value="unserviceable">Unserviceable</option>
                        <option value="disposed">Disposed</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Description of Property</label>
                    <textarea name="description" rows="4" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800 resize-none"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-400">Remarks</label>
                    <textarea name="remarks" rows="4" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white/50 focus:bg-white focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all text-sm font-medium text-slate-800 resize-none"></textarea>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
            <button onclick="history.back()" type="button" class="px-5 py-3 border border-slate-200 text-slate-700 font-semibold text-sm rounded-xl hover:bg-slate-50 transition-colors">
                Cancel
            </button>
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-green-800 to-emerald-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-emerald-900/10 hover:shadow-lg hover:shadow-emerald-900/20 transition-all duration-200">
                Update Property
            </button>
        </div>
        <input type="hidden" name="personnel_id">
    </form>
</div>

<script>
    const urlParams = new URLSearchParams(window.location.search);
    const assetId = urlParams.get('id');

    async function loadAssetData() {
        const response = await fetch(`/dar/api/assets.php?id=${assetId}`);
        const asset = await response.json();

        const form = document.getElementById('form-data');
        form.elements.name.value = asset.personnel_name;
        form.elements.designation.value = asset.designation;
        form.elements.division.value = asset.office_division;
        form.elements.property_number.value = asset.property_number;
        form.elements.property_type.value = asset.property_type;
        form.elements.equipment_type.value = asset.equipment_type;
        form.elements.actual_user.value = asset.actual_user;
        form.elements.price.value = asset.price;
        form.elements.status.value = asset.status;
        form.elements.fund_cluster.value = asset.fund_cluster;
        form.elements.description.value = asset.description;
        form.elements.remarks.value = asset.remarks;
        form.elements.personnel_id.value = asset.personnel_id;
    }

    document.addEventListener('submit', (e) => {
        e.preventDefault();
        updateAsset(assetId);
    });

    async function updateAsset(assetId) {
        const form = document.getElementById('form-data');
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        const response = await fetch(`/dar/api/assets.php?id=${assetId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            const result = await response.json();
            alert('Update successful');
            history.back();
            console.log('Update successful:', result);
        } else {
            console.error('Failed to update');
        }
    }

    document.addEventListener('DOMContentLoaded', loadAssetData);
</script>