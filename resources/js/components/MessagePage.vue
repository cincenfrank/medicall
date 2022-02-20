<template>
  <div class="d-flex flex-column h-100">
    <div class="chat-container flex-grow-1 p-5">
      <div class="message-bubble">
        {{ message.content }}
      </div>
    </div>
    <div class="d-flex border border-top p-2">
      <input
        type="text"
        class="form-control"
        name=""
        id=""
        aria-describedby="helpId"
        placeholder="Rispondi al paziente"
      />
      <div class="btn btn-secondary ms-2">Invia</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MessagePage",
  props: {
    doctorId: String,
  },
  data() {
    return { message: {} };
  },
  methods: {
    getSingleMessage() {
      // creato una costante che ci da l´URL della pagina
      const url = window.location.href;
      // abbiamo splittato in array ogni parametro dopo lo slash e abbiamo presp l´ultimo elemnto (pop)
      const messageId = url.split("/").pop();

      // abbiamo fatto la chiamata AXIOS all´url che abbiamo creato in api.php
      //
      window.axios
        .get(`/api/message/${messageId}/doctor/${this.doctorId}`)
        .then((resp) => {
          this.message = resp.data[0];
        });
    },
  },

  mounted() {
    this.getSingleMessage();
  },
};
</script>

<style lang="scss" scoped>
.message-bubble {
  background-color: #12286a;
  padding: 20px;
  color: white;
  border-radius: 20px;
  //   border-bottom-left-radius: -20px;
  width: 75%;
}
</style>

