<main class="flex items-center p-10 w-full h-full bg-white">
    <div class="flex flex-wrap gap-6">
        @foreach ($medicines as $medicine)
        <div class="bg-blue-300 rounded-lg grid justify-items-center p-4 flex-auto">
            <img class="w-48 h-48 object-cover rounded-full" src='https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60' alt='nike shoes' >
            <h1 class="capitalize text-4xl font-extrabold mt-4">{{ $medicine->name }}</h1>
            <h2 class="text-3xl">{{ 'R$ ' . str_replace('.',',',$medicine->price) }}</h2>
            <p class="text-lg">{{ 'Laboratório: ' . $medicine->laboratory }}</p>
            <p class="text-lg">{{ 'Substância ativa: ' . $medicine->milligram . 'mg' }}</p>
            <select name="count" id="count" class="rounded-full bg-blue-300 mt-4" wire:model="count">
                <option value="">Selecione a quantidade</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button
                id="add-to-cart"
                class="bg-blue-600 px-5 py-3 text-white rounded-lg text-center my-4 inline-flex"
                wire:click="addCart({{$medicine->id}})"
                onclick="showLoading(this)">
                Adicionar ao carrinho
            </button>
        </div>
        @endforeach
    </div>
</main>

<script>
    function showLoading(element) {
        element.classList.add('cursor-not-allowed');
        element.setAttribute('disabled', 'disabled');
        element.innerHTML = `<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>Adicionando...`
    }
</script>
