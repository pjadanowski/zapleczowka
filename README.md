# Zapleczówka

#### Dodawanie nowego template
w /templates/{nazwaTemplate}
należy utworzyć nowy folder z nazwą templatu i wrzucić do niego pliki 

- layout.blade.php <- główny layout ze stylami
- index.blade.php
- articles/show.blade.php
- categoryArticles/show.blade.php
- contact.blade.php

następnie w `TemplateService` dodać template do mappingu.
Style i skrypty wrzucić do public/templates/{nazwaTemplatu}css/
        skrypty wrzucić do public/templates/{nazwaTemplatu}/js/

##### W kontrolerze należy użyć na koniec metody
np.

```php
return templateView('articles.show', ['foo' => 'bar']);
```

> Usprawnienia: W pliku layout danego templatu jest lista styli i scryptów
> żeby nie zaciemniać widoku można podzielić template na różne komponenty
> najlepiej umieścić je w /views/components/templates/{nazwaTemplatu}