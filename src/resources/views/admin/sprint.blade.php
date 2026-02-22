@extends('layout.main')

@section('title', 'Sprints Management | Anonymous')

<!-- Sprints Management Main Content -->
<main class="bg-transparent flex-1 p-2">
    <!-- Sprints Management Page -->
    <div id="sprints-page" class="space-y-6">
        <!-- Page Header -->
        <div class="terminal p-4 md:p-5">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold hacker-green glow">[ SPRINTS DATABASE ]</h2>
                    <div class="text-sm hacker-yellow mt-1">Secure sprint administration interface</div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-sm text-red-600 mt-1">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="flex space-x-3 mt-4 md:mt-0">
                    <button id="add-sprint-btn" class="hacker-button px-4 py-2">
                        <i class="fas fa-terminal mr-2"></i>TERMINAL
                    </button>
                </div>
            </div>
        </div>

        <!-- Sprints Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-green mb-1">TOTAL SPRINTS</div>
                        <div class="text-2xl font-bold hacker-green">{{ count($sprints) }}</div>
                    </div>
                    <i class="fas fa-forward hacker-green text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill" style="width: 100%"></div>
                </div>
            </div>

            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-yellow mb-1">ACTIVE SPRINTS</div>
                        <div class="text-2xl font-bold hacker-yellow">{{ $activeSprints->name }}</div>
                    </div>
                    <i class="fas fa-bolt hacker-yellow text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Sprints Table -->
        <div class="terminal p-0">
            <div class="p-4 md:p-5 border-b border-hacker-green bg-black/50">
                <div class="flex items-center">
                    <i class="fas fa-forward hacker-green mr-3"></i>
                    <h3 class="font-bold hacker-green">[ SPRINT RECORDS ]</h3>
                </div>
            </div>

            <div class="max-h-[600px] overflow-y-scroll">
                <table class="hacker-table min-w-full">
                    <thead>
                        <tr>
                            <th class="w-12">ID</th>
                            <th>SPRINT NAME</th>
                            <th>START DATE</th>
                            <th>END DATE</th>
                            <th>DURATION</th>
                            <th>STATUS</th>
                            <th>PROGRESS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sprints as $sprint)
                            <tr>
                                <td class="hacker-green font-mono">{{ $sprint->id }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 border border-hacker-green flex items-center justify-center mr-3">
                                            <i class="fas fa-forward hacker-green text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $sprint->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="hacker-green">{{ \Carbon\Carbon::parse($sprint->start_date)->format('Y-m-d') }}</span>
                                </td>
                                <td>
                                    <span class="hacker-yellow">{{ \Carbon\Carbon::parse($sprint->end_date)->format('Y-m-d') }}</span>
                                </td>
                                <td>
                                    @php
                                        $start = \Carbon\Carbon::parse($sprint->start_date);
                                        $end = \Carbon\Carbon::parse($sprint->end_date);
                                        $duration = $start->diffInDays($end) + 1;
                                    @endphp
                                    <span class="hacker-green">{{ $duration }} days</span>
                                </td>
                                <td>
                                    <span class="flex items-center">
                                        @php
                                            $today = \Carbon\Carbon::now();
                                            $start = \Carbon\Carbon::parse($sprint->start_date);
                                            $end = \Carbon\Carbon::parse($sprint->end_date);
                                        @endphp
                                        
                                        @if($today < $start)
                                            <span class="status-dot bg-yellow-500 mr-2"></span>
                                            <span class="hacker-yellow">UPCOMING</span>
                                        @elseif($today > $end)
                                            <span class="status-dot offline mr-2"></span>
                                            <span class="hacker-red">COMPLETED</span>
                                        @else
                                            <span class="status-dot online mr-2"></span>
                                            <span class="hacker-green">ACTIVE</span>
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $today = \Carbon\Carbon::now();
                                        $start = \Carbon\Carbon::parse($sprint->start_date);
                                        $end = \Carbon\Carbon::parse($sprint->end_date);
                                        $totalDays = $start->diffInDays($end) + 1;
                                        
                                        if ($today < $start) {
                                            $progress = 0;
                                        } elseif ($today > $end) {
                                            $progress = 100;
                                        } else {
                                            $daysPassed = $start->diffInDays($today) + 1;
                                            $progress = round(($daysPassed / $totalDays) * 100);
                                        }
                                    @endphp
                                    <div class="w-24">
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: {{ $progress }}%"></div>
                                        </div>
                                        <div class="text-xs hacker-green text-right mt-1">{{ $progress }}%</div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Sprint Modal -->
        <div id="add-sprint-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-black/80"></div>

                <!-- Modal Content -->
                <div class="relative w-full max-w-4xl">
                    <div class="terminal p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-xl font-bold hacker-green">[ ANONYMOUS TERMINAL ]</h3>
                                <div class="text-sm hacker-yellow mt-1">Secure sprint management protocol</div>
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
    // Sprints Management Script
    function addSprint(name, start_date, end_date) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/sprint', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(
                `name=${name}&start_date=${start_date}&end_date=${end_date}`
            );
        });
    }

    function deleteSprint(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/sprints/delete', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    function findSprint(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/sprints/find', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const addSprintBtn = document.getElementById('add-sprint-btn');
        const addSprintModal = document.getElementById('add-sprint-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const editSprintBtns = document.querySelectorAll('.edit-sprint-btn');
        const deleteSprintBtns = document.querySelectorAll('.delete-sprint-btn');
        const load = document.getElementById('load');
        const cmd = document.getElementById('commend');
        const checkmod = document.getElementById('checkmod');
        let loadCheck = 0;
        let send = false;
        let checkSend = '';
        let chose = '';
        let create = false;
        let edit = false;
        let deleteMode = false;
        let switching = false;
        let id = 0;
        let name = '';
        let start_date = '';
        let end_date = '';

        // Loading animation
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
        if (addSprintBtn && addSprintModal) {
            addSprintBtn.addEventListener('click', function() {
                addSprintModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                document.addEventListener("keydown", async function(event) {
                    if (send != true) {
                        if (event.key === "Shift") {
                            if (create == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#name").innerText =
                                            'Enter Sprint Name : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="start_date" class="text-green-600">Enter Start Date (YYYY-MM-DD)</p>`
                                        );
                                        chose = 'start_date';
                                        name = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'start_date') {
                                        document.querySelector("#start_date").innerText =
                                            'Enter Start Date : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="end_date" class="text-green-600">Enter End Date (YYYY-MM-DD)</p>`
                                        );
                                        chose = 'end_date';
                                        start_date = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'end_date') {
                                        document.querySelector("#end_date").innerText =
                                            'Enter End Date : ' + cmd.value;
                                        chose = 'done';
                                        end_date = cmd.value;
                                        cmd.value = '';
                                        send = true;
                                        checkSend = await addSprint(name, start_date, end_date);
                                        if (checkSend == 'done') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">Sprint created successfully !</p>`
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
                            } else if (deleteMode == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#delete_sprintid")
                                            .innerText =
                                            'Enter Sprint ID : ' + cmd.value;
                                        load.style.display = 'flex';
                                        send = true;
                                        checkSend = await findSprint(cmd.value);
                                        id = cmd.value;
                                        cmd.value = '';
                                        load.style.display = 'none';
                                        if (checkSend != 'false') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">${checkSend}</p>
                                                <p class="text-red-200">Type "CONFIRM_DELETE" to delete this sprint</p>`
                                            );
                                            send = false;
                                            chose = 'confirm_delete';
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">Sprint not found</p>`
                                            );
                                            send = false;
                                            deleteMode = false;
                                            chose = '';
                                        }
                                    } else if (chose == 'confirm_delete') {
                                        if (cmd.value === 'CONFIRM_DELETE') {
                                            load.style.display = 'flex';
                                            send = true;
                                            checkSend = await deleteSprint(id);
                                            if (checkSend == 'done') {
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-green-200">Sprint deleted successfully !</p>`
                                                );
                                                location.reload();
                                            } else {
                                                checkmod.innerHTML = '';
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-red-600">${checkSend}</p>`
                                                );
                                            }
                                        } else {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">Deletion cancelled</p>`
                                            );
                                            send = false;
                                            deleteMode = false;
                                            chose = '';
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
                                        `<p class="text-green-600">Logout</p>`
                                    );
                                    location.href = "{{ url('/logout') }}"
                                    send = true;
                                } else if (cmd.value == '2') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">GO TO HOME</p>`
                                    );
                                    location.href = "{{ route('home') }}"
                                    send = true;
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command</p>`
                                    );
                                }
                            }
                        } else if (event.key === "Enter" && create == false && edit ==
                            false && deleteMode == false && switching == false) {
                            if (chose == '') {
                                if (cmd.value == 'hyk create new sprint') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="name" class="text-green-600">Enter Sprint Name</p>`
                                    );
                                    create = true;
                                } else if (cmd.value == 'hyk delete sprint') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="delete_sprintid" class="text-green-600">Enter Sprint ID to delete</p>`
                                    );
                                    cmd.value = '';
                                    deleteMode = true;
                                } else if (cmd.value == 'hyk list sprints') {
                                    load.style.display = 'flex';
                                    send = true;
                                    setTimeout(() => {
                                        load.style.display = 'none';
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p class="text-green-600">Total Sprints: {{ count($sprints) }}</p>
                                            <p class="text-green-600">Active Sprints: {{ $activeSprints->name }}</p>`
                                        );
                                        send = false;
                                    }, 500);
                                } else if (cmd.value == 'hyk go to') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">1. LOGOUT</p>
                                        <p class="text-green-600">2. Home</p>`
                                    );
                                    switching = true;
                                } else if (cmd.value == 'hyk logout') {
                                    location.href = "{{ route('logout') }}"
                                    send = true;
                                } else if (cmd.value == 'hyk help') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">hyk create new sprint</p>
                                        <p class="text-green-600">hyk edit sprint</p>
                                        <p class="text-green-600">hyk delete sprint</p>
                                        <p class="text-green-600">hyk list sprints</p>
                                        <p class="text-green-600">hyk go to</p>
                                        <p class="text-green-600">hyk logout</p>
                                        `
                                    );
                                } else {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-red-600">Invalid command. type "hyk help"</p>`
                                    );
                                }
                                cmd.value = '';
                            }
                        }
                    } else {
                        checkmod.insertAdjacentHTML("beforeend",
                            `<p class="text-red-600">Processing request...</p>`
                        );
                    }
                });
            });
        }

        // Close modal function
        function closeModal() {
            addSprintModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        // Close modal on overlay click
        addSprintModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Edit sprint button handlers
        editSprintBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const sprintId = this.getAttribute('data-id');
                checkmod.innerHTML = '';
                checkmod.insertAdjacentHTML("beforeend",
                    `<p class="text-green-600">Edit sprint ID: ${sprintId}</p>
                    <p class="text-yellow-600">Use terminal command: hyk edit sprint</p>`
                );
                cmd.focus();
            });
        });

        // Delete sprint button handlers
        deleteSprintBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const sprintId = this.getAttribute('data-id');
                checkmod.innerHTML = '';
                checkmod.insertAdjacentHTML("beforeend",
                    `<p class="text-green-600">Delete sprint ID: ${sprintId}</p>
                    <p class="text-red-600">Use terminal command: hyk delete sprint</p>`
                );
                cmd.focus();
            });
        });
    });
</script>