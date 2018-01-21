<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Project Name</th>
        <th scope="col">Worker Name</th>
        <th scope="col">Role</th>
        <th scope="col">Date of beginning</th>
        <th scope="col">Date of ending</th>
        <th scope="col">Confirm</th>
    </tr>
    </thead>
    <tbody>
    {% for project in projects %}
    <form action="" method="post">
    <input type="hidden" value="{{ project.ep_id }}" name="id">
    <tr>
        <td>{{ project.ep_id }}</td>
        <td>
            <div class="form-group">
                <select class="form-control" name="prj_name" >
                    {% for projectName in namesOfProjects %}
                    <option selected hidden>{{ project.project_name }}</option>
                    <option>{{ projectName.project_name }}</option>
                    {% endfor %}
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <select class="form-control" name="worker_name">
                    {% for worker in workers %}
                    <option selected hidden>{{ project.worker_lastname }}</option>
                    <option>{{ worker.worker_lastname }}</option>
                    {% endfor %}
                </select>
            </div>
        </td>
        <td>
            <div class="form-group">
                <select class="form-control" name="role">
                    {% for role in roles %}
                    <option selected hidden>{{ project.role_name }}</option>
                    <option>{{ role.role_name }}</option>
                    {% endfor %}
                </select>
            </div>
        </td>
        <td>
            <div class="input-group date" data-provide="datepicker" id="datetimepicker1">
                <input type="text" class="form-control" name="dt_begin" value="{{ project.dt_begin }}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
        </td>
        <td>
            <div class="input-group date" data-provide="datepicker" id="datetimepicker2">
                <input type="text" class="form-control" name="dt_end" value="{{ project.dt_end }}">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </div>
            </div>
        </td>
        <td><button type="submit" class="btn btn-primary">Confirm</button> <button  id="delete" class="btn btn-danger">Delete</button></td>
    </tr>
    </form>
    {% endfor %}
    </tbody>
</table>


