Radosław Rudner PAW3 Projekt PBAW+JPDSI 2021

Strona symulująca wirtualne kasyno

Brak zalogowanej sesji -> Strona logoawnia i możliwość założenia konta.
	Rejestracja:
		login(username), unikalny min 3 znaki max 13
		hasło, min 3 max 28
		Dane osobowe oraz miejsce zamieszkania
		Możliwość wpisania ciągu znaków bez rozdzielania spacją
		
	Logowanie
		username i hasło, przycisk do strony rejestracji
		
Użytkownik
	Doładowywanie konta kwotami z listy rozwijanej
		Wypłata wszystkich środków
	
	Edycja konta
		możliwość zmiany hasła, miejsca zamieszkania
		po potwierdzeniu aktualnym hasłem
		w wypadku wpsiania błędnego hasła następuje wylogowanie z komunikatem.
		
	Gra "rzut monetą"
		Ustalenie kwoty
		Po wybraniu "orzeł"/"reszka" moneta się obraca i mamy 40% szansy na wygraną
		W wypadku wygranej wartość "Kwota" zostaje dodana do portfela, w przypadku rpzegranej odjęta.
		
Administrator
	Możliwosć "rzucenia monetą" lecz bez żadnego rezulatatu - brak inforamacji o wygranej, oraz brak transakcji.
	Edycja konta jak w wyapdku zwykłego użytkownika.
	
	Panel Administratora
		Wpłaty
			Widok historii wpłat z danymi [stronicowanie po 10] z możliwosćią usunięcia miękkiego.
		
		Użytkownicy
			Tak jak z wpłatami, lecz istieje dodatkowo pełna możliwość edycji użytkowników.
			Zmiana imienia i nazwiska, zmiany roli
		
		Gry
			Możliwość usunięcia miękkiego wybranej gry.
			W tym widoku mamy doczenuienia ze stronicowaniem po 5 rekordów
			Funkcja filtracji gier po loginie bez odświeżenia strony.
		
		Role
			Możliwość usunięcia miękkiego wybranej roli, użytkownicy z tą rolą dostaja rolę "user".
			Możliwośc dodania roli.
			
W archiwum przesyłam bazę z kilkoma rekordami.
W celu utworzenia nowej bazy (ustawienie bazy plik /.env) używamy w katalogu głównym projektu polecenia
"php artisan migrate"
Po utworzeniu nowej bazy, pierwszy użytkownik tworzy role user(id:1) oraz admin(id:2)
oraz dostaje rolę "admin", kolejni domyślnie dostają rangę "user".

Projekt planuje hobbistycznie rozwijać w celu poszerzania swojej wiedzy z zakresu tworzenia stron internetowych,
oraz frameworka Laravel.

link do repozytorium:
https://github.com/rrudner/Laravel-Casino-Website

link do projektu:
http://rrudner.bieda.it/
