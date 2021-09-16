<button
    class="inline-flex space-x-2 align-items-center align-content-center"
    id="buttonmodal"
    onclick="openModal('mymodalcentered')">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <small class="bg-green-400 rounded-full h-5 w-5 flex items-center justify-center text-center">
        {{ $count }}
    </small>
</button>

<dialog id="mymodalcentered" class="bg-transparent z-0 relative w-screen h-screen">
    <div class="p-7 flex justify-center items-center fixed left-0 top-0 w-full h-full bg-gray-900 bg-opacity-50 z-50 transition-opacity duration-300 opacity-0">
        <div class="bg-white flex rounded-lg w-1/2 relative">
            <div class="flex flex-col items-center">
                <div class="p-7 flex items-center w-full">
                    <div class="text-gray-900 font-bold text-lg">Carrinho de Compras</div>
                    <svg onclick="modalClose('mymodalcentered')" class="ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
                    </svg>
                </div>

                <div class="px-7 overflow-x-hidden overflow-y-auto" style="max-height: 40vh;">
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
                </div>

                <div class="p-7 w-full">
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
        </div>
    </div>
</dialog>

<script>
    function openModal(key) {
        document.getElementById(key).showModal();
        document.body.setAttribute('style', 'overflow: hidden;');
        document.getElementById(key).children[0].scrollTop = 0;
        document.getElementById(key).children[0].classList.remove('opacity-0');
        document.getElementById(key).children[0].classList.add('opacity-100')
    }

    function modalClose(key) {
        document.getElementById(key).children[0].classList.remove('opacity-100');
        document.getElementById(key).children[0].classList.add('opacity-0');
        setTimeout(function () {
            document.getElementById(key).close();
            document.body.removeAttribute('style');
        }, 100);
    }
</script>
