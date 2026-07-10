<div class="h-full w-full flex items-center justify-center p-6 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-yellow-400/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-600/10 rounded-full blur-3xl"></div>
    </div>

    <div class="w-full max-w-lg bg-white p-10 rounded-3xl border border-emerald-100 shadow-2xl shadow-emerald-900/10 relative overflow-hidden">
        <div class="flex flex-col items-center text-center mb-8">
            <div class="bg-emerald-50 p-4 rounded-full mb-6 border border-emerald-100">
                <i class="bi bi-shield-lock text-4xl text-emerald-800"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-emerald-950 tracking-tight">Password Recovery</h1>
        </div>

        <form class="space-y-6">
            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800/50">Account Email</label>
                <div class="flex gap-2">
                    <input id="email" autocomplete="off" type="email" placeholder="name@domain.com" class="w-full px-4 py-3.5 rounded-2xl border border-emerald-100 bg-slate-50 focus:bg-white focus:border-yellow-400 outline-none transition-all text-sm font-semibold">
                    <button type="button" id="sendOtpBtn" class="px-6 py-3.5 bg-emerald-800 text-white font-bold text-xs rounded-2xl hover:bg-emerald-950 transition-all whitespace-nowrap">SEND OTP</button>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800/50">Enter OTP Code</label>
                <div class="flex gap-2">
                    <input id="otp" type="text" placeholder="000000" maxlength="6" class="w-full text-center py-3.5 rounded-2xl border border-emerald-100 bg-slate-50 focus:bg-white focus:border-yellow-400 outline-none text-xl font-bold tracking-[0.5em]">
                    <button id="verifyOtpBtn" type="button" class="px-6 py-3.5 bg-emerald-100 text-emerald-900 font-bold text-xs rounded-2xl hover:bg-emerald-200 transition-all">VERIFY</button>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800/50">New Password</label>
                    <div class="relative">
                        <input id="new_password" type="password" disabled placeholder="••••••••" class="w-full px-4 py-3.5 rounded-2xl border border-emerald-100 bg-slate-100 cursor-not-allowed text-sm font-semibold">
                        <button type="button" class="toggle-password absolute right-4 top-4 text-emerald-800/50">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800/50">Confirm Password</label>
                    <div class="relative">
                        <input id="confirm_password" type="password" disabled placeholder="••••••••" class="w-full px-4 py-3.5 rounded-2xl border border-emerald-100 bg-slate-100 cursor-not-allowed text-sm font-semibold">
                        <button type="button" class="toggle-password absolute right-4 top-4 text-emerald-800/50">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit" disabled class="w-full py-4 bg-yellow-400/50 text-emerald-950/50 font-bold text-sm rounded-2xl cursor-not-allowed transition-all">
                UPDATE PASSWORD
            </button>

            <div class="text-center">
                <a href="/dar" class="text-xs font-bold text-emerald-700 hover:text-emerald-950 uppercase tracking-widest transition-all underline">Back to Login</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sendOtpBtn = document.getElementById('sendOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');
        const updatePasswordBtn = document.querySelector('button[type="submit"]');
        let timeLeft = 60;

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

        sendOtpBtn.addEventListener('click', function() {
            const email = document.getElementById('email').value;
            requestOtp(email);
            sendOtpBtn.disabled = true;
            sendOtpBtn.classList.add('opacity-50', 'cursor-not-allowed');
            const countdown = setInterval(() => {
                timeLeft--;
                sendOtpBtn.innerText = `RESEND (${timeLeft}s)`;
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    sendOtpBtn.disabled = false;
                    sendOtpBtn.innerText = 'SEND OTP';
                    sendOtpBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                    timeLeft = 60;
                }
            }, 1000);
        });

        async function requestOtp(email) {
            await fetch('/dar/api/request-otp.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email
                })
            });
        }

        verifyOtpBtn.addEventListener('click', async function() {
            const otp = document.getElementById('otp').value;
            const response = await fetch('/dar/api/verify-otp.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    otp
                })
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert('OTP verified!');
                document.querySelectorAll('input[type="password"]').forEach(input => {
                    input.disabled = false;
                    input.classList.remove('bg-slate-100', 'cursor-not-allowed');
                });
                updatePasswordBtn.disabled = false;
                updatePasswordBtn.classList.remove('bg-yellow-400/50', 'text-emerald-950/50', 'cursor-not-allowed');
                updatePasswordBtn.classList.add('bg-yellow-400', 'text-emerald-950');
            } else {
                alert(result.message);
            }
        });

        updatePasswordBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const email = document.getElementById('email').value;

            if (newPassword !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            const response = await fetch('/dar/api/auth.php', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    new_password: newPassword
                })
            });
            const result = await response.json();
            if (result.status === 'success') {
                alert('Password updated successfully!');
                window.location.href = '/dar';
            } else {
                alert(result.message);
            }
        });
    });
</script>