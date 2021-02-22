<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPHtmlParser\Dom;

class ProductController extends Controller
{
    
     public function show()
    {
    	
    	$dom = new Dom;
		$dom->loadStr(file_get_contents("https://www.digikala.com/product/dkp-90825",0));

        return view('product', [
            'title' => $dom->find('.c-product__title')->text,
             'discription' => $dom->find('.c-mask__text')->innertext,
            'price' => $dom->find('.c-product__seller-price-real')->innertext,
            'img'   =>$dom->find('img[class=js-gallery-img]')->getAttribute('data-src'),
            "thumb" =>$dom->find('div[class=thumb-wrapper] img')
       ]);
    }
}
