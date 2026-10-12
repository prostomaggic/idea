<x-layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">Ideas</h1>
            <p class="text-muted-foreground text-sm mt-2"> Capture yor thoughts. Make a plan.</p>
        </header>
        <div>
            <a href="/ideas" class="btn {{ request('status') ? 'btn-outlined' : '' }}">All</a>
            @foreach (App\IdeaStatus::cases() as $status)
                <a href="/ideas?status={{ $status }}"
                    class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}">{{ $status->label() }}
                    <span class="text-xs pl-1">{{ $statusCounts->get($status->value) }}</span></a>
            @endforeach


        </div>
        <div class="mt-10">
            <div class="grid md:grid-cols-2 gap-6">
                @forelse ($ideas as $idea)
                    <a href="/ideas/{{ $idea->id }}"><x-card>
                            <div class="flex justify-between align-top">
                                <h3 class="text-foreground text-lg font-semibold">{{ $idea->title }}</h3>
                                <x-idea.status-label status="{{ $idea->status }}">
                                    {{ $idea->status->label() }}
                                </x-idea.status-label>

                            </div>

                            <span class="mt-4 font-thin text-sm">{{ $idea->created_at->diffForHumans() }}</span>
                            <p class="mt-5 line-clamp-2">{{ $idea->description }}</p>

                        </x-card></a>

                @empty
                    <x-card>
                        <p>No ideas created yet</p>
                    </x-card>
                @endforelse
            </div>

        </div>
    </div>
</x-layout>