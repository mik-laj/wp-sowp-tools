# Sowp Tools

Wtyczka zapewnia dodatkowe funkcjonalności na stronach Siec Obywatelskiej Watchdog Polska.


# Funkcjonalności

* Obsługa górnego paska

## Górny pasek

Aby wyśweitlić górny pasek należy w motywie umieścić kod:
```php
if ( function_exists( 'sowp_topbar' ) ) {
	sowp_topbar();
}
````
Wtyczka zapewnia synchronizacja stanu paska pobierając aktualny pasek z serwerów Stowaryszenia. 