document.addEventListener('DOMContentLoaded', () => {
    const csrf_token = document.querySelector('meta[name="csrf-token"]').content;
    let guestId;

    const modalElement = document.getElementById("studentModal");
    const modal = new bootstrap.Modal(modalElement);
    studentForm = document.getElementById("studentForm");

    document.querySelectorAll('.student').forEach(btn => {
        btn.addEventListener('click', async (event) => {
            guestId = $(event.target).parent().parent().attr('data-id');

            const data = await loadUser();

            studentForm[0].value = data.surname;
            studentForm[1].value = data.surname;
            studentForm[2].value = data.surname;

            guestId = $(event.target).parent().parent().attr('data-id');


            modal.show()
        });
    });

    studentForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        modal.hide();

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
