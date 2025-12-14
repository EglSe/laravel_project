<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        Studento Informacija
    </div>
    <div class="card-body">
        <table class="table table-borderless mb-0">
            <tbody>
            <tr>
                <th>Vardas, pavardė:</th>
                <td>{{ $student->name }} {{ $student->surname }}</td>
            </tr>
            <tr>
                <th>Grupė / kodas:</th>
                <td>{{ $student->group_code }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
