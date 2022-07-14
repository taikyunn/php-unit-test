<?php

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
  protected $user;

  /**
   * setup関数
   * 変数に共通の値をセットしたい場合に使う
   * セットした値は以後のテストにて使用できる
   */
  protected function setup() :void{
    $this->user = new User;

    $this->user->firstName = 'John';
    $this->user->lastName = 'Doe';
  }

  /**
   * データプロバイダー
   * テスト関数に対して値を渡すことができる
   * 
   * 今回の場合は、以下のように与えている
   * $firstName John
   * $lastName Doe
   * $expected John Doe
   */
  public function nameProvider() {
    return
    [
      ["John", "Doe", "John Doe"]
    ];
  }

  /**
   * @dataProvider nameProvider
   */
  public function test_return_full_name2($firstName, $lastName, $expected) {

    $user = new User;
    $user->firstName = $firstName;
    $user->lastName = $lastName;

    $result = $user->getFullName();
    $this->assertSame($expected, $result);
  }

  /**
   * データプロバイダーの配列ver
   */
  public function nameProvider2() {
    return
    [
      ["John", "Doe", "John Doe"],
      ["Jane", "Doe", "Jane Doe"],
      ["John", "Smith", "John Smith"],
    ];
  }

  /**
   * @dataProvider nameProvider2
   */
  public function test_return_full_name3($firstName, $lastName, $expected) {

    $user = new User;
    $user->firstName = $firstName;
    $user->lastName = $lastName;

    $result = $user->getFullName();
    $this->assertSame($expected, $result);
  }


  public function test_return_full_name() {
    /**
     * テスト実行コマンド
     * vendor/bin/phpunit tests
     *
     * 色付きで結果を出力
     * 赤:失敗 緑:成功
     * vendor/bin/phpunit tests --color
     *
     * ユニットテストのバージョン確認
     * vendor/bin/phpunit --version
     */
    // $user = new User;

    // $user->firstName = 'John';
    // $user->lastName = 'Doe';

    // $result = $user->getFullName();
    $result = $this->user->getFullName();

    // 第一引数と第二引数を===で比較する
    $this->assertSame('John Doe', $result);
  }

  public function test_return_first_name_charactor_count() {
    $user = new User;

    $user->firstName = 'John';
    $user->lastName = 'Doe';

    $result = $user->getFirstName();
    $result = $this->user->getFirstName();

    // 第一引数と第二引数を==で比較する
    $this->assertEquals(4, $result);
  }
}
