<div class="py-12">
    <form wire:submit.prevent="registrarPonto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/2 p-4">
                        <div class="bg-gray-200 dark:bg-gray-700 h-full flex items-center justify-center">
                            <video id="video" autoplay></video>
                            <canvas id="canvas" style="display: none;"></canvas>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 p-4">
                        <div class="mb-4 w-full text-center">
                            <button type="submit" onclick="capturarFoto()" class="bg-green-500 hover:border-collapse px-4 py-2 rounded-full w-full">Bater Ponto</button>
                        </div>
                        <div class="mb-4">
                            <p wire:model="dateHour">Último registro: DD/MM/AAAA às 12:34 PM</p>
                            <a href="#" class="text-blue-500 float-end">Últimos Registros</a>
                        </div>
                        <div class="mb-4">
                            <p>Localização atual:</p>
                            <input type="text" wire:model="now_localization" disabled class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded w-full">
                            <a href="#" class="text-blue-500 float-end">Atualizar</a>
                        </div>
                        <div class="mb-4">
                            <p>Localização do último registro:</p>
                            <input type="text" wire:model="last_localization" disabled class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded w-full">
                        </div>

                        <div class="mb-4">
                            <p>Endereço IP:</p>
                            <input type="text" wire:model="ip" value="IP do usuario" disabled class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 px-4 py-2 rounded w-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@push('scripts')
<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');

    async function startVideo() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true });
            video.srcObject = stream;
        } catch (error) {
            console.error('Erro ao acessar a câmera: ', error);
            alert('Erro ao acessar a câmera: ' + error.message);
        }
    }

    function capturarFoto() {
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataUrl = canvas.toDataURL('image/png');
        @this.set('image', dataUrl);
    }

    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        startVideo();
    } else {
        console.error('getUserMedia não é suportado neste navegador.');
        alert('Seu navegador não suporta a captura de vídeo.');
    }
</script>
@endpush


