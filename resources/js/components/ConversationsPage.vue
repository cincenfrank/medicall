<template>
  <div class="p-1 p-md-3 p-lg-5">
    <h2 class="mb-4">Messaggi Ricevuti</h2>
    <div class="list-group">
      <a
        :href="`/dashboard/conversations/${conversation.id}`"
        v-for="conversation in conversations"
        :key="conversation.id"
        class="list-group-item list-group-item-action mb-3 custom-shadow rounded"
      >
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ conversation.patient_name }}</h5>
          <small class="text-muted">{{ getParsedDate(conversation) }}</small>
        </div>
        <p class="mb-1">{{ conversation.content.substring(0, 200) }}...</p>
        <small class="text-muted">{{ conversation.patient_email }}</small>
      </a>
    </div>
  </div>
</template>

<script>
import dayjs from 'dayjs'

export default {
  name: "ConversationsPage",
  props: {
    // ti passiamo una variabile dall´esterno di tipo stringa
    loggedUserId: String,
    conversationsProp: String,
  },
  data() {
    return { conversations: [] };
  },
  methods: {
    // un avolta ricevuti i dati dall´URL,(then) i dati vengono salvati nella resp e dopo salvami i dati nella variabile conversations creata sopra
    // getDoctorMessages() {
    //   window.axios
    //     .get("/api/messages/doctor/" + this.loggedUserId)
    //     .then((resp) => {
    //       this.conversations = resp.data;
    //     });
    // },
    getParsedDate(conversation) {
      return dayjs(conversation.created_at).format('DD/MM/YYYY, HH:mm')
    }
  },

  mounted() {
    //this.getDoctorMessages();
    this.conversations = JSON.parse(this.conversationsProp);
  },
};
</script>

<style lang="scss" scoped>
</style>

