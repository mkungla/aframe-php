<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 26, 2016 - 4:34:50 PM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         AframeComponentInstaller.php
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

use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;
use Composer\Package\PackageInterface;

class AframeComponentInstaller extends LibraryInstaller
{

    const AFRAME_PHP_VERSION = '0.3.0.1';

    const SUPPORTED_TYPES = array(
        'component',
        'aframe',
        'aframe-component'
    );

    /**
     * A-Frame Component vendor
     *
     * @var string
     */
    protected $aframe_component_vendor;

    /**
     * A-Frame Component package name
     *
     * @var string
     */
    protected $aframe_component_name;

    /**
     * Path to directory of A-Frame assets
     *
     * @var string
     */
    protected $public_root;

    /**
     * Path to A-Frame core scripts
     *
     * @var string
     */
    protected $public_core_dir;

    /**
     * URI of A-Frame assets relative to your document root
     *
     * @var string
     */
    protected $aframe_assets_url = '/aframe';

    /**
     * Decides if the installer supports the given type
     * and package.
     * We only handle components with name prefix aframe
     *
     * @param string $package_type            
     * @return bool
     */
    public function supports($package_type)
    {
        return in_array($package_type, self::SUPPORTED_TYPES);
    }

    /**
     * Checks that provided package is installed.
     *
     * @param InstalledRepositoryInterface $repo
     *            repository in which to check
     * @param PackageInterface $package
     *            package instance
     *            
     * @return bool
     */
    public function isInstalled(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        return parent::isInstalled($repo, $package) && is_dir($this->getComponentPath());
    }

    /**
     * Installs specific package.
     *
     * @param InstalledRepositoryInterface $repo
     *            repository in which to check
     * @param PackageInterface $package
     *            package instance
     *            
     * @return void
     */
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
        
        $this->initializeVendorDir();
        $this->supportedByName($package->getPrettyName());
        $this->setComponentPath();
        
