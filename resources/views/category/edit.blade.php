<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid py-5">
        <div class="row justify-content-evenly align-items-center">
            <div class="col-12 text-center">
                <h1 class="title">Modifica Categoria</h1>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 text-center fs-3">
                <form method="POST" action="{{ route('category.update', compact('category')) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="my-3">
                        <label for="exampleInputEmail1" class="form-label">Nome Utente</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                            value="{{ $category->name }}">
                    </div>
                    @if ($category->img)
                        <img src="{{ Storage::url($category->img) }}"
                            class="card-img-top img-fluid bg-light border-img rounded-3" alt="Card image cap">
                    @else
                        <img src="/img/default.jpg" class="img-fluid bg-light border-img rounded-3" alt="">
                    @endif
                    <div class="my-3">
                        <label for="exampleInputPassword1" class="form-label">Inserisci Img</label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="my-3">
                        <label class="form-label">Inserisci descrizione</label>
                        <textarea name="description" cols="36" class="form-control"
                            rows="5">{{ $category->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 my-5">
                <img src="/img/contattaci.jpg" class="img-fluid rounded-circle border-img" alt="">
            </div>
        </div>
    </div>
</x-layout>
