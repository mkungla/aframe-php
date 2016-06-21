<?php
/** @formatter:off
 * ******************************************************************
 * Created by   Marko Kungla on Jun 21, 2016 - 12:20:44 AM
 * Contact      marko@okramlabs.com
 * @copyright   2016 Marko Kungla - https://github.com/mkungla
 * @license     The MIT License (MIT)
 * 
 * @category       AframeVR
 * @package        aframe-php
 * 
 * Lang         PHP (php version >= 7)
 * Encoding     UTF-8
 * File         Geometry.php
 * Code format  PSR-2 and 12
 * @link        https://github.com/mkungla/aframe-php
 ^ @issues      https://github.com/mkungla/aframe-php/issues
 * ********************************************************************
 * Contributors:
 * @author Marko Kungla <marko@okramlabs.com>
 * ********************************************************************
 * Comments:
 * @formatter:on */
namespace AframeVR\Components;

use \AframeVR\Interfaces\ComponentInterface;
use \AframeVR\Core\Exceptions\{
    InvalidComponentArgumentException,
    InvalidComponentMethodException
};
use \DOMAttr;

/**
 * The geometry component provides a basic shape for an entity.
 * The general geometry is defined by the primitive property.
 * Geometric primitives, in computer graphics, means an extremely basic shape. With the primitive defined,
 * additional properties are used to further define the geometry. A material component is usually defined alongside
 * to provide a appearance alongside the shape to create a complete mesh.
 */
class Geometry implements ComponentInterface
{

    const ALLOWED_PRIMITIVES = array(
        'box',
        'circle',
        'cone',
        'cylinder',
        'plane',
        'ring',
        'sphere',
        'torus',
        'torusKnot'
    );

    /**
     * Properties based on primitive
     */
    const P_COMMON_PROPS = array(

        /* One of box, circle, cone, cylinder, plane, ring, sphere, torus, torusKnot. */
        'primitive' => null,

        /* The translate property translates the geometry. It is provided as a vec3. This is a useful short-hand for 
         * translating the geometry to effectively move its pivot point when running animations. */
        'translate' => '0 1 0'
    );

    /**
     * The box primitive defines boxes (i.e., any quadilateral, not just cubes).
     */
    const P_BOX = array(
        /* Width (in meters) of the sides on the X axis. */
        'width' => 1,
        /* Height (in meters) of the sides on the Y axis. */
        'height' => 1,
        /* Depth (in meters) of the sides on the Z axis. */
        'depth' => 1
    );

    /**
     * The circle primitive defines two-dimensional circles, which can be complete circles or partial circles (like Pac-Man).
     * Note that because it is flat, only a single side of the circle will be rendered if “side: double” is not specified on the material component.
     */
    const P_CIRCLE = array(
        /* Radius (in meters) of the circle. */
        'radius' => 1,
        /* Number of triangles to construct the circle, like pizza slices. A higher number of segments means the circle will be more round. */
        'segments' => 32,
        /* Start angle for first segment. Can be used to define a partial circle. */
        'thetaStart' => 0,
        /* The central angle (in degrees). Defaults to 360, which makes for a complete circle. */
        'thetaLength' => 360
    );

    /**
     * The cone primitive under the hood is a cylinder primitive with varying top and bottom radiuses.
     */
    const P_CONE = array(
        /* Height of the cone. */
        'height' => 2,
        /* Whether the ends of the cone are open (true) or capped ('false'). */
        'openEnded' => 'false',
        /* Radius of the bottom end of the cone. */
        'radiusBottom' => 1,
        /* Radius of the top end of the cone. */
        'radiusTop' => 1,
        /* Number of segmented faces around the circumference of the cone. */
        'segmentsRadial' => 36,
        /* Number of rows of faces along the height of the cone. */
        'segmentsHeight' => 18,
        /* Starting angle in degrees. */
        'thetaStart' => 0,
        /* Central angle in degrees. */
        'thetaLength' => 360
    );

