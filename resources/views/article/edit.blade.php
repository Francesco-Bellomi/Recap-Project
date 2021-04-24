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
                <h1 class="title">Modifica Articolo</h1>
            </div>
            <div class="col-12 col-sm-8 col-lg-4">
                <form method="POST" action="{{route('article.update', compact('article'))}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="my-3">
                        <label  class="form-label">Nome Articolo</label>
                        <input type="text" name="name" class="form-control"  value="{{$article->name}}">
                    </div>
                    <div class="my-3">
                        <label for="" class="form-label">Seleziona Categoria Appartenente</label>
                        <select name="categories[]" multiple class="form-control" >
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="exampleInputEmail1" class="form-label">Prezzo Articolo in € </label>
                        <input type="number" name="price" class="form-control" id="exampleInputEmail1" value="{{$article->price}}">
                    </div>
                    <img src="{{Storage::url($article->img)}}" class="img-fluid" alt="">
                    <div class="my-3">
                        <label for="exampleInputPassword1" class="form-label">Inserisci Img</label>
                        <input type="file" name="img" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="my-3 ">
                        <label  class="form-label">Inserisci descrizione</label>
                        <textarea name="description" cols="32" class="form-control" rows="5">{{$article->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('article.show' , compact('article'))}}" class="btn btn-primary">TORNA INDIETRO</a>
                </form>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 my-5">
                <img src="/img/contattaci.jpg" class="img-fluid rounded-circle border-img" alt="">
            </div>
        </div>
    </div>
</x-layout>
