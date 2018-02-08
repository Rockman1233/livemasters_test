<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Выберете интересующий проект</h2>
            <hr>
            <form class="js-projForm" action="javascript:void(null);" onsubmit="findingProj()">    
                <div class="form-group">
                    <select class="form-control" name="projectId">
                        {% for projectName in namesOfProjects %}
                            <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
                        {% endfor %}
                    </select>
                </div>
                <hr>
                <div class="input-group date datetimepicker1" data-provide="datepicker" id="datetimepicker1">
                    <input type="text" class="form-control" name="dtBegin">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
                <br>
                <div class="input-group date datetimepicker1" data-provide="datepicker" id="datetimepicker1">
                    <input type="text" class="form-control" name="dtEnd">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Просмотр</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container js-blockOfProjects" id="toggle-table">
    <h1>{{ TheProject }}</h1>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">First date</th>
                    <th scope="col">Deadline</th>
                </tr>
            </thead>
            <tbody>
            {% for deal in deals %}
                <tr>
                    <th>{{ deal.worker_lastname }}</th>
                    <td>{{ deal.role_name }}</td>
                    <td>{{ deal.dt_begin }}</td>
                    <td>{{ deal.dt_end }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
