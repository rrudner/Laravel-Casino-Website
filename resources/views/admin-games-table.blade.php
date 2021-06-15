<div style="overflow-x:auto;">
    <table class="my-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Data utworzenia:</th>
                <th>Użytkownik</th>
                <th>Kwota</th>
                <th>Wygrana/Przegrana</th>
                <th>Portfel Przed</th>
                <th>Portfel Po</th>
                <th>Data aktualizacji:</th>
                <th>Zaktualizowana przez</th>
                <th>Data usunięcia</th>
                <th>Usuń/Przywróć</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <th scope="row">{{ $game->id }}</th>
                    <td>{{ $game->created_at }}</td>
                    <td>{{ $game->user_id }}</td>
                    <td>{{ $game->bet }}</td>
                    <td>
                        @if ($game->win)
                            💸WYGRANA💸
                        @else
                            💰PRZEGRANA💰
                        @endif
                    </td>
                    <td>{{ $game->wallet_before }}</td>
                    <td>{{ $game->wallet_after }}</td>
                    <td>{{ $game->updated_at }}</td>
                    <td>{{ $game->updated_by }}</td>

                    @if ($game->deleted_at)
                        <td>{{ $game->deleted_at }}</td>
                        <td><a href={{ route('adminGamesDelete', $game->id) }}
                                class="pure-button pure-button-primary">♻️</a></td>

                    @else
                        <td>✅</td>
                        <td><a href={{ route('adminGamesDelete', $game->id) }}
                                class="pure-button pure-button-primary">🗑️</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $games->links() }}
