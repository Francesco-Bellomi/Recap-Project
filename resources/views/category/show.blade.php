<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-evenly">
            <div class="col-12 text-center">
                <h2 class="my-5"><a
                        href="{{ route('category.auth', ['auth' => $category->user->id]) }}">{{ $category->user->name }}</a>
                </h2>
                <h1 class="title">Categoria : {{ $category->name }}</h1>
            </div>
            <div class="col-12 col-md-6 col-xl-3 my-5">
                <div class="card  bg-transparent tc-white">
                    @if ($category->img)
                        <img src="{{ Storage::url($category->img) }}"
                            class="card-img-top img-fluid bg-light border-img rounded-3" alt="Card image cap">
                    @else
                        <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        @if (count($category->articles) > 0)
                            <h5>Tutti gli articoli di questa categoria :</h5>
                            <ul class="list-unstyled">
                                @foreach ($category->articles as $article)
                                    <a href="{{ route('article.show', compact('article')) }}">
                                        <li>{{ $article->name }}</li>
                                    </a>
                                @endforeach
                            </ul>
                        @endif
                        <a href="{{ route('category.index') }}" class="btn btn-primary">Torna Indietro</a>
                        @if ($category->user->id == Auth::id())
                            <a href="{{ route('category.edit', compact('category')) }}"
                                class="btn btn-primary">Modifica</a>
                            <form method="POST" action="{{ route('category.destroy', compact('category')) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Cancella</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
