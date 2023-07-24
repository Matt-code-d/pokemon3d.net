<div class="overflow-hidden shadow sm:rounded-lg dark:bg-black" x-cloak>
    <div wire:init="loadData">
        <div x-data="{ activeDex:'0', dexes: [
                { id: '0', label: 'Johto Pokédex' },
                { id: 'pokedex_unown', label: 'Unown Pokédex' },
                { id: 'pokedex_kanto', label: 'Kanto Pokédex' },
                { id: 'pokedex_sevii', label: 'Sevii Pokédex' },
                { id: 'pokedex_national', label: 'National Pokédex' },
            ]}">
            <ul class="flex items-center w-full my-4 overflow-auto">
                <template x-for="(dex, dex.id) in dexes" :key="dex.id">
                    <li class="px-4 py-2 text-gray-500 border-b-2 cursor-pointer dark:border-gray-800" :class="activeDex===dex.id ? 'text-green-500 border-green-500 dark:border-green-500' : ''" @click="activeDex = dex.id" x-text="dex.label"></li>
                </template>
            </ul>
            <div class="flex w-full dark:text-slate-50">
                @foreach($pokedexes as $pokedex)
                    <div x-show="activeDex==='{{ $pokedex->slug }}'" class="w-full">
                        <p>{{ count($dex[$pokedex->slug]['entries']) }}</p>
                        @forelse($dex[$pokedex->slug]['entries'] as $pokemon)
                            <x-profile.user-detail title="#{{ $pokemon['id'] }} - {!! $pokemon['name'] !!}">
                                @if($pokemon['seen'])
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 inline-block">
                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                @endif
                                @if($pokemon['caught'])
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" fill="currentColor" class="w-6 h-6 inline-block text-red-500"><path d="M512 85.333333C747.52 85.333333 938.666667 276.48 938.666667 512 938.666667 747.52 747.52 938.666667 512 938.666667 276.48 938.666667 85.333333 747.52 85.333333 512 85.333333 276.48 276.48 85.333333 512 85.333333M512 170.666667C337.92 170.666667 194.133333 300.8 173.226667 469.333333L346.88 469.333333C365.653333 395.52 432.64 341.333333 512 341.333333 591.36 341.333333 658.346667 395.52 677.12 469.333333L850.773333 469.333333C829.866667 300.8 686.08 170.666667 512 170.666667M512 853.333333C686.08 853.333333 829.866667 723.2 850.773333 554.666667L677.12 554.666667C658.346667 628.48 591.36 682.666667 512 682.666667 432.64 682.666667 365.653333 628.48 346.88 554.666667L173.226667 554.666667C194.133333 723.2 337.92 853.333333 512 853.333333M512 426.666667C465.066667 426.666667 426.666667 465.066667 426.666667 512 426.666667 558.933333 465.066667 597.333333 512 597.333333 558.933333 597.333333 597.333333 558.933333 597.333333 512 597.333333 465.066667 558.933333 426.666667 512 426.666667Z"/></svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" fill="currentColor" class="w-6 h-6 inline-block"><path d="M512 85.333333C747.52 85.333333 938.666667 276.48 938.666667 512 938.666667 747.52 747.52 938.666667 512 938.666667 276.48 938.666667 85.333333 747.52 85.333333 512 85.333333 276.48 276.48 85.333333 512 85.333333M512 170.666667C337.92 170.666667 194.133333 300.8 173.226667 469.333333L346.88 469.333333C365.653333 395.52 432.64 341.333333 512 341.333333 591.36 341.333333 658.346667 395.52 677.12 469.333333L850.773333 469.333333C829.866667 300.8 686.08 170.666667 512 170.666667M512 853.333333C686.08 853.333333 829.866667 723.2 850.773333 554.666667L677.12 554.666667C658.346667 628.48 591.36 682.666667 512 682.666667 432.64 682.666667 365.653333 628.48 346.88 554.666667L173.226667 554.666667C194.133333 723.2 337.92 853.333333 512 853.333333M512 426.666667C465.066667 426.666667 426.666667 465.066667 426.666667 512 426.666667 558.933333 465.066667 597.333333 512 597.333333 558.933333 597.333333 597.333333 558.933333 597.333333 512 597.333333 465.066667 558.933333 426.666667 512 426.666667Z"/></svg>
                                @endif
                            </x-profile.user-detail>
                        @empty
                            <span wire:loading.remove>{{ trans('Nothing found') }}</span>
                        @endforelse
                    </div>
                @endforeach
            </div>
        </div>
        <script type="text/javascript">
             window.onscroll = function(ev) {
                 if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    window.livewire.emit('loadMorePokedex');
                }
             };
        </script>
    </div>
    <div wire:loading>
        <svg role="status" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-green-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
    </div>
</div>
