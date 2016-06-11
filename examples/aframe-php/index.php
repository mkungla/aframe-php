<?php
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'bootstrap.php';
require_once 'vendor/autoload.php';

/**
 * Configuration
 * 
 * @var unknown
 */
require_once 'config.php';

/**
 * Exsample dynamic data
 *
 * @var \Github\Client $github
 */

$client = new \Github\HttpClient\CachedHttpClient();
$client->setCache(new \Github\HttpClient\Cache\FilesystemCache(AFRAME_TMP . DIRECTORY_SEPARATOR . 'github-api-cache'));
$github = new \Github\Client($client);

$data = new \stdClass();
/* Get project info from github */
$data->project = $github->api('repo')->show($CFG['username'], $CFG['repo'], true);
/* Get contributors of the repo */
$data->contributors = $github->api('repo')->contributors($CFG['username'], $CFG['repo']);
/* Get milstones to get upcoming version info */
$data->milestones = $github->api('repo')->milestones($CFG['username'], $CFG['repo']);
/* Get releases */
$data->releases = $github->api('repo')
    ->releases()
    ->all($CFG['username'], $CFG['repo']);
/* Get info of the latest release */
try {
    $data->release = $github->api('repo')
    ->releases()
    ->latest($CFG['username'], $CFG['repo']);
} catch(RuntimeException $e) {
    $data->release['name'] = 'No releases';
    $data->release['published_at'] = '';
}

/**
 * Esample
 *
 * @var \Aframe\VR $VR
 */
$aframe = new \Aframe\VR();

// Set meta tile
$aframe->meta()->title($data->project['name']);

/**
 * Calling scene method could be used to set scene properties
 * @formatter:off
 * */
$aframe->scene()->assets()->mixin('column')->geometry('primitive: cylinder; radius: 0.2; height: 1.2;');
$aframe->scene()->assets()->mixin('column')->material('color: '.$CFG['color']['col'] .'; metalness: .4;');
$aframe->scene()->assets()->mixin('column')->position('0 .6 0');

$aframe->scene()->assets()->mixin('column-bottom')->geometry('primitive: cylinder; radius: .8; height: .4;');
$aframe->scene()->assets()->mixin('column-bottom')->material('color: '.$CFG['color']['col-bottom'].'; metalness: .4;');
$aframe->scene()->assets()->mixin('column-bottom')->position('0 .1 0');
   
$aframe->scene()->assets()->mixin('column-2')->geometry('primitive: cylinder; radius: 0.59; height: 2.2;');
$aframe->scene()->assets()->mixin('column-2')->material('color: '.$CFG['color']['plate-bg'].'; metalness: .4;');
$aframe->scene()->assets()->mixin('column-2')->position('0 .4 0');

$aframe->scene()->assets()->mixin('column-bottom-2')->geometry('primitive: cylinder; radius: .8; height: .4;');
$aframe->scene()->assets()->mixin('column-bottom-2')->material('color: '.$CFG['color']['col-bottom'].'; metalness: .4;');
$aframe->scene()->assets()->mixin('column-bottom-2')->position('0 -.9 0');

$aframe->scene()->assets()->mixin('progress-base')->geometry('primitive: cylinder; radius: .2; height: 6;');
$aframe->scene()->assets()->mixin('progress-base')->material('color: '.$CFG['color']['progress-base'].'; metalness: .4;');
$aframe->scene()->assets()->mixin('progress-base')->position('0 1.5 0');

/**
 * Milestone progress bar
 * @var unknown
 */
$percentage = 100 / ($data->milestones[0]['closed_issues'] + $data->milestones[0]['open_issues']) * $data->milestones[0]['closed_issues'];
$bar_height = (float) (6 / 100 * $percentage);
$bar_height_y = $bar_height / 2;
$aframe->scene()->assets()->mixin('progress-bar')->geometry("primitive: cylinder; radius: .21; height: $bar_height;");
$aframe->scene()->assets()->mixin('progress-bar')->material('color: '.$CFG['color']['progress-bar'].'; metalness: .4;');
$aframe->scene()->assets()->mixin('progress-bar')->position("0 $bar_height_y 0");

