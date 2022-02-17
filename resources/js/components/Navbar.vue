<template>
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">
      
      MEDICALL
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Chi Siamo</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contatti</a>
        </li> <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Servizi</a>
        </li> <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">I Nostri Medici</a>
        </li>
      </ul>
       
    </div>
    <button type="button" class="btn btn-primary">
      Login
    </button>
  </div>
</nav> -->
  <div>
    <img class="navbar-image" src="/img/logo_large.png" alt="logo-medicall" />
    <nav>
      <ul class="menu mb-0 ps-0">
        <li><a href="">Chi Siamo</a></li>
        <li><a href="">Servizi</a></li>
        <li><a href="">Contatti</a></li>
      </ul>
    </nav>
    <button>Accedi</button>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.menu,
a,
button {
  font-family: "Courier New", Courier, monospace;
  font-weight: 300;
  font-size: 14px;
  color: grey;
  text-decoration: none;
}
div {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 30px 10px;

  button {
    background: #0d94a6;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    padding: 9px 25px;
    color: black;
  }
}
.menu {
  list-style: none;

  a:hover {
    color: #39f;
  }

  li {
    display: inline;
    padding: 0 15px;
  }

  button {
    background: #0d94a6;
    border: none;
    border-radius: 50%;
    cursor: pointer;
  }
}
.navbar-image {
  width: 200px;
}
</style>