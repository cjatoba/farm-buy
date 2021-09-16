<button
    class="inline-flex space-x-2 align-items-center align-content-center"
    id="buttonmodal">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <small class="bg-green-400 rounded-full h-5 w-5 flex items-center justify-center text-center">
        {{ $count }}
    </small>
</button>

<div id="modal"
    class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-blue-500 bg-opacity-50 transform scale-0 transition-transform duration-300">
    <!-- Modal content -->
    <div class="bg-white w-2/2 h-2/2 p-12">
        <!--Close modal button-->
        <button id="closebutton" type="button" class="focus:outline-none">
            <!-- Hero icon - close button -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
        <table class="table-auto border-4 text-center w-full">
            <thead>
                <tr class="border-2">
                    <th>Medicamento</th>
                    <th>Substância ativa</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr class="border-4">
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->milligram . 'mg' }}</td>
                        <td>{{ 'R$ ' . $item->price }}</td>
                        <td>{{ $item->count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="mt-5"><strong>Total: R$ {{ $total }}</strong></h1>
        <label for="payment">Forma de Pagamento</label>
        <select name="payment" id="payment">
            <option value="">Dinheiro</option>
            <option value="">Cartão de Débito</option>
            <option value="">Cartão de Crédito</option>
        </select>
        <button class="bg-blue-600 px-5 py-3 text-white rounded-lg text-center my-4 inline-flex">Finalizar Compra</button>
    </div>
</div>


<script>
    const button = document.getElementById('buttonmodal')
    const closebutton = document.getElementById('closebutton')
    const modal = document.getElementById('modal')

    button.addEventListener('click',()=>modal.classList.add('scale-100'))
    closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'))
</script>
