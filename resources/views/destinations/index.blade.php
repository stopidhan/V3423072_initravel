<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-white">Data Destinations</h2>
        </div>

        <!-- Card for Actions and Table -->
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    <h5 class="text-xl font-semibold text-white">Destinations List</h5>
                    <a href="{{ route('destinations.create') }}"
                       class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 rounded-lg text-white font-medium transition duration-150 ease-in-out">
                        Add Destination
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">HTM</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse ($destinations as $destination)
                            <tr class="hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('storage/destinations/' . $destination->image) }}"
                                         class="h-20 w-32 object-cover rounded-lg">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $destination->nama_destinasi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $destination->lokasi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ 'Rp ' . number_format($destination->htm, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form onsubmit="return confirm('Are you sure?');"
                                          action="{{ route('destinations.destroy', $destination->id) }}"
                                          method="POST" class="flex gap-2">
                                        <a href="{{ route('destinations.edit', $destination->id) }}"
                                           class="px-3 py-1 bg-blue-600 hover:bg-blue-700 rounded text-white text-sm">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-700 rounded text-white text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">
                                    <div class="bg-red-500/10 text-red-400 p-4 rounded-lg">
                                        No destinations available yet.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
