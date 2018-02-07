<div class="container">
    <!--
    <div class="row">
        <h4>Сортировка</h4>
        <a href="../projects/1"><button type="button" class="btn btn-primary btn-sm">ID</button></a>
        <a href="../projects/2"><button type="button" class="btn btn-primary btn-sm">Project</button></a>
        <a href="../projects/3"><button type="button" class="btn btn-primary btn-sm">Worker</button></a>
        <a href="../projects/4"><button type="button" class="btn btn-primary btn-sm">Role</button></a>
    </div>
    -->
</div>
<hr>
<div class="table-responsive" id="content-tabel">
    <table class="table">
        <thead>
        <tr>
            <th scope="col"><a href="?sort=1">ID</a></th>
            <th scope="col"><a href="?sort=2">Project Name</a></th>
            <th scope="col"><a href="?sort=3">Worker Name</a></th>
            <th scope="col"><a href="?sort=4">Role</a></th>
            <th scope="col">Date of beginning</th>
            <th scope="col">Date of ending</th>
            <th scope="col">Confirm</th>
        </tr>
        </thead>
        <tbody>
        {% for project in projects %}
        <tr id="row-{{ project.ep_id }}" data-id="{{ project.ep_id }}" class="js-form">
            <input type="hidden" value="{{ project.ep_id }}" name="ep_id">
            <!-- Projects -->
            <td>
                {{ project.ep_id }}
            </td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="project_id">
                            <option value="{{ project.project_id }}" selected hidden>{{ project.project_name }}</option>
                        {% for projectName in namesOfProjects %}
                            <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
                        {% endfor %}
                    </select>
                </div>
            </td>
            <!-- Workers -->
            <td>
                <div class="form-group">
                    <select class="form-control" name="worker_id">
                        <option value="{{ project.worker_id }}" selected hidden>{{ project.worker_lastname }}</option>
                        {% for worker in workers %}
                            <option value="{{ worker.worker_id }}">{{ worker.worker_lastname }}</option>
                        {% endfor %}
                    </select>
                </div>
            </td>
            <!-- Roles -->
            <td>
                <div class="form-group">
                    <select class="form-control" name="role_id">
                        <option value="{{ project.role_id }}" selected hidden>{{ project.role_name }}</option>
                        {% for role in roles %}
                            <option value="{{ role.role_id }}">{{ role.role_name }}</option>
                        {% endfor %}
                    </select>
                </div>
            </td>
            <!-- dt_begin -->
            <td>
                <div class="input-group date datetimepicker1" data-provide="datepicker" id="datetimepicker1">
                    <input type="text" class="form-control" name="dt_begin" value="{{ project.dt_begin }}">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </td>
            <!-- dt_end -->
            <td>
                <div class="input-group date datetimepicker2" data-provide="datepicker" id="datetimepicker2">
                    <input type="text" class="form-control" name="dt_end" value="{{ project.dt_end }}">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </td>
            <td>
                <button class="btn btn-primary js-submit" data-id="{{ project.ep_id }}">Confirm</button>
                <input type="button" data-id="{{ project.ep_id }}" class="btn btn-danger js-delete" value="Delete">
            </td>
        </tr>
        {% endfor %}
        </tbody>
    </table>
</div>
<!-- LINE OF CREATION -->
<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Project Name</th>
            <th scope="col">Worker Name</th>
            <th scope="col">Role</th>
            <th scope="col">Date of beginning</th>
            <th scope="col">Date of ending</th>
            <th scope="col">Confirm</th>
        </tr>
        </thead>
        <tbody>
        <form method="POST" id="formOfNewRow" action="javascript:void(null);" onsubmit="call()">
        <tr>
            <td>
                <div class="form-group">
                    <select class="form-control" name="project_id">
                        <option value="{{ project.project_id }}" selected hidden>{{ project.project_name }}</option>
                        {% for projectName in namesOfProjects %}
                        <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
                        {% endfor %}
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="worker_id">
                        <option value="{{ project.worker_id }}" selected hidden>{{ project.worker_lastname }}</option>
                        {% for worker in workers %}
                        <option value="{{ worker.worker_id }}">{{ worker.worker_lastname }}</option>
                        {% endfor %}
                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <select class="form-control" name="role_id">
                        <option value="{{ project.role_id }}" selected hidden>{{ project.role_name }}</option>
                        {% for role in roles %}
                        <option value="{{ role.role_id }}">{{ role.role_name }}</option>
                        {% endfor %}
                    </select>
                </div>
            </td>
            <td>
                <div class="input-group date datetimepicker1" data-provide="datepicker" id="datetimepicker1">
                    <input type="text" class="form-control dt_begin" name="dt_begin" value="{{ project.dt_begin }}">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </td>
            <td>
                <div class="input-group date datetimepicker2" data-provide="datepicker" id="datetimepicker2">
                    <input type="text" class="form-control" name="dt_end" value="{{ project.dt_end }}">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
            </td>
            <td><button type="submit" class="btn btn-success" id="add_but">Add</button></td>
        </tr>
        </form>
        </tbody>
    </table>
</div>
{{ error }}
