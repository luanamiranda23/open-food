<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\ImportHistory;


class ImportOpenFoodData extends Command
{
    protected $signature = 'import:open-food-data';
    protected $description = 'Import data from Open Food Facts';

    public function handle()
    {
        $indexUrl = 'https://challenges.coode.sh/food/data/json/index.txt';
        $fileList = Http::get($indexUrl)->body();
        $fileUrls = explode("\n", $fileList);

        foreach ($fileUrls as $fileUrl) {
            $dataUrl = 'https://challenges.coode.sh/food/data/json/' . $fileUrl;
            $response = Http::get($dataUrl);

            if ($response->ok()) {
                $fileData = $response->json();

                // Limitar a importação a 100 produtos de cada arquivo
                $productsToImport = array_slice($fileData, 0, 100);

                foreach ($productsToImport as $productData) {
                    $existingProduct = Product::where('code', $productData['code'])->first();
                    
                    if ($existingProduct) {
                        // Atualizar produto existente
                        $existingProduct->name = $productData['name'];
                        // Definir outros campos personalizados
                        $existingProduct->imported_t = now();
                        $existingProduct->status = 'published';
                        $existingProduct->save();
                    } else {
                        // Criar novo produto
                        $newProduct = new Product();
                        $newProduct->code = $productData['code'];
                        $newProduct->name = $productData['name'];
                        // Definir outros campos personalizados
                        $newProduct->imported_t = now();
                        $newProduct->status = 'published';
                        $newProduct->save();
                    }
                }
                
                        // Criar um novo produto na base de dados
                        Product::create([
                            'code' => $productData['code'],
                            'imported_t' => now(),
                            'status' => 'published',
                            // Defina os campos personalizados conforme necessário
                        ]);
                    }
                }
            }
        }

        echo 'Data import completed successfully.';


