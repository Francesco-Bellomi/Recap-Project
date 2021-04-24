<x-layout>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 text-center">
                <h1 class="title">I Nostri Articoli</h1>
            </div>
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 my-5">
                    <div class="card bg-transparent tc-white">
                    @if ($article->img)
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top img-fluid bg-light border-img rounded-3" alt="Card image cap">
                    @else
                        <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                    @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <a href="{{ route('article.show', compact('article')) }}"
                                class="btn btn-primary my-3">Dettagli</a>
                            <h5 class="card-text">{{ $article->price }} €</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
