<template>
  <div class="auth-container">
    <h1>sono il login register container</h1>
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: "LoginRegisterContainer",
};
</script>

<style lang="scss" scoped>
.auth-container {
  background-color: red;
}
</style>

