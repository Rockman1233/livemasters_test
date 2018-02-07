<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h2>Выберете сотрудника</h2>
            <hr>
            <form class="js-projForm" action="javascript:void(null);" onsubmit="findingProjByWorker()">    

                <div class="form-group">
                    <select class="form-control" name="worker_id">
                        {% for worker in workers %}
                        <option value="{{ worker.worker_id }}">{{ worker.worker_lastname }}</option>
                        {% endfor %}
                    </select>
                </div>
                <hr>
                <div class="input-group date datetimepicker1" data-provide="datepicker" id="datetimepicker1">
                    <input type="text" class="form-control" name="dt_begin">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>
                <br>
                <div class="input-group date datetimepicker1" data-provide="datepicker" id="datetimepicker1">
                    <input type="text" class="form-control" name="dt_end">
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
    <h1>{{ TheWorker }}</h1>
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
                <th>{{ deal.project_name }}</th>
                <td>{{ deal.role_name }}</td>
                <td>{{ deal.dt_begin }}</td>
                <td>{{ deal.dt_end }}</td>
            </tr>
            {% endfor %}

            </tbody>
        </table>
        {% for worker in WorkWith %}
        <blockquote class="blockquote">
        <p class="mb-0">Работал вместе с {{ worker.worker_lastname }} ({{ worker.role_name }}) над проектом {{ worker.project_name }} в промежутке с {{ worker.dt_begin }} по {{ worker.dt_end }} </p>
        </blockquote>
        {% endfor %}
    </div>
</div>