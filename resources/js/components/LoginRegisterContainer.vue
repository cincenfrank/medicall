<template>
  <div class="authentication-card p-4">
    <img class="authentication-logo mb-2" src="/img/logo.svg" alt="" />
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "LoginRegisterContainer",
};
</script>

<style lang="scss" scoped>
.authentication-card {
  background-color: rgba(255, 255, 255, 0.568);
  border-radius: 20px;
  margin: 100px 0;
  position: relative;

  .authentication-logo {
    width: 100%;
  }
}
</style>

