<x-layout>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <h1 class="title py-5">Le Nostre Categorie</h1>
            </div>
            @foreach ($categories as $category)
                <div class="col-12 col-md-3 my-5">
                    <div class="card bg-transparent tc-white">
                    @if ($category->img)
                        <img src="{{ Storage::url($category->img) }}"
                            class="card-img-top img-fluid bg-light border-img rounded-3" alt="Card image cap">
                    @else
                        <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                    @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <a href="{{ route('category.show', compact('category')) }}"
                                class="btn btn-primary my-3">Dettagli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
