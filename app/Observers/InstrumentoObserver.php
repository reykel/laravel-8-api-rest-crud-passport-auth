<?php

namespace App\Observers;

use App\Models\Instrumento;
use Illuminate\Support\Facades\Cache;

class InstrumentoObserver
{
    /**
     * Handle the Instrumento "created" event.
     *
     * @param  \App\Models\Instrumento  $instrumento
     * @return void
     */
    public function created(Instrumento $instrumento)
    {
        Cache::forget('instrumentos');
    }

    /**
     * Handle the Instrumento "updated" event.
     *
     * @param  \App\Models\Instrumento  $instrumento
     * @return void
     */
    public function updated(Instrumento $instrumento)
    {
        Cache::forget('instrumentos');
    }

    /**
     * Handle the Instrumento "deleted" event.
     *
     * @param  \App\Models\Instrumento  $instrumento
     * @return void
     */
    public function deleted(Instrumento $instrumento)
    {
        Cache::forget('instrumentos');
    }

    /**
     * Handle the Instrumento "restored" event.
     *
     * @param  \App\Models\Instrumento  $instrumento
     * @return void
     */
    public function restored(Instrumento $instrumento)
    {
        Cache::forget('instrumentos');
    }

    /**
     * Handle the Instrumento "force deleted" event.
     *
     * @param  \App\Models\Instrumento  $instrumento
     * @return void
     */
    public function forceDeleted(Instrumento $instrumento)
    {
        Cache::forget('instrumentos');
    }
}
