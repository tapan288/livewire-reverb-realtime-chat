<div>
    <!-- Messages Received -->
    <div class="flex w-5/6 flex-col gap-2 lg:w-2/3 xl:w-1/3 items-start">
        <p class="text-sm font-medium text-slate-500">
            {{ $message->user->name }}
        </p>
        <div class="rounded-2xl px-5 py-3 rounded-br-none bg-gray-100">
            <p class="font-semibold text-slate-600">
                {{ $message->body }}
            </p>
        </div>
        <p class="text-xs font-medium text-slate-500">
            {{ $message->created_at->format('H:i a') }}
        </p>
    </div>
    <!-- END  Messages Received -->

    <!-- Messages Sent -->
    {{-- <div class="flex w-5/6 flex-col gap-2 lg:w-2/3 xl:w-1/3 items-end ms-auto">
        <div class="rounded-2xl px-5 py-3 rounded-tl-none bg-indigo-600">
            <p class="font-semibold text-white">
                Message Content
            </p>
        </div>
        <p class="text-xs font-medium text-slate-500 text-right">
            16:25 am
        </p>
    </div> --}}
    <!-- END Messages Sent -->
</div>
