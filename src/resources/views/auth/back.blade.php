<!-- Main Content Area -->
<div class="flex-1 flex flex-col overflow-hidden">
    <!-- Page Header -->
    <div class="p-4 md:p-6 border-b border-hacker-green bg-black">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="mb-4 md:mb-0">
                <h1 class="text-xl md:text-2xl font-bold hacker-green glow mb-2" id="page-title">> SYSTEM DASHBOARD</h1>
                <div class="hacker-green text-sm" id="page-subtitle">// Real-time monitoring interface - Access granted
                </div>
            </div>

            <div class="flex space-x-4">
                <button class="hacker-button">
                    <i class="fas fa-sync-alt mr-2"></i>REFRESH
                </button>
                <div class="relative">
                    <button class="hacker-button">
                        <i class="fas fa-exclamation-triangle mr-2"></i>ALERTS
                    </button>
                    <span class="absolute -top-1 -right-1 w-2 h-2 bg-hacker-red rounded-full blink"></span>
                </div>
            </div>
        </div>
        <div class="mt-4 progress-bar">
            <div class="progress-fill" style="width: 100%"></div>
        </div>
    </div>

    <!-- Scrollable Content Area -->
    <div class="scrollable-main p-4 md:p-6">
        <!-- Page Content -->
        <main class="bg-transparent">
            <!-- Dashboard Page -->
            <div id="dashboard-page" class="space-y-6">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mb-6">
                    <div class="terminal p-4 md:p-5">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="hacker-green text-sm mb-1">ACTIVE CLASSES</div>
                                <div class="text-2xl md:text-3xl font-bold hacker-green">04</div>
                            </div>
                            <div class="text-2xl hacker-green hidden md:block">
                                <i class="fas fa-server"></i>
                            </div>
                        </div>
                        <div class="text-xs hacker-green">
                            <div class="flex justify-between">
                                <span>Online Users</span>
                                <span class="hacker-yellow">127</span>
                            </div>
                        </div>
                    </div>

                    <div class="terminal p-4 md:p-5">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="hacker-green text-sm mb-1">ACTIVE BRIEFS</div>
                                <div class="text-2xl md:text-3xl font-bold hacker-green">12</div>
                            </div>
                            <div class="text-2xl hacker-green hidden md:block">
                                <i class="fas fa-file-code"></i>
                            </div>
                        </div>
                        <div class="text-xs hacker-green">
                            <div class="flex justify-between">
                                <span>Pending Review</span>
                                <span class="hacker-red">03</span>
                            </div>
                        </div>
                    </div>

                    <div class="terminal p-4 md:p-5">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <div class="hacker-green text-sm mb-1">PENDING EVALS</div>
                                <div class="text-2xl md:text-3xl font-bold hacker-green">08</div>
                            </div>
                            <div class="text-2xl hacker-green hidden md:block">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                        </div>
                        <div class="text-xs hacker-green">
                            <div class="flex justify-between">
                                <span>Due Today</span>
                                <span class="hacker-red">02</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Activity -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="terminal p-4 md:p-5">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-history hacker-green mr-3"></i>
                            <h3 class="font-bold hacker-green">[ SYSTEM ACTIVITY ]</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="border-l-2 border-hacker-green pl-4 py-2">
                                <div class="text-sm">[EVAL] Brief "API Development" completed</div>
                                <div class="text-xs hacker-yellow mt-1">User: ANONYMOUS // Time: 14:23:45</div>
                            </div>
                            <div class="border-l-2 border-hacker-yellow pl-4 py-2">
                                <div class="text-sm">[BRIEF] New brief published: Sprint 3</div>
                                <div class="text-xs hacker-yellow mt-1">System // Time: 13:15:22</div>
                            </div>
                            <div class="border-l-2 border-hacker-green pl-4 py-2">
                                <div class="text-sm">[USER] New student registered</div>
                                <div class="text-xs hacker-yellow mt-1">User: ANONYMOUS // Time: 11:45:10</div>
                            </div>
                            <div class="border-l-2 border-hacker-green pl-4 py-2">
                                <div class="text-sm">[SECURITY] Firewall protocol updated</div>
                                <div class="text-xs hacker-yellow mt-1">System // Time: 10:30:15</div>
                            </div>
                            <div class="border-l-2 border-hacker-yellow pl-4 py-2">
                                <div class="text-sm">[DATA] Backup completed successfully</div>
                                <div class="text-xs hacker-yellow mt-1">System // Time: 09:45:22</div>
                            </div>
                            <div class="border-l-2 border-hacker-green pl-4 py-2">
                                <div class="text-sm">[NETWORK] New device connected</div>
                                <div class="text-xs hacker-yellow mt-1">Device: TERMINAL_04 // Time: 08:15:30</div>
                            </div>
                        </div>
                    </div>

                    <div class="terminal p-4 md:p-5">
                        <div class="flex items-center mb-4">
                            <i class="fas fa-bolt hacker-green mr-3"></i>
                            <h3 class="font-bold hacker-green">[ QUICK ACTIONS ]</h3>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <button class="hacker-button p-3 flex flex-col items-center justify-center">
                                <i class="fas fa-plus mb-2"></i>
                                <span class="text-xs">NEW BRIEF</span>
                            </button>
                            <button class="hacker-button p-3 flex flex-col items-center justify-center">
                                <i class="fas fa-clipboard-check mb-2"></i>
                                <span class="text-xs">DEBRIEF</span>
                            </button>
                            <button class="hacker-button p-3 flex flex-col items-center justify-center">
                                <i class="fas fa-chart-line mb-2"></i>
                                <span class="text-xs">PROGRESS</span>
                            </button>
                            <button class="hacker-button p-3 flex flex-col items-center justify-center">
                                <i class="fas fa-file-export mb-2"></i>
                                <span class="text-xs">REPORT</span>
                            </button>
                            <button class="hacker-button p-3 flex flex-col items-center justify-center">
                                <i class="fas fa-users mb-2"></i>
                                <span class="text-xs">USERS</span>
                            </button>
                            <button class="hacker-button p-3 flex flex-col items-center justify-center">
                                <i class="fas fa-cog mb-2"></i>
                                <span class="text-xs">SETTINGS</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Recent Briefs -->
                <div class="terminal p-4 md:p-5">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-code hacker-green mr-3"></i>
                        <h3 class="font-bold hacker-green">[ ACTIVE BRIEFS ]</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="hacker-table">
                            <thead>
                                <tr>
                                    <th>BRIEF</th>
                                    <th class="hidden md:table-cell">SPRINT</th>
                                    <th>SKILLS</th>
                                    <th class="hidden md:table-cell">STATUS</th>
                                    <th>DUE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="font-medium">API Development</div>
                                            <div class="text-sm hacker-yellow">Build REST API</div>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell">
                                        <span class="skill-tag">SPRINT 3</span>
                                    </td>
                                    <td>
                                        <div class="flex space-x-1">
                                            <span class="skill-tag level-3">C1</span>
                                            <span class="skill-tag level-2">C4</span>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell">
                                        <span class="hacker-green">> ACTIVE</span>
                                    </td>
                                    <td>
                                        <span class="text-xs hacker-yellow">2 days</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <div class="font-medium">Frontend Advanced</div>
                                            <div class="text-sm hacker-yellow">React Components</div>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell">
                                        <span class="skill-tag">SPRINT 2</span>
                                    </td>
                                    <td>
                                        <div class="flex space-x-1">
                                            <span class="skill-tag level-3">C1</span>
                                            <span class="skill-tag level-2">C2</span>
                                        </div>
                                    </td>
                                    <td class="hidden md:table-cell">
                                        <span class="hacker-yellow">> REVIEW</span>
                                    </td>
                                    <td>
                                        <span class="text-xs hacker-green">Completed</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Other pages would be here -->
            <div id="briefs-page" class="hidden">
                <div class="text-center py-10 terminal">
                    <div class="ascii-art text-lg mb-4">
                        ██████╗ ██████╗ ██╗███████╗███████╗
                        ██╔══██╗██╔══██╗██║██╔════╝██╔════╝
                        ██████╔╝██████╔╝██║█████╗ █████╗
                        ██╔══██╗██╔══██╗██║██╔══╝ ██╔══╝
                        ██████╔╝██║ ██║██║██║ ███████╗
                        ╚═════╝ ╚═╝ ╚═╝╚═╝╚═╝ ╚══════╝
                    </div>
                    <h3 class="hacker-green text-xl mb-2">BRIEFS MANAGEMENT</h3>
                    <p class="hacker-yellow">Secure brief creation and management interface</p>
                </div>
            </div>

            <div id="debriefing-page" class="hidden">
                <div class="text-center py-10 terminal">
                    <div class="ascii-art text-lg mb-4">
                        ██████╗ ███████╗██████╗ ██████╗ ██╗███████╗███████╗
                        ██╔══██╗██╔════╝██╔══██╗██╔══██╗██║██╔════╝██╔════╝
                        ██║ ██║█████╗ ██████╔╝██████╔╝██║█████╗ █████╗
                        ██║ ██║██╔══╝ ██╔══██╗██╔══██╗██║██╔══╝ ██╔══╝
                        ██████╔╝███████╗██║ ██║██║ ██║██║██║ ███████╗
                        ╚═════╝ ╚══════╝╚═╝ ╚═╝╚═╝ ╚═╝╚═╝╚═╝ ╚══════╝
                    </div>
                    <h3 class="hacker-green text-xl mb-2">DEBRIEFING SYSTEM</h3>
                    <p class="hacker-yellow">Secure competency evaluation interface</p>
                </div>
            </div>

            <!-- Add more pages as needed -->
        </main>
    </div>
