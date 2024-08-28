<main id="page-content" class="absolute inset-0">
    <!-- Page Content -->
    <div
        class="container mx-auto space-y-6 px-4 py-24 lg:p-8 lg:pb-28 xl:max-w-7xl flex flex-col-reverse space-y-reverse h-full overflow-y-auto">
        @foreach ($messages as $message)
            <livewire:chat.message :message="$message" :key="$message->id" />
        @endforeach
    </div>
    <!-- END Page Content -->
</main>
