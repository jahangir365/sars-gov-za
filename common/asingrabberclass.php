<?php
/*
 * Sigit Prasetya Nugroho http://seegatesite.com
 *
 * Amazon asin grabber class, how to grab amazon asin code with easy way.
 */
class asingrabber{
    function get_content($url)
    {
        //$content =  file_get_contents($url);
        $content =  file_get_contents('amazon.html');
        if($content)
        {
            $hasil = $content;
        }
        else
        {
            $hasil ='false';
        }
        return $hasil;
    }
    function get_asin($content)
    {

        require_once('simple_html_dom.php');
        $xml = new simple_html_dom();
        $ptint='';
        $xml->load($content);
        $hasil = $xml->find('#resultsCol li[data-asin]');
        $items=$xml->find('#resultsCol ul');
        print_r($items); exit();
        $title_hasil = $xml->find('#resultsCol h2[data-attribute]');
        $image_hasil = $xml->find('#resultsCol img[src]');
        $price_hasil = $xml->find('#resultsCol .a-text-normal > span');
        $jum = count($hasil);
        for ($i=0; $i < $jum ; $i++) {
            $asin = $hasil[$i]->getAttribute('data-asin');
            $title = $title_hasil[$i]->getAttribute('data-attribute');
            $image = $image_hasil[$i]->getAttribute('src');
            $price = $price_hasil[$i];
            $ptint .="<div class='item' style='background-color: #cfcfcf;'> <img src='".$image."'>".$asin." - ".$title." Price='".$price."'  </div>";
            //return $ptint."<br>";
        }
        return $ptint;
/*
        $title="";
        $title_hasil = @$xml->find('h2[data-attribute]');
        $title_jum = count($title_hasil);
        for ($i=0; $i < $title_jum ; $i++) {
            $title .= $title_hasil[$i]->getAttribute('data-attribute').",";
        }*/


        
    }

    function get_title($content)
    {
        require_once('simple_html_dom.php');
        $xml = new simple_html_dom();
        $xml->load($content);
        $title='';
        $title_hasil = @$xml->find('h2[data-attribute]');
        $title_jum = count($title_hasil);
        for ($i=0; $i < $title_jum ; $i++) {
            $title .= $title_hasil[$i]->getAttribute('data-attribute').",";
        }
        return $title;
    }
}
?>