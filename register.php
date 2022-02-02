<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="assets/owl-carousel/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/owl-carousel/assets/owl.theme.default.min.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/owl-carousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="assets/css/style.css" />

    <title>Polibatam Career</title>
  </head>
  <body>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
          margin: 4,
          items: 2,
          loop: true,
        });
      });
    </script>
    <!-- navbar 
    <nav class="navbar navbar-expand-lg navbar-light py-3">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img
            width="190"
            height="45"
            src="assets/logo/logopolcar.png"
            alt=""
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link text-semibold text-blue"
                aria-current="page"
                href="#"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-semibold text-blue" href="#"
                >Our Partner</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-semibold text-blue" href="#">Career</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-semibold text-blue" href="#"
                >Contact Us</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-semibold text-blue" href="#">FAQ</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li> 
            <li class="nav-item">
              <a
                class="nav-link disabled"
                href="#"
                tabindex="-1"
                aria-disabled="true"
                >Disabled</a
              >
            </li>
          </ul>
          <div class="d-flex">
            <button
              class="btn btn-outline-blue shadow-sm px-5"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
            >
              Login
            </button>
          </div>
        </div>
      </div>
    </nav>
    end navbar -->

    <section class="">
      <div class="px-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col">
            <div class="card card-registration my-4" style="border-style: none">
              <div class="row g-0">
                <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <img src="assets/logo/logopolcar.png" alt="" />
                    <h3 class="text-blue text-bold mt-4 mb-4">Sign Up</h3>

                    <form action="">
                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1m"
                              >First name</label
                            >
                            <input
                              type="text"
                              id="form3Example1m"
                              class="form-control form-control-lg"
                            />
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <label class="form-label" for="form3Example1n"
                              >Last name</label
                            >
                            <input
                              type="text"
                              id="form3Example1n"
                              class="form-control form-control-lg"
                            />
                          </div>
                        </div>
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8"
                          >No. KTP/NIM</label
                        >
                        <input
                          type="text"
                          id="form3Example8"
                          class="form-control form-control-lg"
                        />
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8"
                          >Email</label
                        >
                        <input
                          type="text"
                          id="form3Example8"
                          class="form-control form-control-lg"
                        />
                      </div>

                      <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example8"
                          >No. HP</label
                        >
                        <input
                          type="text"
                          id="form3Example8"
                          class="form-control form-control-lg"
                        />
                      </div>

                      <div class="form-check mt-5">
                        <input
                          type="checkbox"
                          class="form-check-input"
                          id="exampleCheck1"
                        />
                        <label class="form-check-label" for="exampleCheck1"
                          >Saya menyetujui setiap
                          <a href="" class="text-blue"
                            ><b>ketentuan dan persyaratan yang berlaku</b></a
                          >
                        </label>
                      </div>

                      <div class="pt-3 mb-3" style="margin-top: -5px">
                        <button
                          type="button"
                          class="btn btn-primary btn-lg ms-2 text-white text-bold"
                          style="width: 100%"
                        >
                          Daftar
                        </button>
                      </div>
                    </form>
                    <center><a href="index.html">kembali ke beranda</a></center>
                  </div>
                </div>
                <div class="col-xl-6 d-none d-xl-block">
                  <img
                    src="assets/images/herono.png"
                    alt="Sample photo"
                    class="img-fluid h-100"
                    style="
                      border-top-left-radius: 0.25rem;
                      border-bottom-left-radius: 0.25rem;
                    "
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
