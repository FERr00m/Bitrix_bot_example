<?
/*
$_GET
(
    [BOT_ID] => 17
    [BOT_CODE] => echoBot
    [APP_ID] => 11
    [APP_CODE] => echoFrame
    [DOMAIN] => https://test.bitrix24.ru
    [DOMAIN_HASH] => d1ab17949a572b0979d8db0d5b349cd2
    [USER_ID] => 2
    [USER_HASH] => 7e23ac8b6f6c7044076301c7f81cd745
    [DIALOG_ID] => 950
    [CONTEXT] => textarea
    [LANG] => ru
    [IS_CHROME] => Y
    [MESSAGE_ID] => 12333
    [BUTTON_PARAMS] => test

)
 */
securityCheck($_GET);
$file = '../testCSV/smiles.csv';
$csv = array_map('str_getcsv', file($file));
$smiles = [];
foreach ($csv as $line)
{
  $id = $line[0];
  $categoty = $line[1];
  $smile = $line[2];
  $smiles[$categoty][] = $smile;
}
?>

<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />
  <style>
    /*
    * Prefixed by https://autoprefixer.github.io
    * PostCSS: v8.4.12,
    * Autoprefixer: v10.4.4
    * Browsers: last 4 version
    */

    html {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      scroll-behavior: smooth;
      font-size: 16px;
    }
    html::-webkit-scrollbar {
      width: 17px;
    }
    html::-webkit-scrollbar-thumb {
      background-image: linear-gradient(to right,transparent,transparent 8px,#e7e7e8 8px,#e7e7e8 13px,transparent 13px);
    }
    html::-webkit-scrollbar-thumb:hover {
      background-image: linear-gradient(to right,transparent,transparent 6px,#17b0e1 8px,#17b0e1 13px,transparent 13px);
    }
    *,
    *::before,
    *::after {
      -webkit-box-sizing: inherit;
      box-sizing: inherit;
    }
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Arial', Courier, sans-serif;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      position: relative;
      background-size: cover;
      background: #ececec url(./background.jpg) fixed center;
    }
    a {
      color: inherit;
      text-decoration: none;
    }
    a:visited {
      opacity: 0.7;
    }
    a:hover,
    a:active,
    button:hover {
      opacity: 0.7;
    }
    .category__container {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-pack: start;
      -ms-flex-pack: start;
      justify-content: flex-start;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
    }
    .category__item {
      font-size: 30px;
      padding: 2px;
      cursor: pointer;
      -webkit-transition: all .2s ease-in;
      -o-transition: all .2s ease-in;
      transition: all .2s ease-in;
    }
    .category__item:hover {
      -webkit-transform: scale(1.1);
      -ms-transform: scale(1.1);
      transform: scale(1.1);
    }
    .category__item:active {
      opacity: .5;
    }
    .main {
      width: calc(100% - 10px);
      -webkit-transition: all .3s ease-in-out;
      -o-transition: all .3s ease-in-out;
      transition: all .3s ease-in-out;
    }
    .tabs-nav {
      width: 20%;
      height: 100%;
      background-color: gainsboro;
      position: fixed;
      top: 0;
      right: 0;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
      overflow-y: auto;
      overflow-x: hidden;
      -webkit-transform: translateX(80%);
      -ms-transform: translateX(80%);
      transform: translateX(80%);
      border-left: 15px solid #17b0e1;
      -webkit-transition: all .3s cubic-bezier(0.4, 0, 1, 1);
      -o-transition: all .3s cubic-bezier(0.4, 0, 1, 1);
      transition: all .3s cubic-bezier(0.4, 0, 1, 1);
    }
    .tabs-nav:hover {
      -webkit-transform: translateX(0);
      -ms-transform: translateX(0);
      transform: translateX(0);
      border: 1px solid;
    }
    .tabs-nav:hover .main {
      width: 85%;
    }
    .tabs-nav::-webkit-scrollbar {
      width: 0;
    }
    .tabs-nav__link {
      cursor: pointer;
      border: none;
      background-color: #17b0e1;
      width: 100%;
      height: auto;
      font-size: 25px;
      padding: 5px;
      border-bottom: 1px solid;
      text-align: center;
    }
    .tabs-nav__link:last-child {
      border-bottom: none;
    }
  </style>
</head>
<body>

<!--	<a href="#send" onclick="frameCommunicationSend({'action': 'send', 'message': 'Send message'})">Send message</a><br><br>-->
<!--	<a href="#put" onclick="frameCommunicationSend({'action': 'put', 'message': 'asdsd'})">Put message</a><br><br>-->
<!--	<a href="#call" onclick="frameCommunicationSend({'action': 'call', 'number': '123456'})">Call to number</a><br><br>-->
<!--	<a href="#support" onclick="frameCommunicationSend({'action': 'support', 'code': '6a4cdbcf753addac1a573ea64be826ca'})">Open support bot</a><br><br>-->
<!--	<a href="#close" onclick="frameCommunicationSend({'action': 'close'})">Close this window</a>-->
  <main class="main">
    <span class="category__item" onclick="frameCommunicationSend({'action': 'send', 'message': '<img src=https://cdn.jsdelivr.net/gh/googlei18n/noto-emoji/svg/emoji_u1f600.svg\>'})">
            click
          </span>
  <? $counter = 1;?>
  <? foreach ($smiles as $key => $smile): ?>
    <section class="category">
      <h3 id="category_<?=$counter?>"><?=$key?></h3>
        <div class="category__container">
        <? foreach ($smile as $item): ?>
          <span class="category__item" onclick="frameCommunicationSend({'action': 'put', 'message': '<?=$item?>'})">
            <?=$item?>
          </span>
        <?endforeach;?>
        </div>
    </section>
    <?$counter++?>
  <?endforeach;?>
  </main>

  <? $counter = 1;?>
  <aside class="tabs-nav">
    <? foreach ($smiles as $key => $smile): ?>
      <a
        href="#category_<?=$counter?>"
        class="tabs-nav__link"
        title="<?=$key?>"
      >
        <?=$smile[0]?>
      </a>
      <?$counter++?>
    <?endforeach;?>
  </aside>

	<script type="text/javascript">
		function frameCommunicationInit()
		{
			if (!window.frameCommunication)
			{
				window.frameCommunication = {timeout: {}};
			}
			if(typeof window.postMessage === 'function')
			{
				window.addEventListener('message', function(event){
					var data = {};
					try {
            console.log(event.data)
            data = JSON.parse(event.data);

          } catch (err){}

					if (data.action == 'init')
					{
						frameCommunication.uniqueLoadId = data.uniqueLoadId;
						frameCommunication.postMessageSource = event.source;
						frameCommunication.postMessageOrigin = event.origin;
					}
				});
			}

		}
		function frameCommunicationSend(data)
		{
			data['uniqueLoadId'] = frameCommunication.uniqueLoadId;
      if (data.action === 'send') {
        console.log(data)
        data.message = 'https://upload.wikimedia.org/wikipedia/commons/2/2c/Rotating_earth_%28large%29.gif'
      }
			var encodedData = JSON.stringify(data);
			if (!frameCommunication.postMessageOrigin)
			{
				clearTimeout(frameCommunication.timeout[encodedData]);
				frameCommunication.timeout[encodedData] = setTimeout(function(){
					frameCommunicationSend(data);
				}, 10);
				return true;
			}

			if(typeof window.postMessage === 'function')
			{
				if(frameCommunication.postMessageSource)
				{

					frameCommunication.postMessageSource.postMessage(
						encodedData,
						frameCommunication.postMessageOrigin
					);

          if (data.action === 'send') {
            frameCommunicationSend({'action': 'close'})
          }
				}
			}
		}
		frameCommunicationInit();
    window.addEventListener('DOMContentLoaded', function () {

    })

	</script>
</body>
</html>

<?
function securityCheck($params)
{
	// this hash you setted in register rest command
	$appHash = 'd1ab17949a572b0979d8db0d5b349cd2';

	$check = parse_url($params['DOMAIN']);
	if (!in_array($check['scheme'], Array('http', 'https')) || empty($check['host']))
	{
		die("BC_IFRAME_ERROR_ADDRESS");
	}
	$params['DOMAIN'] = $check['scheme'].'://'.$check['host'];
	$params['SERVER_NAME'] = $check['host'];

	if (strpos($_SERVER['HTTP_REFERER'], $params['DOMAIN']) !== 0)
	{
		die("BC_IFRAME_ERROR_SECURITY");
	}

	// get from config
	if ($appHash)
	{
		if ($params['DOMAIN_HASH'] != md5($params['SERVER_NAME'].$appHash))
		{
			die("BC_IFRAME_ERROR_AUTH");
		}
	}
	else
	{
		die("BC_IFRAME_ERROR_AUTH_2");
	}

	return $params;
}
