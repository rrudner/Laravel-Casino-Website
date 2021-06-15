@extends('layouts.master')

@section('title', '[A] Gry')


@section('animated-content')
    <h1>Gry</h1>
    <br>
    <p><b><br><br>Sortuj po loginie</b></p>
    <fieldset>
        <input type="text" name="login" id="filterInput"><br />
        <button type="submit" id="filterButton" class="pure-button pure-button-primary">Filtruj</button>
    </fieldset>
    <div id="searchdiv">
        <div style="overflow-x:auto;">
            <table class="my-table" id="gamesTable">
            </table>
        </div>
        <button class="pure-button pure-button-primary" id="prevPage">&lt;</button>
        <span id="pageDisplay"></span>
        <button class="pure-button pure-button-primary" id="nextPage">&gt;</button>
    </div>

    <style>
        .my-table {
            margin-bottom: 20px;
        }

        .gameTablePage {
            display: none;
        }

        .gameTablePage.active {
            display: table-row-group;
        }

    </style>

    <script type="text/javascript">
        var games = [];
        var currentPage = 1;
        var pages = 0;
        var gamesPerPage = 5; // To sobie mozesz edytowac i ustawic ile gier na strone ma byc
        var $table = $('#gamesTable')

        $('#nextPage').on('click', nextPage);
        $('#prevPage').on('click', prevPage);
        $('#filterButton').on('click', filterTable);

        $.get("{{ route('gamesAjax.index') }}")
            .then((response) => {
                games = response;
                generateTable();
            })
            .catch((e) => {
                alert('Wystąpił błąd poczas ładowania gier!')
            })

        function filterTable() {
            var $filterInput = $('#filterInput');

            $.get("{{ route('gamesAjax.index') }}")
                .then((response) => {
                    var result = [];

                    response.forEach((item) => {
                        if (item.user_id.startsWith($filterInput.val())) {
                            result.push(item);
                        }
                    });

                    games = result;

                    $table.empty();

                    generateTable();
                })
                .catch((e) => {
                    alert('Wystąpił błąd poczas ładowania gier!')
                })
        }

        function nextPage() {
            if (currentPage + 1 > pages) {
                return;
            }

            updatePage(currentPage + 1);

            $('.gameTablePage.active').removeClass('active');
            $('.gameTablePage[data-page="' + currentPage + '"]').addClass('active');
        }

        function updatePage(page) {
            currentPage = page;
            $('#pageDisplay').text('Strona ' + currentPage + '/' + pages);
        }

        function prevPage() {
            if (currentPage - 1 <= 0) {
                return;
            }

            updatePage(currentPage - 1);

            $('.gameTablePage.active').removeClass('active');
            $('.gameTablePage[data-page="' + currentPage + '"]').addClass('active');
        }

        function generateTable() {
            pages = Math.ceil(games.length / gamesPerPage);
            updatePage(1);

            $table.append(
                '<thead><tr><th>id</th><th>Data utworzenia:</th><th>Użytkownik</th><th>Kwota</th><th>Wygrana/Przegrana</th><th>Portfel Przed</th><th>Portfel Po</th><th>Data aktualizacji:</th><th>Zaktualizowana przez</th><th>Data usunięcia</th><th>Usuń/Przywróć</th></tr></thead>'
            );


            for (var i = 1; i <= pages; i++) {
                var $element = $('<div class="gameTablePage" data-page=' + i + '></div>');

                if (i == 1) {
                    $element.addClass('active');
                }

                for (var j = 0; j < gamesPerPage; j++) {
                    var currentGameIndex = j + ((i - 1) * gamesPerPage);

                    if (String(games[currentGameIndex]) == 'undefined') {
                        continue;
                    }


                    var $row = $('<tr></tr>');

                    $row.append('<td>' + games[currentGameIndex].id + '</td>');
                    $row.append('<td>' + games[currentGameIndex].created_at + '</td>');
                    $row.append('<td>' + games[currentGameIndex].user_id + '</td>');
                    $row.append('<td>' + games[currentGameIndex].bet + '</td>');

                    if (games[currentGameIndex].win) {
                        $row.append('<td>💸WYGRANA💸</td>');
                    } else {
                        $row.append('<td>💰PRZEGRANA💰</td>');
                    }

                    $row.append('<td>' + games[currentGameIndex].wallet_before + '</td>');
                    $row.append('<td>' + games[currentGameIndex].wallet_after + '</td>');
                    $row.append('<td>' + games[currentGameIndex].updated_at + '</td>');
                    $row.append('<td>' + games[currentGameIndex].updated_by + '</td>');

                    if (games[currentGameIndex].deleted_at) {
                        $row.append('<td>' + games[currentGameIndex].deleted_at + '</td>');
                        $row.append('<td><a href="/admin/games/delete' + games[currentGameIndex].id +
                            '" class="pure-button pure-button-primary">♻️</a></td>');
                    } else {
                        $row.append('<td>✅</td>');
                        $row.append('<td><a href="/admin/games/delete' + games[currentGameIndex].id +
                            '" class="pure-button pure-button-primary">🗑️</a></td>');
                    }

                    $element.append($row);
                }

                $table.append($element);
            }


        }
        // document.getElementById('search-form').addEventListener('submit', function (e) {
        //     e.preventDefault();
        //     ajaxPostForm('search-form','{{ route('showGamesSearch') }}','searchdiv')
        // })
        // // Funkcja wysyłająca dane formularza identyfkowanego przez 'id_form', do podanego adresu 'url'.
        // // Otrzymana odpowiedź zamienia zawartość elementu na stronie o identyfikatorze 'id_to_reload'.
        // function ajaxPostForm(id_form, url, id_to_reload) {
        //     var form = document.getElementById(id_form);
        //     var formData = new FormData(form);
        //     var xmlHttp = new XMLHttpRequest();
        //     xmlHttp.onreadystatechange = function() {
        //         if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        //             document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
        //         }
        //     }
        //     xmlHttp.open("POST", url, true);
        //     xmlHttp.send(formData);
        // }

    </script>




@endsection
