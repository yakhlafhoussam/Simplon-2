@extends('layout.main')

@section('title', 'Classes Management | Anonymous')

<!-- Classes Management Main Content -->
<main class="bg-transparent flex-1 p-2">
    <!-- Classes Management Page -->
    <div id="classes-page" class="space-y-6">
        <!-- Page Header -->
        <div class="terminal p-4 md:p-5">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-4">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold hacker-green glow">[ CLASSES DATABASE ]</h2>
                    <div class="text-sm hacker-yellow mt-1">Secure class administration interface</div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-sm text-red-600 mt-1">{{ $error }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="flex space-x-3 mt-4 md:mt-0">
                    <button id="add-class-btn" class="hacker-button px-4 py-2">
                        <i class="fas fa-terminal mr-2"></i>TERMINAL
                    </button>
                </div>
            </div>
        </div>

        <!-- Classes Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-green mb-1">TOTAL CLASSES</div>
                        <div class="text-2xl font-bold hacker-green">{{ count($classes) }}</div>
                    </div>
                    <i class="fas fa-server hacker-green text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill" style="width: 100%"></div>
                </div>
            </div>

            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-yellow mb-1">ACTIVE CLASSES</div>
                        <div class="text-2xl font-bold hacker-yellow">{{ count($activeClasses) }}</div>
                    </div>
                    <i class="fas fa-bolt hacker-yellow text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill bg-hacker-yellow" style="width: 90%"></div>
                </div>
            </div>

            <div class="terminal p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <div class="text-sm hacker-green mb-1">TOTAL STUDENTS</div>
                        <div class="text-2xl font-bold hacker-green">{{ count($totalStudents) }}</div>
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
                        <div class="text-sm hacker-yellow mb-1">AVG PER CLASS</div>
                        <div class="text-2xl font-bold hacker-yellow">50</div>
                    </div>
                    <i class="fas fa-chart-bar hacker-yellow text-xl"></i>
                </div>
                <div class="progress-bar mt-2">
                    <div class="progress-fill bg-hacker-yellow" style="width: 50%"></div>
                </div>
            </div>
        </div>

        <!-- Classes Table -->
        <div class="terminal p-0">
            <div class="p-4 md:p-5 border-b border-hacker-green bg-black/50">
                <div class="flex items-center">
                    <i class="fas fa-server hacker-green mr-3"></i>
                    <h3 class="font-bold hacker-green">[ CLASS RECORDS ]</h3>
                </div>
            </div>

            <div class="max-h-[600px] overflow-y-scroll">
                <table class="hacker-table min-w-full">
                    <thead>
                        <tr>
                            <th class="w-12">ID</th>
                            <th>CLASS NAME</th>
                            <th class="hidden md:table-cell">TEACHER</th>
                            <th>STUDENTS</th>
                            <th>STATUS</th>
                            <th class="hidden lg:table-cell">CREATED</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td class="hacker-green font-mono">{{ $class->id }}</td>
                                <td>
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 border border-hacker-green flex items-center justify-center mr-3">
                                            <i class="fas fa-laptop-code hacker-green text-sm"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $class->name }}</div>
                                            <div class="text-xs hacker-yellow">{{ $class->description }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden md:table-cell hacker-green">
                                    @if ($class->teacher)
                                        <span
                                            class="text-green-500">{{ $class->teacher->first . ' ' . $class->teacher->last }}</span>
                                    @else
                                        <span class="text-red-500">UNASSIGNED</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="hacker-yellow">{{ count($class->student) }}</span>
                                </td>
                                <td>
                                    <span class="flex items-center">
                                        @if ($class->teacher)
                                            <span class="status-dot online mr-2"></span>
                                            <span class="hacker-green">ACTIVE</span>
                                        @else
                                            <span class="status-dot offline mr-2"></span>
                                            <span class="hacker-red">INACTIVE</span>
                                        @endif
                                    </span>
                                </td>
                                <td class="hidden lg:table-cell hacker-yellow text-sm">
                                    {{ $class->created_at->format('Y-m-d') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Class Modal -->
        <div id="add-class-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <!-- Overlay -->
                <div class="fixed inset-0 bg-black/80"></div>

                <!-- Modal Content -->
                <div class="relative w-full max-w-4xl">
                    <div class="terminal p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <h3 class="text-xl font-bold hacker-green">[ ANONYMOUS TERMINAL ]</h3>
                                <div class="text-sm hacker-yellow mt-1">Secure class management protocol</div>
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
    // Classes Management Script
    function addClass(name, year, teacher_id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/classes', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(
                `name=${name}&id=${teacher_id}&school_year=${year}`
            );
        });
    }

    function updateClass(name, id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/classes/update', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(
                `name=${name}&id=${id}`
            );
        });
    }

    function deleteClass(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/classes/delete', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    function findClass(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/classes/find', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    function findTeacher(id) {
        return new Promise((resolve) => {
            let xr = new XMLHttpRequest();
            xr.onreadystatechange = function() {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        resolve(this.responseText);
                    }
                }
            };
            xr.open('POST', '/teachers/find', true);
            xr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xr.setRequestHeader(
                "X-CSRF-TOKEN",
                document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            );
            xr.send(`id=${id}`);
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const addClassBtn = document.getElementById('add-class-btn');
        const addClassModal = document.getElementById('add-class-modal');
        const closeModalBtn = document.getElementById('close-modal');
        const editClassBtns = document.querySelectorAll('.edit-class-btn');
        const deleteClassBtns = document.querySelectorAll('.delete-class-btn');
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
        let year = '';
        let teacher_id = '';
        let max_students = '';
        let status = '';

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
        if (addClassBtn && addClassModal) {
            addClassBtn.addEventListener('click', function() {
                addClassModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                document.addEventListener("keydown", async function(event) {
                    if (send != true) {
                        if (event.key === "Shift") {
                            if (create == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#name").innerText =
                                            'Enter Class Name : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="year" class="text-green-600">Enter School year</p>`
                                        );
                                        chose = 'year';
                                        name = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'year') {
                                        document.querySelector("#year").innerText =
                                            'Enter School year : ' + cmd.value;
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p id="teacher" class="text-green-600">Enter teacher ID</p>`
                                        );
                                        chose = 'teacher';
                                        year = cmd.value;
                                        cmd.value = '';
                                    } else if (chose == 'teacher') {
                                        if (cmd.value.toLowerCase() === 'skip') {
                                            document.querySelector("#teacher").innerText =
                                                'Enter Teacher ID : UNASSIGNED';
                                            teacher_id = null;
                                        } else {
                                            document.querySelector("#teacher").innerText =
                                                'Enter Teacher ID : ' + cmd.value;
                                            teacher_id = cmd.value;
                                        }
                                        chose = 'done';
                                        cmd.value = '';
                                        send = true;
                                        checkSend = await addClass(name, year,
                                            teacher_id);
                                        if (checkSend == 'done') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">Class created successfully !</p>`
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
                                    } else {
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p class="text-red-600">Invalid command</p>`
                                        );
                                    }

                                }
                            } else if (edit == true) {
                                if (cmd.value != '') {
                                    if (chose == '') {
                                        document.querySelector("#classid").innerText =
                                            'Enter Class ID : ' + cmd.value;
                                        load.style.display = 'flex';
                                        send = true;
                                        checkSend = await findClass(cmd.value);
                                        id = cmd.value;
                                        cmd.value = '';
                                        load.style.display = 'none';
                                        if (checkSend != 'false') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">${checkSend}</p>
                                                <p id="edit_name" class="text-green-600">Enter new Teacher id</p>`
                                            );
                                            send = false;
                                            chose = 'edit_name';
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">Class not found</p>`
                                            );
                                            send = false;
                                            edit = false;
                                            chose = '';
                                        }
                                    } else if (chose == 'edit_name') {
                                        name = cmd.value;
                                        if (name) {
                                            cmd.value = '';
                                            send = true;
                                            checkSend = await updateClass(name, id);
                                            if (checkSend == 'done') {
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-green-200">Class updated successfully !</p>`
                                                );
                                                location.reload();
                                            } else {
                                                checkmod.innerHTML = '';
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-red-600">${checkSend}</p>`
                                                );
                                                send = false;
                                                edit = false;
                                                chose = '';
                                            }
                                        } else {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">Please give the id bela besala</p>`
                                            );
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
                                        document.querySelector("#delete_classid")
                                            .innerText =
                                            'Enter Class ID : ' + cmd.value;
                                        load.style.display = 'flex';
                                        send = true;
                                        checkSend = await findClass(cmd.value);
                                        id = cmd.value;
                                        cmd.value = '';
                                        load.style.display = 'none';
                                        if (checkSend != 'false') {
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-green-200">${checkSend}</p>
                                                <p class="text-red-200">Type "CONFIRM_DELETE" to delete this class</p>`
                                            );
                                            send = false;
                                            chose = 'confirm_delete';
                                        } else {
                                            checkmod.innerHTML = '';
                                            checkmod.insertAdjacentHTML("beforeend",
                                                `<p class="text-red-600">Class not found</p>`
                                            );
                                            send = false;
                                            deleteMode = false;
                                            chose = '';
                                        }
                                    } else if (chose == 'confirm_delete') {
                                        if (cmd.value === 'CONFIRM_DELETE') {
                                            load.style.display = 'flex';
                                            send = true;
                                            checkSend = await deleteClass(id);
                                            if (checkSend == 'done') {
                                                checkmod.insertAdjacentHTML("beforeend",
                                                    `<p class="text-green-200">Class deleted successfully !</p>`
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
                                        `<p class="text-green-600">GO TO USERS</p>`
                                    );
                                    location.href = "{{ route('users') }}"
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
                                if (cmd.value == 'hyk create new class') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="name" class="text-green-600">Enter Class Name</p>`
                                    );
                                    create = true;
                                } else if (cmd.value == 'hyk edit class') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="classid" class="text-green-600">Enter Class ID to edit</p>`
                                    );
                                    cmd.value = '';
                                    edit = true;
                                } else if (cmd.value == 'hyk delete class') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p id="delete_classid" class="text-green-600">Enter Class ID to delete</p>`
                                    );
                                    cmd.value = '';
                                    deleteMode = true;
                                } else if (cmd.value == 'hyk list classes') {
                                    load.style.display = 'flex';
                                    send = true;
                                    setTimeout(() => {
                                        load.style.display = 'none';
                                        checkmod.insertAdjacentHTML("beforeend",
                                            `<p class="text-green-600">Total Classes: {{ count($classes) }}</p>
                                            <p class="text-green-600">Active Classes: {{ count($activeClasses) }}</p>
                                            <p class="text-green-600">Total Students: {{ count($totalStudents) }}</p>`
                                        );
                                        send = false;
                                    }, 500);
                                } else if (cmd.value == 'hyk go to') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">1. HOME</p>
                                        <p class="text-green-600">2. USERS</p>
                                        <p class="text-green-600">3. SPRINTS</p>`
                                    );
                                    switching = true;
                                } else if (cmd.value == 'hyk logout') {
                                    location.href = "{{ route('logout') }}"
                                    send = true;
                                } else if (cmd.value == 'hyk help') {
                                    checkmod.insertAdjacentHTML("beforeend",
                                        `<p class="text-green-600">hyk create new class</p>
                                        <p class="text-green-600">hyk edit class</p>
                                        <p class="text-green-600">hyk delete class</p>
                                        <p class="text-green-600">hyk list classes</p>
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
            addClassModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }

        // Close modal on overlay click
        addClassModal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Edit class button handlers
        editClassBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const classId = this.getAttribute('data-id');
                checkmod.innerHTML = '';
                checkmod.insertAdjacentHTML("beforeend",
                    `<p class="text-green-600">Edit class ID: ${classId}</p>
                    <p class="text-yellow-600">Use terminal command: hyk edit class</p>`
                );
                cmd.focus();
            });
        });

        // Delete class button handlers
        deleteClassBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const classId = this.getAttribute('data-id');
                checkmod.innerHTML = '';
                checkmod.insertAdjacentHTML("beforeend",
                    `<p class="text-green-600">Delete class ID: ${classId}</p>
                    <p class="text-red-600">Use terminal command: hyk delete class</p>`
                );
                cmd.focus();
            });
        });
    });
</script>
