

<!DOCTYPE html>
<!--
Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="ckeditor/sample.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link href="ckeditor/sample.css" rel="stylesheet">
    <script src="/intl/en/chrome/assets/common/js/chrome.min.js">
</script>
	<title>Centro de Redaccion</title>
	<script src="ckeditor.js"></script>
	<script>

		// This code is generally not necessary, but it is here to demonstrate
		// how to customize specific editor instances on the fly. This fits well
		// this demo because we have editable elements (like headers) that
		// require less features.

		// The "instanceCreated" event is fired for every editor instance created.
		CKEDITOR.on( 'instanceCreated', function( event ) {
			var editor = event.editor,
				element = editor.element;

			// Customize editors for headers and tag list.
			// These editors don't need features like smileys, templates, iframes etc.
			if ( element.is( 'h1', 'h2', 'h3' ) || element.getAttribute( 'id' ) == 'taglist' ) {
				// Customize the editor configurations on "configLoaded" event,
				// which is fired after the configuration file loading and
				// execution. This makes it possible to change the
				// configurations before the editor initialization takes place.
				editor.on( 'configLoaded', function() {

					// Remove unnecessary plugins to make the editor simpler.
					editor.config.removePlugins = 'colorbutton,find,flash,font,' +
						'forms,iframe,image,newpage,removeformat,' +
						'smiley,specialchar,stylescombo,templates';

					// Rearrange the layout of the toolbar.
					editor.config.toolbarGroups = [
						{ name: 'editing',		groups: [ 'basicstyles', 'links' ] },
						{ name: 'undo' },
						{ name: 'clipboard',	groups: [ 'selection', 'clipboard' ] },
						{ name: 'about' }
					];
				});
			}
		});

	</script>
	
	<style>

		/* The following styles are just to make the page look nice. */

		/* Workaround to show Arial Black in Firefox. */
		@font-face
		{
			font-family: 'arial-black';
			src: local('Arial Black');
		}

		*[contenteditable="true"]
		{
			padding: 10px;
		}

		#container
		{
			width: 960px;
			margin: 30px auto 0;
		}

		#header
		{
			overflow: hidden;
			padding: 0 0 30px;
			border-bottom: 5px solid #05B2D2;
			position: relative;
		}

		#headerLeft,
		#headerRight
		{
			width: 49%;
			overflow: hidden;
		}

		#headerLeft
		{
			float: left;
			padding: 10px 1px 1px;
		}

		#headerLeft h2,
		#headerLeft h3
		{
			text-align: right;
			margin: 0;
			overflow: hidden;
			font-weight: normal;
		}

		#headerLeft h2
		{
			font-family: "Arial Black",arial-black;
			font-size: 4.6em;
			line-height: 1.1;
			text-transform: uppercase;
		}

		#headerLeft h3
		{
			font-size: 2.3em;
			line-height: 1.1;
			margin: .2em 0 0;
			color: #666;
		}

		#headerRight
		{
			float: right;
			padding: 1px;
		}

		#headerRight p
		{
			line-height: 1.8;
			text-align: justify;
			margin: 0;
		}

		#headerRight p + p
		{
			margin-top: 20px;
		}

		#headerRight > div
		{
			padding: 20px;
			margin: 0 0 0 30px;
			font-size: 1.4em;
			color: #666;
		}

		#columns
		{
			color: #333;
			overflow: hidden;
			padding: 20px 0;
		}

		#columns > div
		{
			float: left;
			width: 33.3%;
		}

		#columns #column1 > div
		{
			margin-left: 1px;
		}

		#columns #column3 > div
		{
			margin-right: 1px;
		}

		#columns > div > div
		{
			margin: 0px 10px;
			padding: 10px 20px;
		}

		#columns blockquote
		{
			margin-left: 15px;
		}

		#tagLine
		{
			border-top: 5px solid #05B2D2;
			padding-top: 20px;
		}

		#taglist {
			display: inline-block;
			margin-left: 20px;
			font-weight: bold;
			margin: 0 0 0 20px;
		}

	</style>
    
    
    
        <script>
