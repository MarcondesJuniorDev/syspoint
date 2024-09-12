<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ponto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/2 p-4">
                            <div class="bg-gray-200 dark:bg-gray-700 h-80 flex items-center justify-center">
                                <video autoplay></video>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 p-4">
                            <div class="mb-4">
                                <p>Último registro: DD/MM/AAAA às 12:34 PM</p>
                                <a href="#" class="text-blue-500 float-end">Últimos Registros</a>
                            </div>
                            <div class="mb-4">
                                <p>Localização atual:</p>
                                <input type="text" value="Endereço do ponto atual" disabled class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded w-full">
                                <a href="#" class="text-blue-500 float-end">Atualizar</a>
                            </div>
                            <div class="mb-4">
                                <p>Localização do último registro:</p>
                                <input type="text" value="Endereço do ultimo ponto" disabled class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded w-full">
                                <a href="#" class="text-blue-500 float-end">Atualizar</a>
                            </div>
                            <div class="mb-4 w-full text-center">
                                <button class="bg-green-500 hover:border-collapse px-4 py-2 rounded-full w-full">Bater Ponto</button>
                            </div>
                            <div class="mb-4">
                                <p>Endereço IP:</p>
                                <input type="text" value="IP do usuario" disabled class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded w-full">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        const video = document.querySelector('video');
        async function startVideo() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;
            } catch (error) {
                console.error('Erro ao acessar a câmera: ', error);
                alert('Erro ao acessar a câmera: ' + error.message);
            }
        }

        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            startVideo();
        } else {
            console.error('getUserMedia não é suportado neste navegador.');
            alert('Seu navegador não suporta a captura de vídeo.');
        }
    </script>
    @endpush
</x-app-layout>


