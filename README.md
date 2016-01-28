# Codeigniter for pure php

일반 PHP 프로젝트에 코드이그나이터(Codeigniter)를 적용을 위한 프로그램

----

Codeigniter 한국 사용자 포럼에서 활동중인 '불의회상' 입니다.

포럼에서 활동 하면서 자주 받았던 질문중 하나이고, Codeigniter를 알게 되었을 때 첫 번째로 했던 고민
 
좋은건 알겠는데..  지금 진행중이거나 사용중인 PHP 프로젝트에 어떻게 적용 시키지?

같은 고민을 하고 계시다면 잘 찾아 오신겁니다.

----

* 설치 방법

1. 코드이그나이터(Codeigniter 3.x or 2.x)를 설치 합니다.
2. 다운 받은 압축파일의 압축을 해제 한 후 버전에 맞는 2.x(c20.php), 3.x(ci30.php) 를 에디터로 열어 $system_path 와 $application_folder 의 값을 설치된 CI의 위치로 바꿉니다.
4. 진행중이거나 사용중인 php 프로젝트에서 CI를 적용시키고자 하는 php파일에 2.x(ci20.php), 3.x(ci30.php) 를 include 한 후 아래와 같이 테스트 해 봅니다.

* Lib 로 활용

```php
 require_once 'ci3.php'; // CI 3.x
 // require_once 'ci2.php'; // CI 2.x

 echo $that->load->view('welcome_message', NULL, TRUE);
````

* CI의 컨트롤러를 호출

<pre>
&lt;php
 require_once 'ci3.php'; // CI 3.x
 // require_once 'ci2.php'; // CI 2.x

 exec_controller('welcome', 'index');
</pre>

* 주의사항

1. CI객체변수명을 메뉴얼에 명시된 것 처럼 $this를 사용하고 싶었으나, 예약어로 지정된 관계로 $that 을 사용 하였습니다.
2. CI객체 변수명인 $that 은 $ci 의 alias 입니다. 그러므로 $that 은 $ci 로 대체하여 사용 가능 합니다.
3. 일반 php에서 $that, $ci 변수에 값을 할당 할 경우 CI와 연동이 되지 않게 됩니다. 사용시 $that, $ci 변수에 값이 할당 되지 않도록 주의 하여 주십시오.
4. CI객체는 Singleton 패턴이 적용되어 있어 Lib 방식으로 모델, 라이브러리 로드 후 CI 컨트롤러를 호출하게 되면 에러가 납니다. Lib 방식이나 컨트롤러 호출 방식을 혼용하여 사용하지 마십시오.


* 잘못된 사용 예

<pre>
&lt;?php
 require_once 'ci3.php'; // CI 3.x
 // require_once 'ci2.php'; // CI 2.x

 // Lib 방식으로 모델을 로드함
 $that->load->model('rgb_m');

 // 컨트롤러 에서 rgb_m 모델을 로드하여 사용
 exec_controller('welcome', 'index');
</pre>

이 프로젝트를 진행 할 수 있도록 영감을 준 “테러보이”님께 진심으로 감사 드립니다.
