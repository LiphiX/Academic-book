window.addEventListener('DOMContentLoaded', () => {
    var page = 1;

    function uploadData(){

        fetch(`/students/uploadData?page=${page}`, {
            method: 'GET',
            credentials: 'include'
        })
            .then(response => response.json())
            .then(data => {

                console.log(data);
                students = data.students;
                groups = data.groups;
                append(students, groups)
                page++;
            });
    }

    function append(students, groups) {
        $table = $('#studentsTable tbody');

        students.forEach(student => {
            $table.append(createRow(student, groups))
        })
    }

    function createRow(student, groups){
        return `<tr>
                <td>${student.surname} ${student.name[0]}. ${student.patrnonymic ? student.patronymic[0] + "." : ""}</td>
                <td>${student.passport}</td>
                <td>
                    <select class="form-select" name="groups">
                    ${groups.map(group => createGroupOption(student.groupId, group)).join('')}
                    </option>
                    @endforeach
                </select>
            </td>
            <td>${student.averageAssessment}</td>
            <td>${student.averageAttendance}</td>
        </tr>`
    }

    function createGroupOption(groupId, group){
        return `<option ${(groupId === group.id) ? "selected" : ""}>${group.name}</option>`
    }

    document.getElementById('uploadButton').addEventListener('click', uploadData);
    //$("uploadButton").click(() => uploadData());
})
