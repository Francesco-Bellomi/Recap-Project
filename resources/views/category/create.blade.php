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
        <div class="row justify-content-evenly align-items-center text-center fs-3">
            <div class="col-12 text-center">
                <h1 class="b-red py-5 title">Inserisci Categoria</h1>
            </div>
            <div class="col-12 col-sm-8 col-lg-4">
                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="exampleInputname" class="form-label">Nome Categoria</label>
                        <input type="text" name="name" class="form-control" id="exampleInputname"
                            value="{{ old('name') }}">
                    </div>
                    <div class="my-3">
                        <label for="exampleInputPassword1" class="form-label">Img</label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="my-3 ">
                        <label class="form-label">Inserisci descrizione</label>
                        <textarea name="description" cols="32" class="form-control"
                            rows="5">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn bg-red fs-4">Submitta tutto</button>
                </form>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 my-5">
                <img src="/img/contattaci.jpg" class="img-fluid rounded-circle border-img" alt="">
            </div>
        </div>
    </div>
</x-layout>
