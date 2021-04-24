<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-evenly align-items-center">
            <div class="col-12 text-center">
                <h2 class="my-5"><a
                        href="{{ route('article.auth', ['auth' => $article->user->id]) }}">{{ $article->user->name }}</a>
                </h2>
                <h1 class="title">Articolo : {{ $article->name }}</h1>
            </div>
            <div class="col-12 col-sm-6 col-md-4 my-5  rounded-3">

                @if ($article->img)
                    <img src="{{ Storage::url($article->img) }}" class="img-fluid border-img rounded-3"
                        alt="Card image cap">
                @else
                    <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                @endif
            </div>
            <p></p>
            
            <div class="col-12 col-sm-8 col-lg-6 py-5 text-center">


                <h4>Articolo disponibile in <span class="tc-red">{{ count($article->colors) }}</span> colori :</h4>
                <ul class="list-unstyled">
                    @foreach ($article->colors as $color)
                        <li>{{ $color->name }}</li>
                    @endforeach
                </ul>




                @if ($article->user->id == Auth::id())

                    <form method="POST" action="{{ route('article.colors', compact('article')) }}">
                        @csrf
                        <select name="color[]" multiple class="form-control">
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success my-3" type="submit">Aggiungi Colore</button>
                    </form>
                @endif

                @if (count($article->elements) > 0)
                
                <h4>Articolo disponibile in <span class="tc-red">
                        @foreach ($article->elements as $element)
                            {{ $element->name }}
                        @endforeach
                    </span> Pezzi </h4>
                @else

                <h4> Articolo non disponibile</h4>

                @endif


                @if ($article->user->id == Auth::id())

                    <form method="POST" action="{{ route('article.elements', compact('article')) }}">
                        @csrf
                        <select name="element" class="form-control">
                            <option value="">zero</option>
                            @foreach ($elements as $element)
                                <option value="{{ $element->id }}">{{ $element->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success my-3" type="submit">Aggiungi Disponibilità</button>
                    </form>
                @endif


            </div>
            <div class="col-12 col-sm-8 col-lg-6 py-5 text-center">

                <h5 class=" ">Nome Articolo : <span class="tc-red">{{ $article->name }}</span></h5>
                <p class="">Descrizione : {{ $article->description }}</p>
                <p class="">Prezzo : {{ $article->price }} €</p>
                <p>Articolo inserito il : <span class="tc-red">{{ $article->created_at->format('d/m/y') }}</span></p>
                @if (count($article->categories) > 0)
                    <p>Questo Articolo fa parte della categoria :</p>
                    <ul class="list-unstyled">
                        @foreach ($article->categories as $category)
                            <a href="{{ route('category.show', compact('category')) }}">
                                <li>{{ $category->name }}</li>
                            </a>
                        @endforeach
                    </ul>
                @endif

                <a href="{{ route('article.index') }}" class="btn btn-primary">Torna Indietro</a>

                @if ($article->user->id == Auth::id())
                    <a href="{{ route('article.edit', compact('article')) }}" class="btn btn-primary">Modifica</a>
                    <p></p>
                    <form method="POST" action="{{ route('article.destroy', compact('article')) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Cancella</button>
                    </form>
                @endif

            </div>

        </div>
    </div>
</x-layout>
