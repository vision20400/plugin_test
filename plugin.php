<?php
namespace JTaylor\PluginTest\XePlugin\PluginTest;

use JTaylor\PluginTest\XePlugin\PluginTest\Plugin\Resources;
use Route;
use JTaylor\PluginTest\XePlugin\Model\Point;
use Schema;
use Illuminate\Database\Schema\Blueprint;
use JTaylor\PluginTest\XePlugin\Model\PointLog;
use Xpressengine\Config\ConfigEntity;
use Xpressengine\Plugin\AbstractPlugin;
use Xpressengine\Plugins\Board\Handler;
use Xpressengine\User\UserInterface;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */

    public function register() //cpt 문서 생성 -> resources.php의 setCpts(), setCategory();
    {
        Resources::setCpts();
    }

    public function boot()
    {
        // implement code
        //$this->pointInterception(); //포인트 플러그인 연습
        $this->route();
    }

    protected function pointInterception(){ //포인트 플러그인 연습
        intercept(
            Handler::class . '@add',
            static::getId().'::board.add',
            function ($addFunc, array $args, UserInterface $user, ConfigEntity $config){
                $board = $addFunc($args,$user,$config);

                $pointLog = new PointLog();
                $pointLog->userId = $user->getId();
                $pointLog->point = 2;

                $pointLog->created_at = date('Y-m-d H:i:s');
                $pointLog->save();

                $point = Point::find($user->getId());
                if($point ===null){
                    $point = new Point();
                }
                $point->userId = $user->getId();
                $point->point = $pointLog->where('userId', $user->getId())->sum('point');
                $point->save();

                return $board;
            }

        );
    }

    protected function route()
    {
        // implement code

        Route::fixed(
            $this->getId(),
            function () {
                Route::get('/', [
                    'as' => 'plugin_test::index','uses' => 'JTaylor\PluginTest\XePlugin\PluginTest\Controller@index'
                ]);
            }
        );

    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code

    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        // implement code
        //$this->createTables(); //포인트 플러그인 연습

    }

    protected function createTables() //포인트 플러그인 연습
    {
        if(Schema::hasTable('points') === false) {
            Schema::create('points', function (Blueprint $table) {
                $table->string('userId', 255);
                $table->string('point', 255);
                $table->timestamp('created_at');
                $table->timestamp('updated_at');

                $table->primary(array('userId'));
            });
        }

        if(Schema::hasTable('point_logs') === false) {
            Schema::create('point_logs', function (Blueprint $table) {
                $table->increments('id');
                $table->string('userId', 255);
                $table->string('point',255);
                $table->timestamp('created_at');
            });
        }

    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstalled()
    {
        // implement code

        return parent::checkInstalled();
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @return void
     */
    public function update()
    {
        // implement code
    }

    /**
     * 해당 플러그인이 최신 상태로 업데이트가 된 상태라면 true, 업데이트가 필요한 상태라면 false를 반환함.
     * 이 메소드를 구현하지 않았다면 기본적으로 최신업데이트 상태임(true)을 반환함.
     *
     * @return boolean 플러그인의 설치 유무,
     */
    public function checkUpdated()
    {
        // implement code

        return parent::checkUpdated();
    }

    public function settingsURI()
    {
        return route("manage.JTaylor.index");
    }
}
