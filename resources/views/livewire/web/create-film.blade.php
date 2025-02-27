<div>
    <div class="max-w-screen-lg mx-auto px-4 py-8">
        <form wire:submit.prevent="store" class="w-full px-4 py-8 bg-zinc-100 text-zinc-950 rounded-lg space-y-4">
            <h1 class="text-2xl font-bold text-center font-film">
                Cadastrar Filme
            </h1>

            @if (session()->has('message'))
                <div class="alert alert-success text-green-500">
                    {{ session('message') }}
                </div>
            @endif

            <div class="flex flex-col gap-2 !mt-8">
                <label for="title" class="font-semibold">
                    Título
                </label>
                <input type="text" id="title" class="rounded-lg border border-zinc-950 p-2" wire:model="title">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="summary" class="font-semibold">
                    Resumo
                </label>
                <textarea id="summary" rows="6" class="rounded-lg border border-zinc-950 p-2" wire:model="summary"></textarea>
                @error('summary') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="cover" class="font-semibold">
                    Capa
                </label>
                <input type="file" wire:model="cover" id="cover" class="rounded-lg border border-zinc-950 p-2" accept="image/*">
                @error('cover') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="bg-red-600 text-zinc-100 w-full font-mono font-semibold text-center px-4 py-2 rounded-lg">
                Enviar
            </button>
        </form>
    </div>
</div>
