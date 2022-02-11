<template>
  <div class="login-register-page">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
          <LoginRegisterContainer>
            <slot></slot>
          </LoginRegisterContainer>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoginRegisterContainer from "./LoginRegisterContainer.vue";
export default {
  components: { LoginRegisterContainer },
  name: "LoginRegisterPage",
};
</script>

<style lang="scss" scoped>
.login-register-page {
  position: relative;
  background-color: rgba(0, 0, 0, 0.5);
  min-height: 70vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  &::after {
    position: absolute;
    z-index: -1;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("/img/bg-login.jpg");
    background-position: center;
    background-size: cover;
  }
}
</style>

