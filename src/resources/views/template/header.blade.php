<!-- Binary Rain Effect -->
    <div class="binary-rain"></div>
    
    <div class="content-area">
        <!-- Fixed Header -->
        <div class="fixed-header border-b border-hacker-green py-2 px-4 flex justify-between items-center bg-black">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <span class="status-dot online"></span>
                    <span class="text-sm hacker-green">SYSTEM: ONLINE</span>
                </div>
                <div class="text-sm hacker-yellow flashing-text hidden md:block">WARNING: RESTRICTED ACCESS</div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-sm">
                    <span class="hacker-green">[</span>
                    <span id="hacker-time" class="hacker-yellow">--:--:--</span>
                    <span class="hacker-green">]</span>
                </div>
                <div class="text-sm">
                    <span class="hacker-green">USER:</span> 
                    <span id="current-user" class="hacker-yellow">ANONYMOUS</span>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row flex-1 overflow-hidden">
            <!-- Navigation Panel -->
            <div class="hacker-nav w-full md:w-64 p-4 bg-black overflow-y-auto">
                <!-- Anonymous ASCII Logo -->
                <div class="mb-8 terminal p-4">
                    <div class="ascii-art text-[2px]">
 █████╗  ███╗   ██╗  ██████╗  ███╗   ██╗ ██╗   ██╗ ███╗   ███╗  ██████╗  ██╗   ██╗ ███████╗
██╔══██╗ ████╗  ██║ ██╔═══██╗ ████╗  ██║ ╚██╗ ██╔╝ ████╗ ████║ ██╔═══██╗ ██║   ██║ ██╔════╝
███████║ ██╔██╗ ██║ ██║   ██║ ██╔██╗ ██║  ╚████╔╝  ██╔████╔██║ ██║   ██║ ██║   ██║ ███████╗
██╔══██║ ██║╚██╗██║ ██║   ██║ ██║╚██╗██║   ╚██╔╝   ██║╚██╔╝██║ ██║   ██║ ██║   ██║ ╚════██║
██║  ██║ ██║ ╚████║ ╚██████╔╝ ██║ ╚████║    ██║    ██║ ╚═╝ ██║ ╚██████╔╝ ╚██████╔╝ ███████║
╚═╝  ╚═╝ ╚═╝  ╚═══╝  ╚═════╝  ╚═╝  ╚═══╝    ╚═╝    ╚═╝     ╚═╝  ╚═════╝   ╚═════╝  ╚══════╝
                    </div>
                    <div class="text-center mt-2">
                        <div class="text-xs hacker-green">EDUCATION SYSTEM v3.14</div>
                        <div class="text-xs hacker-red">ACCESS LEVEL: MAXIMUM</div>
                    </div>
                </div>

                <!-- User Status -->
                <div class="mb-6 data-panel">
                    <div class="flex items-center space-x-3 mb-2">
                        <div class="w-8 h-8 border border-hacker-green flex items-center justify-center">
                            <i class="fas fa-user-secret hacker-green"></i>
                        </div>
                        <div>
                            <div class="font-bold hacker-green" id="nav-username">ANONYMOUS</div>
                            <div class="text-xs hacker-yellow">Identity: Protected</div>
                        </div>
                    </div>
                    <div class="text-xs mt-3">
                        <div class="flex justify-between mb-1">
                            <span class="hacker-green">System Integrity</span>
                            <span class="hacker-green">100%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="space-y-1">
                    <div class="text-xs hacker-green uppercase tracking-wider px-3 py-2">[ Navigation Matrix ]</div>
                    
                    <a href="#" class="nav-item active flex items-center space-x-3" data-page="dashboard">
                        <i class="fas fa-terminal w-4 hacker-green"></i>
                        <span>DASHBOARD</span>
                    </a>
                    
                    <!-- Admin Navigation -->
                    <div id="admin-nav" class="">
                        <div class="text-xs hacker-green uppercase tracking-wider px-3 py-2">[ System Control ]</div>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="classes">
                            <i class="fas fa-server w-4 hacker-green"></i>
                            <span>CLASSES</span>
                        </a>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="competences">
                            <i class="fas fa-brain w-4 hacker-green"></i>
                            <span>COMPETENCES</span>
                        </a>
                        
                        <a href="users" class="nav-item flex items-center space-x-3" data-page="users">
                            <i class="fas fa-users w-4 hacker-green"></i>
                            <span>USERS</span>
                        </a>
                    </div>
                    
                    <!-- Teacher Navigation -->
                    <div id="teacher-nav" class="hidden">
                        <div class="text-xs hacker-green uppercase tracking-wider px-3 py-2">[ Instructor Protocol ]</div>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="briefs">
                            <i class="fas fa-file-code w-4 hacker-green"></i>
                            <span>BRIEFS</span>
                            <span class="ml-auto text-xs bg-hacker-red text-black px-2 rounded">3</span>
                        </a>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="debriefing">
                            <i class="fas fa-comment-medical w-4 hacker-green"></i>
                            <span>DEBRIEF</span>
                            <span class="ml-auto text-xs bg-hacker-green text-black px-2 rounded blink">8</span>
                        </a>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="progress">
                            <i class="fas fa-chart-network w-4 hacker-green"></i>
                            <span>PROGRESS</span>
                        </a>
                    </div>
                    
                    <!-- Student Navigation -->
                    <div id="student-nav" class="hidden">
                        <div class="text-xs hacker-green uppercase tracking-wider px-3 py-2">[ Student Interface ]</div>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="my-briefs">
                            <i class="fas fa-tasks w-4 hacker-green"></i>
                            <span>MY BRIEFS</span>
                        </a>
                        
                        <a href="#" class="nav-item flex items-center space-x-3" data-page="my-skills">
                            <i class="fas fa-chart-bar w-4 hacker-green"></i>
                            <span>MY SKILLS</span>
                        </a>
                    </div>
                    
                    <div class="text-xs hacker-green uppercase tracking-wider px-3 py-2">[ System Config ]</div>
                    
                    <a href="#" class="nav-item flex items-center space-x-3" data-page="profile">
                        <i class="fas fa-cogs w-4 hacker-green"></i>
                        <span>SETTINGS</span>
                    </a>
                </div>
            </div>