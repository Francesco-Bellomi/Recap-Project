<x-layout>
    <div class="container">
        <div class="row text-center ">
            <div class="col-12 my-5">
                <h1>Tutte le Categorie di <span class="tc-red">{{ $user->name }}</span></h1>
            </div>
            @foreach ($categories as $category)
                <div class="col-12 col-md-3 my-5">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    @if ($category->img)
                        <img src="{{ Storage::url($category->img) }}"
                            class="card-img-top img-fluid bg-light border-img rounded-3" alt="Card image cap">
                    @else
                        <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                    @endif
                    <button class="btn btn-danger"><a href="{{ route('category.index') }}">torna indietro</a></button>
                    <p></p>
                    <a href="{{ route('category.show', compact('category')) }}" class="btn btn-primary">Dettagli</a>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
