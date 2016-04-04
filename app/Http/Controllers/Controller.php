<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Meta;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct() {
        # Default title
        Meta::title('Prodprice');
        Meta::meta('description', 'Добре дошли в Prodprice. Сайта за лесни и бързи онлайн поръчки. Ние предлгаме разнообразие от продукти в различни категории!');

        # Default robots
        Meta::meta('robots', 'index,follow');
    }

    public function slugify($string) {
        $mytext = $this->sluggable($string);
        $data = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $mytext)));

        return substr($data, 0, 20);
    }

    protected function sluggable($text) {
        $myP = strtolower($text);
        $find = array('а', 'б', 'в', 'г', 'д', 'е', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ю', 'я');
        $replace = array('a', 'b', 'v', 'g', 'd', 'e', 'j', 'z', 'i', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'i', 'f', 'h', 'c', 'ch', 'sh', 'sh', 'y', 'ju', 'q');
        return str_replace($find, $replace, $myP);
    }

}
