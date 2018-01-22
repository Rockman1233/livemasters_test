<!--
<div class="container">
    <form method="post" class="newName" action="javascript:void(null);" onsubmit="editName()">
        <div class="form-group">
            <select class="form-control" name="project_id">
                <option value="0" selected hidden>List of projects</option>
                {% for projectName in namesOfProjects %}
                <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
                {% endfor %}
            </select>
            <p>Введите новое название для проекта</p>
            <input type="text" name="project_name">
            <p>Удалить?<input type="checkbox" name="delete"></p>
            <input type="submit" hidden>
        </div>
    </form>
</div>
-->

<div class="index-content">
    <div class="container">
            <div class="col-lg-4">
                <div class="card">
                    <img src="http://cevirdikce.com/proje/hasem-2/images/finance-1.jpg">
                    <h4>Список проектов</h4>
                    <form method="post" class="newName" action="javascript:void(null);" onsubmit="editName()">
                        <div class="form-group special-padding">
                            <select class="form-control" name="project_id">
                                <option value="0" selected hidden>List of projects</option>
                                {% for projectName in namesOfProjects %}
                                <option value="{{ projectName.project_id }}">{{ projectName.project_name }}</option>
                                {% endfor %}
                            </select>
                            <p class="text-center">Введите новое название для проекта</p>
                            <input type="text" name="project_name" class="center-block">
                            <p class="text-center">Удалить?<input type="checkbox" name="delete" class="form-check-input"></p>
                            <input type="submit" hidden>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="http://cevirdikce.com/proje/hasem-2/images/finance-3.jpg">
                    <h4>Список сотрудников</h4>
                    <form method="post" class="newWorker" action="javascript:void(null);" onsubmit="editWorker()">
                        <div class="form-group special-padding">
                            <select class="form-control" name="project_id">
                                <option value="0" selected hidden>List of workers</option>
                                {% for worker in workers %}
                                <option value="{{ worker.worker_id }}">{{ worker.worker_lastname }}</option>
                                {% endfor %}
                            </select>
                            <p class="text-center">Введите новое название для проекта</p>
                            <input type="text" name="worker_lastname" class="center-block">
                            <p class="text-center">Удалить?<input type="checkbox" name="delete" class="form-check-input"></p>
                            <input type="submit" hidden>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="http://cevirdikce.com/proje/hasem-2/images/finance-2.jpg">
                    <h4>Список ролей</h4>
                    <form method="post" class="newRole" action="javascript:void(null);" onsubmit="editRole()">
                        <div class="form-group special-padding">
                            <select class="form-control" name="role_id">
                                <option value="0" selected hidden>List of roles</option>
                                {% for role in roles %}
                                <option value="{{ role.role_id }}">{{ role.role_name }}</option>
                                {% endfor %}
                            </select>
                            <p class="text-center">Введите новое название для проекта</p>
                            <input type="text" name="role_name" class="center-block">
                            <p class="text-center">Удалить?<input type="checkbox" name="delete3" class="form-check-input"></p>
                            <input type="submit" hidden>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>



