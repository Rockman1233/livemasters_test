<div class="index-content">
    <div class="container">
            <div class="col-lg-4">
                <div class="card" id="card-1">
                    <img src="./assets/img/finance-1.jpg">
                    <a href="summ-proj"><h4>Список проектов</h4></a>
                    <form method="post" class="newName" action="javascript:void(null);" onsubmit="editName()">
                        <div class="form-group special-padding">
                            <select class="form-control" name="project_id">
                                <option value="0" selected hidden>Create new project</option>
                                {% for projectName in namesOfProjects %}
                                <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
                                {% endfor %}
                            </select>
                            <div class="hide-when-unhover-one">
                                <p class="text-center">Введите новое название для проекта:</p>
                                <input type="text" name="project_name" class="center-block">
                                <label class="deleteObject">Удалить проект:  <input type="checkbox" name="delete" class="form-check-input"></label>
                                <input type="submit" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" id="card-2">
                    <img src="./assets/img/finance-3.jpg">
                    <a href="summ-workers"><h4>Список сотрудников</h4></a>
                    <form method="post" class="newWorker" action="javascript:void(null);" onsubmit="editWorker()">
                        <div class="form-group special-padding">
                            <select class="form-control" name="worker_id">
                                <option value="0" selected hidden>Create new worker</option>
                                {% for worker in workers %}
                                <option value="{{ worker.worker_id }}">{{ worker.worker_lastname }}</option>
                                {% endfor %}
                            </select>
                            <div class="hide-when-unhover-two">
                                <p class="text-center">Введите новое имя сотрудника</p>
                                <input type="text" name="worker_lastname" class="center-block">
                                <label class="deleteObject">Удалить выбранного сотрудника: <input type="checkbox" name="delete" class="form-check-input"></label>
                                <input type="submit" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" id="card-3">
                    <img src="./assets/img/finance-2.jpg">
                    <h4>Список ролей</h4>
                    <form method="post" class="newRole" action="javascript:void(null);" onsubmit="editRole()">
                        <div class="form-group special-padding">
                            <select class="form-control" name="role_id">
                                <option value="0" selected hidden>Create new role</option>
                                {% for role in roles %}
                                <option value="{{ role.role_id }}">{{ role.role_name }}</option>
                                {% endfor %}
                            </select>
                            <div class="hide-when-unhover-three">
                                <p class="text-center">Введите новую должность</p>
                                <input type="text" name="role_name" class="center-block">
                                <label class="deleteObject">Удалить должность: <input type="checkbox" name="delete3" class="form-check-input"></label>
                                <input type="submit" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>



