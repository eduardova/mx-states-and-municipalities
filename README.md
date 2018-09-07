# mx-states-and-municipalities
Migrations and seeders for Mexican states (32) and municipalities (2466). For Laravel.  Year: 2018.

## if you only need  consume this api, you can do it here:

### States

> https://www.eduardova.me/mx-states
> 
> return all mexican states

> https://www.eduardova.me/mx-states/32
> 
> return only the state number 32 of mexico (Zacatecas)

> https://www.eduardova.me/mx-states/8/12
> 
> return since state 8 to until the 12

> https://www.eduardova.me/mx-states/32/municipalities
> 
> return all municipalities from the state number 32

### Municipalities

> https://www.eduardova.me/mx-municipalities
> 
> return all the 2466 municipalities of mexico

> https://www.eduardova.me/mx-municipalities/state/32
> 
> return all municipalities from the state number 32 (same as above)

## if you wan implement your own api:

#### Once your database is well configured and
#### the files are in the folder "database" and you have added the classes to "DatabaseSeeder" file
> php artisan migrate --seed

#### you can create new models for the migrations for example
> php artisan make:model MxState
> 
> php artisan make:model MxState

#### and for example:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MxState extends Model
{
    protected $hidden = ['created_at','updated_at'];

    public function municipalities()
    {
    	return $this->hasMany(MxMunicipality::class);
    }
}
```

> MxMunicipality model:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MxMunicipality extends Model
{
    protected $hidden = ['created_at','updated_at'];

    public function state()
    {
    	return $this->belongsTo(MxState::class, 'mx_state_id');
    }
}
```

> php artisan tinker
> 
> $m = App\MxMunicipality::where('name','like','Nochis%')->first();

```
=> App\MxMunicipality {
     id: "2433",
     name: "Nochistlán de Mejía",
     mx_state_id: "32",
     number: "34",
   }
```
 > $s = $m->state
 ```
 => App\MxState {
     id: "32",
     name: "Zacatecas",
     abbrev: "Zac.",
     country: "MX",
   }
 ```
 > $s->municipalities
 ```
 [
       App\MxMunicipality {
         id: "2400",
         name: "Apozol",
         mx_state_id: "32",
         number: "1",
       },
       App\MxMunicipality {
         id: "2401",
         name: "Apulco",
         mx_state_id: "32",
         number: "2",
       },
       App\MxMunicipality {
         id: "2402",
         name: "Atolinga",
         mx_state_id: "32",
         number: "3",
       },
       ...
       ...
]
 ```
 
 #### well see you :) 
 ### Thanks.
