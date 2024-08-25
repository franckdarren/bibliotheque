<div class="mt-[50px] w-full md:px-[10%]">
    <div class="shadow-md sm:rounded-lg w-full px-5 pb-5">
        <div class="pb-4 bg-white">
            <label for="table-search" class="sr-only">Recherche</label>
            <div class="relative mt-1 ">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search" wire:model.live="search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                    placeholder="Faire une recherche">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-blue-900 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Thématique
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date parution
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Auteur(s)
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ouvrages as $ouvrage)
                    <tr class="bg-white border-b  hover:bg-gray-100 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $ouvrage->titre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $ouvrage->thematique }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ouvrage->type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ouvrage->date_parution }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $ouvrage->auteur }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $ouvrages->links() }}
        </div>
    </div>
</div>
