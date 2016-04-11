<?php

namespace Application\Helper;

class LeftLinks extends \Zend\View\Helper\AbstractHelper {

    // METODO MAGICO __invoke()
    // CHAMADA DO METODO É FEITO ASSIM: LeftLinks();
    public function __invoke(array $values, $urlPrefix)
    {
        $html = '<ul style="list-style-type: none;">'.PHP_EOL;
        foreach ($values as $item){
            $html.= sprintf("<li><a href=\"%s/%s\">%s</a></li>\n", 
                            $urlPrefix, 
                            $item, 
                            $item
                           );
        }
        $html.="</ul>".PHP_EOL;
        return $html;
    }
   
}
