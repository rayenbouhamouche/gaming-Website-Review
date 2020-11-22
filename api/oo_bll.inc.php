<?php

class BLLGameOverview
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $gameno;
    public $gamename;
    public $genre;
    public $platforms;
    public $release;
    public $price;
    public $ranking;
    public $role;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}




class BLLGames
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $gameslist;
    public $mostLovedGame;
    public $mostHatedGame;
    public $gameno;
    public $gamename;
    public $genre;
    public $platforms;
    public $role;
    public $ranking;
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}



class BLLConsole
{
    //-------CLASS FIELDS------------------
    public $id = null;
    public $name;
    public $description;
    public $capacity;
    public $imgsrc;
    public $release;
    public $memory;
    public $price;
   
    
    public function fromArray(stdClass $passoc)
    {
        foreach($passoc as $tkey => $tvalue)
        {
            $this->{$tkey} = $tvalue;
        }
    }
}


?>