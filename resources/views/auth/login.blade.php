<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center py-5">
                <h1 class="title">
                    Fai il Log-in
                </h1>
            </div>
            <div class="col-12 col-md-4 py-5 mb-5">
                <form method="POST" action="{{ 'login' }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Inserisci Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Log-in</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
