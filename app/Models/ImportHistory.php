<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model
{
    use HasFactory;

    protected $fillable = ['filename', 'imported_at'];

    /**
     * Obtém o histórico de importação mais recente.
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model|null
     */
    public static function latestImport()
    {
        return self::orderBy('imported_at', 'desc')->first();
    }

    /**
     * Verifica se um arquivo já foi importado.
     *
     * @param string $filename
     * @return bool
     */
    public static function isImported($filename)
    {
        return self::where('filename', $filename)->exists();
    }
}