    /**
     * The cylinder primitive can define cylinders in the traditional sense like a Coca-Cola™ can,
     * but it can also define shapes such as tubes and curved surfaces.
     * We’ll go over some of these cylinder recipes below.
     * 1. Traditional cylinders can be defined by using only a height and a radius:
     * 2. Tubes can be defined by making the cylinder open-ended, which removes the top and bottom surfaces of the cylinder such that the inside is visible.
     * A double-sided material will be needed to render properly:
     * 3. Curved surfaces can be defined by specifying the angle via thetaLength such that the cylinder doesn’t curve all the way around,
     * making the cylinder open-ended, and then making the material double-sided.
     * 4. Other types of prisms can be defined by varying the number of radial segments (i.e., sides). For example, to make a hexagonal prism:
     */
    const P_CYLINDER = array(
        /* Radius of the cylinder. */
        'height' => 3,
        /* Height of the cylinder. */
        'radius' => 2,
        /* Number of segmented faces around the circumference of the cylinder. */
        'segmentsRadial' => 36,
        /* Number of rows of faces along the height of the cylinder. */
        'segmentsHeight' => 18,
        /* Whether the ends of the cylinder are open (true) or capped ('false'). */
        'openEnded' => 'false',
        /* Starting angle in degrees. */
        'thetaStart' => 0,
        /* Central angle in degrees. */
        'thetaLength' => 360
    );

    /**
     * The plane primitive defines a flat surface.
     * Note that because it is flat,
     * only a single side of the plane will be rendered if side: double is not specified on the material component.
     */
    const P_PLANE = array(
        /* Width along the X axis. */
        'width' => 1,
        /* Height along the Y axis. */
        'height' => 1
    );

    /**
     * The ring geometry defines a flat ring, like a CD.
     * Note that because it is flat,
     * only a single side of the ring will be rendered if side: double is not specified on the material component.
     */
    const P_RING = array(
        /* Radius of the inner hole of the ring. */
        'radiusInner' => 1,
        /* Radius of the outer edge of the ring. */
        'radiusOuter' => 1,
        /* Number of segments. A higher number means the ring will be more round */
        'segmentsTheta' => 32,
        /* Number of triangles within each face defined by segmentsTheta. */
        'segmentsPhi' => 8,
        /* Starting angle in degrees. */
        'thetaStart' => 0,
        /* Central angle in degrees. */
        'thetaLength' => 360
    );

    /**
     * The sphere primitive can define spheres in the traditional sense like a basketball.
     *
     * But it can also define various polyhedrons and abstract shapes given that it can specify
     * the number of horizontal and vertical angles and faces.
     *
     * Sticking with a basic sphere, the default number of segments is high enough to make the sphere appear round.
     */
    const P_SPHERE = array(
        /* Radius of the sphere. */
        'radius' => 1,
        /* Number of horizontal segments. */
        'segmentsWidth' => 18,
        /* Number of vertical segments. */
        'segmentsHeight' => 36,
        /* Horizontal starting angle. */
        'phiStart' => 0,
        /* Horizontal sweep angle size. */
        'phiLength' => 360,
        /* Vertical starting angle. */
        'thetaStart' => 0,
        /* Vertical sweep angle size. */
        'thetaLength' => 360
    );

    /**
     * The torus primitive defines a donut shape.
     */
    const P_TORUS = array(
        /* Radius of the outer edge of the torus. */
        'radius' => 1,
        /* Radius of the tube. */
        'radiusTubular' => 0.2,
        /* Number of segments along the circumference of the tube ends. A higher number means the tube will be more round. */
        'segmentsRadial' => 36,
        /* Number of segments along the circumference of the tube face. A higher number means the tube will be more round. */
        'segmentsTubular' => 32,
        /* Central angle. */
        'arc' => 360
    );

    /**
     * The torus knot primitive defines a pretzel shape, the particular shape of which is defined by a pair of coprime integers,
     * p and q.
     * If p and q are not coprime the result will be a torus link.
     */
    const P_TORUS_KNOT = array(
        /* Radius that contains the torus knot. */
        'radius' => 1,
        /* Radius of the tubes of the torus knot. */
        'radiusTubular' => 0.2,
        /* Number of segments along the circumference of the tube ends. A higher number means the tube will be more round. */
        'segmentsRadial' => 36,
        /* Number of segments along the circumference of the tube face. A higher number means the tube will be more round. */
        'segmentsTubular' => 32,
        /* Number that helps define the pretzel shape. */
        'p' => 2,
        /* Number that helps define the pretzel shape. */
        'q' => 3
    );

