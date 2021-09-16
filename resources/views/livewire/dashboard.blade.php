<main class="flex items-center p-10 w-full h-full bg-white">
    <div class="flex flex-wrap gap-6">
        @foreach ($medicines as $medicine)
            <livewire:medicine-component :medicine="$medicine" />
        @endforeach
    </div>
</main>
