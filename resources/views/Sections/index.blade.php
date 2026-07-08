<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sections - {{ $class->class_name }}
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
                    Manage Sections
                </h2>

                <!-- Add Section Form -->
            <form action="{{ route('sections.store', $class->id) }}" method="POST">
    @csrf

    <div class="mb-4">
        <input
            type="text"
            name="section_name"
            placeholder="Enter Section Name"
            class="w-full border border-gray-300 rounded-lg px-4 py-2"
            required>
    </div>

    <div class="flex justify-end">
        <x-primary-button>
            Add Section
        </x-primary-button>
    </div>

</form>
<br>
                <!-- Sections Table -->

               <table class="w-full border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Section Name</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
    </thead>

    <tbody>

    @forelse($sections as $section)

    <tr>
        <td class="border px-4 py-2">
            {{ $loop->iteration }}
        </td>

        <td class="border px-4 py-2">
            {{ $section->section_name }}
        </td>

        <td class="border px-4 py-2">

            <a href="{{ route('sections.edit',$section->id) }}"
               class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
                Edit
            </a>

            <form action="{{ route('sections.destroy',$section->id) }}"
                  method="POST"
                  class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this section?')">

                @csrf
                @method('DELETE')

                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                    Delete
                </button>

            </form>

        </td>
    </tr>

    @empty

    <tr>
        <td colspan="3" class="text-center py-5">
            No Sections Found
        </td>
    </tr>

    @endforelse

    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>