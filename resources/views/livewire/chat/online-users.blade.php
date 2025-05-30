<div class="grow space-y-2 ps-4 pt-2">
    @foreach ($this->users as $user)
        <a href="javascript:void(0)"
            class="flex items-center gap-3 border-indigo-500 bg-white px-3 py-4 shadow-sm ltr:rounded-l ltr:border-l-4 rtl:rounded-r rtl:border-r-4">
            <div class="relative flex-none">
                <img src="{{ $user->avatar() }}" alt="User Avatar"
                    class="h-11 w-11 rounded-full border-2 border-white/50" />
                <span
                    class="absolute bottom-0 end-0 h-3 w-3 rounded-full border-2 border-white bg-emerald-500 shadow-sm"></span>
            </div>
            <div class="grow">
                <p class="mb-0.5 line-clamp-1 text-sm font-bold">
                    {{ $user->name }}
                </p>
                <p class="line-clamp-1 text-xs font-medium text-slate-500">
                    {{ $user->email }}
                </p>
            </div>
            <div class="flex-none self-start">
                <p class="text-xs font-medium text-slate-400">
                    Now
                </p>
                <svg @class([
                    'size-4 animate-bounce transition-opacity opacity-0',
                    'opacity-100' => in_array($user->id, $typingIds),
                ])" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </div>
        </a>
    @endforeach
</div>
