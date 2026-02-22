@extends('layout.main')

@section('title', 'New User | Anonymous')

<!-- Users Management Main Content -->
<main class="bg-transparent flex-1 p-2">
    <!-- Users Management Page -->
    <div id="users-page" class="space-y-6">
        <!-- Page Header -->
        <div class="terminal p-4 md:p-5">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold hacker-green glow">[ USERS DATABASE ]</h2>
                    <div class="text-sm hacker-yellow mt-1">Secure user administration interface</div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-sm text-red-600 mt-1">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="flex space-x-3 mt-4 md:mt-0">
                    <button id="add-user-btn" class="hacker-button px-4 py-2">
                        <i class="fas fa-terminal mr-2"></i>TERMINAL
                    </button>
                </div>
            </div>
        </div>

        <!-- Users Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-green mb-1">TOTAL USERS</div>
                        <div class="text-2xl font-bold hacker-green">{{ count($users) }}</div>
                    </div>
                    <i class="fas fa-users hacker-green text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill" style="width: 100%"></div>
                </div>
            </div>

            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-yellow mb-1">ADMINISTRATORS</div>
                        <div class="text-2xl font-bold hacker-yellow">{{ count($admins) }}</div>
                    </div>
                    <i class="fas fa-user-shield hacker-yellow text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill bg-hacker-yellow" style="width: 2%"></div>
                </div>
            </div>

            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-green mb-1">TEACHERS</div>
                        <div class="text-2xl font-bold hacker-green">{{ count($teachers) }}</div>
                    </div>
                    <i class="fas fa-chalkboard-teacher hacker-green text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill" style="width: 5%"></div>
                </div>
            </div>

            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-yellow mb-1">STUDENTS</div>
                        <div class="text-2xl font-bold hacker-yellow">{{ count($students) }}</div>
                    </div>
                    <i class="fas fa-user-graduate hacker-yellow text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill bg-hacker-yellow" style="width: 93%"></div>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="terminal p-0">
            <div class="p-4 md:p-5 border-b border-hacker-green bg-black/50">
                <div class="flex items-center">
                    <i class="fas fa-database hacker-green mr-3"></i>
                    <h3 class="font-bold hacker-green">[ USER RECORDS ]</h3>
                </div>
            </div>

            <div class="max-h-[600px] overflow-y-scroll">
                <table class="hacker-table min-w-full">
                    <thead>
                        <tr>
                            <th class="w-12">ID</th>
                            <th>USER</th>
                            <th class="hidden md:table-cell">EMAIL</th>
                            <th>ROLE</th>
                            <th class="hidden lg:table-cell">JOINED</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="hacker-green font-mono">{{ $user->id }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 border border-hacker-green flex items-center justify-center mr-3">
                                            <i class="fas fa-user-secret hacker-green text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $user->first . ' ' . $user->last }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="md:table-cell hacker-green">{{ $user->email }}</td>
                                @if ($user->role == 'admin')
                                    <td>
                                        <span
                                            class="skill-tag bg-hacker-red/20 border-hacker-red text-hacker-red">ADMIN</span>
                                    </td>
                                @endif
                                @if ($user->role == 'teacher')
                                    <td>
                                        <span
                                            class="skill-tag bg-hacker-green/20 border-hacker-green text-hacker-green">TEACHER</span>
                                    </td>
                                @endif
                                @if ($user->role == 'student')
                                    <td>
                                        <span
                                            class="skill-tag bg-hacker-yellow/20 border-hacker-yellow text-hacker-yellow">STUDENT</span>
                                    </td>
                                @endif
                                <td class="hidden lg:table-cell hacker-yellow text-sm">{{ $user->created_at }}</td>
                                <td>
                                    <span class="flex items-center">
                                        <span class="status-dot online mr-2"></span>
                                        @if ($user->status == 1)
                                            <span class="hacker-green">Active</span>
                                        @else
                                            <span class="text-red-600">SAJ</span>
                                        @endif

                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Add more user rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add User Modal -->
        <div id="add-user-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-black/80"></div>

                <!-- Modal Content -->
                <div class="relative w-full max-w-4xl">
                    <div class="terminal p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-xl font-bold hacker-green">[ ANONYMOUS TERMINAL ]</h3>
                                <div class="text-sm hacker-yellow mt-1">Secure user registration protocol
                                </div>
                            </div>
                            <button id="close-modal" class="hacker-button px-3 py-2">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <!-- Terminal Input -->
                        <div class="w-full bg-black border border-hacker-green/50 p-4">
                            <!-- Terminal Header -->
                            <div class="flex items-center px-2 py-1 border-hacker-green/30 mb-4">
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 rounded-full bg-hacker-red"></div>
                                    <div class="w-2 h-2 rounded-full bg-hacker-yellow"></div>
                                    <div class="w-2 h-2 rounded-full bg-hacker-green"></div>
                                </div>
                            </div>

                            <!-- Command Line -->
                            <div class="flex font-mono h-96">
                                <span class="hacker-green mr-2">anonymous@system:~$</span>
                                <div class="relative flex-1">
                                    <input id="commend" type="text"
                                        class="w-full bg-transparent border-none outline-none text-hacker-green placeholder-hacker-green/50 font-mono"
                                        autocomplete="off" autocapitalize="none" spellcheck="false" />
                                </div> 
                            </div>
                            <div>
                                <div id="checkmod" class="relative flex-1"></div>
                                <p id="load" class="hidden text-green-400"></p>
                            </div>
                        </div>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    // Users Management Script
    function addUser(first, last, role, email, password) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/users', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`first=${first}&last=${last}&role=${role}&email=${email}&password=${password}`);
        });
    }

    function findUser(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/users/find', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    function stopUser(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/users/stop', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }
    function onUser(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/users/on', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        const addUserBtn = document.getElementById('add-user-btn');
        const addUserModal = document.getElementById('add-user-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const cancelFormBtn = document.getElementById('cancel-form');
        const newUserForm = document.getElementById('new-user-form');
        const load = document.getElementById('load');
        const cmd = document.getElementById('commend');
        const checkmod = document.getElementById('checkmod');
        let loadCheck = 0;
        let send = false;
        let checkSend = '';
        let chose = '';
        let create = false;
        let stop = false;
        let on = false;
        let switching = false;
        let id = 0;
        let first = '';
        let last = '';
        let role = '';
        let email = '';
        let password = '';
        setInterval(() => {
            if (loadCheck == 0) {
                load.innerText = ".";
                loadCheck = 1;
            } else if (loadCheck == 1) {
                load.innerText = "..";
                loadCheck = 2;
            } else {
                load.innerText = "...";
                loadCheck = 0;
            }
        }, 500);
        // Open modal
        if (addUserBtn && addUserModal) {
            addUserBtn.addEventListener('click', function() {
                addUserModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                document.addEventListener("keydown", async function(event) {
                    if (send != true) {
                        if (event.key === "Shift") {
                            if (create == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#first").innerText =
                                            'Enter Firstname : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="last" class="text-green-600">Enter Lastname</p>`
                                        );
                                        chose = 'last';
                                        first = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'last') {
                                        document.querySelector("#last").innerText =
                                            'Enter Lastname : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="role" class="text-green-600">Enter Role : <br>1. STUDENT<br>2. TEACHER<br>3. ADMIN</p>`
                                        );
                                        chose = 'role';
                                        last = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'role') {
                                        if (cmd.value == 1) {
                                            document.querySelector("#role").innerText =
                                                'Enter Role : STUDENT';
                                            role = 'student';
                                        } else if (cmd.value == 2) {
                                            document.querySelector("#role").innerText =
                                                'Enter Role : TEACHER';
                                            role = 'teacher';
                                        } else if (cmd.value == 3) {
                                            document.querySelector("#role").innerText =
                                                'Enter Role : ADMIN';
                                            role = 'admin';
                                        }
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="email" class="text-green-600">Enter Email</p>`
                                        );
                                        chose = 'email';
                                        cmd.value = '';
                                    } else if (chose == 'email') {
                                        document.querySelector("#email").innerText =
                                            'Enter Email : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="password" class="text-green-600">Enter Password : `
                                        );
                                        chose = 'password';
                                        email = cmd.value;
                                        cmd.value = '';
                                        cmd.type = 'password';
                                    } else if (chose == 'password') {
                                        document.querySelector("#password").innerText =
                                            'Enter Password : 1010001111110000101111111010101';
                                        chose = 'done';
                                        password = cmd.value;
                                        cmd.value = '';
                                        cmd.type = 'text';
                                        send = true;
                                        checkSend = await addUser(first, last, role, email,
                                            password);
                                        if (checkSend == 'done') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">The users has added successfully !</p>`
                                            );
                                            location.reload();
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">${checkSend}</p>`
                                            );
                                            send = false;
                                            create = false;
                                            chose = '';
                                        }
                                    }
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command</p>`
                                    );
                                }
                            } else if (stop == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#userid").innerText =
                                            'Enter userId : ' + cmd.value;
                                        load.style.display = 'flex';
                                        send = true;
                                        checkSend = await findUser(cmd.value);
                                        id = cmd.value;
                                        cmd.value = '';
                                        load.style.display = 'none';
                                        if (checkSend != 'false') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">${checkSend}</p>
                                                <p class="text-red-200">If you sure you want to stop this account type "saj"</p>`
                                            );
                                            send = false;
                                            chose = 'stop';
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">There is no user whit this id</p>`
                                            );
                                            send = false;
                                            stop = false;
                                            chose = '';
                                        }
                                    } else {
                                        if (cmd.value == 'saj') {
                                            load.style.display = 'flex';
                                            send = true;
                                            checkSend = await stopUser(id);
                                            if (checkSend == 'done') {
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-green-200">The users has SAJED successfully !</p>`
                                                );
                                                location.reload();
                                            }
                                        }
                                    }
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command</p>`
                                    );
                                }
                            } else if (on == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#userid").innerText =
                                            'Enter userId : ' + cmd.value;
                                        load.style.display = 'flex';
                                        send = true;
                                        checkSend = await findUser(cmd.value);
                                        id = cmd.value;
                                        cmd.value = '';
                                        load.style.display = 'none';
                                        if (checkSend != 'false') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">${checkSend}</p>
                                                <p class="text-red-200">If you sure you want to active this account type "on"</p>`
                                            );
                                            send = false;
                                            chose = 'on';
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">There is no user whit this id</p>`
                                            );
                                            send = false;
                                            on = false;
                                            chose = '';
                                        }
                                    } else {
                                        if (cmd.value == 'on') {
                                            load.style.display = 'flex';
                                            send = true;
                                            checkSend = await onUser(id);
                                            if (checkSend == 'done') {
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-green-200">The users has actived successfully !</p>`
                                                );
                                                location.reload();
                                            }
                                        }
                                    }
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command</p>`
                                    );
                                }
                            } else if (switching == true) {
                                if (cmd.value == '1') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">GO TO HOME</p>`
                                    );
                                    location.href = "http://localhost:8000/"
                                    send = true;
                                } else if (cmd.value == '2') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">GO TO SPRINTS</p>`
                                    );
                                    location.href = "{{ route('sprint') }}"
                                    send = true;
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command</p>`
                                    );
                                }
                            }
                        } else if (event.key === "Enter" && create == false && stop == false && switching == false && on == false) {
                            if (chose == '') {
                                if (cmd.value == 'hyk create new user') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="first" class="text-green-600">Enter Firstname</p>`
                                    );
                                    create = true;
                                } else if (cmd.value == 'hyk do saj user') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="userid" class="text-green-600">Enter userId</p>`
                                    );
                                    cmd.value = '';
                                    stop = true;
                                } else if (cmd.value == 'hyk remove saj user') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="userid" class="text-green-600">Enter userId</p>`
                                    );
                                    cmd.value = '';
                                    on = true;
                                } else if (cmd.value == 'hyk go to') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">1. HOME</p>
                                    <p class="text-green-600">2. SPRINTS</p>
                                    <p class="text-green-600">3. COMPETANCES</p>`
                                    );
                                    switching = true;
                                } else if (cmd.value == 'hyk logout') {
                                    location.href = "http://localhost:8000/logout"
                                    send = true;
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command</p>`
                                    );
                                }
                                cmd.value = '';
                            }
                        }
                    } else {
                        checkmod.insertAdjacentHTML("beforeend",
                            `<p class="text-red-600">We are working here abnadem tesana chewiya (°~°)</p>`
                        );
                    }
                });
                // Add system console message
                addConsoleLog('User creation interface activated', 'yellow');
                addConsoleLog('Preparing registration protocol...', 'green');

            });
        }

        // Close modal functions
        function closeModal() {
            addUserModal.classList.add('hidden');
            document.body.style.overflow = 'auto';

            // Add system console message
            addConsoleLog('User creation interface closed', 'yellow');
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        // Close modal on overlay click
        addUserModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    });

    // Helper function for console logs (assumes this exists from main page)
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
</script>