$aframe->scene()->assets()->mixin('column-light')->light('type: point; intensity: .3; distance: 12;');
$aframe->scene()->assets()->mixin('column-light')->position('0 3 2.5');

$aframe->scene()->assets()->mixin('object-on-column')->position('0 1.5 0');

$aframe->scene()->assets()->mixin('spin')->attribute('rotation');
$aframe->scene()->assets()->mixin('spin')->to('0 -360 0');
$aframe->scene()->assets()->mixin('spin')->repeat('indefinite');
$aframe->scene()->assets()->mixin('spin')->easing('linear');
$aframe->scene()->assets()->mixin('spin')->dur('10000');

$aframe->scene()->assets()->mixin('plates')->material('color: '.$CFG['color']['plate-bg'].'; metalness: .4;');

$aframe->scene()->assets()->img('carpet','img/carpet.jpg');
$aframe->scene()->assets()->img('floor','img/marble.jpg');
$aframe->scene()->assets()->img('wall','data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAWCAYAAADNX8xBAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AULAiIjwyBabwAAAsVJREFUOMtVlFtv6zgMhD9JtCMladO3omcfFv3/P60oWqS+6UbtQ1bCqQHBlm2Rw+EMzT9//m3WWlprYxljOJ/PXK9Xcs4453DOEWMkhEApBVWllMLPzw8A8v7+joigqgC01vj8/GTfd2qtWGtJKXE6nRARYowYYwCIMTLPM6+vr9hSCuu6cr/fWdd1HFJVlmUBwHs/0IoI8zwTYySlRAgBVUVyzuScKaXQS5znGe89+76P9ymlgbi1Rs4ZESGE8HhOKWGMYZqmUXcpBe89OWdijKNs7z2qyvf3N6rK7XajtUaMEam14pzDWjsy9n1rjW3bfpUVY8R7D4C1luM4Ht+cc7TWKKVgjBkBe4Db7Yb3fgRXVY7jYF1XjuPAWksIARERSim01rDWYozBGEOMkdPpxPPzMyICgKoyTdPYb9tGCAFjDNIhdh5UlZQSOWeu1+sICgzU8zwTQmBZFlSVGCP2b110ZPu+IyKICDlnUkrUWqm1jo455zidTsQYKaUg27aRUqK1Rr+stWN1ogE6n6qKqhJCIKX0SFxrpZQyguScR5tzzqPszmFH05PnnKm1Im9vbwOFMYacM8uyDMjee0QEay3OucchEY7jQFV5enrifD5jnXMA1FpRVay1eO8Hyd1vXagd6XEc3O93nHPM8/ywSEppWOHv7MdxDO/1hogIxpjx7nw+PwS5bdsvZTvnMMZwuVxGx5xzQx4Ay7LQWiOEAEBK6aGjaZqotQ69dESdr33ff42Zzufz8zOllIdpp2kaM6aPj57FWsvLy8tweEdeSuHr64tSCs65h+a6JXqLuzlLKYQQuN1uYz9N01B3H2ydI1trHWbt9xgj27YNzlJKwzb7vo+Rsu/7UL2oKiLyS9mlFERkIOgy6PMqxoiI4L0f/8q6rkP6ncycM5fLhWmayDk/3P2/4+d5Hoq/Xq98fHygqvwHQehUrI/ObjIAAAAASUVORK5CYII=');

$aframe->scene()->entity("camera")->position('0 1.8 0');
$aframe->scene()->entity("camera")->entity('child1')->attr('camera look-controls wasd-controls');

$aframe->scene()->entity("main-light")->light('type: hemisphere; color: '.$CFG['color']['hemisphere'] .'; groundColor: '.$CFG['color']['col-bottom'].'; intensity: .5');

