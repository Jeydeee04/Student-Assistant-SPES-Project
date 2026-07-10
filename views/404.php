<div class="min-h-screen flex items-center justify-center bg-slate-50 p-6">
    <div class="max-w-md w-full text-center space-y-6">
        <div class="text-emerald-800 text-8xl mb-4"><i class="bi bi-exclamation-triangle"></i></div>
        <h1 class="text-6xl font-black text-slate-900 tracking-tighter">404</h1>
        <p class="text-xl font-medium text-slate-600">Page not found</p>
        <p class="text-slate-500">The page you are looking for might have been moved or is no longer available.</p>

        <div class="pt-6">
            <button onclick="handleReturn()"
                class="inline-block px-8 py-3 bg-emerald-800 text-white font-semibold rounded-xl hover:bg-emerald-950 transition-all shadow-lg hover:shadow-emerald-200">
                Return to Safety
            </button>
        </div>
    </div>
</div>

<script>
    async function handleReturn() {
        try {
            const response = await fetch('/dar/api/auth.php?action=check');
            if (response.ok) {
                window.location.href = '/dar/dashboard';
            } else {
                window.location.href = '/dar/';
            }
        } catch (error) {
            window.location.href = '/dar/';
        }
    }
</script>