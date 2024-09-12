<x-app-layout>
    <x-slot name="header">
        <h2 id="current-time" class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ponto') . ' - ' . date('d/m/Y H:i:s') }}
        </h2>
    </x-slot>

    @livewire('registrar-ponto')

    <script>
        function updateTime() {
            const now = new Date();
            const formattedTime = now.toLocaleString('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('current-time').innerText = `Ponto - ${formattedTime}`;
        }

        setInterval(updateTime, 1000);
        updateTime(); // Chama a função imediatamente para não esperar 1 segundo
    </script>
</x-app-layout>
