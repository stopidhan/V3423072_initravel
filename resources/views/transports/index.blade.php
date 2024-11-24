<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-100">Data Transport</h2>
        </div>

        <!-- Card Section -->
        <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 border-b border-gray-700">
                <div class="flex justify-between items-center">
                    <h5 class="text-xl font-semibold text-gray-100">Transport List</h5>
                    <a href="{{ route('transports.create') }}"
                        class="px-4 py-2 bg-emerald-600 text-white rounded-lg hover:bg-emerald-700 transition-colors duration-200">
                        + Add Transport
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Nama Transport
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Tipe
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Harga Per Hari
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse ($transports as $transport)
                            <tr class="hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                    {{ $transport->nama_transportation }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                    {{ $transport->tipe_transportation }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-200">
                                    Rp {{ number_format($transport->biaya, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('transports.destroy', $transport->id) }}" method="POST"
                                        class="flex space-x-2">
                                        <a href="{{ route('transports.edit', $transport->id) }}"
                                            class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-200">
                                            Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center">
                                    <div class="bg-red-900 text-red-200 p-4 rounded-lg">
                                        Data Transport belum Tersedia.
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
