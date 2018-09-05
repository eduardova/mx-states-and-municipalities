# mx-states-and-municipalities
Migrations and seeders for Mexican states (32) and municipalities (2466). For Laravel.  Year: 2018.
## Example:
> MxState model:

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
 
 ### Thanks.
