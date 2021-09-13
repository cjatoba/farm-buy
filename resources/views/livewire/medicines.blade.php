<main class="flex items-center p-10 w-full h-full bg-white">
    <div class="flex flex-wrap gap-4">
        @foreach ($medicines as $medicine)
        <div class="bg-green-300 rounded-lg grid justify-items-center p-4 flex-auto">
            <img class="w-48 h-48 object-cover rounded-full" src='https://images.unsplash.com/photo-1512069772995-ec65ed45afd6?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fG1lZGljaW5lfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60' alt='nike shoes' >
            <h1 class="capitalize text-4xl font-extrabold mt-4">{{ $medicine->name }}</h1>
            <h2 class="text-3xl">{{ 'R$ ' . str_replace('.',',',$medicine->price) }}</h2>
            <p class="text-lg">{{ 'Laboratório: ' . $medicine->laboratory }}</p>
            <p class="text-lg">{{ 'Substância ativa: ' . $medicine->milligram . 'mg' }}</p>
            <select name="count" id="count" class="rounded-full bg-green-300 mt-4">
                <option value="">Selecione a quantidade</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <button class="bg-blue-600 px-5 py-3 text-white rounded-lg text-center my-4">Comprar</button>
        </div>
        @endforeach
    </div>
</main>
