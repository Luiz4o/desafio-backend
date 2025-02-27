<div>
    <div class="px-4 py-8 mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-8">
        @foreach ($filmes as $film)
            <a href="{{ route('see', ['id' =>$film->id]) }}" class="relative w-full aspect-video bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ asset('storage/' . $film->cover) }}')">
                <div
                    class="absolute flex items-end p-4 top-0 left-0 w-full h-full bg-gradient-to-t from-black to-black/20">
                    <div>
                        <h1 class="text-2xl font-bold">
                            {{ $film->title }}
                        </h1>
                        <h2 class="font-medium">
                            {{ $film->summary }}
                        </h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="flex justify-center space-x-2 mt-4">
        @php
            $start = max($filmes->currentPage() - 2, 1);
            $end = min($start + 4, $filmes->lastPage());
        @endphp

        @for ($i = $start; $i <= $end; $i++)
            <button wire:click="goToPageNumber({{ $i }})"
                class="px-3 py-2 {{ $filmes->currentPage() == $i ? 'bg-red-500 text-white' : 'bg-black-200' }}">
                {{ $i }}
            </button>
        @endfor

    </div>
</div>
