<?php

class configuracion {
    private $xml;
    function __construct() {
        $this->xml = simplexml_load_file('configuracion.xml') or die ("¡No fue posible cargar XML!");;
    }
            
    function getAllConfig(){
       
        return($this->xml);
        
    }
    function showXML(){
        header('Content-Type: text/xml');
        echo $this->xml->asXML();
    }
}
$configuracion = new configuracion();
$conf = $configuracion->getAllConfig();
?>
<div style="width: 90%; margin: auto 0;">
    <form action="configuracion.php" method="post">
    <h3>Database conf.</h3>
    <input type="text" value="<?php echo $conf->database->server; ?>"/>
    <input type="text" value="<?php echo $conf->database->user; ?>"/>
    <input type="text" value="<?php echo $conf->database->password; ?>"/>
    <input type="text" value="<?php echo $conf->database->db; ?>"/>
    <h3>Site conf.</h3>
    <input type="text" value="<?php echo $conf->site->site_url; ?>"/>
    <input type="text" value="<?php echo $conf->site->name; ?>"/>
    <select>
        <option value="<?php echo $conf->site->name['enable']; ?>"><?php echo $conf->site->name['enable']; ?></option>
        <option value="enable">Enable</option>
        <option value="disable">Disable</option>
    </select>
    <br>
    <button>Actualizar</button>
    </form>
</div>
