@extends('layouts.admin')

@section('title', 'Sistemos Naudotojų Sąrašas')

@section('content')

    <div class="container mt-4">
        <h1>Sistemos Naudotojų Sąrašas</h1>


        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>El. paštas</th>
                <th>Pareigos</th>
                <th>Veiksmai</th>
            </tr>
            </thead>
            <tbody>

            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role ?? 'N/A' }}</td>
                    <td>
                        {{-- edit--}}
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning">
                            Redaguoti
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Sistemoje naudotojų nėra.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
@endsection
