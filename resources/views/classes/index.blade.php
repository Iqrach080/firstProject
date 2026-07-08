<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes List') }}
        </h2>
    </x-slot>

   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <div class="bg-white shadow-sm sm:rounded-lg overflow-visible">

                <div class="flex justify-end p-6">
                   <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-class')">
                     Add New Class
                    </x-primary-button>
                </div>

                <div class="p-6">
                    <table class="w-3/4 mx-auto border border-gray-400 border-collapse text-center">

                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 px-4 py-2">Class Name</th>
                                <th class="border border-gray-400 px-4 py-2">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($classes as $class)
                            <tr>
                                

                                <td class="border border-gray-400 px-4 py-2">
                                    {{ $class->class_name }}
                                </td>

                                
                                <td class="border border-gray-400 px-4 py-2">
                                     <div class="flex justify-center">
        <x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center px-3 py-2 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-100">
            ⚙️ Settings
        </button>
    </x-slot>

    <x-slot name="content">

        <x-dropdown-link href="{{ route('classes.edit', $class->id) }}" >
            ✏️ Edit
        </x-dropdown-link>

        
        <x-dropdown-link
    href="#"
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-class-deletion-{{ $class->id }}')">
    🗑️ Delete
</x-dropdown-link>
        <x-dropdown-link href="{{ route('sections.index', $class->id) }}">
            📚 Sections
        </x-dropdown-link>

        <x-dropdown-link href="{{ route('subjects.index', $class->id) }}">
            📖 Subjects
        </x-dropdown-link>

    </x-slot>
</x-dropdown>
    </div>

</td>
                            </tr>
                            @endforeach
                            <x-modal name="confirm-class-deletion-{{ $class->id }}" focusable>

    <form method="POST"
          action="{{ route('classes.destroy', $class->id) }}"
          class="p-6">

        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">
            Are you sure you want to delete this class?
        </h2>

        <div class="mt-6 flex justify-end gap-3">

            <x-secondary-button
                x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>

            <x-danger-button type="submit">
                Delete
            </x-danger-button>

        </div>

    </form>

</x-modal>
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>
<x-modal name="add-class" focusable>

    <form method="POST" action="{{ route('classes.store') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-bold text-gray-900 mb-6">
            Add Class Data
        </h2>

        <div>
            <label class="block font-medium text-sm text-gray-700">
                Class Name
            </label>

            <input
                type="text"
                name="class_name"
                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm"
                placeholder="Enter Class Name"
                required>
        </div>

        <div class="mt-6 flex justify-end gap-3">

            <x-secondary-button
                x-on:click="$dispatch('close')">
                Close
            </x-secondary-button>

            <x-primary-button>
                Save Class
            </x-primary-button>

        </div>

    </form>

</x-modal>


   