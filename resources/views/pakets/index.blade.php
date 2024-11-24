<x-app-layout>
    <!-- Header Section -->
    <div class="px-6 py-4 bg-gray-800 border-b border-gray-700">
        <h2 class="text-3xl font-semibold text-white">Data Paket</h2>
    </div>

    <!-- Stats Cards Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
        <!-- Total Hotels Card -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-6">
            <div class="flex flex-col">
                <h5 class="text-xl font-bold text-white mb-2">Total Hotels</h5>
                <p class="text-3xl font-bold text-white">{{ $totalHotels }}</p>
            </div>
        </div>

        <!-- Total Destinations Card -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-lg shadow-lg p-6">
            <div class="flex flex-col">
                <h5 class="text-xl font-bold text-white mb-2">Total Destinations</h5>
                <p class="text-3xl font-bold text-white">{{ $totalDestinations }}</p>
            </div>
        </div>

        <!-- Total Transports Card -->
        <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-lg shadow-lg p-6">
            <div class="flex flex-col">
                <h5 class="text-xl font-bold text-white mb-2">Total Transports</h5>
                <p class="text-3xl font-bold text-white">{{ $totalTransports }}</p>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="p-6">
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                <h5 class="text-xl font-semibold text-white">Paket List</h5>
                <a href="{{ route('pakets.create') }}"
                   class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition duration-200">
                    Add Paket
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Nama Paket</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Harga Total</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Destinasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Hotel</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Transport</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Rating</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Ulasan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Total Pembelian</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse ($pakets as $paket)
                            <tr class="hover:bg-gray-700 transition duration-200">
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->nama_paket }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->deskripsi }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">Rp {{ number_format($paket->harga_total, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->destination->nama_destinasi ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->hotel->nama_hotel ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->transportation->nama_transportation ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->rating }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->ulasan }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">{{ $paket->total_pembelian }}</td>
                                <td class="px-6 py-4 text-sm text-gray-200">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                          action="{{ route('pakets.destroy', $paket->id) }}" method="POST"
                                          class="flex space-x-2">
                                        <a href="{{ route('pakets.edit', $paket->id) }}"
                                           class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded transition duration-200">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="px-6 py-4 text-center">
                                    <div class="bg-red-500 text-white rounded-lg p-4">
                                        Data Paket belum Tersedia.
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
