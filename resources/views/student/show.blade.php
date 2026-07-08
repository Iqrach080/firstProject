<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            Student Details
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto bg-white shadow-xl rounded-xl p-8">

            <h3 class="text-xl font-semibold text-center text-blue-700 mb-8 border-b pb-3">
                Student Information
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Left Side -->
                <div class="space-y-5">

                    <div>
                        <label class="block font-semibold mb-1">Student Name</label>
                        <input type="text" value="{{ $student->name }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Father Name</label>
                        <input type="text" value="{{ $student->father_name }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Father CNIC</label>
                        <input type="text" value="{{ $student->father_cnic }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Class</label>
                        <input type="text" value="{{ $student->class }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Section</label>
                        <input type="text" value="{{ $student->section }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Student B-Form</label>
                        <input type="text" value="{{ $student->b_form }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                </div>

                <!-- Right Side -->
                <div class="space-y-5">

                    <div>
                        <label class="block font-semibold mb-1">Date of Birth</label>
                        <input type="text" value="{{ $student->date_of_birth }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Gender</label>
                        <input type="text" value="{{ $student->gender }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Email</label>
                        <input type="text" value="{{ $student->email }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Phone Number</label>
                        <input type="text" value="{{ $student->phone }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Teacher Incharge</label>
                        <input type="text" value="{{ $student->teacher_incharge }}" readonly
                            class="w-full border rounded-lg p-2 bg-gray-100">
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Address</label>
                        <textarea readonly rows="3"
                            class="w-full border rounded-lg p-2 bg-gray-100 resize-none">{{ $student->address }}</textarea>
                    </div>

                </div>

            </div>

            <!-- Back Button -->
            <div class="mt-8 text-center">
                <a href="{{ route('student.index') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded-lg shadow">
                    Back
                </a>
            </div>

        </div>
    </div>
</x-app-layout>