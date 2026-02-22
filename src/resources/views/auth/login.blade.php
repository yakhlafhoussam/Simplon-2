@extends('layout.main')

@section('title', 'Login | Anonymous')

<!-- Login Form Container -->
<div class="min-h-screen bg-black overflow-hidden relative">
    <!-- Background Effects -->
    <div class="fixed inset-0 bg-grid-green-500/5 bg-[length:30px_30px]"></div>
    <div class="fixed inset-0 bg-gradient-to-b from-transparent via-green-500/5 to-transparent animate-rain"></div>

    <!-- Login Container -->
    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-1/3">
            <!-- System Status -->
            <div
                class="bg-gray-900/95 border border-green-500 shadow-lg shadow-green-500/30 p-4 mb-6 relative overflow-hidden">
                <!-- Scanning line -->
                <div
                    class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-green-500 to-transparent animate-scan">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse mr-2 shadow-green-500"></span>
                        <span class="text-sm text-green-500 font-mono">SYSTEM: ONLINE</span>
                    </div>
                    <div class="text-xs text-yellow-500 font-mono animate-pulse">SECURE CONNECTION</div>
                </div>

                <div class="text-center">
                    <div class="text-green-500 font-mono text-xs leading-tight mb-2">
                        <pre> █████╗  ███╗   ██╗  ██████╗  ███╗   ██╗ ██╗   ██╗ ███╗   ███╗  ██████╗  ██╗   ██╗ ███████╗</pre>
                        <pre>██╔══██╗ ████╗  ██║ ██╔═══██╗ ████╗  ██║ ╚██╗ ██╔╝ ████╗ ████║ ██╔═══██╗ ██║   ██║ ██╔════╝</pre>
                        <pre>███████║ ██╔██╗ ██║ ██║   ██║ ██╔██╗ ██║  ╚████╔╝  ██╔████╔██║ ██║   ██║ ██║   ██║ ███████╗</pre>
                        <pre>██╔══██║ ██║╚██╗██║ ██║   ██║ ██║╚██╗██║   ╚██╔╝   ██║╚██╔╝██║ ██║   ██║ ██║   ██║ ╚════██║</pre>
                        <pre>██║  ██║ ██║ ╚████║ ╚██████╔╝ ██║ ╚████║    ██║    ██║ ╚═╝ ██║ ╚██████╔╝ ╚██████╔╝ ███████║</pre>
                        <pre>╚═╝  ╚═╝ ╚═╝  ╚═══╝  ╚═════╝  ╚═╝  ╚═══╝    ╚═╝    ╚═╝     ╚═╝  ╚═════╝   ╚═════╝  ╚══════╝</pre>
                    </div>
                    <div class="text-xs text-green-500 font-mono">EDUCATION DEBRIEFING SYSTEM</div>
                    <div class="text-xs text-red-500 font-mono mt-1">v3.14 - RESTRICTED ACCESS</div>
                </div>
            </div>

            <!-- Login Form -->
            <div class="bg-gray-900/95 border border-green-500 shadow-lg shadow-green-500/30 p-6 relative">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-green-500 font-mono mb-2">> ACCESS CONTROL</h2>
                </div>

                <!-- Login Form -->
                <form id="login-form" method="POST" action="login">
                    @csrf

                    <div class="space-y-6">
                        <!-- Username Field -->
                        <div>
                            <label class="text-sm text-green-500 font-mono mb-2 block">USER IDENTIFIER</label>
                            <div class="relative">
                                <input type="text" name="email" id="username" value="{{ old('email') }}"
                                    class="w-full bg-black/90 border border-green-500 text-green-500 px-4 py-3 pl-10 font-mono placeholder-green-500/50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                    placeholder="ENTER USERNAME" autocomplete="off" autocapitalize="none">
                                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-green-500">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label class="text-sm text-green-500 font-mono mb-2 block">ACCESS KEY</label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="w-full bg-black/90 border border-green-500 text-green-500 px-4 py-3 pl-10 font-mono placeholder-green-500/50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300"
                                    placeholder="ENTER PASSWORD" autocomplete="off">
                                <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-green-500">
                                    <i class="fas fa-key"></i>
                                </div>
                                <button type="button"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-green-500 hover:text-green-400 transition-colors"
                                    onclick="togglePassword()">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" id="login-button"
                                class="w-full bg-transparent border border-green-500 text-green-500 px-6 py-3 font-mono uppercase tracking-wider hover:bg-green-500/10 hover:shadow-lg hover:shadow-green-500/30 hover:-translate-y-0.5 transition-all duration-300 relative overflow-hidden group">
                                <span class="relative z-10 flex items-center justify-center">
                                    <i class="fas fa-terminal mr-2"></i>
                                    <span id="button-text">INITIATE ACCESS</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Error Message -->
                @if ($errors->any())
                    <div id="error-message" class="mt-4 p-3 border border-red-500 bg-red-900/20 animate-shake">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                            <span class="text-sm text-red-500 font-mono">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div class="text-center mt-6">
                <div class="text-xs text-yellow-500 font-mono">ANONYMOUS EDUCATION SYSTEM © 2065</div>
                <div class="text-xs text-green-500 font-mono mt-1">ALL ACCESS LOGS ARE ENCRYPTED AND MONITORED</div>
            </div>
        </div>
    </div>
</div>

<!-- Add these styles to your main CSS or in a style tag -->
<style>
    @keyframes rain {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 0 1000px;
        }
    }

    @keyframes scan {
        0% {
            top: 0;
        }

        100% {
            top: 100%;
        }
    }

    @keyframes shake {

        0%,
        100% {
            transform: translateX(0);
        }

        10%,
        30%,
        50%,
        70%,
        90% {
            transform: translateX(-5px);
        }

        20%,
        40%,
        60%,
        80% {
            transform: translateX(5px);
        }
    }

    .animate-rain {
        animation: rain 20s linear infinite;
    }

    .animate-scan {
        animation: scan 3s linear infinite;
    }

    .animate-shake {
        animation: shake 0.5s linear;
    }

    .bg-grid-green-500\/5 {
        background-image:
            linear-gradient(rgba(34, 197, 94, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(34, 197, 94, 0.05) 1px, transparent 1px);
    }
</style>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.querySelector('[onclick="togglePassword()"] i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.classList.remove('fa-eye');
            toggleButton.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleButton.classList.remove('fa-eye-slash');
            toggleButton.classList.add('fa-eye');
        }
    }

    // Add form submission handling
    document.getElementById('login-form').addEventListener('submit', function(e) {
        const loginButton = document.getElementById('login-button');
        const buttonText = document.getElementById('button-text');
        const errorMessage = document.getElementById('error-message');

        // Hide any previous error
        if (errorMessage) {
            errorMessage.classList.add('hidden');
        }

        // Disable form and show loading
        loginButton.disabled = true;
        buttonText.innerHTML =
            '<span class="inline-block w-4 h-4 border-2 border-green-500/30 border-t-green-500 rounded-full animate-spin mr-2"></span>AUTHENTICATING...';
        loginButton.classList.add('animate-pulse');

        // The form will submit normally via Laravel
        // Error handling is done via Laravel validation above
    });

    // Auto-focus username field
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('username').focus();
    });
</script>
