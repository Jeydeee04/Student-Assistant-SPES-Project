<div class="absolute inset-0 bg-emerald-900 flex items-stretch overflow-hidden z-50">
    <div class="absolute inset-0 -z-10 flex pointer-events-none overflow-hidden">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-gradient-to-bl from-yellow-400/10 via-emerald-500/0 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-[600px] h-[600px] bg-gradient-to-tr from-emerald-600/20 via-yellow-500/0 to-transparent rounded-full blur-3xl"></div>
    </div>

    <div class="hidden lg:flex lg:w-1/2 h-full relative bg-emerald-950 overflow-hidden items-center justify-center p-12 bg-cover bg-center" style="background-image: url('/dar/assets/images/background.jpg');">
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-900/80 to-emerald-900/60 backdrop-blur-[2px]"></div>

        <div class="relative z-10 max-w-lg space-y-10">
            <div class="space-y-4">
                <h2 class="text-5xl font-extrabold text-white tracking-tight leading-tight">Secure Asset & Property Registry</h2>
                <p class="text-emerald-100 text-lg font-medium leading-relaxed opacity-90">Manage your agency assets with precision. A unified platform for real-time tracking, deployment, and structural validation.</p>
            </div>

            <div class="space-y-4">
                <div class="flex items-start gap-4 text-white/80">
                    <div class="mt-1 bg-emerald-800/50 p-2 rounded-lg border border-emerald-700 text-yellow-400"><i class="bi bi-shield-check"></i></div>
                    <div>
                        <h4 class="font-bold text-white">Encrypted Security</h4>
                        <p class="text-sm text-emerald-200/70">End-to-end protection for all sensitive property data.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 text-white/80">
                    <div class="mt-1 bg-emerald-800/50 p-2 rounded-lg border border-emerald-700 text-yellow-400"><i class="bi bi-graph-up-arrow"></i></div>
                    <div>
                        <h4 class="font-bold text-white">Real-Time Analytics</h4>
                        <p class="text-sm text-emerald-200/70">Visualize fund clusters and asset distribution instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 h-full flex flex-col justify-center items-center p-6 sm:p-12 md:p-20 bg-white overflow-hidden relative">
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:24px_24px] opacity-30"></div>

        <div class="w-full max-w-md h-auto flex flex-col justify-center bg-white p-10 rounded-3xl border border-emerald-100 shadow-2xl shadow-emerald-900/10 overflow-hidden relative z-10">
            <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-100/50 rounded-full blur-3xl -mr-20 -mt-20"></div>

            <div class="space-y-8 w-full relative z-10">
                <div class="flex flex-col items-center text-center">
                    <div class="mb-6 flex items-center justify-center bg-white p-3 rounded-3xl w-24 h-24 border-2 border-yellow-400 shadow-lg">
                        <img src="/dar/assets/images/logo.svg" alt="System Logo" class="w-full h-full object-contain scale-105">
                    </div>
                    <h1 class="text-3xl font-extrabold text-emerald-950 tracking-tight">Welcome Back</h1>
                    <p class="text-emerald-600 mt-2 font-medium text-sm">Sign in to manage your inventory assets</p>
                </div>

                <form action="/dar/dashboard" id="login-form" class="space-y-5">
                    <div class="flex flex-col gap-2">
                        <label class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800/50">Email Address</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-emerald-600">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" id="email" autocomplete="off" placeholder="name@domain.com" required class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:bg-white focus:border-yellow-400 focus:ring-4 focus:ring-yellow-400/10 outline-none transition-all text-sm font-semibold text-emerald-950">
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <label class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800/50">Password</label>
                            <a href="/dar/forgot" class="text-[10px] font-extrabold text-emerald-600 hover:text-yellow-600 uppercase tracking-widest">Forgot?</a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-emerald-600">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" id="password" placeholder="••••••••" required class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-emerald-100 bg-emerald-50/50 focus:bg-white focus:border-yellow-400 focus:ring-4 focus:ring-yellow-400/10 outline-none transition-all text-sm font-semibold text-emerald-950">
                            <button type="button" class="toggle-password absolute right-4 top-4 text-emerald-800/50">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" id="submit-btn" class="w-full mt-4 py-4 bg-emerald-800 hover:bg-emerald-950 text-yellow-400 font-bold text-sm rounded-2xl shadow-xl shadow-emerald-900/20 transition-all duration-300 flex items-center justify-center gap-2">
                        SIGN IN <i class="bi bi-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });
    });

    document.getElementById('login-form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const submitBtn = document.getElementById('submit-btn');
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        submitBtn.innerText = 'AUTHENTICATING...';

        try {
            const response = await fetch('/dar/api/auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            });

            const data = await response.json();

            if (response.ok && data.status === 'success') {
                window.location.href = '/dar/dashboard';
            } else {
                alert(data.message || 'Invalid credentials');
                submitBtn.innerText = 'SIGN IN';
            }
        } catch (error) {
            console.error('Login error:', error);
            submitBtn.innerText = 'SIGN IN';
        }
    });
</script>