(function(e, p){
    var m = location.href.match(/platform=(win8|win|mac|linux|cros)/);
    e.id = (m && m[1]) ||
           (p.indexOf('Windows NT 6.2') > -1 ? 'win8' : p.indexOf('Windows') > -1 ? 'win' : p.indexOf('Mac') > -1 ? 'mac' : p.indexOf('CrOS') > -1 ? 'cros' : 'linux');
    e.className = e.className.replace(/\bno-js\b/,'js');
  })(document.documentElement, window.navigator.userAgent)
    </script>
    <meta charset="utf-8">
    <meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
    <meta content=
    "Google Chrome is a browser that combines a minimal design with sophisticated technology to make the web faster, safer, and easier."
    name="description">
    <title>
      Chrome Browser
    </title>
    <link href="https://plus.google.com/100585555255542998765" rel="publisher">
    <link href="//www.google.com/images/icons/product/chrome-32.png" rel="icon" type="image/ico">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel=
    "stylesheet">
    <link href="/intl/en/chrome/assets/common/css/chrome.min.css" rel="stylesheet">
    <script src="//www.google.com/js/gweb/analytics/autotrack.js">
</script>
    <script>
new gweb.analytics.AutoTrack({
          profile: 'UA-26908291-1'
        });
    </script>
    
    <script>

		var editor, html = '';

		function createEditor() {
			if ( editor )
				return;

			// Create a new editor inside the <div id="editor">, setting its value to html
			var config = {};
			editor = CKEDITOR.appendTo( 'editor', config, html );
		}
        
        

		function removeEditor() {
			if ( !editor )
				return;

			// Retrieve the editor contents. In an Ajax application, this data would be
			// sent to the server or used in any other way.
			document.getElementById( 'editorcontents' ).innerHTML = html = editor.getData();
			document.getElementById( 'contents' ).style.display = '';

			// Destroy the editor.
			editor.destroy();
			editor = null;
		}

	</script>
    
    <style>
#info {
    font-size: 20px;
    }
    #div_start {
    float: right;
    }
    #headline {
    text-decoration: none
    }
    #results {
    font-size: 14px;
    font-weight: bold;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    min-height: 150px;
    }
    #start_button {
    border: 0;
    background-color:transparent;
    padding: 0;
    }
    .interim {
    color: gray;
    }
    .final {
    color: black;
    padding-right: 3px;
    }
    .button {
    display: none;
    }
    .marquee {
    margin: 20px auto;
    }

    #buttons {
    margin: 10px 0;
    position: relative;
    top: -50px;
    }

    #copy {
    margin-top: 20px;
    }

    #copy > div {
    display: none;
    margin: 0 70px;
    }
    </style>
    <style>
a.c1 {font-weight: normal;}
    </style>
    
    
    
    
    
</head>
<body>
    
    
    
    
    
    
    
            
    <p>
		<input onclick="createEditor();" type="button" value="Mostrar Editor">
		<input onclick="removeEditor();" type="button" value="Ocultar Editor">
	</p>
	<!-- This div will hold the editor. -->
	<div id="editor">
	</div>
	<div id="contents" style="display: none">
		<p>
			Contenido actual:
		</p>
		<!-- This div will be used to display the editor contents. -->
		<div id="editorcontents">
		</div>
	</div>
    
    
         <script>
var chrmMenuBar = new chrm.ui.MenuBar();
      chrmMenuBar.decorate('nav');
      var chrmLogo = new chrm.ui.Logo('logo');

      var chrmscroll = new chrm.ui.SmoothScroll('scroll');
      chrmscroll.init();



  window.___gcfg = { lang: 'en' };
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();




      var doubleTracker = new gweb.analytics.DoubleTrack('floodlight', {
          src: 2542116,
          type: 'clien612',
          cat: 'chrom0'
      });
      doubleTracker.track();

      doubleTracker.trackClass('doubletrack', true);
    </script> <script>
