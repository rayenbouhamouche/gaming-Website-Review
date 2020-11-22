<?php
class PLQuote extends SimpleXMLElement
{
    //-------CLASS FIELDS------------------
    public $quote;
    public $person;
    public $pub;
    public $source;
    public $quote_href;
}


class PLCarouselImage extends SimpleXMLElement
{
    //-------CLASS FIELDS------------------
    public $img_href;
    public $title;
    public $lead;
    
    //-------CONSTRUCTOR--------------------
}

class PLUpdateGameItem extends SimpleXMLElement
{
    //-------CLASS FIELDS------------------
    public $name;
    public $key_href;
    public $desc;
}



?>