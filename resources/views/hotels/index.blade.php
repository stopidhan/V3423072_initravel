<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white">Data Hotels</h2>
        </div>

        <!-- Card -->
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    <h5 class="text-xl font-semibold text-white">Hotels List</h5>
                    <a href="{{ route('hotels.create') }}"
                       class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors duration-200">
                        + Add Hotel
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-300">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-4">Name</th>
                            <th scope="col" class="px-6 py-4">Address</th>
                            <th scope="col" class="px-6 py-4">Price Per Night</th>
                            <th scope="col" class="px-6 py-4">Destination</th>
                            <th scope="col" class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hotels as $hotel)
                            <tr class="border-b border-gray-700 hover:bg-gray-700">
                                <td class="px-6 py-4">{{ $hotel->nama_hotel }}</td>
                                <td class="px-6 py-4">{{ $hotel->alamat }}</td>
                                <td class="px-6 py-4">{{ 'Rp ' . number_format($hotel->harga_per_malam, 2, ',', '.') }}</td>
                                <td class="px-6 py-4">{{ $hotel->destination->nama_destinasi ?? 'N/A' }}</td>
                                <td class="px-6 py-4">
                                    <form onsubmit="return confirm('Are you sure?');"
                                          action="{{ route('hotels.destroy', $hotel->id) }}"
                                          method="POST"
                                          class="inline-flex space-x-2">
                                        <a href="{{ route('hotels.edit', $hotel->id) }}"
                                           class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">
                                    <div class="bg-red-900/50 text-red-300 p-4 rounded-lg">
                                        No hotel data available.
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