    /* DOM atrributes */
    protected $primitive;

    protected $width;

    protected $height;

    protected $depth;

    protected $radius;

    protected $radiusTubular;

    protected $radiusBottom;

    protected $radiusTop;

    protected $segments;

    protected $thetaStart;

    protected $thetaLength;

    protected $openEnded;

    protected $segmentsRadial;

    protected $segmentsHeight;

    protected $segmentsWidth;

    protected $segmentsTheta;

    protected $segmentsPhi;

    protected $segmentsTubular;

    protected $phiStart;

    protected $phiLength;

    protected $radiusInner;

    protected $radiusOuter;

    protected $arc;

    protected $p;

    protected $q;

    protected $translate;

    /**
     * Get Component scripts
     *
     * {@inheritdoc}
     *
     * @return array
     */
    public function getScripts(): array
    {
        return array();
    }

    /**
     * Does component have DOM Atributes
     *
     * {@inheritdoc}
     *
     * @return bool
     */
    public function hasDOMAttributes(): bool
    {
        return ! empty(get_object_vars($this));
    }

    /**
     * Remove default DOMElement Attributes which are not required
     *
     * @return void
     */
    public function removeDefaultDOMAttributes()
    {
        $defaults = $this->primitiveDefaults();
        foreach (get_object_vars($this) as $name => $value) {
            if (empty($value) 
                || (array_key_exists($name, self::P_COMMON_PROPS) && $value === self::P_COMMON_PROPS[$name]) 
                || (array_key_exists($name, $defaults) && $value === $defaults[$name]))
                unset($this->$name);
        }
    }

    /**
     * Get DOMAttr for the entity
     *
     * @return DOMAttr
     */
    public function getDOMAttributes(): DOMAttr
    {
        $format = implode(': %s; ', array_keys(get_object_vars($this))) . ': %s;';
        return new \DOMAttr('geometry', vsprintf($format, array_values(get_object_vars($this))));
    }

