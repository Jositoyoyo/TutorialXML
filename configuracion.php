<?php

class configuracion {

    private $xml;

    function __construct() {
        $this->xml = simplexml_load_file('configuracion.xml') or die("¡No fue posible cargar XML!");
        @$action = $_REQUEST['saveXML'];
        if ($action == 'save') {
            
            $this->xml->database->server = $_POST['server'];
            $this->xml->database->user = $_POST['user'];
            $this->xml->database->password = $_POST['password'];
            $this->xml->database->db = $_POST['db'];
            $this->xml->site->site_url = $_POST['site_url'];
            $this->xml->site->site_name = $_POST['site_name'];
            $this->xml->site->site_name['enable'] = $_POST['enable'];
            
            $this->xml->saveXML('configuracion.xml');
            echo $this->FormConfig();
            echo 'Datos Guardados';
        } else {
            echo $this->FormConfig();
        }
    }

    function FormConfig() {

        $conf = $this->xml;
        $html = '<div style="width: 90%; margin: auto 0;">
                    <form action="index.php" method="post">
                        <h3>Database conf.</h3>
                        <input type="hidden" name="saveXML" value="save"/>
                        <input type="text" name="server" value="'.$conf->database->server.'"/>
                        <input type="text" name="user" value="'.$conf->database->user.'"/>
                        <input type="text" name="password" value="'.$conf->database->password.'"/>
                        <input type="text" name="db" value="'.$conf->database->db.'"/>
                        <h3>Site conf.</h3>
                        <input type="text" name="site_url" value="'.$conf->site->site_url.'"/>
                        <input type="text" name="site_name" value="'.$conf->site->site_name.'"/>
                        <select name="enable">
                            <option value="'.$conf->site->site_name['enable'].'">'.$conf->site->site_name['enable'].'</option>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                        </select>
                        <br>
                        <button>Actualizar</button>
                    </form>
            </div>';
        return($html);
    }

}
