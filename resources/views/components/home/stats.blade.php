@props(['stats'])

<section class="section-space">
    <div class="page-shell">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($stats as $stat)
                <x-common.stat-card :label="$stat['label']" :value="$stat['value']" :description="$stat['description']" />
            @endforeach
        </div>
    </div>
</section>