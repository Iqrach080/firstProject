<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Student
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto bg-white p-6 shadow rounded">

            <form action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $student->name }}"
                        class="w-64 border rounded p-2">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $student->email }}"
                        class="w-64 border rounded p-2">
                </div>

                <!-- Age -->
                <div class="mb-4">
                    <label>Age</label>
                    <input type="number" name="age" value="{{ $student->age }}"
                        class="w-64 border rounded p-2">
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label>Gender</label>
                    <select name="gender" class="w-64 border rounded p-2">
                        <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <x-primary-button>
                    Update Student
                </x-primary-button>

            </form>

        </div>
    </div>
</x-app-layout>