var langs =
[['Afrikaans',       ['af-ZA']],
 ['Bahasa Indonesia',['id-ID']],
 ['Bahasa Melayu',   ['ms-MY']],
 ['Català',          ['ca-ES']],
 ['Čeština',         ['cs-CZ']],
 ['Dansk',           ['da-DK']],
 ['Deutsch',         ['de-DE']],
 ['English',         ['en-AU', 'Australia'],
                     ['en-CA', 'Canada'],
                     ['en-IN', 'India'],
                     ['en-NZ', 'New Zealand'],
                     ['en-ZA', 'South Africa'],
                     ['en-GB', 'United Kingdom'],
                     ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Filipino',        ['fil-PH']],
 ['Français',        ['fr-FR']],
 ['Galego',          ['gl-ES']],
 ['Hrvatski',        ['hr_HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['Lietuvių',        ['lt-LT']],
 ['Magyar',          ['hu-HU']],
 ['Nederlands',      ['nl-NL']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['Slovenščina',     ['sl-SI']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Tiếng Việt',      ['vi-VN']],
 ['Türkçe',          ['tr-TR']],
 ['Ελληνικά',        ['el-GR']],
 ['български',       ['bg-BG']],
 ['Pусский',         ['ru-RU']],
 ['Српски',          ['sr-RS']],
 ['Українська',      ['uk-UA']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['हिन्दी',            ['hi-IN']],
 ['ภาษาไทย',         ['th-TH']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 8;
updateCountry();
select_dialect.selectedIndex = 0;
showInfo('info_start');

function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

var create_email = false;
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) {
  upgrade();
} else {
  start_button.style.display = 'inline-block';
  var recognition = new webkitSpeechRecognition();
  recognition.continuous = true;
  recognition.interimResults = true;

  recognition.onstart = function() {
    recognizing = true;
    showInfo('info_speak_now');
    start_img.src = '/intl/en/chrome/assets/common/images/content/mic-animate.gif';
  };

  recognition.onerror = function(event) {
    if (event.error == 'no-speech') {
      start_img.src = '/intl/en/chrome/assets/common/images/content/mic.gif';
      showInfo('info_no_speech');
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      start_img.src = '/intl/en/chrome/assets/common/images/content/mic.gif';
      showInfo('info_no_microphone');
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
        showInfo('info_blocked');
      } else {
        showInfo('info_denied');
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() {
    recognizing = false;
    if (ignore_onend) {
      return;
    }
    start_img.src = '/intl/en/chrome/assets/common/images/content/mic.gif';
    if (!final_transcript) {
      showInfo('info_start');
      return;
    }
    showInfo('');
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }
    if (create_email) {
      create_email = false;
      createEmail();
    }
  };

  recognition.onresult = function(event) {
    var interim_transcript = '';
    if (typeof(event.results) == 'undefined') {
      recognition.onend = null;
      recognition.stop();
      upgrade();
      return;
    }
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_transcript = capitalize(final_transcript);
    final_span.innerHTML = linebreak(final_transcript);
    interim_span.innerHTML = linebreak(interim_transcript);
    if (final_transcript || interim_transcript) {
      showButtons('inline-block');
    }
  };
}

function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}

var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

var first_char = /\S/;
function capitalize(s) {
  return s.replace(first_char, function(m) { return m.toUpperCase(); });
}

function createEmail() {
  var n = final_transcript.indexOf('\n');
  if (n < 0 || n >= 80) {
    n = 40 + final_transcript.substring(40).indexOf(' ');
  }
  var subject = encodeURI(final_transcript.substring(0, n));
  var body = encodeURI(final_transcript.substring(n + 1));
  window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
}

function copyButton() {
  if (recognizing) {
    recognizing = false;
    recognition.stop();
  }
  copy_button.style.display = 'none';
  copy_info.style.display = 'inline-block';
  showInfo('');
}

function emailButton() {
  if (recognizing) {
    create_email = true;
    recognizing = false;
    recognition.stop();
  } else {
    createEmail();
  }
  email_button.style.display = 'none';
  email_info.style.display = 'inline-block';
  showInfo('');
}

function startButton(event) {
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  recognition.lang = select_dialect.value;
  recognition.start();
  ignore_onend = false;
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
  start_img.src = '/intl/en/chrome/assets/common/images/content/mic-slash.gif';
  showInfo('info_allow');
  showButtons('none');
  start_timestamp = event.timeStamp;
}

function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}

var current_style;
function showButtons(style) {
  if (style == current_style) {
    return;
  }
  current_style = style;
  copy_button.style.display = style;
  email_button.style.display = style;
  copy_info.style.display = 'none';
  email_info.style.display = 'none';
}
    </script>
    
</body>
</html>
