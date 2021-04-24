<x-layout>
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-12 my-5 text-center">
                <h1>Tutte gli articoli di <span class="tc-red">{{ $user->name }}</span></h1>
            </div>
            @foreach ($articles as $article)
            <div class="col-12 col-md-4 my-5 text-center">
                    @if ($article->img)
                        <img src="{{ Storage::url($article->img) }}" class="card-img-top img-fluid border-img rounded-3" alt="Card image cap">
                    @else
                        <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                    @endif
                    <h5 class="card-title my-3">{{ $article->name }}</h5>
                    <button class="btn btn-danger"><a href="{{ route('article.index') }}">torna indietro</a></button>
                    <p></p>
                    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary">Dettagli</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
