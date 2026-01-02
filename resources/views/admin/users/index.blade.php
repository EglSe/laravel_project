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
                    <td class="d-flex gap-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Redaguoti</a>

                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Ar tikrai norite ištrinti šį naudotoją?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                        </form>
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
