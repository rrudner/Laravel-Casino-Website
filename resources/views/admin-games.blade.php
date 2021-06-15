@extends('layouts.master')

@section('title', '[A] Gry')


@section('animated-content')
    <h1>Gry</h1>
    <br>
    <form id="search-form" class="pure-form pure-form-stacked">
        <p><b><br><br>Sortuj po loginie</b></p>
        <fieldset>
            <input type="text" name="login"><br />
            <button type="submit" class="pure-button pure-button-primary">Filtruj</button>
        </fieldset>
    </form>
    <div id="searchdiv">
        @include('admin-games-table')
    </div>

    <script type="text/javascript">
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            ajaxPostForm('search-form', '{{ route('showGamesSearch') }}', 'searchdiv')
        })
        // Funkcja wysyłająca dane formularza identyfkowanego przez 'id_form', do podanego adresu 'url'.
        // Otrzymana odpowiedź zamienia zawartość elementu na stronie o identyfikatorze 'id_to_reload'.
        function ajaxPostForm(id_form, url, id_to_reload) {
            var form = document.getElementById(id_form);
            var formData = new FormData(form);
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById(id_to_reload).innerHTML = xmlHttp.responseText;
                }
            }
            xmlHttp.open("POST", url, true);
            xmlHttp.send(formData);
        }

    </script>




@endsection
