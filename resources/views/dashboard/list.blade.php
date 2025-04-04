<div
    style="position: fixed; top: 20px; left: 20px; background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <h2>Users</h2>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 1px solid #ddd;">
                <th style="padding: 8px; text-align: left;">ID</th>
                <th style="padding: 8px; text-align: left;">Name</th>
                <th style="padding: 8px; text-align: left;">Email</th>
                <th style="padding: 8px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 8px;">{{ $user->id }}</td>
                    <td style="padding: 8px;">{{ $user->name }}</td>
                    <td style="padding: 8px;">{{ $user->email }}</td>
                    <td style="padding: 8px;">
                        <a href="{{ route('users.edit', $user) }}"
                            style="text-decoration: none; padding: 5px 10px; background-color: #007bff; color: white; border-radius: 5px; margin-right: 5px; font-size: 0.9em;">Edit</a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 0.9em;"
                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding: 8px; text-align: center;">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>