$aframe->scene()->entity("skysphere")->geometry('primitive: sphere; radius: 80');
$aframe->scene()->entity("skysphere")->material('src: #wall; repeat: 300 40;');
$aframe->scene()->entity("skysphere")->scale('1 1 -1');

$aframe->scene()->entity("floor")->position('0 0 0');
$aframe->scene()->entity("floor")->geometry('primitive: cylinder; height: .2; radius: 12;');
$aframe->scene()->entity("floor")->material('color: '.$CFG['color']['floor'].'; src: #floor; metalness: .2; repeat: 50 20; roughness: .1');

$aframe->scene()->entity("carpet")->geometry('primitive: box; depth: 8; height: 0.025; width: 2');
$aframe->scene()->entity("carpet")->material('color: '.$CFG['color']['carpet'].'; metalness: 0; src: #carpet; repeat: 3 40; roughness: 1');
$aframe->scene()->entity("carpet")->position('0 .2 0');

$aframe->scene()->entity("column-2")->position('0 1 -5');
$aframe->scene()->entity("column-2")->entity('c1')->mixin('column-2');
$aframe->scene()->entity("column-2")->entity('c1')->mixin('column-bottom-2');
$aframe->scene()->entity("column-2")->entity('c1')->entity('light')->mixin('column-light');

$aframe->scene()->cylinder('logo-cyl')->src('img/logo.png');
$aframe->scene()->cylinder('logo-cyl')->height('2.2');
$aframe->scene()->cylinder('logo-cyl')->position('0 1.4 -5');
$aframe->scene()->cylinder('logo-cyl')->radius('.6');
$aframe->scene()->cylinder('logo-cyl')->material('color: '.$CFG['color']['col-bottom']);
$aframe->scene()->cylinder('logo-cyl')->entity('e1')->mixin('column-light');         
$aframe->scene()->cylinder('logo-cyl')->animation('a1')->mixin('spin');

$aframe->scene()->curvedimage('cover')->src('img/cover.jpg');
$aframe->scene()->curvedimage('cover')->height('8');
$aframe->scene()->curvedimage('cover')->radius('15');
$aframe->scene()->curvedimage('cover')->theta_length('112');
$aframe->scene()->curvedimage('cover')->position('0 5 -2'); 
$aframe->scene()->curvedimage('cover')->rotation('0 120 0');
$aframe->scene()->curvedimage('cover')->scale('0.8 1 0.8');

/**
 * Open Issues
 */                 
$aframe->scene()->entity("open-issues")->position('-5 0 -5');
$aframe->scene()->entity("open-issues")->entity('c1')->mixin('column');
$aframe->scene()->entity("open-issues")->entity('c1')->entity('light')->mixin('column-light');
$aframe->scene()->entity("open-issues")->entity('c2')->mixin('column-bottom');

$aframe->scene()->plane('open-issues')->mixin('plates');
$aframe->scene()->plane('open-issues')->width('2');
$aframe->scene()->plane('open-issues')->height('1');
$aframe->scene()->plane('open-issues')->rotation('0 40 0');
$aframe->scene()->plane('open-issues')->position('-5 1.6 -5');
$aframe->scene()->plane('open-issues')->entity('c1')->text('text: ISSUES; size:.15');
$aframe->scene()->plane('open-issues')->entity('c1')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('open-issues')->entity('c1')->position('-.3 .15 1');

$aframe->scene()->plane('open-issues')->entity('c2')->text('text: '.$data->project['open_issues_count'] .'; size:.2');
$aframe->scene()->plane('open-issues')->entity('c2')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('open-issues')->entity('c2')->position('-.1.5 -.15 1');


/**
 * Releases
 */
$aframe->scene()->entity("releases")->position('-2 0 -5.5');
$aframe->scene()->entity("releases")->entity('c1')->mixin('column');
$aframe->scene()->entity("releases")->entity('c1')->entity('light')->mixin('column-light');
$aframe->scene()->entity("releases")->entity('c2')->mixin('column-bottom');

