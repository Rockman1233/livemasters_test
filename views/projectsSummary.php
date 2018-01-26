{% for project in projects %}
{% endfor %}

<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h2>Выберете интересующий проект</h2>
            <hr>

            <form action="" method="POST">

                <div class="form-group">
                    <select class="form-control" name="project_id">
                        {% for projectName in namesOfProjects %}
                        <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
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
                    <input type="text" class="form-control" name="dt_begin">
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