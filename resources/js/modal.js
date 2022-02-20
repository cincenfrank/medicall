import Modal from "bootstrap/js/dist/modal";
document.addEventListener("DOMContentLoaded", function () {
    // document.getElementById('modal_review').style.display='block';
    let myModalReview = new Modal(document.getElementById("modal_review"));
    // myModal.show();
    window.modalReview = myModalReview;

    let myModalSuccess = new Modal(document.getElementById("modal_success"));
    // myModal.show();
    window.modalSuccess = myModalSuccess;

    let myMessageModal = new Modal(document.getElementById("contact_doctor"));
    // myModal.show();
    window.modalMessage = myMessageModal;
});