$aframe->scene()->plane('releases')->mixin('plates');
$aframe->scene()->plane('releases')->width('2');
$aframe->scene()->plane('releases')->height('1');
$aframe->scene()->plane('releases')->position('-2 1.6 -5.5');
$aframe->scene()->plane('releases')->entity('c1')->text('text: RELEASES; size:.15');
$aframe->scene()->plane('releases')->entity('c1')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('releases')->entity('c1')->position('-.6 .15 0');

$aframe->scene()->plane('releases')->entity('c2')->text('text: '.count($data->releases) .'; size:.2');
$aframe->scene()->plane('releases')->entity('c2')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('releases')->entity('c2')->position('.25 -.15 1');

/**
 * Forks
 */
$aframe->scene()->entity("forks")->position('2 0 -5.5');
$aframe->scene()->entity("forks")->entity('c1')->mixin('column');
$aframe->scene()->entity("forks")->entity('c1')->entity('light')->mixin('column-light');
$aframe->scene()->entity("forks")->entity('c2')->mixin('column-bottom');

$aframe->scene()->plane('forks')->mixin('plates');
$aframe->scene()->plane('forks')->width('2');
$aframe->scene()->plane('forks')->height('1');
$aframe->scene()->plane('forks')->position('2 1.6 -5.5');
$aframe->scene()->plane('forks')->entity('c1')->text('text: FORKS; size:.15');
$aframe->scene()->plane('forks')->entity('c1')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('forks')->entity('c1')->position('-.5 .15 0');

$aframe->scene()->plane('forks')->entity('c2')->text('text: '. $data->project['forks_count']  .'; size:.2');
$aframe->scene()->plane('forks')->entity('c2')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('forks')->entity('c2')->position('-.7 -.15 1');

/**
 * Contributors
 */
$aframe->scene()->entity("contributors")->position('5 0 -5');
$aframe->scene()->entity("contributors")->entity('c1')->mixin('column');
$aframe->scene()->entity("contributors")->entity('c1')->entity('light')->mixin('column-light');
$aframe->scene()->entity("contributors")->entity('c2')->mixin('column-bottom');

$aframe->scene()->plane('contributors')->mixin('plates');
$aframe->scene()->plane('contributors')->width('2');
$aframe->scene()->plane('contributors')->height('1');
$aframe->scene()->plane('contributors')->position('5 1.6 -5');
$aframe->scene()->plane('contributors')->rotation('0 320 0');
$aframe->scene()->plane('contributors')->entity('c1')->text('text: CONTRIBUTORS; size:.15');
$aframe->scene()->plane('contributors')->entity('c1')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('contributors')->entity('c1')->position('-.8 .15 0');

$aframe->scene()->plane('contributors')->entity('c2')->text('text: '. count($data->contributors)  .'; size:.2');
$aframe->scene()->plane('contributors')->entity('c2')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('contributors')->entity('c2')->position('-.25 -.15 1');


/**
 * Latest release
 * 
 */
$aframe->scene()->plane('latest-release')->width('5');
$aframe->scene()->plane('latest-release')->height('2');
$aframe->scene()->plane('latest-release')->position('-5.5 2 -1');
$aframe->scene()->plane('latest-release')->rotation('0 90 0');
$aframe->scene()->plane('latest-release')->mixin('plates');

$aframe->scene()->plane('latest-release')->entity('row1')->text('text: LATEST RELEASE: '. $data->release["name"] .' ; size:.2');
$aframe->scene()->plane('latest-release')->entity('row1')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane('latest-release')->entity('row1')->position('-2.2 .3 0');
if(!empty($data->release['published_at'])) {
    $aframe->scene()->plane('latest-release')->entity('row2')->text('text: PUBLISHED: '. date("d-m-Y",strtotime($data->release['published_at'])) .' ; size:.2');
    $aframe->scene()->plane('latest-release')->entity('row2')->material('color: '.$CFG['color']['plate-fg']);
    $aframe->scene()->plane('latest-release')->entity('row2')->position('-2.2 -.3 0');
}
      
