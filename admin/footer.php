</section>
<!-- Customs Js -->
<script src="./js/main.js"></script>
<script>
    // Add Student Modal
    const modal_student = document.getElementById('modal-student');
    const add_user = document.getElementById('add-user');
    const modal_close = document.getElementById('modal-close');
    modal(add_user, modal_student, modal_close);

    // Add Info Modal
    const modal_info = document.getElementById('modal-info');
    const exam_info = document.getElementById('exam-info');
    const modal_close_info = document.getElementById('modal-close-info');
    modal(exam_info, modal_info, modal_close_info);

</script>
</body>

</html>