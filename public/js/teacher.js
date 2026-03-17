window.addEventListener('DOMContentLoaded', () => {
    var page = 1;

    function uploadData(){

        fetch(`/teachers/uploadData?page=${page}`, {
            method: 'GET',
            credentials: 'include'
        })
            .then(response => response.json())
            .then(data => {
                teachers = data.teachers;
                append(teachers)
                page++;
            });
    }

    function append(teachers) {
        $table = $('#teacherTable tbody');

        teachers.forEach(teacher => {
            $table.append(createRow(teacher))
        })
    }

    function createRow(teacher){
        return `<tr>
                <td>${teacher.surname} ${teacher.name[0]}. ${teacher.patrnonymic ? teacher.patronymic[0] + "." : ""}</td>
                <td>${teacher.passport}</td>
                <td>${teacher.departmentName}</td>
                <td><a class="btn btn-outline-light dismiss">Уволить</a></td>
        </tr>`
    }

    document.getElementById('uploadButton').addEventListener('click', uploadData);
    //$("uploadButton").click(() => uploadData());
})
