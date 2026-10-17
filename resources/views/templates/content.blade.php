<header class="hero">
    <div class="wrap hero-inner">
        @if ($portfolio->photo_url)
            <img class="photo" src="{{ $portfolio->photo_url }}" alt="{{ $portfolio->name }}">
        @else
            <div class="photo initials">{{ mb_strtoupper(mb_substr($portfolio->name, 0, 1)) }}</div>
        @endif
        <div>
            <h1>{{ $portfolio->name }}</h1>
            @if ($portfolio->title)<p class="role">{{ $portfolio->title }}</p>@endif
            @if ($portfolio->location)<p class="loc">{{ $portfolio->location }}</p>@endif
            @if ($portfolio->email)<a class="cta" href="mailto:{{ $portfolio->email }}">Contact me</a>@endif
        </div>
    </div>
</header>

<main class="wrap">
    @if ($portfolio->bio)
        <section>
            <h2>About</h2>
            <p class="bio">{{ $portfolio->bio }}</p>
        </section>
    @endif

    @if ($skills->count())
        <section>
            <h2>Skills</h2>
            @foreach ($skills as $category => $list)
                <div class="group">
                    <h3>{{ $category }}</h3>
                    <div class="tags">
                        @foreach ($list as $skill)
                            <span class="tag">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    @if ($projects->count())
        <section>
            <h2>Projects</h2>
            <div class="cards">
                @foreach ($projects as $project)
                    <article class="pcard">
                        <h3>{{ $project->title }}</h3>
                        @if ($project->description)<p>{{ $project->description }}</p>@endif
                        @if ($project->tech)
                            <div class="tags">
                                @foreach (array_filter(array_map('trim', explode(',', $project->tech))) as $tech)
                                    <span class="tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                        @endif
                        @if ($project->link)
                            <a class="more" href="{{ $project->link }}" target="_blank" rel="noopener">View project &rarr;</a>
                        @endif
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    @if ($education->count())
        <section>
            <h2>Education</h2>
            <div class="timeline">
                @foreach ($education as $entry)
                    <div class="entry">
                        <h3>{{ $entry->degree }}</h3>
                        <div>{{ $entry->school }}</div>
                        @if ($entry->years)<small>{{ $entry->years }}</small>@endif
                        @if ($entry->details)<p class="bio">{{ $entry->details }}</p>@endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif
</main>

<footer class="foot">Built with Portfolio</footer>