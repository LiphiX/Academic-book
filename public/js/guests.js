document.addEventListener('DOMContentLoaded', () => {
    const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    let guestId;

    const studentModalElement = document.getElementById("studentModal");
    const studentModal = new bootstrap.Modal(studentModalElement);
    let studentForm = document.getElementById("studentForm");

    const teacherModalElement = document.getElementById("teacherModal");
    const teacherModal = new bootstrap.Modal(teacherModalElement);
    let teacherForm = document.getElementById('teacherForm');

    document.querySelectorAll('.student').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            guestId = $(event.target).parent().parent().attr('data-id');

            const data = await loadUser();

            studentForm[0].value = data.surname;
            studentForm[1].value = data.name;
            studentForm[2].value = data.patronymic;

            guestId = $(event.target).parent().parent().attr('data-id');


            studentModal.show()
        });
    });

    studentForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        studentModal.hide();

        const select = document.getElementById('selectGroup');

        const groupId = select.options[select.selectedIndex].getAttribute('data-group-id');


        const formData = new FormData(studentForm);
        formData.append('groupId', groupId);


        await fetch(`/users/saveAsStudent/${guestId}`, {
            method: 'POST',
            credentials: 'include',
            headers: {'X-CSRF-TOKEN': `${csrf_token}`},
            body: formData
        });
    });

    document.querySelectorAll('.teacher').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            guestId = $(event.target).parent().parent().attr('data-id');

            const data = await loadUser();

            teacherForm[0].value = data.surname;
            teacherForm[1].value = data.name;
            teacherForm[2].value = data.patronymic;

            guestId = $(event.target).parent().parent().attr('data-id');

            teacherModal.show()
        });
    });

    teacherForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        teacherModal.hide();

        const select = document.getElementById('selectFaculty');
        const facultyId = select.options[select.selectedIndex].getAttribute('data-faculty-id');

        const formData = new FormData(teacherForm);
        formData.append('facultyId', facultyId);


        await fetch(`/users/saveAsTeacher/${guestId}`, {
            method: 'POST',
            credentials: 'include',
            headers: {'X-CSRF-TOKEN': `${csrf_token}`},
            body: formData
        });
    })

    async function loadUser(){

        const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
        const fetchData= await fetch(`/users/loadUser?id=${guestId}`, {
            method: "GET",
            credentials: "include",
            headers: {'X-CSRF-TOKEN': `${csrf_token}`}
        });

        return await fetchData.json();
    }
});
