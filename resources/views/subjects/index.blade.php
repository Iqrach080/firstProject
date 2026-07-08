<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subjects - {{ $class->class_name }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-6">
                    Manage Subjects
                </h2>

                <!-- Add Subject Form -->
               <form action="{{ route('subjects.store', $class->id) }}" method="POST">
    @csrf
                    

                    <div class="mb-4">
                        <input
                            type="text"
                            name="subject_name"
                            placeholder="Enter Subject Name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            required>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button type="submit">
                            Add Subject
                        </x-primary-button>
                    </div>
                </form>

                <br>

                <!-- Subjects Table -->

                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Subject Name</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($subjects as $subject)
 <x-modal name="confirm-subject-deletion-{{ $subject->id }}" focusable>

    <form method="POST" action="{{ route('subjects.destroy', $subject->id) }}" class="p-6">

        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            Are you sure you want to delete this subject?
        </h2>

        <div class="mt-6 flex justify-end gap-3">

            <x-secondary-button x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>

            <x-danger-button type="submit">
                Delete
            </x-danger-button>

        </div>

    </form>

</x-modal>
                        <tr>
                            <td class="border px-4 py-2">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $subject->subject_name }}
                            </td>

                            <td class="border px-4 py-2">

                                <a href="{{ route('subjects.edit', $subject->id) }}"
                                   class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('subjects.destroy', $subject->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this subject?')">

                                    @csrf
                        
<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-subject-deletion-{{ $subject->id }}')">
    Delete
</x-danger-button>
                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center py-5">
                                No Subjects Found
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>