    /**
     * Set primitive
     *
     * One of box, circle, cone, cylinder, plane, ring, sphere, torus, torusKnot.
     *
     * @param unknown $primitive            
     * @throws InvalidComponentArgumentException
     */
    public function primitive($primitive = null)
    {
        try {
            if (in_array($primitive, self::ALLOWED_PRIMITIVES)) {
                /* If primitive is changed we reset the object and releoad allowed attributes */
                $this->primitive = $primitive;
                $defaults = $this->primitiveDefaults();
                foreach (get_class_vars(get_class($this)) as $name => $default) {
                    if ($name === 'primitive')
                        continue;
                    
                    if (array_key_exists($name, $defaults))
                        $this->$name = $defaults[$name];
                    elseif (array_key_exists($name, self::P_COMMON_PROPS))
                        $this->$name = self::P_COMMON_PROPS[$name];
                    else
                        unset($this->$name);
                }
            } else {
                throw new InvalidComponentArgumentException($primitive, 'Geometry::primitive');
            }
        } catch (InvalidComponentArgumentException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Set Buffer
     *
     * Transform geometry into a BufferGeometry to reduce memory usage at the cost of being harder to manipulate.
     *
     * @param string $buffer            
     */
    public function buffer($buffer = 'true')
    {
        $this->buffer = $buffer;
    }

    /**
     * skipCache
     *
     * Disable retrieving the shared geometry object from the cache.
     *
     * @param string $skipCache            
     */
    public function skipCache($skipCache = 'false')
    {
        $this->skipCache = $skipCache;
    }

    public function width($width)
    {
        $this->width = $width;
    }

    public function height($height)
    {
        $this->height = $height;
    }

    public function depth($depth)
    {
        $this->depth = $depth;
    }

    public function radius($radius)
    {
        $this->radius = $radius;
    }

    public function radiusTubular($radiusTubular)
    {
        $this->radiusTubular = $radiusTubular;
    }

    public function radiusBottom($radiusBottom)
    {
        $this->radiusBottom = $radiusBottom;
    }

    public function radiusTop($radiusTop)
    {
        $this->radiusTop = $radiusTop;
    }

    public function segments($segments)
    {
        $this->segments = $segments;
    }

    public function thetaStart($thetaStart)
    {
        $this->thetaStart = $thetaStart;
    }

    public function thetaLength($thetaLength)
    {
        $this->thetaLength = $thetaLength;
    }

    public function openEnded($openEnded)
    {
        $this->openEnded = $openEnded;
    }

    public function segmentsRadial($segmentsRadial)
    {
        $this->segmentsRadial = $segmentsRadial;
    }

    public function segmentsHeight($segmentsHeight)
    {
        $this->segmentsHeight = $segmentsHeight;
    }

    public function segmentsWidth($segmentsWidth)
    {
        $this->segmentsWidth = $segmentsWidth;
    }

    public function segmentsTheta($segmentsTheta)
    {
        $this->segmentsTheta = $segmentsTheta;
    }

    public function segmentsPhi($segmentsPhi)
    {
        $this->segmentsPhi = $segmentsPhi;
    }

    public function segmentsTubular($segmentsTubular)
    {
        $this->segmentsTubular = $segmentsTubular;
    }

    public function phiStart($phiStart)
    {
        $this->phiStart = $phiStart;
    }

    public function phiLength($phiLength)
    {
        $this->phiLength = $phiLength;
    }

    public function radiusInner($radiusInner)
    {
        $this->radiusInner = $radiusInner;
    }

    public function radiusOuter($radiusOuter)
    {
        $this->radiusOuter = $radiusOuter;
    }

    public function arc($arc)
    {
        $this->arc = $arc;
    }

    public function p($p)
    {
        $this->p = $p;
    }

    public function q($q)
    {
        $this->q = $q;
    }

    public function translate($translate)
    {
        $this->translate = $translate;
    }

    /**
     * Magic Call
     *
     * @param string $method            
     * @param array $args            
     * @throws InvalidComponentMethodException
     */
    public function __call($method, $args)
    {
        if ($method === 'primitive') {
            return call_user_func_array(array(
                $this,
                $method
            ), $args);
        }
        try {
            if (method_exists($this, $method) && $this->isPrimitiveMethod($method)) {
                return call_user_func_array(array(
                    $this,
                    $method
                ), $args);
            } else {
                throw new InvalidComponentMethodException($method, 'Geometry::primitive ' . $this->primitive);
            }
        } catch (InvalidComponentMethodException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Is called method allowed for current primitive
     * 
     * @param unknown $method
     */
    protected function isPrimitiveMethod($method)
    {
        switch ($this->primitive) {
            case 'box':
                return in_array($method, self::P_BOX) ? self::P_BOX : false;
                break;
            case 'circle':
                return in_array($method, self::P_CIRCLE) ? self::P_CIRCLE : false;
                break;
            case 'cone':
                return in_array($method, self::P_CONE) ? self::P_CONE : false;
                break;
            case 'cylinder':
                return in_array($method, self::P_CYLINDER) ? self::P_CYLINDER : false;
                break;
            case 'plane':
                return in_array($method, self::P_PLANE) ? self::P_PLANE : false;
                break;
            case 'ring':
                return in_array($method, self::P_RING) ? self::P_RING : false;
                break;
            case 'sphere':
                return in_array($method, self::P_SPHERE) ? self::P_SPHERE : false;
                break;
            case 'torus':
                return in_array($method, self::P_TORUS) ? self::P_TORUS : false;
                break;
            case 'torusKnot':
                return in_array($method, self::P_TORUS_KNOT) ? self::P_TORUS_KNOT : false;
                break;
            default:
                return false;
                break;
        }
    }

    /**
     * Get defaults for current primitve type
     * 
     * @return array;
     */
    protected function primitiveDefaults() : array
    {
        switch ($this->primitive) {
            case 'box':
                return self::P_BOX;
                break;
            case 'circle':
                return self::P_CIRCLE;
                break;
            case 'cone':
                return self::P_CONE;
                break;
            case 'cylinder':
                return self::P_CYLINDER;
                break;
            case 'plane':
                return self::P_PLANE;
                break;
            case 'ring':
                return self::P_RING;
                break;
            case 'sphere':
                return self::P_SPHERE;
                break;
            case 'torus':
                return self::P_TORUS;
                break;
            case 'torusKnot':
                return self::P_TORUS_KNOT;
                break;
            default:
                return array();
                break;
        }
    }
}
