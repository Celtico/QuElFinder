<?php
/**
 * @Author: Cel Ticó Petit
 * @Contact: cel@cenics.net
 * @Company: Cencis s.c.p.
 */

namespace QuElFinder\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Json\Json;

class QuElFinder extends AbstractHelper
{

    /**
     * @var
     */
    protected $Config;

    /**
     * @param $Config
     */
    public function __construct($Config)
    {
        $this->Config = $Config;
    }

    /**
     * @param $name
     * @param $options
     *
     * @return string
     */
    public function __invoke($name,$options = array())
    {

        $this->loaderCss( $this->Config['LoadCss'] );
        $this->loaderJs(  $this->Config['LoadJs']  );

        $this->view->headLink()->prependStylesheet(
            $this->view->basePath($this->Config['BasePath'])
                . '/jquery/ui-themes/smoothness/jquery-ui-1.10.1.custom.css'
        );

        $this->view->inlineScript()->prependFile(
            $this->view->basePath($this->Config['BasePath'])
                . '/jquery/jquery-ui-1.10.1.custom.min.js', 'text/javascript'
        );

        $options = Json::encode(array_merge(
            $this->Config['elFinder'],
            $options
        ),false,array('enableJsonExprFinder' => true));

        ?>
        <script type="text/javascript">
            $().ready(function(){
              $('#<?php echo $name; ?>').elfinder(<?=$options?>).elfinder('instance');
            });
        </script>
        <?php
    }


    /**
     * @param array $array
     */
    public function loaderJs($array = array())
    {
        foreach( array_reverse(  $this->Config['LoadJs']  ) as $dir => $asset){

            if(is_int($dir)){

                $this->view->inlineScript()->prependFile(
                    $this->view->basePath($this->Config['BasePath'])
                        . '/js/' . $asset .  '.js', 'text/javascript'
                );

            } else {

                foreach($asset as $dirAsset){
                    $this->view->inlineScript()->prependFile(
                        $this->view->basePath($this->Config['BasePath'])
                            . '/js/' . $dir .  '/' .  $dirAsset  .   '.js', 'text/javascript'
                    );
                }
            }
        }
    }

    /**
     * @param array $array
     */
    public function loaderCss($array = array())
    {
        foreach( array_reverse(  $this->Config['LoadCss']  ) as $dir => $asset){

            if(is_int($dir)){

                $this->view->headLink()->prependStylesheet(
                    $this->view->basePath($this->Config['BasePath'])
                        . '/css/' . $asset .  '.css'
                );

            } else {

                foreach($asset as $dirAsset){
                    $this->view->headLink()->prependStylesheet(
                        $this->view->basePath($this->Config['BasePath'])
                            .  '/' . $dir .  '/' .   $dirAsset .   '.css'
                    );
                }
            }
        }
    }
}
