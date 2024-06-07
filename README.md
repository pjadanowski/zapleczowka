# Zapleczówka

#### Dodawanie nowego template
w /components/templates/
należy utworzyć nowy folder z nazwą templatu i wrzucić do niego pliki 

- index.blade.php
- show.blade.php
- scripts.blade.php
- styles.blade.php

następnie w `TemplateService` dodać template do mappingu.
Style i skrypty wrzucić do public/templates/{nazwaTemplatu}css/
        skrypty wrzucić do publictemplates/{nazwaTemplatu}/js/