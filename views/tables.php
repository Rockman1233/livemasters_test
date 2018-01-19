<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
    </tr>
    </thead>
    <tbody>
    {% for project in projects %}
    <tr>
        <td>{{ project.project_id }}</td>
        <td>{{ project.project_name }}</td>
    </tr>
    {% endfor %}
    </tbody>
</table>