<x-layout>
    <div class="container pb-5">
        <div class="row justify-content-evenly text-center align-items-center py-5">
            <div class="col-12 text-center py-5">
                <h1 class="border-bottom-red py-5 border-top-red title">CONTATTACI</h1>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 fs-3">
                <form method="POST" action="{{route('contact.submit')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nome Utente</label>
                        <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Chiedici quello che vuoi</label>
                        <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea> 
                      </div>
                      <button type="submit" class="btn bg-red fs-4">Invia Messaggio</button>
                  </form>
            </div>
            <div class="col-12 col-sm-8 col-lg-4 my-5">
              <img src="/img/contattaci.jpg" class="img-fluid rounded-circle border-img" alt="">
            </div>
        </div>
    </div>
</x-layout>