/**
 * Progress of next milestone
 */
$aframe->scene()->entity("progress-base")->position('5.5 0 -3.7');
$aframe->scene()->entity("progress-base")->mixin('progress-base');

$aframe->scene()->entity("progress-fill")->position('5.5 0 -3.7');
$aframe->scene()->entity("progress-fill")->mixin('progress-bar');

$aframe->scene()->plane("percentage")->position('5.5 3.5 -3.7');
$aframe->scene()->plane("percentage")->mixin('plates');
$aframe->scene()->plane("percentage")->width('2');
$aframe->scene()->plane("percentage")->height('1');
$aframe->scene()->plane("percentage")->rotation('0 320 0');

$aframe->scene()->plane("percentage")->entity('prec')->text('text: '. (int)$percentage.' %; size:.4');
$aframe->scene()->plane("percentage")->entity('prec')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane("percentage")->entity('prec')->position('-.5 -.1 0');


/**
 * Nest mile
 */
$aframe->scene()->plane("next-mile")->mixin('plates');
$aframe->scene()->plane("next-mile")->width('5');
$aframe->scene()->plane("next-mile")->height('2');
$aframe->scene()->plane("next-mile")->position('5.5 2 -1');
$aframe->scene()->plane("next-mile")->rotation('0 270 0');
        
$aframe->scene()->plane("next-mile")->entity('r1')->text('text: NEXT MILESTONE: '.$data->milestones[0]['title'].'; size:.2');
$aframe->scene()->plane("next-mile")->entity('r1')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane("next-mile")->entity('r1')->position('-2.2 .5 0');
     
$aframe->scene()->plane("next-mile")->entity('r2')->text('text: DUE DATE: '.($dadata->milestones[0]['due_on'] ?? '-').'; size:.2');
$aframe->scene()->plane("next-mile")->entity('r2')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane("next-mile")->entity('r2')->position('-2.2 .2 0');
        
$aframe->scene()->plane("next-mile")->entity('r3')->text('text: OPEN ISSUES: '.($data->milestones[0]['open_issues'] ?? '-').'; size:.2');
$aframe->scene()->plane("next-mile")->entity('r3')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane("next-mile")->entity('r3')->position('-2.2 -.1 0');

$aframe->scene()->plane("next-mile")->entity('r4')->text('text: CLOSED ISSUES: '.($data->milestones[0]['closed_issues'] ?? '-').'; size:.2');
$aframe->scene()->plane("next-mile")->entity('r4')->material('color: '.$CFG['color']['plate-fg']);
$aframe->scene()->plane("next-mile")->entity('r4')->position('-2.2 -.4 0');
                  

$aframe->scene()->entity('spotlight')->position('0 5 -5');
$aframe->scene()->entity('spotlight')->light('type: spot; angle: 60; intensity:.7; ');
/* @formatter:on */

/**
 * Contributors
 */

$x = 20;
$i = 1;
$y = 1.6;
foreach ($data->contributors as $contributor) {
    $aframe->scene()
        ->image($contributor['id'])
        ->src($contributor['avatar_url']);
    $aframe->scene()
        ->image($contributor['id'])
        ->width('2');
    $aframe->scene()
        ->image($contributor['id'])
        ->height('2');
    $aframe->scene()
        ->image($contributor['id'])
        ->position(sprintf('%s %s 10', $x , $y));
    $aframe->scene()
        ->image($contributor['id'])
        ->rotation('0 180 0');
    if ($i === 17) {
        $y += 2.5;
        $i = 0;
        $x = 20;
    }
    $x -= 2.5;
    $i ++;
}

$aframe->render();
