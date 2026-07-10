<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department of Agrarian Reform</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    },
                },
            },
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-slate-50 font-sans antialiased text-gray-800 h-full overflow-hidden">

    <div class="flex h-full w-full">
        <?php if ($route !== '/' && $route !== '/forgot' && $view !== 'views/404.php'): ?>
            <aside class="w-[300px] h-full bg-emerald-950 shadow-2xl flex flex-col flex-shrink-0 z-10 border-r border-emerald-900">
                <div class="p-8 border-b border-emerald-900/50 flex justify-center bg-emerald-900/20">
                    <a href="/dar/dashboard" class="block">
                        <img src="/dar/assets/images/logo.svg" alt="DAR Logo" class="max-h-[110px] w-auto drop-shadow-lg brightness-[1.2]">
                    </a>
                </div>

                <div class="flex-grow p-5 space-y-7 overflow-y-auto">
                    <div>
                        <span class="block px-4 text-[10px] font-extrabold uppercase tracking-widest text-emerald-500/50 mb-3">Statistics</span>
                        <ul class="space-y-1">
                            <li>
                                <a href="/dar/dashboard" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-semibold transition-all duration-200 <?php echo ($route === '/dashboard') ? 'bg-yellow-400 text-emerald-950 shadow-lg' : 'text-emerald-100 hover:bg-emerald-900/50'; ?>">
                                    <i class="bi bi-grid-1x2-fill mr-3.5 text-xl"></i> Dashboard
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <span class="block px-4 text-[10px] font-extrabold uppercase tracking-widest text-emerald-500/50 mb-3">Reports</span>
                        <ul class="space-y-1">
                            <li>
                                <a href="/dar/regular-summary" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-semibold transition-all duration-200 <?php echo (str_contains($route, '/regular-summary')) ? 'bg-yellow-400 text-emerald-950' : 'text-emerald-100 hover:bg-emerald-900/50'; ?>">
                                    <i class="bi bi-file-earmark-text-fill mr-3.5 text-xl"></i> Regular Summary
                                </a>
                            </li>
                            <li>
                                <a href="/dar/split-summary" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-semibold transition-all duration-200 <?php echo (str_contains($route, '/split-summary')) ? 'bg-yellow-400 text-emerald-950' : 'text-emerald-100 hover:bg-emerald-900/50'; ?>">
                                    <i class="bi bi-file-earmark-break-fill mr-3.5 text-xl"></i> Split Summary
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <span class="block px-4 text-[10px] font-extrabold uppercase tracking-widest text-emerald-500/50 mb-3">Management</span>
                        <ul class="space-y-1">
                            <li>
                                <a href="/dar/add" class="flex items-center px-4 py-3.5 rounded-xl text-sm font-semibold transition-all duration-200 <?php echo ($route === '/add') ? 'bg-yellow-400 text-emerald-950' : 'text-emerald-100 hover:bg-emerald-900/50'; ?>">
                                    <i class="bi bi-plus-circle-fill mr-3.5 text-xl"></i> Add Property
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-5 border-t border-emerald-900">
                    <a id="signout-btn" class="flex items-center px-4 py-3 rounded-xl text-sm font-bold text-rose-300 hover:bg-rose-950/50 transition-all duration-200 group">
                        <i class="bi bi-box-arrow-right mr-3.5 text-xl group-hover:translate-x-1 transition-transform"></i> Sign Out
                    </a>
                </div>
            </aside>
        <?php endif; ?>

        <main class="flex-grow h-full overflow-y-auto p-10 relative bg-slate-50">
            <div class="max-w-[1600px] mx-auto w-full">
                <?php require $view; ?>
            </div>
        </main>
    </div>
    <script>
        document.getElementById('signout-btn').addEventListener('click', async () => {
            try {
                const response = await fetch('/dar/api/signout.php', {
                    method: 'POST'
                });
                const data = await response.json();

                if (data.status === 'success') {
                    window.location.href = '/dar';
                }
            } catch (error) {
                console.error('Signout failed:', error);
            }
        });
    </script>
</body>

</html>