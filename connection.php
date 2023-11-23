<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body style="background-color: #567255  ">
    <section class="sec1">
    <div class="overlay" id="overlay"></div>
        <!-- Section: Design Block -->
        <section class="sec1">
            <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
                <div class="row gx-lg-5 align-items-center mb-5">
                    <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                        <h1 class="my-5 display-5 fw-bold ls-tight" style="color:  #3C873B">
                            The best offer <br />
                        </h1>
                        <p class="mb-4 opacity-70" style="color:aliceblue">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Temporibus, expedita iusto veniam atque, magni tempora mollitia
                            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
                            ab ipsum nisi dolorem modi. Quos?
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                        <div class="card bg-glass" style="width: 28vw;">
                            <div class="card-body px-4 py-5 px-md-5">
                                <form>
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example3" class="form-control" placeholder="Email address"/>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4" class="form-control" placeholder="Password"/>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-block mb-4" style="background-color: hsl(218, 81%, 85%);">
                                        Se connecter
                                    </button>
                                    <!-- inscription button -->
                                    <button type="button" class="btn mt-3" style="width: 14vw; background-color: #3C873B; color:aliceblue" onclick="openInscriptionModal()">
                                        S'inscrire
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->

        <!-- Inscription Modal -->
        <div class="modal" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inscriptionModalLabel">Inscription</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeInscriptionModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="popup" id="popup">
                        <form method="post" action="#">
                            <input type="radio" id="admin" name="userType" value="admin">
                            <label for="admin">Admin</label>

                            <input type="radio" id="client" name="userType" value="client">
                            <label for="client">Client</label>
                            <div class="d-flex ">
                                <!-- Nom input -->
                                <div class="form-outline mb-4 col-md-6">
                                    <input type="text" id="form3Example1" class="form-control" placeholder="Nom"/>
                                </div>
                                <!-- Prénom input -->
                                <div class="form-outline mb-4 col-md-6">
                                    <input type="text" id="form3Example2" class="form-control"  placeholder="Prénom"/>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4  d-flex justify-content-center">
                                <input type="email" id="form3Example3" class="form-control" style="width: 28.5vw;" placeholder="Email address"/>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4 d-flex justify-content-center">
                                <input type="password" id="form3Example4" class="form-control" style="width: 28.5vw;" placeholder="Password"/>
                            </div>

                            <!-- Submit button -->
                            <div class="form-outline mb-4  d-flex justify-content-center">
                                <button type="submit" class="btn btn-block mb-4 mt-2" style="background-color: #3C873B; color:aliceblue ;  width: 28.5vw;">
                                    S'inscrire
                                </button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inscription Modal -->

    </section>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
        function openInscriptionModal() {
            document.getElementById('inscriptionModal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function closeInscriptionModal() {
            document.getElementById('inscriptionModal').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>

</body>
</html>
