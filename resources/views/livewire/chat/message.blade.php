<div>
    <!-- Messages Received -->
    <div @class([
        'flex w-5/6 flex-col gap-2 lg:w-2/3 xl:w-1/3',
        'items-start' => $message->user_id !== auth()->id(),
        'items-end ms-auto' => $message->user_id === auth()->id(),
    ])>
        @if ($message->user_id != auth()->id())
            <p class="text-sm font-medium text-slate-500">
                {{ $message->user->name }}
            </p>
        @endif
        <div @class([
            'rounded-2xl px-5 py-3',
            'bg-indigo-600 text-white rounded-br-none' =>
                $message->user_id == auth()->id(),
            'bg-gray-100 rounded-tl-none' => $message->user_id != auth()->id(),
        ])>
            <p @class([
                'font-semibold',
                'text-white' => $message->user_id == auth()->id(),
                'text-slate-500' => $message->user_id != auth()->id(),
            ])>
                {{ $message->body }}
            </p>
        </div>
        <p class="text-xs font-medium text-slate-500">
            {{ $message->created_at_human }}
        </p>
    </div>
    <!-- END  Messages Received -->
</div>
