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
        'translate' => '0 0 0',
        /* Transform geometry into a BufferGeometry to reduce memory usage at the cost of being harder to manipulate. */
        'buffer' => true,
        /* Disable retrieving the shared geometry object from the cache. */
        'skipCache' => false
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

    /**
     * Width
     *
     * BOX: Width (in meters) of the sides on the X axis.
     * PLANE: Width along the X axis.
     *
     * @var float
     */
    protected $width;

    /**
     * Height
     *
     * BOX: Height (in meters) of the sides on the Y axis.
     * CONE: Height of the cone.
     * CYLINDER: Height of the cylinder.
     * PLANE: Height along the Y axis.
     *
     * @var float $height
     */
    protected $height;

    /**
     * Depth
     *
     * BOX: Depth (in meters) of the sides on the Z axis.
     *
     * @var float $depth
     */
    protected $depth;

    /**
     * Segments
     *
     * CIRCLE: Number of triangles to construct the circle, like pizza slices.
     * A higher number of segments means the circle will be more round.
     *
     * @var int $segments
     */
    protected $segments;

    /**
     * Start angle for first segmen
     *
     * CIRCLE: Start angle for first segment. Can be used to define a partial circle.
     * CONE: Starting angle in degrees.
     * CYLINDER: Starting angle in degrees.
     * RING: Starting angle in degrees.
     * SPHERE: Vertical starting angle.
     *
     * @var float $thetaStart;
     */
    protected $thetaStart;

    /**
     * The central angle (in degrees).
     *
     * CIRCLE: Defaults to 360, which makes for a complete circle.
     * CONE: Central angle in degrees.
     * CYLINDER: Central angle in degrees.
     * RING: Central angle in degrees.
     * SPHERE: Vertical sweep angle size.
     *
     * @var float $thetaLength
     */
    protected $thetaLength;

    /**
     * openEnded
     *
     * CONE: Whether the ends of the cone are open (true) or capped (false).
     * CYLINDER: Whether the ends of the cylinder are open (true) or capped (false).
     *
     * @var string $openEnded
     */
    protected $openEnded;

    /**
     * segmentsRadial
     *
     * CONE: Number of segmented faces around the circumference of the cone.
     * CYLINDER: Number of segmented faces around the circumference of the cylinder.
     * TORUS: Number of segments along the circumference of the tube ends.
     * A higher number means the tube will be more round.
     *
     * @var int $segmentsRadial
     */
    protected $segmentsRadial;

    /**
     * segmentsHeight
     *
     * CONE: Number of rows of faces along the height of the cone.
     * CYLINDER: Number of rows of faces along the height of the cylinder.
     * SPHERE: Number of vertical segments.
     *
     * @var int $segmentsHeight
     */
    protected $segmentsHeight;

    /**
     * segmentsWidth
     *
     * SPHERE: Number of horizontal segments.
     *
     * @var int $segmentsWidth
     */
    protected $segmentsWidth;

    /**
     * segmentsTheta
     *
     * RING: Number of segments. A higher number means the ring will be more round.
     *
     * @var int $segmentsTheta
     */
    protected $segmentsTheta;

    /**
     * segmentsPhi
     *
     * RING: Number of triangles within each face defined by segmentsTheta.
     *
     * @var int $segmentsPhi
     */
    protected $segmentsPhi;

    /**
     * segmentsTubular
     *
     * TORUS: Number of segments along the circumference of the tube face.
     * A higher number means the tube will be more round.
     *
     * @var int $segmentsTubular
     */
    protected $segmentsTubular;

    /**
     * phiStart
     *
     * SPHERE: Horizontal starting angle.
     *
     * @var float $phiStart
     */
    protected $phiStart;

    /**
     * phiLength
     *
     * SPHERE: Horizontal sweep angle size.
     *
     * @var float $phiLength
     */
    protected $phiLength;

    /**
     * Radius
     *
     * CIRCLE: Radius (in meters) of the circle.
     * CYLINDER: Radius of the cylinder.
     * SPHERE: Radius of the sphere.
     * TORUS: Radius of the outer edge of the torus.
     *
     * @var float $radius
     */
    protected $radius;

    /**
     * radiusTubular
     *
     * TORUS: Radius of the tube.
     *
     * @var float $radiusTubular
     */
    protected $radiusTubular;

    /**
     * radiusTop
     *
     * CONE: Radius of the top end of the cone.
     *
     * @var float $radiusTop
     */
    protected $radiusTop;

    /**
     * radiusBottom;
     *
     * CONE: Radius of the bottom end of the cone.
     *
     * @var float
     */
    protected $radiusBottom;

    /**
     * radiusInner
     *
     * RING: Radius of the inner hole of the ring.
     *
     * @var float $radiusInner
     */
    protected $radiusInner;

    /**
     * radiusOuter
     *
     * RING: Radius of the outer edge of the ring.
     *
     * @var float $radiusOuter
     */
    protected $radiusOuter;

    /**
     * arc
     *
     * TORUS: Central angle.
     *
     * @var float $arc
     */
    protected $arc;

    /**
     * p
     *
     * TORUSKNOT: Number that helps define the pretzel shape.
     *
     * @var int $p
     */
    protected $p;

    /**
     * q
     *
     * TORUSKNOT: Number that helps define the pretzel shape.
     *
     * @var int $q
     */
    protected $q;

    /**
     * Translates the geometry relative to its pivot point.
     *
     * @var string $translate
     */
    protected $translate = '0 0 0';

    /**
     * Disable retrieving the shared geometry object from the cache.
     *
     * @var bool $skipCache
     */
    protected $skipCache;

    /**
     * Magic Call
     *
     * @param string $method            
     * @param array $args            
     * @throws InvalidComponentMethodException
     */
    public function __call(string $method, $args)
    {
        if (method_exists($this, $method) && ($this->isPrimitiveMethod($method) || array_key_exists($method, self::P_COMMON_PROPS))) {
            return call_user_func_array(array(
                $this,
                (string) $method
            ), $args);
        } else {
            throw new InvalidComponentMethodException($method, 'Geometry::primitive ' . $this->primitive);
        }
    }

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
            if (empty($value) || (array_key_exists($name, self::P_COMMON_PROPS) && $value === self::P_COMMON_PROPS[$name]) || (array_key_exists($name, $defaults) && $value === $defaults[$name]))
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
        return new DOMAttr('geometry', vsprintf($format, array_values(get_object_vars($this))));
    }

    /**
     * Set primitive
     *
     * One of box, circle, cone, cylinder, plane, ring, sphere, torus, torusKnot.
     *
     * @param string|null $primitive            
     * @throws InvalidComponentArgumentException
     */
    public function primitive(string $primitive = null)
    {
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
            throw new InvalidComponentArgumentException((string) $primitive, 'Geometry::primitive');
        }
    }

    /**
     * Set Buffer
     *
     * Transform geometry into a BufferGeometry to reduce memory usage at the cost of being harder to manipulate.
     *
     * @param bool $buffer            
     */
    protected function buffer($buffer = true)
    {
        $this->buffer = $buffer ? 'true' : 'false';
    }

    /**
     * skipCache
     *
     * Disable retrieving the shared geometry object from the cache.
     *
     * @param bool $skipCache            
     */
    protected function skipCache($skipCache = false)
    {
        $this->skipCache = $skipCache ? 'true' : 'false';
    }

    /**
     * Width
     *
     * {@inheritdoc}
     *
     * @param float|null $width            
     */
    protected function width(float $width = null)
    {
        $this->width = $width;
    }

    /**
     * Height
     *
     * {@inheritdoc}
     *
     * @param float|null $height            
     */
    protected function height(float $height = null)
    {
        $this->height = $height;
    }

    /**
     * Depth
     *
     * {@inheritdoc}
     *
     * @param float|null $depth            
     */
    protected function depth(float $depth = null)
    {
        $this->depth = $depth;
    }

    /**
     * Segments
     *
     * {@inheritdoc}
     *
     * @param int|null $segments            
     */
    protected function segments(int $segments = null)
    {
        $this->segments = $segments;
    }

    /**
     * Start angle for first segmen
     *
     * {@inheritdoc}
     *
     * @param float|null $thetaStart            
     */
    protected function thetaStart(float $thetaStart = null)
    {
        $this->thetaStart = $thetaStart;
    }

    /**
     * The central angle (in degrees).
     *
     * {@inheritdoc}
     *
     * @param float|null $thetaLength            
     */
    protected function thetaLength(float $thetaLength = null)
    {
        $this->thetaLength = $thetaLength;
    }

    /**
     * openEnded
     *
     * {@inheritdoc}
     *
     * @param bool|false $openEnded            
     */
    protected function openEnded(bool $openEnded = false)
    {
        $this->openEnded = $openEnded ? 'true' : 'false';
    }

    /**
     * segmentsRadial
     *
     * {@inheritdoc}
     *
     * @param int|null $segmentsRadial            
     */
    protected function segmentsRadial(int $segmentsRadial = null)
    {
        $this->segmentsRadial = $segmentsRadial;
    }

    /**
     * segmentsHeight
     *
     * {@inheritdoc}
     *
     * @param int|null $segmentsHeight            
     */
    protected function segmentsHeight(int $segmentsHeight = null)
    {
        $this->segmentsHeight = $segmentsHeight;
    }

    /**
     * segmentsWidth
     *
     * {@inheritdoc}
     *
     * @param int|null $segmentsWidth            
     */
    protected function segmentsWidth(int $segmentsWidth = null)
    {
        $this->segmentsWidth = $segmentsWidth;
    }

    /**
     * segmentsTheta
     *
     * {@inheritdoc}
     *
     * @param int|null $segmentsTheta            
     */
    protected function segmentsTheta(int $segmentsTheta = null)
    {
        $this->segmentsTheta = $segmentsTheta;
    }

    /**
     * segmentsPhi
     *
     * {@inheritdoc}
     *
     * @param int|null $segmentsPhi            
     */
    protected function segmentsPhi(int $segmentsPhi = null)
    {
        $this->segmentsPhi = $segmentsPhi;
    }

    /**
     * segmentsTubular
     *
     * {@inheritdoc}
     *
     * @param int|null $segmentsTubular            
     */
    protected function segmentsTubular(int $segmentsTubular = null)
    {
        $this->segmentsTubular = $segmentsTubular;
    }

    /**
     * phiStart
     *
     * {@inheritdoc}
     *
     * @param float|null $phiStart            
     */
    protected function phiStart(float $phiStart = null)
    {
        $this->phiStart = $phiStart;
    }

    /**
     * phiLength
     *
     * {@inheritdoc}
     *
     * @param float|null $phiLength            
     */
    protected function phiLength(float $phiLength = null)
    {
        $this->phiLength = $phiLength;
    }

    /**
     * Radius
     *
     * {@inheritdoc}
     *
     * @param float|null $radius            
     */
    protected function radius(float $radius = null)
    {
        $this->radius = $radius;
    }

    /**
     * radiusTubular
     *
     * {@inheritdoc}
     *
     * @param float|null $radiusTubular            
     */
    protected function radiusTubular(float $radiusTubular = null)
    {
        $this->radiusTubular = $radiusTubular;
    }

    /**
     * radiusTop
     *
     * {@inheritdoc}
     *
     * @param float|null $radiusTop            
     */
    protected function radiusTop(float $radiusTop = null)
    {
        $this->radiusTop = $radiusTop;
    }

    /**
     * radiusBottom
     *
     * {@inheritdoc}
     *
     * @param float|null $radiusBottom            
     */
    protected function radiusBottom(float $radiusBottom = null)
    {
        $this->radiusBottom = $radiusBottom;
    }

    /**
     * radiusInner
     *
     * {@inheritdoc}
     *
     * @param float|null $radiusInner            
     */
    protected function radiusInner(float $radiusInner = null)
    {
        $this->radiusInner = $radiusInner;
    }

    /**
     * radiusOuter
     *
     * {@inheritdoc}
     *
     * @param float|null $radiusOuter            
     */
    protected function radiusOuter(float $radiusOuter = null)
    {
        $this->radiusOuter = $radiusOuter;
    }

    /**
     * arc
     *
     * {@inheritdoc}
     *
     * @param float|null $arc            
     */
    protected function arc(float $arc = null)
    {
        $this->arc = $arc;
    }

    /**
     * p
     *
     * {@inheritdoc}
     *
     * @param int|null $p            
     */
    protected function p(int $p = null)
    {
        $this->p = $p;
    }

    /**
     * q
     *
     * {@inheritdoc}
     *
     * @param int|null $q            
     */
    protected function q(int $q = null)
    {
        $this->q = $q;
    }

    /**
     * translate
     *
     * Translates the geometry relative to its pivot point.
     *
     * @param float|int $x            
     * @param float|int $y            
     * @param float|int $z            
     */
    protected function translate(float $x = 0, float $y = 0, float $z = 0)
    {
        $this->translate = sprintf('%d %d %d', $x, $y, $z);
        ;
    }

    /**
     * Is called method allowed for current primitive
     *
     * @param string|null $method            
     */
    protected function isPrimitiveMethod(string $method = null)
    {
        $isPrimitiveMethod = false;
        
        switch ($this->primitive) {
            case 'box':
                $isPrimitiveMethod = array_key_exists($method, self::P_BOX);
                break;
            case 'circle':
                $isPrimitiveMethod = array_key_exists($method, self::P_CIRCLE);
                break;
            case 'cone':
                $isPrimitiveMethod = array_key_exists($method, self::P_CONE);
                break;
            case 'cylinder':
                $isPrimitiveMethod = array_key_exists($method, self::P_CYLINDER);
                break;
            case 'plane':
                $isPrimitiveMethod = array_key_exists($method, self::P_PLANE);
                break;
            case 'ring':
                $isPrimitiveMethod = array_key_exists($method, self::P_RING);
                break;
            case 'sphere':
                $isPrimitiveMethod = array_key_exists($method, self::P_SPHERE);
                break;
            case 'torus':
                $isPrimitiveMethod = array_key_exists($method, self::P_TORUS);
                break;
            case 'torusKnot':
                $isPrimitiveMethod = array_key_exists($method, self::P_TORUS_KNOT);
                break;
        }
        return $isPrimitiveMethod;
    }

    /**
     * Get defaults for current primitve type
     *
     * @return array;
     */
    protected function primitiveDefaults(): array
    {
        $defaults = false;
        
        switch ($this->primitive) {
            case 'box':
                $defaults = self::P_BOX;
                break;
            case 'circle':
                $defaults = self::P_CIRCLE;
                break;
            case 'cone':
                $defaults = self::P_CONE;
                break;
            case 'cylinder':
                $defaults = self::P_CYLINDER;
                break;
            case 'plane':
                $defaults = self::P_PLANE;
                break;
            case 'ring':
                $defaults = self::P_RING;
                break;
            case 'sphere':
                $defaults = self::P_SPHERE;
                break;
            case 'torus':
                $defaults = self::P_TORUS;
                break;
            case 'torusKnot':
                $defaults = self::P_TORUS_KNOT;
                break;
        }
        return $defaults;
    }
}