        if ($this->supportedByName($package->getPrettyName())) {
            $this->io->info(sprintf("Installing A-Frame Component %s", $this->aframe_component_name));

            if (! is_dir($this->getInstallPath($package) . DIRECTORY_SEPARATOR . 'dist')) {
                $this->io->warning(sprintf('A-Frame Component %s can not be used since missing dist directory!', $this->aframe_component_name));
            } else {
                $this->filesystem->ensureDirectoryExists($this->getComponentPath());
                
                $this->copy($this->getInstallPath($package) . DIRECTORY_SEPARATOR . 'dist', $this->getComponentPath());
            }
        }
    }

    /**
     * Updates specific package.
     *
     * @param InstalledRepositoryInterface $repo
     *            repository in which to check
     * @param PackageInterface $initial
     *            already installed package version
     * @param PackageInterface $target
     *            updated version
     *            
     * @throws InvalidArgumentException if $initial package is not installed
     * @return void
     */
    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);
        
        $this->initializeVendorDir();
        $this->supportedByName($target->getPrettyName());
        $this->setComponentPath();
        
        if ($this->supportedByName($target->getPrettyName())) {
            $this->io->info(sprintf("Updating A-Frame Component %s", $this->aframe_component_name));
            if (! is_dir($this->getInstallPath($package) . DIRECTORY_SEPARATOR . 'dist')) {
                $this->io->warning(sprintf('A-Frame Component %s can not be used since missing dist directory!', $this->aframe_component_name));
            } else {
                $this->filesystem->removeDirectory($this->getComponentPath());
                $this->filesystem->ensureDirectoryExists($this->getComponentPath());
                $this->copy($this->getInstallPath($package) . DIRECTORY_SEPARATOR . 'dist', $this->getComponentPath());
            }
        }
    }

    /**
     * Remove the code
     *
     * @param PackageInterface $package            
     * @return void
     */
    public function removeCode(PackageInterface $package)
    {
        $this->initializeVendorDir();
        $this->supportedByName($package->getPrettyName());
        $this->setComponentPath();
        
        if (is_dir($this->getComponentPath()) && basename($this->getComponentPath()) !== 'component') {
            $this->filesystem->removeDirectory($this->getComponentPath());
            $this->io->error($this->aframe_component_vendor);
            $this->io->error($this->aframe_component_name);
            $this->io->error($this->getComponentPath());
        } else {
            $this->io->error($this->getComponentPath());
        }
        
        parent::removeCode($package);
    }

    /**
     * Supoorted By Name
     *
     * Is package supoorted by name. All supported package names shoudl start with aframe
     *
     * @param string $pretty_name            
     * @return bool
     */
    protected function supportedByName(string $pretty_name)
    {
        list ($vendor, $package_name) = array_pad(explode('/', $pretty_name, 2), 2, null);
        $this->aframe_component_vendor = $vendor;
        $this->aframe_component_name = $package_name;
        return substr($package_name, 0, 6) === 'aframe' && $package_name !== 'aframe';
    }

    /**
     * Get A-Frame component path
     *
     * @return string
     */
    public function getComponentPath()
    {
        return empty($this->aframe_component_path) ? $this->setComponentPath() : $this->aframe_component_path;
    }

    /**
     * Set A-Frame componet public path
     *
     * @return string
     */
    protected function setComponentPath()
    {
        return $this->aframe_component_path = $this->getPublicRoot() . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . $this->aframe_component_vendor . DIRECTORY_SEPARATOR . $this->aframe_component_name;
    }

    /**
     * Get public path
     *
     * Path where all package dist files will be saved
     *
     * @return string $public_path
     */
    public function getPublicRoot()
    {
        $this->initializeVendorDir();
        return realpath($this->public_root);
    }

    /**
     * Get A-Frame assets path
     *
     * @return string
     */
    public function getPublicAframeCoreDir()
    {
        return $this->public_core_dir ?? $this->getPublicRoot() . DIRECTORY_SEPARATOR . 'core';
    }

    /**
     * Get Composer Vendor dir
     *
     * @return string
     */
    public function getVendorDir()
    {
        return $this->vendorDir;
    }

    /**
     * Get A-Frame core assets source path
     *
     * @return string
     */
    public function getAframeCoreSrcDir()
    {
        return $this->public_src_dir ?? $this->public_src_dir = $this->getVendorDir() . DIRECTORY_SEPARATOR . 'mkungla' . DIRECTORY_SEPARATOR . 'aframe' . DIRECTORY_SEPARATOR . 'dist';
    }

    /**
     * Copy directory or files
     *
     * @param string $source            
     * @param string $dest            
     */
    public function copy(string $source, string $dest)
    {
        if (! empty($source) && ! empty($dest) && ! is_dir($source)) {
            $this->rm($dest);
            return copy($source, $dest);
        } elseif ((! empty($source) && ! empty($dest)) && is_dir($source)) {
            
            foreach ($iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST) as $item) {
                if ($item->isDir()) {
                    mkdir($dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName(), octdec(str_pad($iterator->getPerms(), 4, 0, STR_PAD_LEFT)));
                } else {
                    
                    $this->copy($item, $dest . DIRECTORY_SEPARATOR . $iterator->getSubPathName());
                }
            }
            
            return true;
        } else
            return false;
    }

    /**
     * Remove files or directories
     *
     * @param string $pathname            
     * @return boolean
     */
    public function rm(string $pathname)
    {
        $response = false;
        if (is_dir($pathname)) {
            
            $files = array_diff(scandir($pathname), array(
                '.',
                '..'
            ));
            foreach ($files as $file) {
                $this->rm("$pathname/$file");
            }
            
            $response = rmdir($pathname);
        } elseif (file_exists($pathname)) {
            
            $response = unlink($pathname);
        }
        return $response;
    }

    /**
     * initializeVendorDir
     *
     * @return void
     */
    protected function initializeVendorDir()
    {
        parent::initializeVendorDir();
        $default_public_path = $this->getVendorDir() . DIRECTORY_SEPARATOR . 'mkungla' . DIRECTORY_SEPARATOR . 'aframe-php' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'aframe';
        $this->public_root = $this->composer->getConfig()->get('aframe-dir') ?? $default_public_path;
        $this->filesystem->ensureDirectoryExists($this->public_root);
        
        $this->public_core_dir = $this->public_root . DIRECTORY_SEPARATOR . 'core';
        $this->filesystem->ensureDirectoryExists($this->public_core_dir);
    }

    /**
     * Set A-Frame assets relative base url
     */
    public function updateConfig()
    {
        $this->aframe_assets_url = $this->composer->getConfig()->get('aframe-url') ?? '/aframe';
        ;
        $composer_json = $this->getVendorDir() . DIRECTORY_SEPARATOR . 'mkungla' . DIRECTORY_SEPARATOR . 'aframe-php' . DIRECTORY_SEPARATOR . 'composer.json';
        
        if (file_exists($composer_json)) {
            $config = json_decode(file_get_contents($composer_json));
            $config->config->{'aframe-dir'} = $this->getPublicRoot();
            $config->config->{'aframe-url'} = $this->aframe_assets_url;
            $config->version = self::AFRAME_PHP_VERSION;
            file_put_contents($composer_json, json_encode($config, JSON_PRETTY_PRINT));
        }
    }
}
