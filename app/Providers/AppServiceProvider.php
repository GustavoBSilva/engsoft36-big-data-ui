<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Creates a @cpf($var) directive which formats a given $var
        Blade::directive('cpf', function ($expression) {
            $cpf = $this->Mask('###.###.###-##', $expression);

            return "<?php echo $cpf; ?>";
        });
    }

    private function Mask($mask, $str){

        $str = str_replace(" ", "", $str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
    
        return $mask;
    
    }
    
}
