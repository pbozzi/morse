<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

    <title>-- --- .-. ... . / -.-. --- -.. .</title>
  </head>
  <body>
    <section id="cover">
        <div id="cover-caption">
            <div id="container" class="container">
                <div class="row text-white">
                    <div class="col-sm-6 offset-sm-3 text-center">
                        <h1 class="display-5">Morse Code</h1>
                        <h1 class="display-5">-- --- .-. ... . / -.-. --- -.. .</h1>
                        <br>
                        <div class="info-form">
                            <form action="" class="form-inlin justify-content-center" id="form">
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="Type morse code or text here.." id="txt1" onkeyup="updateText(this.value)" autofocus>
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="reset" id="btnClear">Clear</button>
                                  </div>
                                </div>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="txt2" readonly="">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="btnCopy" onclick="copyText()">Copy</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
  </body>
</html>