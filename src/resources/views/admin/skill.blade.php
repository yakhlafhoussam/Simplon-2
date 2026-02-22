@extends('layout.main')

@section('title', 'Competences Management | Anonymous')

<!-- Competences Management Main Content -->
<main class="bg-transparent flex-1 p-2">
    <!-- Competences Management Page -->
    <div id="competences-page" class="space-y-6">
        <!-- Page Header -->
        <div class="terminal p-4 md:p-5">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold hacker-green glow">[ COMPETENCES DATABASE ]</h2>
                    <div class="text-sm hacker-yellow mt-1">Secure competences administration interface</div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-sm text-red-600 mt-1">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="flex space-x-3 mt-4 md:mt-0">
                    <button id="add-competence-btn" class="hacker-button px-4 py-2">
                        <i class="fas fa-terminal mr-2"></i>TERMINAL
                    </button>
                </div>
            </div>
        </div>

        <!-- Competences Statistics -->
        <div class="grid grid-cols-1 gap-4">
            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-green mb-1">TOTAL COMPETENCES</div>
                        <div class="text-2xl font-bold hacker-green">{{ count($competences) }}</div>
                    </div>
                    <i class="fas fa-brain hacker-green text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill" style="width: 100%"></div>
                </div>
            </div>

        <!-- Competences Table -->
        <div class="terminal p-0">
            <div class="p-4 md:p-5 border-b border-hacker-green bg-black/50">
                <div class="flex items-center">
                    <i class="fas fa-brain hacker-green mr-3"></i>
                    <h3 class="font-bold hacker-green">[ COMPETENCE RECORDS ]</h3>
                </div>
            </div>

            <div class="max-h-[600px] overflow-y-scroll">
                <table class="hacker-table min-w-full">
                    <thead>
                        <tr>
                            <th class="w-12">ID</th>
                            <th>TITLE</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th class="hidden lg:table-cell">CREATED</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competences as $competence)
                            <tr>
                                <td class="hacker-green font-mono">{{ $competence->id }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 border border-hacker-green flex items-center justify-center mr-3">
                                            <i class="fas fa-code hacker-green text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $competence->title }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="hacker-yellow">{{ Str::limit($competence->desc, 50) }}</span>
                                </td>
                                <td>
                                    <span class="flex items-center">
                                        @if($competence->status == 1)
                                            <span class="status-dot online mr-2"></span>
                                            <span class="hacker-green">ACTIVE</span>
                                        @else
                                            <span class="status-dot offline mr-2"></span>
                                            <span class="hacker-red">INACTIVE</span>
                                        @endif
                                    </span>
                                </td>
                                <td class="hidden lg:table-cell hacker-yellow text-sm">
                                    {{ $competence->created_at->format('Y-m-d') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Competence Modal -->
        <div id="add-competence-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-black/80"></div>

                <!-- Modal Content -->
                <div class="relative w-full max-w-4xl">
                    <div class="terminal p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-xl font-bold hacker-green">[ ANONYMOUS TERMINAL ]</h3>
                                <div class="text-sm hacker-yellow mt-1">Secure competence management protocol</div>
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
    // Competences Management Script
    function addCompetence(title, desc) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/skill', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(
                `title=${title}&desc=${desc}`
            );
        });
    }

    function updateCompetence(title, desc, id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/competences/update', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(
                `title=${title}&desc=${desc}&id=${id}`
            );
        });
    }

    function deleteCompetence(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/skill/delete', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    function findCompetence(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/skill/find', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const addCompetenceBtn = document.getElementById('add-competence-btn');
        const addCompetenceModal = document.getElementById('add-competence-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const editCompetenceBtns = document.querySelectorAll('.edit-competence-btn');
        const deleteCompetenceBtns = document.querySelectorAll('.delete-competence-btn');
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
        let title = '';
        let desc = '';

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
        if (addCompetenceBtn && addCompetenceModal) {
            addCompetenceBtn.addEventListener('click', function() {
                addCompetenceModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                document.addEventListener("keydown", async function(event) {
                    if (send != true) {
                        if (event.key === "Shift") {
                            if (create == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#title").innerText =
                                            'Enter Competence Title : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="desc" class="text-green-600">Enter Description</p>`
                                        );
                                        chose = 'desc';
                                        title = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'desc') {
                                        document.querySelector("#desc").innerText =
                                            'Enter Description : ' + cmd.value;
                                        chose = 'done';
                                        desc = cmd.value;
                                        cmd.value = '';
                                        send = true;
                                        checkSend = await addCompetence(title, desc);
                                        if (checkSend == 'done') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">Competence created successfully !</p>`
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
                                        document.querySelector("#delete_competenceid")
                                            .innerText =
                                            'Enter Competence ID : ' + cmd.value;
                                        load.style.display = 'flex';
                                        send = true;
                                        checkSend = await findCompetence(cmd.value);
                                        id = cmd.value;
                                        cmd.value = '';
                                        load.style.display = 'none';
                                        if (checkSend != 'false') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">${checkSend}</p>
                                                <p class="text-red-200">Type "CONFIRM_DELETE" to delete this competence</p>`
                                            );
                                            send = false;
                                            chose = 'confirm_delete';
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">Competence not found</p>`
                                            );
                                            send = false;
                                            deleteMode = false;
                                            chose = '';
                                        }
                                    } else if (chose == 'confirm_delete') {
                                        if (cmd.value === 'CONFIRM_DELETE') {
                                            load.style.display = 'flex';
                                            send = true;
                                            checkSend = await deleteCompetence(id);
                                            if (checkSend == 'done') {
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-green-200">Competence deleted successfully !</p>`
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
                                        `<p class="text-green-600">GO TO CLASSES</p>`
                                    );
                                    location.href = "{{ route('home') }}"
                                    send = true;
                                } else if (cmd.value == '3') {
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
                        } else if (event.key === "Enter" && create == false && edit ==
                            false && deleteMode == false && switching == false) {
                            if (chose == '') {
                                if (cmd.value == 'hyk create new competence') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="title" class="text-green-600">Enter Competence Title</p>`
                                    );
                                    create = true;
                                } else if (cmd.value == 'hyk delete competence') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="delete_competenceid" class="text-green-600">Enter Competence ID to delete</p>`
                                    );
                                    cmd.value = '';
                                    deleteMode = true;
                                } else if (cmd.value == 'hyk list competences') {
                                    load.style.display = 'flex';
                                    send = true;
                                    setTimeout(() => {
                                        load.style.display = 'none';
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p class="text-green-600">Total Competences: {{ count($competences) }}</p>`
                                        );
                                        send = false;
                                    }, 500);
                                } else if (cmd.value == 'hyk go to') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">1. LOGOUT</p>
                                        <p class="text-green-600">2. CLASSES</p>
                                        <p class="text-green-600">3. SPRINTS</p>`
                                    );
                                    switching = true;
                                } else if (cmd.value == 'hyk logout') {
                                    location.href = "{{ route('logout') }}"
                                    send = true;
                                } else if (cmd.value == 'hyk help') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">hyk create new competence</p>
                                        <p class="text-green-600">hyk edit competence</p>
                                        <p class="text-green-600">hyk delete competence</p>
                                        <p class="text-green-600">hyk list competences</p>
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
            addCompetenceModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        // Close modal on overlay click
        addCompetenceModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Edit competence button handlers
        editCompetenceBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const competenceId = this.getAttribute('data-id');
                checkmod.innerHTML = '';
                checkmod.insertAdjacentHTML("beforeend",
                    `<p class="text-green-600">Edit competence ID: ${competenceId}</p>
                    <p class="text-yellow-600">Use terminal command: hyk edit competence</p>`
                );
                cmd.focus();
            });
        });

        // Delete competence button handlers
        deleteCompetenceBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const competenceId = this.getAttribute('data-id');
                checkmod.innerHTML = '';
                checkmod.insertAdjacentHTML("beforeend",
                    `<p class="text-green-600">Delete competence ID: ${competenceId}</p>
                    <p class="text-red-600">Use terminal command: hyk delete competence</p>`
                );
                cmd.focus();
            });
        });
    });
</script>