</div>
</div>
</div>

<script>
    // Update Hacker Time
    function updateHackerTime() {
        const now = new Date();
        const timeStr = now.toLocaleTimeString('en-US', {
            hour12: false
        });
        const dateStr = now.toLocaleDateString('en-US', {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        });
        document.getElementById('hacker-time').textContent = `${dateStr} | ${timeStr}`;
    }
    setInterval(updateHackerTime, 1000);
    updateHackerTime();

    // Page Navigation
    document.querySelectorAll('.nav-item').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all links
            document.querySelectorAll('.nav-item').forEach(l => {
                l.classList.remove('active');
            });

            // Add active class to clicked link
            this.classList.add('active');

            // Get page to show
            const pageId = this.getAttribute('data-page');

            // Hide all pages
            document.querySelectorAll('main > div').forEach(page => {
                page.classList.add('hidden');
            });

            // Show selected page
            const pageToShow = document.getElementById(`${pageId}-page`);
            if (pageToShow) {
                pageToShow.classList.remove('hidden');
            } else {
                document.getElementById('dashboard-page').classList.remove('hidden');
            }

            // Update page title
            const pageTitle = document.getElementById('page-title');
            const pageSubtitle = document.getElementById('page-subtitle');

            const titles = {
                'dashboard': {
                    title: '> SYSTEM DASHBOARD',
                    subtitle: '// Real-time monitoring interface - Access granted'
                },
                'briefs': {
                    title: '> BRIEFS MANAGEMENT',
                    subtitle: '// Secure brief creation and management'
                },
                'debriefing': {
                    title: '> DEBRIEFING SYSTEM',
                    subtitle: '// Secure competency evaluation'
                },
                'my-briefs': {
                    title: '> MY BRIEFS',
                    subtitle: '// Track assignments and progress'
                },
                'my-skills': {
                    title: '> SKILLS PROFILE',
                    subtitle: '// Competency mastery tracking'
                },
                'classes': {
                    title: '> CLASSES MANAGEMENT',
                    subtitle: '// Secure class administration'
                },
                'competences': {
                    title: '> COMPETENCES DATABASE',
                    subtitle: '// Secure competency management'
                },
                'users': {
                    title: '> USERS DATABASE',
                    subtitle: '// Secure user administration'
                },
                'progress': {
                    title: '> PROGRESS MONITORING',
                    subtitle: '// Secure progress analysis'
                },
                'profile': {
                    title: '> SYSTEM SETTINGS',
                    subtitle: '// Secure configuration interface'
                }
            };

            if (titles[pageId]) {
                pageTitle.textContent = titles[pageId].title;
                pageSubtitle.textContent = titles[pageId].subtitle;
            }
        });
    });

    // Role Switcher
    const roleSelector = document.getElementById('role-selector');
    const adminNav = document.getElementById('admin-nav');
    const teacherNav = document.getElementById('teacher-nav');
    const studentNav = document.getElementById('student-nav');
    const currentUser = document.getElementById('current-user');
    const navUsername = document.getElementById('nav-username');

    roleSelector.addEventListener('change', function() {
        const role = this.value;

        // Hide all navigation sections
        adminNav.classList.add('hidden');
        teacherNav.classList.add('hidden');
        studentNav.classList.add('hidden');

        // Show appropriate navigation based on role
        if (role === 'admin') {
            adminNav.classList.remove('hidden');
            teacherNav.classList.remove('hidden');
            currentUser.textContent = 'SYSTEM_ADMIN';
            navUsername.textContent = 'SYSTEM_ADMIN';
        } else if (role === 'teacher') {
            teacherNav.classList.remove('hidden');
            currentUser.textContent = 'INSTRUCTOR_01';
            navUsername.textContent = 'INSTRUCTOR_01';
        } else if (role === 'student') {
            studentNav.classList.remove('hidden');
            currentUser.textContent = 'STUDENT_001';
            navUsername.textContent = 'STUDENT_001';
        }

        // Reset to dashboard when changing role
        document.querySelectorAll('.nav-item').forEach(l => {
            l.classList.remove('active');
        });
        document.querySelector('[data-page="dashboard"]').classList.add('active');

        document.querySelectorAll('main > div').forEach(page => {
            page.classList.add('hidden');
        });
        document.getElementById('dashboard-page').classList.remove('hidden');

        document.getElementById('page-title').textContent = '> SYSTEM DASHBOARD';
        document.getElementById('page-subtitle').textContent =
            '// Real-time monitoring interface - Access granted';
    });

    // Initialize
    document.querySelector('[data-page="dashboard"]').classList.add('active');

    // Add console log updates
    function addConsoleLog(message, type = 'green') {
        const consoleOutput = document.querySelector('.console-output');
        if (consoleOutput) {
            const newLine = document.createElement('div');
            newLine.className = `console-line hacker-${type}`;
            newLine.textContent = `> ${message}`;
            consoleOutput.appendChild(newLine);
            consoleOutput.scrollTop = consoleOutput.scrollHeight;
        }
    }

    // Simulate system activity
    setInterval(() => {
        const activities = [
            'System integrity check passed',
            'Security protocols updated',
            'New data encrypted',
            'Connection stable',
            'Monitoring active systems',
            'Firewall active',
            'Data transmission secure',
            'All sensors operational'
        ];
        const randomActivity = activities[Math.floor(Math.random() * activities.length)];
        addConsoleLog(randomActivity, Math.random() > 0.8 ? 'yellow' : 'green');
    }, 15000);

    // Add click effects to buttons
    document.querySelectorAll('.hacker-button').forEach(button => {
        button.addEventListener('click', function() {
            const originalBoxShadow = this.style.boxShadow;
            this.style.boxShadow = '0 0 20px rgba(0, 255, 0, 0.8)';
            setTimeout(() => {
                this.style.boxShadow = originalBoxShadow;
            }, 300);
        });
    });

    // Add scroll event for subtle effects
    const scrollableMain = document.querySelector('.scrollable-main');
    if (scrollableMain) {
        scrollableMain.addEventListener('scroll', function() {
            const scrollPercent = (this.scrollTop / (this.scrollHeight - this.clientHeight)) * 100;
            if (scrollPercent > 90) {
                addConsoleLog('End of data stream reached', 'yellow');
            }
        });
    }

    // Initialize with a welcome message
    setTimeout(() => {
        addConsoleLog('Welcome to ANONYMOUS Education System', 'green');
        addConsoleLog('All connections are encrypted and secure', 'green');
        addConsoleLog('Monitoring 24/7 for optimal performance', 'yellow');
    }, 1000);
</script>
