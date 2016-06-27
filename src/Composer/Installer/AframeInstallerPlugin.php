<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 26, 2016 - 3:59:35 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AframeInstaller.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Composer\Installer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
class AframeInstallerPlugin implements PluginInterface
{

    /**
     * Apply plugin modifications to Composer
     *
     * @param Composer $composer            
     * @param IOInterface $io            
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $aframe_installer = new AframeComponentInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($aframe_installer);
        $info_msg = sprintf('A-Frame installer plugin is added as custom installer! composer-plugin-api v: %s', self::PLUGIN_API_VERSION);
        $io->write($info_msg, "comment");
        
        /* Update A-Frame core */
        if ($this->requiresAframeCoreUpdate($aframe_installer, $io))
            $this->updateAframeCore($aframe_installer,$io);
        
        $aframe_installer->updateConfig();
    }

    /**
     * Update A-Frame core
     *
     * Aframe core is always installed as dependency
     * so therefore it is installed/updated before
     * this pulgin is loaded or updated.
     *
     * @param AframeComponentInstaller $aframe_installer            
     * @return void
     */
    private function updateAframeCore(AframeComponentInstaller $aframe_installer,$io)
    {
        $source = $aframe_installer->getAframeCoreSrcDir();
        $dest = $aframe_installer->getPublicAframeCoreDir();
        
        $aframe_installer->copy($source, $dest);
    }

    /**
     * Is update of Aframe is required
     *
     * @param AframeComponentInstaller $aframe_installer            
     * @return bool
     */
    protected function requiresAframeCoreUpdate(AframeComponentInstaller $aframe_installer, IOInterface $io)
    {
        $public_path = $aframe_installer->getPublicRoot();
        $aframe_core_dir = $aframe_installer->getPublicAframeCoreDir();
        
        $aframe_core_file = $aframe_core_dir . DIRECTORY_SEPARATOR . 'aframe.js';
        
        $aframe_src_dir = $aframe_installer->getAframeCoreSrcDir();
        
        return (! is_dir($aframe_core_dir) || ! file_exists($aframe_core_file) || ! is_dir($aframe_src_dir)) ? true : filemtime($aframe_src_dir) > filemtime($aframe_core_dir);
    }
    
}
