<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Project Name</th>
        <th scope="col">Delete?</th>
    </thead>
    <tbody>
    {% for projectName in namesOfProjects %}
        <form action="" method="post">
            <tr>
                <td>{{ projectName.project_id }}</td>
                <td>
                    <button class="show-hide-field" id="{{ projectName.project_id }}">{{ projectName.project_name }}</button>
                    <input type="text" id="input_{{ projectName.project_id }}" class='input_new_name' placeholder="{{ projectName.project_name }}" >
                </td>
                <td>
                    <button  id="delete" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        </form>
    {% endfor %}
    </tbody>
</table>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Worker Name</th>
    </thead>
    <tbody>
    {% for worker in workers %}
    <form action="" method="post">
        <input type="hidden" value="{{ worker.worker_id }}" name="id">
        <tr>
            <td>{{ worker.worker_id }}</td>
            <td><input type="text" placeholder="{{ worker.worker_lastname }}"></td>
            <td><button  id="delete" class="btn btn-danger">Delete</button></td>
        </tr>
    </form>
    {% endfor %}
    </tbody>
</table>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Role Name</th>
    </thead>
    <tbody>
    {% for role in roles %}
    <form action="" method="post">
        <input type="hidden" value="{{ role.role_id }}" name="id">
        <tr>
            <td>{{ role.role_id }}</td>
            <td><input type="text" placeholder="{{ role.role_name }}"></td>
            <td><button  id="delete" class="btn btn-danger">Delete</button></td>
        </tr>
    </form>
    {% endfor %}
    </tbody>
</table>



