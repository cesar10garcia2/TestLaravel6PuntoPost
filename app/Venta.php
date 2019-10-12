<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //

    public function setNumComprobanteAttribute($value)
    {
        if ($value === true) {
            $num_comprobante = $this->latest()->first();
            $num_comprobante = $num_comprobante ? ($num_comprobante->attributes['num_comprobante'] + 1) : 1;

            if ($num_comprobante == 9999999) {
                $num_comprobante = 1;
            }

            $this->attributes['num_comprobante'] = $num_comprobante;
        } else {
            $this->attributes['num_comprobante'] = $value;
        }
    }

    public function setSerieComprobanteAttribute($value)
    {
        if ($value === true) {
            $serie_comprobante = Venta::latest()->first();
            $serie_comprobante = $serie_comprobante ? ($serie_comprobante->attributes['serie_comprobante']) : 1;

            if ($this->num_comprobante == 9999999) {
                $serie_comprobante = $serie_comprobante + 1;
            }
            $this->attributes['serie_comprobante'] = $serie_comprobante;
        } else {
            $this->attributes['serie_comprobante'] = $value;
        }
    }
}
